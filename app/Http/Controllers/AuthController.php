<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function home()         { return view('auth.home'); }
    // public function showLogin()    { return view('auth.login'); }
    // public function showRegister() { return view('auth.register'); }
    public function showAuth()
{
    return view('auth.auth'); // o donde ubiques el archivo
}

    // ── REGISTRO ──────────────────────────────────────────────
    public function register(Request $request)
{
    $request->validate([
        'name'             => 'required|string|min:3|max:100',
        'email'            => 'required|email',
        'password'         => 'required|string|min:8|confirmed',
        'birth_date'       => 'required|date|before:today',
        'phone'            => 'nullable|string|max:20',
        'gender'           => 'nullable|in:male,female,other',
        'experience_years' => 'nullable|integer|min:0|max:70',
    ]);

    $response = Http::post('http://api.AgroFinanzas.test/api/register', [
        'name'                  => $request->name,
        'email'                 => $request->email,
        'password'              => $request->password,
        'password_confirmation' => $request->password_confirmation,
        'birth_date'            => $request->birth_date,
        'phone'                 => $request->phone,
        'gender'                => $request->gender,
        'experience_years'      => $request->experience_years,
    ]);

    if (!$response->successful()) {
        $apiErrors = $response->json('errors');
        if ($request->wantsJson()) {
            return response()->json([
                'success' => false,
                'errors'  => $apiErrors,
                'message' => $response->json('message') ?? 'No se pudo completar el registro.',
            ], 422);
        }
        if ($apiErrors) return back()->withErrors($apiErrors)->withInput();
        return back()->withErrors(['register_error' => $response->json('message') ?? 'No se pudo completar el registro.'])->withInput();
    }

    $data = $response->json();

    // Si es fetch (JSON) devolver JSON con user_id y email
    if ($request->wantsJson()) {
        return response()->json([
            'success' => true,
            'user_id' => $data['user_id'],
            'email'   => $data['email'],
        ]);
    }

    return redirect()->route('verify.show', ['user_id' => $data['user_id'], 'email' => $data['email']])
                     ->with('success', '¡Registro exitoso! Te enviamos un código a tu correo.');
}

    // ── VERIFICACIÓN ──────────────────────────────────────────
    public function showVerify(Request $request)
    {
        $userId = $request->query('user_id');
        $email  = $request->query('email');
        if (!$userId) return redirect()->route('register');
        return view('auth.verify', compact('userId', 'email'));
    }

    public function verifyCode(Request $request)
{
    $request->validate(['user_id' => 'required|integer', 'code' => 'required|string']);

    $response = Http::post('http://api.AgroFinanzas.test/api/verify-code', [
        'user_id' => $request->user_id,
        'code'    => $request->code,
    ]);

    if (!$response->successful()) {
        $data = $response->json();
        if ($request->wantsJson()) {
            return response()->json([
                'success' => false,
                'message' => ($data['expired'] ?? false)
                    ? 'El código expiró. Reenvía uno nuevo.'
                    : ($data['message'] ?? 'Código incorrecto.'),
            ], 422);
        }
        if ($data['expired'] ?? false) {
            return back()->withErrors(['verify_error' => 'El código expiró.'])->withInput();
        }
        return back()->withErrors(['verify_error' => $data['message'] ?? 'Código incorrecto.'])->withInput();
    }

    if ($request->wantsJson()) {
        return response()->json([
            'success'  => true,
            'redirect' => route('login'),
        ]);
    }

    return redirect()->route('login')->with('success', '✅ ¡Cuenta verificada! Ya puedes iniciar sesión.');
}

    public function resendCode(Request $request)
    {
        $request->validate(['user_id' => 'required|integer']);

        $response = Http::post('http://api.AgroFinanzas.test/api/resend-code', [
            'user_id' => $request->user_id,
        ]);

        if (!$response->successful()) {
            return back()->withErrors(['verify_error' => $response->json('message') ?? 'No se pudo reenviar el código.'])->withInput();
        }

        return back()->with('resend_success', '📧 Código reenviado. Revisa tu correo.');
    }

    // ── LOGIN ─────────────────────────────────────────────────
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        $response = Http::post('http://api.AgroFinanzas.test/api/login', [
            'email'    => $request->email,
            'password' => $request->password,
        ]);

        if (!$response->successful()) {
            $data = $response->json();
            if ($data['not_verified'] ?? false) {
                return redirect()->route('verify.show', ['user_id' => $data['user_id'], 'email' => $data['email']])
                                 ->withErrors(['verify_error' => 'Debes verificar tu cuenta primero.']);
            }
            return back()->withErrors(['login_error' => $data['message'] ?? 'Credenciales inválidas'])->withInput();
        }

        session(['user' => $response->json('user')]);
        $request->session()->regenerate();
        return redirect()->route('inicio.index');
    }

    // ── LOGOUT ────────────────────────────────────────────────
    public function logout(Request $request)
    {
        $request->session()->forget('user');
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }

    // ── EDITAR PERFIL ─────────────────────────────────────────
    public function showEditProfile()
    {
        $user = session('user');
        if (!$user) return redirect()->route('login');
        return view('auth.edit-profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = session('user');
        if (!$user) return redirect()->route('login');

        $request->validate([
            'name'             => 'nullable|string|min:3|max:100',
            'email'            => 'nullable|email',
            'birth_date'       => 'nullable|date|before:today',
            'profile_photo'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'phone'            => 'nullable|string|max:20',
            'gender'           => 'nullable|in:male,female,other',
            'experience_years' => 'nullable|integer|min:0|max:70',
        ]);

        $http = Http::asMultipart();

        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');
            $http = $http->attach('profile_photo', fopen($file->getRealPath(), 'r'), $file->getClientOriginalName());
        }

        $campos = ['name', 'email', 'birth_date', 'phone', 'gender', 'experience_years'];
        $fields = [];
        foreach ($campos as $campo) {
            $valor = $request->input($campo);
            if (!is_null($valor) && $valor !== '') {
                $fields[] = ['name' => $campo, 'contents' => (string) $valor];
            }
        }

        if (empty($fields) && !$request->hasFile('profile_photo')) {
            return back()->with('info', 'No se realizaron cambios.');
        }

        $response = $http->post("http://api.AgroFinanzas.test/api/users/{$user['id']}/update-profile", $fields);

        if (!$response->successful()) {
            $apiErrors = $response->json('errors');
            if ($apiErrors) return back()->withErrors($apiErrors)->withInput();
            return back()->withErrors(['update_error' => $response->json('message') ?? 'Error al actualizar.'])->withInput();
        }

        session(['user' => $response->json('user')]);
        return back()->with('success', 'Perfil actualizado correctamente.');
    }

    // ── ENVIAR CÓDIGO PARA ELIMINAR CUENTA ───────────────────
    public function sendDeleteCode(Request $request)
    {
        $user = session('user');
        if (!$user) return redirect()->route('login');

        $response = Http::post("http://api.AgroFinanzas.test/api/users/{$user['id']}/send-delete-code");

        if (!$response->successful()) {
            return back()->withErrors(['delete_error' => $response->json('message') ?? 'No se pudo enviar el código.']);
        }

        return back()->with('delete_code_sent', true);
    }

    // ── ELIMINAR CUENTA ───────────────────────────────────────
    public function deleteAccount(Request $request)
    {
        $user = session('user');
        if (!$user) return redirect()->route('login');

        $isVerified = $user['is_verified'] ?? false;

        // Cuenta verificada → necesita código
        if ($isVerified) {
            $request->validate(['delete_code' => 'required|string'], [
                'delete_code.required' => 'El código de confirmación es obligatorio.',
            ]);

            $response = Http::delete("http://api.AgroFinanzas.test/api/users/{$user['id']}", [
                'code' => $request->delete_code,
            ]);

            if (!$response->successful()) {
                $data = $response->json();
                if ($data['expired'] ?? false) {
                    return back()->withErrors(['delete_error' => 'El código expiró. Solicita uno nuevo.']);
                }
                return back()->withErrors(['delete_error' => $data['message'] ?? 'No se pudo eliminar la cuenta.']);
            }
        } else {
            // Cuenta NO verificada → eliminar directo
            $response = Http::delete("http://api.AgroFinanzas.test/api/users/{$user['id']}");

            if (!$response->successful()) {
                return back()->withErrors(['delete_error' => 'No se pudo eliminar la cuenta.']);
            }
        }

        // Cerrar sesión y redirigir
        $request->session()->forget('user');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Tu cuenta ha sido eliminada.');
    }
}