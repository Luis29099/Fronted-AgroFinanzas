<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AvocadoCropController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json();
    }
    public function index()   //http://api.codersfree.test/v1/avocado_crops?included=posts
    {
        $url = env('URL_SERVER_API');

        $avocadocrops = $this->fetchDataFromApi($url . '/avocado_crops');

        return view('avocadocrops.index', compact('avocadocrops'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $avocadocrop = $this->fetchDataFromApi($url . '/avocado_crops/' . $id);

        return view('avocadocrops.show', compact('avocadocrop'));
    }       
}
