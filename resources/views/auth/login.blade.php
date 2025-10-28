@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 500px;">
    <h2 class="mb-4 text-center">Iniciar Sesión</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('login.submit') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>
         
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Ingresar</button>
        </div>
    </form>

    <div class="mt-3 text-center">
        ¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate aquí</a>
    </div>
</div>
@endsection
