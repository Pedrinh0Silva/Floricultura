<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    // 1. Listar produtos e destacar os que estão com estoque baixo
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.index', compact('produtos'));
    }

    // 2. Mostrar formulário de cadastro
    public function create()
    {
        return view('produtos.create');
    }

    // 3. Salvar o produto no banco
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'quantidade_estoque' => 'required|integer',
            'estoque_minimo' => 'required|integer',
        ]);

        Produto::create($request->all());

        return redirect()->route('produtos.index')->with('success', 'Produto cadastrado!');
    }

    // 4. Mostrar formulário de edição
    public function edit(Produto $produto)
    {
        return view('produtos.edit', compact('produto'));
    }

    // 5. Atualizar os dados (incluindo a quantidade)
    public function update(Request $request, Produto $produto)
    {
        $produto->update($request->all());
        return redirect()->route('produtos.index')->with('success', 'Estoque atualizado!');
    }

    // 6. Excluir produto
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produtos.index')->with('success', 'Produto removido!');
    }
}
