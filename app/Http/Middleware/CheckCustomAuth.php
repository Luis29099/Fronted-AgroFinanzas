<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckCustomAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar si existe la sesión 'user'
        if (!session()->has('user')) {
            // Si no hay sesión, redirigir al login
            return redirect()->route('login')->withErrors([
                'auth_error' => 'Debes iniciar sesión para acceder a esta página.'
            ]);
        }

        // Si hay sesión, continuar con la petición
        return $next($request);
    }
}