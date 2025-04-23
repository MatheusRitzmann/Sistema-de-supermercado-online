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
        return view('admin.Dashboard');  // Certifique-se de que o arquivo dashboard.blade.php existe
    }
}