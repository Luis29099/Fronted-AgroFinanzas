<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RecommendationController extends Controller
{
    private function fetchDataFromApi($url)
{
    $response = Http::get($url);
    return $response->json();
}

public function index()
    {
        $response = Http::get('http://api.AgroFinanzas.test/api/recommendations');
        $recommendations = $response->json();

        return view('recommendations.index', compact('recommendations'));
    }

    public function store(Request $request)
    {
        $user = session('user');

        Http::post('http://api.AgroFinanzas.test/api/recommendations', [
            'text' => $request->text,
            'id_user_app' => $user['id'] ?? null,
        ]);

        return redirect()->route('recommendations.index');
    }

}
