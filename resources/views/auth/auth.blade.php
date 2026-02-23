@extends('layouts.app')

@push('styles')
<style>
@import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap');

/* ── RESET & BASE ── */
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

.auth-page {
    min-height: 100vh;
    display: flex;
    align-items: flex-start;
    justify-content: center;
    padding: 80px 20px 60px;
    position: relative;        /* contiene el .auth-bg absolute */
    overflow: hidden;          /* recorta el bg sin afectar el footer */
    font-family: 'Montserrat', sans-serif;
    background: #050805;
}

/* ── FONDO ── */
.auth-bg {
    position: absolute;
    inset: 0;
    z-index: 0;
    pointer-events: none;
}
.auth-bg img {
    width: 100%; height: 100%;
    object-fit: cover;
    opacity: 0.08;
    filter: blur(3px) saturate(1.4);
}
.auth-bg::after {
    content: '';
    position: absolute;
    inset: 0;
    background:
        radial-gradient(ellipse 80% 60% at 20% 50%, rgba(138,201,38,0.07) 0%, transparent 70%),
        radial-gradient(ellipse 60% 80% at 80% 30%, rgba(138,201,38,0.04) 0%, transparent 60%),
        linear-gradient(135deg, #050805 0%, #0a110a 50%, #050805 100%);
}

/* Líneas decorativas */
.auth-lines {
    position: absolute;
    inset: 0;
    z-index: 0;
    pointer-events: none;
    overflow: hidden;
}
.auth-lines::before,
.auth-lines::after {
    content: '';
    position: absolute;
    border: 1px solid rgba(138,201,38,0.06);
    border-radius: 50%;
}
.auth-lines::before {
    width: 700px; height: 700px;
    top: -200px; left: -200px;
}
.auth-lines::after {
    width: 500px; height: 500px;
    bottom: -150px; right: -100px;
}

/* ── CONTENEDOR PRINCIPAL ── */
.auth-wrapper {
    position: relative;
    z-index: 1;
    width: 100%;
    max-width: 980px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    border-radius: 24px;
    overflow: visible;
    box-shadow:
        0 40px 80px rgba(0,0,0,0.6),
        0 0 0 1px rgba(138,201,38,0.12),
        inset 0 0 0 1px rgba(255,255,255,0.03);
}

/* ── PANEL IZQUIERDO (decorativo) ── */
.auth-panel {
    position: relative;
    background: linear-gradient(160deg, #0d1a0d 0%, #111e10 40%, #0a130a 100%);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 60px 40px;
    overflow: hidden;
    border-radius: 24px 0 0 24px;
    transition: all 0.8s cubic-bezier(0.76, 0, 0.24, 1);
}

.auth-panel::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse 120% 100% at 50% 110%, rgba(138,201,38,0.18) 0%, transparent 65%);
    pointer-events: none;
}

/* Ornamento circular */
.panel-ornament {
    position: absolute;
    width: 320px; height: 320px;
    border-radius: 50%;
    border: 1px solid rgba(138,201,38,0.08);
    top: 50%; left: 50%;
    transform: translate(-50%, -50%);
}
.panel-ornament::before {
    content: '';
    position: absolute;
    inset: 30px;
    border-radius: 50%;
    border: 1px solid rgba(138,201,38,0.05);
}
.panel-ornament::after {
    content: '';
    position: absolute;
    inset: 60px;
    border-radius: 50%;
    border: 1px solid rgba(138,201,38,0.04);
}

.panel-logo {
    width: 72px; height: 72px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid rgba(138,201,38,0.5);
    box-shadow:
        0 0 0 6px rgba(138,201,38,0.06),
        0 0 30px rgba(138,201,38,0.2);
    position: relative;
    z-index: 1;
    margin-bottom: 28px;
}

.panel-title {
    font-family: 'Cormorant Garamond', serif;
    font-size: 2.8rem;
    font-weight: 300;
    color: #fff;
    text-align: center;
    line-height: 1.1;
    letter-spacing: -0.5px;
    position: relative;
    z-index: 1;
}

.panel-title em {
    font-style: italic;
    color: #8ac926;
    display: block;
}

.panel-sub {
    font-size: 0.75rem;
    font-weight: 400;
    color: rgba(255,255,255,0.35);
    text-align: center;
    letter-spacing: 2.5px;
    text-transform: uppercase;
    margin-top: 14px;
    position: relative;
    z-index: 1;
}

.panel-divider {
    width: 40px;
    height: 1px;
    background: linear-gradient(90deg, transparent, #8ac926, transparent);
    margin: 20px auto;
    position: relative;
    z-index: 1;
}

.panel-cta {
    position: relative;
    z-index: 1;
    margin-top: 32px;
    text-align: center;
}

.panel-cta p {
    font-size: 0.78rem;
    color: rgba(255,255,255,0.4);
    margin-bottom: 14px;
    letter-spacing: 0.5px;
}

.panel-switch-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 28px;
    border: 1px solid rgba(138,201,38,0.35);
    border-radius: 999px;
    background: transparent;
    color: #8ac926;
    font-family: 'Montserrat', sans-serif;
    font-size: 0.78rem;
    font-weight: 600;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    cursor: pointer;
    transition: all 0.3s ease;
}
.panel-switch-btn:hover {
    background: rgba(138,201,38,0.08);
    border-color: #8ac926;
    box-shadow: 0 0 20px rgba(138,201,38,0.15);
    transform: translateY(-1px);
}

/* ── PANEL DERECHO (formularios) ── */
.auth-forms {
    position: relative;
    background: #0d0f0d;
    display: flex;
    align-items: flex-start;
    justify-content: center;
    padding: 50px 44px;
    overflow: hidden;
    border-radius: 0 24px 24px 0;
}
.auth-forms::before {
    content: '';
    position: absolute;
    top: 0; left: 0;
    width: 1px; height: 100%;
    background: linear-gradient(to bottom, transparent, rgba(138,201,38,0.2) 30%, rgba(138,201,38,0.2) 70%, transparent);
}

/* ── FLIP CONTAINER ── */
.form-flip-wrapper {
    width: 100%;
    perspective: 1200px;
}

.form-flip-inner {
    position: relative;
    width: 100%;
    /* Height set by JS when flipping so back face is visible */
    transition: transform 0.75s cubic-bezier(0.76, 0, 0.24, 1);
    transform-style: preserve-3d;
}

.form-flip-inner.flipped {
    transform: rotateY(180deg);
}

.form-face {
    width: 100%;
    backface-visibility: hidden;
    -webkit-backface-visibility: hidden;
}

.form-face--back {
    position: absolute;
    top: 0; left: 0; right: 0;
    transform: rotateY(180deg);
}

/* ── FORM COMÚN ── */
.auth-form-inner { width: 100%; }

.form-eyebrow {
    font-size: 0.68rem;
    font-weight: 600;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: #8ac926;
    margin-bottom: 10px;
}

.form-heading {
    font-family: 'Cormorant Garamond', serif;
    font-size: 2.2rem;
    font-weight: 300;
    color: #fff;
    line-height: 1.1;
    margin-bottom: 6px;
}

.form-heading em {
    font-style: italic;
    color: rgba(138,201,38,0.85);
}

.form-desc {
    font-size: 0.78rem;
    color: rgba(255,255,255,0.3);
    margin-bottom: 30px;
    letter-spacing: 0.3px;
}

/* ── ALERTAS ── */
.alert-error {
    width: 100%;
    background: rgba(231,76,60,0.1);
    border: 1px solid rgba(231,76,60,0.3);
    color: #e74c3c;
    border-radius: 8px;
    padding: 10px 14px;
    font-size: 0.82rem;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 8px;
}
.alert-success {
    width: 100%;
    background: rgba(46,204,113,0.1);
    border: 1px solid rgba(46,204,113,0.3);
    color: #2ecc71;
    border-radius: 8px;
    padding: 10px 14px;
    font-size: 0.82rem;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 8px;
}

/* ── INPUTS ── */
.field-group {
    display: flex;
    flex-direction: column;
    gap: 6px;
    margin-bottom: 16px;
}

.field-group label {
    font-size: 0.72rem;
    font-weight: 600;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    color: rgba(255,255,255,0.45);
    display: flex;
    align-items: center;
    gap: 6px;
}
.field-group label i { color: #8ac926; font-size: 0.7rem; }

.field-group .optional {
    color: rgba(255,255,255,0.2);
    font-size: 0.65rem;
    text-transform: none;
    letter-spacing: 0;
    font-weight: 400;
}

.field-group input,
.field-select {
    width: 100%;
    padding: 12px 16px;
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.08);
    border-bottom: 1px solid rgba(138,201,38,0.2);
    border-radius: 8px;
    color: #fff;
    font-family: 'Montserrat', sans-serif;
    font-size: 0.88rem;
    transition: all 0.25s ease;
    outline: none;
}

.field-group input:focus,
.field-select:focus {
    border-color: rgba(138,201,38,0.5);
    background: rgba(138,201,38,0.04);
    box-shadow: 0 0 0 3px rgba(138,201,38,0.08), 0 4px 20px rgba(138,201,38,0.05);
}

.field-group input.input-error { border-color: rgba(231,76,60,0.5); }
.field-select option { background: #111; color: #fff; }

.field-error {
    color: #e74c3c;
    font-size: 0.72rem;
    letter-spacing: 0.3px;
}

/* ── CONTRASEÑA ── */
.password-container { position: relative; }
.password-container input { padding-right: 44px; }
.toggle-password {
    position: absolute;
    right: 14px; top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    color: rgba(138,201,38,0.5);
    font-size: 13px;
    transition: color 0.2s;
}
.toggle-password:hover { color: #8ac926; }

/* ── FUERZA CONTRASEÑA ── */
.strength-bar-wrapper {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-top: 6px;
}
.strength-bar {
    flex: 1; height: 2px;
    background: rgba(255,255,255,0.06);
    border-radius: 99px;
    overflow: hidden;
}
.strength-fill {
    height: 100%; width: 0;
    border-radius: 99px;
    transition: width 0.4s ease, background 0.4s ease;
}
.strength-label { font-size: 0.68rem; font-weight: 600; min-width: 60px; text-align: right; }

/* ── FILA DOBLE ── */
.field-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
}

/* ── RECORDAR ── */
.recordar {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 20px;
    color: rgba(255,255,255,0.3);
    font-size: 0.75rem;
    letter-spacing: 0.3px;
}
.recordar input[type="checkbox"] {
    width: 13px; height: 13px;
    accent-color: #8ac926;
    cursor: pointer;
}
.recordar label { cursor: pointer; }

/* ── BOTÓN SUBMIT ── */
.auth-submit-btn {
    width: 100%;
    padding: 13px;
    background: linear-gradient(135deg, #6fa01e 0%, #8ac926 50%, #a8e050 100%);
    background-size: 200% 100%;
    background-position: right;
    border: none;
    border-radius: 8px;
    font-family: 'Montserrat', sans-serif;
    font-size: 0.8rem;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: #060c06;
    cursor: pointer;
    transition: all 0.4s ease;
    box-shadow: 0 4px 20px rgba(138,201,38,0.2);
    margin-top: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}
.auth-submit-btn:hover:not(:disabled) {
    background-position: left;
    transform: translateY(-2px);
    box-shadow: 0 8px 30px rgba(138,201,38,0.35);
}
.auth-submit-btn:disabled { opacity: 0.6; cursor: not-allowed; }

/* ── LINK INFERIOR MOBILE ── */
.form-footer-link {
    text-align: center;
    margin-top: 20px;
    font-size: 0.75rem;
    color: rgba(255,255,255,0.25);
}
.form-footer-link a,
.form-footer-link button {
    color: #8ac926;
    font-weight: 600;
    background: none;
    border: none;
    cursor: pointer;
    font-family: 'Montserrat', sans-serif;
    font-size: 0.75rem;
    text-decoration: none;
    transition: color 0.2s;
    padding: 0;
}
.form-footer-link a:hover,
.form-footer-link button:hover { color: #b5e254; }

/* ── RESPONSIVE ── */
@media (max-width: 780px) {
    .auth-wrapper {
        grid-template-columns: 1fr;
        max-width: 440px;
    }
    .auth-panel {
        padding: 40px 30px;
        min-height: 220px;
    }
    .panel-ornament { display: none; }
    .auth-forms { padding: 36px 28px; }
    .form-heading { font-size: 1.8rem; }
    .field-row { grid-template-columns: 1fr; }
}

@media (max-width: 480px) {
    .auth-forms { padding: 28px 20px; }
}

/* ══════════════════════════════════════
   MODAL VERIFICACIÓN
══════════════════════════════════════ */
.verify-modal-overlay {
    position: fixed;
    inset: 0;
    z-index: 9999;
    background: rgba(0,0,0,0.75);
    backdrop-filter: blur(6px);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.35s ease;
}

.verify-modal-overlay.open {
    opacity: 1;
    pointer-events: all;
}

.verify-modal {
    background: #0d0f0d;
    border: 1px solid rgba(138,201,38,0.2);
    border-radius: 20px;
    padding: 44px 40px;
    width: 100%;
    max-width: 440px;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    box-shadow: 0 30px 80px rgba(0,0,0,0.6), 0 0 0 1px rgba(138,201,38,0.08);
    transform: translateY(20px) scale(0.97);
    transition: transform 0.35s cubic-bezier(0.34,1.56,0.64,1);
    position: relative;
}

.verify-modal-overlay.open .verify-modal {
    transform: translateY(0) scale(1);
}

/* Botón cerrar */
.verify-modal-close {
    position: absolute;
    top: 16px; right: 20px;
    background: none;
    border: none;
    color: rgba(255,255,255,0.2);
    font-size: 1.1rem;
    cursor: pointer;
    transition: color 0.2s;
    padding: 4px 8px;
    border-radius: 6px;
}
.verify-modal-close:hover { color: rgba(255,255,255,0.6); }

/* Ícono animado */
.verify-modal-icon {
    width: 72px; height: 72px;
    border-radius: 50%;
    background: rgba(138,201,38,0.08);
    border: 2px solid rgba(138,201,38,0.25);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.8rem;
    color: #8ac926;
    margin-bottom: 20px;
    animation: verifyPulse 2s ease-in-out infinite;
}
@keyframes verifyPulse {
    0%,100% { box-shadow: 0 0 0 0 rgba(138,201,38,0.15); }
    50%      { box-shadow: 0 0 0 10px rgba(138,201,38,0); }
}

.verify-modal-title {
    font-family: 'Cormorant Garamond', serif;
    font-size: 1.8rem;
    font-weight: 600;
    color: #fff;
    margin-bottom: 8px;
}

.verify-modal-sub {
    font-size: 0.8rem;
    color: rgba(255,255,255,0.35);
    margin-bottom: 28px;
    line-height: 1.6;
}
.verify-modal-sub strong { color: rgba(255,255,255,0.65); }

/* Inputs de dígitos */
.verify-code-inputs {
    display: flex;
    gap: 10px;
    justify-content: center;
    margin-bottom: 24px;
}

.verify-digit {
    width: 50px; height: 58px;
    text-align: center;
    font-size: 1.5rem;
    font-weight: 700;
    background: rgba(255,255,255,0.04);
    border: 1.5px solid rgba(255,255,255,0.1);
    border-radius: 10px;
    color: #8ac926;
    outline: none;
    transition: all 0.2s ease;
    font-family: 'Courier New', monospace;
    caret-color: #8ac926;
}
.verify-digit:focus {
    border-color: #8ac926;
    background: rgba(138,201,38,0.06);
    box-shadow: 0 0 0 3px rgba(138,201,38,0.15);
    transform: scale(1.06);
}
.verify-digit:not([value='']):not(:placeholder-shown) {
    border-color: rgba(138,201,38,0.4);
}

/* Botón verificar */
.verify-modal-btn {
    width: 100%;
    padding: 13px;
    background: linear-gradient(135deg, #6fa01e, #8ac926);
    border: none;
    border-radius: 8px;
    font-family: 'Montserrat', sans-serif;
    font-size: 0.8rem;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    color: #060c06;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 20px rgba(138,201,38,0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    margin-bottom: 16px;
}
.verify-modal-btn:hover:not(:disabled) {
    transform: translateY(-2px);
    box-shadow: 0 8px 30px rgba(138,201,38,0.35);
}
.verify-modal-btn:disabled { opacity: 0.45; cursor: not-allowed; }
.verify-modal-btn.ready { animation: btnGlow 1.5s infinite; }
@keyframes btnGlow {
    0%,100% { box-shadow: 0 4px 20px rgba(138,201,38,0.2); }
    50%      { box-shadow: 0 4px 30px rgba(138,201,38,0.55); }
}

/* Timer */
.verify-modal-timer {
    font-size: 0.75rem;
    color: rgba(255,255,255,0.25);
    margin-bottom: 16px;
}
.verify-modal-timer span {
    color: #8ac926;
    font-weight: 700;
    font-family: 'Courier New', monospace;
}
.verify-modal-timer.expired span { color: #e74c3c; }

/* Alertas dentro del modal */
.verify-modal-alert {
    width: 100%;
    border-radius: 8px;
    padding: 10px 14px;
    font-size: 0.8rem;
    margin-bottom: 18px;
    display: flex;
    align-items: center;
    gap: 8px;
    text-align: left;
}
.verify-modal-alert.error {
    background: rgba(231,76,60,0.1);
    border: 1px solid rgba(231,76,60,0.3);
    color: #e74c3c;
}
.verify-modal-alert.success {
    background: rgba(46,204,113,0.1);
    border: 1px solid rgba(46,204,113,0.3);
    color: #2ecc71;
}

/* Reenviar */
.verify-modal-resend {
    font-size: 0.75rem;
    color: rgba(255,255,255,0.25);
    display: flex;
    align-items: center;
    gap: 6px;
}
.verify-modal-resend button {
    background: none;
    border: none;
    color: #8ac926;
    font-family: 'Montserrat', sans-serif;
    font-size: 0.75rem;
    font-weight: 600;
    cursor: pointer;
    padding: 0;
    transition: color 0.2s;
}
.verify-modal-resend button:hover { color: #b5e254; }
.verify-modal-resend button:disabled { opacity: 0.4; cursor: not-allowed; }

@media (max-width: 480px) {
    .verify-modal { padding: 32px 20px; }
    .verify-digit { width: 42px; height: 50px; font-size: 1.2rem; }
    .verify-code-inputs { gap: 7px; }
}
</style>
@endpush

@section('content')
<div class="auth-page">

    {{-- Fondo --}}
    <div class="auth-bg">
        <img src="{{ asset('img/paramo.jpg') }}" alt="fondo">
    </div>
    <div class="auth-lines"></div>

    <div class="auth-wrapper" id="authWrapper">

        {{-- ══ PANEL IZQUIERDO ══ --}}
        <div class="auth-panel" id="authPanel">
            <div class="panel-ornament"></div>
            <img src="/img/LOGOYESLOGAN.jpeg" alt="Logo" class="panel-logo">
            <h1 class="panel-title">Agro<em>Finanzas</em></h1>
            <div class="panel-divider"></div>
            <p class="panel-sub">Decisiones inteligentes para el campo</p>

            <div class="panel-cta">
                <p id="panelCtaText">¿No tienes cuenta aún?</p>
                <button class="panel-switch-btn" id="panelSwitchBtn" onclick="switchToRegister()">
                    <i class="fas fa-user-plus"></i>
                    <span id="panelSwitchLabel">Crear cuenta</span>
                </button>
            </div>
        </div>

        {{-- ══ FORMULARIOS ══ --}}
        <div class="auth-forms">
            <div class="form-flip-wrapper">
                <div class="form-flip-inner" id="formFlip">

                    {{-- ── CARA FRONTAL: LOGIN ── --}}
                    <div class="form-face form-face--front">
                        <div class="auth-form-inner">
                            <p class="form-eyebrow">Bienvenido de vuelta</p>
                            <h2 class="form-heading">Iniciar <em>sesión</em></h2>
                            <p class="form-desc">Accede a tu cuenta para gestionar tu campo</p>

                            @if ($errors->has('login_error'))
                                <div class="alert-error">
                                    <i class="fas fa-circle-exclamation"></i>
                                    {{ $errors->first('login_error') }}
                                </div>
                            @endif
                            @if (session('success'))
                                <div class="alert-success">
                                    <i class="fas fa-circle-check"></i>
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form action="{{ route('login.submit') }}" method="POST" id="loginForm">
                                @csrf
                                <div class="field-group">
                                    <label><i class="fas fa-envelope"></i> Correo electrónico</label>
                                    <input type="email" name="email" placeholder="correo@ejemplo.com"
                                        value="{{ old('email') }}"
                                        class="{{ $errors->has('email') ? 'input-error' : '' }}"
                                        required autofocus>
                                    @error('email')<span class="field-error">{{ $message }}</span>@enderror
                                </div>
                                <div class="field-group">
                                    <label><i class="fas fa-lock"></i> Contraseña</label>
                                    <div class="password-container">
                                        <input type="password" name="password" id="loginPass"
                                            placeholder="Tu contraseña"
                                            class="{{ $errors->has('password') ? 'input-error' : '' }}"
                                            required>
                                        <span class="toggle-password" onclick="togglePass('loginPass', this)">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                    </div>
                                    @error('password')<span class="field-error">{{ $message }}</span>@enderror
                                </div>
                                <div class="recordar">
                                    <input type="checkbox" id="recordar" name="remember">
                                    <label for="recordar">Recordar sesión</label>
                                </div>
                                <button type="submit" class="auth-submit-btn" id="loginBtn">
                                    <span id="loginBtnText"><i class="fas fa-right-to-bracket"></i> Ingresar</span>
                                    <span id="loginBtnSpinner" style="display:none">
                                        <i class="fas fa-spinner fa-spin"></i> Ingresando...
                                    </span>
                                </button>
                            </form>

                            <p class="form-footer-link">
                                ¿No tienes cuenta? <button onclick="switchToRegister()">Regístrate aquí</button>
                            </p>
                        </div>
                    </div>

                    {{-- ── CARA TRASERA: REGISTER ── --}}
                    <div class="form-face form-face--back">
                        <div class="auth-form-inner">
                            <p class="form-eyebrow">Únete a la comunidad</p>
                            <h2 class="form-heading">Crear <em>cuenta</em></h2>
                            <p class="form-desc">Gestiona tu campo con inteligencia financiera</p>

                            @if ($errors->has('register_error'))
                                <div class="alert-error">
                                    <i class="fas fa-circle-exclamation"></i>
                                    {{ $errors->first('register_error') }}
                                </div>
                            @endif

                            <form action="{{ route('register.submit') }}" method="POST" id="registerForm">
                                @csrf
                                <div class="field-group">
                                    <label><i class="fas fa-user"></i> Nombre completo</label>
                                    <input type="text" name="name" placeholder="Juan Pérez"
                                        value="{{ old('name') }}"
                                        class="{{ $errors->has('name') ? 'input-error' : '' }}" required>
                                    @error('name')<span class="field-error">{{ $message }}</span>@enderror
                                </div>
                                <div class="field-group">
                                    <label><i class="fas fa-envelope"></i> Correo electrónico</label>
                                    <input type="email" name="email" placeholder="correo@ejemplo.com"
                                        value="{{ old('email') }}"
                                        class="{{ $errors->has('email') ? 'input-error' : '' }}" required>
                                    @error('email')<span class="field-error">{{ $message }}</span>@enderror
                                </div>
                                <div class="field-group">
                                    <label><i class="fas fa-phone"></i> Teléfono <span class="optional">(opcional)</span></label>
                                    <input type="tel" name="phone" placeholder="300 123 4567"
                                        value="{{ old('phone') }}">
                                </div>
                                <div class="field-group">
                                    <label><i class="fas fa-lock"></i> Contraseña</label>
                                    <div class="password-container">
                                        <input type="password" name="password" id="regPass"
                                            placeholder="Mínimo 8 caracteres"
                                            class="{{ $errors->has('password') ? 'input-error' : '' }}"
                                            required oninput="checkStrength(this.value)">
                                        <span class="toggle-password" onclick="togglePass('regPass', this)">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                    </div>
                                    <div class="strength-bar-wrapper" id="strengthWrapper" style="display:none">
                                        <div class="strength-bar"><div class="strength-fill" id="strengthFill"></div></div>
                                        <span class="strength-label" id="strengthLabel"></span>
                                    </div>
                                    @error('password')<span class="field-error">{{ $message }}</span>@enderror
                                </div>
                                <div class="field-group">
                                    <label><i class="fas fa-lock"></i> Confirmar contraseña</label>
                                    <div class="password-container">
                                        <input type="password" name="password_confirmation" id="regPassConfirm"
                                            placeholder="Repite tu contraseña" required>
                                        <span class="toggle-password" onclick="togglePass('regPassConfirm', this)">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                    </div>
                                    <span class="field-error" id="matchError" style="display:none">Las contraseñas no coinciden.</span>
                                </div>
                                <div class="field-group">
                                    <label><i class="fas fa-calendar"></i> Fecha de nacimiento</label>
                                    <input type="date" name="birth_date"
                                        value="{{ old('birth_date') }}"
                                        max="{{ date('Y-m-d', strtotime('-1 day')) }}"
                                        class="{{ $errors->has('birth_date') ? 'input-error' : '' }}" required>
                                    @error('birth_date')<span class="field-error">{{ $message }}</span>@enderror
                                </div>
                                <div class="field-row">
                                    <div class="field-group">
                                        <label><i class="fas fa-venus-mars"></i> Género <span class="optional">(opc.)</span></label>
                                        <select name="gender" class="field-select">
                                            <option value="">Seleccionar...</option>
                                            <option value="male"   {{ old('gender')=='male'  ?'selected':'' }}>Masculino</option>
                                            <option value="female" {{ old('gender')=='female'?'selected':'' }}>Femenino</option>
                                            <option value="other"  {{ old('gender')=='other' ?'selected':'' }}>Otro</option>
                                        </select>
                                    </div>
                                    <div class="field-group">
                                        <label><i class="fas fa-seedling"></i> Años en campo <span class="optional">(opc.)</span></label>
                                        <input type="number" name="experience_years"
                                            placeholder="Ej: 5" min="0" max="70"
                                            value="{{ old('experience_years') }}">
                                    </div>
                                </div>
                                <button type="submit" class="auth-submit-btn" id="registerBtn">
                                    <span id="registerBtnText"><i class="fas fa-user-plus"></i> Crear Cuenta</span>
                                    <span id="registerBtnSpinner" style="display:none">
                                        <i class="fas fa-spinner fa-spin"></i> Creando...
                                    </span>
                                </button>
                            </form>

                            <p class="form-footer-link">
                                ¿Ya tienes cuenta? <button onclick="switchToLogin()">Inicia sesión</button>
                            </p>
                        </div>
                    </div>

                </div>{{-- /form-flip-inner --}}
            </div>{{-- /form-flip-wrapper --}}
        </div>{{-- /auth-forms --}}

    </div>{{-- /auth-wrapper --}}

{{-- ══ MODAL VERIFICACIÓN ══ --}}
<div class="verify-modal-overlay" id="verifyModalOverlay">
    <div class="verify-modal">
        <button class="verify-modal-close" onclick="closeVerifyModal()" aria-label="Cerrar">
            <i class="fas fa-times"></i>
        </button>

        <div class="verify-modal-icon">
            <i class="fas fa-envelope-open-text"></i>
        </div>

        <h2 class="verify-modal-title">Verifica tu cuenta</h2>
        <p class="verify-modal-sub">
            Ingresa el código de 6 dígitos enviado a<br>
            <strong id="verifyModalEmail">tu correo</strong>
        </p>

        {{-- Alerta dinámica --}}
        <div class="verify-modal-alert error" id="verifyModalAlert" style="display:none">
            <i class="fas fa-circle-exclamation"></i>
            <span id="verifyModalAlertText"></span>
        </div>

        <form id="verifyModalForm" method="POST" action="{{ route('verify.submit') }}">
            @csrf
            <input type="hidden" name="user_id" id="verifyModalUserId">
            <input type="hidden" name="code"    id="verifyModalCode">

            <div class="verify-code-inputs" id="verifyCodeInputs">
                @for ($i = 0; $i < 6; $i++)
                    <input type="text"
                           class="verify-digit"
                           maxlength="1"
                           inputmode="numeric"
                           pattern="[0-9]"
                           autocomplete="off"
                           data-index="{{ $i }}">
                @endfor
            </div>

            <button type="submit" class="verify-modal-btn" id="verifyModalBtn" disabled>
                <span id="verifyModalBtnText"><i class="fas fa-shield-check"></i> Verificar cuenta</span>
                <span id="verifyModalBtnSpinner" style="display:none">
                    <i class="fas fa-spinner fa-spin"></i> Verificando...
                </span>
            </button>
        </form>

        <p class="verify-modal-timer" id="verifyModalTimer">
            El código expira en <span id="verifyModalCountdown">15:00</span>
        </p>

        <div class="verify-modal-resend">
            ¿No llegó?
            <form method="POST" action="{{ route('verify.resend') }}" id="verifyResendForm" style="display:inline">
                @csrf
                <input type="hidden" name="user_id" id="verifyResendUserId">
                <button type="submit" id="verifyResendBtn">Reenviar código</button>
            </form>
        </div>
    </div>
</div>

</div>{{-- /auth-page --}}

<script>
    // ── Estado actual ───────────────────────────────────
    let isRegister = {{ $errors->has('register_error') || $errors->has('name') ? 'true' : 'false' }};

    // Aplicar estado inicial si hay errores de registro
    if (isRegister) {
        document.getElementById('formFlip').classList.add('flipped');
        updatePanel(true);
    }

    function setFlipHeight(toRegister) {
        const flip   = document.getElementById('formFlip');
        const front  = flip.querySelector('.form-face--front');
        const back   = flip.querySelector('.form-face--back');
        // Temporarily show both to measure
        const h = toRegister
            ? back.scrollHeight
            : front.scrollHeight;
        flip.style.height = h + 'px';
    }

    function switchToRegister() {
        if (isRegister) return;
        isRegister = true;
        setFlipHeight(true);
        document.getElementById('formFlip').classList.add('flipped');
        updatePanel(true);
    }

    function switchToLogin() {
        if (!isRegister) return;
        isRegister = false;
        setFlipHeight(false);
        document.getElementById('formFlip').classList.remove('flipped');
        updatePanel(false);
    }

    function updatePanel(toRegister) {
        const ctaText  = document.getElementById('panelCtaText');
        const btnLabel = document.getElementById('panelSwitchLabel');
        const btn      = document.getElementById('panelSwitchBtn');

        if (toRegister) {
            ctaText.textContent  = '¿Ya tienes cuenta?';
            btnLabel.textContent = 'Iniciar sesión';
            btn.querySelector('i').className = 'fas fa-right-to-bracket';
            btn.onclick = switchToLogin;
        } else {
            ctaText.textContent  = '¿No tienes cuenta aún?';
            btnLabel.textContent = 'Crear cuenta';
            btn.querySelector('i').className = 'fas fa-user-plus';
            btn.onclick = switchToRegister;
        }
    }

    // ── Toggle contraseña ───────────────────────────────
    function togglePass(fieldId, btn) {
        const field = document.getElementById(fieldId);
        const icon  = btn.querySelector('i');
        field.type  = field.type === 'password' ? 'text' : 'password';
        icon.classList.toggle('fa-eye');
        icon.classList.toggle('fa-eye-slash');
    }

    // ── Fuerza contraseña ───────────────────────────────
    function checkStrength(value) {
        const wrapper = document.getElementById('strengthWrapper');
        const fill    = document.getElementById('strengthFill');
        const label   = document.getElementById('strengthLabel');
        if (!value) { wrapper.style.display = 'none'; return; }
        wrapper.style.display = 'flex';
        let score = 0;
        if (value.length >= 8)          score++;
        if (/[A-Z]/.test(value))        score++;
        if (/[0-9]/.test(value))        score++;
        if (/[^A-Za-z0-9]/.test(value)) score++;
        const levels = [
            { pct:'25%', color:'#e74c3c', text:'Muy débil' },
            { pct:'50%', color:'#e67e22', text:'Débil'     },
            { pct:'75%', color:'#f1c40f', text:'Moderada'  },
            { pct:'100%',color:'#8ac926', text:'Fuerte'    },
        ];
        const lvl = levels[score - 1] || levels[0];
        fill.style.width      = lvl.pct;
        fill.style.background = lvl.color;
        label.textContent     = lvl.text;
        label.style.color     = lvl.color;
    }

    // ── Validar match contraseñas ───────────────────────
    document.getElementById('regPassConfirm').addEventListener('input', function () {
        const match = document.getElementById('matchError');
        match.style.display = (this.value && document.getElementById('regPass').value !== this.value) ? 'block' : 'none';
    });

    // ── Submit login ────────────────────────────────────
    document.getElementById('loginForm').addEventListener('submit', function () {
        document.getElementById('loginBtnText').style.display    = 'none';
        document.getElementById('loginBtnSpinner').style.display = 'inline-flex';
        document.getElementById('loginBtn').disabled = true;
    });

    // ── Submit register — llama API y abre modal de verificación ──
    document.getElementById('registerForm').addEventListener('submit', function (e) {
        e.preventDefault();

        const pass    = document.getElementById('regPass').value;
        const confirm = document.getElementById('regPassConfirm').value;
        if (pass !== confirm) {
            document.getElementById('matchError').style.display = 'block';
            return;
        }

        // Mostrar spinner en el botón
        document.getElementById('registerBtnText').style.display    = 'none';
        document.getElementById('registerBtnSpinner').style.display = 'inline-flex';
        document.getElementById('registerBtn').disabled = true;

        // Enviar el form via fetch
        const formData = new FormData(this);

        const resetRegisterBtn = () => {
            document.getElementById('registerBtnText').style.display    = 'inline-flex';
            document.getElementById('registerBtnSpinner').style.display = 'none';
            document.getElementById('registerBtn').disabled = false;
        };

        const showRegisterError = (msg) => {
            resetRegisterBtn();
            // Buscar o crear el div de error en el back-face
            let errDiv = document.querySelector('.form-face--back .alert-error');
            if (!errDiv) {
                errDiv = document.createElement('div');
                errDiv.className = 'alert-error';
                errDiv.innerHTML = '<i class="fas fa-circle-exclamation"></i><span></span>';
                const formInner = document.querySelector('.form-face--back .auth-form-inner');
                formInner.insertBefore(errDiv, formInner.querySelector('form'));
            }
            errDiv.querySelector('span').textContent = msg;
            errDiv.style.display = 'flex';
        };

        fetch(this.action, {
            method: 'POST',
            headers: { 'Accept': 'application/json' },
            body: formData
        })
        .then(async r => {
            let data;
            try {
                data = await r.json();
            } catch {
                showRegisterError('Error del servidor (respuesta no JSON). Revisa la consola.');
                return;
            }

            if (r.ok && data.success) {
                resetRegisterBtn();
                openVerifyModal(data.user_id, data.email);
                return;
            }

            // Laravel validate() falla → { errors: { campo: ["msg"] } }
            // Controlador falla       → { success: false, message: "..." }
            let msg = 'No se pudo completar el registro.';
            if (data.errors) {
                // Aplanar el primer error de validación
                const firstKey = Object.keys(data.errors)[0];
                if (firstKey) msg = data.errors[firstKey][0];
            } else if (data.message) {
                msg = data.message;
            }
            showRegisterError(msg);
        })
        .catch(err => {
            console.error('Fetch error:', err);
            showRegisterError('Sin conexión. Verifica tu internet e intenta de nuevo.');
        });
    });

    // ══ MODAL VERIFICACIÓN ════════════════════════════════════

    let verifyCountdownInterval = null;

    function openVerifyModal(userId, email) {
        // Poblar datos
        document.getElementById('verifyModalUserId').value = userId;
        document.getElementById('verifyResendUserId').value = userId;
        document.getElementById('verifyModalEmail').textContent = email;

        // Limpiar inputs
        document.querySelectorAll('.verify-digit').forEach(d => d.value = '');
        document.getElementById('verifyModalBtn').disabled = true;
        document.getElementById('verifyModalBtn').classList.remove('ready');
        hideModalAlert();

        // Iniciar cuenta regresiva
        startVerifyCountdown();

        // Mostrar modal
        document.getElementById('verifyModalOverlay').classList.add('open');
        setTimeout(() => document.querySelector('.verify-digit').focus(), 350);
    }

    function closeVerifyModal() {
        document.getElementById('verifyModalOverlay').classList.remove('open');
        clearInterval(verifyCountdownInterval);
    }

    // Cerrar al click fuera
    document.getElementById('verifyModalOverlay').addEventListener('click', function(e) {
        if (e.target === this) closeVerifyModal();
    });

    // ── Inputs de 6 dígitos ────────────────────────────────
    const vDigits = document.querySelectorAll('.verify-digit');

    vDigits.forEach((input, index) => {
        input.addEventListener('keypress', e => { if (!/[0-9]/.test(e.key)) e.preventDefault(); });

        input.addEventListener('input', () => {
            input.value = input.value.replace(/[^0-9]/g, '').slice(-1);
            if (input.value && index < vDigits.length - 1) vDigits[index + 1].focus();
            checkVerifyFilled();
        });

        input.addEventListener('keydown', e => {
            if (e.key === 'Backspace' && !input.value && index > 0) vDigits[index - 1].focus();
        });

        input.addEventListener('paste', e => {
            e.preventDefault();
            const pasted = e.clipboardData.getData('text').replace(/[^0-9]/g, '');
            if (pasted.length === 6) {
                vDigits.forEach((d, i) => d.value = pasted[i] || '');
                vDigits[5].focus();
                checkVerifyFilled();
            }
        });
    });

    function checkVerifyFilled() {
        const all = [...vDigits].every(d => d.value !== '');
        const btn = document.getElementById('verifyModalBtn');
        btn.disabled = !all;
        all ? btn.classList.add('ready') : btn.classList.remove('ready');
    }

    // ── Submit verificación ────────────────────────────────
    document.getElementById('verifyModalForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const code = [...vDigits].map(d => d.value).join('');
        document.getElementById('verifyModalCode').value = code;
        const userId = document.getElementById('verifyModalUserId').value;

        document.getElementById('verifyModalBtnText').style.display    = 'none';
        document.getElementById('verifyModalBtnSpinner').style.display = 'inline-flex';
        document.getElementById('verifyModalBtn').disabled = true;

        const formData = new FormData();
        formData.append('_token', document.querySelector('meta[name="csrf-token"]').content);
        formData.append('user_id', userId);
        formData.append('code', code);

        fetch('{{ route("verify.submit") }}', {
            method: 'POST',
            headers: { 'Accept': 'application/json' },
            body: formData
        })
        .then(r => r.json().catch(() => ({ success: false, message: 'Error de conexión' })))
        .then(data => {
            if (data.success || data.redirect) {
                // Verificación exitosa — redirigir
                window.location.href = data.redirect || '/inicio';
            } else {
                document.getElementById('verifyModalBtnText').style.display    = 'inline-flex';
                document.getElementById('verifyModalBtnSpinner').style.display = 'none';
                document.getElementById('verifyModalBtn').disabled = false;
                showModalAlert('error', data.message || 'Código incorrecto. Intenta de nuevo.');
            }
        });
    });

    // ── Reenviar código ────────────────────────────────────
    document.getElementById('verifyResendForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const btn = document.getElementById('verifyResendBtn');
        btn.disabled = true;
        btn.textContent = 'Enviando...';

        const formData = new FormData(this);
        fetch(this.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json',
            },
            body: formData
        })
        .then(r => r.json().catch(() => ({})))
        .then(() => {
            showModalAlert('success', 'Código reenviado. Revisa tu correo.');
            startVerifyCountdown(); // reiniciar cuenta
            setTimeout(() => { btn.disabled = false; btn.textContent = 'Reenviar código'; }, 3000);
        });
    });

    // ── Countdown ─────────────────────────────────────────
    function startVerifyCountdown() {
        clearInterval(verifyCountdownInterval);
        let timeLeft = 15 * 60;
        const display = document.getElementById('verifyModalCountdown');
        const timer   = document.getElementById('verifyModalTimer');

        verifyCountdownInterval = setInterval(() => {
            timeLeft--;
            const m = String(Math.floor(timeLeft / 60)).padStart(2, '0');
            const s = String(timeLeft % 60).padStart(2, '0');
            display.textContent = m + ':' + s;

            if (timeLeft <= 60) display.style.color = '#e74c3c';
            if (timeLeft <= 0) {
                clearInterval(verifyCountdownInterval);
                timer.innerHTML = '<span style="color:#e74c3c">El código expiró. Reenvía uno nuevo.</span>';
            }
        }, 1000);
    }

    // ── Alertas del modal ──────────────────────────────────
    function showModalAlert(type, msg) {
        const el = document.getElementById('verifyModalAlert');
        el.className = 'verify-modal-alert ' + type;
        el.querySelector('span').textContent = msg;
        el.style.display = 'flex';
    }

    function hideModalAlert() {
        document.getElementById('verifyModalAlert').style.display = 'none';
    }

    // Si venimos de un registro exitoso con user_id en sesión PHP, abrir el modal automáticamente
    @if(session('verify_user_id'))
        document.addEventListener('DOMContentLoaded', () => {
            openVerifyModal(
                '{{ session("verify_user_id") }}',
                '{{ session("verify_email") ?? "tu correo" }}'
            );
        });
    @endif

</script>
@endsection