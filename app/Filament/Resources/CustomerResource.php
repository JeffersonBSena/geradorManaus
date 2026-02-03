<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $modelLabel = 'Cliente';
    protected static ?string $pluralModelLabel = 'Clientes';
    protected static ?string $navigationLabel = 'Clientes';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('type')
                    ->options([
                        'individual' => 'Pessoa Física',
                        'company' => 'Pessoa Jurídica',
                    ])
                    ->required()
                    ->default('individual'),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Nome/Razão Social')
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->label('Telefone/WhatsApp')
                    ->maxLength(255),
                Forms\Components\TextInput::make('document_number')
                    ->label('CPF/CNPJ')
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function ($state, Forms\Set $set) {
                        if (!$state) return;
                        
                        // Remove non-numeric characters
                        $cnpj = preg_replace('/[^0-9]/', '', $state);
                        
                        // Check if it's a valid CNPJ length (14 digits)
                        if (strlen($cnpj) !== 14) {
                            return;
                        }

                        $data = \App\Services\BrasilApiService::searchCnpj($cnpj);
                        if ($data) {
                            $set('name', $data['razao_social'] ?? null);
                            
                            // Fill address if available
                            if (isset($data['cep'])) {
                                $set('zip_code', $data['cep']);
                                $set('street', $data['logradouro'] ?? null);
                                $set('number', $data['numero'] ?? null);
                                $set('neighborhood', $data['bairro'] ?? null);
                                $set('city', $data['municipio'] ?? null);
                                $set('state', $data['uf'] ?? null);
                                $set('complement', $data['complemento'] ?? null);
                            }
                        }
                    }),
                Forms\Components\Select::make('status')
                    ->options([
                        'lead' => 'Lead',
                        'prospect' => 'Prospect',
                        'active' => 'Ativo',
                        'inactive' => 'Inativo',
                    ])
                    ->default('lead')
                    ->required(),
                Forms\Components\Section::make('Endereço')
                    ->schema([
                        Forms\Components\TextInput::make('zip_code')
                            ->label('CEP')
                            ->mask('99999-999')
                            ->live(onBlur: true)
                            ->afterStateUpdated(function ($state, Forms\Set $set) {
                                if (!$state) return;
                                $data = \App\Services\ViaCepService::search($state);
                                if ($data) {
                                    $set('street', $data['logradouro'] ?? null);
                                    $set('neighborhood', $data['bairro'] ?? null);
                                    $set('city', $data['localidade'] ?? null);
                                    $set('state', $data['uf'] ?? null);
                                    $set('complement', $data['complemento'] ?? null);
                                }
                            }),
                        Forms\Components\TextInput::make('street')
                            ->label('Logradouro')
                            ->required()
                            ->columnSpan(2),
                        Forms\Components\TextInput::make('number')
                            ->label('Número')
                            ->required(),
                        Forms\Components\TextInput::make('neighborhood')
                            ->label('Bairro')
                            ->required(),
                        Forms\Components\TextInput::make('city')
                            ->label('Cidade')
                            ->required(),
                        Forms\Components\TextInput::make('state')
                            ->label('Estado')
                            ->required()
                            ->maxLength(2),
                        Forms\Components\TextInput::make('complement')
                            ->label('Complemento')
                            ->columnSpan(2),
                    ])->columns(3),
                Forms\Components\Textarea::make('notes')
                    ->label('Observações')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->label('Tipo')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'individual' => 'Pessoa Física',
                        'company' => 'Pessoa Jurídica',
                        default => $state,
                    })
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'individual' => 'info',
                        'company' => 'warning',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'lead' => 'gray',
                        'prospect' => 'info',
                        'active' => 'success',
                        'inactive' => 'danger',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Telefone'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
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
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
