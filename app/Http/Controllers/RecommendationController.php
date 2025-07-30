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

public function index()   // http://api.codersfree.test/v1/recommendations?included=posts
{
    $url = env('URL_SERVER_API');

    $recommendations = $this->fetchDataFromApi($url . '/recommendations');

    return view('recommendation.index', compact('recommendations'));
}

public function show($id)
{
    $url = env('URL_SERVER_API');

    $recommendation = $this->fetchDataFromApi($url . '/recommendations/' . $id);

    return view('recommendation.show', compact('recommendation'));
}

}
