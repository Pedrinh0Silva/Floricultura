<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Produto: ') }} {{ $produto->nome }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('produtos.update', $produto->id) }}" method="POST">
                    @csrf
                    @method('PUT') <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nome do Produto</label>
                            <input type="text" name="nome" value="{{ $produto->nome }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Categoria</label>
                            <input type="text" name="categoria" value="{{ $produto->categoria }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Quantidade em Estoque</label>
                            <input type="number" name="quantidade" value="{{ $produto->quantidade }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 font-bold text-blue-600" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Estoque Mínimo (Alerta)</label>
                            <input type="number" name="estoque_minimo" value="{{ $produto->estoque_minimo }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Preço Unitário (R$)</label>
                            <input type="number" step="0.01" name="preco" value="{{ $produto->preco }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Fornecedor</label>
                            <input type="text" name="fornecedor" value="{{ $produto->fornecedor }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                    </div>

                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-700">Descrição</label>
                        <textarea name="descricao" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ $produto->descricao }}</textarea>
                    </div>

                    <div class="mt-6 flex items-center justify-end">
                        <a href="{{ route('produtos.index') }}" class="text-gray-600 hover:underline mr-4">Cancelar</a>
                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded shadow transition duration-150">
                            Atualizar Produto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>