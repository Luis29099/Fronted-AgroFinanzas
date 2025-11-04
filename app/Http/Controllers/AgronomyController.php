<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgronomyController extends Controller
{
    public function index()
    {
        return view('Agronomy.index'); // Asegúrate de que la vista exista
    }
}
