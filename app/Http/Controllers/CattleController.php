<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CattleController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json();
    }

    public function index()
    {
        $url = env('URL_SERVER_API');
        $cattles = $this->fetchDataFromApi($url . '/cattles');

        return view('cattles.index', compact('cattles'));
    }

    
    public function show($id)
    {
        $url = env('URL_SERVER_API');
        $cattle = $this->fetchDataFromApi($url . '/cattles/' . $id);

        return view('cattles.show', compact('cattle'));
    }
}
