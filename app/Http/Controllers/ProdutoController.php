<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    function show()
    {
        // Recuperando os produtos que estão no banco de dados
        $produtos = Produto::all();

        // Passando para nossa view a variável de produtos
        return view('produtos.produtos_show', ['produtos' => $produtos]);
    }

    function cadastrar()
    {
        return view('produtos.produtos_new');
    }

    function alterar($id)
    {
        $produto = Produto::findOrFail($id);

        return view('produtos.produtos_edit', ['produto' => $produto]);
    }

    function inserir(Request $request)
    {
        $produto = new Produto();

        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->quantidade = $request->quantidade;
        $produto->preco = $request->preco;
        $produto->categoria_id = $request->categoria_id; // aqui está correto agora

        $produto->save();

        return redirect()->route('produtos.show');
    }

    function editar(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);

        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->quantidade = $request->quantidade;
        $produto->preco = $request->preco;
        $produto->categoria_id = $request->categoria_id; // aqui também certinho

        $produto->save();

        return redirect()->route('produtos.show');
    }

    function excluir($id)
    {
        $produto = Produto::findOrFail($id);

        $produto->delete();

        return redirect()->route('produtos.show');
    }
}
