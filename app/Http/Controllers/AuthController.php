<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function home()
    {
        return view('auth.home');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $response = Http::post('http://api.AgroFinanzas.test/api/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($response->successful()) {
            $data = $response->json();
            session(['user' => $data['user']]); // Guardar usuario en sesión
            return redirect()->route('user_apps');
        }

        return back()->withErrors(['login_error' => 'Credenciales inválidas']);
    }

    public function register(Request $request)
    {
        $response = Http::post('http://api.AgroFinanzas.test/api/register', [
            'name'       => $request->name,
            'email'      => $request->email,
            'password'   => $request->password,
            'birth_date' => $request->birth_date,
        ]);

        if ($response->successful()) {
            return redirect()->route('login')->with('success', 'Registro exitoso. Inicia sesión.');
        }

        return back()->withErrors(['register_error' => 'No se pudo registrar']);
    }

    public function logout()
    {
        session()->forget('user');
        return redirect()->route('login');
    }
}
