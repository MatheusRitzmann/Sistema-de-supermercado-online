<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Mostra a lista de categorias
     */
    public function index()
    {
        $categorias = Categoria::latest()->get();
        return view('admin.categorias.index', compact('categorias'));
    }

    /**
     * Mostra o formulário de criação
     */
    public function create()
    {
        return view('admin.categorias.create');
    }

    /**
     * Armazena uma nova categoria (antigo "inserir")
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255|unique:categorias',
            'descricao' => 'nullable|string'
        ]);

        Categoria::create($request->all());

        return redirect()->route('admin.categorias.index')
                         ->with('success', 'Categoria criada com sucesso!');
    }

    /**
     * Mostra o formulário de edição
     */
    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('admin.categorias.edit', compact('categoria'));
    }

    /**
     * Atualiza a categoria (antigo "editar")
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255|unique:categorias,nome,'.$id,
            'descricao' => 'nullable|string'
        ]);

        $categoria = Categoria::findOrFail($id);
        $categoria->update($request->all());

        return redirect()->route('admin.categorias.index')
                         ->with('success', 'Categoria atualizada!');
    }

    /**
     * Remove uma categoria (antigo "excluir")
     */
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return redirect()->route('admin.categorias.index')
                         ->with('success', 'Categoria removida!');
    }
}