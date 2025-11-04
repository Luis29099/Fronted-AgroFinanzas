@extends('layouts.app')

@section('content')
<div class="container my-4">
  <a href="{{ url('/crops') }}" class="agronomy-btn mb-4 d-inline-block">
    ☕ Volver a Agronomía
  </a>

  <!-- Presentación -->
  <section class="section-box text-center">
    <h1 class="mb-3">☕ Cultivos de Café: Variedades y Producción</h1>
    <p class="lead">
      El café es uno de los pilares agrícolas más importantes a nivel mundial. 
      Su cultivo impulsa economías rurales y ofrece una bebida con identidad, historia y sabor.
    </p>
  </section>

  <!-- Tabla de cultivos -->
  <section class="section-box mt-5">
    <h2 class="text-center section-title mb-4">📋 Lista de cultivos registrados</h2>
    <div class="table-responsive">
      <table class="table table-bordered table-striped align-middle text-center">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Variedad</th>
            <th>Producción Estimada</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($coffecrops as $coffecrop)
            <tr>
              <td>{{ $coffecrop['id'] }}</td>
              <td>{{ $coffecrop['variety'] }}</td>
              <td>{{ $coffecrop['estimated_production'] }} kg</td>
              <td>
                <a href="{{ route('coffecrop.show', $coffecrop['id']) }}" class="btn btn-info btn-sm">
                  Ver más
                </a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4">No hay cultivos registrados.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </section>

  <!-- Variedades destacadas -->
  <section class="section-box">
    <h2 class="text-center section-title mb-4">🌱 Variedades más destacadas</h2>
    <p class="text-center mb-5 text-muted">
      Caturra, Castillo, Typica y Bourbon — cuatro pilares del café colombiano que combinan historia, sabor y resiliencia agrícola.
    </p>

    <div class="row g-4">
      <!-- Caturra -->
      <div class="col-12 col-md-6 col-lg-3">
        <div class="card h-100 shadow">
          <img src="https://caficultorespe.com/wp-content/uploads/2022/01/cafe-caturra.jpeg" alt="Caturra" class="card-img-top">
          <div class="card-body text-center">
            <h5 class="card-title fw-bold">Caturra</h5>
            <h1 class="fs-6">
              Originaria de Brasil, destaca por su porte bajo y alta productividad. Produce granos con acidez brillante y cuerpo medio.
            </h1>
          </div>
        </div>
      </div>

      <!-- Castillo -->
      <div class="col-12 col-md-6 col-lg-3">
        <div class="card h-100 shadow">
          <img src="https://cafesmyway.com/wp-content/uploads/2024/05/granos-de-cafe-variedad-castillo.webp" alt="Castillo" class="card-img-top">
          <div class="card-body text-center">
            <h5 class="card-title fw-bold">Castillo</h5>
            <h1 class="fs-6">
              Variedad colombiana desarrollada por Cenicafé: resistente a la roya, taza balanceada y notas dulces.
            </h1>
          </div>
        </div>
      </div>

      <!-- Typica -->
      <div class="col-12 col-md-6 col-lg-3">
        <div class="card h-100 shadow">
          <img src="https://cafeinfiltrado.com/cdn/shop/articles/projeto-cafe-gato-mourisco-wg_9DiU1mSk-unsplash.jpg?v=1723425049" alt="Typica" class="card-img-top">
          <div class="card-body text-center">
            <h5 class="card-title fw-bold">Typica</h5>
            <h1 class="fs-6">
              Una de las variedades más antiguas y finas. Aroma floral, notas dulces y acidez equilibrada.
            </h1>
          </div>
        </div>
      </div>

      <!-- Bourbon -->
      <div class="col-12 col-md-6 col-lg-3">
        <div class="card h-100 shadow">
          <img src="https://www.todoparacafe.com/media/user_4ndKGRzMmZ/1403/10696463020495252_tmp_Semillas-Bourbon-Rosado-Finca-La-Florida-4.jpeg" alt="Bourbon" class="card-img-top">
          <div class="card-body text-center">
            <h5 class="card-title fw-bold">Bourbon</h5>
            <h1 class="fs-6">
              Granos suaves y dulces, con notas a caramelo y frutas rojas. Excelente equilibrio y rendimiento.
            </h1>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Condiciones del cultivo -->
  <section class="section-box">
    <h2 class="text-center section-title mb-4">🌤️ Condiciones ideales de cultivo</h2>
    <p>
      Cultivado idealmente entre 1,200–1,800 m.s.n.m con temperaturas 18–22°C y sombra parcial.
    </p>
    <div class="row g-3 mt-4">
      <div class="col-md-6">
        <img src="https://www.bonka.es/themes/custom/bonka/img/plantones-cafeto-proceso-elaboracion.jpg?v9" class="img-grid medium" alt="Cafetales de montaña">
      </div>
      <div class="col-md-6">
        <img src="https://th.bing.com/th/id/OIP.HOQc9PZTKNZvcmp1gWgc2AHaEc?w=252&h=180&c=7&r=0&o=7&dpr=1.3&pid=1.7&rm=3" class="img-grid medium" alt="Clima ideal para café">
      </div>
    </div>
  </section>

  <!-- Suelo -->
  <section class="section-box">
    <h2 class="text-center section-title mb-4">🌋 Suelo y fertilización</h2>
    <p class="text-center">
      Suelos francos, buen drenaje y pH 5.5–6.5. Compost y abonos verdes recomendados.
    </p>
    <div class="text-center">
      <img src="https://th.bing.com/th/id/OIP.PlXo-9QUCHswV_P9uNZZdwHaE7?w=254&h=180&c=7&r=0&o=7&dpr=1.3&pid=1.7&rm=3" class="img-grid large" alt="Suelo cafetero">
    </div>
  </section>

  <!-- Cosecha -->
  <section class="section-box">
    <h2 class="text-center section-title mb-4">☀️ Cosecha y poscosecha</h2>
    <p>
      Recolección manual en punto de madurez; despulpado, fermentación controlada y secado uniforme.
    </p>
    <div class="row g-3 mt-4">
      <div class="col-md-6">
        <img src="https://huupa.coffee/cdn/shop/articles/granos_de_cafe-792033_a69513e8-8fb8-4a3b-9890-c66d4fb70f59.jpg?v=1742927345" class="img-grid medium" alt="Cosecha manual de café">
      </div>
      <div class="col-md-6">
        <img src="https://th.bing.com/th/id/OIP.358QGbjHZBzWKAoHwD_n-wHaE8?w=262&h=180&c=7&r=0&o=7&dpr=1.3&pid=1.7&rm=3" class="img-grid medium" alt="Secado del café">
      </div>
    </div>
  </section>

  <!-- Curiosidades -->
  <section class="info" id="curiosidades">
    <h2>📚 Curiosidades del café</h2>
    <ul>
      <li>☕ Colombia es uno de los principales exportadores de café arábica.</li>
      <li>🌱 Cada planta puede producir entre <strong>1 y 2 libras</strong> de café verde al año.</li>
      <li>🫘 El tueste define gran parte del aroma final.</li>
      <li>🌍 Millones de familias dependen del cultivo de café globalmente.</li>
    </ul>
  </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
