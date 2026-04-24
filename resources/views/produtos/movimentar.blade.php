<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Movimentar Estoque</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="bg-white p-8 rounded shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-2 text-gray-800 uppercase tracking-wide">
            {{ $tipo == 'entrada' ? '⬆️ Entrada' : '⬇️ Saída' }}
        </h2>
        <p class="text-gray-600 mb-6 border-b pb-2">
            Produto: <span class="font-bold text-black">{{ $produto->nome }}</span>
        </p>

        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('produtos.estoque', $produto->id) }}" method="POST">
            @csrf
            <input type="hidden" name="tipo" value="{{ $tipo }}">

            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700 mb-1">Quantidade</label>
                <input type="number" name="quantidade" min="1" 
                       class="w-full border-2 border-gray-200 p-3 rounded-lg focus:border-blue-500 outline-none transition" 
                       placeholder="0" required autofocus>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-bold text-gray-700 mb-1">Motivo / Observação</label>
                <input type="text" name="motivo" 
                       class="w-full border-2 border-gray-200 p-3 rounded-lg focus:border-blue-500 outline-none transition" 
                       placeholder="Ex: Compra com fornecedor X">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <a href="{{ route('produtos.index') }}" 
                   class="text-center py-3 bg-gray-200 text-gray-700 rounded-lg font-bold hover:bg-gray-300 transition">
                    Cancelar
                </a>
                <button type="submit" 
                        class="py-3 rounded-lg text-white font-bold transition shadow-md {{ $tipo == 'entrada' ? 'bg-blue-600 hover:bg-blue-700' : 'bg-orange-600 hover:bg-orange-700' }}">
                    Confirmar
                </button>
            </div>
        </form>
    </div>

</body>
</html>