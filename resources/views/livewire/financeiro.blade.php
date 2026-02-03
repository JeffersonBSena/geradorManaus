<div class="py-24 bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4">
        <div class="bg-white rounded-[2rem] shadow-xl border border-gray-100 p-8 md:p-12 overflow-hidden relative">
            <!-- Detalhe rosa no topo do card -->
            <div class="absolute top-0 left-0 w-full h-2 bg-[#e60084]"></div>

            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Mini Financeiro</h1>
                    <p class="text-gray-500">Painel de controle interno e gestão</p>
                </div>
                <div class="bg-pink-50 text-[#e60084] px-4 py-2 rounded-full text-xs font-bold uppercase tracking-widest">
                    Acesso Restrito
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6 mb-12">
                <div class="p-6 bg-gray-50 rounded-2xl border border-gray-100">
                    <p class="text-sm text-gray-400 uppercase font-bold tracking-widest mb-1">Total Emitido</p>
                    <p class="text-3xl font-black text-gray-800 italic">R$ {{ number_format($totalSaldo, 2, ',', '.') }}</p>
                </div>
                <div class="p-6 bg-gray-50 rounded-2xl border border-gray-100">
                    <p class="text-sm text-gray-400 uppercase font-bold tracking-widest mb-1">Total de Documentos</p>
                    <p class="text-3xl font-black text-gray-800">{{ $pendenciasCount }}</p>
                </div>
            </div>

            <!-- Seção de Documentos -->
            <div class="mb-12">
                <h2 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4">Gestão de Documentos</h2>
                <div class="grid md:grid-cols-2 gap-4">
                    <a href="{{ route('documents.generator') }}" class="group p-6 bg-white border border-gray-100 rounded-2xl shadow-sm hover:shadow-md hover:border-[#e60084]/20 transition-all flex items-center gap-4">
                        <div class="w-12 h-12 bg-pink-50 rounded-xl flex items-center justify-center text-[#e60084] group-hover:bg-[#e60084] group-hover:text-white transition-colors">
                            <i class="fas fa-file-circle-plus text-xl"></i>
                        </div>
                        <div>
                            <p class="font-bold text-gray-900">Novo Documento</p>
                            <p class="text-xs text-gray-500">Gerar orçamento ou recibo</p>
                        </div>
                    </a>

                    <a href="{{ route('documents.list') }}" class="group p-6 bg-white border border-gray-100 rounded-2xl shadow-sm hover:shadow-md hover:border-[#e60084]/20 transition-all flex items-center gap-4">
                        <div class="w-12 h-12 bg-gray-50 rounded-xl flex items-center justify-center text-gray-400 group-hover:bg-gray-900 group-hover:text-white transition-colors">
                            <i class="fas fa-history text-xl"></i>
                        </div>
                        <div>
                            <p class="font-bold text-gray-900">Histórico</p>
                            <p class="text-xs text-gray-500">Ver e baixar PDFs gerados</p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="space-y-4 mb-12 text-gray-600 leading-relaxed">
                <div class="p-6 bg-blue-50/50 rounded-2xl border border-blue-100 flex gap-4">
                    <i class="fas fa-info-circle text-blue-500 text-xl mt-1"></i>
                    <div>
                        <p class="font-bold text-blue-900 mb-1">Aviso de Faturamento</p>
                        <p class="text-sm text-blue-800/80">O módulo de faturamento avançado e controle de despesas será integrado futuramente. Use o Gerador de Documentos acima para suas emissões atuais.</p>
                    </div>
                </div>
            </div>
            
            <div class="flex items-center justify-between pt-8 border-t border-gray-100">
                <a href="{{ route('home') }}" class="text-gray-400 hover:text-[#e60084] transition-colors flex items-center gap-2 font-semibold">
                    <i class="fas fa-arrow-left text-xs"></i> Voltar ao Site
                </a>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-gray-100 hover:bg-gray-200 text-gray-600 px-6 py-2 rounded-xl transition-all font-bold text-sm">
                        Sair do Painel
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
