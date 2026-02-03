<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $document->number }}</title>
    <style>
        body { font-family: 'Helvetica', sans-serif; color: #333; margin: 0; padding: 0; }
        .header { padding: 30px; border-bottom: 5px solid #e60084; }
        .logo { height: 50px; }
        .doc-info { margin-top: 20px; text-align: right; }
        .doc-title { font-size: 24px; font-weight: bold; color: #e60084; text-transform: uppercase; margin: 0; }
        .doc-meta { font-size: 12px; color: #777; margin-top: 5px; }
        
        .content { padding: 30px; }
        .section-title { font-size: 10px; font-weight: bold; color: #aaa; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 10px; border-bottom: 1px solid #eee; padding-bottom: 5px; }
        
        .customer-box { margin-bottom: 30px; }
        .customer-name { font-size: 16px; font-weight: bold; margin-bottom: 5px; }
        .customer-detail { font-size: 12px; color: #555; }
        
        .items-table { w-full; border-collapse: collapse; margin-top: 20px; width: 100%; }
        .items-table th { background: #f9f9f9; text-align: left; font-size: 10px; font-weight: bold; text-transform: uppercase; color: #999; padding: 10px; border-bottom: 2px solid #eee; }
        .items-table td { padding: 12px 10px; border-bottom: 1px solid #eee; font-size: 12px; }
        .items-table .text-right { text-align: right; }
        
        .totals-table { margin-top: 30px; width: 300px; margin-left: auto; }
        .totals-table td { padding: 5px 10px; font-size: 12px; }
        .totals-table .total-row td { border-top: 2px solid #e60084; font-weight: bold; font-size: 16px; color: #e60084; padding-top: 10px; }
        
        .footer { position: fixed; bottom: 0; width: 100%; padding: 20px; text-align: center; font-size: 10px; color: #aaa; border-top: 1px solid #eee; }

        .object-box { background: #fcfcfc; padding: 15px; border-left: 4px solid #f0f0f0; margin-bottom: 30px; font-size: 13px; font-style: italic; color: #444; }
    </style>
</head>
<body>
    <div class="header">
        <table style="width: 100%;">
            <tr>
                <td>
                    <h1 style="margin:0; font-size: 20px;">GESTOR DE ENERGIA</h1>
                    <span style="font-size: 10px; color: #e60084; font-weight: bold;">TE GERADORES MANAUS</span>
                </td>
                <td class="doc-info">
                    <p class="doc-title">{{ str_replace('_', ' ', $document->type) }}</p>
                    <p class="doc-meta">Nº: {{ $document->number }} | Data: {{ \Carbon\Carbon::parse($document->date)->format('d/m/Y') }}</p>
                </td>
            </tr>
        </table>
    </div>

    <div class="content">
        <div class="customer-box">
            <div class="section-title">Dados do Cliente</div>
            <div class="customer-name">{{ $document->customer_name }}</div>
            @if($document->customer_identifier)
                <div class="customer-detail">Doc: {{ $document->customer_identifier }}</div>
            @endif
        </div>

        @if($document->object)
            <div class="section-title">Objeto do Documento</div>
            <div class="object-box">
                {{ $document->object }}
            </div>
        @endif

        <div class="section-title">Itens e Serviços</div>
        <table class="items-table">
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th class="text-right" style="width: 60px;">Qtd</th>
                    <th class="text-right" style="width: 100px;">Unitário</th>
                    <th class="text-right" style="width: 100px;">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($document->items as $item)
                <tr>
                    <td>{{ $item->description }}</td>
                    <td class="text-right">{{ number_format($item->quantity, 2, ',', '.') }}</td>
                    <td class="text-right">R$ {{ number_format($item->unit_value, 2, ',', '.') }}</td>
                    <td class="text-right">R$ {{ number_format($item->total_value, 2, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <table class="totals-table">
            <tr>
                <td>Subtotal:</td>
                <td class="text-right">R$ {{ number_format($document->subtotal, 2, ',', '.') }}</td>
            </tr>
            @if($document->discount > 0)
            <tr>
                <td>Desconto:</td>
                <td class="text-right">- R$ {{ number_format($document->discount, 2, ',', '.') }}</td>
            </tr>
            @endif
            <tr class="total-row">
                <td>TOTAL:</td>
                <td class="text-right">R$ {{ number_format($document->total, 2, ',', '.') }}</td>
            </tr>
        </table>
    </div>

    <div class="footer">
        © {{ date('Y') }} TE GERADORES MANAUS - Rua Rio Eiru, 95, Sala 20 - CD Space Center - N. Sra. das Graças, Manaus/AM.<br>
        (92) 99391-4237 | contato@geradormanaus.com.br
    </div>
</body>
</html>
