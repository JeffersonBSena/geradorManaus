<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceOrderResource\Pages;
use App\Filament\Resources\ServiceOrderResource\RelationManagers;
use App\Models\ServiceOrder;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServiceOrderResource extends Resource
{
    protected static ?string $model = ServiceOrder::class;

    protected static ?string $modelLabel = 'Ordem de Serviço';
    protected static ?string $pluralModelLabel = 'Ordens de Serviço';
    protected static ?string $navigationLabel = 'Ordens de Serviço';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
                Forms\Components\Select::make('sla_id')
                    ->relationship('sla', 'name')
                    ->label('SLA / Prioridade de Tempo'),
                Forms\Components\Select::make('priority')
                    ->options([
                        'low' => 'Baixa',
                        'medium' => 'Média',
                        'high' => 'Alta',
                        'critical' => 'Crítica',
                    ])
                    ->default('medium')
                    ->required()
                    ->label('Prioridade'),
                Forms\Components\Select::make('status')
                    ->options([
                        'open' => 'Aberto',
                        'in_progress' => 'Em Andamento',
                        'pending' => 'Pendente',
                        'resolved' => 'Resolvido',
                        'closed' => 'Fechado',
                    ])
                    ->default('open')
                    ->required(),
                Forms\Components\DateTimePicker::make('opened_at')
                    ->default(now())
                    ->required()
                    ->label('Abertura'),
                Forms\Components\DateTimePicker::make('due_at')
                    ->label('Prazo de Resolução'),
                Forms\Components\DateTimePicker::make('resolved_at')
                    ->label('Resolvido em'),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull()
                    ->label('Descrição do Problema'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable()->label('OS #'),
                Tables\Columns\TextColumn::make('customer.name')->label('Cliente')->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'open' => 'primary',
                        'in_progress' => 'info',
                        'pending' => 'warning',
                        'resolved' => 'success',
                        'closed' => 'gray',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('priority')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'low' => 'gray',
                        'medium' => 'info',
                        'high' => 'warning',
                        'critical' => 'danger',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('due_at')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->label('Vencimento SLA')
                    ->color(fn ($record) => $record->due_at && $record->due_at->isPast() && !in_array($record->status, ['resolved', 'closed']) ? 'danger' : null),
                Tables\Columns\TextColumn::make('opened_at')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListServiceOrders::route('/'),
            'create' => Pages\CreateServiceOrder::route('/create'),
            'edit' => Pages\EditServiceOrder::route('/{record}/edit'),
        ];
    }
}
