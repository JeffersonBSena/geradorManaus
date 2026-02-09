<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MaintenanceReportResource\Pages;
use App\Filament\Resources\MaintenanceReportResource\RelationManagers;
use App\Models\MaintenanceReport;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Actions\Action;

class MaintenanceReportResource extends Resource
{
    protected static ?string $model = MaintenanceReport::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Relatório de Manutenção';

    protected static ?string $pluralModelLabel = 'Relatórios de Manutenção';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Dados do Cliente')
                    ->schema([
                        Select::make('customer_id')
                            ->relationship('customer', 'name')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->label('Cliente')
                            ->createOptionForm([
                                TextInput::make('name')->required(),
                                TextInput::make('phone'),
                                TextInput::make('address'),
                            ]),
                        DatePicker::make('maintenance_date')
                            ->label('Data da Manutenção')
                            ->default(now())
                            ->required(),
                        Radio::make('service_type')
                            ->label('Tipo de Atendimento')
                            ->options([
                                'preventive' => 'Preventiva',
                                'corrective' => 'Corretiva',
                            ])
                            ->default('preventive')
                            ->inline(),
                    ])->columns(3),

                Section::make('Identificação do Equipamento')
                    ->schema([
                        TextInput::make('equipment_name')
                            ->label('Equipamento')
                            ->default('Grupo Gerador')
                            ->required(),
                        TextInput::make('brand_model')
                            ->label('Marca/Modelo'),
                        TextInput::make('serial_number')
                            ->label('Número de Série'),
                        TextInput::make('power')
                            ->label('Potência'),
                        TextInput::make('hour_meter')
                            ->label('Horímetro'),
                        TextInput::make('installation_location')
                            ->label('Local de Instalação'),
                    ])->columns(3),

                Section::make('Checklist da Manutenção Preventiva')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Section::make('Inspeção Geral')
                                    ->schema([
                                        CheckboxList::make('checklist.general')
                                            ->label('')
                                            ->options([
                                                'visual_check' => 'Verificação visual do equipamento',
                                                'cleaning' => 'Limpeza geral do gerador',
                                                'leaks' => 'Verificação de vazamentos (óleo/combustível/água)',
                                                'noise' => 'Verificação de ruídos e vibrações anormais',
                                            ]),
                                    ])->columnSpan(1),
                                Section::make('Sistema do Motor')
                                    ->schema([
                                        CheckboxList::make('checklist.motor')
                                            ->label('')
                                            ->options([
                                                'oil_level' => 'Verificação do nível de óleo lubrificante',
                                                'oil_filter' => 'Verificação do filtro de óleo',
                                                'fuel_filter' => 'Verificação do filtro de combustível',
                                                'air_filter' => 'Verificação do filtro de ar',
                                                'cooling_system' => 'Verificação do sistema de arrefecimento',
                                                'hoses_belts' => 'Verificação de mangueiras e correias',
                                            ]),
                                    ])->columnSpan(1),
                                Section::make('Sistema Elétrico')
                                    ->schema([
                                        CheckboxList::make('checklist.electrical')
                                            ->label('')
                                            ->options([
                                                'battery' => 'Verificação da bateria',
                                                'start_test' => 'Teste de partida automática',
                                                'cables' => 'Verificação de cabos e conexões',
                                                'panel_test' => 'Teste do painel de controle',
                                                'voltage_freq' => 'Teste de tensão e frequência',
                                            ]),
                                    ])->columnSpan(1),
                                Section::make('Teste Operacional')
                                    ->schema([
                                        CheckboxList::make('checklist.operational')
                                            ->label('')
                                            ->options([
                                                'no_load' => 'Teste em vazio',
                                                'load' => 'Teste com carga',
                                                'params' => 'Verificação de parâmetros operacionais',
                                            ]),
                                    ])->columnSpan(1),
                            ]),
                    ]),

                Section::make('Serviços Realizados')
                    ->schema([
                        RichEditor::make('services_performed')
                            ->label('Descrição dos Serviços')
                            ->columnSpanFull(),
                    ]),

                Section::make('Peças / Materiais Utilizados')
                    ->schema([
                        Repeater::make('items')
                            ->label('Itens Utilizados')
                            ->relationship()
                            ->schema([
                                Select::make('product_id')
                                    ->relationship('product', 'name')
                                    ->label('Produto')
                                    ->searchable()
                                    ->preload()
                                    ->reactive()
                                    ->afterStateUpdated(fn ($state, callable $set) => $set('item_name', \App\Models\Product::find($state)?->name)),
                                TextInput::make('item_name')
                                    ->label('Descrição')
                                    ->required(),
                                TextInput::make('quantity')
                                    ->label('Quantidade')
                                    ->numeric()
                                    ->default(1)
                                    ->required(),
                            ])
                            ->columns(3)
                            ->defaultItems(0),
                    ]),

                Section::make('Registro Fotográfico')
                    ->schema([
                        FileUpload::make('photos')
                            ->label('Fotos (Antes/Durante/Depois)')
                            ->multiple()
                            ->image()
                            ->directory('maintenance-reports')
                            ->columnSpanFull(),
                    ]),
                
                Section::make('Observações e Conclusão')
                    ->schema([
                        Textarea::make('observations')
                            ->label('Observações e Recomendações'),
                        Radio::make('status')
                            ->label('Status Final')
                            ->options([
                                'completed' => 'Em pleno funcionamento',
                                'recommendations' => 'Funcionando com recomendações',
                                'needs_repair' => 'Necessita manutenção corretiva',
                            ])
                            ->default('completed'),
                    ]),

                Section::make('Assinaturas')
                    ->schema([
                        Select::make('user_id')
                            ->label('Técnico Responsável')
                            ->relationship('technician', 'name')
                            ->default(auth()->id())
                            ->required(),
                        FileUpload::make('technician_signature_path')
                            ->label('Assinatura do Técnico')
                            ->image()
                            ->directory('signatures'),
                         FileUpload::make('client_signature_path')
                            ->label('Assinatura do Responsável pelo Cliente')
                            ->image()
                            ->directory('signatures'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('maintenance_date')
                    ->label('Data')
                    ->date()
                    ->sortable(),
                TextColumn::make('customer.name')
                    ->label('Cliente')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('technician.name')
                    ->label('Técnico')
                    ->sortable(),
                TextColumn::make('equipment_name')
                    ->label('Equipamento'),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'completed' => 'success',
                        'recommendations' => 'warning',
                        'needs_repair' => 'danger',
                        default => 'gray',
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Action::make('print')
                    ->label('Imprimir PDF')
                    ->icon('heroicon-o-printer')
                    ->url(fn (MaintenanceReport $record) => route('maintenance-report.pdf', $record))
                    ->openUrlInNewTab(),
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
            'index' => Pages\ListMaintenanceReports::route('/'),
            'create' => Pages\CreateMaintenanceReport::route('/create'),
            'edit' => Pages\EditMaintenanceReport::route('/{record}/edit'),
        ];
    }
}
