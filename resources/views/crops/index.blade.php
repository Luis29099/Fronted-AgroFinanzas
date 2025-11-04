@extends('layouts.app')

@section('title', 'Agronomía')

@section('content')
<section class="agronomy-section py-5">
  <div class="container text-center">
    <h1 class="mb-4 fw-bold text-success agronomy-title">Sección de Agronomía</h1>
    <p class="mb-5 text-muted">Selecciona una categoría para continuar con la gestión de cada área.</p>

    <div class="row justify-content-center g-4">
      {{-- Card Ganado --}}
      <div class="col-md-3">
        <div class="card agronomy-card h-100">
          <img src="{{ asset('./img/ganado.jpeg') }}" class="card-img-top" alt="Ganado">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title fw-bold text-white">Ganado</h5>
            <p class="card-text flex-grow-1 text-muted">Control y seguimiento de bovinos, producción y alimentación.</p>
            <a href="{{ route('cattles') }}" class="btn agronomy-btn mt-auto">Ver detalles</a>
          </div>
        </div>
      </div>

      {{-- Card Cultivos de Aguacate --}}
      <div class="col-md-3">
        <div class="card agronomy-card h-100">
          <img src="{{ asset('./img/aguacate.jpg') }}" class="card-img-top" alt="Cultivos de Aguacate">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title fw-bold text-white">Cultivos de Aguacate</h5>
            <p class="card-text flex-grow-1 text-muted">Gestión de plantaciones, cosechas y fertilización.</p>
            <a href="{{ route('avocadocrops') }}" class="btn agronomy-btn mt-auto">Ver detalles</a>
          </div>
        </div>
      </div>

      {{-- Card Cultivos de Café --}}
      <div class="col-md-3">
        <div class="card agronomy-card h-100">
          <img src="{{ asset('./img/cafe.webp') }}" class="card-img-top" alt="Cultivos de Café">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title fw-bold text-white">Cultivos de Café</h5>
            <p class="card-text flex-grow-1 text-muted">Control de procesos de siembra, producción y calidad.</p>
            <a href="{{ route('coffecrops') }}" class="btn agronomy-btn mt-auto">Ver detalles</a>
          </div>
        </div>
      </div>

      {{-- Card Gallinas --}}
      <div class="col-md-3">
        <div class="card agronomy-card h-100">
          <img src="{{ asset('./img/gallinas.webp') }}" class="card-img-top" alt="Gallinas">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title fw-bold text-white">Gallinas</h5>
            <p class="card-text flex-grow-1 text-muted">Control de producción de huevos, alimentación y salud.</p>
            <a href="{{ route('hens') }}" class="btn agronomy-btn mt-auto">Ver detalles</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
