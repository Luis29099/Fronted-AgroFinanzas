@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AgroFinanzas – Vacas</title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(to bottom, #e9f7ef, #ffffff);
      font-family: Arial, sans-serif;
    }
    h1, h2 {
      font-weight: bold;
      color: #1b5e20; /* Verde más fuerte */
    }
    h1 {
      text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
    }
    .lead {
      color: #2e473b;
    }
    /* Para que todas las imágenes tengan mismo tamaño */
    .img-grid {
      width: 100%;
      height: 200px;
      object-fit: cover;
      border-radius: 12px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.25);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .img-grid:hover {
      transform: scale(1.05);
      box-shadow: 0 6px 15px rgba(0,0,0,0.3);
    }
    .section-box {
      background: #ffffff;
      padding: 25px;
      border-radius: 16px;
      box-shadow: 0 3px 10px rgba(0,0,0,0.1);
      margin-bottom: 40px;
      border-left: 8px solid #2e7d32; /* borde verde */
    }
    .section-title {
      background: #a5d6a7;
      padding: 10px;
      border-radius: 8px;
      display: inline-block;
      color: #1b5e20;
    }
  </style>
</head>
<body>

  <!-- Contenido principal -->
  <main class="container my-5">

    <section class="section-box text-center">
      <h1 class="mb-3">🐄 Vacas: Manejo y Producción</h1>
      <p class="lead">
        Las vacas son animales domesticados esenciales para la producción de carne y leche, 
        además de ser fundamentales en muchas economías rurales.
      </p>
    </section>

    <!-- Sección de Razas -->
    <section class="section-box">
      <h2 class="mb-4 text-center section-title">Razas más comunes</h2>
      <p>
        Entre las más conocidas están: <strong>Holstein</strong> (alta producción de leche), 
        <strong>Jersey</strong> (leche rica en grasa), <strong>Angus</strong> (carne de calidad) y 
        <strong>Brahman</strong> (resistencia a climas cálidos).
      </p>

      <div class="row g-3 mt-3">
        <div class="col-6 col-md-4 col-lg-2">
          <img src="https://licnz.com/wp-content/uploads/2020/10/Holstein-Friesian-bull-Mint-Edition-Front-on.jpg" class="img-grid" alt="Vaca 1">
        </div>
        <div class="col-6 col-md-4 col-lg-2">
          <img src="https://i.pinimg.com/originals/e5/79/01/e57901f813294688ca0bf4f313e5c840.jpg" class="img-grid" alt="Vaca 2">
        </div>
        <div class="col-6 col-md-4 col-lg-2">
          <img src="https://www.lechedeflorida.com/core/fileparse.php/278/urlt/Holstein-Cow-Headshot.jpg" class="img-grid" alt="Vaca 3">
        </div>
        <div class="col-6 col-md-4 col-lg-2">
          <img src="https://www.miguelvergara.com/actualidad/wp-content/uploads/2023/10/vaca-frisona-listado.jpg" class="img-grid" alt="Vaca 4">
        </div>
        <div class="col-6 col-md-4 col-lg-2">
          <img src="https://www.compassionfoodbusiness.es/media/7437422/bulls-in-shed-3.jpg" class="img-grid" alt="Vaca 5">
        </div>
      </div>
    </section>

    <!-- Sección de Suelo -->
    <section class="section-box">
      <h2 class="mb-4 text-center section-title">Suelo y pasturas</h2>
      <p>
        Prefieren suelos bien drenados, con pastos nutritivos como kikuyo, ryegrass y trébol.
        El pH ideal está entre 6 y 7, con alto contenido de materia orgánica.
      </p>

      <div class="row g-3 mt-3">
        <div class="col-12 col-md-6">
          <img src="https://a.storyblok.com/f/160385/890x605/4e2cafbd21/pastos-forrajes.jpg/m/filters:quality(70)/" class="img-grid" alt="Pastos">
        </div>
        <div class="col-12 col-md-6">
          <img src="https://images.unsplash.com/photo-1606787366850-de6330128bfc" class="img-grid" alt="Pradera">
        </div>
      </div>
    </section>
  </main>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

@endsection