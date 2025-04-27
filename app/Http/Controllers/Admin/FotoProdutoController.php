<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\FotoProduto;
use Illuminate\Support\Facades\Storage;

class FotoProdutoController extends Controller
{
    /**
     * Lista todas as fotos de um produto.
     */
    public function index($produto_id)
    {
        $produto = Produto::with('fotos')->findOrFail($produto_id);
        return view('admin.fotos.index', compact('produto'));
    }

    /**
     * Exibe o formulário para adicionar uma nova foto.
     */
    public function create($produto_id)
    {
        $produto = Produto::findOrFail($produto_id);
        return view('admin.fotos.create', compact('produto'));
    }

    /**
     * Salva a foto enviada no storage e no banco de dados.
     */
    public function store(Request $request, $produto_id)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $produto = Produto::findOrFail($produto_id);

        if ($request->hasFile('foto')) {
            // Armazena o arquivo em storage/app/public/produtos
            $fotoPath = $request->file('foto')->store('produtos', 'public');

            // Cria o registro no banco, preenchendo arquivo e caminho
            FotoProduto::create([
                'produto_id' => $produto->id,
                'caminho'    => $fotoPath,
                'arquivo'    => $fotoPath,
            ]);
        }

        return redirect()
            ->route('admin.fotos.index', $produto->id)
            ->with('success', 'Foto adicionada com sucesso!');
    }

    /**
     * Remove a foto do storage e do banco.
     */
    public function destroy($id)
    {
        $foto = FotoProduto::findOrFail($id);

        // Remove o arquivo físico
        if (Storage::disk('public')->exists($foto->arquivo)) {
            Storage::disk('public')->delete($foto->arquivo);
        }

        $produtoId = $foto->produto_id;
        $foto->delete();

        return redirect()
            ->route('admin.fotos.index', $produtoId)
            ->with('success', 'Foto excluída com sucesso!');
    }
}