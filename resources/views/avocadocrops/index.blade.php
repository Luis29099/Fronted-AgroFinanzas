@extends('layouts.app')

@push('styles')
<style>
@import url('https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Syne:wght@400;500;600;700;800&display=swap');

:root {
    --avo-dark:    #0a0f07;
    --avo-mid:     #111807;
    --avo-warm:    #182210;
    --avo-accent:  #4a7c2f;
    --avo-green:   #6aaa3f;
    --avo-light:   #95d45a;
    --avo-gold:    #c8a83c;
    --avo-cream:   #e6edcf;
    --text-muted:  rgba(230,237,207,0.42);
    --card-bg:     rgba(24,34,16,0.65);
    --border:      rgba(74,124,47,0.18);
}

.avocado-page {
    background: var(--avo-dark);
    color: var(--avo-cream);
    font-family: 'Syne', sans-serif;
    min-height: 100vh;
}

/* ── HERO ── */
.avo-hero {
    position: relative;
    min-height: 75vh;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}
.avo-hero-bg {
    position: absolute;
    inset: 0;
}
.avo-hero-bg img {
    width: 100%; height: 100%;
    object-fit: cover;
    opacity: 0.22;
    filter: saturate(0.9) brightness(0.8);
}
.avo-hero-bg::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(to bottom,
        rgba(10,15,7,0.5) 0%,
        rgba(10,15,7,0.0) 40%,
        rgba(10,15,7,0.9) 100%
    );
}
.avo-hero-content {
    position: relative;
    z-index: 1;
    text-align: center;
    padding: 70px 20px;
    max-width: 820px;
}
.hero-pill {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(74,124,47,0.15);
    border: 1px solid rgba(74,124,47,0.3);
    border-radius: 999px;
    padding: 6px 18px;
    font-size: 0.69rem;
    font-weight: 700;
    letter-spacing: 2.5px;
    text-transform: uppercase;
    color: var(--avo-light);
    margin-bottom: 22px;
}
.avo-hero-content h1 {
    font-family: 'Instrument Serif', serif;
    font-size: clamp(2.8rem, 7vw, 5rem);
    font-weight: 400;
    color: var(--avo-cream);
    line-height: 1.0;
    margin-bottom: 18px;
}
.avo-hero-content h1 em { font-style: italic; color: var(--avo-light); }
.avo-hero-content p {
    font-size: 0.96rem;
    color: var(--text-muted);
    line-height: 1.75;
    max-width: 520px;
    margin: 0 auto 36px;
    font-weight: 400;
}
.hero-ctas { display: flex; gap: 12px; justify-content: center; flex-wrap: wrap; }

/* ── BUTTONS ── */
.btn-avo {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 11px 26px;
    border-radius: 999px;
    font-family: 'Syne', sans-serif;
    font-size: 0.8rem;
    font-weight: 700;
    letter-spacing: 0.5px;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.3s ease;
    border: none;
}
.btn-avo-primary { background: var(--avo-accent); color: var(--avo-cream); }
.btn-avo-primary:hover { background: var(--avo-green); color: var(--avo-dark); transform: translateY(-2px); box-shadow: 0 8px 24px rgba(74,124,47,0.35); }
.btn-avo-outline { background: transparent; border: 1px solid rgba(74,124,47,0.4) !important; color: var(--avo-light); }
.btn-avo-outline:hover { background: rgba(74,124,47,0.1); border-color: var(--avo-green) !important; color: var(--avo-light); transform: translateY(-2px); }

/* ── DIVIDER ── */
.avo-divider {
    border: none; height: 1px;
    background: linear-gradient(90deg, transparent, var(--avo-accent), transparent);
    opacity: 0.2; margin: 0;
}

/* ── SECTIONS ── */
.avo-section { padding: 80px 20px; }
.avo-section .container { max-width: 1100px; margin: 0 auto; }

.section-label {
    font-size: 0.67rem; font-weight: 800;
    letter-spacing: 4px; text-transform: uppercase;
    color: var(--avo-accent); margin-bottom: 8px; display: block;
}
.section-heading {
    font-family: 'Instrument Serif', serif;
    font-size: clamp(1.9rem, 4vw, 2.8rem);
    font-weight: 400;
    color: var(--avo-cream); line-height: 1.1; margin-bottom: 6px;
}
.section-heading em { font-style: italic; color: var(--avo-light); }
.section-sub { font-size: 0.86rem; color: var(--text-muted); margin-bottom: 0; max-width: 520px; }

/* ── MAIN CARDS ── */
.avo-cards-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 22px;
    margin-top: 40px;
}
.avo-card-pro {
    background: var(--card-bg);
    border: 1px solid var(--border);
    border-radius: 18px;
    overflow: hidden;
    cursor: pointer;
    transition: all 0.35s ease;
    position: relative;
}
.avo-card-pro:hover {
    transform: translateY(-7px);
    border-color: rgba(74,124,47,0.45);
    box-shadow: 0 24px 54px rgba(0,0,0,0.55), 0 0 0 1px rgba(74,124,47,0.12);
}
.avo-card-img { height: 220px; overflow: hidden; position: relative; }
.avo-card-img img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.55s ease; }
.avo-card-pro:hover .avo-card-img img { transform: scale(1.07); }
.avo-card-img::after {
    content: '';
    position: absolute;
    bottom: 0; left: 0; right: 0;
    height: 60%;
    background: linear-gradient(to top, rgba(10,15,7,0.7), transparent);
    pointer-events: none;
}
.card-badge {
    position: absolute; top: 12px; right: 12px;
    background: rgba(10,15,7,0.88);
    border: 1px solid var(--border);
    color: var(--avo-light);
    font-size: 0.62rem; font-weight: 800;
    letter-spacing: 1.5px; text-transform: uppercase;
    padding: 4px 10px; border-radius: 999px;
    backdrop-filter: blur(6px); z-index: 1;
}
.avo-card-body { padding: 22px 24px; }
.avo-card-body h5 {
    font-family: 'Instrument Serif', serif;
    font-size: 1.3rem; font-weight: 400;
    color: var(--avo-cream); margin-bottom: 6px;
}
.avo-card-body p {
    font-size: 0.81rem; color: var(--text-muted);
    line-height: 1.6; margin-bottom: 14px;
}
.card-meta {
    display: flex; gap: 14px; margin-bottom: 14px;
}
.card-meta-item {
    display: flex; flex-direction: column; gap: 2px;
}
.card-meta-item span:first-child {
    font-size: 0.59rem; font-weight: 800;
    letter-spacing: 1px; text-transform: uppercase;
    color: rgba(74,124,47,0.5);
}
.card-meta-item span:last-child { font-size: 0.8rem; color: var(--avo-cream); font-weight: 600; }
.card-cta {
    display: inline-flex; align-items: center; gap: 6px;
    font-size: 0.75rem; font-weight: 700; color: var(--avo-accent);
    background: none; border: none; cursor: pointer; padding: 0;
    font-family: 'Syne', sans-serif; transition: color 0.2s;
    letter-spacing: 0.5px;
}
.card-cta:hover { color: var(--avo-light); }
.card-cta i { font-size: 0.66rem; transition: transform 0.2s; }
.card-cta:hover i { transform: translateX(3px); }

/* ── INFO SECTION ── */
.avo-info-section { background: var(--avo-mid); }
.avo-info-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
    margin-top: 40px;
}
.info-block {
    background: var(--card-bg);
    border: 1px solid var(--border);
    border-radius: 16px;
    padding: 28px 30px;
}
.info-block h3 {
    font-family: 'Instrument Serif', serif;
    font-size: 1.3rem; color: var(--avo-cream);
    margin-bottom: 12px; line-height: 1.3;
}
.info-block p { font-size: 0.85rem; color: var(--text-muted); line-height: 1.75; margin: 0; }

/* ── COMPLEMENTARY CAROUSEL ── */
.carousel-section { background: var(--avo-dark); }
.avo-track-wrapper { position: relative; overflow: hidden; }
.avo-track {
    display: flex;
    gap: 20px;
    transition: transform 0.4s cubic-bezier(0.76,0,0.24,1);
}
.avo-carousel-card {
    flex: 0 0 calc(33.333% - 14px);
    background: var(--card-bg);
    border: 1px solid var(--border);
    border-radius: 16px;
    overflow: hidden;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
}
.avo-carousel-card:hover {
    transform: translateY(-5px);
    border-color: rgba(74,124,47,0.4);
    box-shadow: 0 16px 40px rgba(0,0,0,0.4);
}
.avo-carousel-card-img { height: 180px; overflow: hidden; }
.avo-carousel-card-img img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s; }
.avo-carousel-card:hover .avo-carousel-card-img img { transform: scale(1.06); }
.avo-carousel-card-body { padding: 16px 18px; }
.avo-carousel-card-body h4 {
    font-family: 'Instrument Serif', serif;
    font-size: 1.1rem; color: var(--avo-cream); margin-bottom: 4px;
}
.avo-carousel-card-body p { font-size: 0.77rem; color: var(--text-muted); margin: 0; }
.carousel-nav {
    display: flex; align-items: center; gap: 10px; margin-top: 24px;
}
.carousel-nav-btn {
    width: 44px; height: 44px; border-radius: 50%;
    background: var(--card-bg); border: 1px solid var(--border);
    color: var(--avo-light); font-size: 1.2rem;
    cursor: pointer; display: flex; align-items: center; justify-content: center;
    transition: all 0.25s;
}
.carousel-nav-btn:hover { background: rgba(74,124,47,0.15); border-color: rgba(74,124,47,0.4); }

/* ── CARE SECTION ── */
.care-section { background: var(--avo-mid); }
.care-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
    align-items: start;
    margin-top: 40px;
}
.care-text ul {
    list-style: none; padding: 0; margin: 0;
}
.care-text ul li {
    padding: 14px 0;
    border-bottom: 1px solid var(--border);
    font-size: 0.86rem; color: var(--text-muted);
    line-height: 1.7;
    display: flex; gap: 12px;
}
.care-text ul li:last-child { border-bottom: none; }
.care-text ul li::before {
    content: '▸';
    color: var(--avo-accent);
    flex-shrink: 0;
    margin-top: 2px;
}
.care-video-wrap {
    border-radius: 16px; overflow: hidden;
    border: 1px solid var(--border);
}
.care-video-wrap iframe { display: block; width: 100%; height: 280px; }

/* ── METRICS ── */
.metrics-section { background: var(--avo-dark); }
.metrics-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 18px;
    margin-top: 40px;
}
.metric-card {
    background: var(--card-bg);
    border: 1px solid var(--border);
    border-radius: 14px;
    padding: 26px 22px;
    text-align: center;
    transition: all 0.3s;
}
.metric-card:hover {
    border-color: rgba(74,124,47,0.4);
    transform: translateY(-3px);
    background: rgba(74,124,47,0.06);
}
.metric-label {
    display: block;
    font-size: 0.64rem; font-weight: 800;
    letter-spacing: 2px; text-transform: uppercase;
    color: rgba(74,124,47,0.5); margin-bottom: 10px;
}
.metric-card h3 {
    font-family: 'Instrument Serif', serif;
    font-size: 1.5rem; font-weight: 400;
    color: var(--avo-light); margin-bottom: 10px;
}
.metric-card p { font-size: 0.78rem; color: var(--text-muted); line-height: 1.6; margin: 0; }

/* ═══════════════════
   AVO MODAL
════════════════════ */
.avo-modal-overlay {
    position: fixed; inset: 0; z-index: 9000;
    background: rgba(5,8,3,0.86);
    backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px);
    display: flex; align-items: center; justify-content: center;
    padding: 20px; opacity: 0; pointer-events: none;
    transition: opacity 0.3s ease;
}
.avo-modal-overlay.open { opacity: 1; pointer-events: all; }
.avo-modal {
    background: linear-gradient(160deg, #182210 0%, #0e1708 100%);
    border: 1px solid rgba(74,124,47,0.25);
    border-radius: 24px;
    width: 100%; max-width: 840px;
    max-height: 90vh; overflow-y: auto;
    box-shadow: 0 40px 80px rgba(0,0,0,0.7), 0 0 0 1px rgba(74,124,47,0.08);
    transform: translateY(24px) scale(0.97);
    transition: transform 0.35s cubic-bezier(0.34,1.4,0.64,1);
    position: relative;
    scrollbar-width: thin;
    scrollbar-color: rgba(74,124,47,0.3) transparent;
}
.avo-modal-overlay.open .avo-modal { transform: translateY(0) scale(1); }
.avo-modal::-webkit-scrollbar { width: 4px; }
.avo-modal::-webkit-scrollbar-track { background: transparent; }
.avo-modal::-webkit-scrollbar-thumb { background: rgba(74,124,47,0.3); border-radius: 4px; }

.modal-close-btn {
    position: absolute; top: 16px; right: 18px;
    width: 34px; height: 34px; border-radius: 50%;
    background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.07);
    color: rgba(255,255,255,0.3); font-size: 0.9rem;
    cursor: pointer; display: flex; align-items: center; justify-content: center;
    transition: all 0.2s; z-index: 10;
}
.modal-close-btn:hover { background: rgba(74,124,47,0.2); color: #fff; border-color: rgba(74,124,47,0.5); }

.modal-gallery {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 3px;
    max-height: 280px;
    overflow: hidden;
    border-radius: 24px 24px 0 0;
}
.modal-gallery-main {
    grid-column: 1;
    grid-row: 1 / 3;
}
.modal-gallery-main img,
.modal-gallery-thumb img {
    width: 100%; height: 100%; object-fit: cover; display: block;
    transition: opacity 0.3s;
}
.modal-gallery-main { height: 280px; }
.modal-gallery-thumb { height: 139px; overflow: hidden; cursor: pointer; }
.modal-gallery-thumb:hover img { opacity: 0.8; }
.modal-gallery-single { grid-column: 1 / -1; height: 280px; border-radius: 24px 24px 0 0; overflow: hidden; }
.modal-gallery-single img { width: 100%; height: 100%; object-fit: cover; }

.modal-body-a { padding: 30px 34px 34px; }
.modal-eyebrow {
    font-size: 0.64rem; font-weight: 800;
    letter-spacing: 3px; text-transform: uppercase;
    color: var(--avo-accent); margin-bottom: 8px; display: block;
}
.modal-title-a {
    font-family: 'Instrument Serif', serif;
    font-size: 2rem; font-weight: 400;
    color: var(--avo-cream); margin-bottom: 14px; line-height: 1.15;
}
.modal-desc-a {
    font-size: 0.88rem; color: rgba(230,237,207,0.58);
    line-height: 1.78; margin-bottom: 26px;
}
.modal-stats-grid {
    display: grid; grid-template-columns: repeat(3, 1fr);
    gap: 12px; margin-bottom: 24px;
}
.modal-stat {
    background: rgba(0,0,0,0.3); border: 1px solid var(--border);
    border-radius: 12px; padding: 13px 14px; text-align: center;
}
.modal-stat span:first-child {
    display: block; font-size: 0.59rem; font-weight: 800;
    letter-spacing: 1.5px; text-transform: uppercase;
    color: rgba(74,124,47,0.48); margin-bottom: 5px;
}
.modal-stat span:last-child {
    display: block; font-size: 0.88rem; font-weight: 700; color: var(--avo-cream);
}
.modal-tags-title {
    font-family: 'Instrument Serif', serif;
    font-size: 1.05rem; color: var(--avo-light);
    margin-bottom: 12px; font-style: italic;
}
.modal-tags { display: flex; flex-wrap: wrap; gap: 7px; }
.modal-tag {
    padding: 5px 13px;
    background: rgba(74,124,47,0.1); border: 1px solid rgba(74,124,47,0.2);
    border-radius: 999px; font-size: 0.74rem; color: var(--avo-light); font-weight: 600;
}

/* ── RESPONSIVE ── */
@media (max-width: 900px) {
    .avo-cards-grid { grid-template-columns: repeat(2, 1fr); }
    .metrics-grid { grid-template-columns: repeat(2, 1fr); }
    .avo-info-grid { grid-template-columns: 1fr; }
    .care-grid { grid-template-columns: 1fr; }
    .avo-carousel-card { flex: 0 0 calc(50% - 10px); }
    .modal-stats-grid { grid-template-columns: repeat(2, 1fr); }
    .modal-gallery { grid-template-columns: 1fr; max-height: 240px; }
    .modal-gallery-main { grid-column: 1; grid-row: 1; height: 240px; }
    .modal-gallery-thumb { display: none; }
}
@media (max-width: 600px) {
    .avo-cards-grid, .metrics-grid { grid-template-columns: 1fr; }
    .avo-carousel-card { flex: 0 0 calc(85% - 10px); }
    .avo-section { padding: 60px 16px; }
    .modal-body-a { padding: 20px 18px 26px; }
    .modal-title-a { font-size: 1.65rem; }
}
</style>
@endpush

@section('content')
<div class="avocado-page">

    {{-- ── HERO ── --}}
    <section class="avo-hero">
        <div class="avo-hero-bg">
            <img src="https://images.unsplash.com/photo-1523049673857-eb18f1d7b578?w=1600" alt="Aguacate">
        </div>
        <div class="avo-hero-content">
            <span class="hero-pill"><i class="fas fa-leaf"></i> Guía Técnica</span>
            <h1>El Arte del<br><em>Aguacate</em></h1>
            <p>Variedades, manejo agronómico y recomendaciones clave para una producción eficiente, sostenible y rentable.</p>
            <div class="hero-ctas">
                <a href="#variedades" class="btn-avo btn-avo-primary"><i class="fas fa-seedling"></i> Ver Variedades</a>
                <a href="#cuidados" class="btn-avo btn-avo-outline"><i class="fas fa-chart-bar"></i> Parámetros Técnicos</a>
            </div>
        </div>
    </section>

    <div class="avo-divider"></div>

    {{-- ── MAIN VARIETIES ── --}}
    <section class="avo-section" id="variedades" style="background: var(--avo-dark);">
        <div class="container">
            <span class="section-label">Variedades Principales</span>
            <h2 class="section-heading">Aguacates <em>Comerciales</em></h2>
            <p class="section-sub">Las variedades con mayor impacto en calidad, exportación y producción a escala.</p>

            <div class="avo-cards-grid">

                <div class="avo-card-pro" onclick="openAvoModal('hass')">
                    <div class="avo-card-img">
                        <img src="https://www.reyesgutierrez.com/wp-content/uploads/2021/04/aguacate-hass.jpg" alt="Hass">
                        <span class="card-badge">Exportación</span>
                    </div>
                    <div class="avo-card-body">
                        <h5>Hass</h5>
                        <p>La variedad más exportada del mundo. Piel rugosa que cambia a morado al madurar.</p>
                        <div class="card-meta">
                            <div class="card-meta-item"><span>Aceite</span><span>18 – 25%</span></div>
                            <div class="card-meta-item"><span>Tipo</span><span>Tipo A</span></div>
                        </div>
                        <button class="card-cta">Explorar variedad <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>

                <div class="avo-card-pro" onclick="openAvoModal('fuerte')">
                    <div class="avo-card-img">
                        <img src="https://fertilizantesecoforce.es/wp-content/uploads/2022/06/Comprar-arbol-aguacate-fuerte.jpeg" alt="Fuerte">
                        <span class="card-badge">Híbrido</span>
                    </div>
                    <div class="avo-card-body">
                        <h5>Fuerte</h5>
                        <p>Híbrido natural entre guatemalteco y mexicano. Producción estable y sabor suave.</p>
                        <div class="card-meta">
                            <div class="card-meta-item"><span>Aceite</span><span>14 – 18%</span></div>
                            <div class="card-meta-item"><span>Tipo</span><span>Tipo B</span></div>
                        </div>
                        <button class="card-cta">Explorar variedad <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>

                <div class="avo-card-pro" onclick="openAvoModal('gwen')">
                    <div class="avo-card-img">
                        <img src="https://i.etsystatic.com/32029892/r/il/1db8dd/4476791049/il_1080xN.4476791049_7t7k.jpg" alt="Gwen">
                        <span class="card-badge">Premium</span>
                    </div>
                    <div class="avo-card-body">
                        <h5>Gwen</h5>
                        <p>Derivada del Hass, fruto más grande y cremoso. Excelente para consumo fresco.</p>
                        <div class="card-meta">
                            <div class="card-meta-item"><span>Aceite</span><span>16 – 22%</span></div>
                            <div class="card-meta-item"><span>Tipo</span><span>Tipo A</span></div>
                        </div>
                        <button class="card-cta">Explorar variedad <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="avo-divider"></div>

    {{-- ── INFO BLOCKS ── --}}
    <section class="avo-section avo-info-section">
        <div class="container">
            <span class="section-label">Contexto Productivo</span>
            <h2 class="section-heading">Diversidad e <em>Importancia</em></h2>

            <div class="avo-info-grid">
                <div class="info-block">
                    <h3>Otras variedades de aguacate</h3>
                    <p>Más allá de las variedades comerciales, existe un amplio espectro de tipos que se adaptan a condiciones específicas de suelo, clima y manejo. Muchas son usadas como portainjertos para mejorar el rendimiento de variedades comerciales, o como polinizadores para optimizar el cuajado del fruto en los huertos mixtos.</p>
                </div>
                <div class="info-block">
                    <h3>Importancia en la diversificación</h3>
                    <p>La selección estratégica de variedades complementarias reduce el riesgo productivo ante cambios climáticos, estabiliza la oferta comercial a lo largo del año y mejora la resiliencia del sistema agrícola. La combinación adecuada puede aumentar el rendimiento total del huerto hasta en un 30%.</p>
                </div>
            </div>
        </div>
    </section>

    <div class="avo-divider"></div>

    {{-- ── COMPLEMENTARY CAROUSEL ── --}}
    <section class="avo-section carousel-section">
        <div class="container">
            <span class="section-label">Variedades Complementarias</span>
            <h2 class="section-heading">Más <em>Variedades</em></h2>
            <p class="section-sub">Empleadas para polinización, portainjertos y diversificación productiva.</p>

            <div class="avo-track-wrapper" style="margin-top: 36px;">
                <div class="avo-track" id="avoTrack">

                    <div class="avo-carousel-card" onclick="openAvoModal('bacon')">
                        <div class="avo-carousel-card-img">
                            <img src="https://cdn.shopify.com/s/files/1/0611/0252/2576/files/2_1_0bdb538a-f436-4495-8653-1166025065a7.png?v=1729876018" alt="Bacon">
                        </div>
                        <div class="avo-carousel-card-body">
                            <h4>Bacon</h4>
                            <p>Clima frío · Buena resistencia</p>
                        </div>
                    </div>

                    <div class="avo-carousel-card" onclick="openAvoModal('zutano')">
                        <div class="avo-carousel-card-img">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0cOTcbGdhpAEe3o3GaXidm0rSfx0OTe-wEA&s" alt="Zutano">
                        </div>
                        <div class="avo-carousel-card-body">
                            <h4>Zutano</h4>
                            <p>Polinizador · Alta rusticidad</p>
                        </div>
                    </div>

                    <div class="avo-carousel-card" onclick="openAvoModal('reed')">
                        <div class="avo-carousel-card-img">
                            <img src="https://stcroperproduction.blob.core.windows.net/uploads-public/images/9x-45dqi-ts6iteki-hnh/lg.webp" alt="Reed">
                        </div>
                        <div class="avo-carousel-card-body">
                            <h4>Reed</h4>
                            <p>Fruto grande · Consumo fresco</p>
                        </div>
                    </div>

                    <div class="avo-carousel-card" onclick="openAvoModal('pinkerton')">
                        <div class="avo-carousel-card-img">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTFlTO7iI6C48XZHtSMdoh8wxbebN_UlRR6gQ&s" alt="Pinkerton">
                        </div>
                        <div class="avo-carousel-card-body">
                            <h4>Pinkerton</h4>
                            <p>Alto rendimiento · Exportación</p>
                        </div>
                    </div>

                    <div class="avo-carousel-card" onclick="openAvoModal('russell')">
                        <div class="avo-carousel-card-img">
                            <img src="https://veliyathgarden.com/cdn/shop/files/virallongneckavocadomiamifruit_1138x-eb87f5abdf3042a38ab3c31d600dcaca_1946x.jpg?v=1747213969" alt="Russell">
                        </div>
                        <div class="avo-carousel-card-body">
                            <h4>Russell</h4>
                            <p>Fruto alargado · Mercado local</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="carousel-nav">
                <button class="carousel-nav-btn" onclick="moveAvoCarousel(-1)">‹</button>
                <button class="carousel-nav-btn" onclick="moveAvoCarousel(1)">›</button>
            </div>
        </div>
    </section>

    <div class="avo-divider"></div>

    {{-- ── CARE ── --}}
    <section class="avo-section care-section" id="cuidados">
        <div class="container">
            <span class="section-label">Manejo Agronómico</span>
            <h2 class="section-heading">Recomendaciones <em>Clave</em></h2>
            <p class="section-sub">Lineamientos técnicos para una producción eficiente, responsable y sostenible.</p>

            <div class="care-grid">
                <div class="care-text">
                    <ul>
                        <li>Manejo responsable del riego: el aguacate es muy sensible al exceso de agua. Mantener el suelo húmedo pero con buen drenaje para evitar Phytophthora.</li>
                        <li>Fertilización balanceada según etapa vegetativa y análisis foliar periódico para ajustar la nutrición.</li>
                        <li>Monitoreo constante de plagas como el barrenador del tronco (<em>Copturus aguacatae</em>) y la mosca del fruto.</li>
                        <li>Poda técnica anual para mejorar la entrada de luz, la aireación del follaje y reducir la carga alternante de producción.</li>
                        <li>Control preventivo de enfermedades fúngicas como la antracnosis, especialmente en épocas lluviosas.</li>
                    </ul>
                </div>
                <div>
                    <div class="care-video-wrap" style="margin-bottom: 20px;">
                        <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" allowfullscreen></iframe>
                    </div>
                    <div class="avo-cards-grid" style="grid-template-columns: 1fr 1fr; gap: 12px; margin-top: 0;">
                        <div class="info-block" style="padding: 18px 20px; cursor: pointer;" onclick="openAvoModal('riego')">
                            <h3 style="font-size:1rem; margin-bottom:6px;">Riego</h3>
                            <p style="font-size:0.77rem;">Técnicas y frecuencias óptimas.</p>
                        </div>
                        <div class="info-block" style="padding: 18px 20px; cursor: pointer;" onclick="openAvoModal('fertilizacion')">
                            <h3 style="font-size:1rem; margin-bottom:6px;">Fertilización</h3>
                            <p style="font-size:0.77rem;">Nutrientes clave por etapa.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="avo-divider"></div>

    {{-- ── METRICS ── --}}
    <section class="avo-section metrics-section">
        <div class="container">
            <span class="section-label">Parámetros Técnicos</span>
            <h2 class="section-heading">Indicadores del <em>Cultivo</em></h2>
            <p class="section-sub">Rangos agronómicos esenciales para el desarrollo óptimo del aguacate.</p>

            <div class="metrics-grid">
                <div class="metric-card">
                    <span class="metric-label">Temperatura</span>
                    <h3>15° – 30°C</h3>
                    <p>Rango térmico ideal para crecimiento vegetativo estable y formación del fruto.</p>
                </div>
                <div class="metric-card">
                    <span class="metric-label">Riego</span>
                    <h3>Controlado</h3>
                    <p>Suelo húmedo con buen drenaje. Evitar encharcamiento y estrés radicular.</p>
                </div>
                <div class="metric-card">
                    <span class="metric-label">Tipo de Suelo</span>
                    <h3>Franco–Arenoso</h3>
                    <p>Bien aireado, buen drenaje y pH ligeramente ácido entre 5.5 y 6.5.</p>
                </div>
                <div class="metric-card">
                    <span class="metric-label">Altitud</span>
                    <h3>1.200 – 2.500 m</h3>
                    <p>Zonas de media y alta montaña que favorecen floración y calidad del fruto.</p>
                </div>
            </div>
        </div>
    </section>

</div>

{{-- ═══════════════════
     AVO MODAL
════════════════════ --}}
<div class="avo-modal-overlay" id="avoModalOverlay" onclick="closeAvoModalOutside(event)">
    <div class="avo-modal" id="avoModal">
        <button class="modal-close-btn" onclick="closeAvoModal()"><i class="fas fa-times"></i></button>
        <div id="avoModalGallery"></div>
        <div class="modal-body-a">
            <span class="modal-eyebrow" id="avoModalEyebrow"></span>
            <h2 class="modal-title-a" id="avoModalTitle"></h2>
            <p class="modal-desc-a" id="avoModalDesc"></p>
            <div class="modal-stats-grid" id="avoModalStats"></div>
            <p class="modal-tags-title" id="avoModalTagsTitle"></p>
            <div class="modal-tags" id="avoModalTags"></div>
        </div>
    </div>
</div>

<script>
const avoData = {
    hass: {
        eyebrow: 'Variedad N°1 Mundial',
        title: 'Aguacate Hass',
        images: [
            'https://www.reyesgutierrez.com/wp-content/uploads/2021/04/aguacate-hass.jpg',
            'https://images.unsplash.com/photo-1560155016-bd4879ae26ba?w=600',
        ],
        desc: 'El Hass es la variedad de aguacate más comercializada del mundo, representando más del 80% de la producción global. Desarrollada en California por Rudolph Hass en los años 1930, su piel rugosa que cambia de verde a morado-negro al madurar la hace inconfundible. Su alto contenido de aceite le da una textura cremosa y sabor intenso, ideal para guacamole, tostadas y cualquier preparación gourmet.',
        stats: [
            { label: 'Contenido aceite', value: '18 – 25%' },
            { label: 'Peso fruto', value: '150 – 300 g' },
            { label: 'Floración', value: 'Tipo A' },
        ],
        tagsTitle: 'Características clave',
        tags: ['Alta demanda global', 'Piel rugosa', 'Madura en árbol', 'Larga vida poscosecha', 'Alta grasa saludable'],
    },
    fuerte: {
        eyebrow: 'Híbrido Clásico',
        title: 'Aguacate Fuerte',
        images: [
            'https://fertilizantesecoforce.es/wp-content/uploads/2022/06/Comprar-arbol-aguacate-fuerte.jpeg',
        ],
        desc: 'El Fuerte es un cruce natural entre la raza guatemalteca y mexicana. Fue la variedad dominante de exportación antes de la masificación del Hass. Su piel verde lisa y brillante no cambia de color al madurar, lo que dificulta determinar su punto de cosecha solo por aspecto. Sabor suave y suave, muy apreciado en el mercado europeo.',
        stats: [
            { label: 'Contenido aceite', value: '14 – 18%' },
            { label: 'Peso fruto', value: '200 – 450 g' },
            { label: 'Floración', value: 'Tipo B' },
        ],
        tagsTitle: 'Características clave',
        tags: ['Sabor suave', 'Piel verde lisa', 'Mercado europeo', 'Raza guatemalteca-mexicana'],
    },
    gwen: {
        eyebrow: 'Variedad Premium',
        title: 'Aguacate Gwen',
        images: [
            'https://i.etsystatic.com/32029892/r/il/1db8dd/4476791049/il_1080xN.4476791049_7t7k.jpg',
        ],
        desc: 'El Gwen es una mejora del Hass desarrollada por la Universidad de California. Su fruto es más grande (250–450 g), con una piel ligeramente más suave y un sabor igualmente cremoso y rico. Es menos conocida comercialmente pero muy apreciada por sus características organolépticas superiores.',
        stats: [
            { label: 'Contenido aceite', value: '16 – 22%' },
            { label: 'Peso fruto', value: '250 – 450 g' },
            { label: 'Floración', value: 'Tipo A' },
        ],
        tagsTitle: 'Características clave',
        tags: ['Fruto grande', 'Derivada del Hass', 'Alta cremosidad', 'UC California'],
    },
    bacon: {
        eyebrow: 'Variedad Complementaria',
        title: 'Aguacate Bacon',
        images: [
            'https://cdn.shopify.com/s/files/1/0611/0252/2576/files/2_1_0bdb538a-f436-4495-8653-1166025065a7.png?v=1729876018',
            'https://cdn.shopify.com/s/files/1/0611/0252/2576/files/1_1.png?v=1729875883',
        ],
        desc: 'El Bacon es una variedad de raza mexicana conocida por su resistencia a bajas temperaturas (tolera hasta -4°C sin daño severo). De floración tipo B, es usado frecuentemente como polinizador en huertos de Hass. Su fruto es de tamaño mediano, piel verde lisa y sabor más suave con menor contenido de aceite que el Hass.',
        stats: [
            { label: 'Resistencia frío', value: 'Hasta -4°C' },
            { label: 'Floración', value: 'Tipo B' },
            { label: 'Aceite', value: '~8%' },
        ],
        tagsTitle: 'Usos principales',
        tags: ['Resistente al frío', 'Polinizador', 'Raza mexicana', 'Piel verde lisa'],
    },
    zutano: {
        eyebrow: 'Polinizador Premium',
        title: 'Aguacate Zutano',
        images: [
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0cOTcbGdhpAEe3o3GaXidm0rSfx0OTe-wEA&s',
        ],
        desc: 'El Zutano es otra variedad de raza mexicana altamente valorada como polinizador en huertos de Hass y otras variedades tipo A. Su vigorous crecimiento y floración tipo B lo hacen ideal para asegurar una polinización cruzada efectiva. La fruta tiene sabor leve y piel verde clara brillante.',
        stats: [
            { label: 'Floración', value: 'Tipo B' },
            { label: 'Crecimiento', value: 'Vigoroso' },
            { label: 'Clima', value: 'Templado-frío' },
        ],
        tagsTitle: 'Función en el huerto',
        tags: ['Polinizador clave', 'Alta rusticidad', 'Crecimiento vigoroso', 'Raza mexicana'],
    },
    reed: {
        eyebrow: 'Consumo Fresco',
        title: 'Aguacate Reed',
        images: [
            'https://stcroperproduction.blob.core.windows.net/uploads-public/images/9x-45dqi-ts6iteki-hnh/lg.webp',
        ],
        desc: 'El Reed es una variedad de fruto grande y redondo, muy apreciada para el consumo en fresco por su sabor rico y suave. Es cosechado en verano y principios de otoño. Aunque menos conocido que el Hass, su pulpa cremosa de alta calidad lo hace competitivo en mercados especializados y ferias de agricultores.',
        stats: [
            { label: 'Peso fruto', value: '400 – 700 g' },
            { label: 'Floración', value: 'Tipo A' },
            { label: 'Cosecha', value: 'Verano-otoño' },
        ],
        tagsTitle: 'Características',
        tags: ['Fruto grande', 'Forma redonda', 'Pulpa cremosa', 'Mercado fresco'],
    },
    pinkerton: {
        eyebrow: 'Alto Rendimiento',
        title: 'Aguacate Pinkerton',
        images: [
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTFlTO7iI6C48XZHtSMdoh8wxbebN_UlRR6gQ&s',
        ],
        desc: 'El Pinkerton es una variedad de alto rendimiento y excelente relación carne-semilla. Su forma alargada y piel gruesa lo hacen muy resistente a daños durante el transporte, siendo muy valorado para exportación. Alto contenido de aceite y sabor rico. Produce en otoño e invierno.',
        stats: [
            { label: 'Aceite', value: 'Alto (>18%)' },
            { label: 'Semilla', value: 'Pequeña' },
            { label: 'Piel', value: 'Gruesa' },
        ],
        tagsTitle: 'Ventajas comerciales',
        tags: ['Alta relación carne/semilla', 'Resistente al transporte', 'Apto exportación', 'Alto aceite'],
    },
    russell: {
        eyebrow: 'Variedad Exótica',
        title: 'Aguacate Russell',
        images: [
            'https://veliyathgarden.com/cdn/shop/files/virallongneckavocadomiamifruit_1138x-eb87f5abdf3042a38ab3c31d600dcaca_1946x.jpg?v=1747213969',
        ],
        desc: 'El Russell es famoso por su forma extremadamente alargada, llegando a medir hasta 50 cm. Es más una rareza botánica que una variedad comercial, aunque tiene un sabor suave y agradable. Se cultiva principalmente en Florida y Hawaii, y es muy atractiva como elemento diferenciador en mercados de nicho y agroturismo.',
        stats: [
            { label: 'Longitud', value: 'Hasta 50 cm' },
            { label: 'Mercado', value: 'Nicho / Local' },
            { label: 'Origen', value: 'Florida, USA' },
        ],
        tagsTitle: 'Características únicas',
        tags: ['Forma alargada extrema', 'Rareza botánica', 'Mercado de nicho', 'Agroturismo'],
    },
    riego: {
        eyebrow: 'Manejo del Agua',
        title: 'Riego en Aguacate',
        images: ['https://images.unsplash.com/photo-1416879595882-3373a0480b5b?w=800'],
        desc: 'El aguacate es altamente sensible al estrés hídrico, tanto por exceso como por déficit. El encharcamiento favorece la Phytophthora cinnamomi, la enfermedad más destructiva del cultivo. Se recomienda riego por goteo con sensores de humedad para mantener el suelo en campo entre 50-75% de la capacidad de campo. Un árbol adulto puede requerir entre 60-80 litros por día en verano.',
        stats: [
            { label: 'Método', value: 'Goteo' },
            { label: 'Frecuencia', value: 'Diaria en verano' },
            { label: 'Vol. adulto', value: '60 – 80 L/día' },
        ],
        tagsTitle: 'Recomendaciones',
        tags: ['Riego por goteo', 'Sensor de humedad', 'Sin encharcamiento', 'Drenaje esencial'],
    },
    fertilizacion: {
        eyebrow: 'Nutrición Vegetal',
        title: 'Fertilización del Aguacate',
        images: ['https://images.unsplash.com/photo-1416879595882-3373a0480b5b?w=800'],
        desc: 'El aguacate es un cultivo exigente en nutrición, especialmente en Nitrógeno, Potasio y Zinc. Se recomienda un análisis foliar anual para ajustar el programa de fertilización. El exceso de Nitrógeno puede favorecer el crecimiento vegetativo en detrimento de la producción. Los micronutrientes como Boro y Zinc son críticos para la cuaja del fruto.',
        stats: [
            { label: 'N clave', value: 'N, K, Zn' },
            { label: 'pH óptimo', value: '5.5 – 6.5' },
            { label: 'Análisis', value: 'Anual' },
        ],
        tagsTitle: 'Nutrientes prioritarios',
        tags: ['Nitrógeno', 'Potasio', 'Zinc', 'Boro', 'Materia orgánica'],
    },
};

let avoCarouselIndex = 0;

function moveAvoCarousel(dir) {
    const track = document.getElementById('avoTrack');
    const cards = track.querySelectorAll('.avo-carousel-card');
    const gap = 20;
    const cardW = cards[0].offsetWidth + gap;
    const visible = window.innerWidth > 900 ? 3 : (window.innerWidth > 600 ? 2 : 1);
    const max = Math.max(0, cards.length - visible);
    avoCarouselIndex = Math.min(Math.max(avoCarouselIndex + dir, 0), max);
    track.style.transform = `translateX(-${avoCarouselIndex * cardW}px)`;
}

function openAvoModal(key) {
    const data = avoData[key];
    if (!data) return;

    const galleryEl = document.getElementById('avoModalGallery');
    if (data.images.length === 1) {
        galleryEl.innerHTML = `
            <div class="modal-gallery-single">
                <img src="${data.images[0]}" alt="${data.title}">
            </div>`;
    } else {
        galleryEl.innerHTML = `
            <div class="modal-gallery">
                <div class="modal-gallery-main">
                    <img src="${data.images[0]}" id="avoGalleryMain" alt="${data.title}">
                </div>
                ${data.images.slice(1).map(img => `
                    <div class="modal-gallery-thumb" onclick="document.getElementById('avoGalleryMain').src='${img}'">
                        <img src="${img}" alt="">
                    </div>
                `).join('')}
            </div>`;
    }

    document.getElementById('avoModalEyebrow').textContent = data.eyebrow;
    document.getElementById('avoModalTitle').textContent   = data.title;
    document.getElementById('avoModalDesc').textContent    = data.desc;

    document.getElementById('avoModalStats').innerHTML = data.stats.map(s => `
        <div class="modal-stat">
            <span>${s.label}</span>
            <span>${s.value}</span>
        </div>
    `).join('');

    document.getElementById('avoModalTagsTitle').textContent = data.tagsTitle;
    document.getElementById('avoModalTags').innerHTML = data.tags.map(t =>
        `<span class="modal-tag">${t}</span>`
    ).join('');

    document.getElementById('avoModalOverlay').classList.add('open');
    document.body.style.overflow = 'hidden';
}

function closeAvoModal() {
    document.getElementById('avoModalOverlay').classList.remove('open');
    document.body.style.overflow = '';
}

function closeAvoModalOutside(e) {
    if (e.target === document.getElementById('avoModalOverlay')) closeAvoModal();
}

document.addEventListener('keydown', e => {
    if (e.key === 'Escape') closeAvoModal();
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection