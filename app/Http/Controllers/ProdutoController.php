<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produto;

class ProdutoController extends Controller
{
    function show(){
        //recuperando os produtos que estão no banco de dados
        $produtos = Produto::all();

        //passando para nossa view a variável de produtos.
        return view('produtos_show', ['produtos' => $produtos]);
    }

    function cadastrar(){
        return view('produtos_new');
    }

    function alterar($id){
        $produto = Produto::findOrFail($id);

        return view('produtos_edit', ['produto' => $produto]);
    }

    function inserir(Request $request){
        $produto = new Produto();

        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->quantidade = $request->quantidade;
        $produto->preco = $request->preco;
        $produto->categoria_id = $request->categoria_id;

        $produto->save();

        return redirect()->route('produtos.show');
    }

    function editar(Request $request, $id){
        $produto = Produto::findOrFail($id);

        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->quantidade = $request->quantidade;
        $produto->preco = $request->preco;
        $produto->categoria_id = $request->categoria_id;


        $produto->save();

        return redirect()->route('produtos.show');
    }

    function excluir($id){
        $produto = Produto::findOrFail($id);

        $produto->delete();

        return redirect()->route('produtos.show');
    }
}