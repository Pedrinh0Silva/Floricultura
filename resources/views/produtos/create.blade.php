<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastrar Novo Produto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('produtos.store') }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="nome" class="block text-sm font-medium text-gray-700">Nome do Produto</label>
                            <input type="text" name="nome" id="nome" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                        </div>

                        <div>
                            <label for="categoria" class="block text-sm font-medium text-gray-700">Categoria</label>
                            <input type="text" name="categoria" id="categoria" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                        </div>

                        <div>
                            <label for="quantidade" class="block text-sm font-medium text-gray-700">Quantidade Inicial</label>
                            <input type="number" name="quantidade" id="quantidade" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                        </div>

                        <div>
                            <label for="estoque_minimo" class="block text-sm font-medium text-gray-700">Estoque Mínimo (Alerta)</label>
                            <input type="number" name="estoque_minimo" id="estoque_minimo" value="5" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                        </div>

                        <div>
                            <label for="preco" class="block text-sm font-medium text-gray-700">Preço Unitário (R$)</label>
                            <input type="number" step="0.01" name="preco" id="preco" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                        </div>

                        <div>
                            <label for="fornecedor" class="block text-sm font-medium text-gray-700">Fornecedor</label>
                            <input type="text" name="fornecedor" id="fornecedor" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="descricao" class="block text-sm font-medium text-gray-700">Descrição</label>
                        <textarea name="descricao" id="descricao" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                    </div>

                    <div class="mt-6 flex items-center justify-end">
                        <a href="{{ route('produtos.index') }}" class="text-gray-600 hover:underline mr-4">Cancelar</a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded shadow transition duration-150">
                            Salvar Produto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>