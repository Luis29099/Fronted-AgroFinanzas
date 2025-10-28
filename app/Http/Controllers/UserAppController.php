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
        // 🚨 VERIFICACIÓN AÑADIDA: Si no hay 'user' en la sesión, redirige al login
        if (!session('user')) {
            return redirect()->route('login')->withErrors(['session_expired' => 'Debes iniciar sesión para acceder a tu perfil.']);
        }
        
        $url = env('URL_SERVER_API');

        $user_apps = $this->fetchDataFromApi($url . '/user_apps');
        
        // Asumiendo que quieres acceder a los datos del usuario logueado en la API,
        // deberías enviar el ID del usuario o el token.
        // Si tu API no requiere esto, ignora este comentario.

        return view('userapps.index', compact('user_apps'));
    }

public function show($id)
{
    // 🚨 VERIFICACIÓN AÑADIDA
        if (!session('user')) {
            return redirect()->route('login');
        }

        $url = env('URL_SERVER_API');

        $user_app = $this->fetchDataFromApi($url . '/user_apps/' . $id);
        
        return view('userapps.show', compact('user_app'));
}

}