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

// ================== ROTAS PÚBLICAS ================== //
Route::get('/', function () {
    return view('welcome');
});

// ================== LOJA VIRTUAL ================== //
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

    // Endereços (mantendo sua configuração exata)
    Route::resource('enderecos', EnderecoController::class)->except(['show'])
    ->names([
        'index' => 'enderecos.index',
        'create' => 'enderecos.create',
        'store' => 'enderecos.store',
        'edit' => 'enderecos.edit',
        'update' => 'enderecos.update',
        'destroy' => 'enderecos.destroy'
    ]);


    // Produtos (configuração manual como no original)
    Route::controller(ProdutoController::class)->prefix('produtos')->name('produtos.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
        Route::get('/{id}', 'show')->name('show');
        //Route::get('/','cadastrar')->name('produtos.cadastrar');
        Route::post('/cadastrar','inserir')->name('inserir');
        
    });


    // Fotos dos Produtos (igual ao original)
    Route::controller(FotoProdutoController::class)->prefix('produtos-fotos')->name('fotos.')->group(function () {
        Route::get('/', 'listagemProdutos')->name('listagem');
        Route::get('/{produto}/gerenciar', 'index')->name('index');
        Route::get('/{produto}/cadastrar', 'create')->name('create');
        Route::post('/{produto}/salvar', 'store')->name('store');
        Route::delete('/{foto}', 'destroy')->name('destroy');
    });

    // Categorias
    Route::resource('categorias', CategoriaController::class)->except(['show']);

    // Vendas
    Route::resource('vendas', VendaController::class);
});