<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClimaController extends Controller
{
   public function index()
{
    $lat = 4.7110; // Bogotá
    $lon = -74.0721;
    $apiKey = "f5b7e4311f6e8254783490134807315e";

    $response = Http::get("https://api.agromonitoring.com/agro/1.0/weather", [
        'lat' => $lat,
        'lon' => $lon,
        'appid' => $apiKey,
    ]);

    if ($response->failed()) {
        return view('inicio/inicio', ['error' => 'No se pudieron obtener los datos del clima']);
    }

    $data = $response->json();

    // 🔹 Convertir temperatura de Kelvin a Celsius
    if (isset($data['main']['temp'])) {
        $data['main']['temp'] = round($data['main']['temp'] - 273.15, 1);
    }

    return view('inicio/index', compact('data'));
}

}
