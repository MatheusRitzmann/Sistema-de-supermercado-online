<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use App\Models\FotoProduto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FotoProdutoController extends Controller
{
    public function listagem()
{
    // Buscar todos os produtos com fotos
    $produtos = Produto::has('fotos')->with('fotos')->get();
    
    // Exibir a view de listagem, passando os produtos para ela
    return view('admin.fotos.listagem', compact('produtos'));
}

    public function index(Produto $produto)
    {
        return view('admin.fotos.index', ['produto' => $produto]);
    }

    public function create(Produto $produto)
{
    // Retorna a view de criação de foto, passando o produto
    return view('admin.fotos.create', compact('produto'));
}

    public function store(Request $request, Produto $produto)
{
    $request->validate(['foto' => 'required|image|max:2048']);

    // Armazenar a foto e pegar o caminho
    $path = $request->file('foto')->store('produtos', 'public');
    
    // Criar o registro da foto no banco
    $produto->fotos()->create([
        'nome_arquivo' => $path  // Salvar o nome do arquivo na coluna 'nome_arquivo'
    ]);
    
    return redirect()->route('admin.fotos.index', $produto)
                    ->with('success', 'Foto adicionada!');
}

    public function destroy(FotoProduto $foto)
    {
        Storage::disk('public')->delete($foto->arquivo);
        $foto->delete();
        return back()->with('success', 'Foto removida!');
    }
}