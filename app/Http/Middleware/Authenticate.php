<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request): ?string
    {
        if (!$request->expectsJson()) {
            // Guarda a URL que o usuário tentou acessar
            Session::put('url.intended', $request->fullUrl());
            
            // Adiciona mensagem de alerta (opcional)
            Session::flash('alert', [
                'type' => 'warning',
                'message' => 'Por favor, faça login para acessar esta área.'
            ]);
            
            return route('login');
        }

        return null;
    }
}