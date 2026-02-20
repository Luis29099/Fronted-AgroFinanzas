<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VerifyJwtToken
{
    public function handle(Request $request, Closure $next)
    {
        $token = session('token');

        if (!$token) {
            return redirect()->route('login');
        }

        // Opcional: Verificar si el token es válido con la API
        $response = Http::withToken($token)
            ->get('http://api.AgroFinanzas.test/api/me');

        if (!$response->successful()) {
            // Token inválido o expirado
            session()->forget(['user', 'token', 'token_type', 'expires_in']);
            return redirect()->route('login')->withErrors(['session_expired' => 'Sesión expirada']);
        }

        return $next($request);
    }
}