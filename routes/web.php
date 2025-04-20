<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CidadeController;

Route::get('/', function () {
    return view('welcome');
});

// Rota para o CRUD de Cidades
Route::resource('cidades', CidadeController::class);
