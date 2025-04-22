<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;

Route::get('/', function () {
    return view('welcome');
});

// Rota para o CRUD de Cidades
Route::resource('cidades', CidadeController::class);

// Rota para o CRUD de Endereços
Route::resource('enderecos', EnderecoController::class);

//Rota de prdutos
Route::get('/produtos', [ProdutoController::class, 'show'])->name('produtos.show');

Route::get('/produtos/cadastrar', [ProdutoController::class, 'cadastrar'])->name('produtos.cadastrar');
Route::post('/produtos/cadastrar', [ProdutoController::class, 'inserir'])->name('produtos.inserir');

Route::get('/produtos/alterar/{id}', [ProdutoController::class, 'alterar'])->name('produtos.alterar');
Route::post('/produtos/alterar/{id}', [ProdutoController::class, 'editar'])->name('produtos.editar');

Route::get('produtos/excluir/{id}', [ProdutoController::class, 'excluir'])->name('produtos.excluir');

//Rotas de categorias
Route::get('/categorias', [CategoriaController::class, 'show'])->name('categoria.show');

Route::get('/categorias/cadastrar', [CategoriaController::class, 'cadastrar'])->name('categoria.cadastrar');
Route::post('/categorias/cadastrar', [CategoriaController::class, 'inserir'])->name('categoria.inserir');

Route::get('/categorias/alterar/{id}', [CategoriaController::class, 'alterar'])->name('categoria.alterar');
Route::post('/categorias/alterar/{id}', [CategoriaController::class, 'editar'])->name('categoria.editar');

Route::get('/categorias/excluir/{id}', [CategoriaController::class, 'excluir'])->name('categoria.excluir');