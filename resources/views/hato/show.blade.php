@extends('layouts.app')

@section('body_class', 'cattle-theme')

@section('content')
<style>
.cattle-show-page {
    max-width: 1000px;
    margin: 110px auto 60px;
    padding: 0 20px;
}

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

/* ── HERO CARD ── */
.show-hero {
    background: #1a1e14;
    border: 1px solid rgba(245,158,11,0.2);
    border-radius: 20px;
    overflow: hidden;
    margin-bottom: 28px;
    display: grid;
    grid-template-columns: 360px 1fr;
    min-height: 320px;
}

.show-hero__img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}
.show-hero__placeholder {
    width: 100%;
    min-height: 320px;
    background: linear-gradient(135deg, #1f2418, #141810);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 7rem;
    color: rgba(245,158,11,0.1);
}

.show-hero__body {
    padding: 32px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.show-hero__breed {
    font-size: 0.75rem;
    font-weight: 700;
    color: #f59e0b;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    margin-bottom: 8px;
}
.show-hero__title {
    font-size: 2.2rem;
    font-weight: 800;
    color: #fff;
    margin-bottom: 6px;
    line-height: 1.1;
}
.show-hero__use {
    font-size: 0.85rem;
    color: #7a8a6a;
    margin-bottom: 28px;
}

.hero-pills {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}
.hero-pill {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.07);
    border-radius: 10px;
    padding: 8px 14px;
    font-size: 0.82rem;
    color: #dde8c8;
}
.hero-pill i { color: #f59e0b; font-size: 0.75rem; }

/* ── SECCIONES ── */
.info-section {
    background: #1a1e14;
    border: 1px solid rgba(138,201,38,0.1);
    border-radius: 16px;
    padding: 24px;
    margin-bottom: 20px;
}
.info-section__title {
    font-size: 0.75rem;
    font-weight: 700;
    color: #8ac926;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 16px;
    display: flex;
    align-items: center;
    gap: 8px;
    padding-bottom: 12px;
    border-bottom: 1px solid rgba(138,201,38,0.1);
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: 16px;
}
.info-item__label {
    font-size: 0.68rem;
    color: #4a5a3a;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 4px;
}
.info-item__val {
    font-size: 0.92rem;
    color: #dde8c8;
    font-weight: 600;
}

/* Uso badge */
.use-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 5px 12px;
    border-radius: 8px;
    font-size: 0.8rem;
    font-weight: 600;
}
.use-milk  { background: rgba(59,130,246,0.1);  color: #60a5fa; border: 1px solid rgba(59,130,246,0.2); }
.use-meat  { background: rgba(239,68,68,0.1);   color: #f87171; border: 1px solid rgba(239,68,68,0.2); }
.use-dual  { background: rgba(138,201,38,0.1);  color: #8ac926; border: 1px solid rgba(138,201,38,0.2); }

@media (max-width: 640px) {
    .show-hero { grid-template-columns: 1fr; }
    .show-hero__placeholder { min-height: 220px; }
    .show-hero__title { font-size: 1.6rem; }
}
</style>

<div class="cattle-show-page">

    <a href="{{ route('client.cattle.index') }}" class="back-link">
    <i class="fas fa-arrow-left"></i> Volver al hato
</a>

    @php
        $use      = $cattle['use_milk_meat'] ?? '';
        $useLabel = match($use) { 'milk' => '🥛 Producción de Leche', 'meat' => '🥩 Producción de Carne', 'dual' => '⚖️ Doble Propósito', default => $use };
        $useClass = match($use) { 'milk' => 'use-milk', 'meat' => 'use-meat', default => 'use-dual' };
    @endphp

    {{-- ── HERO ── --}}
    <div class="show-hero">
        @php $img = $cattle['photo_url'] ?? $cattle['image'] ?? null; @endphp

        @if($img)
            <img src="{{ $img }}" class="show-hero__img" alt="{{ $cattle['breed'] ?? 'Ganado' }}"
                 onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
            <div class="show-hero__placeholder" style="display:none">🐄</div>
        @else
            <div class="show-hero__placeholder">🐄</div>
        @endif

        <div class="show-hero__body">
            <div class="show-hero__breed">{{ $cattle['breed'] ?? 'Raza no especificada' }}</div>
            <h1 class="show-hero__title">Ficha Técnica</h1>
            <p class="show-hero__use">{{ $useLabel }}</p>

            <div class="hero-pills">
                @if(!empty($cattle['average_weight']))
                    <span class="hero-pill">
                        <i class="fas fa-weight-scale"></i> {{ $cattle['average_weight'] }} kg
                    </span>
                @endif
                @if(!empty($cattle['use_milk_meat']))
                    <span class="hero-pill">
                        <i class="fas fa-tag"></i> {{ $useLabel }}
                    </span>
                @endif
                @if(!empty($cattle['id_animal_production']))
                    <span class="hero-pill">
                        <i class="fas fa-industry"></i> Producción #{{ $cattle['id_animal_production'] }}
                    </span>
                @endif
            </div>
        </div>
    </div>

    {{-- ── DATOS TÉCNICOS ── --}}
    <div class="info-section">
        <div class="info-section__title">
            <i class="fas fa-clipboard-list"></i> Datos Técnicos
        </div>
        <div class="info-grid">
            <div>
                <div class="info-item__label">Raza</div>
                <div class="info-item__val">{{ $cattle['breed'] ?? '-' }}</div>
            </div>
            <div>
                <div class="info-item__label">Peso promedio</div>
                <div class="info-item__val">
                    {{ !empty($cattle['average_weight']) ? $cattle['average_weight'] . ' kg' : '-' }}
                </div>
            </div>
            <div>
                <div class="info-item__label">Propósito productivo</div>
                <div class="info-item__val">
                    <span class="use-badge {{ $useClass }}">{{ $useLabel }}</span>
                </div>
            </div>
            @if(!empty($cattle['gender']))
                <div>
                    <div class="info-item__label">Sexo</div>
                    <div class="info-item__val">
                        {{ $cattle['gender'] === 'female' ? '♀ Hembra' : '♂ Macho' }}
                    </div>
                </div>
            @endif
            @if(!empty($cattle['birth_date']))
                <div>
                    <div class="info-item__label">Fecha de nacimiento</div>
                    <div class="info-item__val">
                        {{ \Carbon\Carbon::parse($cattle['birth_date'])->format('d/m/Y') }}
                    </div>
                </div>
            @endif
            @if(!empty($cattle['age']))
                <div>
                    <div class="info-item__label">Edad</div>
                    <div class="info-item__val">{{ $cattle['age'] }}</div>
                </div>
            @endif
        </div>
    </div>

    {{-- ── PRODUCCIÓN ANIMAL RELACIONADA ── --}}
    @if(!empty($cattle['animal_production']))
        <div class="info-section">
            <div class="info-section__title">
                <i class="fas fa-industry"></i> Producción Animal Relacionada
            </div>
            <div class="info-grid">
                @foreach($cattle['animal_production'] as $key => $val)
                    @if(!in_array($key, ['id', 'created_at', 'updated_at']) && $val)
                        <div>
                            <div class="info-item__label">{{ ucfirst(str_replace('_', ' ', $key)) }}</div>
                            <div class="info-item__val">{{ $val }}</div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    @endif

</div>
@endsection