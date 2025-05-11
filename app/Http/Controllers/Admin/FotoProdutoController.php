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
        $produtos = Produto::has('fotos')->with('fotos')->get();
        return view('admin.fotos.listagem', compact('produtos'));
    }

    public function index(Produto $produto)
    {
        return view('admin.fotos.index', ['produto' => $produto]);
    }

    public function create(Produto $produto)
    {
        return view('admin.fotos.create', compact('produto'));
    }

    public function store(Request $request, Produto $produto)
    {
        $request->validate(['foto' => 'required|image|max:2048']);
        
        $path = $request->file('foto')->store('produtos', 'public');
        $produto->fotos()->create(['arquivo' => $path]);
        
        return redirect()->route('admin.fotos.index', $produto)
                       ->with('success', 'Foto adicionada!');
    }

    public function destroy(FotoProduto $foto)
    {
        Storage::delete($foto->arquivo);
        $foto->delete();
        return back()->with('success', 'Foto removida!');
    }
}