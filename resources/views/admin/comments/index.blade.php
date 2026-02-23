@extends('admin.layout')

@section('title', 'Comentarios')
@section('page-title', 'Gestión de Comentarios')

@push('styles')
<style>
.filter-bar {
    background: #1a1e14; border: 1px solid rgba(138,201,38,0.1);
    border-radius: 14px; padding: 16px 20px; margin-bottom: 22px;
    display: flex; gap: 14px; flex-wrap: wrap; align-items: flex-end;
}
.filter-fg { display: flex; flex-direction: column; gap: 5px; flex: 1; min-width: 200px; }
.filter-fg label { font-size: 0.68rem; font-weight: 700; color: #4a5a3a; text-transform: uppercase; }
.filter-fg input, .filter-fg select {
    padding: 9px 12px; background: #0d0f0a;
    border: 1px solid rgba(138,201,38,0.15); border-radius: 8px;
    color: #dde8c8; font-size: 0.85rem; font-family: 'Poppins', sans-serif; outline: none;
}
.filter-btn { padding: 9px 18px; background: linear-gradient(135deg, #5a8a10, #8ac926); border: none; border-radius: 8px; color: #fff; font-weight: 700; font-size: 0.82rem; cursor: pointer; font-family: 'Poppins', sans-serif; }

.comments-count {
    font-size: 0.82rem; color: #7a8a6a; margin-bottom: 16px;
}

.comment-card {
    background: #1a1e14; border: 1px solid rgba(138,201,38,0.08);
    border-radius: 14px; padding: 18px 20px; margin-bottom: 12px;
    display: flex; gap: 14px; align-items: flex-start;
    transition: border-color 0.2s;
}
.comment-card:hover { border-color: rgba(138,201,38,0.2); }

.comment-avatar {
    width: 40px; height: 40px; border-radius: 50%; flex-shrink: 0;
    background: linear-gradient(135deg, #2d3d1a, #5a8a10);
    display: flex; align-items: center; justify-content: center;
    font-size: 0.9rem; font-weight: 700; color: #8ac926; overflow: hidden;
    border: 2px solid rgba(138,201,38,0.2);
}
.comment-avatar img { width: 100%; height: 100%; object-fit: cover; }

.comment-body { flex: 1; min-width: 0; }
.comment-meta {
    display: flex; align-items: center; gap: 10px; margin-bottom: 8px; flex-wrap: wrap;
}
.comment-user { font-weight: 700; font-size: 0.85rem; color: #fff; }
.comment-user a { color: #8ac926; text-decoration: none; }
.comment-user a:hover { text-decoration: underline; }
.comment-date { font-size: 0.7rem; color: #4a5a3a; }
.comment-email { font-size: 0.7rem; color: #4a5a3a; }

.comment-content {
    font-size: 0.82rem; color: #c8d8b0; line-height: 1.6;
    background: rgba(0,0,0,0.15); border-radius: 8px; padding: 10px 14px;
}

.btn-del-comment {
    display: inline-flex; align-items: center; gap: 5px;
    padding: 6px 12px; border: 1px solid rgba(239,68,68,0.3); border-radius: 7px;
    color: #ef4444; background: transparent; cursor: pointer; font-size: 0.72rem;
    font-family: 'Poppins', sans-serif; transition: background 0.2s; flex-shrink: 0;
    font-weight: 600;
}
.btn-del-comment:hover { background: rgba(239,68,68,0.1); }

.empty-state {
    text-align: center; padding: 60px 20px;
    background: #1a1e14; border: 1px dashed rgba(138,201,38,0.15);
    border-radius: 16px; color: #4a5a3a;
}
.empty-state i { font-size: 3rem; display: block; margin-bottom: 14px; opacity: 0.3; }
</style>
@endpush

@section('content')

{{-- Filtros --}}
<form method="GET" action="{{ route('admin.comments') }}" class="filter-bar">
    <div class="filter-fg">
        <label>Buscar en contenido</label>
        <input type="text" name="search" placeholder="Buscar texto..." value="{{ request('search') }}">
    </div>
    <div class="filter-fg" style="max-width:220px">
        <label>Filtrar por usuario</label>
        <select name="user_id">
            <option value="">Todos los usuarios</option>
            @foreach($users as $u)
                <option value="{{ $u['id'] }}" {{ request('user_id') == $u['id'] ? 'selected' : '' }}>
                    {{ $u['name'] }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="filter-btn"><i class="fas fa-search"></i> Filtrar</button>
</form>

<div class="comments-count">
    <i class="fas fa-comments" style="color:#8ac926"></i> {{ count($comments) }} comentarios encontrados
</div>

{{-- Lista --}}
@forelse($comments as $comment)
    <div class="comment-card">
        <div class="comment-avatar">
            @if(!empty($comment['user']['photo']))
                <img src="{{ $comment['user']['photo'] }}" onerror="this.style.display='none'">
            @else
                {{ strtoupper(substr($comment['user']['name'] ?? 'U', 0, 1)) }}
            @endif
        </div>
        <div class="comment-body">
            <div class="comment-meta">
                <span class="comment-user">
                    <a href="{{ route('admin.users.show', $comment['user']['id']) }}">
                        {{ $comment['user']['name'] ?? 'Usuario' }}
                    </a>
                </span>
                <span class="comment-email">{{ $comment['user']['email'] ?? '' }}</span>
                <span class="comment-date"><i class="fas fa-clock"></i> {{ $comment['created_at'] }}</span>
            </div>
            <div class="comment-content">{{ $comment['content'] }}</div>
        </div>
        <form action="{{ route('admin.comments.destroy', $comment['id']) }}" method="POST"
              onsubmit="return confirm('¿Eliminar este comentario?')">
            @csrf @method('DELETE')
            <button type="submit" class="btn-del-comment">
                <i class="fas fa-trash"></i> Eliminar
            </button>
        </form>
    </div>
@empty
    <div class="empty-state">
        <i class="fas fa-comments"></i>
        No hay comentarios que coincidan con los filtros.
    </div>
@endforelse

@endsection