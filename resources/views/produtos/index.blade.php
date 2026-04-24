<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Gerenciamento de Estoque') }}
            </h2>
            <a href="{{ route('produtos.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow">
                + Novo Produto
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto border-collapse">
                        <thead>
                            <tr class="bg-gray-50 border-b">
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Produto</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categoria</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Qtd</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Preço</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($produtos as $produto)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">{{ $produto->nome }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-600">{{ $produto->categoria }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-gray-900 font-bold">{{ $produto->quantidade }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-gray-600">R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    @if($produto->estoqueBaixo())
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Estoque Baixo
                                        </span>
                                    @else
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Normal
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('produtos.edit', $produto->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Editar</a>
                                    
                                    <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Tem certeza que deseja excluir?')">
                                            Excluir
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if($produtos->isEmpty())
                    <p class="text-center text-gray-500 mt-6 italic">Nenhum produto cadastrado até o momento.</p>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>