<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\Admin\FotoProdutoController;
use App\Http\Controllers\Admin\VendaController;
use App\Http\Controllers\LojaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


// ================== ROTAS PÚBLICAS ================== //
Route::get('/', function () {
    return view('welcome');
});

// ================== AUTENTICAÇÃO ================== //
Route::middleware('guest')->group(function () {
    // Login
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    
    // Registro
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
    
    // Recuperação de senha
    Route::get('/forgot-password', function () {
        return view('auth.forgot-password');
    })->name('password.request');
    
    Route::post('/forgot-password', function (Request $request) {
        $request->validate(['email' => 'required|email']);
        $status = Password::sendResetLink($request->only('email'));
        
        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    })->name('password.email');
    
    // Reset de senha
    Route::get('/reset-password/{token}', function (string $token) {
        return view('auth.reset-password', ['token' => $token]);
    })->name('password.reset');
    
    Route::post('/reset-password', function (Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
        
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();
            }
        );
        
        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    })->name('password.update');
});

// Logout

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

// ================== LOJA VIRTUAL ================== //
Route::controller(LojaController::class)->group(function () {
    Route::get('/loja', 'index')->name('loja.index');
    Route::get('/loja/{id}', 'show')->name('loja.show');
});

// ================== PAINEL ADMIN (PROTEGIDO) ================== //
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    // Todas as rotas aqui exigirão login e perfil admin
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    
    // Cidades
    Route::resource('cidades', CidadeController::class)->except(['show']);
    
    // Endereços
    Route::resource('enderecos', EnderecoController::class)->except(['show'])
        ->names([
            'index' => 'enderecos.index',
            'create' => 'enderecos.create',
            'store' => 'enderecos.store',
            'edit' => 'enderecos.edit',
            'update' => 'enderecos.update',
            'destroy' => 'enderecos.destroy'
        ]);
    
    // Produtos
    Route::controller(ProdutoController::class)->prefix('produtos')->name('produtos.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
        Route::get('/{id}', 'show')->name('show');
    });
    
// Fotos dos Produtos
Route::controller(FotoProdutoController::class)->prefix('produtos-fotos')->name('fotos.')->group(function () {
    Route::get('/', 'listagem')->name('listagem');  // Corrigido: 'listagem' ao invés de 'listagemProdutos'
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