@extends('layouts.app')

@section('content')
<div class="container my-4">
    <a href="{{ url('/crops') }}" class="agronomy-btn mb-4 d-inline-block">
      🌾 Volver a Agronomía
    </a>

  <!-- Presentación -->
  <section class="section-box text-center">
    <h1 class="mb-3">🐄 Vacas: Manejo y Producción</h1>
    <p class="lead">
      Las vacas son esenciales para la producción de leche, carne y estiércol, 
      además de jugar un papel ecológico clave en la economía rural. 
      Su manejo eficiente mejora la rentabilidad y el bienestar animal.
    </p>
  </section>

  <!-- Razas -->
  <section class="section-box">
    <h2 class="text-center section-title mb-4">Razas más comunes</h2>
    <p>
      Entre las más conocidas están: <strong>Holstein</strong> (alta producción de leche), 
      <strong>Jersey</strong> (leche rica en grasa), <strong>Angus</strong> (carne de calidad) y 
      <strong>Brahman</strong> (resistencia al calor).
    </p>
    <div class="row g-3 mt-4">
      <div class="col-6 col-md-4 col-lg-2"><img src="https://licnz.com/wp-content/uploads/2020/10/Holstein-Friesian-bull-Mint-Edition-Front-on.jpg" class="img-grid" alt="Holstein"></div>
      <div class="col-6 col-md-4 col-lg-2"><img src="https://i.pinimg.com/originals/e5/79/01/e57901f813294688ca0bf4f313e5c840.jpg" class="img-grid" alt="Jersey"></div>
      <div class="col-6 col-md-4 col-lg-2"><img src="https://www.lechedeflorida.com/core/fileparse.php/278/urlt/Holstein-Cow-Headshot.jpg" class="img-grid" alt="Angus"></div>
      <div class="col-6 col-md-4 col-lg-2"><img src="https://www.miguelvergara.com/actualidad/wp-content/uploads/2023/10/vaca-frisona-listado.jpg" class="img-grid" alt="Frisona"></div>
      <div class="col-6 col-md-4 col-lg-2"><img src="https://www.compassionfoodbusiness.es/media/7437422/bulls-in-shed-3.jpg" class="img-grid" alt="Brahman"></div>
    </div>
  </section>

    <!-- Suelo -->
    <section class="section-box">
      <h2 class="text-center section-title mb-4">Suelo y pasturas</h2>
      <p>
        Prefieren suelos bien drenados, ricos en materia orgánica, con pastos nutritivos como kikuyo, ryegrass y trébol. 
        El pH ideal está entre 6 y 7. Rotar los potreros mejora el rendimiento del forraje.
      </p>
      <div class="row g-3 mt-4">
        <div class="col-md-6"><img src="https://a.storyblok.com/f/160385/890x605/4e2cafbd21/pastos-forrajes.jpg/m/filters:quality(70)/" class="img-grid" alt="Pastos"></div>
        <div class="col-md-6"><img src="https://images.unsplash.com/photo-1606787366850-de6330128bfc" class="img-grid" alt="Pradera"></div>
      </div>
    </section>
    <!-- Alimentación -->
<section class="info" id="alimentacion">
  <h2>🌾 Alimentación del ganado</h2>
  <p>
    La dieta del ganado vacuno se basa principalmente en <strong>pasto, silo y heno</strong>. 
    Para un mejor desarrollo productivo, se complementa con granos (maíz, sorgo) y suplementos proteicos.
  </p>
  <ul>
    <li>🌱 <strong>Pasto fresco:</strong> principal fuente de nutrientes y fibra.</li>
    <li>🌾 <strong>Heno y ensilaje:</strong> reservas estratégicas para épocas secas.</li>
    <li>🥬 <strong>Suplementos:</strong> minerales, vitaminas y proteínas esenciales para la salud animal.</li>
  </ul>
</section>

<!-- Producción de leche -->
<section class="info" id="leche">
  <h2>🥛 Producción de leche</h2>
  <p>
    Una vaca lechera produce entre <strong>20 y 40 litros diarios</strong> de leche,
    dependiendo de la raza, la genética y la calidad de la alimentación.
  </p>
  <p>
    Las razas <strong>Holstein</strong> destacan por su alto rendimiento, mientras que las <strong>Jersey</strong> 
    son apreciadas por su leche rica en grasa y sabor.
  </p>
  <p>
    Un manejo eficiente del ordeño, la higiene y el confort del animal mejora la calidad del producto final.
  </p>
</section>

<!-- Producción de carne -->
<section class="info" id="carne">
  <h2>🥩 Producción de carne</h2>
  <p>
    Las razas cárnicas como <strong>Angus</strong> y <strong>Hereford</strong> son reconocidas 
    por su excelente marmoleo y rápido crecimiento.
  </p>
  <p>
    Un correcto manejo de la alimentación y el pastoreo impacta directamente en la <strong>calidad y terneza</strong> de la carne.
  </p>
  <p>
    Además, la trazabilidad y el bienestar animal son claves en la producción moderna y responsable.
  </p>
</section>

<!-- Salud y manejo -->
<section class="info" id="salud">
  <h2>🐄 Salud y manejo</h2>
  <p>
    El cuidado veterinario es fundamental para mantener un hato sano y productivo. 
    Incluye vacunación, control de parásitos y condiciones adecuadas en los corrales.
  </p>
  <ul>
    <li>💉 Vacunas contra <strong>fiebre aftosa</strong> y <strong>brucelosis</strong>.</li>
    <li>🪱 Desparasitación interna y externa de forma preventiva.</li>
    <li>🏡 Corrales limpios, ventilados y con buena gestión de residuos.</li>
  </ul>
  <p>
    Un manejo humanitario y libre de estrés mejora el rendimiento y el bienestar del animal.
  </p>
</section>

<!-- Noticias -->
<section class="info" id="noticias">
  <h2>📰 Noticias sobre ganadería</h2>
  <input type="text" id="news-search" placeholder="Buscar noticias..." onkeyup="filterNews()" class="buscador">
  <div id="news-container"></div>
</section>

  
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection
