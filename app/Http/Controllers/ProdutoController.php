<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.produtos_show', ['produtos' => $produtos]);
    }

    public function create()
    {
        return view('produtos.produtos_new');
    }

    public function store(Request $request)
    {
        $produto = new Produto();
        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->quantidade = $request->quantidade;
        $produto->preco = $request->preco;
        $produto->categoria_id = $request->categoria_id;
        $produto->save();

        return redirect()->route('admin.produtos.index');
    }

    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        return view('produtos.produtos_edit', ['produto' => $produto]);
    }

    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);
        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->quantidade = $request->quantidade;
        $produto->preco = $request->preco;
        $produto->categoria_id = $request->categoria_id;
        $produto->save();

        return redirect()->route('admin.produtos.index');
    }

    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();

        return redirect()->route('admin.produtos.index');
    }

    public function show($id)
    {
        $produto = Produto::with('fotos')->findOrFail($id);
        return view('produtos.show', compact('produto'));
    }
}
