@php
    $currentRoute = Route::currentRouteName();
    $isLoginPage = $currentRoute === 'login';
    $isRegisterPage = $currentRoute === 'register';
    // Define la ruta a la que debe ir el logo
    $logoRoute = session()->has('user') ? route('inicio.index') : route('home');
    // NOTA: Asumí que 'inicio.index' es la vista principal post-login
    // y 'home' es la vista de aterrizaje (landing page) pre-login.
@endphp

<nav class="af-navbar-container">
    {{-- 🔸 Lado Izquierdo: Logo con Enlace Dinámico --}}
    <div class="af-logo-brand-group">
        <a href="{{ $logoRoute }}" class="af-logo-link"> 
            <img src="/img/image.png" alt="Logo" class="af-brand-logo">
            <span class="af-brand-name">AgroFinanzas</span>
        </a>
    </div>

    {{-- 🔸 Lado Derecho: Navegación dinámica --}}
    <ul class="af-main-nav-links">
        @if (!session()->has('user'))
            {{-- 🚫 No hay usuario logueado --}}
            @if ($isLoginPage)
                <div class="af-auth-buttons">
                    <a href="{{ route('register') }}" class="af-nav-btn">Registrarse</a>
                    <a href="{{ route('home') }}" class="af-nav-btn">Inicio</a>
                </div>
            @elseif ($isRegisterPage)
                <div class="af-auth-buttons">
                    <a href="{{ route('login') }}" class="af-nav-btn">Iniciar Sesión</a>
                    <a href="{{ route('home') }}" class="af-nav-btn">Inicio</a>
                </div>
            @else
                <div class="af-auth-buttons">
                    <a href="{{ route('login') }}" class="af-nav-btn">Iniciar Sesión</a>
                    <a href="{{ route('register') }}" class="af-nav-btn">Registrarse</a>
                </div>
            @endif

        @else
            {{-- ✅ Usuario autenticado --}}
            {{-- <li>
                <a href="{{ route('crops') }}" 
                    class="af-nav-link {{ str_contains($currentRoute, 'Culivos') ? 'active' : '' }}">
                    Cultivos
                </a>
            </li>
            <li> --}}
                <a href="{{ route('Agronomy.index') }}" 
                    class="af-nav-link {{ str_contains($currentRoute, 'animalproductions') ? 'active' : '' }}">
                    Agronomía
                </a>
            </li>
            <li>
                <a href="{{ route('client.index') }}" 
                    class="af-nav-link {{ str_contains($currentRoute, 'finances') ? 'active' : '' }}">
                    Finanzas
                </a>
            </li>
            <li>
                <a href="{{ route('recommendations.index') }}" 
                    class="af-nav-link {{ str_contains($currentRoute, 'recommendations') ? 'active' : '' }}">
                    Comentarios
                </a>
            </li>

            {{-- 🔹 Imagen de perfil con menú oculto --}}
            <li class="af-profile-menu">
                <div class="af-profile-trigger">

                    {{-- Foto real del usuario o imagen por defecto --}}
                    
<img 
    src="{{ session('user.profile_photo') 
        ? session('user.profile_photo') // <-- ¡Usar directamente la URL ABSOLUTA de la sesión!
        : asset('img/profile.png') }}"
    class="af-profile-avatar"
    id="afProfileMenuBtn">

                    {{-- Menú desplegable --}}
                    <div class="af-dropdown-content" id="afProfileMenu">

                        {{-- Nombre del usuario --}}
                        <p class="af-dropdown-username">👤 {{ session('user')['name'] }}</p>

                        <hr>

                        {{-- Link a editar perfil --}}
                        <a href="{{ route('perfil.editar') }}" class="af-dropdown-link">
                             Editar perfil
                        </a>

                        <hr>

                        {{-- Botón de logout --}}
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="af-logout-btn"> Cerrar Sesión</button>
                        </form>

                    </div>
                </div>
            </li>

        @endif
    </ul>
</nav>

{{-- 🔸 Script para abrir/cerrar menú del perfil (IDs actualizados) --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // IDs actualizados
        const profileBtn = document.getElementById('afProfileMenuBtn');
        const menu = document.getElementById('afProfileMenu');
        
        if (profileBtn && menu) {
            profileBtn.addEventListener('click', () => menu.classList.toggle('show'));
            document.addEventListener('click', (e) => {
                // Si el clic no fue dentro del menú ni en el botón, oculta el menú
                if (!menu.contains(e.target) && !profileBtn.contains(e.target)) {
                    menu.classList.remove('show');
                }
            });
        }
    });
</script>