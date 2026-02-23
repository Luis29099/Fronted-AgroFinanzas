<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>AgroFinanzas</title>

  {{-- Bootstrap --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  {{-- FontAwesome --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  {{-- Estilos --}}
  <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
  {{-- <link rel="stylesheet" href="{{ asset('css/home.css') }}"> --}}
  <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
  <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
  {{-- <link rel="stylesheet" href="{{ asset('css/login.css') }}"> --}}
  {{-- <link rel="stylesheet" href="{{ asset('css/register.css') }}"> --}}
  <link rel="stylesheet" href="{{ asset('css/finances.css') }}">
  <link rel="stylesheet" href="{{ asset('css/Agronomy.css') }}">
  <link rel="stylesheet" href="{{ asset('css/recomendation.css') }}">
  <link rel="stylesheet" href="{{ asset('css/hen.css') }}">
  <link rel="stylesheet" href="{{ asset('css/avocado.css') }}">
  <link rel="stylesheet" href="{{ asset('css/coffe.css') }}">
  <link rel="stylesheet" href="{{ asset('css/cattles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/verify.css') }}">
  <link rel="stylesheet" href="{{ asset('css/edit-profile.css') }}">

  @stack('styles')
</head>
<body class="d-flex flex-column min-vh-100">

  @include('includes.navbar')

  <main class="flex-grow-1">
    @yield('content')
  </main>

  @include('includes.footer')

  {{-- ── BOTÓN SCROLL-UP ── --}}
  <button id="scrollTopBtn" class="scroll-top-btn" aria-label="Volver arriba">
    <i class="fas fa-chevron-up"></i>
  </button>

  {{-- Bootstrap JS --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  @stack('scripts')

  <script>
    (function () {
      var btn = document.getElementById('scrollTopBtn');
      if (!btn) return;
      window.addEventListener('scroll', function () {
        btn.classList.toggle('visible', window.scrollY > 300);
      }, { passive: true });
      btn.addEventListener('click', function () {
        window.scrollTo({ top: 0, behavior: 'smooth' });
      });
    }());
  </script>

  {{-- Botpress chatbot --}}
  <script src="https://cdn.botpress.cloud/webchat/v3.6/inject.js"></script>
  <script src="https://files.bpcontent.cloud/2026/02/20/02/20260220025835-TCFBNR78.js" defer></script>

</body>
</html>