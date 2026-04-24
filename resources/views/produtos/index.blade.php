<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque Floricultura</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-4 md:p-8">

    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-6 bg-white p-4 rounded-lg shadow-sm">
            <div>
                <h1 class="text-2xl font-bold text-green-800">Sistema Floricultura</h1>
                <p class="text-gray-600 text-sm">Controle de Estoque Profissional</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('produtos.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded font-bold transition">
                    + Novo Produto
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded font-bold transition">
                        Sair
                    </button>
                </form>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 border-b">
                    <tr>
                        <th class="p-4 font-semibold text-gray-700">Produto</th>
                        <th class="p-4 font-semibold text-gray-700">Categoria</th>
                        <th class="p-4 font-semibold text-gray-700 text-center">Qtd Atual</th>
                        <th class="p-4 font-semibold text-gray-700 text-center">Mínimo</th>
                        <th class="p-4 font-semibold text-gray-700">Status</th>
                        <th class="p-4 font-semibold text-gray-700 text-center">Ações de Estoque</th>
                        <th class="p-4 font-semibold text-gray-700 text-center">Cadastro</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($produtos as $produto)
                    <tr class="border-b hover:bg-gray-50 transition">
                        <td class="p-4 font-medium">{{ $produto->nome }}</td>
                        <td class="p-4 text-gray-600">{{ $produto->categoria->nome }}</td>
                        <td class="p-4 text-center font-bold">{{ $produto->quantidade_atual }}</td>
                        <td class="p-4 text-center text-gray-500">{{ $produto->estoque_minimo }}</td>
                        
                        <td class="p-4">
                            @if($produto->quantidade_atual == 0)
                                <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs font-bold uppercase">Esgotado</span>
                            @elseif($produto->quantidade_atual <= $produto->estoque_minimo)
                                <span class="bg-orange-100 text-orange-700 px-2 py-1 rounded text-xs font-bold uppercase">Estoque Baixo</span>
                            @else
                                <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-bold uppercase">Normal</span>
                            @endif
                        </td>

                        <td class="p-4 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('produtos.movimentar', [$produto->id, 'entrada']) }}" 
                                   class="bg-blue-50 text-blue-600 border border-blue-600 px-3 py-1 rounded hover:bg-blue-600 hover:text-white transition text-sm font-bold">
                                    Entrada
                                </a>

                                @if($produto->quantidade_atual > 0)
                                    <a href="{{ route('produtos.movimentar', [$produto->id, 'saida']) }}" 
                                       class="bg-orange-50 text-orange-600 border border-orange-600 px-3 py-1 rounded hover:bg-orange-600 hover:text-white transition text-sm font-bold">
                                        Saída
                                    </a>
                                @else
                                    <span class="opacity-50 cursor-not-allowed bg-gray-100 text-gray-400 border border-gray-300 px-3 py-1 rounded text-sm font-bold">
                                        Saída
                                    </span>
                                @endif
                            </div>
                        </td>

                        <td class="p-4 text-center">
                            <div class="flex justify-center gap-3">
                                <a href="{{ route('produtos.edit', $produto->id) }}" class="text-gray-500 hover:text-gray-800" title="Editar Cadastro">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                
                                <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este produto?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="p-8 text-center text-gray-500 italic">Nenhum produto cadastrado no estoque.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <p class="mt-4 text-gray-500 text-xs text-center">Prova Prática de Desenvolvimento Web - Floricultura</p>
    </div>

</body>
</html>