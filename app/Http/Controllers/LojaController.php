<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class LojaController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('loja.index', compact('produtos'));
    }
}