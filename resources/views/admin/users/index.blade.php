@extends('admin.layout')

@section('title', 'Usuarios')
@section('page-title', 'Gestión de Usuarios')

@push('styles')
<style>
.filter-bar {
    background: #1a1e14;
    border: 1px solid rgba(138,201,38,0.1);
    border-radius: 14px;
    padding: 18px 22px;
    margin-bottom: 22px;
    display: flex;
    gap: 14px;
    flex-wrap: wrap;
    align-items: flex-end;
}
.filter-fg { display: flex; flex-direction: column; gap: 5px; flex: 1; min-width: 180px; }
.filter-fg label { font-size: 0.68rem; font-weight: 700; color: #4a5a3a; text-transform: uppercase; }
.filter-fg input, .filter-fg select {
    padding: 9px 12px; background: #0d0f0a;
    border: 1px solid rgba(138,201,38,0.15); border-radius: 8px;
    color: #dde8c8; font-size: 0.85rem; font-family: 'Poppins', sans-serif; outline: none;
}
.filter-fg input:focus, .filter-fg select:focus { border-color: #8ac926; }
.filter-btn {
    padding: 9px 18px; background: linear-gradient(135deg, #5a8a10, #8ac926);
    border: none; border-radius: 8px; color: #fff; font-weight: 700;
    font-size: 0.82rem; cursor: pointer; font-family: 'Poppins', sans-serif;
    display: flex; align-items: center; gap: 7px;
}

.admin-table-wrap {
    background: #1a1e14; border: 1px solid rgba(138,201,38,0.1);
    border-radius: 16px; overflow: hidden;
}
.admin-table-head {
    padding: 18px 22px; border-bottom: 1px solid rgba(138,201,38,0.08);
    display: flex; align-items: center; justify-content: space-between;
}
.admin-table-head h3 { font-size: 0.95rem; font-weight: 700; color: #fff; }
.admin-table-head span { font-size: 0.78rem; color: #7a8a6a; }
table { width: 100%; border-collapse: collapse; }
th {
    text-align: left; padding: 12px 20px;
    font-size: 0.68rem; font-weight: 700; color: #4a5a3a;
    text-transform: uppercase; letter-spacing: 0.5px; background: rgba(0,0,0,0.15);
}
td { padding: 14px 20px; font-size: 0.82rem; color: #dde8c8; border-top: 1px solid rgba(255,255,255,0.03); }
tr:hover td { background: rgba(138,201,38,0.02); }

.user-cell { display: flex; align-items: center; gap: 10px; }
.user-avatar {
    width: 36px; height: 36px; border-radius: 50%;
    background: linear-gradient(135deg, #2d3d1a, #5a8a10);
    display: flex; align-items: center; justify-content: center;
    font-size: 0.85rem; font-weight: 700; color: #8ac926; flex-shrink: 0; overflow: hidden;
}
.user-avatar img { width: 100%; height: 100%; object-fit: cover; }
.user-name  { font-weight: 600; color: #fff; font-size: 0.85rem; }
.user-date  { font-size: 0.72rem; color: #4a5a3a; margin-top: 1px; }

.badge-active   { background: rgba(138,201,38,0.1); color: #8ac926; border: 1px solid rgba(138,201,38,0.2); padding: 3px 10px; border-radius: 20px; font-size: 0.68rem; font-weight: 700; }
.badge-inactive { background: rgba(239,68,68,0.1);  color: #ef4444; border: 1px solid rgba(239,68,68,0.2); padding: 3px 10px; border-radius: 20px; font-size: 0.68rem; font-weight: 700; }

.action-btns { display: flex; gap: 6px; }
.btn-sm {
    display: inline-flex; align-items: center; gap: 5px;
    padding: 6px 11px; border-radius: 7px; font-size: 0.72rem;
    font-weight: 600; cursor: pointer; transition: all 0.2s;
    border: 1px solid; text-decoration: none; font-family: 'Poppins', sans-serif; background: transparent;
}
.btn-detail  { border-color: rgba(138,201,38,0.3); color: #8ac926; }
.btn-detail:hover { background: rgba(138,201,38,0.1); color: #8ac926; }
.btn-toggle-on  { border-color: rgba(245,158,11,0.3); color: #f59e0b; }
.btn-toggle-on:hover  { background: rgba(245,158,11,0.1); }
.btn-toggle-off { border-color: rgba(59,130,246,0.3); color: #3b82f6; }
.btn-toggle-off:hover { background: rgba(59,130,246,0.1); }
.btn-delete { border-color: rgba(239,68,68,0.3); color: #ef4444; }
.btn-delete:hover { background: rgba(239,68,68,0.1); }
</style>
@endpush

@section('content')

{{-- Filtros --}}
<form method="GET" action="{{ route('admin.users') }}" class="filter-bar">
    <div class="filter-fg">
        <label>Buscar</label>
        <input type="text" name="search" placeholder="Nombre o email..." value="{{ request('search') }}">
    </div>
    <div class="filter-fg" style="max-width:160px">
        <label>Estado</label>
        <select name="status">
            <option value="">Todos</option>
            <option value="active"   {{ request('status') === 'active'   ? 'selected' : '' }}>Activos</option>
            <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactivos</option>
        </select>
    </div>
    <button type="submit" class="filter-btn"><i class="fas fa-search"></i> Filtrar</button>
</form>

{{-- Tabla --}}
<div class="admin-table-wrap">
    <div class="admin-table-head">
        <h3><i class="fas fa-users" style="color:#8ac926;margin-right:8px"></i> Lista de Usuarios</h3>
        <span>{{ count($users) }} usuarios encontrados</span>
    </div>
    <table>
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Email</th>
                <th>Finanzas</th>
                <th>Ganado</th>
                <th>Comentarios</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>
                        <div class="user-cell">
                            <div class="user-avatar">
                                @if(!empty($user['profile_photo']))
                                    <img src="{{ $user['profile_photo'] }}" onerror="this.parentElement.textContent='{{ strtoupper(substr($user['name'],0,1)) }}'">
                                @else
                                    {{ strtoupper(substr($user['name'], 0, 1)) }}
                                @endif
                            </div>
                            <div>
                                <div class="user-name">{{ $user['name'] }}</div>
                                <div class="user-date">Desde {{ $user['created_at'] }}</div>
                            </div>
                        </div>
                    </td>
                    <td>{{ $user['email'] }}</td>
                    <td>{{ $user['finances_count'] ?? 0 }}</td>
                    <td>{{ $user['cattle_count'] ?? 0 }}</td>
                    <td>{{ $user['recommendations_count'] ?? 0 }}</td>
                    <td>
                        @if($user['is_active'] ?? true)
                            <span class="badge-active">Activo</span>
                        @else
                            <span class="badge-inactive">Inactivo</span>
                        @endif
                    </td>
                    <td>
                        <div class="action-btns">
                            <a href="{{ route('admin.users.show', $user['id']) }}" class="btn-sm btn-detail">
                                <i class="fas fa-eye"></i> Ver
                            </a>

                            <form action="{{ route('admin.users.toggle', $user['id']) }}" method="POST" style="display:inline">
                                @csrf @method('PATCH')
                                @if($user['is_active'] ?? true)
                                    <button type="submit" class="btn-sm btn-toggle-on" title="Desactivar">
                                        <i class="fas fa-ban"></i>
                                    </button>
                                @else
                                    <button type="submit" class="btn-sm btn-toggle-off" title="Activar">
                                        <i class="fas fa-check"></i>
                                    </button>
                                @endif
                            </form>

                            <form action="{{ route('admin.users.destroy', $user['id']) }}" method="POST"
                                  onsubmit="return confirm('¿Eliminar a {{ $user['name'] }}? Esta acción no se puede deshacer.')" style="display:inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-sm btn-delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align:center;color:#4a5a3a;padding:40px">
                        <i class="fas fa-users" style="font-size:2rem;display:block;margin-bottom:10px;opacity:0.3"></i>
                        No se encontraron usuarios.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection