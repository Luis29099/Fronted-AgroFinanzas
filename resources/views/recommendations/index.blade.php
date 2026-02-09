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
        <span class="tag tag-{{ $rec['category'] ?? 'recomendacion' }}">
            {{ ucfirst($rec['category'] ?? 'Recomendación') }}
        </span>

        <span class="comment-date">
            {{ \Carbon\Carbon::parse($rec['date'])->format('d M Y - h:i A') }}
        </span>
    </div>

    

    <div class="comment-user">
        @if(isset($rec['user']))
            <small><img 
    src="{{ session('user.profile_photo') 
        ? session('user.profile_photo') // <-- ¡Usar directamente la URL ABSOLUTA de la sesión!
        : asset('img/profile.png') }}"
    class="avatar_foto"
    id="afProfileMenuBtn"> {{ $rec['user']['name'] }}</small>
        @else
            <small>👤 Anónimo</small>
        @endif
    </div>
    <p class="comment-text">{{ $rec['text'] }}</p>
    {{-- BOTÓN RESPONDER --}}
    <button class="reply-btn" onclick="toggleReplyForm({{ $rec['id'] }})">
         Responder
    </button>

    {{-- FORMULARIO RESPUESTA --}}
    <form action="{{ route('recommendations.store') }}"
          method="POST"
          class="reply-form"
          id="reply-form-{{ $rec['id'] }}"
          style="display:none;">
        @csrf

        <textarea name="text" class="form-input"
                  placeholder="Escribe una respuesta..." required></textarea>

        <input type="hidden" name="category" value="{{ $rec['category'] }}">
        <input type="hidden" name="parent_id" value="{{ $rec['id'] }}">

        <button type="submit" class="btn-submit small">Responder</button>
    </form>

    {{-- RESPUESTAS --}}
    @if (!empty($rec['replies']))
        <div class="replies">
            @foreach ($rec['replies'] as $reply)
                <div class="comment-card reply-card">
                    
                    <div class="comment-user">
                        @if(isset($reply['user']))
                            <small> <img 
    src="{{ session('user.profile_photo') 
        ? session('user.profile_photo') // <-- ¡Usar directamente la URL ABSOLUTA de la sesión!
        : asset('img/profile.png') }}"
    class="avatar_foto"
    id="afProfileMenuBtn"> {{ $reply['user']['name'] }}</small>
                        @else
                            <small> 👤 Anónimo</small>
                        @endif
                    </div>
                    <p class="comment-text">{{ $reply['text'] }}</p>
                </div>
            @endforeach
        </div>
    @endif

</div>

            @endforeach

        </div>

    </div>
</main>
<script>
function toggleReplyForm(id) {
    const form = document.getElementById('reply-form-' + id);
    form.style.display = form.style.display === 'none' ? 'block' : 'none';
}
</script>


@endsection