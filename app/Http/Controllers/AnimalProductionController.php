<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AnimalProductionController extends Controller
{
       private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json();
    }

    public function index()   //http://api.codersfree.test/v1/animal_productions?included=posts
    {

        $url = env('URL_SERVER_API');

        $animalproductions = $this->fetchDataFromApi($url . '/animal_productions');



        return view('animalproductions.index', compact('animalproductions'));
    }

    public function show($id)
    {

        $url = env('URL_SERVER_API');

        $animalproduction = $this->fetchDataFromApi($url . '/animal_productions/' . $id);

        return view('animalproductions.show', compact('animalproduction'));
    }
}
