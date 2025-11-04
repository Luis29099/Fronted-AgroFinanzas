@extends('layouts.app')

@section('content')
<div class="container my-4">

  <!-- Botón de retorno -->
  <a href="{{ url('/crops') }}" class="agronomy-btn mb-4 d-inline-block">
    🐓 Volver a Agronomía
  </a>

  <!-- Presentación -->
  <section class="section-box text-center">
    <h1 class="mb-3">🐔 Gallinas: Producción, Manejo y Curiosidades</h1>
    <p class="lead">
      Las gallinas representan una de las bases más rentables de la producción avícola. 
      Proveen huevos, carne y fertilizantes naturales, esenciales en la economía agropecuaria sostenible.
    </p>
  </section>

  <!-- Tabla dinámica de gallinas -->
  <section class="section-box mt-5">
    <h2 class="text-center section-title mb-4">📋 Registro de gallinas</h2>
    <div class="table-responsive">
      <table class="table table-bordered table-striped align-middle text-center shadow-sm">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Raza</th>
            <th>Producción diaria</th>
            <th>Producción mensual</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($hens as $hen)
            <tr>
              <td>{{ $hen['id'] }}</td>
              <td>{{ $hen['breed'] }}</td>
              <td>{{ $hen['daily_egg_production'] }} huevos</td>
              <td>{{ $hen['monthly_egg_total'] }} huevos</td>
              <td>
                <a href="{{ route('hen.show', $hen['id']) }}" class="btn btn-outline-success btn-sm">
                  Ver más
                </a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5">No hay registros disponibles.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </section>

  <!-- Razas destacadas -->
  <section class="section-box">
    <h2 class="text-center section-title mb-4">🥚 Razas más destacadas</h2>
    <p class="text-center mb-5">
      Las siguientes razas se destacan por su alta productividad, resistencia y adaptabilidad a diversos climas.
    </p>

    <div class="row g-4">
      <div class="col-12 col-md-6 col-lg-3">
        <div class="card h-100 shadow">
          <img src="https://th.bing.com/th/id/OIP.WJKdESZnWyfd-XZzMjqPgQHaEK?w=291&h=180&c=7&r=0&o=7&dpr=1.3&pid=1.7&rm=3" class="card-img-top" alt="Gallina Leghorn">
          <div class="card-body text-center">
            <h5 class="fw-bold">Leghorn</h5>
            <p>Raza italiana famosa por su excelente producción de huevos (hasta 300 al año).</p>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-6 col-lg-3">
        <div class="card h-100 shadow">
          <img src="https://th.bing.com/th/id/OIP.ieSFyI60kCnIrb6bVnAb2wHaE8?w=288&h=192&c=7&r=0&o=7&dpr=1.3&pid=1.7&rm=3" class="card-img-top" alt="Gallina Isa Brown">
          <div class="card-body text-center">
            <h5 class="fw-bold">ISA Brown</h5>
            <p>Gallina moderna híbrida, dócil y de alta eficiencia en producción de huevos marrones.</p>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-6 col-lg-3">
        <div class="card h-100 shadow">
          <img src="https://img.avicoladeseleccion.es/8989-large_default/gallina-sussex-big.jpg" class="card-img-top" alt="Gallina Sussex">
          <div class="card-body text-center">
            <h5 class="fw-bold">Sussex</h5>
            <p>Raza británica resistente, de doble propósito (huevos y carne), con plumaje blanco y elegante.</p>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-6 col-lg-3">
        <div class="card h-100 shadow">
          <img src="https://poultrylife.com/wp-content/uploads/2023/01/Plymouth-Rock.jpg" class="card-img-top" alt="Gallina Plymouth Rock">
          <div class="card-body text-center">
            <h5 class="fw-bold">Plymouth Rock</h5>
            <p>Raza norteamericana conocida por su rusticidad y producción equilibrada de huevos y carne.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Alimentación -->
  <section class="section-box">
    <h2 class="text-center section-title mb-4">🌾 Alimentación y manejo</h2>
    <p>
      Las gallinas requieren una dieta balanceada que asegure buena producción y salud. 
      Deben incluir granos, proteínas, calcio y acceso constante a agua limpia.
    </p>
    <div class="row g-3 mt-4">
      <div class="col-md-6">
        <img src="https://bogota.gov.co/sites/default/files/inline-images/gallinas-2_0.jpeg" class="img-grid medium" alt="Gallinas alimentándose">
      </div>
      <div class="col-md-6">
        <img src="https://d1lg8auwtggj9x.cloudfront.net/images/Chicken_feed.width-820.jpg" class="img-grid medium" alt="Pienso y granos para gallinas">
      </div>
    </div>
  </section>

  <!-- Gallinero y manejo básico -->
  <section class="section-box">
    <h2 class="text-center section-title mb-4">🏡 Gallinero y condiciones óptimas</h2>
    <p class="text-center">
      Un gallinero debe ofrecer seguridad, espacio y confort. Idealmente 1 m² por gallina, buena ventilación y nidos elevados.
    </p>
    <div class="text-center">
      <img src="https://paduamateriales.com/wp-content/uploads/que-tamano-debe-tener-un-gallinero-para-100-gallinas-1.webp" 
           class="img-grid large shadow-sm rounded" alt="Gallinero adecuado">
    </div>
  </section>

  <!-- Curiosidades -->
  <section class="info mt-5" id="curiosidades">
    <h2>📚 Curiosidades sobre las gallinas</h2>
    <ul>
      <li>Reconocen más de <strong>100 rostros humanos</strong> distintos.</li>
      <li>Producen entre <strong>150 y 300 huevos al año</strong>, según la raza.</li>
      <li>Tienen jerarquías sociales (“gallina alfa”).</li>
      <li>Sus sueños son tan reales como los de los mamíferos.</li>
      <li>Ayudan al control de plagas y fertilización natural del suelo.</li>
    </ul>
  </section>

  <!-- Videos educativos -->
  <section class="section-box">
    <h2 class="text-center section-title mb-4">🎥 Videos recomendados</h2>
    <div class="row justify-content-center">
      <div class="col-md-6 text-center mb-4">
        <p><strong>Cómo construir un gallinero</strong></p>
        <iframe width="100%" height="315" src="https://www.youtube.com/embed/er1d3U2PGMo" 
                title="Construcción de gallinero" frameborder="0" allowfullscreen></iframe>
      </div>
      <div class="col-md-6 text-center mb-4">
        <p><strong>Crianza de gallinas ponedoras</strong></p>
        <iframe width="100%" height="315" src="https://www.youtube.com/embed/dzUGFP2upVA" 
                title="Crianza de gallinas ponedoras" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>
  </section>
</div>
@endsection
