<x-app-layout>
    <div class="max-w-4xl mx-auto py-8">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-6">Editar Produto: {{ $produto->nome }}</h2>

            <form action="{{ route('produtos.update', $produto->id) }}" method="POST">
                @csrf
                @method('PUT') <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-bold mb-1">Nome</label>
                        <input type="text" name="nome" value="{{ $produto->nome }}" class="w-full border rounded p-2" required>
                    </div>

                    <div>
                        <label class="block font-bold mb-1">Categoria</label>
                        <select name="categoria_id" class="w-full border rounded p-2" required>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ $produto->categoria_id == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block font-bold mb-1">Marca / Fornecedor</label>
                        <input type="text" name="marca_fornecedor" value="{{ $produto->marca_fornecedor }}" class="w-full border rounded p-2" required>
                    </div>

                    <div>
                        <label class="block font-bold mb-1">Modelo / Tipo</label>
                        <input type="text" name="modelo_tipo" value="{{ $produto->modelo_tipo }}" class="w-full border rounded p-2" required>
                    </div>

                    <div>
                        <label class="block font-bold mb-1">Quantidade Atual</label>
                        <input type="number" name="quantidade_atual" value="{{ $produto->quantidade_atual }}" class="w-full border rounded p-2" required>
                    </div>

                    <div>
                        <label class="block font-bold mb-1">Estoque Mínimo</label>
                        <input type="number" name="estoque_minimo" value="{{ $produto->estoque_minimo }}" class="w-full border rounded p-2" required>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block font-bold mb-1">Descrição</label>
                        <textarea name="descricao" rows="2" class="w-full border rounded p-2" required>{{ $produto->descricao }}</textarea>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block font-bold mb-1">Características Específicas</label>
                        <textarea name="caracteristicas" rows="2" class="w-full border rounded p-2" required>{{ $produto->caracteristicas }}</textarea>
                    </div>
                </div>

                <div class="mt-6 text-right">
                    <a href="{{ route('produtos.index') }}" class="mr-4 text-gray-600 hover:underline">Voltar</a>
                    <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-6 rounded hover:bg-blue-700">
                        Atualizar Cadastro
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>