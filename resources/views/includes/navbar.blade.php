@php
    $currentRoute = Route::currentRouteName();
    $isLoginPage = $currentRoute === 'login';
    $isRegisterPage = $currentRoute === 'register';
    // Define la ruta a la que debe ir el logo
    $logoRoute = session()->has('user') ? route('inicio.index') : route('home');
@endphp

<nav class="af-navbar-container">
    {{-- 🔸 Lado Izquierdo: Logo con Enlace Dinámico --}}
    <div class="af-logo-brand-group">
        <a href="{{ $logoRoute }}" class="af-logo-link"> 
            <img src="/img/LogoAgrofinanzas.jpeg" alt="Logo" class="af-brand-logo">
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
            <li>
                <a href="{{ route('Agronomy.index') }}" 
                    class="af-nav-link {{ str_contains($currentRoute, 'Agronomy') ? 'active' : '' }}">
                    Agronomía
                </a>
            </li>
            
            {{-- 🆕 MENÚ DROPDOWN DE FINANZAS --}}
            <li class="af-dropdown">
                <a href="#" 
                    class="af-nav-link {{ str_contains($currentRoute, 'finance') || str_contains($currentRoute, 'income') || str_contains($currentRoute, 'expense') || str_contains($currentRoute, 'investment') || str_contains($currentRoute, 'debt') || str_contains($currentRoute, 'inventory') || str_contains($currentRoute, 'costs') ? 'active' : '' }}"
                    onclick="event.preventDefault(); toggleFinanceMenu()">
                    Finanzas <i class="fas fa-chevron-down" style="font-size: 0.7rem; margin-left: 5px;"></i>
                </a>
                
                {{-- Submenú --}}
                <div class="af-finance-submenu" id="afFinanceSubmenu">
                    <div class="af-submenu-header">
                        <i class="fas fa-chart-line"></i> Gestión Financiera
                    </div>
                    
                    <div class="af-submenu-section">
                        <div class="af-submenu-label">Registrar</div>
                        <a href="{{ route('client.income.create') }}" class="af-submenu-item">
                            <i class="fas fa-plus-circle" style="color: #8ac926;"></i> Ingreso
                        </a>
                        <a href="{{ route('client.expense.create') }}" class="af-submenu-item">
                            <i class="fas fa-minus-circle" style="color: #ff6b6b;"></i> Gasto
                        </a>
                        <a href="{{ route('client.investment.create') }}" class="af-submenu-item">
                            <i class="fas fa-building" style="color: #3b82f6;"></i> Inversión
                        </a>
                        <a href="{{ route('client.debt.create') }}" class="af-submenu-item">
                            <i class="fas fa-credit-card" style="color: #f59e0b;"></i> Deuda
                        </a>
                        <a href="{{ route('client.inventory.create') }}" class="af-submenu-item">
                            <i class="fas fa-boxes" style="color: #a855f7;"></i> Inventario
                        </a>
                        <a href="{{ route('client.costs.create') }}" class="af-submenu-item">
                            <i class="fas fa-seedling" style="color: #14b8a6;"></i> Costos
                        </a>
                    </div>
                    
                    <div class="af-submenu-divider"></div>
                    
                    <a href="{{ route('client.finances.index') }}" class="af-submenu-item-highlight">
                        <i class="fas fa-history"></i> Ver Historial Completo
                    </a>
                </div>
            </li>
            
            <li>
                <a href="{{ route('recommendations.index') }}" 
                    class="af-nav-link {{ str_contains($currentRoute, 'recommendations') ? 'active' : '' }}">
                    Comunidad
                </a>
            </li>

            {{-- 🔹 Imagen de perfil con menú oculto --}}
            <li class="af-profile-menu">
                <div class="af-profile-trigger">
                    {{-- Foto real del usuario o imagen por defecto --}}
                    <img 
                        src="{{ session('user.profile_photo') 
                            ? session('user.profile_photo')
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

{{-- 🆕 ESTILOS PARA EL DROPDOWN DE FINANZAS --}}
<style>
/* Contenedor del dropdown */
.af-dropdown {
    position: relative;
}

/* Submenú de finanzas */
.af-finance-submenu {
    position: absolute;
    top: 100%;
    left: 0;
    background: linear-gradient(135deg, #1a1a1a 0%, #2a2a2a 100%);
    border: 1px solid #8ac926;
    border-radius: 8px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.5), 0 0 15px rgba(138, 201, 38, 0.3);
    min-width: 250px;
    padding: 10px 0;
    display: none;
    z-index: 1000;
    margin-top: 10px;
    animation: slideDown 0.3s ease;
}

.af-finance-submenu.show {
    display: block;
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Header del submenú */
.af-submenu-header {
    padding: 12px 20px;
    color: #8ac926;
    font-weight: 700;
    font-size: 1rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    border-bottom: 2px solid #8ac926;
    margin-bottom: 10px;
}

/* Secciones del submenú */
.af-submenu-section {
    padding: 5px 0;
}

.af-submenu-label {
    padding: 8px 20px;
    color: #999;
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-weight: 600;
}

/* Items del submenú */
.af-submenu-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 20px;
    color: #ccc;
    text-decoration: none;
    transition: all 0.3s ease;
    font-size: 0.95rem;
}

.af-submenu-item:hover {
    background: rgba(138, 201, 38, 0.1);
    color: #8ac926;
    padding-left: 25px;
}

.af-submenu-item i {
    font-size: 1.1rem;
    width: 20px;
    text-align: center;
}

/* Item destacado (Ver Historial) */
.af-submenu-item-highlight {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 12px 20px;
    color: #fff;
    background: linear-gradient(135deg, #8ac926 0%, #a8e05f 100%);
    text-decoration: none;
    font-weight: 700;
    transition: all 0.3s ease;
    margin: 5px 10px;
    border-radius: 6px;
}

.af-submenu-item-highlight:hover {
    transform: translateX(5px);
    box-shadow: 0 4px 12px rgba(138, 201, 38, 0.4);
}

/* Divisor */
.af-submenu-divider {
    height: 1px;
    background: #333;
    margin: 8px 15px;
}

/* Responsive */
@media (max-width: 768px) {
    .af-finance-submenu {
        position: fixed;
        left: 50%;
        transform: translateX(-50%);
        width: 90%;
        max-width: 300px;
    }
}
</style>

{{-- 🔸 Scripts --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Menú del perfil
        const profileBtn = document.getElementById('afProfileMenuBtn');
        const profileMenu = document.getElementById('afProfileMenu');
        
        if (profileBtn && profileMenu) {
            profileBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                profileMenu.classList.toggle('show');
                
                // Cerrar menú de finanzas si está abierto
                const financeMenu = document.getElementById('afFinanceSubmenu');
                if (financeMenu) financeMenu.classList.remove('show');
            });
            
            document.addEventListener('click', (e) => {
                if (!profileMenu.contains(e.target) && !profileBtn.contains(e.target)) {
                    profileMenu.classList.remove('show');
                }
            });
        }
    });
    
    // 🆕 Toggle del menú de finanzas
    function toggleFinanceMenu() {
        const menu = document.getElementById('afFinanceSubmenu');
        const profileMenu = document.getElementById('afProfileMenu');
        
        // Cerrar menú del perfil si está abierto
        if (profileMenu) profileMenu.classList.remove('show');
        
        // Toggle menú de finanzas
        if (menu) {
            menu.classList.toggle('show');
        }
    }
    
    // Cerrar menú de finanzas al hacer clic fuera
    document.addEventListener('click', (e) => {
        const financeMenu = document.getElementById('afFinanceSubmenu');
        const financeLink = document.querySelector('.af-dropdown > .af-nav-link');
        
        if (financeMenu && !financeMenu.contains(e.target) && !financeLink.contains(e.target)) {
            financeMenu.classList.remove('show');
        }
    });
</script>