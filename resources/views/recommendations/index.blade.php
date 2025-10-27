@extends('layouts.app')

@section('content')
<div class="container my-4">
    <h2>Comentarios</h2>

    <!-- Formulario -->
    <div class="card p-3 mb-3">
        <form action="{{ route('recommendations.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <textarea name="text" class="form-control" rows="3" placeholder="Escribe tu comentario..." required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Comentar</button>
        </form>
    </div>

    <!-- Lista de comentarios -->
    <div class="card p-3">
        <h5>Últimos comentarios</h5>
        <ul class="list-group">
            @foreach($recommendations as $rec)
                <li class="list-group-item">
                    <strong>{{ $rec['user']['name'] ?? 'Anónimo' }}:</strong>
                    {{ $rec['text'] }}
                    <br>
                    <small class="text-muted">{{ $rec['date'] }}</small>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
