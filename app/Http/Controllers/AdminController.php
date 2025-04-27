<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class AdminController extends Controller
{
    // Painel principal
    public function index()
    {
        return view('admin.index');
    }

    // Tela para escolher o produto para gerenciar fotos
    public function fotosProdutosEscolher()
    {
        $produtos = Produto::all(); // Busca todos os produtos do banco
        return view('admin.fotos.escolher', compact('produtos'));
    }
}