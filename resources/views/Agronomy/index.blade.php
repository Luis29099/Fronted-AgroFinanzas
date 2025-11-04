@extends('layouts.app')

@section('content')
{{-- Este sería el contenido de tu vista: production/index.blade.php --}}

<main class="Agronomia">
    {{-- Nuevo contenedor para mejorar el estilo del título --}}
    <div class="header-produccion"> 
        <h1 class="titulo-principal">Producción Agropecuaria</h1>
        <p class="subtitulo-principal">Selecciona un área para gestionar tus finanzas y producción.</p>
    </div>
    
    <div class="Agronomia-container">

        {{-- Tarjeta de Gallinas --}}
        <a href="/gallinas/gallinas/gallinas.html">
            <div class="Agronomia-card">
                <img class="img-card" src="https://images.unsplash.com/photo-1698521256250-eaadb5112942?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1169" alt="Gallina">
                <div class="textog">Aves de Corral</div> {{-- Texto mejorado --}}
            </div>
        </a>
        
        {{-- Tarjeta de Ganado Vacuno --}}
        <a href="/vacuno/index.html">
            <div class="Agronomia-card">
                <img class="img-card" src="https://images.unsplash.com/photo-1596733430284-f7437764b1a9?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1170" alt="Ganado Vacuno">
                <div class="textog">Ganado Vacuno</div>
            </div>
        </a>
        
        {{-- Tarjeta de Aguacate --}}
        <a href="/aguacate/index.html">
            <div class="Agronomia-card">
                <img class="img-card" src="https://images.squarespace-cdn.com/content/v1/59bc6b2d29f1875d21620187/1662640802210-U7YF38WVQDVN93VEYVE2/Aguacate.png?format=1500w" alt="Aguacate">
                <div class="textog">Cultivo de Aguacate</div> {{-- Texto mejorado --}}
            </div>
        </a>
        
        {{-- Tarjeta de Café --}}
        <a href="/Cafe/index.html">
            <div class="Agronomia-card">
                <img class="img-card" src="https://images.unsplash.com/photo-1677125671399-65852c6dfb05?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTJ8fGN1bHRpdm8lMjBkZSUyMGNhZmV8ZW58MHx8MHx8fDI%3D&auto=format&fit=crop&q=60&w=600" alt="Café">
                <div class="textog">Cultivo de Café</div> {{-- Texto mejorado --}}
            </div>
        </a>

    </div>
</main>
@endsection