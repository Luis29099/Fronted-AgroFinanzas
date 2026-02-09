@extends('layouts.app')



@section('content')

<div class="container-fluid p-0">


<!-- LOGO SOLO PARA LA VISTA HOME -->
<div class="home-floating-logo">
    <img src="/img/LOGOYESLOGAN.jpeg" alt="Logo AgroFinanzas">
</div>

@if(Route::currentRouteName() === 'home')
    <div class="home-floating-logo">
        <img src="/img/LOGOYESLOGAN.jpeg" alt="Logo AgroFinanzas">
    </div>
@endif


  {{-- HERO --}}

  <section class="hero-section position-relative">

    <img src="https://images.unsplash.com/photo-1677123618781-a713408ebc59?q=80&w=1170&auto=format&fit=crop"

         alt="Imagen granja"

         class="w-100"

         style="height:500px; object-fit:cover; filter:brightness(0.45);">



    <div class="position-absolute top-50 start-50 translate-middle text-center text-white">

      <h1 class="display-5 fw-bold mb-3">Bienvenido a <span class="remarcado">AgroFinanzas</span></h1>

      <p class="lead mb-4">Tu aliado digital para el crecimiento sostenible del campo colombiano</p>

      <a href="{{ route('register') }}" class="btn-comenzar">Comenzar</a>

    </div>

  </section>



  {{-- PRESENTACIÓN --}}

  <section class="presentacion container my-5 p-5 text-light">

    <h2 class="Titulo">¿Quiénes somos?</h2>

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

<div class="containerdevelops container my-5">
    <h2 class="Titulo">Desarrolladores</h2>

    <div class="developsclass">

        <!-- CARD 1 -->
        <div class="developer-card">
            <img src="/img/FOTODEDANIEL.jpeg" alt="Foto desarrollador" class="dev-photo">
            <p class="dev-name">Daniel Esteban</p>
            <p class="dev-age">Edad: 19 años</p>
            <p class="dev-role">Rol: Frontend Developer</p>
        </div>

        <!-- CARD 2 -->
        <div class="developer-card">
            <img src="/img/FOTODELUISSSJ4.jpeg" alt="Foto desarrollador" class="dev-photo">
            <p class="dev-name">Luis Esteban </p>
            <p class="dev-age">Edad: 21 años</p>
            <p class="dev-role">Rol: Scrum Master</p>
        </div>

        <!-- CARD 3 -->
        <div class="developer-card">
            <img src="/img/BLACK.jpeg" alt="Foto desarrollador" class="dev-photo">
            <p class="dev-name">Julian David</p>
            <p class="dev-age">Edad: 23 años</p>
            <p class="dev-role">Rol: UI/UX Designer</p>
        </div>

        <!-- CARD 4 -->
        <div class="developer-card">
            <img src="/img/FOTODEMAICOL.jpeg" alt="Foto desarrollador" class="dev-photo">
            <p class="dev-name">Maicol Antonio</p>
            <p class="dev-age">Edad: 19 años</p>
            <p class="dev-role">Rol: Mobile Developer</p>
        </div>

    </div>
</div>

@endsection