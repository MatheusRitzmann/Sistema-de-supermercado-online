<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\FotoProduto;
use Illuminate\Support\Facades\Storage;

class FotoProdutoController extends Controller
{
    // Mostrar fotos de um produto
    public function index(Produto $produto)
    {
        $fotos = $produto->fotos; // Carrega as fotos do produto
        return view('admin.fotos.index', compact('produto', 'fotos'));
    }

    // Formulário para adicionar nova foto
    public function create(Produto $produto)
    {
        return view('admin.fotos.create', compact('produto'));
    }

    // Salvar nova foto
    public function store(Request $request, Produto $produto)
{
    $request->validate([
        'foto' => 'required|image|max:2048',
    ]);

    if ($request->hasFile('foto')) {
        $path = $request->file('foto')->store('fotos_produtos', 'public');

        $produto->fotos()->create([
            'arquivo' => $path,
        ]);

        return redirect()->route('admin.fotos.index', $produto->id)->with('success', 'Foto adicionada com sucesso!');
    }

    // Se não vier foto por algum motivo (proteção extra)
    return back()->withErrors('Erro ao enviar a foto.');
}

    // Deletar uma foto
    public function destroy($id)
    {
        $foto = FotoProduto::findOrFail($id);

        if (Storage::disk('public')->exists($foto->arquivo)) {
            Storage::disk('public')->delete($foto->arquivo);
        }

        $foto->delete();

        return back()->with('success', 'Foto deletada com sucesso!');
    }
}