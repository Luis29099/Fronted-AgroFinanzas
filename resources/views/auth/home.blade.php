@extends('layouts.app')



@section('content')

<div class="container-fluid p-0">



  {{-- HERO --}}

  <section class="hero-section position-relative">

    <img src="https://images.unsplash.com/photo-1677123618781-a713408ebc59?q=80&w=1170&auto=format&fit=crop"

         alt="Imagen granja"

         class="w-100"

         style="height:500px; object-fit:cover; filter:brightness(0.45);">



    <div class="position-absolute top-50 start-50 translate-middle text-center text-white">

      <h1 class="display-5 fw-bold mb-3">Bienvenido a <span class="text-success">AgroFinanzas</span></h1>

      <p class="lead mb-4">Tu aliado digital para el crecimiento sostenible del campo colombiano 🌱</p>

      <a href="{{ route('register') }}" class="btn btn-success btn-lg shadow-sm px-4 py-2">Comenzar</a>

    </div>

  </section>



  {{-- PRESENTACIÓN --}}

  <section class="presentacion container my-5 p-5 text-light">

    <h2 class="text-center fw-bold text-success mb-4">¿Quiénes somos?</h2>

    <p class="lead text-justify mb-3">

        AgroFinanzas es una plataforma digital comprometida con el fortalecimiento del sector rural. Nacemos con la misión de apoyar a

        los agricultores en el manejo eficiente de sus finanzas, el cuidado responsable de sus cultivos y el bienestar de sus animales,

        brindándoles herramientas prácticas, accesibles y adaptadas a sus realidades.

    </p>

    <p class="text-light opacity-75 text-justify">

        Creemos en el poder del conocimiento y la tecnología para transformar vidas. Por eso, trabajamos para que cada campesino tenga acceso a información clara,

        recomendaciones útiles y un entorno digital amigable que le permita tomar mejores decisiones, mejorar su productividad y asegurar un futuro más próspero

        para su familia y su comunidad.

        <br><br>

        FARMFINANC no es solo una app. Es un aliado del campo, una apuesta por la inclusión, y un paso firme hacia un desarrollo rural más justo, sostenible e inteligente.

    </p>

</section>





</div>

@endsection