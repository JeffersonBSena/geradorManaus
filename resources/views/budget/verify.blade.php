<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verificar Orçamento - TE Geradores Manaus</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">

    <!-- Header -->
    <header class="bg-white shadow-sm p-4 text-center">
        <a href="/">
            <img src="{{ asset('images/LOGO.svg') }}" alt="Logo" class="h-10 mx-auto">
        </a>
    </header>

    <!-- Main Content -->
    <main class="flex-grow flex items-center justify-center p-6">
        <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-lg">
            <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Verificar Autenticidade</h1>

            <!-- Search Form -->
            <form action="{{ route('budget.verify') }}" method="GET" class="mb-6">
                <label for="token" class="block text-sm font-medium text-gray-700 mb-2">Código de Validação</label>
                <div class="flex gap-2">
                    <input type="text" name="token" id="token" value="{{ $searchToken }}" 
                           placeholder="Ex: B123-A1B2" 
                           class="w-full border-gray-300 border p-2 rounded focus:ring ring-pink-500 focus:outline-none uppercase" required>
                    <button type="submit" class="bg-[#e60084] text-white px-4 py-2 rounded hover:bg-pink-700 transition">Verificar</button>
                </div>
            </form>

            @if($status)
                <!-- Result Section -->
                <div class="mt-6 border-t pt-6">
                    @if($status === 'valid')
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <strong class="font-bold">Sucesso!</strong>
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                    @elseif($status === 'expired')
                        <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <strong class="font-bold">Atenção!</strong>
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                    @else
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <strong class="font-bold">Inválido!</strong>
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                    @endif

                    @if($budget)
                        <!-- Budget Details -->
                        <div class="space-y-3 text-sm">
                            <div class="flex justify-between border-b pb-2">
                                <span class="font-medium text-gray-600">Cliente:</span>
                                <span class="text-gray-900">{{ $budget->customer->name ?? 'N/A' }}</span>
                            </div>
                            <div class="flex justify-between border-b pb-2">
                                <span class="font-medium text-gray-600">Data de Emissão:</span>
                                <span class="text-gray-900">{{ $budget->created_at->format('d/m/Y H:i') }}</span>
                            </div>
                            <div class="flex justify-between border-b pb-2">
                                <span class="font-medium text-gray-600">Validade:</span>
                                <span class="text-gray-900 {{ $status === 'expired' ? 'text-red-600 font-bold' : '' }}">
                                    {{ $budget->valid_until ? $budget->valid_until->format('d/m/Y') : '-' }}
                                </span>
                            </div>
                            <div class="flex justify-between border-b pb-2">
                                <span class="font-medium text-gray-600">Valor Total:</span>
                                <span class="font-bold text-gray-900">R$ {{ number_format($budget->total_amount, 2, ',', '.') }}</span>
                            </div>
                            <div class="pt-2 text-center text-xs text-gray-500">
                                ID do Orçamento: #{{ str_pad($budget->id, 5, '0', STR_PAD_LEFT) }}
                            </div>
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </main>

    <!-- Footer -->
    <footer class="text-center p-4 text-gray-500 text-sm">
        &copy; {{ date('Y') }} TE Geradores Manaus. Todos os direitos reservados.
    </footer>

</body>
</html>
