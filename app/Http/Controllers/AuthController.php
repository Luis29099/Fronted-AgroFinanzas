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
            // Guardar usuario en sesión
            session(['user' => $data['user']]); 
            // Regenera el ID de sesión tras el login para prevenir Session Fixation
            $request->session()->regenerate(); 
            return redirect()->route('home');
        }

        return back()->withErrors(['login_error' => 'Credenciales inválidas']);
    }

    public function register(Request $request)
    {
        $response = Http::post('http://api.AgroFinanzas.test/api/register', [
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => $request->password,
            'birth_date' => $request->birth_date,
        ]);

        if ($response->successful()) {
            return redirect()->route('login')->with('success', 'Registro exitoso. Inicia sesión.');
        }

        return back()->withErrors(['register_error' => 'No se pudo registrar']);
    }

    // MÉTODO LOGOUT CORREGIDO
    public function logout(Request $request)
    {
        // 1. Olvida la variable de sesión 'user' que usas para el control.
        $request->session()->forget('user');
        
        // 2. Invalida la sesión (destruye todos los datos de sesión)
        $request->session()->invalidate();
        
        // 3. Regenera el token CSRF por seguridad
        $request->session()->regenerateToken(); 
        
        return redirect()->route('login');
    }
}
