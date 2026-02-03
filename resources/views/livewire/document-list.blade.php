<div class="py-24 bg-gray-50 min-h-screen">
    <div class="max-w-6xl mx-auto px-4">
        <div class="bg-white rounded-[2rem] shadow-xl border border-gray-100 p-8 md:p-12 overflow-hidden relative">
            <div class="absolute top-0 left-0 w-full h-2 bg-[#e60084]"></div>

            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Histórico de Documentos</h1>
                    <p class="text-gray-500 text-sm mt-1">Gerencie e baixe seus documentos comerciais gerados.</p>
                </div>
                <a href="{{ route('documents.generator') }}" class="bg-[#e60084] text-white px-6 py-2.5 rounded-full hover:bg-pink-700 transition-all font-bold text-sm flex items-center gap-2">
                    <i class="fas fa-plus"></i> Novo Documento
                </a>
            </div>

            @if(session()->has('success'))
                <div class="mb-6 p-4 bg-green-50 text-green-700 rounded-xl border border-green-100 flex items-center gap-3">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-gray-50 text-gray-400 text-[10px] uppercase font-bold tracking-widest">
                        <tr>
                            <th class="px-6 py-4">Data</th>
                            <th class="px-6 py-4">Número</th>
                            <th class="px-6 py-4">Cliente</th>
                            <th class="px-6 py-4">Tipo</th>
                            <th class="px-6 py-4">Total</th>
                            <th class="px-6 py-4 text-right">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($documents as $doc)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ \Carbon\Carbon::parse($doc->date)->format('d/m/Y') }}
                            </td>
                            <td class="px-6 py-4 text-sm font-bold text-gray-900">
                                {{ $doc->number }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ $doc->customer_name }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-pink-50 text-[#e60084] text-[10px] font-bold uppercase rounded-full">
                                    {{ str_replace('_', ' ', $doc->type) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm font-black text-gray-900">
                                R$ {{ number_format($doc->total, 2, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button wire:click="downloadPdf({{ $doc->id }})" class="text-[#e60084] hover:text-pink-700 transition-colors flex items-center gap-1 justify-end font-bold text-xs" wire:loading.attr="disabled">
                                    <span wire:loading.remove wire:target="downloadPdf({{ $doc->id }})">Download PDF <i class="fas fa-download ml-1"></i></span>
                                    <span wire:loading wire:target="downloadPdf({{ $doc->id }})">Processando...</span>
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center gap-3">
                                    <i class="fas fa-file-invoice text-4xl text-gray-200"></i>
                                    <p class="text-gray-400 text-sm">Nenhum documento encontrado.</p>
                                    <a href="{{ route('documents.generator') }}" class="text-[#e60084] font-bold hover:underline">Gerar meu primeiro documento agora</a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-8">
                {{ $documents->links() }}
            </div>
        </div>
    </div>
</div>
