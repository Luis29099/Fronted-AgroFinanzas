@extends('admin.layout')

@section('title', 'Detalle Usuario')
@section('page-title', 'Detalle de <span>Usuario</span>')

@push('styles')
<style>
.user-hero {
    background: #1a1e14;
    border: 1px solid rgba(138,201,38,0.15);
    border-radius: 16px;
    padding: 24px;
    display: flex;
    align-items: center;
    gap: 20px;
    margin-bottom: 24px;
    flex-wrap: wrap;
}
.user-hero__avatar {
    width: 72px; height: 72px; border-radius: 50%;
    background: linear-gradient(135deg, #2d3d1a, #5a8a10);
    display: flex; align-items: center; justify-content: center;
    font-size: 2rem; font-weight: 800; color: #8ac926; flex-shrink: 0; overflow: hidden;
    border: 3px solid rgba(138,201,38,0.3);
}
.user-hero__avatar img { width: 100%; height: 100%; object-fit: cover; }
.user-hero__name  { font-size: 1.4rem; font-weight: 800; color: #fff; }
.user-hero__email { font-size: 0.82rem; color: #7a8a6a; margin-top: 3px; }
.user-hero__meta  { display: flex; gap: 14px; margin-top: 10px; flex-wrap: wrap; }
.meta-pill {
    display: inline-flex; align-items: center; gap: 6px;
    background: rgba(0,0,0,0.2); border: 1px solid rgba(255,255,255,0.05);
    border-radius: 8px; padding: 5px 12px; font-size: 0.75rem; color: #7a8a6a;
}
.meta-pill i { color: #8ac926; }
.badge-active   { background: rgba(138,201,38,0.1); color: #8ac926; border: 1px solid rgba(138,201,38,0.2); padding: 4px 12px; border-radius: 20px; font-size: 0.72rem; font-weight: 700; }
.badge-inactive { background: rgba(239,68,68,0.1);  color: #ef4444; border: 1px solid rgba(239,68,68,0.2); padding: 4px 12px; border-radius: 20px; font-size: 0.72rem; font-weight: 700; }

.user-hero__actions { margin-left: auto; display: flex; gap: 10px; flex-wrap: wrap; }
.btn-action {
    display: inline-flex; align-items: center; gap: 7px;
    padding: 9px 16px; border-radius: 9px; font-size: 0.8rem;
    font-weight: 600; cursor: pointer; transition: all 0.2s;
    border: 1px solid; font-family: 'Poppins', sans-serif; background: transparent; text-decoration: none;
}
.btn-toggle { border-color: rgba(245,158,11,0.4); color: #f59e0b; }
.btn-toggle:hover { background: rgba(245,158,11,0.1); }
.btn-delete { border-color: rgba(239,68,68,0.4); color: #ef4444; }
.btn-delete:hover { background: rgba(239,68,68,0.1); }
.btn-back   { border-color: rgba(138,201,38,0.3); color: #8ac926; }
.btn-back:hover { background: rgba(138,201,38,0.08); color: #8ac926; }

/* Summary */
.summary-row {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
    gap: 14px;
    margin-bottom: 24px;
}
.sum-card {
    background: #1a1e14; border: 1px solid rgba(138,201,38,0.1);
    border-radius: 12px; padding: 18px;
}
.sum-card__label { font-size: 0.68rem; color: #4a5a3a; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 6px; }
.sum-card__val   { font-size: 1.4rem; font-weight: 800; color: #fff; }

/* Tabs */
.tabs { display: flex; gap: 4px; margin-bottom: 20px; }
.tab-btn {
    padding: 9px 18px; border-radius: 9px; font-size: 0.82rem; font-weight: 600;
    cursor: pointer; border: 1px solid rgba(138,201,38,0.15); color: #7a8a6a;
    background: transparent; font-family: 'Poppins', sans-serif; transition: all 0.2s;
}
.tab-btn.active { background: rgba(138,201,38,0.1); border-color: rgba(138,201,38,0.3); color: #8ac926; }
.tab-pane { display: none; }
.tab-pane.active { display: block; }

/* Tabla */
.admin-table-wrap { background: #1a1e14; border: 1px solid rgba(138,201,38,0.1); border-radius: 14px; overflow: hidden; }
table { width: 100%; border-collapse: collapse; }
th { text-align: left; padding: 11px 18px; font-size: 0.65rem; font-weight: 700; color: #4a5a3a; text-transform: uppercase; background: rgba(0,0,0,0.15); }
td { padding: 12px 18px; font-size: 0.8rem; color: #dde8c8; border-top: 1px solid rgba(255,255,255,0.03); }
tr:hover td { background: rgba(138,201,38,0.02); }

.type-badge { padding: 3px 9px; border-radius: 6px; font-size: 0.68rem; font-weight: 700; }
.type-income     { background: rgba(138,201,38,0.1); color: #8ac926; }
.type-expense    { background: rgba(239,68,68,0.1); color: #ef4444; }
.type-investment { background: rgba(59,130,246,0.1); color: #3b82f6; }
.type-debt       { background: rgba(245,158,11,0.1); color: #f59e0b; }
.type-inventory  { background: rgba(168,85,247,0.1); color: #a855f7; }
.type-costs      { background: rgba(20,184,166,0.1); color: #14b8a6; }

.comment-card {
    background: rgba(0,0,0,0.15); border: 1px solid rgba(255,255,255,0.04);
    border-radius: 10px; padding: 14px 16px; margin-bottom: 10px;
    display: flex; justify-content: space-between; align-items: flex-start; gap: 12px;
}
.comment-content { font-size: 0.82rem; color: #dde8c8; line-height: 1.6; }
.comment-date    { font-size: 0.7rem; color: #4a5a3a; margin-top: 5px; }
.btn-del-comment {
    padding: 5px 10px; border: 1px solid rgba(239,68,68,0.3); border-radius: 6px;
    color: #ef4444; background: transparent; cursor: pointer; font-size: 0.72rem; flex-shrink: 0;
    font-family: 'Poppins', sans-serif; transition: background 0.2s;
}
.btn-del-comment:hover { background: rgba(239,68,68,0.1); }
</style>
@endpush

@section('content')

<a href="{{ route('admin.users') }}" class="btn-action btn-back" style="display:inline-flex;margin-bottom:20px">
    <i class="fas fa-arrow-left"></i> Volver a usuarios
</a>

{{-- Hero usuario --}}
<div class="user-hero">
    <div class="user-hero__avatar">
        @if(!empty($user['profile_photo']))
            <img src="{{ $user['profile_photo'] }}" onerror="this.style.display='none'">
        @else
            {{ strtoupper(substr($user['name'], 0, 1)) }}
        @endif
    </div>
    <div>
        <div class="user-hero__name">{{ $user['name'] }}</div>
        <div class="user-hero__email">{{ $user['email'] }}</div>
        <div class="user-hero__meta">
            <span class="meta-pill"><i class="fas fa-calendar"></i> Registrado {{ $user['created_at'] }}</span>
            @if($user['is_active'] ?? true)
                <span class="badge-active">Activo</span>
            @else
                <span class="badge-inactive">Inactivo</span>
            @endif
        </div>
    </div>

    <div class="user-hero__actions">
        <form action="{{ route('admin.users.toggle', $user['id']) }}" method="POST" style="display:inline">
            @csrf @method('PATCH')
            <button type="submit" class="btn-action btn-toggle">
                <i class="fas fa-{{ ($user['is_active'] ?? true) ? 'ban' : 'check' }}"></i>
                {{ ($user['is_active'] ?? true) ? 'Desactivar' : 'Activar' }}
            </button>
        </form>
        <form action="{{ route('admin.users.destroy', $user['id']) }}" method="POST"
              onsubmit="return confirm('¿Eliminar este usuario permanentemente?')" style="display:inline">
            @csrf @method('DELETE')
            <button type="submit" class="btn-action btn-delete">
                <i class="fas fa-trash"></i> Eliminar
            </button>
        </form>
    </div>
</div>

{{-- Summary finanzas --}}
@php $summary = $finances['summary'] ?? []; @endphp
<div class="summary-row">
    <div class="sum-card">
        <div class="sum-card__label">📈 Ingresos</div>
        <div class="sum-card__val">${{ number_format($summary['total_income'] ?? 0, 0, ',', '.') }}</div>
    </div>
    <div class="sum-card">
        <div class="sum-card__label">📉 Gastos</div>
        <div class="sum-card__val">${{ number_format($summary['total_expense'] ?? 0, 0, ',', '.') }}</div>
    </div>
    <div class="sum-card">
        <div class="sum-card__label">⚖️ Balance</div>
        <div class="sum-card__val">${{ number_format($summary['balance'] ?? 0, 0, ',', '.') }}</div>
    </div>
    <div class="sum-card">
        <div class="sum-card__label">🏦 Deudas</div>
        <div class="sum-card__val">${{ number_format($summary['total_debt'] ?? 0, 0, ',', '.') }}</div>
    </div>
    <div class="sum-card">
        <div class="sum-card__label">💬 Comentarios</div>
        <div class="sum-card__val">{{ count($comments) }}</div>
    </div>
    <div class="sum-card">
        <div class="sum-card__label">📋 Registros</div>
        <div class="sum-card__val">{{ $summary['records'] ?? 0 }}</div>
    </div>
</div>

{{-- Tabs --}}
<div class="tabs">
    <button class="tab-btn active" onclick="switchTab('finances', this)">
        <i class="fas fa-chart-line"></i> Finanzas
    </button>
    <button class="tab-btn" onclick="switchTab('comments', this)">
        <i class="fas fa-comments"></i> Comentarios
    </button>
</div>

{{-- Tab Finanzas --}}
<div class="tab-pane active" id="tab-finances">
    <div class="admin-table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Fecha</th><th>Tipo</th><th>Monto</th><th>Categoría</th><th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                @forelse($finances['finances'] ?? [] as $f)
                    <tr>
                        <td>{{ $f['date'] ?? '-' }}</td>
                        <td>
                            <span class="type-badge type-{{ $f['type'] ?? 'income' }}">
                                {{ ucfirst($f['type'] ?? '-') }}
                            </span>
                        </td>
                        <td><strong>${{ number_format($f['amount'] ?? 0, 0, ',', '.') }}</strong></td>
                        <td>{{ $f['category'] ?? '-' }}</td>
                        <td>{{ $f['description'] ?? '-' }}</td>
                    </tr>
                @empty
                    <tr><td colspan="5" style="text-align:center;color:#4a5a3a;padding:30px">Sin registros financieros.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Tab Comentarios --}}
<div class="tab-pane" id="tab-comments">
    @forelse($comments as $comment)
        <div class="comment-card">
            <div>
                <div class="comment-content">{{ $comment['content'] }}</div>
                <div class="comment-date"><i class="fas fa-clock"></i> {{ $comment['created_at'] }}</div>
            </div>
            <form action="{{ route('admin.comments.destroy', $comment['id']) }}" method="POST"
                  onsubmit="return confirm('¿Eliminar este comentario?')">
                @csrf @method('DELETE')
                <button type="submit" class="btn-del-comment"><i class="fas fa-trash"></i></button>
            </form>
        </div>
    @empty
        <div style="text-align:center;color:#4a5a3a;padding:40px">
            <i class="fas fa-comments" style="font-size:2rem;display:block;margin-bottom:10px;opacity:0.3"></i>
            Este usuario no tiene comentarios.
        </div>
    @endforelse
</div>

@endsection

@push('scripts')
<script>
function switchTab(tab, btn) {
    document.querySelectorAll('.tab-pane').forEach(p => p.classList.remove('active'));
    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
    document.getElementById('tab-' + tab).classList.add('active');
    btn.classList.add('active');
}
</script>
@endpush