<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserAppController extends Controller
{
    private function fetchDataFromApi($url)
{
    $response = Http::get($url);
    return $response->json();
}

public function index()   // http://api.codersfree.test/v1/user_apps?included=posts
{
    $url = env('URL_SERVER_API');

    $user_apps = $this->fetchDataFromApi($url . '/user_apps');
    

    return view('userapps.index', compact('user_apps'));
}

public function show($id)
{
    $url = env('URL_SERVER_API');

    $user_app = $this->fetchDataFromApi($url . '/user_apps/' . $id);

    return view('userapps.show', compact('user_app'));
}

}
