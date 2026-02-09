@extends('layouts.app')

@section('content')
{{-- Esta vista organiza los accesos a las diferentes áreas de producción agropecuaria --}}

<main class="Agronomia">
{{-- Contenedor del encabezado con títulos y subtítulos --}}
<div class="header-produccion">
<h1 class="titulo-principal">Producción Agropecuaria</h1>
<p class="subtitulo-principal">Selecciona un área para gestionar tus finanzas y producción.</p>
</div>

{{-- Contenedor principal para la cuadrícula de tarjetas --}}
<div class="Agronomia-container">

    {{-- Tarjeta de Aves de Corral --}}
    <a href="hens" class="agronomiacards">
        <div class="Agronomia-card">
            {{-- Imagen de Aves de Corral --}}
            <img class="img-card" src="https://images.unsplash.com/photo-1698521256250-eaadb5112942?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1169" alt="Gallina">
            <div class="card-text">Aves de Corral</div>
        </div>
    </a>
    
    {{-- Tarjeta de Ganado Vacuno --}}
    <a href="cattles" class="agronomiacards">
        <div class="Agronomia-card">
            {{-- Imagen de Ganado Vacuno --}}
            <img class="img-card" src="https://images.unsplash.com/photo-1596733430284-f7437764b1a9?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1170" alt="Ganado Vacuno">
            <div class="card-text">Ganado Vacuno</div>
        </div>
    </a>
    
    {{-- Tarjeta de Cultivo de Aguacate --}}
    <a href="avocadocrops" class="agronomiacards">
        <div class="Agronomia-card">
            {{-- Imagen de Aguacate (usando tu URL original) --}}
            <img class="img-card" src="https://images.squarespace-cdn.com/content/v1/59bc6b2d29f1875d21620187/1662640802210-U7YF38WVQDVN93VEYVE2/Aguacate.png?format=1500w" alt="Aguacate">
            <div class="card-text">Cultivo de Aguacate</div>
        </div>
    </a>
    
    {{-- Tarjeta de Cultivo de Café --}}
    <a href="coffe_crops" class="agronomiacards">
        <div class="Agronomia-card">
            {{-- Imagen de Café --}}
            <img class="img-card" src="https://images.unsplash.com/photo-1677125671399-65852c6dfb05?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTJ8fGN1bHRpdm8lMjBkZSUyMGNhZmV8ZW58MHx8MHx8fDI%3D&auto=format&fit=crop&q=60&w=600" alt="Café">
            <div class="card-text">Cultivo de Café</div>
        </div>
    </a>

</div>


</main>
@endsection