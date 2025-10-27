@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 500px;">
    <h2 class="mb-4 text-center">Registro de Usuario</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('register.submit') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre Completo</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="birth_date" class="form-label">Fecha de Nacimiento</label>
            <input type="date" name="birth_date" class="form-control" required value="{{ old('birth_date') }}">
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-success">Registrarse</button>
        </div>
    </form>

    <div class="mt-3 text-center">
        ¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión aquí</a>
    </div>
</div>
@endsection
