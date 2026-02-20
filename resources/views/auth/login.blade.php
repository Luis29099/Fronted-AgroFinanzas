@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush

@section('content')
<main class="contenido_login">
    <img src="{{ asset('/img/paramo.jpg') }}" class="fondo" alt="fondo">

    <div class="login-card">
        <img src="/img/LOGOYESLOGAN.jpeg" alt="Logo" class="login-logo">
        <h1 class="login-title">Iniciar Sesión</h1>
        <p class="login-subtitle">Bienvenido de vuelta</p>

        {{-- Error de credenciales --}}
        @if ($errors->has('login_error'))
            <div class="alert-error">
                <i class="fa-solid fa-circle-exclamation"></i>
                {{ $errors->first('login_error') }}
            </div>
        @endif

        {{-- Éxito (ej: después de registrarse) --}}
        @if (session('success'))
            <div class="alert-success">
                <i class="fa-solid fa-circle-check"></i>
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('login.submit') }}" method="POST" class="login-form" id="loginForm">
            @csrf

            {{-- Email --}}
            <div class="field-group">
                <label for="email">
                    <i class="fa-solid fa-envelope"></i> Correo electrónico
                </label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    placeholder="correo@ejemplo.com"
                    value="{{ old('email') }}"
                    class="{{ $errors->has('email') ? 'input-error' : '' }}"
                    required
                    autofocus
                >
                @error('email')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- Contraseña --}}
            <div class="field-group">
                <label for="password">
                    <i class="fa-solid fa-lock"></i> Contraseña
                </label>
                <div class="password-container">
                    <input
                        type="password"
                        name="password"
                        id="password"
                        placeholder="Tu contraseña"
                        class="{{ $errors->has('password') ? 'input-error' : '' }}"
                        required
                    >
                    <span class="toggle-password" onclick="togglePass('password', this)">
                        <i class="fa-solid fa-eye"></i>
                    </span>
                </div>
                @error('password')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- Recordar --}}
            <div class="recordar">
                <input type="checkbox" id="recordar" name="remember">
                <label for="recordar">Recordar sesión</label>
            </div>

            <div class="login-button-wrapper">
                <button type="submit" class="login-button" id="submitBtn">
                    <span id="btnText"><i class="fa-solid fa-right-to-bracket"></i> Ingresar</span>
                    <span id="btnSpinner" style="display:none">
                        <i class="fa-solid fa-spinner fa-spin"></i> Ingresando...
                    </span>
                </button>
            </div>
        </form>

        <p class="registro-link">¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate aquí</a></p>
    </div>
</main>

<script>
    function togglePass(fieldId, btn) {
        const field = document.getElementById(fieldId);
        const icon  = btn.querySelector('i');
        if (field.type === 'password') {
            field.type = 'text';
            icon.classList.replace('fa-eye', 'fa-eye-slash');
        } else {
            field.type = 'password';
            icon.classList.replace('fa-eye-slash', 'fa-eye');
        }
    }

    document.getElementById('loginForm').addEventListener('submit', function () {
        document.getElementById('btnText').style.display    = 'none';
        document.getElementById('btnSpinner').style.display = 'inline';
        document.getElementById('submitBtn').disabled       = true;
    });
</script>
@endsection