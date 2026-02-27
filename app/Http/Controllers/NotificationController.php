<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NotificationController extends Controller
{
    protected string $apiBase = 'http://api.AgroFinanzas.test/api';

    private function token(): string
    {
        return session('api_token') ?? '';
    }

    // ── Obtener notificaciones del usuario ────────────────────
    public function index()
    {
        $user = session('user');
        if (!$user) return response()->json(['error' => 'No autenticado'], 401);

        $response = Http::withToken($this->token())
            ->get("{$this->apiBase}/notifications/{$user['id']}");

        return response()->json($response->json());
    }

    // ── Conteo de no leídas (para polling del navbar) ─────────
    public function unreadCount()
    {
        $user = session('user');
        if (!$user) return response()->json(['unread_count' => 0]);

        $response = Http::withToken($this->token())
            ->get("{$this->apiBase}/notifications/{$user['id']}/unread-count");

        return response()->json($response->json());
    }

    // ── Marcar una como leída ─────────────────────────────────
    public function markRead($id)
    {
        $response = Http::withToken($this->token())
            ->patch("{$this->apiBase}/notifications/{$id}/read");

        return response()->json($response->json());
    }

    // ── Marcar todas como leídas ──────────────────────────────
    public function markAllRead()
    {
        $user = session('user');
        if (!$user) return response()->json(['error' => 'No autenticado'], 401);

        $response = Http::withToken($this->token())
            ->patch("{$this->apiBase}/notifications/{$user['id']}/read-all");

        return response()->json($response->json());
    }
}