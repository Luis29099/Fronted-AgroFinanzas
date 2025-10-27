<header class="navbar-custom">
  <div class="logo-nombre">
    <a href="{{ route('home') }}" class="logo-link">
      <img src="{{ asset('img/image.png') }}" alt="Logo" class="Logo">
      <h1 class="NombreP">AgroFinanzas</h1>
    </a>
  </div>

  <div class="nav-buttons">
    @if(!session('user'))
      <a href="{{ route('register') }}" class="btn-navegacion">Registrarse</a>
      <a href="{{ route('login') }}" class="btn-navegacion">Iniciar Sesión</a>
    @else
      <a href="{{ url('/finances/income/create') }}" class="btn-navegacion">Finanzas</a>
      <a href="{{ url('/crops') }}" class="btn-navegacion">Agronomía</a>
      <a href="{{ url('/recommendations') }}" class="btn-navegacion">Comentarios</a>
      <form action="{{ route('logout') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" class="btn-navegacion logout">Cerrar Sesión</button>
      </form>
    @endif
  </div>
  
</header>
