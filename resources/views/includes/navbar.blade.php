@php
    $currentRoute = Route::currentRouteName();
    $isLoginPage = $currentRoute === 'login';
    $isRegisterPage = $currentRoute === 'register';
    // Define la ruta a la que debe ir el logo
    $logoRoute = session()->has('user') ? route('inicio.index') : route('home');
    // NOTA: Asumí que 'inicio.index' es la vista principal post-login
    // y 'home' es la vista de aterrizaje (landing page) pre-login.
@endphp

<nav class="navbar-modern">
    {{-- 🔸 Lado Izquierdo: Logo con Enlace Dinámico --}}
    <div class="logo-nombre">
        {{-- EL CAMBIO CLAVE ESTÁ AQUÍ: Usamos la variable $logoRoute --}}
        <a href="{{ $logoRoute }}" class="logo-link"> 
            <img src="/img/image.png" alt="Logo" class="logo">
            <span class="nombre">AgroFinanzas</span>
        </a>
    </div>

    {{-- 🔸 Lado Derecho: Navegación dinámica (Mantenemos el resto) --}}
    <ul class="nav-links">
        @if (!session()->has('user'))
            {{-- 🚫 No hay usuario logueado --}}
            @if ($isLoginPage)
                <div class="nav-buttons">
                    <a href="{{ route('register') }}" class="btn-navegacion">Registrarse</a>
                    <a href="{{ route('home') }}" class="btn-navegacion">Inicio</a>
                </div>
            @elseif ($isRegisterPage)
                <div class="nav-buttons">
                    <a href="{{ route('login') }}" class="btn-navegacion">Iniciar Sesión</a>
                    <a href="{{ route('home') }}" class="btn-navegacion">Inicio</a>
                </div>
            @else
                <div class="nav-buttons">
                    <a href="{{ route('login') }}" class="btn-navegacion">Iniciar Sesión</a>
                    <a href="{{ route('register') }}" class="btn-navegacion">Registrarse</a>
                </div>
            @endif

        @else
            {{-- ✅ Usuario autenticado --}}
            <li>
                <a href="{{ route('Agronomy.index') }}" 
                    class="nav-item {{ str_contains($currentRoute, 'animalproductions') ? 'active' : '' }}">
                    Agronomía
                </a>
            </li>
            <li>
                <a href="{{ route('finances.index') }}" 
                    class="nav-item {{ str_contains($currentRoute, 'finances') ? 'active' : '' }}">
                    Finanzas
                </a>
            </li>
            <li>
                <a href="{{ route('recommendations.index') }}" 
                    class="nav-item {{ str_contains($currentRoute, 'recommendations') ? 'active' : '' }}">
                    Comentarios
                </a>
            </li>

            {{-- 🔹 Imagen de perfil con menú oculto --}}
            <li class="profile">
                <div class="profile-container">
                    <img src="/img/profile.png" alt="Perfil" class="profile-img" id="profileMenuBtn">
                    <div class="profile-dropdown" id="profileMenu">
                        <p class="username">👤 {{ session('user')['name'] ?? 'Usuario' }}</p>
                        <hr>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="logout-btn">🔒 Cerrar Sesión</button>
                        </form>
                    </div>
                </div>
            </li>
        @endif
    </ul>
</nav>

{{-- 🔸 Script para abrir/cerrar menú del perfil --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const profileBtn = document.getElementById('profileMenuBtn');
        const menu = document.getElementById('profileMenu');
        if (profileBtn && menu) {
            profileBtn.addEventListener('click', () => menu.classList.toggle('show'));
            document.addEventListener('click', (e) => {
                if (!menu.contains(e.target) && !profileBtn.contains(e.target)) {
                    menu.classList.remove('show');
                }
            });
        }
    });
</script>