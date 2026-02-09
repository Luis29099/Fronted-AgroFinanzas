<?php

namespace App\Http\Controllers;

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

    /* =======================
        LOGIN
    ======================= */
    public function login(Request $request)
    {
        $response = Http::post('http://api.AgroFinanzas.test/api/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if (!$response->successful()) {
            return back()->withErrors(['login_error' => 'Credenciales inválidas']);
        }

        $data = $response->json();

        session(['user' => $data['user']]);
        $request->session()->regenerate();

        return redirect()->route('inicio.index');
    }

    /* =======================
        REGISTER
    ======================= */
    public function register(Request $request)
    {
        $response = Http::post('http://api.AgroFinanzas.test/api/register', [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'birth_date' => $request->birth_date,
        ]);

        if (!$response->successful()) {
            return back()->withErrors(['register_error' => 'No se pudo registrar']);
        }

        return redirect()->route('login')
            ->with('success', 'Registro exitoso. Inicia sesión.');
    }

    /* =======================
        LOGOUT
    ======================= */
    public function logout(Request $request)
    {
        $request->session()->forget('user');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    /* =======================
        EDIT PROFILE
    ======================= */
    public function showEditProfile()
    {
        $user = session('user');

        if (!$user) {
            return redirect()->route('login');
        }

        return view('auth.edit-profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = session('user');

        if (!$user) {
            return redirect()->route('login');
        }

        $http = Http::asMultipart();

        // Adjuntar imagen si viene
        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');

            $http = $http->attach(
                'profile_photo',
                fopen($file->getRealPath(), 'r'),
                $file->getClientOriginalName()
            );
        }

        $response = $http->post(
            "http://api.AgroFinanzas.test/api/user_apps/{$user['id']}/update-profile",
            [
                ['name' => 'name', 'contents' => $request->name],
                ['name' => 'email', 'contents' => $request->email],
                ['name' => 'birth_date', 'contents' => $request->birth_date],
            ]
        );

        if (!$response->successful()) {
            return back()->withErrors(['update_error' => 'Error al actualizar el perfil']);
        }

        $data = $response->json();

        if (!isset($data['user'])) {
            return back()->withErrors([
                'update_error' => 'El API no devolvió los datos del usuario'
            ]);
        }

        // 🔥 CLAVE: actualizar sesión con el usuario nuevo
        session(['user' => $data['user']]);

        return back()->with('success', 'Perfil actualizado correctamente.');
    }
}
