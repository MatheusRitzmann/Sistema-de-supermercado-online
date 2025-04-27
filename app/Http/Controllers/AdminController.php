<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Exibe o painel administrativo.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');  // Carrega a view correta do painel administrativo
    }
}
