<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CattleController extends Controller
{
    private string $apiBase;

    public function __construct()
    {
        $this->apiBase = env('URL_SERVER_API') . '/cattles';
    }

    // ── Lista del hato del usuario ────────────────────────────
    public function index()
    {
        $user   = session('user');
        $userId = $user['id'] ?? null;

        $response = Http::get($this->apiBase, ['user_id' => $userId]);
        $data     = $response->json();

        $cattle  = $data['cattle']  ?? [];
        $summary = $data['summary'] ?? [];

        return view('hato.index', compact('cattle', 'summary'));
    }

    // ── Detalle de un animal ──────────────────────────────────
    public function show($id)
    {
        $response = Http::get("{$this->apiBase}/{$id}");
        $cattle   = $response->json('cattle') ?? [];

        return view('hato.show', compact('cattle'));
    }

    // ── Formulario registrar nuevo animal ─────────────────────
    public function create()
    {
        $user = session('user');

        $mothers = Http::get($this->apiBase, [
            'user_id' => $user['id'],
        ])->json('cattle') ?? [];

        $mothers = array_filter($mothers, fn($c) => $c['gender'] === 'female' && $c['status'] === 'active');

        return view('hato.create', compact('mothers'));
    }

    // ── Guardar nuevo animal ──────────────────────────────────
    public function store(Request $request)
    {
        $user = session('user');
        if (!$user) return redirect()->route('login');

        $request->validate([
            'breed'         => 'required|string',
            'use_milk_meat' => 'required|in:milk,meat,dual',
            'gender'        => 'required|in:female,male',
            'name'          => 'nullable|string|max:100',
            'tag_number'    => 'nullable|string|max:50',
            'birth_date'    => 'nullable|date',
            'origin'        => 'nullable|in:born_here,purchased',
            'notes'         => 'nullable|string',
            'photo'         => 'nullable|image|mimes:jpg,jpeg,png|max:3072',
        ]);

        $http = Http::asMultipart();

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $http = $http->attach('photo', fopen($file->getRealPath(), 'r'), $file->getClientOriginalName());
        }

        $fields = [
            ['name' => 'user_id',       'contents' => (string) $user['id']],
            ['name' => 'breed',         'contents' => $request->breed],
            ['name' => 'use_milk_meat', 'contents' => $request->use_milk_meat],
            ['name' => 'gender',        'contents' => $request->gender],
        ];

        foreach (['name', 'tag_number', 'birth_date', 'origin', 'notes', 'average_weight', 'mother_id'] as $campo) {
            if ($request->filled($campo)) {
                $fields[] = ['name' => $campo, 'contents' => (string) $request->$campo];
            }
        }

        $response = $http->post($this->apiBase, $fields);

        if ($response->successful()) {
            return redirect()->route('client.cattle.index')
                ->with('success', 'Animal registrado correctamente.');
        }

        return back()->withErrors(['error' => $response->json('message') ?? 'Error al registrar.'])->withInput();
    }

    // ── Formulario registrar nacimiento ───────────────────────
    public function showBirthForm($motherId)
    {
        $response = Http::get("{$this->apiBase}/{$motherId}");
        $mother   = $response->json('cattle') ?? [];

        return view('hato.birth', compact('mother'));
    }

    // ── Guardar nacimiento de ternero ─────────────────────────
    public function registerBirth(Request $request, $motherId)
    {
        $request->validate([
            'gender'     => 'required|in:female,male',
            'birth_date' => 'required|date',
            'name'       => 'nullable|string|max:100',
            'tag_number' => 'nullable|string|max:50',
            'notes'      => 'nullable|string',
            'photo'      => 'nullable|image|mimes:jpg,jpeg,png|max:3072',
        ]);

        $http = Http::asMultipart();

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $http = $http->attach('photo', fopen($file->getRealPath(), 'r'), $file->getClientOriginalName());
        }

        $fields = [
            ['name' => 'gender',     'contents' => $request->gender],
            ['name' => 'birth_date', 'contents' => $request->birth_date],
        ];

        foreach (['name', 'tag_number', 'notes'] as $campo) {
            if ($request->filled($campo)) {
                $fields[] = ['name' => $campo, 'contents' => $request->$campo];
            }
        }

        $response = $http->post("{$this->apiBase}/{$motherId}/birth", $fields);

        if ($response->successful()) {
            return redirect()->route('client.cattle.index')
                ->with('success', '🐄 Nacimiento registrado correctamente.');
        }

        return back()->withErrors(['error' => $response->json('message') ?? 'Error al registrar el nacimiento.']);
    }

    // ── Actualizar animal ─────────────────────────────────────
    public function update(Request $request, $id)
    {
        $http = Http::asMultipart();

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $http = $http->attach('photo', fopen($file->getRealPath(), 'r'), $file->getClientOriginalName());
        }

        $fields = [];
        foreach (['status', 'notes', 'average_weight', 'name', 'tag_number'] as $campo) {
            if ($request->filled($campo)) {
                $fields[] = ['name' => $campo, 'contents' => $request->$campo];
            }
        }

        $response = $http->post("{$this->apiBase}/{$id}", $fields);

        if ($response->successful()) {
            return back()->with('success', 'Animal actualizado correctamente.');
        }

        return back()->withErrors(['error' => $response->json('message') ?? 'Error al actualizar.']);
    }

    // ── Eliminar animal ───────────────────────────────────────
    public function destroy($id)
    {
        $response = Http::delete("{$this->apiBase}/{$id}");

        if ($response->successful()) {
            return redirect()->route('client.cattle.index')->with('success', 'Animal eliminado.');
        }

        return back()->withErrors(['error' => 'No se pudo eliminar el animal.']);
    }
}