<x-app-layout> <div class="max-w-4xl mx-auto py-8">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-6">Cadastrar Novo Produto</h2>

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                    Preencha todos os campos corretamente.
                </div>
            @endif

            <form action="{{ route('produtos.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-bold mb-1">Nome</label>
                        <input type="text" name="nome" class="w-full border rounded p-2" required>
                    </div>

                    <div>
                        <label class="block font-bold mb-1">Categoria</label>
                        <select name="categoria_id" class="w-full border rounded p-2" required>
                            <option value="">Selecione uma categoria...</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block font-bold mb-1">Marca / Fornecedor</label>
                        <input type="text" name="marca_fornecedor" class="w-full border rounded p-2" required>
                    </div>

                    <div>
                        <label class="block font-bold mb-1">Modelo / Tipo</label>
                        <input type="text" name="modelo_tipo" class="w-full border rounded p-2" required>
                    </div>

                    <div>
                        <label class="block font-bold mb-1">Quantidade Atual</label>
                        <input type="number" name="quantidade_atual" min="0" class="w-full border rounded p-2" required>
                    </div>

                    <div>
                        <label class="block font-bold mb-1">Estoque Mínimo</label>
                        <input type="number" name="estoque_minimo" min="0" class="w-full border rounded p-2" required>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block font-bold mb-1">Descrição</label>
                        <textarea name="descricao" rows="2" class="w-full border rounded p-2" required></textarea>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block font-bold mb-1">Características Específicas</label>
                        <textarea name="caracteristicas" rows="2" class="w-full border rounded p-2" required></textarea>
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">
                        Salvar Produto
                    </button>
                    <a href="{{ route('produtos.index') }}" class="ml-4 text-gray-600 hover:underline">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>