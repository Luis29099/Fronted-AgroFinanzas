<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClimaController extends Controller
{
    // Tu vista normal
    public function index()
    {
        return view('inicio.index');
    }

    // API PARA EL FETCH JS
    public function apiClima()
    {
        $lat = 4.7110;
        $lon = -74.0721;
        $apiKey = "f5b7e4311f6e8254783490134807315e";

        $response = Http::get("https://api.agromonitoring.com/agro/1.0/weather", [
            'lat' => $lat,
            'lon' => $lon,
            'appid' => $apiKey,
        ]);

        if ($response->failed()) {
            return response()->json([
                'error' => true,
                'message' => 'No se pudieron obtener los datos del clima'
            ]);
        }

        $data = $response->json();

        // Kelvin → Celsius
        if (isset($data['main']['temp'])) {
            $data['main']['temp'] = round($data['main']['temp'] - 273.15, 1);
        }

        return response()->json($data);
    }
}