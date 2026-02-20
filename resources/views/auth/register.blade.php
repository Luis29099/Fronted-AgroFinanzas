@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endpush

@section('content')
<main class="contedido-register">
    <img src="https://s3.amazonaws.com/rtvc-assets-qa-sistemasenalcolombia.gov.co/noticias/unnamed_4_3.jpg" class="fondo" alt="fondo">

    <div class="register-card">
        <img src="/img/LOGOYESLOGAN.jpeg" alt="Logo" class="register-logo">
        <h1 class="register-title">Crear cuenta</h1>
        <p class="register-subtitle">Únete a AgroFinanzas y gestiona tu campo</p>

        @if ($errors->has('register_error'))
            <div class="alert-error">
                <i class="fa-solid fa-circle-exclamation"></i>
                {{ $errors->first('register_error') }}
            </div>
        @endif

        <form action="{{ route('register.submit') }}" method="POST" class="register-form-agro" id="registerForm">
            @csrf

            {{-- Nombre --}}
            <div class="field-group">
                <label for="name"><i class="fa-solid fa-user"></i> Nombre completo</label>
                <input type="text" name="name" id="name" placeholder="Juan Pérez"
                    value="{{ old('name') }}"
                    class="{{ $errors->has('name') ? 'input-error' : '' }}" required>
                @error('name')<span class="field-error">{{ $message }}</span>@enderror
            </div>

            {{-- Email --}}
            <div class="field-group">
                <label for="email"><i class="fa-solid fa-envelope"></i> Correo electrónico</label>
                <input type="email" name="email" id="email" placeholder="correo@ejemplo.com"
                    value="{{ old('email') }}"
                    class="{{ $errors->has('email') ? 'input-error' : '' }}" required>
                @error('email')<span class="field-error">{{ $message }}</span>@enderror
            </div>

            {{-- Teléfono --}}
            <div class="field-group">
                <label for="phone"><i class="fa-solid fa-phone"></i> Teléfono <span class="optional">(opcional)</span></label>
                <input type="tel" name="phone" id="phone" placeholder="300 123 4567"
                    value="{{ old('phone') }}"
                    class="{{ $errors->has('phone') ? 'input-error' : '' }}">
                @error('phone')<span class="field-error">{{ $message }}</span>@enderror
            </div>

            {{-- Contraseña --}}
            <div class="field-group">
                <label for="password"><i class="fa-solid fa-lock"></i> Contraseña</label>
                <div class="password-container">
                    <input type="password" name="password" id="password"
                        placeholder="Mínimo 8 caracteres"
                        class="{{ $errors->has('password') ? 'input-error' : '' }}"
                        required oninput="checkPasswordStrength(this.value)">
                    <span class="toggle-password" onclick="togglePass('password', this)">
                        <i class="fa-solid fa-eye"></i>
                    </span>
                </div>
                <div class="strength-bar-wrapper" id="strengthWrapper" style="display:none">
                    <div class="strength-bar"><div class="strength-fill" id="strengthFill"></div></div>
                    <span class="strength-label" id="strengthLabel"></span>
                </div>
                @error('password')<span class="field-error">{{ $message }}</span>@enderror
            </div>

            {{-- Confirmar contraseña --}}
            <div class="field-group">
                <label for="password_confirmation"><i class="fa-solid fa-lock"></i> Confirmar contraseña</label>
                <div class="password-container">
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        placeholder="Repite tu contraseña" required>
                    <span class="toggle-password" onclick="togglePass('password_confirmation', this)">
                        <i class="fa-solid fa-eye"></i>
                    </span>
                </div>
                <span class="field-error" id="matchError" style="display:none">Las contraseñas no coinciden.</span>
            </div>

            {{-- Fecha de nacimiento --}}
            <div class="field-group">
                <label for="birth_date"><i class="fa-solid fa-calendar"></i> Fecha de nacimiento</label>
                <input type="date" name="birth_date" id="birth_date"
                    value="{{ old('birth_date') }}"
                    max="{{ date('Y-m-d', strtotime('-1 day')) }}"
                    class="{{ $errors->has('birth_date') ? 'input-error' : '' }}" required>
                @error('birth_date')<span class="field-error">{{ $message }}</span>@enderror
            </div>

            {{-- Fila: Género + Años de experiencia --}}
            <div class="field-row">
                <div class="field-group">
                    <label for="gender"><i class="fa-solid fa-venus-mars"></i> Género <span class="optional">(opcional)</span></label>
                    <select name="gender" id="gender" class="field-select {{ $errors->has('gender') ? 'input-error' : '' }}">
                        <option value="">Seleccionar...</option>
                        <option value="male"   {{ old('gender') == 'male'   ? 'selected' : '' }}>Masculino</option>
                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Femenino</option>
                        <option value="other"  {{ old('gender') == 'other'  ? 'selected' : '' }}>Otro</option>
                    </select>
                    @error('gender')<span class="field-error">{{ $message }}</span>@enderror
                </div>

                <div class="field-group">
                    <label for="experience_years"><i class="fa-solid fa-seedling"></i> Años en el campo <span class="optional">(opcional)</span></label>
                    <input type="number" name="experience_years" id="experience_years"
                        placeholder="Ej: 5" min="0" max="70"
                        value="{{ old('experience_years') }}"
                        class="{{ $errors->has('experience_years') ? 'input-error' : '' }}">
                    @error('experience_years')<span class="field-error">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="register-button-wrapper">
                <button type="submit" class="register-button" id="submitBtn">
                    <span id="btnText">Crear Cuenta</span>
                    <span id="btnSpinner" style="display:none">
                        <i class="fa-solid fa-spinner fa-spin"></i> Creando...
                    </span>
                </button>
            </div>
        </form>

        <p class="login-link">¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión aquí</a></p>
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

    function checkPasswordStrength(value) {
        const wrapper = document.getElementById('strengthWrapper');
        const fill    = document.getElementById('strengthFill');
        const label   = document.getElementById('strengthLabel');
        if (!value) { wrapper.style.display = 'none'; return; }
        wrapper.style.display = 'flex';
        let score = 0;
        if (value.length >= 8)           score++;
        if (/[A-Z]/.test(value))         score++;
        if (/[0-9]/.test(value))         score++;
        if (/[^A-Za-z0-9]/.test(value))  score++;
        const levels = [
            { pct: '25%',  color: '#e74c3c', text: 'Muy débil' },
            { pct: '50%',  color: '#e67e22', text: 'Débil'      },
            { pct: '75%',  color: '#f1c40f', text: 'Moderada'   },
            { pct: '100%', color: '#2ecc71', text: 'Fuerte'     },
        ];
        const lvl = levels[score - 1] || levels[0];
        fill.style.width      = lvl.pct;
        fill.style.background = lvl.color;
        label.textContent     = lvl.text;
        label.style.color     = lvl.color;
    }

    document.getElementById('password_confirmation').addEventListener('input', function () {
        const pass  = document.getElementById('password').value;
        const error = document.getElementById('matchError');
        error.style.display = (this.value && pass !== this.value) ? 'block' : 'none';
    });

    document.getElementById('registerForm').addEventListener('submit', function (e) {
        const pass    = document.getElementById('password').value;
        const confirm = document.getElementById('password_confirmation').value;
        if (pass !== confirm) {
            e.preventDefault();
            document.getElementById('matchError').style.display = 'block';
            return;
        }
        document.getElementById('btnText').style.display    = 'none';
        document.getElementById('btnSpinner').style.display = 'inline';
        document.getElementById('submitBtn').disabled       = true;
    });
</script>
@endsection