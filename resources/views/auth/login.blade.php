@extends('layouts.app')

@section('content')
<main class="contenido_login">
    <div class="login-wrapper"> 
        
        {{-- Fondo (ajusta la ruta de la imagen si es necesario) --}}
        <img src="{{ asset('/img/paramo.jpg') }}" class="fondo" alt="fondo"> {{-- https://www.utb.edu.co/wp-content/uploads/2023/05/Nevado_del_Ruiz.jpg--}}
        {{-- Contenedor Principal: El formulario en sí --}}

            {{-- Contenedor Principal: Se adapta la lógica del formulario de Laravel --}}
    <div class="apartado">
        <img src="/img/LOGOYESLOGAN.jpeg" alt="Logo-l" class="Logo-l">
        <h1 class="titulo-inicio">Iniciar Sesión</h1>

        {{-- Mensajes de Errores y Éxito --}}
        @if ($errors->any())
            <div class="alert alert-danger" style="color: #ff4d4d; margin-bottom: 15px; width: 100%; text-align: center; font-size: 0.9em;">
                {{ $errors->first() }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success" style="color: #38ef7d; margin-bottom: 15px; width: 100%; text-align: center; font-size: 0.9em;">
                {{ session('success') }}
            </div>
        @endif

        {{-- Formulario de Laravel --}}
        <form action="{{ route('login.submit') }}" method="POST" class="login-form-agro">
            @csrf

            {{-- Campo Correo Electrónico --}}
            <p class="texto">Correo</p>
            <input type="email" placeholder="juanito@gmail.com" name="email" id="email" class="Correo" required value="{{ old('email') }}">

            {{-- Campo Contraseña --}}
            <p class="Contraseña">Contraseña</p>
            <div class="password-container">
                <input type="password" placeholder="********" name="password" id="password" class="contraseña" required>
                <span class="toggle-password" onclick="mostrarOcultar()">
                        <i class="fa-solid fa-eye"></i>
                    </span>
            </div>

            {{-- Recordar (opcional en Laravel, pero se mantiene el diseño) --}}
            <div class="recordar">
                <input type="checkbox" id="recordar" name="remember"> {{-- Se añade el atributo name="remember" para Laravel --}}
                <label for="recordar">Recordar</label>
            </div>

            {{-- Botón Iniciar Sesión --}}
            <div class="contenedor-boton">
                <button type="submit" class="boton">
                    Ingresar
                </button>
            </div>
        </form>

        {{-- Link de Registro --}}
        <p class="registro-link">¿No tienes cuenta?
            <a href="{{ route('register') }}">Regístrate aquí</a>
        </p>
    </div>


        </div>

    {{-- Script para mostrar/ocultar contraseña (JS puro, lo pones en tu app.js o directo en la vista si no hay otra opción) --}}
     {{-- Script para mostrar/ocultar contraseña (Ahora usa la clase 'fa-eye' o 'fa-eye-slash') --}}
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