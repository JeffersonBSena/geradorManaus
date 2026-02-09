<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Relatório de Manutenção #{{ $record->id }}</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 11px;
            color: #333;
            line-height: 1.3;
        }
        .header {
            width: 100%;
            border-bottom: 2px solid #e60084;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
        .logo {
            float: left;
            width: 120px;
        }
        .company-details {
            float: right;
            text-align: right;
        }
        .company-details h3 {
            margin: 0;
            color: #e60084;
            font-size: 14px;
        }
        .company-details p {
            margin: 2px 0;
            font-size: 9px;
            color: #555;
        }
        .clear {
            clear: both;
        }
        .section-title {
            background-color: #e60084;
            color: #fff;
            padding: 5px 10px;
            font-weight: bold;
            margin-top: 15px;
            margin-bottom: 10px;
            font-size: 12px;
            text-transform: uppercase;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        td, th {
            padding: 4px;
            border: 1px solid #ddd;
            vertical-align: top;
        }
        .label {
            font-weight: bold;
            background-color: #f9f9f9;
            width: 25%;
        }
        .check-group {
            margin-bottom: 10px;
        }
        .check-item {
            margin-bottom: 2px;
        }
        .services-box {
            border: 1px solid #ddd;
            padding: 10px;
            min-height: 50px;
            background: #fff;
        }
        .signatures {
            margin-top: 30px;
            width: 100%;
        }
        .signature-box {
            width: 45%;
            float: left;
            text-align: center;
            border-top: 1px solid #333;
            margin-right: 5%;
            padding-top: 5px;
        }
        .photos-grid {
            width: 100%;
            margin-top: 10px;
        }
        .photo-item {
            float: left;
            width: 48%; /* 2 per row */
            margin-right: 2%;
            margin-bottom: 10px;
            border: 1px solid #eee;
            padding: 2px;
        }
        .photo-item img {
            width: 100%;
            height: auto;
            max-height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>

    <div class="header">
        <div class="logo">
             <img src="{{ public_path('images/LOGO.svg') }}" style="width: 100%;">
        </div>
        <div class="company-details">
            <h3>RELATÓRIO TÉCNICO DE MANUTENÇÃO PREVENTIVA DE GERADOR</h3>
            <p>TE Geradores Manaus LTDA</p>
            <p>CNPJ: 63.988.632/0001-25</p>
            <p>Rua Rio Eiru, nº 95 – Nossa Senhora das Graças – Manaus/AM</p>
            <p>Telefone: (92) 99391-4237</p>
            <p>E-mail: contato@geradormanaus.com.br</p>
        </div>
        <div class="clear"></div>
    </div>

    <!-- 1. DADOS DO CLIENTE -->
    <div class="section-title">1. DADOS DO CLIENTE</div>
    <table>
        <tr>
            <td class="label">Cliente:</td>
            <td>{{ $record->customer->name }}</td>
            <td class="label">Data:</td>
            <td>{{ $record->maintenance_date->format('d/m/Y') }}</td>
        </tr>
        <tr>
            <td class="label">CNPJ/CPF:</td>
            <td>{{ $record->customer->document_number }}</td>
            <td class="label">Responsável:</td>
            <td>{{ $record->customer->name }}</td> <!-- Assuming customer name is responsible or add field -->
        </tr>
        <tr>
            <td class="label">Endereço:</td>
            <td colspan="3">{{ $record->customer->address }}</td>
        </tr>
        <tr>
            <td class="label">Telefone:</td>
            <td>{{ $record->customer->phone }}</td>
            <td class="label">Tipo:</td>
            <td>
                ( {{ $record->service_type === 'preventive' ? 'X' : ' ' }} ) Preventiva &nbsp;&nbsp;
                ( {{ $record->service_type === 'corrective' ? 'X' : ' ' }} ) Corretiva
            </td>
        </tr>
    </table>

    <!-- 2. IDENTIFICAÇÃO DO EQUIPAMENTO -->
    <div class="section-title">2. IDENTIFICAÇÃO DO EQUIPAMENTO</div>
    <table>
        <tr>
            <td class="label">Equipamento:</td>
            <td>{{ $record->equipment_name }}</td>
            <td class="label">Horímetro:</td>
            <td>{{ $record->hour_meter }} horas</td>
        </tr>
        <tr>
            <td class="label">Marca/Modelo:</td>
            <td>{{ $record->brand_model }}</td>
            <td class="label">Potência:</td>
            <td>{{ $record->power }}</td>
        </tr>
        <tr>
            <td class="label">Nº Série:</td>
            <td>{{ $record->serial_number }}</td>
            <td class="label">Local:</td>
            <td>{{ $record->installation_location }}</td>
        </tr>
    </table>

    <!-- 3. CHECKLIST -->
    <div class="section-title">3. CHECKLIST DA MANUTENÇÃO PREVENTIVA</div>
    
    @php
        $checklist = $record->checklist ?? [];
        $sections = [
            'Inspeção Geral' => [
                'visual_check' => 'Verificação visual do equipamento',
                'cleaning' => 'Limpeza geral do gerador',
                'leaks' => 'Verificação de vazamentos (óleo/combustível/água)',
                'noise' => 'Verificação de ruídos e vibrações anormais',
            ],
            'Sistema do Motor' => [
                'oil_level' => 'Verificação do nível de óleo lubrificante',
                'oil_filter' => 'Verificação do filtro de óleo',
                'fuel_filter' => 'Verificação do filtro de combustível',
                'air_filter' => 'Verificação do filtro de ar',
                'cooling_system' => 'Verificação do sistema de arrefecimento',
                'hoses_belts' => 'Verificação de mangueiras e correias',
            ],
            'Sistema Elétrico' => [
                'battery' => 'Verificação da bateria',
                'start_test' => 'Teste de partida automática',
                'cables' => 'Verificação de cabos e conexões',
                'panel_test' => 'Teste do painel de controle',
                'voltage_freq' => 'Teste de tensão e frequência',
            ],
            'Teste Operacional' => [
                'no_load' => 'Teste em vazio',
                'load' => 'Teste com carga',
                'params' => 'Verificação de parâmetros operacionais',
            ],
        ];
    @endphp

    <table style="border: none;">
        <tr>
            @foreach(array_chunk($sections, 2, true) as $chunk)
                <td style="border: none; width: 50%; padding: 0 10px 0 0;">
                    @foreach($chunk as $title => $items)
                        <div style="margin-bottom: 10px;">
                            <strong>{{ $title }}</strong>
                            @foreach($items as $key => $label)
                                @php
                                    // Handle array structure from CheckboxList
                                    // The keys in database might be nested like checklist['general'] = ['visual_check', ...]
                                    // Or flattened depending on saving structure. 
                                    // Based on form definition: CheckboxList::make('checklist.general')
                                    // So $checklist is ['general' => [...], 'motor' => [...]]
                                    
                                    $sectionKey = match($title) {
                                        'Inspeção Geral' => 'general',
                                        'Sistema do Motor' => 'motor',
                                        'Sistema Elétrico' => 'electrical',
                                        'Teste Operacional' => 'operational',
                                    };
                                    
                                    $checked = in_array($key, $checklist[$sectionKey] ?? []);
                                @endphp
                                <div class="check-item">
                                    ( {{ $checked ? 'X' : ' ' }} ) {{ $label }}
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </td>
            @endforeach
        </tr>
    </table>

    <!-- 4. SERVIÇOS REALIZADOS -->
    <div class="section-title">4. SERVIÇOS REALIZADOS</div>
    <div class="services-box">
        {!! $record->services_performed !!}
    </div>

    <!-- 5. PEÇAS / MATERIAIS UTILIZADOS -->
    <div class="section-title">5. PEÇAS / MATERIAIS UTILIZADOS</div>
    <table>
        <thead style="background: #f0f0f0;">
            <tr>
                <th>Item</th>
                <th>Descrição</th>
                <th style="width: 50px; text-align: center;">Qtd</th>
            </tr>
        </thead>
        <tbody>
            @foreach($record->items as $item)
            <tr>
                <td>{{ $item->product->name ?? 'Outro' }}</td>
                <td>{{ $item->item_name }}</td>
                <td style="text-align: center;">{{ $item->quantity }}</td>
            </tr>
            @endforeach
            @if($record->items->isEmpty())
                <tr><td colspan="3" style="text-align: center; color: #999;">Nenhum material registrado.</td></tr>
            @endif
        </tbody>
    </table>

    <!-- 6. REGISTRO FOTOGRÁFICO -->
    @if(!empty($record->photos))
        <div class="section-title">6. REGISTRO FOTOGRÁFICO</div>
        <div class="photos-grid">
            @foreach($record->photos as $photo)
                <div class="photo-item">
                    <img src="{{ public_path('storage/' . $photo) }}" alt="Foto">
                </div>
            @endforeach
            <div class="clear"></div>
        </div>
    @endif

    <!-- 7 & 8. OBSERVAÇÕES E CONCLUSÃO -->
    <div class="section-title">7. OBSERVAÇÕES E 8. CONCLUSÃO</div>
    <table style="border: none;">
        <tr>
            <td style="border: none; width: 60%; vertical-align: top;">
                 <strong>Observações:</strong><br>
                 <div style="border: 1px solid #ddd; padding: 5px; min-height: 40px; margin-top: 5px;">
                     {{ $record->observations }}
                 </div>
            </td>
            <td style="border: none; width: 40%; vertical-align: top; padding-left: 10px;">
                <strong>Situação Final:</strong><br>
                <div style="margin-top: 5px;">
                    ( {{ $record->status === 'completed' ? 'X' : ' ' }} ) Em pleno funcionamento<br>
                    ( {{ $record->status === 'recommendations' ? 'X' : ' ' }} ) Com recomendações<br>
                    ( {{ $record->status === 'needs_repair' ? 'X' : ' ' }} ) Necessita Corretiva
                </div>
            </td>
        </tr>
    </table>

    <!-- 9. ASSINATURAS -->
    <div class="signatures">
        <div class="signature-box">
            @if($record->technician_signature_path)
                <img src="{{ public_path('storage/' . $record->technician_signature_path) }}" style="height: 50px;"><br>
            @else
                <br><br><br>
            @endif
            ________________________________________<br>
            <strong>{{ $record->technician->name }}</strong><br>
            Técnico Responsável<br>
            Data: {{ $record->maintenance_date->format('d/m/Y') }}
        </div>

        <div class="signature-box" style="float: right; margin-right: 0;">
             @if($record->client_signature_path)
                <img src="{{ public_path('storage/' . $record->client_signature_path) }}" style="height: 50px;"><br>
            @else
                <br><br><br>
            @endif
            ________________________________________<br>
            <strong>{{ $record->customer->name }}</strong><br>
            Responsável pelo Cliente
        </div>
        <div class="clear"></div>
    </div>

</body>
</html>
