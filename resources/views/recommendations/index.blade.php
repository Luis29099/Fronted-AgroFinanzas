@extends('layouts.app')

@section('content')
<main class="comments-bg">
    {{-- La clase comments-bg garantiza que este main ocupe toda la pantalla para que el fondo se vea bien --}}
    
    <link rel="stylesheet" href="{{ asset('css/comments_style.css') }}">

    <div class="comments-container">

        <h2 class="title">Comentarios y Recomendaciones</h2>

        <form action="{{ route('recommendations.store') }}" method="POST" class="comment-form">
            @csrf

            <textarea name="text" class="form-input" placeholder="Escribe tu recomendación..." required></textarea>

            <select name="category" class="form-input" required>
                <option value="recomendacion">🟢 Recomendación</option>
                <option value="opinion">🔵 Opinión</option>
                <option value="duda">🟠 Duda</option>
                <option value="problema">🔴 Problema</option>
            </select>

            <button type="submit" class="btn-submit">Enviar</button>
        </form>

        <hr>

        <div class="comments-list">

            @foreach ($recommendations as $rec)

            <div class="comment-card">

                <div class="comment-header">

                    {{-- TAG DE CATEGORÍA (USANDO OBJETO) --}}
                    <span class="tag tag-{{ $rec['category'] ?? 'recomendacion' }}">
                        {{ ucfirst($rec['category'] ?? 'Recomendación') }}
                    </span>

                    <span class="comment-date">
                        {{ \Carbon\Carbon::parse($rec['date'])->format('d M Y - h:i A') }}
                    </span>

                </div>

                <p class="comment-text">{{ $rec['text'] }}</p>

                <div class="comment-user">
                    @if(isset($rec['user']))
                        <small>👤 {{ $rec['user']['name'] }}</small>
                    @else
                        <small>👤 Anónimo</small>
                    @endif
                </div>

            </div>

            @endforeach

        </div>

    </div>
</main>


@endsection