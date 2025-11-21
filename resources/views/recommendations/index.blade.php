@extends('layouts.app')

{{-- 
    NOTA: Esta vista requiere que el archivo de estilos 
    'public/css/comments_style.css' esté enlazado en 'layouts.app.blade.php'.
--}}

@section('content')
<div class="comments-page">
    <h1 class="comments-title">
        Tablero de Comentarios y Recomendaciones
    </h1>

    {{-- 1. Formulario para Nuevo Comentario --}}
    <div class="form-card">
        <h2 class="form-title">¡Deja tu Comentario!</h2>
        
        <form action="{{ route('recommendations.store') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                {{-- Clase CSS personalizada para el input --}}
                <textarea 
                    name="text" 
                    class="form-input-textarea" 
                    rows="4" 
                    placeholder="Escribe tu recomendación o comentario aquí. Valoramos tu opinión..." 
                    required>{{ old('text') }}</textarea>
                
                @error('text')
                    {{-- Usa una clase de error básica si es necesario --}}
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            {{-- Clase CSS personalizada para el botón neón --}}
            <button 
                type="submit" 
                class="submit-btn">
                <i class="fas fa-comment-dots mr-2"></i> Enviar Comentario
            </button>
        </form>
    </div>

    {{-- 2. Lista de Comentarios Existentes --}}
    <div class="list-card">
        <h2 class="list-title">Últimas Interacciones ({{ count($recommendations) }})</h2>
        
        <div class="comments-list">
            @forelse($recommendations as $rec)
                {{-- Clase CSS personalizada para cada comentario individual --}}
                <div class="comment-card">
                    
                    <div class="comment-header">
                        {{-- Nombre del Usuario --}}
                        <div class="comment-username">
                            <i class="fas fa-user-circle"></i>
                            {{ $rec['user']['name'] ?? 'Usuario Anónimo' }}
                        </div>
                        
                        {{-- Fecha --}}
                        <small class="comment-date">
                            <i class="far fa-clock"></i> {{ $rec['date'] }}
                        </small>
                    </div>

                    {{-- Texto del Comentario --}}
                    <p class="comment-text">
                        {{ $rec['text'] }}
                    </p>
                    
                </div>
            @empty
                {{-- Estado vacío si no hay datos --}}
                <div class="empty-state">
                    <i class="fas fa-comments"></i>
                    <p>Aún no hay recomendaciones. ¡Sé el primero en comentar!</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection