<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\FotoProdutoController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\LojaController;

// ROTAS PARA O CLIENTE (LOJA)
Route::get('/', [LojaController::class, 'index'])->name('loja.index');
Route::get('/produto/{id}', [LojaController::class, 'show'])->name('loja.produtos.show');

// ROTAS PARA O ADMINISTRADOR

// Painel de Administração
Route::get('/admin', function () {
    return view('admin.index'); // <- Corrigido aqui!
})->name('admin.dashboard');

// Produtos (Administração)
Route::get('/admin/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
Route::get('/admin/produtos/cadastrar', [ProdutoController::class, 'cadastrar'])->name('produtos.cadastrar');
Route::post('/admin/produtos/inserir', [ProdutoController::class, 'inserir'])->name('produtos.inserir');
Route::get('/admin/produtos/alterar/{id}', [ProdutoController::class, 'alterar'])->name('produtos.alterar');
Route::post('/admin/produtos/editar/{id}', [ProdutoController::class, 'editar'])->name('produtos.editar');
Route::get('/admin/produtos/excluir/{id}', [ProdutoController::class, 'excluir'])->name('produtos.excluir');

// Fotos de Produtos (Administração)
Route::get('/admin/fotos', [FotoProdutoController::class, 'index'])->name('fotos.index');
Route::get('/admin/fotos/cadastrar', [FotoProdutoController::class, 'cadastrar'])->name('fotos.cadastrar');
Route::post('/admin/fotos/inserir', [FotoProdutoController::class, 'inserir'])->name('fotos.inserir');
Route::get('/admin/fotos/excluir/{id}', [FotoProdutoController::class, 'excluir'])->name('fotos.excluir');

// Endereços (Administração)
Route::get('/admin/enderecos', [EnderecoController::class, 'index'])->name('enderecos.index');
Route::get('/admin/enderecos/cadastrar', [EnderecoController::class, 'cadastrar'])->name('enderecos.cadastrar');
Route::post('/admin/enderecos/inserir', [EnderecoController::class, 'inserir'])->name('enderecos.inserir');
Route::get('/admin/enderecos/alterar/{id}', [EnderecoController::class, 'alterar'])->name('enderecos.alterar');
Route::post('/admin/enderecos/editar/{id}', [EnderecoController::class, 'editar'])->name('enderecos.editar');
Route::get('/admin/enderecos/excluir/{id}', [EnderecoController::class, 'excluir'])->name('enderecos.excluir');

// Cidades (Administração)
Route::get('/admin/cidades', [CidadeController::class, 'index'])->name('cidades.index');
Route::get('/admin/cidades/cadastrar', [CidadeController::class, 'cadastrar'])->name('cidades.cadastrar');
Route::post('/admin/cidades/inserir', [CidadeController::class, 'inserir'])->name('cidades.inserir');
Route::get('/admin/cidades/alterar/{id}', [CidadeController::class, 'alterar'])->name('cidades.alterar');
Route::post('/admin/cidades/editar/{id}', [CidadeController::class, 'editar'])->name('cidades.editar');
Route::get('/admin/cidades/excluir/{id}', [CidadeController::class, 'excluir'])->name('cidades.excluir');

// Vendas (Administração)
Route::get('/admin/vendas', [VendaController::class, 'index'])->name('vendas.index');