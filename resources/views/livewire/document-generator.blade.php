<div class="py-24 bg-gray-50 min-h-screen">
    <div class="max-w-6xl mx-auto px-4">
        <div class="bg-white rounded-[2rem] shadow-xl border border-gray-100 p-8 md:p-12 overflow-hidden relative">
            <div class="absolute top-0 left-0 w-full h-2 bg-[#e60084]"></div>

            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Gerador de Documentos</h1>
                <a href="{{ route('documents.list') }}" class="text-[#e60084] font-semibold hover:underline flex items-center gap-2">
                    <i class="fas fa-history text-xs"></i> Ver Histórico
                </a>
            </div>

            <form wire:submit.prevent="save" class="space-y-8">
                <!-- Cabeçalho do Documento -->
                <div class="grid md:grid-cols-3 gap-6 p-6 bg-gray-50 rounded-2xl border border-gray-100">
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Tipo de Documento</label>
                        <select wire:model="type" class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-[#e60084] outline-none">
                            <option value="orcamento">Orçamento</option>
                            <option value="recibo">Recibo</option>
                            <option value="nota_promissoria">Nota Promissória</option>
                            <option value="contrato_locacao">Contrato de Locação</option>
                            <option value="contrato_venda">Contrato de Venda</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Número</label>
                        <input type="text" wire:model="number" class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-[#e60084] outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Data</label>
                        <input type="date" wire:model="date" class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-[#e60084] outline-none">
                    </div>
                </div>

                <!-- Dados do Cliente -->
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Nome do Cliente / Empresa</label>
                        <input type="text" wire:model="customer_name" placeholder="Ex: João da Silva ou Empresa LTDA" class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-[#e60084] outline-none">
                        @error('customer_name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">CPF / CNPJ (Opcional)</label>
                        <input type="text" wire:model="customer_identifier" placeholder="000.000.000-00" class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-[#e60084] outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Objeto / Breve Descrição</label>
                    <textarea wire:model="object" rows="2" placeholder="Ex: Locação de Gerador 55kVA para Evento Social" class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-[#e60084] outline-none"></textarea>
                </div>

                <!-- Tabela de Itens -->
                <div>
                    <div class="flex justify-between items-center mb-4">
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-widest">Itens do Documento</label>
                        <button type="button" wire:click="addItem" class="text-xs font-bold bg-[#e60084] text-white px-4 py-2 rounded-lg hover:bg-pink-700 transition-all flex items-center gap-2">
                            <i class="fas fa-plus"></i> Adicionar Item
                        </button>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-gray-50 text-gray-400 text-[10px] uppercase font-bold tracking-tighter">
                                <tr>
                                    <th class="px-4 py-3">Descrição</th>
                                    <th class="px-4 py-3 w-24">Qtd</th>
                                    <th class="px-4 py-3 w-40">V. Unitário</th>
                                    <th class="px-4 py-3 w-40">Total</th>
                                    <th class="px-4 py-3 w-16"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($items as $index => $item)
                                <tr wire:key="item-{{ $index }}">
                                    <td class="px-4 py-3">
                                        <input type="text" wire:model.blur="items.{{ $index }}.description" placeholder="Descrição do serviço ou produto" class="w-full border-none focus:ring-0 text-sm p-0">
                                        @error("items.{$index}.description") <span class="text-red-500 text-[10px]">{{ $message }}</span> @enderror
                                    </td>
                                    <td class="px-4 py-3">
                                        <input type="number" step="0.01" wire:model.blur="items.{{ $index }}.quantity" class="w-full border-none focus:ring-0 text-sm p-0 text-center">
                                    </td>
                                    <td class="px-4 py-3 px-2">
                                        <div class="flex items-center gap-1 text-sm text-gray-500">
                                            <span>R$</span>
                                            <input type="number" step="0.01" wire:model.blur="items.{{ $index }}.unit_value" class="w-full border-none focus:ring-0 text-gray-900 font-semibold p-0">
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <span class="text-sm font-bold text-gray-900 italic">R$ {{ number_format($item['total_value'], 2, ',', '.') }}</span>
                                    </td>
                                    <td class="px-4 py-3 text-right">
                                        <button type="button" wire:click="removeItem({{ $index }})" class="text-gray-300 hover:text-red-500 transition-colors">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Totais e Finalização -->
                <div class="flex flex-col md:flex-row justify-between items-start gap-8 pt-8 border-t border-gray-100">
                    <div class="w-full md:w-1/2">
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-4 italic">Observações Adicionais</label>
                        <p class="text-xs text-gray-400 leading-relaxed">
                            Este documento será processado e gerado em formato PDF. Certifique-se de que os valores e dados do cliente estão corretos antes de salvar.
                        </p>
                    </div>

                    <div class="w-full md:w-1/3 bg-gray-50 p-6 rounded-3xl border border-gray-100 space-y-3">
                        <div class="flex justify-between text-gray-500 text-sm">
                            <span>Subtotal:</span>
                            <span class="font-bold">R$ {{ number_format($subtotal, 2, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500">Desconto:</span>
                            <div class="flex items-center gap-2">
                                <span class="text-gray-400">R$</span>
                                <input type="number" step="0.01" wire:model.blur="discount" class="bg-white border border-gray-200 rounded-lg px-2 py-1 w-24 text-right font-bold text-gray-900 focus:ring-1 focus:ring-[#e60084] outline-none">
                            </div>
                        </div>
                        <div class="flex justify-between text-lg border-t border-gray-200 pt-3">
                            <span class="font-black text-gray-900 uppercase tracking-widest">Total:</span>
                            <span class="font-black text-[#e60084]">R$ {{ number_format($total, 2, ',', '.') }}</span>
                        </div>

                        <button type="submit" class="w-full bg-[#e60084] hover:bg-pink-700 text-white font-black py-4 rounded-2xl transition-all shadow-lg shadow-pink-500/30 hover:shadow-pink-600/40 transform active:scale-[0.98] flex items-center justify-center gap-3 mt-4">
                            Salvar e Gerar PDF <i class="fas fa-file-pdf"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

