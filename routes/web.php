<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdutoController;

// Se acessar a raiz, joga para o login
Route::get('/', function () {
    return redirect('/login');
});

// Rotas de Login (Abertas)
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Rotas Protegidas (Só acessa se estiver logado)
Route::middleware('auth')->group(function () {
    
    // Rota de logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Suas rotas de produtos ficam AQUI DENTRO agora!
    Route::resource('produtos', ProdutoController::class);
    
});
Route::middleware('auth')->group(function () {
    // ... outras rotas (resource produtos, logout, etc)

    // ESSAS SÃO AS DUAS LINHAS QUE FAZEM O CLIQUE FUNCIONAR:
    Route::get('/produtos/{id}/movimentar/{tipo}', [App\Http\Controllers\ProdutoController::class, 'movimentar'])->name('produtos.movimentar');
    Route::post('/produtos/{id}/estoque', [App\Http\Controllers\ProdutoController::class, 'atualizarEstoque'])->name('produtos.estoque');
});