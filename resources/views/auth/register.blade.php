@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endpush

@section('content')
<main class="contedido-register">
    {{-- Fondo --}}
    <img src="https://s3.amazonaws.com/rtvc-assets-qa-sistemasenalcolombia.gov.co/noticias/unnamed_4_3.jpg" class="fondo" alt="fondo"> 

    {{-- Contenedor Principal: Ahora usa .register-card --}}
    <div class="register-card">
        <img src="/img/LOGOYESLOGAN.jpeg" alt="Logo-l" class="register-logo">
        <h1 class="register-title">Regístrate</h1>

        {{-- Mensajes de Errores y Formulario... --}}
        @if ($errors->any())
            <div class="alert alert-danger" style="color: #ff4d4d; margin-bottom: 15px; width: 100%; text-align: center; font-size: 0.9em;">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('register.submit') }}" method="POST" class="register-form-agro">
            @csrf
            
            {{-- Campos (usando clases de input y password-container que pueden ser comunes) --}}
            <p class="texto">Nombre Completo</p>
            <input type="text" placeholder="Juan Pérez" name="name" id="name" required value="{{ old('name') }}">
            
            <p class="texto">Correo</p>
            <input type="email" placeholder="juanito@gmail.com" name="email" id="email" required value="{{ old('email') }}">

            <p class="Contraseña">Contraseña</p>
            <div class="password-container">
                <input type="password" placeholder="********" name="password" id="password" class="contraseña" required>
                <span class="toggle-password" onclick="mostrarOcultar()">
                        <i class="fa-solid fa-eye"></i>
                    </span>
            </div>

            <p class="texto">Fecha de Nacimiento</p>
            <input type="date" name="birth_date" id="birth_date" required value="{{ old('birth_date') }}">

            {{-- Botón Registrarse --}}
            <div class="register-button-wrapper">
                <button type="submit" class="register-button">
                    Crear Cuenta
                </button>
            </div>
        </form>

        {{-- Link de Login --}}
        <p class="login-link">¿Ya tienes cuenta?
            <a href="{{ route('login') }}">Inicia sesión aquí</a>
        </p>
    </div>

    <script>
        function mostrarOcultar() {
            const passwordField = document.getElementById('password');
            const toggleIcon = document.querySelector('.toggle-password i'); // Selecciona el icono dentro del span
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash'); // Icono de ojo tachado (ocultar)
            } else {
                passwordField.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye'); // Icono de ojo (mostrar)
            }
        }
    </script>
</main>
    
@endsection