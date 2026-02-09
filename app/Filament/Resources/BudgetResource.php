<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BudgetResource\Pages;
use App\Filament\Resources\BudgetResource\RelationManagers;
use App\Models\Budget;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BudgetResource extends Resource
{
    protected static ?string $model = Budget::class;

    protected static ?string $modelLabel = 'Orçamento';
    protected static ?string $pluralModelLabel = 'Orçamentos';
    protected static ?string $navigationLabel = 'Orçamentos';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function updateTotals(Forms\Get $get, Forms\Set $set): void
    {
        $quantity = (float) $get('quantity') ?: 0;
        $unitPrice = (float) $get('unit_price') ?: 0;
        $set('total_price', round($quantity * $unitPrice, 2));
    }

    public static function updateGrandTotal(Forms\Get $get, Forms\Set $set): void
    {
        $items = $get('items') ?? [];
        $total = 0;
        foreach ($items as $item) {
            $total += (float) ($item['total_price'] ?? 0);
        }
        $set('total_amount', round($total, 2));
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('customer_id')
                    ->relationship('customer', 'name')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->label('Cliente'),
                Forms\Components\Select::make('status')
                    ->options([
                        'draft' => 'Rascunho',
                        'sent' => 'Enviado',
                        'approved' => 'Aprovado',
                        'rejected' => 'Rejeitado',
                        'converted' => 'Convertido',
                    ])
                    ->default('draft')
                    ->required(),
                Forms\Components\DatePicker::make('valid_until')
                    ->label('Válido Até')
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->label('Descrição Geral')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('payment_terms')
                    ->label('Formas de Pagamento')
                    ->columnSpanFull(),
                Forms\Components\Repeater::make('items')
                    ->relationship()
                    ->schema([
                        Forms\Components\Select::make('product_id')
                            ->relationship('product', 'name')
                            ->label('Produto')
                            ->searchable()
                            ->preload()
                            ->live()
                            ->afterStateUpdated(function ($state, Forms\Set $set) {
                                $product = \App\Models\Product::find($state);
                                if ($product) {
                                    $set('description', $product->name);
                                    $set('unit_price', $product->price);
                                    $set('total_price', $product->price); // Initial quantity is 1
                                }
                            })
                            ->columnSpan(4),
                        Forms\Components\TextInput::make('description')
                            ->required()
                            ->label('Descrição')
                            ->columnSpan(4),
                        Forms\Components\TextInput::make('quantity')
                            ->numeric()
                            ->default(1)
                            ->required()
                            ->label('Qtd')
                            ->live()
                            ->afterStateUpdated(fn (Forms\Get $get, Forms\Set $set) => self::updateTotals($get, $set))
                            ->columnSpan(2),
                        Forms\Components\TextInput::make('unit_price')
                            ->numeric()
                            ->prefix('R$')
                            ->required()
                            ->label('Preço Unitário')
                            ->live()
                            ->afterStateUpdated(fn (Forms\Get $get, Forms\Set $set) => self::updateTotals($get, $set))
                            ->columnSpan(3),
                        Forms\Components\TextInput::make('total_price')
                            ->numeric()
                            ->prefix('R$')
                            ->readOnly()
                            ->label('Total')
                            ->columnSpan(3),
                    ])
                    ->columns(12)
                    ->columnSpanFull()
                    ->live()
                    ->afterStateUpdated(function (Forms\Get $get, Forms\Set $set) {
                        self::updateGrandTotal($get, $set);
                    }),
                Forms\Components\TextInput::make('total_amount')
                    ->numeric()
                    ->prefix('R$')
                    ->readOnly()
                    ->label('Valor Total')
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('customer.name')->label('Cliente')->searchable(),
                Tables\Columns\TextColumn::make('valid_until')->date('d/m/Y')->label('Validade'),
                Tables\Columns\TextColumn::make('total_amount')
                    ->formatStateUsing(fn (string $state): string => 'R$ ' . number_format((float) $state, 2, ',', '.'))
                    ->label('Total'),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'draft' => 'gray',
                        'sent' => 'info',
                        'approved' => 'success',
                        'rejected' => 'danger',
                        'converted' => 'primary',
                        default => 'gray',
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('pdf')
                    ->label('PDF')
                    ->icon('heroicon-o-document-arrow-down')
                    ->url(fn (Budget $record) => route('budgets.pdf', $record))
                    ->openUrlInNewTab(),
                Tables\Actions\Action::make('sendEmail')
                    ->label('Enviar por Email')
                    ->icon('heroicon-o-paper-airplane')
                    ->requiresConfirmation()
                    ->modalHeading('Enviar Orçamento por Email')
                    ->modalDescription('Tem certeza que deseja enviar este orçamento para o email do cliente?')
                    ->modalSubmitActionLabel('Sim, enviar')
                    ->action(function (Budget $record) {
                        if (!$record->customer->email) {
                            \Filament\Notifications\Notification::make()
                                ->title('Erro')
                                ->body('O cliente não possui email cadastrado.')
                                ->danger()
                                ->send();
                            return;
                        }

                        try {
                            // Generate PDF Content
                            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.budget', ['budget' => $record]);
                            $pdfContent = $pdf->output();

                            // Send Email Manually
                            \Illuminate\Support\Facades\Mail::send('emails.budget', ['budget' => $record], function($message) use ($record, $pdfContent) {
                                $message->to($record->customer->email)
                                        ->subject("Orçamento #{$record->id} - TE Geradores Manaus")
                                        ->attachData($pdfContent, "Orcamento-{$record->id}.pdf", [
                                            'mime' => 'application/pdf',
                                        ]);
                            });
                            
                            $record->update(['status' => 'sent']);

                            \Filament\Notifications\Notification::make()
                                ->title('Sucesso')
                                ->body('Orçamento enviado com sucesso!')
                                ->success()
                                ->send();
                        } catch (\Exception $e) {
                            \Filament\Notifications\Notification::make()
                                ->title('Erro ao enviar')
                                ->body('Ocorreu um erro ao tentar enviar o email: ' . $e->getMessage())
                                ->danger()
                                ->send();
                        }
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBudgets::route('/'),
            'create' => Pages\CreateBudget::route('/create'),
            'edit' => Pages\EditBudget::route('/{record}/edit'),
        ];
    }
}
