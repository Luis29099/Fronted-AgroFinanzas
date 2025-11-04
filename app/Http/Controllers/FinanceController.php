<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FinanceController extends Controller
{
    // URL de la API externa (MockAPI)
    private $mockApiUrl = 'https://68fa9ecfef8b2e621e807d6d.mockapi.io/api/v1/finances';

    // URL del backend real (Laravel API)
    private $backendApiUrl = 'http://api.AgroFinanzas.test/api/finances';

    /**
     * Muestra los datos obtenidos desde la MockAPI
     */
    public function index()
    {
        // Consumir los datos desde MockAPI
        $response = Http::get($this->mockApiUrl);

        if ($response->failed()) {
            return response()->json(['error' => 'No se pudo conectar con la API externa'], 500);
        }

        $finances = $response->json();

        return view('finances.index', compact('finances'));
    }

    /**
     * Envía datos tanto a la MockAPI como al backend Laravel
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|in:income,expense',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        // 1️⃣ Enviamos a la MockAPI
        $mockResponse = Http::post($this->mockApiUrl, $data);

        // 2️⃣ Enviamos también al backend Laravel
        $backendResponse = Http::post($this->backendApiUrl, $data);

        return response()->json([
            'success' => true,
            'mockapi_response' => $mockResponse->json(),
            'backend_response' => $backendResponse->json(),
        ]);
    }
}
