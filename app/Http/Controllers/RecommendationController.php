<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RecommendationController extends Controller
{
    public function index()
    {
        $response = Http::get('http://api.AgroFinanzas.test/api/recommendations');

        // Asegura que siempre sea un array
        $recommendations = $response->json() ?? [];

        return view('recommendations.index', compact('recommendations'));
    }

    public function store(Request $request)
{
    $user = session('user');

    Http::post('http://api.AgroFinanzas.test/api/recommendations', [
        'text' => $request->text,
        'category' => $request->category,
        'id_user_app' => $user['id'] ?? null,
        'parent_id' => $request->parent_id // 👈 NUEVO
    ]);

    return redirect()->route('recommendations.index');
}

}