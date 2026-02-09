<!DOCTYPE html>
<html>
<head>
    <title>Orçamento TE Geradores Manaus</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">

    <p>Olá, <strong>{{ $budget->customer->name }}</strong>.</p>

    <p>Conforme solicitado, segue em anexo o orçamento <strong>#{{ $budget->id }}</strong> referente aos produtos/serviços de seu interesse.</p>

    <p>
        <strong>Valor Total:</strong> R$ {{ number_format($budget->total_amount, 2, ',', '.') }}<br>
        <strong>Validade:</strong> {{ $budget->valid_until->format('d/m/Y') }}
    </p>

    <p>Caso tenha alguma dúvida ou necessite de alterações, por favor, entre em contato conosco.</p>

    <p>Atenciosamente,</p>

    <p>
        <strong>TE Geradores Manaus</strong><br>
        (92) 99391-4237<br>
        contato@geradormanaus.com.br
    </p>

</body>
</html>
