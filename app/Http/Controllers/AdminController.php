<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    private string $apiBase;
    private string $apiAdminBase;

    public function __construct()
    {
        $this->apiAdminBase = env('URL_SERVER_API') . '/admin';
    }

    // Helper: headers con token de admin
    private function authHeaders(): array
    {
        return ['Authorization' => 'Bearer ' . session('admin.token')];
    }

    // ── LOGIN ─────────────────────────────────────────────────
    public function showLogin()
    {
        if (session('admin')) return redirect()->route('admin.dashboard');
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $response = Http::post("{$this->apiAdminBase}/login", [
            'email'    => $request->email,
            'password' => $request->password,
        ]);

        if ($response->successful()) {
            $data = $response->json();
            session(['admin' => array_merge($data['admin'], ['token' => $data['token']])]);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['error' => $response->json('message') ?? 'Credenciales incorrectas.']);
    }

    public function logout()
    {
        Http::withHeaders($this->authHeaders())->post("{$this->apiAdminBase}/logout");
        session()->forget('admin');
        return redirect()->route('admin.login')->with('success', 'Sesión cerrada correctamente.');
    }

    // ── DASHBOARD ─────────────────────────────────────────────
    public function dashboard()
    {
        $users    = Http::withHeaders($this->authHeaders())->get("{$this->apiAdminBase}/users")->json('users') ?? [];
        $finances = Http::withHeaders($this->authHeaders())->get("{$this->apiAdminBase}/finances")->json('summary') ?? [];
        $comments = Http::withHeaders($this->authHeaders())->get("{$this->apiAdminBase}/comments")->json('total') ?? 0;

        $stats = [
            'total_users'    => count($users),
            'active_users'   => count(array_filter($users, fn($u) => $u['is_active'])),
            'total_finances' => $finances['records'] ?? 0,
            'total_comments' => $comments,
            'total_income'   => $finances['total_income'] ?? 0,
            'total_expense'  => $finances['total_expense'] ?? 0,
        ];

        return view('admin.dashboard', compact('stats', 'users'));
    }

    // ── USUARIOS ──────────────────────────────────────────────
    public function users(Request $request)
    {
        $params = array_filter([
            'search' => $request->search,
            'status' => $request->status,
        ]);

        $response = Http::withHeaders($this->authHeaders())->get("{$this->apiAdminBase}/users", $params);
        $users    = $response->json('users') ?? [];

        return view('admin.users.index', compact('users'));
    }

    public function showUser($id)
    {
        $user     = Http::withHeaders($this->authHeaders())->get("{$this->apiAdminBase}/users/{$id}")->json('user') ?? [];
        $finances = Http::withHeaders($this->authHeaders())->get("{$this->apiAdminBase}/finances/user/{$id}")->json() ?? [];
        $comments = Http::withHeaders($this->authHeaders())->get("{$this->apiAdminBase}/comments/user/{$id}")->json('comments') ?? [];

        return view('admin.users.show', compact('user', 'finances', 'comments'));
    }

    public function toggleUser($id)
    {
        $response = Http::withHeaders($this->authHeaders())->patch("{$this->apiAdminBase}/users/{$id}/toggle");

        if ($response->successful()) {
            return back()->with('success', $response->json('message'));
        }
        return back()->withErrors(['error' => 'Error al cambiar estado del usuario.']);
    }

    public function destroyUser($id)
    {
        $response = Http::withHeaders($this->authHeaders())->delete("{$this->apiAdminBase}/users/{$id}");

        if ($response->successful()) {
            return redirect()->route('admin.users')->with('success', 'Usuario eliminado correctamente.');
        }
        return back()->withErrors(['error' => 'No se pudo eliminar el usuario.']);
    }

    // ── FINANZAS ──────────────────────────────────────────────
    public function finances(Request $request)
    {
        $params = array_filter(['user_id' => $request->user_id, 'type' => $request->type]);

        $response = Http::withHeaders($this->authHeaders())->get("{$this->apiAdminBase}/finances", $params)->json();
        $finances = $response['finances'] ?? [];
        $summary  = $response['summary']  ?? [];
        $users    = Http::withHeaders($this->authHeaders())->get("{$this->apiAdminBase}/users")->json('users') ?? [];

        return view('admin.finances.index', compact('finances', 'summary', 'users'));
    }

    // ── COMENTARIOS ───────────────────────────────────────────
    public function comments(Request $request)
    {
        $params   = array_filter(['search' => $request->search, 'user_id' => $request->user_id]);
        $response = Http::withHeaders($this->authHeaders())->get("{$this->apiAdminBase}/comments", $params)->json();
        $comments = $response['comments'] ?? [];
        $users    = Http::withHeaders($this->authHeaders())->get("{$this->apiAdminBase}/users")->json('users') ?? [];

        return view('admin.comments.index', compact('comments', 'users'));
    }

    public function destroyComment($id)
    {
        $response = Http::withHeaders($this->authHeaders())->delete("{$this->apiAdminBase}/comments/{$id}");

        if ($response->successful()) {
            return back()->with('success', 'Comentario eliminado.');
        }
        return back()->withErrors(['error' => 'No se pudo eliminar el comentario.']);
    }
}