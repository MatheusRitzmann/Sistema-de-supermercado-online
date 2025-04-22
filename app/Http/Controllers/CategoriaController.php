<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    function show(){

        $categorias = Categoria::all();

        return view('categorias', ['categorias' => $categorias]);
    }

    function cadastrar(){
        return view('categorias_new');
    }

    function alterar($id){
        $categoria = Categoria::findOrFail($id);

        return view('categorias_edit', ['categoria' => $categoria]);
    }

    function inserir(Request $request){
        $categoria = new Categoria();

        $categoria->descricao = $request->descricao;
        

        $categoria->save();

        return redirect()->route('categoria.show');
    }

    function editar(Request $request, $id){
        $categoria = Categoria::findOrFail($id);

        $categoria->descricao = $request->descricao;
        
        $categoria->save();
        
        return redirect()->route('categoria.show');
    }

    function excluir($id){
        $categoria = Categoria::findOrFail($id);

        $categoria->delete();

        return redirect()->route('categoria.show');
    }
}