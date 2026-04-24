<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Floricultura</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50 flex items-center justify-center h-screen">

    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h1 class="text-2xl font-bold text-center text-green-700 mb-6">Controle de Estoque</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ url('/login') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Login</label>
                <input type="text" name="login" class="w-full border rounded px-3 py-2 text-gray-700 focus:outline-none focus:border-green-500" required autofocus>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Senha</label>
                <input type="password" name="password" class="w-full border rounded px-3 py-2 text-gray-700 focus:outline-none focus:border-green-500" required>
            </div>

            <button type="submit" class="w-full bg-green-600 text-white font-bold py-2 px-4 rounded hover:bg-green-700 transition duration-200">
                Entrar
            </button>
        </form>
    </div>

</body>
</html>