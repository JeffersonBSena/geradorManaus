<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SLAResource\Pages;
use App\Filament\Resources\SLAResource\RelationManagers;
use App\Models\SLA;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SLAResource extends Resource
{
    protected static ?string $model = SLA::class;

    protected static ?string $modelLabel = 'SLA / Regra';
    protected static ?string $pluralModelLabel = 'SLAs / Regras';
    protected static ?string $navigationLabel = 'Configuração de SLA';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->label('Nome do Nível de Serviço'),
                Forms\Components\TextInput::make('resolution_time_hours')
                    ->required()
                    ->numeric()
                    ->default(24)
                    ->label('Tempo de Resolução (Horas)'),
                Forms\Components\Select::make('color')
                    ->options([
                        'info' => 'Azul (Info)',
                        'success' => 'Verde (Sucesso)',
                        'warning' => 'Amarelo (Atenção)',
                        'danger' => 'Vermelho (Perigo)',
                        'primary' => 'Padrão (Primary)',
                    ])
                    ->required()
                    ->default('info')
                    ->label('Cor Indicativa'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('resolution_time_hours')->label('Horas')->sortable(),
                Tables\Columns\TextColumn::make('color')
                    ->badge()
                    ->color(fn (string $state): string => $state),
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
            'index' => Pages\ListSLAS::route('/'),
            'create' => Pages\CreateSLA::route('/create'),
            'edit' => Pages\EditSLA::route('/{record}/edit'),
        ];
    }
}
