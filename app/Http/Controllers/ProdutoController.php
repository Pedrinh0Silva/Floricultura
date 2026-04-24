<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Categoria; 
use App\Models\Movimentacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // <-- ESSA LINHA É ESSENCIAL!

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::with('categoria')->get();
        return view('produtos.index', compact('produtos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('produtos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $dadosValidados = $request->validate([
            'nome' => 'required|string|max:255',
            'marca_fornecedor' => 'required|string|max:255',
            'modelo_tipo' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
            'descricao' => 'required|string',
            'caracteristicas' => 'required|string',
            'quantidade_atual' => 'required|integer|min:0',
            'estoque_minimo' => 'required|integer|min:0',
        ]);

        Produto::create($dadosValidados);
        return redirect()->route('produtos.index')->with('success', 'Produto cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        $categorias = Categoria::all();
        return view('produtos.edit', compact('produto', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);
        $dadosValidados = $request->validate([
            'nome' => 'required|string|max:255',
            'marca_fornecedor' => 'required|string|max:255',
            'modelo_tipo' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
            'descricao' => 'required|string',
            'caracteristicas' => 'required|string',
            'quantidade_atual' => 'required|integer|min:0',
            'estoque_minimo' => 'required|integer|min:0',
        ]);

        $produto->update($dadosValidados);
        return redirect()->route('produtos.index')->with('success', 'Produto atualizado!');
    }

    // Método para Excluir (Faltava este!)
    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();
        return redirect()->route('produtos.index')->with('success', 'Produto removido!');
    }
    
    public function movimentar($id, $tipo) 
    {
        $produto = Produto::findOrFail($id);
        return view('produtos.movimentar', compact('produto', 'tipo'));
    }

    public function atualizarEstoque(Request $request, $id) 
    {
        $produto = Produto::findOrFail($id);
        $request->validate([
            'quantidade' => 'required|integer|min:1',
            'tipo' => 'required|in:entrada,saida'
        ]);

        $quantidade = $request->quantidade;

        if ($request->tipo == 'saida') {
            if ($produto->quantidade_atual < $quantidade) {
                return back()->withErrors(['quantidade' => 'Estoque insuficiente para essa saída!']);
            }
            $produto->decrement('quantidade_atual', $quantidade);
        } else {
            $produto->increment('quantidade_atual', $quantidade);
        }

        // Registra no histórico usando o Auth importado corretamente agora
        Movimentacao::create([
            'produto_id' => $produto->id,
            'user_id' => Auth::id(),
            'tipo' => $request->tipo,
            'quantidade' => $quantidade,
            'motivo' => $request->motivo ?? 'Movimentação manual'
        ]);

        return redirect()->route('produtos.index')->with('success', 'Estoque atualizado com sucesso!');
    }
}