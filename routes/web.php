<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\Admin\FotoProdutoController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\LojaController;

// Página Inicial (Pública)
Route::get('/', function () {
    return view('welcome');
});

// Rotas do Cliente (Públicas)
Route::resource('enderecos', EnderecoController::class)->only(['index', 'show']);

// Rotas da Loja (Vitrine)
Route::controller(LojaController::class)->group(function () {
    Route::get('/loja', 'index')->name('loja.index');
    Route::get('/loja/{id}', 'show')->name('loja.show');
});

// ================== PAINEL ADMIN ================== //
Route::prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    // Cidades
    Route::resource('cidades', CidadeController::class)->except(['show']);

    // Endereços
    Route::resource('enderecos', EnderecoController::class)->except(['show']);

    // Produtos
    Route::controller(ProdutoController::class)->prefix('produtos')->name('produtos.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/cadastrar', 'create')->name('create');
        Route::post('/cadastrar', 'store')->name('store');
        Route::get('/editar/{id}', 'edit')->name('edit');
        Route::put('/editar/{id}', 'update')->name('update');
        Route::delete('/excluir/{id}', 'destroy')->name('destroy');
        Route::get('/{id}', 'show')->name('show');
    });

    // Fotos dos Produtos
    Route::controller(FotoProdutoController::class)->name('fotos.')->group(function () {
        // Lista geral de produtos para gerenciamento de fotos
        Route::get('produtos-fotos', 'listagemProdutos')->name('listagem');
        
        // Rotas específicas por produto
        Route::prefix('produtos/{produto}')->group(function () {
            Route::get('/fotos', 'index')->name('index');
            Route::get('/fotos/cadastrar', 'create')->name('create');
            Route::post('/fotos/inserir', 'store')->name('store');
        });
        
        // Exclusão de foto
        Route::delete('fotos/{foto}', 'destroy')->name('destroy');
    });

    // Categorias
    Route::controller(CategoriaController::class)->prefix('categorias')->name('categorias.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/cadastrar', 'create')->name('create');
        Route::post('/inserir', 'store')->name('store');
        Route::get('/editar/{id}', 'edit')->name('edit');
        Route::put('/editar/{id}', 'update')->name('update');
        Route::delete('/excluir/{id}', 'destroy')->name('destroy');
    });

    // Vendas
    Route::controller(VendaController::class)->prefix('vendas')->name('vendas.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{venda}', 'show')->name('show');
    });
});