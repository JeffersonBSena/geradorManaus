<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Orçamento #{{ $budget->id }}</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 12px;
            color: #333;
            line-height: 1.5;
        }
        .header {
            width: 100%;
            border-bottom: 2px solid #e60084;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .logo {
            float: left;
            width: 150px;
        }
        .company-details {
            float: right;
            text-align: right;
        }
        .company-details h3 {
            margin: 0;
            color: #e60084;
        }
        .company-details p {
            margin: 2px 0;
            font-size: 10px;
            color: #555;
        }
        .clear {
            clear: both;
        }
        .title-section {
            text-align: center;
            margin-bottom: 30px;
        }
        .title-section h1 {
            margin: 0;
            font-size: 24px;
            color: #333;
            text-transform: uppercase;
        }
        .client-info {
            background-color: #f9f9f9;
            padding: 15px;
            margin-bottom: 30px;
            border-left: 4px solid #e60084;
        }
        .client-info table {
            width: 100%;
        }
        .client-info td {
            padding: 2px 0;
        }
        .client-label {
            font-weight: bold;
            width: 100px;
        }
        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        .items-table th {
            background-color: #f0f0f0;
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
            font-weight: bold;
            color: #333;
        }
        .items-table td {
            padding: 10px;
            border-bottom: 1px solid #eee;
        }
        .items-table .text-right {
            text-align: right;
        }
        .totals {
            width: 100%;
            margin-bottom: 40px;
        }
        .totals table {
            float: right;
            width: 300px;
            border-collapse: collapse;
        }
        .totals td {
            padding: 5px 10px;
            text-align: right;
        }
        .totals .final-total {
            font-size: 16px;
            font-weight: bold;
            color: #e60084;
            border-top: 2px solid #ddd;
            padding-top: 10px;
        }
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            text-align: center;
            font-size: 9px;
            color: #999;
            border-top: 1px solid #eee;
            padding-top: 10px;
        }
        .terms {
            margin-top: 50px;
            font-size: 10px;
            color: #666;
            page-break-inside: avoid;
        }
        .terms h4 {
            border-bottom: 1px solid #eee;
            padding-bottom: 5px;
            margin-bottom: 10px;
            color: #333;
        }
    </style>
</head>
<body>

    <div class="header">
        <div class="logo">
            <img src="{{ public_path('images/LOGO.svg') }}" style="width: 100%; max-height: 80px;">
        </div>
        <div class="company-details">
            <h3>TE Geradores Manaus Ltda.</h3>
            <p>Rua Rio Eiru, 95, Sala 20/2º Pav</p>
            <p>CD SPACE CENTER - N. Senhora das Graças</p>
            <p>Manaus - AM</p>
            <p>CNPJ: 63.988.632/0001-25</p>
            <p>(92) 99391-4237</p>
            <p>contato@geradormanaus.com.br</p>
        </div>
        <div class="clear"></div>
    </div>

    <div class="title-section">
        <h1>Orçamento #{{ str_pad($budget->id, 5, '0', STR_PAD_LEFT) }}</h1>
    </div>

    <div class="client-info">
        <table>
            <tr>
                <td class="client-label">Cliente:</td>
                <td>{{ $budget->customer->name ?? 'Consumidor' }}</td>
                <td class="client-label">Data:</td>
                <td>{{ $budget->created_at->format('d/m/Y') }}</td>
            </tr>
            <tr>
                <td class="client-label">Email:</td>
                <td>{{ $budget->customer->email ?? '-' }}</td>
                <td class="client-label">Validade:</td>
                <td>{{ $budget->valid_until ? $budget->valid_until->format('d/m/Y') : '-' }}</td>
            </tr>
            <tr>
                <td class="client-label">Telefone:</td>
                <td>{{ $budget->customer->phone ?? '-' }}</td>
                <td class="client-label">Status:</td>
                <td>
                    @switch($budget->status)
                        @case('draft') Rascunho @break
                        @case('sent') Enviado @break
                        @case('approved') Aprovado @break
                        @case('rejected') Rejeitado @break
                        @case('converted') Convertido @break
                        @default {{ $budget->status }}
                    @endswitch
                </td>
            </tr>
        </table>
    </div>

    @if($budget->description)
    <div style="margin-bottom: 20px; padding: 10px; background: #fff; border: 1px solid #eee;">
        <strong>Descrição Geral do Orçamento:</strong><br>
        {!! nl2br(e($budget->description)) !!}
    </div>
    @endif

    <table class="items-table">
        <thead>
            <tr>
                <th style="width: 40%">Item / Serviço</th>
                <th style="width: 10%" class="text-right">Qtd</th>
                <th style="width: 20%" class="text-right">V. Unit.</th>
                <th style="width: 20%" class="text-right">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($budget->items as $item)
            <tr>
                <td>
                    <b>{{ $item->product->name ?? 'Item Personalizado' }}</b><br>
                    <span style="font-size: 10px; color: #666;">{{ $item->description }}</span>
                </td>
                <td class="text-right">{{ $item->quantity }}</td>
                <td class="text-right">R$ {{ number_format($item->unit_price, 2, ',', '.') }}</td>
                <td class="text-right">R$ {{ number_format($item->total_price ?? ($item->quantity * $item->unit_price), 2, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="totals">
        <table>
             <tr>
                <td><strong>Total:</strong></td>
                <td class="final-total">R$ {{ number_format($budget->total_amount, 2, ',', '.') }}</td>
            </tr>
        </table>
        <div class="clear"></div>
    </div>

    @if($budget->payment_terms)
    <div style="margin-bottom: 20px; border-top: 2px solid #ddd; padding-top: 10px;">
        <h4 style="margin: 0 0 10px 0; color: #333;">Formas de Pagamento</h4>
        <div style="font-size: 11px;">
            {!! nl2br(e($budget->payment_terms)) !!}
        </div>
    </div>
    @endif

    <div class="terms">
        <h4>Condições Gerais</h4>
        <ul>
            <li>A validade deste orçamento é de acordo com a data informada acima.</li>
            <li>Pagamento conforme combinado com o departamento comercial.</li>
            <li>Prazo de entrega sujeito a disponibilidade em estoque.</li>
            <li>Garantia dos serviços e equipamentos conforme fabricante/lei vigente.</li>
        </ul>
    </div>

    <div class="footer">
        Documento validado digitalmente. Token: <strong>{{ $budget->validation_token }}</strong><br>
        Verifique a autenticidade deste documento em: <strong>https://geradormanaus.com.br/verificar-orcamento</strong><br>
        Gerado em {{ date('d/m/Y H:i') }} por TE Geradores Manaus - Sistema de Gestão
    </div>

</body>
</html>
