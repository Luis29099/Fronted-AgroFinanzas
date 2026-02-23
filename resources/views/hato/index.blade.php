@extends('layouts.app')

@section('content')
<style>
:root {
    --cattle-brown: #92400e;
    --cattle-amber: #f59e0b;
    --cattle-green: #8ac926;
    --bg-dark: #0d0f0a;
    --card: #1a1e14;
    --border: rgba(138,201,38,0.12);
}

.hato-page {
    max-width: 1300px;
    margin: 100px auto 60px;
    padding: 0 24px;
}

/* ── HERO ── */
.hato-hero {
    background: linear-gradient(135deg, #1a1e14 0%, #0d0f0a 100%);
    border: 1px solid rgba(245,158,11,0.2);
    border-radius: 20px;
    padding: 32px;
    margin-bottom: 28px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 20px;
    position: relative;
    overflow: hidden;
}
.hato-hero::before {
    content: '🐄';
    position: absolute;
    right: -10px;
    bottom: -20px;
    font-size: 8rem;
    opacity: 0.05;
    pointer-events: none;
}
.hato-hero__title {
    font-size: 2.2rem;
    font-weight: 800;
    color: #fff;
    display: flex;
    align-items: center;
    gap: 14px;
}
.hato-hero__title i { color: var(--cattle-amber); }
.hato-hero__sub { color: #7a8a6a; font-size: 0.88rem; margin-top: 4px; }

/* ── SUMMARY CARDS ── */
.summary-row {
    display: flex;
    gap: 14px;
    flex-wrap: wrap;
    margin-bottom: 28px;
}
.summary-pill {
    display: flex;
    align-items: center;
    gap: 10px;
    background: #1a1e14;
    border: 1px solid var(--border);
    border-radius: 12px;
    padding: 14px 20px;
    flex: 1;
    min-width: 120px;
    transition: all 0.25s;
}
.summary-pill:hover { border-color: rgba(138,201,38,0.35); transform: translateY(-2px); }
.summary-pill__icon { font-size: 1.5rem; }
.summary-pill__num { font-size: 1.6rem; font-weight: 800; color: #fff; line-height: 1; }
.summary-pill__label { font-size: 0.72rem; color: #7a8a6a; text-transform: uppercase; letter-spacing: 0.5px; }

/* ── BOTONES ACCIÓN ── */
.hato-actions {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
    margin-bottom: 28px;
}
.btn-add-animal {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 11px 22px;
    background: linear-gradient(135deg, #f59e0b, #fbbf24);
    color: #0d0f0a;
    border: none;
    border-radius: 10px;
    font-weight: 700;
    font-size: 0.9rem;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.25s;
    font-family: 'Poppins', sans-serif;
}
.btn-add-animal:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(245,158,11,0.4); color: #0d0f0a; }

/* ── GRID DE ANIMALES ── */
.cattle-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
}

/* ── CARD ANIMAL ── */
.cattle-card {
    background: #1a1e14;
    border: 1px solid rgba(138,201,38,0.12);
    border-radius: 16px;
    overflow: hidden;
    transition: all 0.3s ease;
    animation: fadeSlideIn 0.4s ease both;
}
.cattle-card:hover {
    border-color: rgba(245,158,11,0.4);
    transform: translateY(-4px);
    box-shadow: 0 12px 30px rgba(0,0,0,0.5);
}

@keyframes fadeSlideIn {
    from { opacity:0; transform:translateY(16px); }
    to   { opacity:1; transform:translateY(0); }
}

/* Foto del animal */
.cattle-photo {
    width: 100%;
    height: 180px;
    object-fit: cover;
    display: block;
    background: #141810;
}
.cattle-photo-placeholder {
    width: 100%;
    height: 180px;
    background: linear-gradient(135deg, #1f2418, #141810);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 4rem;
    color: rgba(245,158,11,0.2);
}

.cattle-card__body { padding: 18px; }

/* Cabecera con nombre y badge */
.cattle-card__head {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    margin-bottom: 12px;
    gap: 10px;
}
.cattle-card__name {
    font-size: 1.1rem;
    font-weight: 700;
    color: #fff;
}
.cattle-card__tag {
    font-size: 0.72rem;
    color: #7a8a6a;
    display: flex;
    align-items: center;
    gap: 4px;
    margin-top: 2px;
}

/* Badges de estado */
.status-badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 0.7rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    flex-shrink: 0;
}
.status-active   { background: rgba(138,201,38,0.15);  color: #8ac926; border: 1px solid rgba(138,201,38,0.3); }
.status-sold     { background: rgba(59,130,246,0.15);  color: #3b82f6; border: 1px solid rgba(59,130,246,0.3); }
.status-dead     { background: rgba(100,100,100,0.15); color: #888;    border: 1px solid rgba(100,100,100,0.3); }

/* Info grid */
.cattle-info {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 8px;
    margin-bottom: 14px;
}
.cattle-info-item {
    display: flex;
    flex-direction: column;
    gap: 2px;
}
.cattle-info-item__label {
    font-size: 0.68rem;
    color: #4a5a3a;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}
.cattle-info-item__val {
    font-size: 0.85rem;
    color: #dde8c8;
    font-weight: 600;
}

/* Crías (terneros) */
.calves-section {
    border-top: 1px solid rgba(255,255,255,0.05);
    padding-top: 12px;
    margin-top: 12px;
}
.calves-label {
    font-size: 0.72rem;
    color: #7a8a6a;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    gap: 6px;
}
.calves-label i { color: var(--cattle-amber); }
.calf-chip {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: rgba(245,158,11,0.08);
    border: 1px solid rgba(245,158,11,0.2);
    border-radius: 8px;
    padding: 4px 10px;
    font-size: 0.75rem;
    color: #f59e0b;
    margin: 2px;
}

/* Botones de la card */
.cattle-card__foot {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
    padding: 14px 18px;
    border-top: 1px solid rgba(255,255,255,0.04);
    background: rgba(0,0,0,0.15);
}
.card-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 12px;
    border-radius: 7px;
    font-size: 0.76rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s;
    border: 1px solid;
    text-decoration: none;
    font-family: 'Poppins', sans-serif;
    background: transparent;
}
.card-btn--birth {
    border-color: rgba(245,158,11,0.4);
    color: #f59e0b;
}
.card-btn--birth:hover {
    background: rgba(245,158,11,0.1);
    color: #f59e0b;
}
.card-btn--detail {
    border-color: rgba(138,201,38,0.3);
    color: #8ac926;
}
.card-btn--detail:hover {
    background: rgba(138,201,38,0.1);
    color: #8ac926;
}
.card-btn--delete {
    border-color: rgba(239,68,68,0.3);
    color: #ef4444;
    margin-left: auto;
}
.card-btn--delete:hover {
    background: rgba(239,68,68,0.1);
}

/* ── EMPTY STATE ── */
.hato-empty {
    text-align: center;
    padding: 80px 20px;
    background: #1a1e14;
    border: 1px dashed rgba(138,201,38,0.2);
    border-radius: 20px;
}
.hato-empty i { font-size: 4rem; color: rgba(245,158,11,0.25); margin-bottom: 20px; display: block; }
.hato-empty h3 { color: #fff; font-size: 1.2rem; margin-bottom: 8px; }
.hato-empty p  { color: #7a8a6a; font-size: 0.88rem; }

/* ── ALERTAS ── */
.hato-alert {
    padding: 14px 18px;
    border-radius: 10px;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 0.88rem;
    font-weight: 600;
    animation: slideIn 0.4s ease;
}
@keyframes slideIn { from { opacity:0; transform:translateX(-16px); } to { opacity:1; transform:translateX(0); } }
.hato-alert--success { background: rgba(138,201,38,0.1); border: 1px solid rgba(138,201,38,0.3); color: #8ac926; }
.hato-alert--error   { background: rgba(239,68,68,0.1);  border: 1px solid rgba(239,68,68,0.3);  color: #ef4444; }

@media (max-width: 640px) {
    .hato-hero { flex-direction: column; }
    .cattle-grid { grid-template-columns: 1fr; }
    .summary-row { flex-direction: column; }
}
</style>

<div class="hato-page">

    {{-- Alertas --}}
    @if(session('success'))
        <div class="hato-alert hato-alert--success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="hato-alert hato-alert--error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first() }}</div>
    @endif

    {{-- Hero --}}
    <div class="hato-hero">
        <div>
            <div class="hato-hero__title">
                <i class="fas fa-cow"></i> Mi Hato Ganadero
            </div>
            <p class="hato-hero__sub">Control individual por animal — registra nacimientos, estado y fotos</p>
        </div>
        <a href="{{ route('client.cattle.create') }}" class="btn-add-animal">
            <i class="fas fa-plus"></i> Añadir Animal
        </a>
    </div>

    {{-- Summary pills --}}
    <div class="summary-row">
        <div class="summary-pill">
            <span class="summary-pill__icon">🐄</span>
            <div>
                <div class="summary-pill__num">{{ $summary['total'] ?? 0 }}</div>
                <div class="summary-pill__label">Total</div>
            </div>
        </div>
        <div class="summary-pill">
            <span class="summary-pill__icon">✅</span>
            <div>
                <div class="summary-pill__num">{{ $summary['active'] ?? 0 }}</div>
                <div class="summary-pill__label">Activos</div>
            </div>
        </div>
        <div class="summary-pill">
            <span class="summary-pill__icon">♀️</span>
            <div>
                <div class="summary-pill__num">{{ $summary['females'] ?? 0 }}</div>
                <div class="summary-pill__label">Hembras</div>
            </div>
        </div>
        <div class="summary-pill">
            <span class="summary-pill__icon">♂️</span>
            <div>
                <div class="summary-pill__num">{{ $summary['males'] ?? 0 }}</div>
                <div class="summary-pill__label">Machos</div>
            </div>
        </div>
        <div class="summary-pill">
            <span class="summary-pill__icon">🍼</span>
            <div>
                <div class="summary-pill__num">{{ $summary['calves'] ?? 0 }}</div>
                <div class="summary-pill__label">Terneros</div>
            </div>
        </div>
    </div>

    {{-- Grid de animales --}}
    @if(count($cattle) > 0)
        <div class="cattle-grid">
            @foreach($cattle as $index => $animal)
                @php
                    $statusClass = match($animal['status'] ?? 'active') {
                        'sold' => 'status-sold',
                        'dead' => 'status-dead',
                        default => 'status-active',
                    };
                    $statusLabel = match($animal['status'] ?? 'active') {
                        'sold' => 'Vendido',
                        'dead' => 'Fallecido',
                        default => 'Activo',
                    };
                    $useLabel = match($animal['use_milk_meat'] ?? '') {
                        'milk' => 'Lechera',
                        'meat' => 'Carne',
                        'dual' => 'Doble propósito',
                        default => $animal['use_milk_meat'] ?? '-',
                    };
                    $genderLabel = ($animal['gender'] ?? '') === 'female' ? '♀ Hembra' : '♂ Macho';
                @endphp

                <div class="cattle-card" style="animation-delay: {{ $index * 0.06 }}s">

                    {{-- Foto --}}
                    @if(!empty($animal['photo_url']))
                        <img src="{{ $animal['photo_url'] }}" class="cattle-photo" alt="{{ $animal['name'] ?? 'Animal' }}"
                             onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
                        <div class="cattle-photo-placeholder" style="display:none"><i class="fas fa-cow"></i></div>
                    @else
                        <div class="cattle-photo-placeholder"><i class="fas fa-cow"></i></div>
                    @endif

                    <div class="cattle-card__body">
                        <div class="cattle-card__head">
                            <div>
                                <div class="cattle-card__name">
                                    {{ $animal['name'] ?? 'Sin nombre' }}
                                </div>
                                @if(!empty($animal['tag_number']))
                                    <div class="cattle-card__tag">
                                        <i class="fas fa-tag"></i> Arete #{{ $animal['tag_number'] }}
                                    </div>
                                @endif
                            </div>
                            <span class="status-badge {{ $statusClass }}">{{ $statusLabel }}</span>
                        </div>

                        <div class="cattle-info">
                            <div class="cattle-info-item">
                                <span class="cattle-info-item__label">Raza</span>
                                <span class="cattle-info-item__val">{{ $animal['breed'] ?? '-' }}</span>
                            </div>
                            <div class="cattle-info-item">
                                <span class="cattle-info-item__label">Uso</span>
                                <span class="cattle-info-item__val">{{ $useLabel }}</span>
                            </div>
                            <div class="cattle-info-item">
                                <span class="cattle-info-item__label">Sexo</span>
                                <span class="cattle-info-item__val">{{ $genderLabel }}</span>
                            </div>
                            <div class="cattle-info-item">
                                <span class="cattle-info-item__label">Edad</span>
                                <span class="cattle-info-item__val">{{ $animal['age'] ?? 'N/D' }}</span>
                            </div>
                            @if(!empty($animal['average_weight']))
                                <div class="cattle-info-item">
                                    <span class="cattle-info-item__label">Peso prom.</span>
                                    <span class="cattle-info-item__val">{{ $animal['average_weight'] }} kg</span>
                                </div>
                            @endif
                        </div>

                        {{-- Terneros / crías --}}
                        @if(!empty($animal['calves']) && count($animal['calves']) > 0)
                            <div class="calves-section">
                                <div class="calves-label">
                                    <i class="fas fa-baby"></i> Crías ({{ count($animal['calves']) }})
                                </div>
                                @foreach($animal['calves'] as $calf)
                                    <span class="calf-chip">
                                        {{ ($calf['gender'] ?? '') === 'female' ? '♀' : '♂' }}
                                        {{ $calf['name'] ?? 'Sin nombre' }}
                                        @if(!empty($calf['birth_date']))
                                            · {{ \Carbon\Carbon::parse($calf['birth_date'])->format('d/m/Y') }}
                                        @endif
                                    </span>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    {{-- Acciones --}}
                    <div class="cattle-card__foot">
                        @if(($animal['gender'] ?? '') === 'female' && ($animal['status'] ?? '') === 'active')
                            <a href="{{ route('client.cattle.birth.form', $animal['id']) }}" class="card-btn card-btn--birth">
                                <i class="fas fa-baby"></i> Registrar parto
                            </a>
                        @endif
                        <a href="{{ route('client.cattle.show', $animal['id']) }}" class="card-btn card-btn--detail">
                            <i class="fas fa-eye"></i> Detalle
                        </a>
                        <form action="{{ route('client.cattle.destroy', $animal['id']) }}" method="POST"
                              onsubmit="return confirm('¿Eliminar este animal?')" style="margin-left:auto">
                            @csrf @method('DELETE')
                            <button type="submit" class="card-btn card-btn--delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="hato-empty">
            <i class="fas fa-cow"></i>
            <h3>No tienes animales registrados</h3>
            <p>Añade tu primer animal para comenzar a llevar el control de tu hato.</p>
        </div>
    @endif
</div>

<script>
// Auto-cerrar alertas
setTimeout(() => {
    document.querySelectorAll('.hato-alert').forEach(a => {
        a.style.transition = 'opacity 0.4s';
        a.style.opacity = '0';
        setTimeout(() => a.remove(), 400);
    });
}, 4500);
</script>
@endsection