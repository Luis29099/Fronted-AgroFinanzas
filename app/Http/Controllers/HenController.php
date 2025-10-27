<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HenController extends Controller
{
    private function fetchDataFromApi($url)
{
    $response = Http::get($url);
    return $response->json();
}

public function index()   // http://api.codersfree.test/v1/hens?included=posts
{
    $url = env('URL_SERVER_API');

    $hens = $this->fetchDataFromApi($url . '/hens');

    return view('hen.index', compact('hens'));
}

public function show($id)
{
    $url = env('URL_SERVER_API');

    $hen = $this->fetchDataFromApi($url . '/hens/' . $id);

    return view('hen.show', compact('hen'));
}

}
