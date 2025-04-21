<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\AdminController; // Controlador para o dashboard

// Página inicial
Route::get('/', function () {
    return view('welcome');
});

// ROTAS DO CLIENTE (públicas por enquanto)
Route::resource('enderecos', EnderecoController::class);

// ROTAS DO ADMINISTRADOR (com prefixo 'admin' e nome de grupo 'admin.' para facilitar)
Route::prefix('admin')->name('admin.')->group(function () {

    // Rota para o dashboard
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    
    // Rotas administrativas
    Route::resource('cidades', CidadeController::class);
    Route::resource('enderecos', EnderecoController::class);
});
