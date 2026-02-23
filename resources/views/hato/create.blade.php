@extends('layouts.app')

@section('content')
<style>
.cattle-form-page {
    max-width: 700px;
    margin: 110px auto 60px;
    padding: 0 20px;
}
.cattle-form-card {
    background: #1a1e14;
    border: 1px solid rgba(245,158,11,0.2);
    border-radius: 20px;
    overflow: hidden;
}
.cattle-form-header {
    background: linear-gradient(135deg, #92400e 0%, #f59e0b 100%);
    padding: 24px 30px;
    color: #fff;
    font-size: 1.4rem;
    font-weight: 800;
    display: flex;
    align-items: center;
    gap: 12px;
}
.cattle-form-body { padding: 32px 30px; }

.form-section-title {
    font-size: 0.78rem;
    font-weight: 700;
    color: #f59e0b;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin: 24px 0 14px;
    padding-bottom: 8px;
    border-bottom: 1px solid rgba(245,158,11,0.15);
}

.fg { margin-bottom: 18px; }
.fg label {
    display: block;
    margin-bottom: 7px;
    font-size: 0.85rem;
    font-weight: 600;
    color: #dde8c8;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}
.fg label span { color: #ef4444; }
.fg input, .fg select, .fg textarea {
    width: 100%;
    padding: 12px 14px;
    background: #0d0f0a;
    border: 1.5px solid rgba(138,201,38,0.15);
    border-radius: 9px;
    color: #dde8c8;
    font-size: 0.9rem;
    font-family: 'Poppins', sans-serif;
    outline: none;
    transition: border-color 0.2s, box-shadow 0.2s;
}
.fg input:focus, .fg select:focus, .fg textarea:focus {
    border-color: #f59e0b;
    box-shadow: 0 0 0 3px rgba(245,158,11,0.12);
}
.fg select option { background: #1a1e14; }

.fg-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }

/* Photo upload */
.photo-upload-area {
    border: 2px dashed rgba(245,158,11,0.3);
    border-radius: 12px;
    padding: 28px;
    text-align: center;
    cursor: pointer;
    transition: all 0.2s;
    background: rgba(245,158,11,0.03);
}
.photo-upload-area:hover { border-color: #f59e0b; background: rgba(245,158,11,0.06); }
.photo-upload-area i { font-size: 2.5rem; color: rgba(245,158,11,0.4); display: block; margin-bottom: 10px; }
.photo-upload-area p { color: #7a8a6a; font-size: 0.82rem; }
#photoPreviewImg {
    width: 100%;
    max-height: 200px;
    object-fit: cover;
    border-radius: 10px;
    margin-top: 12px;
    display: none;
}

.submit-btn {
    width: 100%;
    padding: 14px;
    background: linear-gradient(135deg, #f59e0b, #fbbf24);
    border: none;
    border-radius: 10px;
    color: #0d0f0a;
    font-weight: 800;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.25s;
    font-family: 'Poppins', sans-serif;
    margin-top: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}
.submit-btn:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(245,158,11,0.4); }

.back-link {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    color: #7a8a6a;
    font-size: 0.85rem;
    text-decoration: none;
    margin-bottom: 20px;
    transition: color 0.2s;
}
.back-link:hover { color: #f59e0b; }

.error-msg { color: #ef4444; font-size: 0.78rem; margin-top: 4px; }

@media (max-width: 500px) { .fg-row { grid-template-columns: 1fr; } .cattle-form-body { padding: 20px; } }
</style>

<div class="cattle-form-page">
    <a href="{{ route('client.cattle.index') }}" class="back-link">
        <i class="fas fa-arrow-left"></i> Volver al hato
    </a>

    <div class="cattle-form-card">
        <div class="cattle-form-header">
            <i class="fas fa-cow"></i> Registrar Nuevo Animal
        </div>
        <div class="cattle-form-body">

            @if($errors->any())
                <div style="background:rgba(239,68,68,0.1);border:1px solid rgba(239,68,68,0.3);border-radius:8px;padding:12px 16px;color:#ef4444;font-size:0.85rem;margin-bottom:20px;">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('client.cattle.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- FOTO --}}
                <p class="form-section-title"><i class="fas fa-camera"></i> Foto del animal</p>
                <div class="fg">
                    <div class="photo-upload-area" onclick="document.getElementById('photoInput').click()">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <p>Haz clic para subir una foto · JPG, PNG · Máx 3MB</p>
                    </div>
                    <input type="file" name="photo" id="photoInput" accept="image/*" style="display:none" onchange="previewPhoto(this)">
                    <img id="photoPreviewImg" src="" alt="Preview">
                </div>

                {{-- IDENTIFICACIÓN --}}
                <p class="form-section-title"><i class="fas fa-id-card"></i> Identificación</p>
                <div class="fg-row">
                    <div class="fg">
                        <label>Nombre / Apodo</label>
                        <input type="text" name="name" placeholder="Ej: Canela" value="{{ old('name') }}">
                    </div>
                    <div class="fg">
                        <label>Número de arete</label>
                        <input type="text" name="tag_number" placeholder="Ej: A-042" value="{{ old('tag_number') }}">
                    </div>
                </div>

                {{-- DATOS PRINCIPALES --}}
                <p class="form-section-title"><i class="fas fa-info-circle"></i> Datos principales</p>
                <div class="fg-row">
                    <div class="fg">
                        <label>Raza <span>*</span></label>
                        <input type="text" name="breed" placeholder="Ej: Holstein" required value="{{ old('breed') }}">
                        @error('breed')<span class="error-msg">{{ $message }}</span>@enderror
                    </div>
                    <div class="fg">
                        <label>Sexo <span>*</span></label>
                        <select name="gender" required>
                            <option value="">Seleccionar...</option>
                            <option value="female" {{ old('gender') === 'female' ? 'selected' : '' }}>♀ Hembra</option>
                            <option value="male"   {{ old('gender') === 'male'   ? 'selected' : '' }}>♂ Macho</option>
                        </select>
                    </div>
                </div>

                <div class="fg-row">
                    <div class="fg">
                        <label>Propósito <span>*</span></label>
                        <select name="use_milk_meat" required>
                            <option value="">Seleccionar...</option>
                            <option value="milk" {{ old('use_milk_meat') === 'milk' ? 'selected' : '' }}>🥛 Leche</option>
                            <option value="meat" {{ old('use_milk_meat') === 'meat' ? 'selected' : '' }}>🥩 Carne</option>
                            <option value="dual" {{ old('use_milk_meat') === 'dual' ? 'selected' : '' }}>⚖️ Doble propósito</option>
                        </select>
                    </div>
                    <div class="fg">
                        <label>Peso promedio (kg)</label>
                        <input type="number" name="average_weight" placeholder="Ej: 450" value="{{ old('average_weight') }}">
                    </div>
                </div>

                <div class="fg-row">
                    <div class="fg">
                        <label>Fecha de nacimiento</label>
                        <input type="date" name="birth_date" value="{{ old('birth_date') }}" max="{{ date('Y-m-d') }}">
                    </div>
                    <div class="fg">
                        <label>Origen</label>
                        <select name="origin">
                            <option value="">Seleccionar...</option>
                            <option value="born_here" {{ old('origin') === 'born_here' ? 'selected' : '' }}>Nacido en la finca</option>
                            <option value="purchased" {{ old('origin') === 'purchased' ? 'selected' : '' }}>Comprado</option>
                        </select>
                    </div>
                </div>

                {{-- MADRE --}}
                @if(count($mothers) > 0)
                    <div class="fg">
                        <label>Madre (si aplica)</label>
                        <select name="mother_id">
                            <option value="">Sin madre registrada</option>
                            @foreach($mothers as $m)
                                <option value="{{ $m['id'] }}" {{ old('mother_id') == $m['id'] ? 'selected' : '' }}>
                                    {{ $m['name'] ?? 'Sin nombre' }}
                                    @if(!empty($m['tag_number'])) · Arete {{ $m['tag_number'] }} @endif
                                    · {{ $m['breed'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif

                {{-- NOTAS --}}
                <div class="fg">
                    <label>Notas / Observaciones</label>
                    <textarea name="notes" rows="3" placeholder="Vacunas, enfermedades, tratamientos...">{{ old('notes') }}</textarea>
                </div>

                <button type="submit" class="submit-btn">
                    <i class="fas fa-save"></i> Registrar Animal
                </button>
            </form>
        </div>
    </div>
</div>

<script>
function previewPhoto(input) {
    const file = input.files[0];
    if (!file) return;
    if (file.size > 3 * 1024 * 1024) { alert('La imagen no puede superar 3MB.'); input.value = ''; return; }
    const img = document.getElementById('photoPreviewImg');
    img.src = URL.createObjectURL(file);
    img.style.display = 'block';
}
</script>
@endsection