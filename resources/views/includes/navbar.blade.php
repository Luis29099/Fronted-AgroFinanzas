@php
    $currentRoute   = Route::currentRouteName();
    $isLoginPage    = $currentRoute === 'login';
    $isRegisterPage = $currentRoute === 'register';
    $logoRoute      = session()->has('user') ? route('inicio.index') : route('home');

    $sessionUser = session('user');
    $userPhoto   = ($sessionUser && !empty($sessionUser['profile_photo']))
                       ? $sessionUser['profile_photo']
                       : asset('img/profile.png');
    $userName    = $sessionUser['name'] ?? '';
    $userId      = $sessionUser['id'] ?? null;
@endphp

{{-- ═══════════════════════════════════════════
     NAVBAR DESKTOP
═══════════════════════════════════════════ --}}
<nav class="af-navbar-container">

    {{-- Brand --}}
    <div class="af-logo-brand-group">
        <a href="{{ $logoRoute }}" class="af-logo-link">
            <img src="/img/LogoAgrofinanzas.jpeg" alt="Logo" class="af-brand-logo">
            <span class="af-brand-name">AgroFinanzas</span>
        </a>
    </div>

    {{-- Links desktop --}}
    <ul class="af-main-nav-links">
        @if (!session()->has('user'))
            <div class="af-auth-buttons">
                @unless ($currentRoute === 'home')
                    <a href="{{ route('home') }}" class="af-nav-btn"><i class="fas fa-home"></i> Inicio</a>
                @endunless
                @unless ($isLoginPage)
                    <a href="{{ route('login') }}" class="af-nav-btn"><i class="fas fa-right-to-bracket"></i> Iniciar Sesión</a>
                @endunless
            </div>
        @else
            {{-- Agronomía --}}
            <li class="af-dropdown">
                <a href="#" class="af-nav-link {{ str_contains($currentRoute, 'Agronomy') || str_contains($currentRoute, 'hens') || str_contains($currentRoute, 'cattles') || str_contains($currentRoute, 'avocado') || str_contains($currentRoute, 'coffe') ? 'active' : '' }}"
                   onclick="event.preventDefault(); toggleAgronomyMenu()">
                    Agronomía <i class="fas fa-chevron-down" style="font-size:0.62rem;margin-left:3px;"></i>
                </a>
                <div class="af-agronomy-submenu" id="afAgronomySubmenu">
                    <div class="af-submenu-header"><i class="fas fa-leaf"></i> Producción Agropecuaria</div>
                    <div class="af-submenu-section">
                        <a href="{{ url('hens') }}"         class="af-submenu-item"><i class="fas fa-egg"         style="color:#f59e0b"></i> Aves de Corral</a>
                        <a href="{{ url('cattles') }}"      class="af-submenu-item"><i class="fas fa-horse"       style="color:#a16207"></i> Ganado Vacuno</a>
                        <a href="{{ url('avocadocrops') }}" class="af-submenu-item"><i class="fas fa-apple-whole" style="color:#16a34a"></i> Cultivo de Aguacate</a>
                        <a href="{{ url('coffe_crops') }}"  class="af-submenu-item"><i class="fas fa-mug-hot"    style="color:#92400e"></i> Cultivo de Café</a>
                    </div>
                </div>
            </li>

            {{-- Finanzas --}}
            <li class="af-dropdown">
                <a href="#" class="af-nav-link {{ str_contains($currentRoute, 'finance') || str_contains($currentRoute, 'income') || str_contains($currentRoute, 'expense') || str_contains($currentRoute, 'investment') || str_contains($currentRoute, 'debt') || str_contains($currentRoute, 'inventory') || str_contains($currentRoute, 'costs') || str_contains($currentRoute, 'client.cattle') ? 'active' : '' }}"
                   onclick="event.preventDefault(); toggleFinanceMenu()">
                    Finanzas <i class="fas fa-chevron-down" style="font-size:0.62rem;margin-left:3px;"></i>
                </a>
                <div class="af-finance-submenu" id="afFinanceSubmenu">
                    <div class="af-submenu-header"><i class="fas fa-chart-line"></i> Gestión Financiera</div>
                    <div class="af-submenu-section">
                        <div class="af-submenu-label">Registrar</div>
                        <a href="{{ route('client.income.create') }}"     class="af-submenu-item"><i class="fas fa-plus-circle"  style="color:#8ac926"></i> Ingreso</a>
                        <a href="{{ route('client.expense.create') }}"    class="af-submenu-item"><i class="fas fa-minus-circle" style="color:#ff6b6b"></i> Gasto</a>
                        <a href="{{ route('client.investment.create') }}" class="af-submenu-item"><i class="fas fa-building"     style="color:#3b82f6"></i> Inversión</a>
                        <a href="{{ route('client.debt.create') }}"       class="af-submenu-item"><i class="fas fa-credit-card"  style="color:#f59e0b"></i> Deuda</a>
                        <a href="{{ route('client.inventory.create') }}"  class="af-submenu-item"><i class="fas fa-boxes"        style="color:#a855f7"></i> Inventario</a>
                        <a href="{{ route('client.costs.create') }}"      class="af-submenu-item"><i class="fas fa-seedling"     style="color:#14b8a6"></i> Costos</a>
                    </div>
                    <div class="af-submenu-divider"></div>
                    <div class="af-submenu-section">
                        <div class="af-submenu-label">Ganadería</div>
                        <a href="{{ route('client.cattle.index') }}" class="af-submenu-item"><i class="fas fa-cow" style="color:#f59e0b"></i> Mi Hato Ganadero</a>
                    </div>
                    <div class="af-submenu-divider"></div>
                    <a href="{{ route('client.finances.index') }}" class="af-submenu-item-highlight">
                        <i class="fas fa-history"></i> Ver Historial Completo
                    </a>
                </div>
            </li>

            {{-- Comunidad --}}
            <li>
                <a href="{{ route('recommendations.index') }}"
                   class="af-nav-link {{ str_contains($currentRoute, 'recommendations') ? 'active' : '' }}">
                    Comunidad
                </a>
            </li>

            {{-- Perfil --}}
            <li class="af-profile-menu">
                <div class="af-profile-trigger">
                    <div class="af-avatar-wrapper" id="afProfileMenuBtn">
                        <img src="{{ $userPhoto }}" class="af-profile-avatar" id="afProfileAvatar"
                             onerror="if(!this.dataset.fallback){this.dataset.fallback='1';this.src='{{ asset('img/foto_perfil.jpg') }}';}">
                        <span class="af-notif-badge" id="afNotifBadge" style="display:none">0</span>
                    </div>

                    <div class="af-dropdown-content" id="afProfileMenu">
                        <div class="af-dropdown-user">
                            <img src="{{ $userPhoto }}" class="af-dropdown-avatar"
                                 onerror="if(!this.dataset.fallback){this.dataset.fallback='1';this.src='{{ asset('img/foto_perfil.jpg') }}';}">
                            <div>
                                <p class="af-dropdown-username">{{ $userName }}</p>
                                <span class="af-dropdown-role">Agricultor</span>
                            </div>
                        </div>

                        <hr class="af-menu-divider">

                        <div class="af-notif-section">
                            <div class="af-notif-header">
                                <span><i class="fas fa-bell"></i> Notificaciones</span>
                                <button class="af-notif-mark-all" id="afMarkAllRead" onclick="markAllRead()">Marcar todas</button>
                            </div>
                            <div class="af-notif-list" id="afNotifList">
                                <div class="af-notif-loading"><i class="fas fa-spinner fa-spin"></i> Cargando...</div>
                            </div>
                        </div>

                        <hr class="af-menu-divider">
                        <a href="{{ route('perfil.editar') }}" class="af-dropdown-link"><i class="fas fa-user-pen"></i> Editar perfil</a>
                        <hr class="af-menu-divider">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="af-logout-btn"><i class="fas fa-right-from-bracket"></i> Cerrar Sesión</button>
                        </form>
                    </div>
                </div>
            </li>
        @endif
    </ul>

    {{-- Hamburger (mobile) --}}
    <button class="af-hamburger" id="afHamburger" aria-label="Menú" aria-expanded="false">
        <span></span><span></span><span></span>
    </button>
</nav>

{{-- ═══════════════════════════════════════════
     MOBILE DRAWER
═══════════════════════════════════════════ --}}
<div class="af-mobile-drawer" id="afMobileDrawer">

    @if (session()->has('user'))
        {{-- Usuario --}}
        <div class="af-drawer-user">
            <img src="{{ $userPhoto }}" class="af-drawer-avatar"
                 onerror="if(!this.dataset.fallback){this.dataset.fallback='1';this.src='{{ asset('img/foto_perfil.jpg') }}';}">
            <div>
                <div class="af-drawer-name">{{ $userName }}</div>
                <div class="af-drawer-role">Agricultor</div>
            </div>
        </div>

        {{-- Agronomía --}}
        <div class="af-drawer-section">
            <div class="af-drawer-label">Agronomía</div>
            <a href="{{ url('hens') }}"         class="af-drawer-link"><i class="fas fa-egg"         style="color:#f59e0b"></i> Aves de Corral</a>
            <a href="{{ url('cattles') }}"      class="af-drawer-link"><i class="fas fa-horse"       style="color:#a16207"></i> Ganado Vacuno</a>
            <a href="{{ url('avocadocrops') }}" class="af-drawer-link"><i class="fas fa-apple-whole" style="color:#16a34a"></i> Cultivo de Aguacate</a>
            <a href="{{ url('coffe_crops') }}"  class="af-drawer-link"><i class="fas fa-mug-hot"    style="color:#92400e"></i> Cultivo de Café</a>
        </div>

        <div class="af-drawer-divider"></div>

        {{-- Finanzas --}}
        <div class="af-drawer-section">
            <div class="af-drawer-label">Finanzas</div>
            <a href="{{ route('client.income.create') }}"     class="af-drawer-link"><i class="fas fa-plus-circle"  style="color:#8ac926"></i> Registrar Ingreso</a>
            <a href="{{ route('client.expense.create') }}"    class="af-drawer-link"><i class="fas fa-minus-circle" style="color:#ff6b6b"></i> Registrar Gasto</a>
            <a href="{{ route('client.investment.create') }}" class="af-drawer-link"><i class="fas fa-building"     style="color:#3b82f6"></i> Inversión</a>
            <a href="{{ route('client.debt.create') }}"       class="af-drawer-link"><i class="fas fa-credit-card"  style="color:#f59e0b"></i> Deuda</a>
            <a href="{{ route('client.inventory.create') }}"  class="af-drawer-link"><i class="fas fa-boxes"        style="color:#a855f7"></i> Inventario</a>
            <a href="{{ route('client.costs.create') }}"      class="af-drawer-link"><i class="fas fa-seedling"     style="color:#14b8a6"></i> Costos</a>
            <a href="{{ route('client.cattle.index') }}"      class="af-drawer-link"><i class="fas fa-cow"          style="color:#f59e0b"></i> Mi Hato Ganadero</a>
            <a href="{{ route('client.finances.index') }}"    class="af-drawer-link" style="color:#8ac926;font-weight:600"><i class="fas fa-history" style="color:#8ac926"></i> Historial Completo</a>
        </div>

        <div class="af-drawer-divider"></div>

        {{-- Comunidad y perfil --}}
        <div class="af-drawer-section">
            <div class="af-drawer-label">Cuenta</div>
            <a href="{{ route('recommendations.index') }}" class="af-drawer-link"><i class="fas fa-users" style="color:#8ac926"></i> Comunidad</a>
            <a href="{{ route('perfil.editar') }}"         class="af-drawer-link"><i class="fas fa-user-pen" style="color:#8ac926"></i> Editar Perfil</a>
        </div>

        <div class="af-drawer-divider"></div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="af-drawer-logout">
                <i class="fas fa-right-from-bracket"></i> Cerrar Sesión
            </button>
        </form>

    @else
        {{-- No autenticado --}}
        <div class="af-drawer-section" style="padding-top:12px">
            <p style="font-size:0.82rem;color:rgba(255,255,255,0.35);margin-bottom:20px;text-align:center;">
                Accede a tu cuenta para gestionar tu campo
            </p>
            <div class="af-drawer-auth">
                <a href="{{ route('login') }}"    class="af-drawer-auth-btn af-drawer-auth-btn--primary"><i class="fas fa-right-to-bracket"></i> Iniciar Sesión</a>
                <a href="{{ route('home') }}"     class="af-drawer-auth-btn af-drawer-auth-btn--ghost"><i class="fas fa-home"></i> Volver al Inicio</a>
            </div>
        </div>
    @endif
</div>


@if ($userId)
<script>
const _csrf = () => document.querySelector('meta[name="csrf-token"]')?.content ?? '';

document.addEventListener('DOMContentLoaded', () => {
    // Perfil dropdown
    const btn  = document.getElementById('afProfileMenuBtn');
    const menu = document.getElementById('afProfileMenu');
    if (btn && menu) {
        btn.addEventListener('click', e => {
            e.stopPropagation();
            const isOpen = menu.classList.toggle('show');
            document.getElementById('afFinanceSubmenu')?.classList.remove('show');
            document.getElementById('afAgronomySubmenu')?.classList.remove('show');
            if (isOpen) loadNotifications();
        });
        document.addEventListener('click', e => {
            if (!menu.contains(e.target) && !btn.contains(e.target)) menu.classList.remove('show');
        });
    }
    checkUnreadCount();
    setInterval(checkUnreadCount, 30000);
});

function checkUnreadCount() {
    fetch('/notificaciones/no-leidas').then(r=>r.json()).then(d=>updateBadge(d.unread_count)).catch(()=>{});
}

function updateBadge(count) {
    const badge = document.getElementById('afNotifBadge');
    const avatar = document.getElementById('afProfileAvatar');
    if (!badge || !avatar) return;
    if (count > 0) {
        badge.style.display = 'flex';
        badge.textContent = count > 9 ? '9+' : count;
        avatar.classList.add('af-avatar--has-notif');
    } else {
        badge.style.display = 'none';
        avatar.classList.remove('af-avatar--has-notif');
    }
}

function loadNotifications() {
    const list = document.getElementById('afNotifList');
    list.innerHTML = '<div class="af-notif-loading"><i class="fas fa-spinner fa-spin"></i> Cargando...</div>';
    fetch('/notificaciones').then(r=>r.json()).then(data=>{
        updateBadge(data.unread_count);
        renderNotifications(data.notifications);
    }).catch(()=>{
        list.innerHTML = '<div class="af-notif-empty">Error cargando notificaciones.</div>';
    });
}

function renderNotifications(notifications) {
    const list = document.getElementById('afNotifList');
    if (!notifications || notifications.length === 0) {
        list.innerHTML = '<div class="af-notif-empty"><i class="fas fa-bell-slash"></i><span>Sin notificaciones</span></div>';
        return;
    }
    list.innerHTML = notifications.map(n => {
        const photo = n.from_user?.profile_photo
            ? `<img src="${n.from_user.profile_photo}" class="af-notif-avatar" onerror="this.src='/img/profile.png'">`
            : `<img src="/img/profile.png" class="af-notif-avatar">`;
        const timeAgo = timeAgoEs(n.created_at);
        const unread = !n.is_read ? 'af-notif-item--unread' : '';
        return `<div class="af-notif-item ${unread}" onclick="markRead(${n.id},this)" data-id="${n.id}">${photo}<div class="af-notif-body"><p class="af-notif-msg">${n.message}</p><span class="af-notif-time"><i class="fas fa-clock"></i> ${timeAgo}</span></div>${!n.is_read?'<span class="af-notif-dot"></span>':''}</div>`;
    }).join('');
}

function markRead(id, el) {
    fetch(`/notificaciones/${id}/leer`, {method:'POST',headers:{'X-CSRF-TOKEN':_csrf(),'Content-Type':'application/json'}})
    .then(r=>{if(!r.ok) throw new Error(r.status);el.classList.remove('af-notif-item--unread');el.querySelector('.af-notif-dot')?.remove();checkUnreadCount();})
    .catch(err=>console.error('markRead:',err));
}

function markAllRead() {
    const btn = document.getElementById('afMarkAllRead');
    btn.disabled=true; btn.textContent='...';
    fetch('/notificaciones/leer-todas',{method:'POST',headers:{'X-CSRF-TOKEN':_csrf(),'Content-Type':'application/json'}})
    .then(r=>{if(!r.ok) throw new Error(r.status);return r.json();})
    .then(data=>{
        if(data.success){
            document.querySelectorAll('.af-notif-item--unread').forEach(el=>{el.classList.remove('af-notif-item--unread');el.querySelector('.af-notif-dot')?.remove();});
            updateBadge(0);
            btn.textContent='✓ Listo';
            setTimeout(()=>{btn.textContent='Marcar todas';btn.disabled=false;},2000);
        }
    }).catch(err=>{console.error(err);btn.textContent='Error';btn.disabled=false;setTimeout(()=>{btn.textContent='Marcar todas';},2000);});
}

function timeAgoEs(dateStr) {
    const diff = Math.floor((Date.now()-new Date(dateStr))/1000);
    if(diff<60) return 'hace un momento';
    if(diff<3600) return `hace ${Math.floor(diff/60)} min`;
    if(diff<86400) return `hace ${Math.floor(diff/3600)} h`;
    return `hace ${Math.floor(diff/86400)} días`;
}
</script>
@endif

<script>
// ── Hamburger ──────────────────────────────────
const _ham  = document.getElementById('afHamburger');
const _draw = document.getElementById('afMobileDrawer');

if (_ham && _draw) {
    _ham.addEventListener('click', () => {
        const open = _draw.classList.toggle('open');
        _ham.classList.toggle('open', open);
        _ham.setAttribute('aria-expanded', open);
        // Prevenir scroll en body cuando el drawer está abierto
        document.body.style.overflow = open ? 'hidden' : '';
        closeAllMenus();
    });
}

// ── Submenús desktop ───────────────────────────
function closeAllMenus() {
    document.getElementById('afFinanceSubmenu')?.classList.remove('show');
    document.getElementById('afAgronomySubmenu')?.classList.remove('show');
    document.getElementById('afProfileMenu')?.classList.remove('show');
}

function toggleFinanceMenu() {
    const isOpen = document.getElementById('afFinanceSubmenu').classList.contains('show');
    closeAllMenus();
    if (!isOpen) document.getElementById('afFinanceSubmenu').classList.add('show');
}

function toggleAgronomyMenu() {
    const isOpen = document.getElementById('afAgronomySubmenu').classList.contains('show');
    closeAllMenus();
    if (!isOpen) document.getElementById('afAgronomySubmenu').classList.add('show');
}

// Cerrar submenús al hacer click fuera
document.addEventListener('click', e => {
    const navLinks = document.querySelectorAll('.af-dropdown > .af-nav-link');
    let inside = false;
    navLinks.forEach(l => { if (l.contains(e.target)) inside = true; });
    if (!inside) {
        document.getElementById('afFinanceSubmenu')?.classList.remove('show');
        document.getElementById('afAgronomySubmenu')?.classList.remove('show');
    }
    // Cerrar drawer si se hace click fuera (en overlay)
    if (_draw && _draw.classList.contains('open') && !_draw.contains(e.target) && !_ham.contains(e.target)) {
        _draw.classList.remove('open');
        _ham?.classList.remove('open');
        _ham?.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
    }
});

// Cerrar drawer al resize a desktop
window.addEventListener('resize', () => {
    if (window.innerWidth > 900 && _draw?.classList.contains('open')) {
        _draw.classList.remove('open');
        _ham?.classList.remove('open');
        document.body.style.overflow = '';
    }
});
</script>