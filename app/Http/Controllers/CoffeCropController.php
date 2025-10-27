<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CoffeCropController extends Controller
{
    private function fetchDataFromApi($url)
{
    $response = Http::get($url);
    return $response->json();
}

public function index()   // http://api.codersfree.test/v1/coffe_crops?included=posts
{
    $url = env('URL_SERVER_API');

    $coffecrops = $this->fetchDataFromApi($url . '/coffe_crops');

    return view('coffecrops.index', compact('coffecrops'));
}

public function show($id)
{
    $url = env('URL_SERVER_API');

    $coffecrop = $this->fetchDataFromApi($url . '/coffe_crops/' . $id);

    return view('coffecrops.show', compact('coffecrop'));
}

}
