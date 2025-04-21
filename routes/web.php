<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\EnderecoController;

Route::get('/', function () {
    return view('welcome');
});

// Rota para o CRUD de Cidades
Route::resource('cidades', CidadeController::class);

// Rota para o CRUD de Endereços
Route::resource('enderecos', EnderecoController::class);
