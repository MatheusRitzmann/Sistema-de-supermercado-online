<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class LojaController extends Controller
{
    public function index()
    {
        $produtos = Produto::with('fotos')->get();
        return view('loja.index', compact('produtos'));
    }

    public function show($id)
    {
        $produto = Produto::with('fotos')->findOrFail($id);
        return view('loja.show', compact('produto'));
    }
}