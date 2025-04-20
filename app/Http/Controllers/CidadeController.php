<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    // Exibe todas as cidades
    public function index()
    {
        $cidades = Cidade::all();
        return view('cidades.index', compact('cidades'));
    }

    // Exibe o formulário para criar uma nova cidade
    public function create()
    {
        return view('cidades.create');
    }

    // Salva a nova cidade
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'estado' => 'required',
        ]);

        Cidade::create($request->all());
        return redirect()->route('cidades.index');
    }

    // Exibe o formulário para editar uma cidade existente
    public function edit(Cidade $cidade)
    {
        return view('cidades.edit', compact('cidade'));
    }

    // Atualiza uma cidade existente
    public function update(Request $request, Cidade $cidade)
    {
        $request->validate([
            'nome' => 'required',
            'estado' => 'required',
        ]);

        $cidade->update($request->all());
        return redirect()->route('cidades.index');
    }

    // Exclui uma cidade
    public function destroy(Cidade $cidade)
    {
        $cidade->delete();
        return redirect()->route('cidades.index');
    }
}