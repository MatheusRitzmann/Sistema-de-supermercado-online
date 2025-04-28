<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\Admin\FotoProdutoController;
use App\Http\Controllers\LojaController;

// Página inicial
Route::get('/', function () {
    return view('welcome');
});

// ROTAS DO CLIENTE (públicas)
Route::resource('enderecos', EnderecoController::class);

// ROTAS DO ADMINISTRADOR
Route::prefix('admin')->name('admin.')->group(function () {
    // Painel administrativo
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    // Recursos principais
    Route::resource('cidades', CidadeController::class);
    Route::resource('enderecos', EnderecoController::class);

    // Fotos de Produto
    Route::get('produtos/{produto}/fotos', [FotoProdutoController::class, 'index'])->name('fotos.index');
    Route::get('produtos/{produto}/fotos/create', [FotoProdutoController::class, 'create'])->name('fotos.create');
    Route::post('produtos/{produto}/fotos', [FotoProdutoController::class, 'store'])->name('fotos.store');
    Route::delete('fotos/{foto}', [FotoProdutoController::class, 'destroy'])->name('fotos.destroy'); 
    Route::get('fotos', [AdminController::class, 'fotosProdutosEscolher'])->name('fotos.escolher');
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

// ROTAS PARA LOJA
Route::get('/loja', [LojaController::class, 'index'])->name('loja.index');