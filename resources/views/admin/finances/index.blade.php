@extends('admin.layout')

@section('title', 'Finanzas')
@section('page-title', 'Vista de Finanzas')

@push('styles')
<style>
.summary-row {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(170px, 1fr));
    gap: 14px;
    margin-bottom: 24px;
}
.sum-card { background: #1a1e14; border: 1px solid rgba(138,201,38,0.1); border-radius: 12px; padding: 18px; }
.sum-card__label { font-size: 0.68rem; color: #4a5a3a; text-transform: uppercase; margin-bottom: 6px; }
.sum-card__val   { font-size: 1.3rem; font-weight: 800; color: #fff; }

.filter-bar {
    background: #1a1e14; border: 1px solid rgba(138,201,38,0.1);
    border-radius: 14px; padding: 16px 20px; margin-bottom: 20px;
    display: flex; gap: 14px; flex-wrap: wrap; align-items: flex-end;
}
.filter-fg { display: flex; flex-direction: column; gap: 5px; flex: 1; min-width: 160px; }
.filter-fg label { font-size: 0.68rem; font-weight: 700; color: #4a5a3a; text-transform: uppercase; }
.filter-fg select, .filter-fg input {
    padding: 9px 12px; background: #0d0f0a;
    border: 1px solid rgba(138,201,38,0.15); border-radius: 8px;
    color: #dde8c8; font-size: 0.85rem; font-family: 'Poppins', sans-serif; outline: none;
}
.filter-btn { padding: 9px 18px; background: linear-gradient(135deg, #5a8a10, #8ac926); border: none; border-radius: 8px; color: #fff; font-weight: 700; font-size: 0.82rem; cursor: pointer; font-family: 'Poppins', sans-serif; }

.admin-table-wrap { background: #1a1e14; border: 1px solid rgba(138,201,38,0.1); border-radius: 14px; overflow: hidden; }
table { width: 100%; border-collapse: collapse; }
th { text-align: left; padding: 11px 18px; font-size: 0.65rem; font-weight: 700; color: #4a5a3a; text-transform: uppercase; background: rgba(0,0,0,0.15); }
td { padding: 12px 18px; font-size: 0.8rem; color: #dde8c8; border-top: 1px solid rgba(255,255,255,0.03); }

.type-badge { padding: 3px 9px; border-radius: 6px; font-size: 0.68rem; font-weight: 700; }
.type-income     { background: rgba(138,201,38,0.1); color: #8ac926; }
.type-expense    { background: rgba(239,68,68,0.1); color: #ef4444; }
.type-investment { background: rgba(59,130,246,0.1); color: #3b82f6; }
.type-debt       { background: rgba(245,158,11,0.1); color: #f59e0b; }
.type-inventory  { background: rgba(168,85,247,0.1); color: #a855f7; }
.type-costs      { background: rgba(20,184,166,0.1); color: #14b8a6; }

.user-link { color: #8ac926; text-decoration: none; font-weight: 600; }
.user-link:hover { text-decoration: underline; }
</style>
@endpush

@section('content')

{{-- Resumen global --}}
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
        <div class="sum-card__label">🏦 Inversiones</div>
        <div class="sum-card__val">${{ number_format($summary['total_investment'] ?? 0, 0, ',', '.') }}</div>
    </div>
    <div class="sum-card">
        <div class="sum-card__label">💳 Deudas</div>
        <div class="sum-card__val">${{ number_format($summary['total_debt'] ?? 0, 0, ',', '.') }}</div>
    </div>
    <div class="sum-card">
        <div class="sum-card__label">📦 Inventario</div>
        <div class="sum-card__val">${{ number_format($summary['total_inventory'] ?? 0, 0, ',', '.') }}</div>
    </div>
    <div class="sum-card">
        <div class="sum-card__label">📋 Registros</div>
        <div class="sum-card__val">{{ $summary['records'] ?? 0 }}</div>
    </div>
</div>

{{-- Filtros --}}
<form method="GET" action="{{ route('admin.finances') }}" class="filter-bar">
    <div class="filter-fg">
        <label>Usuario</label>
        <select name="user_id">
            <option value="">Todos los usuarios</option>
            @foreach($users as $u)
                <option value="{{ $u['id'] }}" {{ request('user_id') == $u['id'] ? 'selected' : '' }}>
                    {{ $u['name'] }} ({{ $u['email'] }})
                </option>
            @endforeach
        </select>
    </div>
    <div class="filter-fg" style="max-width:160px">
        <label>Tipo</label>
        <select name="type">
            <option value="">Todos</option>
            <option value="income"     {{ request('type') === 'income'     ? 'selected' : '' }}>Ingresos</option>
            <option value="expense"    {{ request('type') === 'expense'    ? 'selected' : '' }}>Gastos</option>
            <option value="investment" {{ request('type') === 'investment' ? 'selected' : '' }}>Inversiones</option>
            <option value="debt"       {{ request('type') === 'debt'       ? 'selected' : '' }}>Deudas</option>
            <option value="inventory"  {{ request('type') === 'inventory'  ? 'selected' : '' }}>Inventario</option>
            <option value="costs"      {{ request('type') === 'costs'      ? 'selected' : '' }}>Costos</option>
        </select>
    </div>
    <button type="submit" class="filter-btn"><i class="fas fa-search"></i> Filtrar</button>
</form>

{{-- Tabla --}}
<div class="admin-table-wrap">
    <table>
        <thead>
            <tr>
                <th>Fecha</th><th>Usuario</th><th>Tipo</th><th>Monto</th><th>Categoría</th><th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            @forelse($finances as $f)
                <tr>
                    <td>{{ $f['date'] ?? '-' }}</td>
                    <td>
                        @if(isset($f['user']))
                            <a href="{{ route('admin.users.show', $f['user']['id']) }}" class="user-link">
                                {{ $f['user']['name'] }}
                            </a>
                        @else
                            -
                        @endif
                    </td>
                    <td><span class="type-badge type-{{ $f['type'] ?? '' }}">{{ ucfirst($f['type'] ?? '-') }}</span></td>
                    <td><strong>${{ number_format($f['amount'] ?? 0, 0, ',', '.') }}</strong></td>
                    <td>{{ $f['category'] ?? '-' }}</td>
                    <td>{{ $f['description'] ?? '-' }}</td>
                </tr>
            @empty
                <tr><td colspan="6" style="text-align:center;color:#4a5a3a;padding:30px">Sin registros financieros.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection