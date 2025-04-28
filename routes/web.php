<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\Admin\FotoProdutoController;

// Página inicial
Route::get('/', function () {
    return view('welcome');
});

// ROTAS DO CLIENTE (públicas por enquanto)
Route::resource('enderecos', EnderecoController::class);

// ROTAS DO ADMINISTRADOR
Route::prefix('admin')->name('admin.')->group(function () {
    // Painel Administrativo principal
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    // Cidades
    Route::resource('cidades', CidadeController::class);

    // Endereços
    Route::resource('enderecos', EnderecoController::class);

   // ROTAS DE PRODUTOS
Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
Route::get('/produtos/cadastrar', [ProdutoController::class, 'cadastrar'])->name('produtos.cadastrar');
Route::post('/produtos/cadastrar', [ProdutoController::class, 'inserir'])->name('produtos.inserir');
Route::get('/produtos/alterar/{id}', [ProdutoController::class, 'alterar'])->name('produtos.alterar');
Route::post('/produtos/alterar/{id}', [ProdutoController::class, 'editar'])->name('produtos.editar');
Route::get('/produtos/excluir/{id}', [ProdutoController::class, 'excluir'])->name('produtos.excluir');
Route::get('/produtos/{id}', [ProdutoController::class, 'show'])->name('produtos.show');

    // Fotos de Produto
    Route::get('produtos/{produto}/fotos', [FotoProdutoController::class, 'index'])->name('fotos.index');
    Route::get('produtos/{produto}/fotos/cadastrar', [FotoProdutoController::class, 'create'])->name('fotos.create');
    Route::post('produtos/{produto}/fotos/inserir', [FotoProdutoController::class, 'store'])->name('fotos.store');
    Route::delete('fotos/{id}', [FotoProdutoController::class, 'destroy'])->name('fotos.destroy');

    // Categorias
    Route::get('categorias', [CategoriaController::class, 'index'])->name('categorias.index');
    Route::get('categorias/cadastrar', [CategoriaController::class, 'cadastrar'])->name('categorias.cadastrar');
    Route::post('categorias/inserir', [CategoriaController::class, 'inserir'])->name('categorias.inserir');
    Route::get('categorias/alterar/{id}', [CategoriaController::class, 'alterar'])->name('categorias.alterar');
    Route::post('categorias/editar/{id}', [CategoriaController::class, 'editar'])->name('categorias.editar');
    Route::get('categorias/excluir/{id}', [CategoriaController::class, 'excluir'])->name('categorias.excluir');
});