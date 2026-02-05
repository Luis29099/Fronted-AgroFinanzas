<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CoffeCropController extends Controller
{
    public function index()
    {
        // API de noticias sobre café
        $apiKey = '2338b8d89f4c42019391fb8f22e02976'; // Pon tu NewsAPI Key
        $url = 'https://newsapi.org/v2/everything?q=coffee&language=es&pageSize=6&apiKey=' . $apiKey;

        $response = Http::get($url);

        // Verificamos si la respuesta fue exitosa
        $noticias = [];
        if ($response->successful()) {
            $noticias = $response->json()['articles'];
        }

        // Pasamos las noticias a la vista
        return view('coffecrops.index', compact('noticias'));
    }
}