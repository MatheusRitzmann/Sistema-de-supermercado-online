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

// ROTAS DO ADMINISTRADOR (com prefixo 'admin' e nome de grupo 'admin.' para facilitar)
Route::prefix('admin')->name('admin.')->group(function () {
    // Painel Administrativo principal
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    // Cidades e Endereços
    Route::resource('cidades', CidadeController::class);
    Route::resource('enderecos', EnderecoController::class);

    // Fotos de Produto (etapa D)
    Route::get('produtos/{produto}/fotos', [FotoProdutoController::class, 'index'])->name('fotos.index');
    Route::get('produtos/{produto}/fotos/create', [FotoProdutoController::class, 'create'])->name('fotos.create');
    Route::post('produtos/{produto}/fotos', [FotoProdutoController::class, 'store'])->name('fotos.store');
    Route::delete('fotos/{id}', [FotoProdutoController::class, 'destroy'])->name('fotos.destroy');
});

// ROTAS DE PRODUTOS
Route::get('/produtos', [ProdutoController::class, 'show'])->name('produtos.show');
Route::get('/produtos/cadastrar', [ProdutoController::class, 'cadastrar'])->name('produtos.cadastrar');
Route::post('/produtos/cadastrar', [ProdutoController::class, 'inserir'])->name('produtos.inserir');
Route::get('/produtos/alterar/{id}', [ProdutoController::class, 'alterar'])->name('produtos.alterar');
Route::post('/produtos/alterar/{id}', [ProdutoController::class, 'editar'])->name('produtos.editar');
Route::get('/produtos/excluir/{id}', [ProdutoController::class, 'excluir'])->name('produtos.excluir');

// ROTAS DE CATEGORIAS
Route::get('/categorias', [CategoriaController::class, 'show'])->name('categoria.show');
Route::get('/categorias/cadastrar', [CategoriaController::class, 'cadastrar'])->name('categoria.cadastrar');
Route::post('/categorias/cadastrar', [CategoriaController::class, 'inserir'])->name('categoria.inserir');
Route::get('/categorias/alterar/{id}', [CategoriaController::class, 'alterar'])->name('categoria.alterar');
Route::post('/categorias/alterar/{id}', [CategoriaController::class, 'editar'])->name('categoria.editar');
Route::get('/categorias/excluir/{id}', [CategoriaController::class, 'excluir'])->name('categoria.excluir');