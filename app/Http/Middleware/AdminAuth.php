<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        $admin = session('admin');

        if (!$admin || empty($admin['token'])) {
            return redirect()->route('admin.login')
                ->withErrors(['error' => 'Debes iniciar sesión como administrador.']);
        }

        return $next($request);
    }
}