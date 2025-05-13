<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Verifica se está logado
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // 2. Verifica se é admin (com mensagem mais clara)
        $user = Auth::user();
        if ($user->role !== 'admin') {
            abort(403, 'Você não tem permissão de administrador. Seu perfil: '.$user->role);
        }

        return $next($request);
    }
}