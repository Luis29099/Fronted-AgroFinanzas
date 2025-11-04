@extends('layouts.app')

@section('title', 'AgroFinanzas – Cultivos de Aguacate')

@section('content')
<div class="container my-5">

  <a href="{{ url('/crops') }}" class="agronomy-btn mb-4 d-inline-block">🌿 Volver a Agronomía</a>

  <!-- Introducción -->
  <section class="section-box text-center">
    <h1 class="mb-3">🥑 Cultivos de Aguacate</h1>
    <p class="lead">
      El aguacate es uno de los cultivos más rentables y nutritivos de América Latina. 
      Su manejo adecuado permite una producción sostenible, de alta calidad y con excelente rendimiento exportador.
    </p>
  </section>

  <!-- Tabla dinámica -->
  <section class="section-box">
    <h2 class="text-center section-title mb-4">Listado de cultivos registrados</h2>
    <h3>Sección en construcción 🛠️</h3>
    <table class="table table-bordered table-striped text-center">
      <thead>
        <tr>
          <th>ID</th>
          <th>Variedad</th>
          <th>Producción Estimada</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($avocadocrops as $avocadocrop)
        <tr>
          <td>{{ $avocadocrop['id'] }}</td>
          <td>{{ ucfirst($avocadocrop['variety']) }}</td>
          <td>{{ $avocadocrop['estimated_production'] }} kg</td>
          <td>
            <a href="{{ route('avocadocrop.show', $avocadocrop['id']) }}" class="btn btn-success btn-sm">
              Ver más
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </section>

  <!-- Variedades destacadas -->
  <section class="section-box">
    <h2 class="text-center section-title mb-4">Variedades destacadas</h2>
    <div class="row g-4 mt-4 justify-content-center">

      <!-- Hass -->
      <div class="col-12 col-md-6 col-lg-3">
        <div class="card bg-transparent border border-success-subtle text-center h-100 p-3 neon-card">
          <img src="{{ asset('img/aguacateHass.jpg') }}" class="img-grid mb-3" alt="Aguacate Hass">
          <div class="card-body">
            <h5 class="fw-bold text-success">Hass</h5>
            <p class="text-light small">
              La variedad más reconocida internacionalmente. De piel rugosa y oscura, posee una pulpa cremosa rica en aceites naturales.
            </p>
          </div>
        </div>
      </div>

      <!-- Pinkerton -->
      <div class="col-12 col-md-6 col-lg-3">
        <div class="card bg-transparent border border-success-subtle text-center h-100 p-3 neon-card">
          <img src="{{ asset('img/aguacatePinkerton.webp') }}" class="img-grid mb-3" alt="Aguacate Pinkerton">
          <div class="card-body">
            <h5 class="fw-bold text-success">Pinkerton</h5>
            <p class="text-light small">
              De forma alargada y piel gruesa, ofrece una excelente proporción de pulpa. Muy productivo y con larga vida útil.
            </p>
          </div>
        </div>
      </div>

      <!-- Lamb Hass -->
      <div class="col-12 col-md-6 col-lg-3">
        <div class="card bg-transparent border border-success-subtle text-center h-100 p-3 neon-card">
          <img src="{{ asset('img/aguacateLambHass.webp') }}" class="img-grid mb-3" alt="Aguacate Lamb Hass">
          <div class="card-body">
            <h5 class="fw-bold text-success">Lamb Hass</h5>
            <p class="text-light small">
              Similar al Hass, pero más grande y resistente al calor. Ideal para regiones cálidas con alta exposición solar.
            </p>
          </div>
        </div>
      </div>

      <!-- Fuerte -->
      <div class="col-12 col-md-6 col-lg-3">
        <div class="card bg-transparent border border-success-subtle text-center h-100 p-3 neon-card">
          <img src="{{ asset('img/aguacateFuerte.webp') }}" class="img-grid mb-3" alt="Aguacate Fuerte">
          <div class="card-body">
            <h5 class="fw-bold text-success">Fuerte</h5>
            <p class="text-light small">
              De piel verde y lisa, con sabor delicado y bajo contenido de grasa. Perfecto para consumo fresco y mercados locales.
            </p>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- Cuidados -->
  <section class="info">
    <h2>Cuidados del cultivo</h2>
    <p>El aguacate requiere suelos profundos, bien drenados y ricos en materia orgánica.</p>
    <ul>
      <li>💧 <strong>Riego:</strong> moderado y constante, evitando encharcamientos.</li>
      <li>🌤️ <strong>Clima ideal:</strong> templado, entre 18 °C y 25 °C.</li>
      <li>🌱 <strong>Poda:</strong> estimula la aireación y la fructificación.</li>
    </ul>
  </section>

  <!-- Plagas -->
  <section class="info">
    <h2>Control de plagas y enfermedades</h2>
    <p>Las principales amenazas incluyen trips, ácaros y la Phytophthora cinnamomi.</p>
    <ul>
      <li>🦟 Aplicar extractos naturales de neem o ajo.</li>
      <li>🧪 Usar biofungicidas en etapas tempranas.</li>
      <li>🌿 Fomentar enemigos naturales para control biológico.</li>
    </ul>
  </section>

  <!-- Suelo -->
  <section class="info mb-5">
    <h2>Condiciones del suelo</h2>
    <p>El pH óptimo del suelo para el aguacate está entre 5.5 y 6.8. Un drenaje eficiente mejora la absorción de nutrientes.</p>
  </section>

</div>

<!-- Estilos personalizados -->
<style>
  body {
    background: radial-gradient(circle at top left, #0a0a0a 0%, #1b1b1b 100%);
    color: #fff;
    font-family: 'Poppins', sans-serif;
  }

  h1, h2 {
    font-weight: 700;
    color: #18d92e;
    text-shadow: 0 0 15px rgba(24, 217, 46, 0.4);
  }

  p, li {
    color: #ccc;
    line-height: 1.7;
  }

  .section-box, .info {
    background: rgba(255, 255, 255, 0.06);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 16px;
    padding: 25px;
    margin-bottom: 40px;
    box-shadow: 0 4px 25px rgba(0, 0, 0, 0.3);
    transition: all 0.3s ease-in-out;
  }

  .section-box:hover, .info:hover {
    box-shadow: 0 0 30px rgba(24, 217, 46, 0.3);
    transform: scale(1.01);
  }

  .section-title {
    background: rgba(24, 217, 46, 0.1);
    padding: 8px 16px;
    border-radius: 8px;
    color: #18d92e;
    display: inline-block;
    text-shadow: 0 0 10px rgba(24, 217, 46, 0.4);
  }

  .img-grid {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 12px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.4);
    transition: all 0.4s ease;
  }

  .img-grid:hover {
    transform: scale(1.05);
    box-shadow: 0 0 25px rgba(24, 217, 46, 0.4);
  }

  .agronomy-btn {
    background: linear-gradient(135deg, #38ef7d, #11998e);
    color: #fff;
    border: none;
    border-radius: 8px;
    padding: 8px 16px;
    font-weight: 600;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    cursor: pointer;
  }

  .agronomy-btn:hover {
    background: linear-gradient(135deg, #42f5b6, #1dd1a1);
    transform: scale(1.05);
    box-shadow: 0 0 15px rgba(24, 217, 46, 0.3);
  }

  .neon-card {
    border-radius: 14px;
    box-shadow: 0 0 10px rgba(24, 217, 46, 0.1);
    transition: all 0.35s ease-in-out;
  }

  .neon-card:hover {
    transform: translateY(-6px) scale(1.03);
    box-shadow: 0 0 25px rgba(24, 217, 46, 0.6), 0 0 50px rgba(24, 217, 46, 0.4);
    border: 1px solid rgba(24, 217, 46, 0.7);
    background: rgba(24, 217, 46, 0.05);
  }

  .neon-card h5 {
    text-shadow: 0 0 8px rgba(24, 217, 46, 0.5);
  }

  @media (max-width: 768px) {
    h1 { font-size: 1.8rem; }
    .img-grid { height: 160px; }
    .info h2 { font-size: 1.2rem; }
  }
</style>
@endsection
