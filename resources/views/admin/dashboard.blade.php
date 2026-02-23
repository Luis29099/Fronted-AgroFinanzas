@extends('admin.layout')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@push('styles')
<style>
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 18px;
    margin-bottom: 32px;
}
.stat-card {
    background: #1a1e14;
    border: 1px solid rgba(138,201,38,0.12);
    border-radius: 16px;
    padding: 22px;
    transition: all 0.25s;
}
.stat-card:hover { border-color: rgba(138,201,38,0.3); transform: translateY(-3px); }
.stat-card__icon { font-size: 1.8rem; margin-bottom: 12px; }
.stat-card__num  { font-size: 2rem; font-weight: 800; color: #fff; line-height: 1; }
.stat-card__label { font-size: 0.72rem; color: #7a8a6a; text-transform: uppercase; letter-spacing: 0.5px; margin-top: 4px; }

/* Tabla usuarios recientes */
.admin-table-wrap {
    background: #1a1e14;
    border: 1px solid rgba(138,201,38,0.1);
    border-radius: 16px;
    overflow: hidden;
}
.admin-table-head {
    padding: 18px 22px;
    border-bottom: 1px solid rgba(138,201,38,0.08);
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.admin-table-head h3 { font-size: 0.95rem; font-weight: 700; color: #fff; }
.admin-table-head a { font-size: 0.78rem; color: #8ac926; text-decoration: none; }
table { width: 100%; border-collapse: collapse; }
th {
    text-align: left;
    padding: 12px 20px;
    font-size: 0.68rem;
    font-weight: 700;
    color: #4a5a3a;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    background: rgba(0,0,0,0.15);
}
td {
    padding: 14px 20px;
    font-size: 0.82rem;
    color: #dde8c8;
    border-top: 1px solid rgba(255,255,255,0.03);
}
tr:hover td { background: rgba(138,201,38,0.03); }
.user-cell { display: flex; align-items: center; gap: 10px; }
.user-avatar {
    width: 32px; height: 32px; border-radius: 50%;
    background: linear-gradient(135deg, #2d3d1a, #5a8a10);
    display: flex; align-items: center; justify-content: center;
    font-size: 0.8rem; font-weight: 700; color: #8ac926; flex-shrink: 0;
}
.user-avatar img { width: 100%; height: 100%; border-radius: 50%; object-fit: cover; }
.badge-active { background: rgba(138,201,38,0.1); color: #8ac926; border: 1px solid rgba(138,201,38,0.2); padding: 3px 9px; border-radius: 20px; font-size: 0.68rem; font-weight: 700; }
.badge-inactive { background: rgba(239,68,68,0.1); color: #ef4444; border: 1px solid rgba(239,68,68,0.2); padding: 3px 9px; border-radius: 20px; font-size: 0.68rem; font-weight: 700; }
.tbl-link { color: #8ac926; text-decoration: none; font-size: 0.78rem; font-weight: 600; }
.tbl-link:hover { text-decoration: underline; }
</style>
@endpush

@section('content')

{{-- Stats --}}
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-card__icon">👥</div>
        <div class="stat-card__num">{{ $stats['total_users'] }}</div>
        <div class="stat-card__label">Usuarios totales</div>
    </div>
    <div class="stat-card">
        <div class="stat-card__icon">✅</div>
        <div class="stat-card__num">{{ $stats['active_users'] }}</div>
        <div class="stat-card__label">Usuarios activos</div>
    </div>
    <div class="stat-card">
        <div class="stat-card__icon">💰</div>
        <div class="stat-card__num">{{ $stats['total_finances'] }}</div>
        <div class="stat-card__label">Registros financieros</div>
    </div>
    <div class="stat-card">
        <div class="stat-card__icon">💬</div>
        <div class="stat-card__num">{{ $stats['total_comments'] }}</div>
        <div class="stat-card__label">Comentarios</div>
    </div>
    <div class="stat-card">
        <div class="stat-card__icon">📈</div>
        <div class="stat-card__num">${{ number_format($stats['total_income'], 0, ',', '.') }}</div>
        <div class="stat-card__label">Ingresos totales</div>
    </div>
    <div class="stat-card">
        <div class="stat-card__icon">📉</div>
        <div class="stat-card__num">${{ number_format($stats['total_expense'], 0, ',', '.') }}</div>
        <div class="stat-card__label">Gastos totales</div>
    </div>
</div>

{{-- Tabla usuarios recientes --}}
<div class="admin-table-wrap">
    <div class="admin-table-head">
        <h3><i class="fas fa-users" style="color:#8ac926;margin-right:8px"></i> Usuarios Recientes</h3>
        <a href="{{ route('admin.users') }}">Ver todos →</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Email</th>
                <th>Finanzas</th>
                <th>Estado</th>
                <th>Registro</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse(array_slice($users, 0, 8) as $user)
                <tr>
                    <td>
                        <div class="user-cell">
                            <div class="user-avatar">
                                @if(!empty($user['profile_photo']))
                                    <img src="{{ $user['profile_photo'] }}" onerror="this.style.display='none'">
                                @else
                                    {{ strtoupper(substr($user['name'], 0, 1)) }}
                                @endif
                            </div>
                            {{ $user['name'] }}
                        </div>
                    </td>
                    <td>{{ $user['email'] }}</td>
                    <td>{{ $user['finances_count'] ?? 0 }} registros</td>
                    <td>
                        @if($user['is_active'] ?? true)
                            <span class="badge-active">Activo</span>
                        @else
                            <span class="badge-inactive">Inactivo</span>
                        @endif
                    </td>
                    <td>{{ $user['created_at'] }}</td>
                    <td>
                        <a href="{{ route('admin.users.show', $user['id']) }}" class="tbl-link">
                            Ver detalle →
                        </a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" style="text-align:center;color:#4a5a3a;padding:30px">Sin usuarios registrados.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection