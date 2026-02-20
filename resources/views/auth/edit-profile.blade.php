@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/edit-profile.css') }}">
@endpush

@section('content')
<canvas id="particles-canvas"></canvas>

<div class="edit-layout">

    {{-- ===== PANEL IZQUIERDO: TIPS ===== --}}
    <aside class="tips-panel">
        <div class="tips-header">
            <i class="fa-solid fa-lightbulb"></i>
            <span>Consejos de perfil</span>
        </div>
        <ul class="tips-list">
            <li class="tip-item active" data-field="name">
                <div class="tip-icon"><i class="fa-solid fa-user"></i></div>
                <div class="tip-content"><strong>Nombre completo</strong><p>Usa tu nombre real para que otros agricultores puedan reconocerte en la comunidad.</p></div>
            </li>
            <li class="tip-item" data-field="email">
                <div class="tip-icon"><i class="fa-solid fa-envelope"></i></div>
                <div class="tip-content"><strong>Correo electrónico</strong><p>Te enviamos alertas de precios y recomendaciones agrícolas a este correo.</p></div>
            </li>
            <li class="tip-item" data-field="phone">
                <div class="tip-icon"><i class="fa-solid fa-phone"></i></div>
                <div class="tip-content"><strong>Teléfono</strong><p>Opcional pero útil para recibir notificaciones de emergencia climática en tu zona.</p></div>
            </li>
            <li class="tip-item" data-field="birth_date">
                <div class="tip-icon"><i class="fa-solid fa-calendar"></i></div>
                <div class="tip-content"><strong>Fecha de nacimiento</strong><p>Nos permite personalizar recomendaciones según tu etapa de vida productiva.</p></div>
            </li>
            <li class="tip-item" data-field="gender">
                <div class="tip-icon"><i class="fa-solid fa-venus-mars"></i></div>
                <div class="tip-content"><strong>Género</strong><p>Ayuda a generar estadísticas de inclusión en el sector agrícola colombiano.</p></div>
            </li>
            <li class="tip-item" data-field="experience_years">
                <div class="tip-icon"><i class="fa-solid fa-seedling"></i></div>
                <div class="tip-content"><strong>Años en el campo</strong><p>Con más experiencia registrada, las recomendaciones serán más avanzadas y específicas.</p></div>
            </li>
        </ul>
        <div class="tips-footer">
            <i class="fa-solid fa-circle-info"></i>
            Solo edita los campos que desees cambiar. El resto se mantiene igual.
        </div>
    </aside>

    {{-- ===== PANEL DERECHO: FORMULARIO ===== --}}
    <main class="profile-wrapper">
        <div class="profile-card">

            <h2 class="profile-title">
                <i class="fa-solid fa-user-pen"></i> Editar Perfil
            </h2>

            @if (session('success'))
                <div class="alert-success"><i class="fa-solid fa-circle-check"></i> {{ session('success') }}</div>
            @endif
            @if (session('info'))
                <div class="alert-info"><i class="fa-solid fa-circle-info"></i> {{ session('info') }}</div>
            @endif
            @if ($errors->has('update_error'))
                <div class="alert-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $errors->first('update_error') }}</div>
            @endif
            @if ($errors->has('delete_error'))
                <div class="alert-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $errors->first('delete_error') }}</div>
            @endif

            {{-- ¿Se envió el código de eliminación? --}}
            @if (session('delete_code_sent'))
                <div class="alert-warning">
                    <i class="fa-solid fa-envelope"></i>
                    Se envió un código a <strong>{{ $user['email'] }}</strong>. Ingrésalo abajo para confirmar la eliminación.
                </div>
            @endif

            <form action="{{ route('perfil.actualizar') }}" method="POST" enctype="multipart/form-data" id="profileForm">
                @csrf

                {{-- Foto --}}
                <div class="profile-photo-container">
                    <div class="profile-photo-circle">
                        <img id="imgPreview"
                            src="{{ $user['profile_photo'] ?? asset('img/foto_perfil.jpg') }}"
                            alt="Foto de perfil">
                        <label for="photo_preview" class="photo-overlay">
                            <i class="fa-solid fa-camera"></i><span>Cambiar</span>
                        </label>
                    </div>
                </div>
                <input type="file" name="profile_photo" id="photo_preview" accept="image/*" style="display:none">
                <p class="photo-hint">Haz clic en la foto para cambiarla · JPG, PNG · Máx 2MB</p>

                <div class="field-group" data-tip="name">
                    <label for="name"><i class="fa-solid fa-user"></i> Nombre completo <span class="optional">(opcional)</span></label>
                    <input type="text" name="name" id="name" placeholder="{{ $user['name'] }}" value="{{ old('name') }}" class="{{ $errors->has('name') ? 'input-error' : '' }}">
                    @error('name')<span class="field-error">{{ $message }}</span>@enderror
                </div>

                <div class="field-group" data-tip="email">
                    <label for="email"><i class="fa-solid fa-envelope"></i> Correo electrónico <span class="optional">(opcional)</span></label>
                    <input type="email" name="email" id="email" placeholder="{{ $user['email'] }}" value="{{ old('email') }}" class="{{ $errors->has('email') ? 'input-error' : '' }}">
                    @error('email')<span class="field-error">{{ $message }}</span>@enderror
                </div>

                <div class="field-group" data-tip="phone">
                    <label for="phone"><i class="fa-solid fa-phone"></i> Teléfono <span class="optional">(opcional)</span></label>
                    <input type="tel" name="phone" id="phone" placeholder="{{ $user['phone'] ?? '300 123 4567' }}" value="{{ old('phone') }}" class="{{ $errors->has('phone') ? 'input-error' : '' }}">
                    @error('phone')<span class="field-error">{{ $message }}</span>@enderror
                </div>

                <div class="field-group" data-tip="birth_date">
                    <label for="birth_date"><i class="fa-solid fa-calendar"></i> Fecha de nacimiento <span class="optional">(opcional)</span></label>
                    <input type="date" name="birth_date" id="birth_date" value="{{ old('birth_date') }}" max="{{ date('Y-m-d', strtotime('-1 day')) }}" class="{{ $errors->has('birth_date') ? 'input-error' : '' }}">
                    @error('birth_date')<span class="field-error">{{ $message }}</span>@enderror
                </div>

                <div class="field-row">
                    <div class="field-group" data-tip="gender">
                        <label for="gender"><i class="fa-solid fa-venus-mars"></i> Género <span class="optional">(opcional)</span></label>
                        <select name="gender" id="gender" class="field-select {{ $errors->has('gender') ? 'input-error' : '' }}">
                            <option value="">{{ $user['gender'] ? ($user['gender'] === 'male' ? 'Masculino' : ($user['gender'] === 'female' ? 'Femenino' : 'Otro')) : 'Sin cambiar...' }}</option>
                            <option value="male">Masculino</option>
                            <option value="female">Femenino</option>
                            <option value="other">Otro</option>
                        </select>
                        @error('gender')<span class="field-error">{{ $message }}</span>@enderror
                    </div>
                    <div class="field-group" data-tip="experience_years">
                        <label for="experience_years"><i class="fa-solid fa-seedling"></i> Años en el campo <span class="optional">(opcional)</span></label>
                        <input type="number" name="experience_years" id="experience_years" placeholder="{{ $user['experience_years'] ?? 'Ej: 5' }}" min="0" max="70" value="{{ old('experience_years') }}" class="{{ $errors->has('experience_years') ? 'input-error' : '' }}">
                        @error('experience_years')<span class="field-error">{{ $message }}</span>@enderror
                    </div>
                </div>

                <button type="submit" class="submit-btn" id="submitBtn">
                    <span id="btnText"><i class="fa-solid fa-floppy-disk"></i> Guardar Cambios</span>
                    <span id="btnSpinner" style="display:none"><i class="fa-solid fa-spinner fa-spin"></i> Guardando...</span>
                </button>
            </form>

            {{-- ===== SECCIÓN ELIMINAR CUENTA ===== --}}
            <div class="danger-zone">
                <div class="danger-zone-header">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    <span>Zona de peligro</span>
                </div>

                @php $isVerified = $user['is_verified'] ?? false; @endphp

                @if ($isVerified)
                    {{-- CUENTA VERIFICADA: necesita código --}}
                    @if (!session('delete_code_sent'))
                        {{-- Paso 1: Pedir código --}}
                        <p class="danger-desc">
                            Al eliminar tu cuenta se cerrarán todos tus datos financieros.
                            Tus comentarios en la comunidad quedarán como anónimos.
                        </p>
                        <form action="{{ route('cuenta.send-delete-code') }}" method="POST" id="sendDeleteCodeForm">
                            @csrf
                            <button type="submit" class="delete-btn" onclick="return confirm('¿Deseas recibir un código de confirmación para eliminar tu cuenta?')">
                                <i class="fa-solid fa-trash"></i> Eliminar mi cuenta
                            </button>
                        </form>
                    @else
                        {{-- Paso 2: Ingresar código recibido --}}
                        <p class="danger-desc">Ingresa el código de 6 dígitos que enviamos a tu correo para confirmar la eliminación.</p>
                        <form action="{{ route('cuenta.eliminar') }}" method="POST" id="deleteAccountForm">
                            @csrf
                            @method('DELETE')
                            <div class="delete-code-inputs" id="deleteCodeInputs">
                                @for ($i = 0; $i < 6; $i++)
                                    <input type="text" class="delete-digit" maxlength="1" inputmode="numeric" pattern="[0-9]" data-index="{{ $i }}">
                                @endfor
                            </div>
                            <input type="hidden" name="delete_code" id="deleteCodeFull">
                            <div class="delete-actions">
                                <button type="submit" class="delete-btn-confirm" id="deleteConfirmBtn" disabled>
                                    <i class="fa-solid fa-trash"></i> Confirmar eliminación
                                </button>
                                {{-- Reenviar código --}}
                                <form action="{{ route('cuenta.send-delete-code') }}" method="POST" style="display:inline">
                                    @csrf
                                    <button type="submit" class="resend-delete-btn">
                                        <i class="fa-solid fa-rotate-right"></i> Reenviar código
                                    </button>
                                </form>
                            </div>
                        </form>
                    @endif

                @else
                    {{-- CUENTA NO VERIFICADA: eliminar directo --}}
                    <p class="danger-desc">
                        Tu cuenta no está verificada. Puedes eliminarla directamente.
                        Tus comentarios quedarán como anónimos.
                    </p>
                    <form action="{{ route('cuenta.eliminar') }}" method="POST" id="deleteDirectForm">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn"
                                onclick="return confirm('¿Estás seguro de que deseas eliminar tu cuenta? Esta acción no se puede deshacer.')">
                            <i class="fa-solid fa-trash"></i> Eliminar mi cuenta
                        </button>
                    </form>
                @endif
            </div>

        </div>
    </main>
</div>

<script>
// ── Partículas ─────────────────────────────────────────────────
const canvas = document.getElementById('particles-canvas');
const ctx = canvas.getContext('2d');
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;
window.addEventListener('resize', () => { canvas.width = window.innerWidth; canvas.height = window.innerHeight; });
const particles = Array.from({length: 55}, () => ({
    x: Math.random() * canvas.width, y: Math.random() * canvas.height,
    r: Math.random() * 2.5 + 0.5, dx: (Math.random() - 0.5) * 0.4, dy: (Math.random() - 0.5) * 0.4,
    alpha: Math.random() * 0.5 + 0.15, dAlpha: (Math.random() - 0.5) * 0.004,
}));
function drawParticles() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    particles.forEach(p => {
        p.x += p.dx; p.y += p.dy; p.alpha += p.dAlpha;
        if (p.alpha <= 0.05 || p.alpha >= 0.65) p.dAlpha *= -1;
        if (p.x < 0 || p.x > canvas.width) p.dx *= -1;
        if (p.y < 0 || p.y > canvas.height) p.dy *= -1;
        ctx.beginPath(); ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
        ctx.fillStyle = `rgba(138,201,38,${p.alpha})`; ctx.fill();
    });
    for (let i = 0; i < particles.length; i++) {
        for (let j = i + 1; j < particles.length; j++) {
            const dist = Math.hypot(particles[i].x - particles[j].x, particles[i].y - particles[j].y);
            if (dist < 100) {
                ctx.beginPath(); ctx.moveTo(particles[i].x, particles[i].y); ctx.lineTo(particles[j].x, particles[j].y);
                ctx.strokeStyle = `rgba(138,201,38,${0.06*(1-dist/100)})`; ctx.lineWidth = 0.5; ctx.stroke();
            }
        }
    }
    requestAnimationFrame(drawParticles);
}
drawParticles();

// ── Tips ───────────────────────────────────────────────────────
document.querySelectorAll('.field-group[data-tip]').forEach(group => {
    group.addEventListener('focusin', () => {
        document.querySelectorAll('.tip-item').forEach(t => t.classList.remove('active'));
        const target = document.querySelector(`.tip-item[data-field="${group.getAttribute('data-tip')}"]`);
        if (target) target.classList.add('active');
    });
});

// ── Preview foto ───────────────────────────────────────────────
document.getElementById('photo_preview').addEventListener('change', function () {
    const file = this.files[0];
    if (!file) return;
    if (file.size > 2 * 1024 * 1024) { alert('La imagen no puede superar 2MB.'); this.value = ''; return; }
    document.getElementById('imgPreview').src = URL.createObjectURL(file);
});

// ── Spinner guardar ────────────────────────────────────────────
document.getElementById('profileForm').addEventListener('submit', function () {
    document.getElementById('btnText').style.display = 'none';
    document.getElementById('btnSpinner').style.display = 'inline';
    document.getElementById('submitBtn').disabled = true;
});

// ── Inputs código eliminar (6 dígitos) ────────────────────────
const deleteInputs = document.querySelectorAll('.delete-digit');
const deleteConfirmBtn = document.getElementById('deleteConfirmBtn');

if (deleteInputs.length > 0) {
    deleteInputs.forEach((input, index) => {
        input.addEventListener('keypress', e => { if (!/[0-9]/.test(e.key)) e.preventDefault(); });
        input.addEventListener('input', () => {
            input.value = input.value.replace(/[^0-9]/g, '').slice(-1);
            if (input.value && index < deleteInputs.length - 1) deleteInputs[index + 1].focus();
            checkDeleteFilled();
        });
        input.addEventListener('keydown', e => {
            if (e.key === 'Backspace' && !input.value && index > 0) deleteInputs[index - 1].focus();
        });
        input.addEventListener('paste', e => {
            e.preventDefault();
            const pasted = e.clipboardData.getData('text').replace(/[^0-9]/g, '');
            if (pasted.length === 6) {
                deleteInputs.forEach((inp, i) => inp.value = pasted[i] || '');
                deleteInputs[5].focus();
                checkDeleteFilled();
            }
        });
    });

    function checkDeleteFilled() {
        const allFilled = [...deleteInputs].every(i => i.value !== '');
        if (deleteConfirmBtn) deleteConfirmBtn.disabled = !allFilled;
    }

    document.getElementById('deleteAccountForm')?.addEventListener('submit', function () {
        const code = [...deleteInputs].map(i => i.value).join('');
        document.getElementById('deleteCodeFull').value = code;
    });
}
</script>
@endsection