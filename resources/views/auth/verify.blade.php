{{-- @extends('layouts.app')

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

        
        <form action="{{ route('verify.submit') }}" method="POST" id="verifyForm">
            @csrf
            <input type="hidden" name="user_id" value="{{ $userId }}">
            <input type="hidden" name="code"    id="fullCode">

           
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

        
        <div class="timer-section" id="timerSection">
            <p class="timer-text">
                El código expira en <span id="timerDisplay" class="timer-count">15:00</span>
            </p>
        </div>

      
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

const inputs = document.querySelectorAll('.digit-input');

inputs.forEach((input, index) => {
    
    input.addEventListener('keypress', (e) => {
        if (!/[0-9]/.test(e.key)) e.preventDefault();
    });

    input.addEventListener('input', () => {
      
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

document.getElementById('submitBtn').disabled = true;

document.getElementById('verifyForm').addEventListener('submit', function () {
    const code = [...inputs].map(i => i.value).join('');
    document.getElementById('fullCode').value = code;

    document.getElementById('btnText').style.display    = 'none';
    document.getElementById('btnSpinner').style.display = 'inline';
    document.getElementById('submitBtn').disabled        = true;
});


let timeLeft = 15 * 60; 
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

document.getElementById('resendForm').addEventListener('submit', function () {
    resendBtn.disabled     = true;
    resendBtn.innerHTML    = '<i class="fa-solid fa-spinner fa-spin"></i> Enviando...';
});

inputs[0].focus();
</script>
@endsection --}}
@extends('layouts.app')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
:root {
    --green:       #8ac926;
    --green-dim:   rgba(138,201,38,0.12);
    --green-glow:  rgba(138,201,38,0.35);
    --dark:        #050905;
    --dark-card:   #0c0f0c;
    --dark-input:  rgba(255,255,255,0.04);
    --border:      rgba(138,201,38,0.18);
    --muted:       rgba(255,255,255,0.35);
}

/* ── RESET ── */
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

/* ── PAGE ── */
.verify-page {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px 20px;
    position: relative;
    overflow: hidden;  /* recorta el bg dentro del contenedor */
    background: var(--dark);
    font-family: 'Montserrat', sans-serif;
}

/* ── FONDO IMAGEN ── */
.verify-bg-img {
    position: absolute;
    inset: 0;
    width: 100%; height: 100%;
    object-fit: cover;
    opacity: 0.06;
    filter: blur(4px) saturate(1.3);
    z-index: 0;
    pointer-events: none;
}

/* ── GRADIENTES DE FONDO ── */
.verify-bg-glow {
    position: absolute;
    inset: 0;
    z-index: 0;
    pointer-events: none;
    background:
        radial-gradient(ellipse 60% 50% at 15% 50%, rgba(138,201,38,0.06) 0%, transparent 70%),
        radial-gradient(ellipse 50% 60% at 85% 20%, rgba(138,201,38,0.04) 0%, transparent 70%),
        linear-gradient(160deg, #050905 0%, #080d08 60%, #050905 100%);
}

/* Partículas decorativas */
.verify-particles {
    position: absolute;
    inset: 0;
    z-index: 0;
    pointer-events: none;
    overflow: hidden;
}
.verify-particles::before,
.verify-particles::after {
    content: '';
    position: absolute;
    border-radius: 50%;
    border: 1px solid rgba(138,201,38,0.06);
}
.verify-particles::before {
    width: 600px; height: 600px;
    top: -180px; left: -180px;
    animation: rotateSlow 40s linear infinite;
}
.verify-particles::after {
    width: 400px; height: 400px;
    bottom: -120px; right: -120px;
    animation: rotateSlow 30s linear infinite reverse;
}
@keyframes rotateSlow {
    from { transform: rotate(0deg); }
    to   { transform: rotate(360deg); }
}

/* ── TARJETA ── */
.verify-card {
    position: relative;
    z-index: 1;
    width: 100%;
    max-width: 480px;
    background: var(--dark-card);
    border: 1px solid var(--border);
    border-radius: 24px;
    padding: 52px 44px 44px;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    box-shadow:
        0 40px 80px rgba(0,0,0,0.55),
        0 0 0 1px rgba(255,255,255,0.03),
        inset 0 1px 0 rgba(255,255,255,0.05);
    animation: cardIn 0.7s cubic-bezier(0.34,1.56,0.64,1) both;
}

@keyframes cardIn {
    from { opacity: 0; transform: translateY(30px) scale(0.97); }
    to   { opacity: 1; transform: translateY(0) scale(1); }
}

/* Línea decorativa superior */
.verify-card::before {
    content: '';
    position: absolute;
    top: 0; left: 50%;
    transform: translateX(-50%);
    width: 60%;
    height: 1px;
    background: linear-gradient(90deg, transparent, var(--green), transparent);
    opacity: 0.6;
}

/* ── ÍCONO ── */
.verify-icon-wrap {
    position: relative;
    margin-bottom: 28px;
    animation: iconIn 0.6s 0.2s cubic-bezier(0.34,1.56,0.64,1) both;
}
@keyframes iconIn {
    from { opacity: 0; transform: scale(0.6); }
    to   { opacity: 1; transform: scale(1); }
}

.verify-icon-ring {
    width: 86px; height: 86px;
    border-radius: 50%;
    border: 1.5px solid rgba(138,201,38,0.3);
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(138,201,38,0.06);
    position: relative;
    animation: iconPulse 3s ease-in-out infinite;
}
@keyframes iconPulse {
    0%,100% { box-shadow: 0 0 0 0 rgba(138,201,38,0.12), 0 0 20px rgba(138,201,38,0.08); }
    50%      { box-shadow: 0 0 0 14px rgba(138,201,38,0), 0 0 40px rgba(138,201,38,0.15); }
}

.verify-icon-ring i {
    font-size: 2rem;
    color: var(--green);
}

/* Punto orbitante */
.verify-icon-dot {
    position: absolute;
    top: 6px; right: 6px;
    width: 10px; height: 10px;
    border-radius: 50%;
    background: var(--green);
    box-shadow: 0 0 8px var(--green);
    animation: dotBlink 2s ease-in-out infinite;
}
@keyframes dotBlink {
    0%,100% { opacity: 1; transform: scale(1); }
    50%      { opacity: 0.4; transform: scale(0.7); }
}

/* ── TEXTOS ── */
.verify-eyebrow {
    font-size: 0.65rem;
    font-weight: 600;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: var(--green);
    margin-bottom: 10px;
    animation: fadeUp 0.5s 0.3s ease both;
}

.verify-title {
    font-family: 'Cormorant Garamond', serif;
    font-size: 2.2rem;
    font-weight: 600;
    color: #fff;
    line-height: 1.1;
    margin-bottom: 12px;
    animation: fadeUp 0.5s 0.4s ease both;
}

.verify-subtitle {
    font-size: 0.82rem;
    color: var(--muted);
    line-height: 1.7;
    margin-bottom: 32px;
    animation: fadeUp 0.5s 0.5s ease both;
}

.verify-subtitle strong {
    color: rgba(255,255,255,0.75);
    font-weight: 600;
    display: block;
    margin-top: 4px;
    font-size: 0.88rem;
}

@keyframes fadeUp {
    from { opacity: 0; transform: translateY(12px); }
    to   { opacity: 1; transform: translateY(0); }
}

/* ── ALERTAS ── */
.v-alert {
    width: 100%;
    border-radius: 10px;
    padding: 11px 14px;
    font-size: 0.8rem;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 8px;
    text-align: left;
    animation: fadeUp 0.3s ease both;
}
.v-alert.error {
    background: rgba(231,76,60,0.08);
    border: 1px solid rgba(231,76,60,0.25);
    color: #e74c3c;
}
.v-alert.success {
    background: rgba(46,204,113,0.08);
    border: 1px solid rgba(46,204,113,0.25);
    color: #2ecc71;
}

/* ── INPUTS DE CÓDIGO ── */
.code-inputs {
    display: flex;
    gap: 10px;
    justify-content: center;
    margin-bottom: 28px;
}

.digit-input {
    width: 54px;
    height: 64px;
    text-align: center;
    font-size: 1.6rem;
    font-weight: 700;
    background: var(--dark-input);
    border: 1.5px solid rgba(255,255,255,0.08);
    border-bottom: 2px solid rgba(138,201,38,0.25);
    border-radius: 10px;
    color: var(--green);
    outline: none;
    transition: all 0.2s ease;
    font-family: 'Courier New', monospace;
    caret-color: var(--green);
    opacity: 0;
    transform: translateY(10px);
}

/* Entrada escalonada de cada dígito */
.digit-input:nth-child(1) { animation: digitIn 0.4s 0.5s ease forwards; }
.digit-input:nth-child(2) { animation: digitIn 0.4s 0.58s ease forwards; }
.digit-input:nth-child(3) { animation: digitIn 0.4s 0.66s ease forwards; }
.digit-input:nth-child(4) { animation: digitIn 0.4s 0.74s ease forwards; }
.digit-input:nth-child(5) { animation: digitIn 0.4s 0.82s ease forwards; }
.digit-input:nth-child(6) { animation: digitIn 0.4s 0.90s ease forwards; }

@keyframes digitIn {
    to { opacity: 1; transform: translateY(0); }
}

.digit-input:focus {
    border-color: var(--green);
    border-bottom-color: var(--green);
    background: rgba(138,201,38,0.05);
    box-shadow: 0 0 0 3px rgba(138,201,38,0.12), 0 6px 20px rgba(138,201,38,0.06);
    transform: translateY(-2px) scale(1.04);
}

.digit-input.filled {
    border-bottom-color: var(--green);
    background: rgba(138,201,38,0.04);
}

.digit-input.error-shake {
    animation: shake 0.4s ease;
    border-color: rgba(231,76,60,0.6);
    border-bottom-color: #e74c3c;
}
@keyframes shake {
    0%,100% { transform: translateX(0); }
    20%,60% { transform: translateX(-5px); }
    40%,80% { transform: translateX(5px); }
}

/* ── BOTÓN VERIFICAR ── */
.verify-btn {
    width: 100%;
    padding: 14px;
    background: linear-gradient(135deg, #6fa01e 0%, #8ac926 50%, #a8e050 100%);
    background-size: 200% 100%;
    background-position: right;
    border: none;
    border-radius: 10px;
    font-family: 'Montserrat', sans-serif;
    font-size: 0.8rem;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: #060c06;
    cursor: pointer;
    transition: all 0.4s ease;
    box-shadow: 0 4px 20px rgba(138,201,38,0.2);
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    animation: fadeUp 0.5s 0.9s ease both;
}
.verify-btn:hover:not(:disabled) {
    background-position: left;
    transform: translateY(-2px);
    box-shadow: 0 8px 30px rgba(138,201,38,0.38);
}
.verify-btn:disabled {
    opacity: 0.4;
    cursor: not-allowed;
    transform: none;
    box-shadow: none;
}
.verify-btn.ready {
    animation: btnReady 1.8s ease-in-out infinite;
}
@keyframes btnReady {
    0%,100% { box-shadow: 0 4px 20px rgba(138,201,38,0.2); }
    50%      { box-shadow: 0 6px 32px rgba(138,201,38,0.55); }
}

/* ── SEPARADOR ── */
.verify-sep {
    width: 100%;
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 20px;
    animation: fadeUp 0.5s 1s ease both;
}
.verify-sep-line { flex: 1; height: 1px; background: rgba(255,255,255,0.06); }
.verify-sep-dot  { width: 4px; height: 4px; border-radius: 50%; background: rgba(255,255,255,0.1); }

/* ── TIMER ── */
.verify-timer {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 20px;
    font-size: 0.78rem;
    color: rgba(255,255,255,0.2);
    animation: fadeUp 0.5s 1.05s ease both;
}
.timer-badge {
    background: rgba(138,201,38,0.08);
    border: 1px solid rgba(138,201,38,0.15);
    border-radius: 6px;
    padding: 4px 10px;
    font-family: 'Courier New', monospace;
    font-size: 0.85rem;
    font-weight: 700;
    color: var(--green);
    letter-spacing: 1px;
    transition: color 0.3s, background 0.3s;
}
.timer-badge.expiring {
    color: #e74c3c;
    background: rgba(231,76,60,0.08);
    border-color: rgba(231,76,60,0.2);
}
.timer-expired-text {
    font-size: 0.78rem;
    color: #e74c3c;
    font-weight: 500;
}

/* ── REENVIAR ── */
.resend-section {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
    margin-bottom: 20px;
    animation: fadeUp 0.5s 1.1s ease both;
}

.resend-label {
    font-size: 0.76rem;
    color: rgba(255,255,255,0.2);
}

.resend-btn {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 9px 22px;
    border: 1px solid rgba(138,201,38,0.22);
    border-radius: 999px;
    background: transparent;
    color: var(--green);
    font-family: 'Montserrat', sans-serif;
    font-size: 0.76rem;
    font-weight: 600;
    letter-spacing: 1px;
    cursor: pointer;
    transition: all 0.25s ease;
}
.resend-btn:hover:not(:disabled) {
    background: rgba(138,201,38,0.07);
    border-color: var(--green);
    box-shadow: 0 0 16px rgba(138,201,38,0.1);
    transform: translateY(-1px);
}
.resend-btn:disabled { opacity: 0.35; cursor: not-allowed; }

/* ── VOLVER ── */
.back-link {
    animation: fadeUp 0.5s 1.15s ease both;
}
.back-link a {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 0.75rem;
    color: rgba(255,255,255,0.18);
    text-decoration: none;
    transition: color 0.2s;
    letter-spacing: 0.3px;
}
.back-link a:hover { color: rgba(255,255,255,0.5); }

/* ── RESPONSIVE ── */
@media (max-width: 520px) {
    .verify-card { padding: 36px 20px 32px; }
    .digit-input { width: 44px; height: 54px; font-size: 1.3rem; }
    .code-inputs { gap: 7px; }
    .verify-title { font-size: 1.8rem; }
}
</style>
@endpush

@section('content')
<div class="verify-page">

    <img src="{{ asset('img/paramo.jpg') }}" class="verify-bg-img" alt="fondo">
    <div class="verify-bg-glow"></div>
    <div class="verify-particles"></div>

    <div class="verify-card">

        {{-- Ícono --}}
        <div class="verify-icon-wrap">
            <div class="verify-icon-ring">
                <i class="fas fa-envelope-open-text"></i>
                <span class="verify-icon-dot"></span>
            </div>
        </div>

        {{-- Textos --}}
        <p class="verify-eyebrow">Paso final</p>
        <h1 class="verify-title">Verifica tu correo</h1>
        <p class="verify-subtitle">
            Ingresa el código de 6 dígitos que enviamos a
            <strong>{{ $email }}</strong>
        </p>

        {{-- Alertas --}}
        @if (session('resend_success'))
            <div class="v-alert success">
                <i class="fas fa-circle-check"></i>
                {{ session('resend_success') }}
            </div>
        @endif

        @if ($errors->has('verify_error'))
            <div class="v-alert error">
                <i class="fas fa-circle-exclamation"></i>
                {{ $errors->first('verify_error') }}
            </div>
        @endif

        {{-- Formulario de verificación --}}
        <form action="{{ route('verify.submit') }}" method="POST" id="verifyForm" style="width:100%">
            @csrf
            <input type="hidden" name="user_id" value="{{ $userId }}">
            <input type="hidden" name="code" id="fullCode">

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

            <button type="submit" class="verify-btn" id="submitBtn" disabled>
                <span id="btnText"><i class="fas fa-shield-check"></i> Verificar cuenta</span>
                <span id="btnSpinner" style="display:none">
                    <i class="fas fa-spinner fa-spin"></i> Verificando...
                </span>
            </button>
        </form>

        {{-- Separador --}}
        <div class="verify-sep">
            <div class="verify-sep-line"></div>
            <div class="verify-sep-dot"></div>
            <div class="verify-sep-line"></div>
        </div>

        {{-- Timer --}}
        <div class="verify-timer" id="timerSection">
            <span>Expira en</span>
            <span class="timer-badge" id="timerDisplay">15:00</span>
        </div>

        {{-- Reenviar --}}
        <div class="resend-section">
            <p class="resend-label">¿No llegó el correo?</p>
            <form action="{{ route('verify.resend') }}" method="POST" id="resendForm">
                @csrf
                <input type="hidden" name="user_id" value="{{ $userId }}">
                <button type="submit" class="resend-btn" id="resendBtn">
                    <i class="fas fa-rotate-right"></i> Reenviar código
                </button>
            </form>
        </div>

        {{-- Volver --}}
        <div class="back-link">
            <a href="{{ route('register') }}">
                <i class="fas fa-arrow-left"></i> Volver al registro
            </a>
        </div>

    </div>
</div>

<script>
// ── Inputs de 6 dígitos ────────────────────────────────────────
const inputs = document.querySelectorAll('.digit-input');

inputs.forEach((input, index) => {
    input.addEventListener('keypress', e => {
        if (!/[0-9]/.test(e.key)) e.preventDefault();
    });

    input.addEventListener('input', () => {
        input.value = input.value.replace(/[^0-9]/g, '').slice(-1);
        input.classList.toggle('filled', input.value !== '');
        if (input.value && index < inputs.length - 1) inputs[index + 1].focus();
        checkAllFilled();
    });

    input.addEventListener('keydown', e => {
        if (e.key === 'Backspace') {
            if (!input.value && index > 0) {
                inputs[index - 1].value = '';
                inputs[index - 1].classList.remove('filled');
                inputs[index - 1].focus();
            } else {
                input.classList.remove('filled');
            }
            checkAllFilled();
        }
    });

    input.addEventListener('paste', e => {
        e.preventDefault();
        const pasted = e.clipboardData.getData('text').replace(/[^0-9]/g, '');
        if (pasted.length >= 6) {
            inputs.forEach((inp, i) => {
                inp.value = pasted[i] || '';
                inp.classList.toggle('filled', !!inp.value);
            });
            inputs[5].focus();
            checkAllFilled();
        }
    });
});

function checkAllFilled() {
    const all = [...inputs].every(i => i.value !== '');
    const btn = document.getElementById('submitBtn');
    btn.disabled = !all;
    all ? btn.classList.add('ready') : btn.classList.remove('ready');
}

// ── Submit ─────────────────────────────────────────────────────
document.getElementById('verifyForm').addEventListener('submit', function () {
    const code = [...inputs].map(i => i.value).join('');
    document.getElementById('fullCode').value = code;
    document.getElementById('btnText').style.display    = 'none';
    document.getElementById('btnSpinner').style.display = 'inline-flex';
    document.getElementById('submitBtn').disabled = true;
});

// ── Countdown ──────────────────────────────────────────────────
let timeLeft = 15 * 60;
const timerDisplay = document.getElementById('timerDisplay');
const timerSection = document.getElementById('timerSection');

const countdown = setInterval(() => {
    timeLeft--;
    const m = String(Math.floor(timeLeft / 60)).padStart(2, '0');
    const s = String(timeLeft % 60).padStart(2, '0');
    timerDisplay.textContent = m + ':' + s;

    if (timeLeft <= 60)  timerDisplay.classList.add('expiring');
    if (timeLeft <= 0) {
        clearInterval(countdown);
        timerSection.innerHTML = '<span class="timer-expired-text"><i class="fas fa-clock"></i> El código expiró. Reenvía uno nuevo.</span>';
    }
}, 1000);

// ── Reenviar ───────────────────────────────────────────────────
document.getElementById('resendForm').addEventListener('submit', function () {
    const btn = document.getElementById('resendBtn');
    btn.disabled = true;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enviando...';
});

// ── Focus inicial (después de animación) ───────────────────────
setTimeout(() => inputs[0].focus(), 950);
</script>
@endsection