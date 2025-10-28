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
      
      {{-- MENÚ DESPLEGABLE PARA USUARIOS AUTENTICADOS --}}
      <div class="dropdown">
        {{-- Botón principal del menú --}}
        <button class="btn-navegacion dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          Menú
        </button>
        
        {{-- Contenido del Dropdown --}}
        {{-- Añadimos la clase 'custom-dropdown' y 'dropdown-menu-end' para estilizarlo y alinearlo a la derecha --}}
        <ul class="dropdown-menu dropdown-menu-end custom-dropdown" aria-labelledby="dropdownMenuButton">
          
          {{-- Apartados Principales --}}
          <li><a class="dropdown-item" href="{{ url('/finances/income/create') }}">💰 Finanzas</a></li>
          <li><a class="dropdown-item" href="{{ url('/crops') }}">🌾 Agronomía</a></li>
          <li><hr class="dropdown-divider"></li>

          {{-- Apartados de Usuario y Comentarios --}}
          <li><a class="dropdown-item" href="{{ route('user_apps') }}">👤 Check Users</a></li>
          <li><a class="dropdown-item" href="{{ url('/recommendations') }}">💬 Comentarios</a></li>
          <li><hr class="dropdown-divider"></li>

          {{-- Cerrar Sesión --}}
          <li>
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              {{-- Usamos la clase 'logout-link' para darle un estilo rojo al texto --}}
              <button type="submit" class="dropdown-item logout-link">🚪 Cerrar Sesión</button>
            </form>
          </li>
        </ul>
      </div>
    @endif
  </div>
</header>