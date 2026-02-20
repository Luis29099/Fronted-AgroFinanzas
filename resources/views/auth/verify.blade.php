@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/verify.css') }}">
@endpush

@section('content')
<main class="verify-bg">
    <img src="{{ asset('img/paramo.jpg') }}" class="fondo" alt="fondo">

    <div class="verify-card">
        <div class="verify-icon">
            <i class="fa-solid fa-envelope-open-text"></i>
        </div>

        <h1 class="verify-title">Verifica tu correo</h1>
        <p class="verify-subtitle">
            Ingresa el código de 6 dígitos que enviamos a<br>
            <strong>{{ $email }}</strong>
        </p>

        {{-- Alertas --}}
        @if (session('resend_success'))
            <div class="alert-success">
                <i class="fa-solid fa-circle-check"></i>
                {{ session('resend_success') }}
            </div>
        @endif

        @if ($errors->has('verify_error'))
            <div class="alert-error">
                <i class="fa-solid fa-circle-exclamation"></i>
                {{ $errors->first('verify_error') }}
            </div>
        @endif

        {{-- Formulario de verificación --}}
        <form action="{{ route('verify.submit') }}" method="POST" id="verifyForm">
            @csrf
            <input type="hidden" name="user_id" value="{{ $userId }}">
            <input type="hidden" name="code"    id="fullCode">

            {{-- 6 inputs separados para cada dígito --}}
            <div class="code-inputs" id="codeInputs">
                @for ($i = 0; $i < 6; $i++)
                    <input type="text"
                           class="digit-input"
                           maxlength="1"
                           inputmode="numeric"
                           pattern="[0-9]"
                           autocomplete="off"
                           data-index="{{ $i }}">
                @endfor
            </div>

            <button type="submit" class="verify-btn" id="submitBtn">
                <span id="btnText"><i class="fa-solid fa-shield-check"></i> Verificar cuenta</span>
                <span id="btnSpinner" style="display:none">
                    <i class="fa-solid fa-spinner fa-spin"></i> Verificando...
                </span>
            </button>
        </form>

        {{-- Temporizador --}}
        <div class="timer-section" id="timerSection">
            <p class="timer-text">
                El código expira en <span id="timerDisplay" class="timer-count">15:00</span>
            </p>
        </div>

        {{-- Reenviar --}}
        <div class="resend-section">
            <p class="resend-text">¿No llegó el correo o expiró?</p>
            <form action="{{ route('verify.resend') }}" method="POST" id="resendForm">
                @csrf
                <input type="hidden" name="user_id" value="{{ $userId }}">
                <button type="submit" class="resend-btn" id="resendBtn">
                    <i class="fa-solid fa-rotate-right"></i> Reenviar código
                </button>
            </form>
        </div>

        <p class="back-link">
            <a href="{{ route('register') }}">
                <i class="fa-solid fa-arrow-left"></i> Volver al registro
            </a>
        </p>
    </div>
</main>

<script>
// ── Manejo de inputs de 6 dígitos ─────────────────────────────
const inputs = document.querySelectorAll('.digit-input');

inputs.forEach((input, index) => {
    // Solo números
    input.addEventListener('keypress', (e) => {
        if (!/[0-9]/.test(e.key)) e.preventDefault();
    });

    input.addEventListener('input', () => {
        // Limpiar y dejar solo el último carácter
        input.value = input.value.replace(/[^0-9]/g, '').slice(-1);

        if (input.value && index < inputs.length - 1) {
            inputs[index + 1].focus();
        }

        checkAllFilled();
    });

    input.addEventListener('keydown', (e) => {
        if (e.key === 'Backspace' && !input.value && index > 0) {
            inputs[index - 1].focus();
        }
    });

    // Pegar código completo
    input.addEventListener('paste', (e) => {
        e.preventDefault();
        const pasted = e.clipboardData.getData('text').replace(/[^0-9]/g, '');
        if (pasted.length === 6) {
            inputs.forEach((inp, i) => {
                inp.value = pasted[i] || '';
            });
            inputs[5].focus();
            checkAllFilled();
        }
    });
});

function checkAllFilled() {
    const allFilled = [...inputs].every(i => i.value !== '');
    document.getElementById('submitBtn').disabled = !allFilled;
    if (allFilled) {
        document.getElementById('submitBtn').classList.add('ready');
    } else {
        document.getElementById('submitBtn').classList.remove('ready');
    }
}

// Desactivar botón hasta completar
document.getElementById('submitBtn').disabled = true;

// Al enviar, construir el código completo
document.getElementById('verifyForm').addEventListener('submit', function () {
    const code = [...inputs].map(i => i.value).join('');
    document.getElementById('fullCode').value = code;

    document.getElementById('btnText').style.display    = 'none';
    document.getElementById('btnSpinner').style.display = 'inline';
    document.getElementById('submitBtn').disabled        = true;
});

// ── Temporizador de 15 minutos ────────────────────────────────
let timeLeft = 15 * 60; // 900 segundos
const timerDisplay = document.getElementById('timerDisplay');
const resendBtn    = document.getElementById('resendBtn');

const countdown = setInterval(() => {
    timeLeft--;
    const min = String(Math.floor(timeLeft / 60)).padStart(2, '0');
    const sec = String(timeLeft % 60).padStart(2, '0');
    timerDisplay.textContent = `${min}:${sec}`;

    if (timeLeft <= 60) {
        timerDisplay.style.color = '#e74c3c';
    }

    if (timeLeft <= 0) {
        clearInterval(countdown);
        timerDisplay.textContent = '00:00';
        timerDisplay.style.color = '#e74c3c';
        document.getElementById('timerSection').innerHTML =
            '<p class="timer-expired">⏱ El código expiró. Reenvía uno nuevo.</p>';
    }
}, 1000);

// ── Spinner en reenvío ────────────────────────────────────────
document.getElementById('resendForm').addEventListener('submit', function () {
    resendBtn.disabled     = true;
    resendBtn.innerHTML    = '<i class="fa-solid fa-spinner fa-spin"></i> Enviando...';
});

// Focus en el primer input al cargar
inputs[0].focus();
</script>
@endsection