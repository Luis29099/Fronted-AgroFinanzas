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

<nav class="af-navbar-container">
    <div class="af-logo-brand-group">
        <a href="{{ $logoRoute }}" class="af-logo-link">
            <img src="/img/LogoAgrofinanzas.jpeg" alt="Logo" class="af-brand-logo">
            <span class="af-brand-name">AgroFinanzas</span>
        </a>
    </div>

    <ul class="af-main-nav-links">
        @if (!session()->has('user'))
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
            {{-- 🌿 DROPDOWN AGRONOMÍA --}}
            <li class="af-dropdown">
                <a href="#"
                    class="af-nav-link {{ str_contains($currentRoute, 'Agronomy') || str_contains($currentRoute, 'hens') || str_contains($currentRoute, 'cattles') || str_contains($currentRoute, 'avocado') || str_contains($currentRoute, 'coffe') ? 'active' : '' }}"
                    onclick="event.preventDefault(); toggleAgronomyMenu()">
                    Agronomía <i class="fas fa-chevron-down" style="font-size:0.7rem;margin-left:5px;"></i>
                </a>
                <div class="af-agronomy-submenu" id="afAgronomySubmenu">
                    <div class="af-submenu-header"><i class="fas fa-leaf"></i> Producción Agropecuaria</div>
                    <div class="af-submenu-section">
                        <a href="{{ url('hens') }}"         class="af-submenu-item"><i class="fas fa-egg"         style="color:#f59e0b;"></i> Aves de Corral</a>
                        <a href="{{ url('cattles') }}"      class="af-submenu-item"><i class="fas fa-horse"       style="color:#a16207;"></i> Ganado Vacuno</a>
                        <a href="{{ url('avocadocrops') }}" class="af-submenu-item"><i class="fas fa-apple-whole" style="color:#16a34a;"></i> Cultivo de Aguacate</a>
                        <a href="{{ url('coffe_crops') }}"  class="af-submenu-item"><i class="fas fa-mug-hot"    style="color:#92400e;"></i> Cultivo de Café</a>
                    </div>
                </div>
            </li>

            {{-- 💰 DROPDOWN FINANZAS --}}
            <li class="af-dropdown">
                <a href="#"
                    class="af-nav-link {{ str_contains($currentRoute, 'finance') || str_contains($currentRoute, 'income') || str_contains($currentRoute, 'expense') || str_contains($currentRoute, 'investment') || str_contains($currentRoute, 'debt') || str_contains($currentRoute, 'inventory') || str_contains($currentRoute, 'costs') ? 'active' : '' }}"
                    onclick="event.preventDefault(); toggleFinanceMenu()">
                    Finanzas <i class="fas fa-chevron-down" style="font-size:0.7rem;margin-left:5px;"></i>
                </a>
                <div class="af-finance-submenu" id="afFinanceSubmenu">
                    <div class="af-submenu-header"><i class="fas fa-chart-line"></i> Gestión Financiera</div>
                    <div class="af-submenu-section">
                        <div class="af-submenu-label">Registrar</div>
                        <a href="{{ route('client.income.create') }}"     class="af-submenu-item"><i class="fas fa-plus-circle"  style="color:#8ac926;"></i> Ingreso</a>
                        <a href="{{ route('client.expense.create') }}"    class="af-submenu-item"><i class="fas fa-minus-circle" style="color:#ff6b6b;"></i> Gasto</a>
                        <a href="{{ route('client.investment.create') }}" class="af-submenu-item"><i class="fas fa-building"     style="color:#3b82f6;"></i> Inversión</a>
                        <a href="{{ route('client.debt.create') }}"       class="af-submenu-item"><i class="fas fa-credit-card"  style="color:#f59e0b;"></i> Deuda</a>
                        <a href="{{ route('client.inventory.create') }}"  class="af-submenu-item"><i class="fas fa-boxes"        style="color:#a855f7;"></i> Inventario</a>
                        <a href="{{ route('client.costs.create') }}"      class="af-submenu-item"><i class="fas fa-seedling"     style="color:#14b8a6;"></i> Costos</a>
                    </div>
                    <div class="af-submenu-divider"></div>
                    <a href="{{ route('client.finances.index') }}" class="af-submenu-item-highlight"><i class="fas fa-history"></i> Ver Historial Completo</a>
                </div>
            </li>

            {{-- 👥 Comunidad --}}
            <li>
                <a href="{{ route('recommendations.index') }}"
                    class="af-nav-link {{ str_contains($currentRoute, 'recommendations') ? 'active' : '' }}">
                    Comunidad
                </a>
            </li>

            {{-- 👤 Perfil con notificaciones --}}
            <li class="af-profile-menu">
                <div class="af-profile-trigger" id="afProfileTrigger">

                    <div class="af-avatar-wrapper" id="afProfileMenuBtn">
                        <img src="{{ $userPhoto }}"
                             class="af-profile-avatar"
                             id="afProfileAvatar"
                             onerror="if(!this.dataset.fallback){ this.dataset.fallback='1'; this.src='{{ asset('img/foto_perfil.jpg') }}'; }">
                        <span class="af-notif-badge" id="afNotifBadge" style="display:none">0</span>
                    </div>

                    {{-- DROPDOWN PERFIL + NOTIFICACIONES --}}
                    <div class="af-dropdown-content" id="afProfileMenu">

                        <div class="af-dropdown-user">
                            <img src="{{ $userPhoto }}"
                                 class="af-dropdown-avatar"
                                 onerror="if(!this.dataset.fallback){ this.dataset.fallback='1'; this.src='{{ asset('img/foto_perfil.jpg') }}'; }">
                            <div>
                                <p class="af-dropdown-username">{{ $userName }}</p>
                                <span class="af-dropdown-role">Agricultor</span>
                            </div>
                        </div>

                        <hr class="af-menu-divider">

                        <div class="af-notif-section">
                            <div class="af-notif-header">
                                <span><i class="fas fa-bell"></i> Notificaciones</span>
                                <button class="af-notif-mark-all" id="afMarkAllRead" onclick="markAllRead()">
                                    Marcar todas
                                </button>
                            </div>
                            <div class="af-notif-list" id="afNotifList">
                                <div class="af-notif-loading">
                                    <i class="fas fa-spinner fa-spin"></i> Cargando...
                                </div>
                            </div>
                        </div>

                        <hr class="af-menu-divider">

                        <a href="{{ route('perfil.editar') }}" class="af-dropdown-link">
                            <i class="fas fa-user-pen"></i> Editar perfil
                        </a>

                        <hr class="af-menu-divider">

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="af-logout-btn">
                                <i class="fas fa-right-from-bracket"></i> Cerrar Sesión
                            </button>
                        </form>
                    </div>
                </div>
            </li>
        @endif
    </ul>
</nav>

@if ($userId)
<script>
// Token CSRF global — se obtiene del meta tag que ahora sí existe en el layout
const _csrf = () => document.querySelector('meta[name="csrf-token"]')?.content ?? '';

// ── Abrir / cerrar menú perfil ─────────────────────────────────
document.addEventListener('DOMContentLoaded', () => {
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
            if (!menu.contains(e.target) && !btn.contains(e.target)) {
                menu.classList.remove('show');
            }
        });
    }

    checkUnreadCount();
    setInterval(checkUnreadCount, 30000);
});

// ── Consultar conteo de no leídas ─────────────────────────────
function checkUnreadCount() {
    fetch('/notificaciones/no-leidas')
        .then(r => r.json())
        .then(data => updateBadge(data.unread_count))
        .catch(() => {});
}

// ── Actualizar badge ───────────────────────────────────────────
function updateBadge(count) {
    const badge  = document.getElementById('afNotifBadge');
    const avatar = document.getElementById('afProfileAvatar');
    if (!badge || !avatar) return;

    if (count > 0) {
        badge.style.display = 'flex';
        badge.textContent   = count > 9 ? '9+' : count;
        avatar.classList.add('af-avatar--has-notif');
    } else {
        badge.style.display = 'none';
        avatar.classList.remove('af-avatar--has-notif');
    }
}

// ── Cargar lista de notificaciones ────────────────────────────
function loadNotifications() {
    const list = document.getElementById('afNotifList');
    list.innerHTML = '<div class="af-notif-loading"><i class="fas fa-spinner fa-spin"></i> Cargando...</div>';

    fetch('/notificaciones')
        .then(r => r.json())
        .then(data => {
            updateBadge(data.unread_count);
            renderNotifications(data.notifications);
        })
        .catch(() => {
            list.innerHTML = '<div class="af-notif-empty">Error cargando notificaciones.</div>';
        });
}

// ── Renderizar notificaciones ─────────────────────────────────
function renderNotifications(notifications) {
    const list = document.getElementById('afNotifList');

    if (!notifications || notifications.length === 0) {
        list.innerHTML = `
            <div class="af-notif-empty">
                <i class="fas fa-bell-slash"></i>
                <span>Sin notificaciones</span>
            </div>`;
        return;
    }

    list.innerHTML = notifications.map(n => {
        const photo   = n.from_user?.profile_photo
            ? `<img src="${n.from_user.profile_photo}" class="af-notif-avatar" onerror="this.src='/img/profile.png'">`
            : `<img src="/img/profile.png" class="af-notif-avatar">`;
        const timeAgo = timeAgoEs(n.created_at);
        const unread  = !n.is_read ? 'af-notif-item--unread' : '';

        return `
        <div class="af-notif-item ${unread}" onclick="markRead(${n.id}, this)" data-id="${n.id}">
            ${photo}
            <div class="af-notif-body">
                <p class="af-notif-msg">${n.message}</p>
                <span class="af-notif-time"><i class="fas fa-clock"></i> ${timeAgo}</span>
            </div>
            ${!n.is_read ? '<span class="af-notif-dot"></span>' : ''}
        </div>`;
    }).join('');
}

// ── Marcar una como leída ─────────────────────────────────────
function markRead(id, el) {
    fetch(`/notificaciones/${id}/leer`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': _csrf(),
            'Content-Type': 'application/json'
        }
    })
    .then(r => {
        if (!r.ok) throw new Error(r.status);
        el.classList.remove('af-notif-item--unread');
        el.querySelector('.af-notif-dot')?.remove();
        checkUnreadCount();
    })
    .catch(err => console.error('markRead error:', err));
}

// ── Marcar todas como leídas ──────────────────────────────────
function markAllRead() {
    const btn = document.getElementById('afMarkAllRead');
    btn.disabled    = true;
    btn.textContent = '...';

    fetch('/notificaciones/leer-todas', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': _csrf(),
            'Content-Type': 'application/json'
        }
    })
    .then(r => {
        if (!r.ok) throw new Error(r.status);
        return r.json();
    })
    .then(data => {
        if (data.success) {
            document.querySelectorAll('.af-notif-item--unread').forEach(el => {
                el.classList.remove('af-notif-item--unread');
                el.querySelector('.af-notif-dot')?.remove();
            });
            updateBadge(0);
            btn.textContent = '✓ Listo';
            setTimeout(() => { btn.textContent = 'Marcar todas'; btn.disabled = false; }, 2000);
        }
    })
    .catch(err => {
        console.error('markAllRead error:', err);
        btn.textContent = 'Error';
        btn.disabled    = false;
        setTimeout(() => { btn.textContent = 'Marcar todas'; }, 2000);
    });
}

// ── Tiempo relativo en español ────────────────────────────────
function timeAgoEs(dateStr) {
    const diff = Math.floor((Date.now() - new Date(dateStr)) / 1000);
    if (diff < 60)    return 'hace un momento';
    if (diff < 3600)  return `hace ${Math.floor(diff / 60)} min`;
    if (diff < 86400) return `hace ${Math.floor(diff / 3600)} h`;
    return `hace ${Math.floor(diff / 86400)} días`;
}
</script>
@endif

<script>
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

document.addEventListener('click', e => {
    const dropdownLinks = document.querySelectorAll('.af-dropdown > .af-nav-link');
    let inside = false;
    dropdownLinks.forEach(l => { if (l.contains(e.target)) inside = true; });
    if (!inside) {
        document.getElementById('afFinanceSubmenu')?.classList.remove('show');
        document.getElementById('afAgronomySubmenu')?.classList.remove('show');
    }
});
</script>

<style>
/* ── Submenús agronomía / finanzas ── */
.af-dropdown { position: relative; }

.af-finance-submenu,
.af-agronomy-submenu {
    position: absolute;
    top: 100%;
    left: 0;
    background: linear-gradient(135deg, #1a1a1a 0%, #2a2a2a 100%);
    border: 1px solid #8ac926;
    border-radius: 8px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.5), 0 0 15px rgba(138,201,38,0.3);
    min-width: 250px;
    padding: 10px 0;
    display: none;
    z-index: 1000;
    margin-top: 10px;
    animation: slideDown 0.3s ease;
}
.af-finance-submenu.show,
.af-agronomy-submenu.show { display: block; }

@keyframes slideDown {
    from { opacity:0; transform:translateY(-10px); }
    to   { opacity:1; transform:translateY(0); }
}

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
.af-submenu-section { padding: 5px 0; }
.af-submenu-label {
    padding: 8px 20px;
    color: #999;
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-weight: 600;
}
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
.af-submenu-item:hover { background: rgba(138,201,38,0.1); color: #8ac926; padding-left: 25px; }
.af-submenu-item i { font-size: 1.1rem; width: 20px; text-align: center; }
.af-submenu-item-highlight {
    display: flex; align-items: center; gap: 10px;
    padding: 12px 20px;
    color: #fff;
    background: linear-gradient(135deg, #8ac926 0%, #a8e05f 100%);
    text-decoration: none;
    font-weight: 700;
    transition: all 0.3s ease;
    margin: 5px 10px;
    border-radius: 6px;
}
.af-submenu-item-highlight:hover { transform: translateX(5px); box-shadow: 0 4px 12px rgba(138,201,38,0.4); }
.af-submenu-divider { height: 1px; background: #333; margin: 8px 15px; }

/* ── Avatar con badge ── */
.af-avatar-wrapper {
    position: relative;
    display: inline-flex;
    cursor: pointer;
}

.af-notif-badge {
    position: absolute;
    top: -5px;
    right: -5px;
    background: #ef4444;
    color: #fff;
    font-size: 0.62rem;
    font-weight: 800;
    width: 18px;
    height: 18px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px solid #000;
    animation: popIn 0.3s ease;
    z-index: 2;
}

@keyframes popIn {
    from { transform: scale(0); }
    to   { transform: scale(1); }
}

.af-avatar--has-notif {
    animation: ringPulse 2s infinite;
    box-shadow: 0 0 0 3px rgba(239,68,68,0.4) !important;
}

@keyframes ringPulse {
    0%, 100% { box-shadow: 0 0 0 2px rgba(239,68,68,0.4); }
    50%       { box-shadow: 0 0 0 6px rgba(239,68,68,0.15); }
}

/* ── Dropdown perfil ── */
.af-dropdown-content {
    position: absolute;
    right: 0;
    top: 60px;
    background: #111;
    border: 1px solid rgba(138,201,38,0.3);
    border-radius: 14px;
    padding: 0;
    display: none;
    flex-direction: column;
    min-width: 300px;
    max-height: 520px;
    box-shadow: 0 12px 40px rgba(0,0,0,0.6), 0 0 15px rgba(138,201,38,0.1);
    overflow: hidden;
    z-index: 2000;
}
.af-dropdown-content.show { display: flex; }

.af-dropdown-user {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 16px 18px;
    background: rgba(138,201,38,0.05);
}
.af-dropdown-avatar {
    width: 42px; height: 42px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #8ac926;
    flex-shrink: 0;
}
.af-dropdown-username {
    color: #8ac926;
    font-weight: 700;
    font-size: 0.9rem;
    margin: 0;
}
.af-dropdown-role { color: #666; font-size: 0.72rem; }

.af-menu-divider {
    border: none;
    border-top: 1px solid #222;
    margin: 0;
}

/* ── Sección notificaciones ── */
.af-notif-section {
    flex: 1;
    display: flex;
    flex-direction: column;
    min-height: 0;
}

.af-notif-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px 18px 8px;
    color: #aaa;
    font-size: 0.8rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}
.af-notif-header i { color: #8ac926; margin-right: 6px; }

.af-notif-mark-all {
    background: none;
    border: 1px solid rgba(138,201,38,0.25);
    color: #8ac926;
    font-size: 0.7rem;
    padding: 3px 8px;
    border-radius: 4px;
    cursor: pointer;
    font-family: 'Poppins', sans-serif;
    transition: background 0.2s;
}
.af-notif-mark-all:hover { background: rgba(138,201,38,0.1); }
.af-notif-mark-all:disabled { opacity: 0.5; cursor: not-allowed; }

.af-notif-list {
    overflow-y: auto;
    max-height: 260px;
    padding: 4px 0;
}
.af-notif-list::-webkit-scrollbar { width: 4px; }
.af-notif-list::-webkit-scrollbar-track { background: transparent; }
.af-notif-list::-webkit-scrollbar-thumb { background: #333; border-radius: 4px; }

.af-notif-item {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    padding: 10px 18px;
    cursor: pointer;
    transition: background 0.2s;
    position: relative;
}
.af-notif-item:hover { background: rgba(255,255,255,0.04); }
.af-notif-item--unread { background: rgba(138,201,38,0.05); }
.af-notif-item--unread:hover { background: rgba(138,201,38,0.09); }

.af-notif-avatar {
    width: 34px; height: 34px;
    border-radius: 50%;
    object-fit: cover;
    border: 1px solid #333;
    flex-shrink: 0;
}

.af-notif-body { flex: 1; min-width: 0; }

.af-notif-msg {
    color: #ddd;
    font-size: 0.8rem;
    line-height: 1.4;
    margin: 0 0 3px;
    word-break: break-word;
}
.af-notif-item--unread .af-notif-msg { color: #fff; font-weight: 600; }

.af-notif-time {
    color: #555;
    font-size: 0.7rem;
    display: flex;
    align-items: center;
    gap: 4px;
}
.af-notif-time i { color: #444; }

.af-notif-dot {
    width: 8px; height: 8px;
    border-radius: 50%;
    background: #8ac926;
    flex-shrink: 0;
    margin-top: 4px;
}

.af-notif-empty {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 30px 20px;
    color: #444;
    font-size: 0.82rem;
}
.af-notif-empty i { font-size: 1.5rem; color: #333; }

.af-notif-loading {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 20px;
    color: #555;
    font-size: 0.8rem;
}
.af-notif-loading i { color: #8ac926; }

.af-dropdown-link {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 12px 18px;
    color: #ccc;
    text-decoration: none;
    font-size: 0.88rem;
    transition: all 0.2s;
}
.af-dropdown-link:hover { color: #8ac926; background: rgba(138,201,38,0.05); }
.af-dropdown-link i { color: #8ac926; width: 16px; }

.af-logout-btn {
    background: none;
    border: none;
    color: #ff7070;
    cursor: pointer;
    font-weight: 500;
    font-size: 0.88rem;
    text-align: left;
    padding: 12px 18px;
    width: 100%;
    transition: color 0.2s;
    display: flex;
    align-items: center;
    gap: 10px;
    font-family: 'Poppins', sans-serif;
}
.af-logout-btn:hover { color: #ff2f2f; background: rgba(239,68,68,0.05); }
.af-logout-btn i { width: 16px; }

@media (max-width: 768px) {
    .af-finance-submenu, .af-agronomy-submenu {
        position: fixed;
        left: 50%;
        transform: translateX(-50%);
        width: 90%;
        max-width: 300px;
    }
    .af-dropdown-content { min-width: 280px; right: -20px; }
}
</style>