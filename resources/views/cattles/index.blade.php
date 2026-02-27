@extends('layouts.app')

@section('body_class', 'cattle-theme')

@push('styles')
<style>
@import url('https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,600;0,9..144,700;1,9..144,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap');

:root {
    --cattle-dark:    #0c1209;
    --cattle-mid:     #121a0e;
    --cattle-warm:    #192614;
    --cattle-accent:  #5a8c2f;
    --cattle-green:   #7ab840;
    --cattle-light:   #a8d46b;
    --cattle-cream:   #e8f0d8;
    --text-muted:     rgba(232,240,216,0.42);
    --card-bg:        rgba(25,38,20,0.7);
    --border:         rgba(90,140,47,0.18);
}

.cattle-page {
    background: var(--cattle-dark);
    color: var(--cattle-cream);
    font-family: 'Plus Jakarta Sans', sans-serif;
    min-height: 100vh;
}

/* ── HERO ── */
.cattle-hero {
    position: relative;
    min-height: 80vh;
    display: grid;
    grid-template-columns: 1fr 1.1fr;
    align-items: center;
    overflow: hidden;
    background: var(--cattle-dark);
}
.cattle-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
        radial-gradient(ellipse 70% 80% at 0% 50%, rgba(90,140,47,0.12) 0%, transparent 65%),
        radial-gradient(ellipse 50% 60% at 100% 80%, rgba(90,140,47,0.06) 0%, transparent 55%);
    z-index: 0;
}
.cattle-hero-text {
    position: relative;
    z-index: 1;
    padding: 80px 60px 80px 72px;
}
.hero-eyebrow {
    font-size: 0.68rem;
    font-weight: 700;
    letter-spacing: 4px;
    text-transform: uppercase;
    color: var(--cattle-accent);
    margin-bottom: 18px;
    display: flex;
    align-items: center;
    gap: 10px;
}
.hero-eyebrow::before {
    content: '';
    display: block;
    width: 24px;
    height: 1px;
    background: var(--cattle-accent);
}
.cattle-hero-text h1 {
    font-family: 'Fraunces', serif;
    font-size: clamp(2.4rem, 5vw, 3.6rem);
    font-weight: 700;
    color: var(--cattle-cream);
    line-height: 1.08;
    margin-bottom: 20px;
}
.cattle-hero-text h1 em {
    font-style: italic;
    color: var(--cattle-light);
}
.cattle-hero-text p {
    font-size: 0.95rem;
    color: var(--text-muted);
    line-height: 1.75;
    max-width: 440px;
    margin-bottom: 34px;
}
.hero-actions { display: flex; gap: 14px; flex-wrap: wrap; }

.cattle-hero-carousel {
    position: relative;
    z-index: 1;
    height: 100%;
    min-height: 80vh;
    overflow: hidden;
}
.cattle-hero-carousel .carousel,
.cattle-hero-carousel .carousel-inner,
.cattle-hero-carousel .carousel-item { height: 100%; min-height: 80vh; }
.cattle-hero-carousel .carousel-item img {
    width: 100%; height: 100%;
    object-fit: cover;
    filter: saturate(0.85);
}
.cattle-hero-carousel::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(to right, var(--cattle-dark) 0%, transparent 25%);
    z-index: 1;
    pointer-events: none;
}
.cattle-hero-carousel .carousel-indicators {
    z-index: 2;
    bottom: 20px;
}
.cattle-hero-carousel .carousel-indicators button {
    width: 24px; height: 3px;
    border-radius: 2px;
    background: rgba(122,184,64,0.3);
    border: none;
    opacity: 1;
    transition: all 0.3s;
}
.cattle-hero-carousel .carousel-indicators button.active {
    background: var(--cattle-green);
    width: 40px;
}

/* ── BUTTONS ── */
.btn-cattle {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 11px 26px;
    border-radius: 999px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 0.82rem;
    font-weight: 600;
    letter-spacing: 0.5px;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.3s ease;
    border: none;
}
.btn-cattle-primary {
    background: var(--cattle-accent);
    color: var(--cattle-cream);
}
.btn-cattle-primary:hover {
    background: var(--cattle-green);
    color: var(--cattle-dark);
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(90,140,47,0.35);
}
.btn-cattle-outline {
    background: transparent;
    border: 1px solid rgba(90,140,47,0.4) !important;
    color: var(--cattle-light);
}
.btn-cattle-outline:hover {
    background: rgba(90,140,47,0.1);
    border-color: var(--cattle-green) !important;
    color: var(--cattle-light);
    transform: translateY(-2px);
}

/* ── DIVIDER ── */
.cattle-divider {
    border: none;
    height: 1px;
    background: linear-gradient(90deg, transparent, var(--cattle-accent), transparent);
    opacity: 0.2;
    margin: 0;
}

/* ── SECTION COMMON ── */
.cattle-section {
    padding: 80px 20px;
}
.cattle-section .container { max-width: 1100px; margin: 0 auto; }

.section-label {
    font-size: 0.68rem;
    font-weight: 700;
    letter-spacing: 3.5px;
    text-transform: uppercase;
    color: var(--cattle-accent);
    margin-bottom: 8px;
    display: block;
}
.section-heading {
    font-family: 'Fraunces', serif;
    font-size: clamp(1.8rem, 4vw, 2.6rem);
    font-weight: 600;
    color: var(--cattle-cream);
    line-height: 1.15;
    margin-bottom: 6px;
}
.section-heading em { font-style: italic; color: var(--cattle-light); }
.section-sub { font-size: 0.87rem; color: var(--text-muted); margin-bottom: 0; max-width: 520px; }

/* ── CARDS GRID ── */
.cattle-cards-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 22px;
    margin-top: 40px;
}
.cattle-card-pro {
    background: var(--card-bg);
    border: 1px solid var(--border);
    border-radius: 16px;
    overflow: hidden;
    cursor: pointer;
    transition: all 0.35s ease;
    position: relative;
}
.cattle-card-pro:hover {
    transform: translateY(-6px);
    border-color: rgba(90,140,47,0.4);
    box-shadow: 0 20px 50px rgba(0,0,0,0.5), 0 0 0 1px rgba(90,140,47,0.12);
}

.card-img-wrap {
    height: 200px;
    overflow: hidden;
    position: relative;
}
.card-img-wrap img {
    width: 100%; height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}
.cattle-card-pro:hover .card-img-wrap img { transform: scale(1.06); }
.card-badge {
    position: absolute;
    top: 12px; right: 12px;
    background: rgba(12,18,9,0.85);
    border: 1px solid var(--border);
    color: var(--cattle-light);
    font-size: 0.64rem;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    padding: 4px 10px;
    border-radius: 999px;
    backdrop-filter: blur(6px);
}
.card-body-pro {
    padding: 20px 22px;
}
.card-body-pro h5 {
    font-family: 'Fraunces', serif;
    font-size: 1.2rem;
    font-weight: 600;
    color: var(--cattle-cream);
    margin-bottom: 6px;
}
.card-body-pro p {
    font-size: 0.81rem;
    color: var(--text-muted);
    line-height: 1.6;
    margin-bottom: 14px;
}
.card-stats {
    display: flex;
    gap: 16px;
    margin-bottom: 14px;
}
.card-stat {
    display: flex;
    flex-direction: column;
    gap: 2px;
}
.card-stat span:first-child {
    font-size: 0.61rem;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    color: rgba(90,140,47,0.55);
}
.card-stat span:last-child {
    font-size: 0.81rem;
    color: var(--cattle-cream);
    font-weight: 500;
}
.card-open-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 0.75rem;
    font-weight: 600;
    color: var(--cattle-accent);
    background: none;
    border: none;
    cursor: pointer;
    padding: 0;
    font-family: 'Plus Jakarta Sans', sans-serif;
    transition: color 0.2s;
}
.card-open-btn:hover { color: var(--cattle-light); }
.card-open-btn i { font-size: 0.68rem; transition: transform 0.2s; }
.card-open-btn:hover i { transform: translateX(3px); }

/* ── CYCLE SECTION ── */
.cycle-section { background: var(--cattle-mid); }

.timeline-clean {
    list-style: none;
    padding: 0;
    margin: 0;
    position: relative;
}
.timeline-clean::before {
    content: '';
    position: absolute;
    left: 17px; top: 0; bottom: 0;
    width: 1px;
    background: linear-gradient(to bottom, transparent, var(--cattle-accent), transparent);
    opacity: 0.25;
}
.timeline-clean li {
    display: flex;
    gap: 18px;
    margin-bottom: 20px;
    position: relative;
}
.tl-dot-c {
    width: 36px; height: 36px;
    border-radius: 50%;
    background: var(--cattle-warm);
    border: 2px solid rgba(90,140,47,0.35);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    color: var(--cattle-light);
    font-size: 0.72rem;
    z-index: 1;
    transition: all 0.3s;
}
.timeline-clean li:hover .tl-dot-c {
    background: var(--cattle-accent);
    border-color: var(--cattle-light);
    box-shadow: 0 0 14px rgba(90,140,47,0.3);
}
.tl-body-c { padding-top: 5px; }
.tl-body-c strong {
    display: block;
    font-size: 0.87rem;
    font-weight: 600;
    color: var(--cattle-cream);
    margin-bottom: 3px;
}
.tl-body-c p { font-size: 0.79rem; color: var(--text-muted); line-height: 1.55; margin: 0; }

.process-img-c {
    border-radius: 16px;
    overflow: hidden;
    border: 1px solid var(--border);
}
.process-img-c img { width: 100%; height: 100%; object-fit: cover; display: block; }

/* ── REFERENCE PANEL ── */
.reference-panel {
    background: rgba(0,0,0,0.3);
    border: 1px solid var(--border);
    border-radius: 16px;
    padding: 28px 32px;
    margin-top: 40px;
}
.reference-panel h4 {
    font-family: 'Fraunces', serif;
    font-size: 1.25rem;
    color: var(--cattle-light);
    margin-bottom: 14px;
}
.reference-panel > p {
    font-size: 0.86rem;
    color: var(--text-muted);
    line-height: 1.7;
    margin-bottom: 20px;
}
.reference-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 10px;
}
.reference-list li {
    font-size: 0.82rem;
    color: rgba(232,240,216,0.55);
    padding-left: 14px;
    position: relative;
    line-height: 1.6;
}
.reference-list li::before {
    content: '▸';
    position: absolute;
    left: 0;
    color: var(--cattle-accent);
    font-size: 0.7rem;
    top: 3px;
}
.reference-list li strong { color: var(--cattle-cream); }

/* ── PRACTICES GRID ── */
.practices-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    margin-top: 40px;
}
.practice-card {
    background: var(--card-bg);
    border: 1px solid var(--border);
    border-radius: 14px;
    padding: 24px 22px;
    transition: all 0.3s ease;
}
.practice-card:hover {
    border-color: rgba(90,140,47,0.4);
    background: rgba(90,140,47,0.06);
    transform: translateY(-3px);
}
.practice-icon {
    width: 48px; height: 48px;
    border-radius: 50%;
    background: rgba(90,140,47,0.1);
    border: 1px solid rgba(90,140,47,0.22);
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 14px;
    font-size: 1.1rem;
    color: var(--cattle-light);
}
.practice-card h5 {
    font-family: 'Fraunces', serif;
    font-size: 1rem;
    color: var(--cattle-cream);
    margin-bottom: 8px;
}
.practice-card p { font-size: 0.79rem; color: var(--text-muted); line-height: 1.6; margin: 0; }

/* ── NEWS ── */
.news-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 22px;
    margin-top: 40px;
}
.news-card-c {
    background: var(--card-bg);
    border: 1px solid var(--border);
    border-radius: 14px;
    overflow: hidden;
    transition: all 0.3s ease;
}
.news-card-c:hover {
    transform: translateY(-4px);
    border-color: rgba(90,140,47,0.35);
    box-shadow: 0 16px 40px rgba(0,0,0,0.4);
}
.news-card-img { height: 185px; overflow: hidden; }
.news-card-img img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s; }
.news-card-c:hover .news-card-img img { transform: scale(1.05); }
.news-card-body { padding: 18px 20px; }
.news-badge {
    display: inline-block;
    padding: 3px 10px;
    border-radius: 999px;
    font-size: 0.62rem;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    margin-bottom: 10px;
}
.badge-market { background: rgba(90,140,47,0.15); color: var(--cattle-light); border: 1px solid rgba(90,140,47,0.3); }
.badge-health  { background: rgba(231,76,60,0.1);  color: #e87055; border: 1px solid rgba(231,76,60,0.25); }
.badge-tech    { background: rgba(52,152,219,0.1);  color: #6ab4df; border: 1px solid rgba(52,152,219,0.2); }
.news-card-body h5 {
    font-family: 'Fraunces', serif;
    font-size: 0.98rem;
    color: var(--cattle-cream);
    margin-bottom: 8px;
    line-height: 1.4;
}
.news-card-body p { font-size: 0.79rem; color: var(--text-muted); line-height: 1.6; margin: 0; }

/* ═══════════════════
   CATTLE MODAL
═══════════════════ */
.cattle-modal-overlay {
    position: fixed;
    inset: 0;
    z-index: 9000;
    background: rgba(5,9,4,0.85);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s ease;
}
.cattle-modal-overlay.open { opacity: 1; pointer-events: all; }
.cattle-modal {
    background: linear-gradient(160deg, #192614 0%, #101809 100%);
    border: 1px solid rgba(90,140,47,0.25);
    border-radius: 24px;
    width: 100%;
    max-width: 820px;
    max-height: 90vh;
    overflow-y: auto;
    box-shadow: 0 40px 80px rgba(0,0,0,0.7), 0 0 0 1px rgba(90,140,47,0.08);
    transform: translateY(24px) scale(0.97);
    transition: transform 0.35s cubic-bezier(0.34,1.4,0.64,1);
    position: relative;
    scrollbar-width: thin;
    scrollbar-color: rgba(90,140,47,0.3) transparent;
}
.cattle-modal-overlay.open .cattle-modal { transform: translateY(0) scale(1); }
.cattle-modal::-webkit-scrollbar { width: 4px; }
.cattle-modal::-webkit-scrollbar-track { background: transparent; }
.cattle-modal::-webkit-scrollbar-thumb { background: rgba(90,140,47,0.3); border-radius: 4px; }

.modal-close-btn {
    position: absolute;
    top: 16px; right: 18px;
    width: 34px; height: 34px;
    border-radius: 50%;
    background: rgba(255,255,255,0.05);
    border: 1px solid rgba(255,255,255,0.07);
    color: rgba(255,255,255,0.35);
    font-size: 0.9rem;
    cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    transition: all 0.2s;
    z-index: 10;
}
.modal-close-btn:hover { background: rgba(90,140,47,0.2); color: #fff; border-color: rgba(90,140,47,0.5); }

.modal-hero-img {
    width: 100%; height: 280px;
    object-fit: cover;
    border-radius: 24px 24px 0 0;
    display: block;
}
.modal-body-c { padding: 30px 34px 34px; }
.modal-eyebrow {
    font-size: 0.64rem;
    font-weight: 700;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: var(--cattle-accent);
    margin-bottom: 8px;
    display: block;
}
.modal-title-c {
    font-family: 'Fraunces', serif;
    font-size: 1.9rem;
    font-weight: 700;
    color: var(--cattle-cream);
    margin-bottom: 14px;
    line-height: 1.2;
}
.modal-desc-c {
    font-size: 0.88rem;
    color: rgba(232,240,216,0.6);
    line-height: 1.78;
    margin-bottom: 26px;
}
.modal-stats-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 12px;
    margin-bottom: 26px;
}
.modal-stat {
    background: rgba(0,0,0,0.3);
    border: 1px solid var(--border);
    border-radius: 12px;
    padding: 13px 14px;
    text-align: center;
}
.modal-stat span:first-child {
    display: block;
    font-size: 0.6rem;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    color: rgba(90,140,47,0.5);
    margin-bottom: 5px;
}
.modal-stat span:last-child {
    display: block;
    font-size: 0.88rem;
    font-weight: 600;
    color: var(--cattle-cream);
}
.modal-section-title-c {
    font-family: 'Fraunces', serif;
    font-size: 1.05rem;
    color: var(--cattle-light);
    margin-bottom: 12px;
    font-style: italic;
}
.modal-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 7px;
    margin-bottom: 22px;
}
.modal-tag {
    padding: 5px 13px;
    background: rgba(90,140,47,0.1);
    border: 1px solid rgba(90,140,47,0.2);
    border-radius: 999px;
    font-size: 0.75rem;
    color: var(--cattle-light);
    font-weight: 500;
}
.modal-links h4 {
    font-size: 0.8rem;
    font-weight: 700;
    color: var(--cattle-light);
    letter-spacing: 1px;
    text-transform: uppercase;
    margin-bottom: 10px;
}
.modal-links ul { list-style: none; padding: 0; margin: 0; display: flex; flex-wrap: wrap; gap: 8px; }
.modal-links ul li a {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 0.78rem;
    color: var(--cattle-light);
    text-decoration: none;
    padding: 6px 14px;
    border: 1px solid var(--border);
    border-radius: 999px;
    transition: all 0.2s;
}
.modal-links ul li a:hover {
    background: rgba(90,140,47,0.12);
    border-color: rgba(90,140,47,0.4);
}

/* ── RESPONSIVE ── */
@media (max-width: 1024px) {
    .cattle-hero { grid-template-columns: 1fr; }
    .cattle-hero-carousel { min-height: 340px; }
    .cattle-hero-carousel .carousel,
    .cattle-hero-carousel .carousel-inner,
    .cattle-hero-carousel .carousel-item { min-height: 340px; }
    .cattle-hero-text { padding: 50px 40px; }
}
@media (max-width: 900px) {
    .cattle-cards-grid, .news-grid { grid-template-columns: repeat(2, 1fr); }
    .practices-grid { grid-template-columns: repeat(2, 1fr); }
    .modal-stats-grid { grid-template-columns: repeat(2, 1fr); }
    .reference-list { grid-template-columns: 1fr; }
}
@media (max-width: 600px) {
    .cattle-cards-grid, .news-grid, .practices-grid { grid-template-columns: 1fr; }
    .cattle-hero-text { padding: 36px 20px; }
    .modal-body-c { padding: 20px 18px 26px; }
    .modal-stats-grid { grid-template-columns: repeat(2, 1fr); }
    .modal-hero-img { height: 200px; }
    .cattle-section { padding: 60px 16px; }
}
</style>
@endpush

@section('content')
<div class="cattle-page">

    {{-- ── HERO ── --}}
    <section class="cattle-hero">
        <div class="cattle-hero-text">
            <span class="hero-eyebrow">AgroFinanzas</span>
            <h1>Manejo y Producción<br><em>Ganadera</em></h1>
            <p>Gestión integral del ganado bovino — genética, nutrición, sanidad y comercialización bajo un enfoque técnico y sostenible.</p>
            <div class="hero-actions">
                <a href="#razasBovinas" class="btn-cattle btn-cattle-primary"><i class="fas fa-paw"></i> Razas Bovinas</a>
                <a href="#procesoGanado" class="btn-cattle btn-cattle-outline"><i class="fas fa-route"></i> Ciclo Productivo</a>
            </div>
        </div>

        <div class="cattle-hero-carousel">
            <div id="cattleHeroCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#cattleHeroCarousel" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#cattleHeroCarousel" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#cattleHeroCarousel" data-bs-slide-to="2"></button>
                    <button type="button" data-bs-target="#cattleHeroCarousel" data-bs-slide-to="3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://aurocha.com/wp-content/uploads/2021/12/vacas-angus-aberdeen-scaled.jpg" alt="Angus">
                    </div>
                    <div class="carousel-item">
                        <img src="https://images.unsplash.com/photo-1500595046743-cd271d694d30" alt="Ganado">
                    </div>
                    <div class="carousel-item">
                        <img src="https://i.pinimg.com/736x/3d/3a/6e/3d3a6e311ff5e5285a84de5dc938cc42.jpg" alt="Praderas">
                    </div>
                    <div class="carousel-item">
                        <img src="https://montanaweb-bucket.s3.amazonaws.com/web/blog/1/produccion-de-terneros.png" alt="Terneros">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="cattle-divider"></div>

    {{-- ── BREEDS ── --}}
    <section class="cattle-section" id="razasBovinas" style="background: var(--cattle-dark);">
        <div class="container">
            <span class="section-label">Genética Bovina</span>
            <h2 class="section-heading">Razas <em>Bovinas</em></h2>
            <p class="section-sub">Selecciona la raza adecuada según objetivo productivo, clima y sistema de manejo.</p>

            <div class="cattle-cards-grid">

                <div class="cattle-card-pro" onclick="openCattleModal('angus')">
                    <div class="card-img-wrap">
                        <img src="https://asoangusbrangus.org.co/images/razas/raza_angus.jpg" alt="Angus">
                        <span class="card-badge">Carne Premium</span>
                    </div>
                    <div class="card-body-pro">
                        <h5>Angus</h5>
                        <p>Raza especializada en carne premium con excelente marmoleo. Base de los mejores cortes mundiales.</p>
                        <div class="card-stats">
                            <div class="card-stat"><span>Tipo</span><span>Cárnico</span></div>
                            <div class="card-stat"><span>Marmoleo</span><span>Excelente</span></div>
                        </div>
                        <button class="card-open-btn">Ver detalles técnicos <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>

                <div class="cattle-card-pro" onclick="openCattleModal('holstein')">
                    <div class="card-img-wrap">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/a/a8/Koe_zijaanzicht_2.JPG" alt="Holstein">
                        <span class="card-badge">Alta Leche</span>
                    </div>
                    <div class="card-body-pro">
                        <h5>Holstein</h5>
                        <p>Principal raza lechera del mundo. Alta producción diaria con manejo nutricional preciso.</p>
                        <div class="card-stats">
                            <div class="card-stat"><span>Tipo</span><span>Lechero</span></div>
                            <div class="card-stat"><span>Leche/día</span><span>25 – 45 L</span></div>
                        </div>
                        <button class="card-open-btn">Ver detalles técnicos <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>

                <div class="cattle-card-pro" onclick="openCattleModal('brahman')">
                    <div class="card-img-wrap">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQv3lIeK4cZ4g7u_3WHY4cRiyGjWIKeW4ammQ&s" alt="Brahman">
                        <span class="card-badge">Trópico</span>
                    </div>
                    <div class="card-body-pro">
                        <h5>Brahman</h5>
                        <p>Adaptado a climas tropicales calientes. Resistente al calor, parásitos y enfermedades.</p>
                        <div class="card-stats">
                            <div class="card-stat"><span>Tipo</span><span>Doble Propósito</span></div>
                            <div class="card-stat"><span>Clima</span><span>Tropical</span></div>
                        </div>
                        <button class="card-open-btn">Ver detalles técnicos <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>

            </div>

            <div class="reference-panel">
                <h4>Criterios de Selección Racial</h4>
                <p>La selección de razas bovinas debe basarse en criterios técnicos objetivos que garanticen rentabilidad y sostenibilidad del sistema productivo a largo plazo.</p>
                <ul class="reference-list">
                    <li><strong>Objetivo productivo:</strong> carne, leche o doble propósito.</li>
                    <li><strong>Adaptación climática:</strong> impacto directo en rendimiento.</li>
                    <li><strong>Sistema de manejo:</strong> intensivo, semi-intensivo o extensivo.</li>
                    <li><strong>Calidad genética:</strong> EPDs y registros de producción verificados.</li>
                </ul>
            </div>
        </div>
    </section>

    <div class="cattle-divider"></div>

    {{-- ── CYCLE ── --}}
    <section class="cattle-section cycle-section" id="procesoGanado">
        <div class="container">
            <span class="section-label">Ciclo Productivo</span>
            <h2 class="section-heading">Del Nacimiento<br><em>al Mercado</em></h2>
            <p class="section-sub">Cada etapa del ciclo exige un manejo específico para maximizar el potencial productivo.</p>

            <div class="row align-items-start mt-5">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <ul class="timeline-clean">
                        <li>
                            <div class="tl-dot-c"><i class="fas fa-star"></i></div>
                            <div class="tl-body-c">
                                <strong>Nacimiento & Calostrado</strong>
                                <p>Ingesta temprana de calostro para garantizar inmunidad pasiva y reducir mortalidad neonatal.</p>
                            </div>
                        </li>
                        <li>
                            <div class="tl-dot-c"><i class="fas fa-seedling"></i></div>
                            <div class="tl-body-c">
                                <strong>Crianza (Lactancia)</strong>
                                <p>Desarrollo del sistema digestivo y fortalecimiento del crecimiento inicial mediante manejo nutricional cuidadoso.</p>
                            </div>
                        </li>
                        <li>
                            <div class="tl-dot-c"><i class="fas fa-cut"></i></div>
                            <div class="tl-body-c">
                                <strong>Destete</strong>
                                <p>Transición controlada a dieta sólida para minimizar estrés y pérdidas productivas.</p>
                            </div>
                        </li>
                        <li>
                            <div class="tl-dot-c"><i class="fas fa-chart-line"></i></div>
                            <div class="tl-body-c">
                                <strong>Levante (Recría)</strong>
                                <p>Crecimiento óseo y muscular sostenido que define el potencial productivo futuro del animal.</p>
                            </div>
                        </li>
                        <li>
                            <div class="tl-dot-c"><i class="fas fa-weight"></i></div>
                            <div class="tl-body-c">
                                <strong>Ceba (Engorde)</strong>
                                <p>Optimización de ganancia de peso diaria y eficiencia de conversión alimenticia.</p>
                            </div>
                        </li>
                        <li>
                            <div class="tl-dot-c"><i class="fas fa-store"></i></div>
                            <div class="tl-body-c">
                                <strong>Comercialización</strong>
                                <p>Logística, trazabilidad completa y transporte bajo normas de bienestar animal.</p>
                            </div>
                        </li>
                    </ul>

                    <div class="mt-5" style="border-radius:14px; overflow:hidden; border: 1px solid var(--border);">
                        <div class="ratio ratio-16x9">
                            <iframe src="https://www.youtube.com/embed/0b5iyRCG3P0" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="process-img-c" style="height: 280px; margin-bottom: 24px;">
                        <img src="https://desarrollorural.yucatan.gob.mx/files-content/galerias/5e35b133328bb9efa0466a7ee62e7606.jpg" alt="Ciclo productivo">
                    </div>

                    <div class="practices-grid" style="margin-top: 0; grid-template-columns: 1fr;">
                        <div class="practice-card" onclick="openCattleModal('nutricion')" style="cursor:pointer">
                            <div class="practice-icon"><i class="fas fa-apple-alt"></i></div>
                            <h5>Manejo Nutricional</h5>
                            <p>Dietas balanceadas según etapa productiva para maximizar ganancia de peso y salud digestiva.</p>
                        </div>
                    </div>
                    <div class="practices-grid" style="margin-top: 16px; grid-template-columns: repeat(2, 1fr);">
                        <div class="practice-card" onclick="openCattleModal('sanidad')" style="cursor:pointer">
                            <div class="practice-icon"><i class="fas fa-syringe"></i></div>
                            <h5>Control Sanitario</h5>
                            <p>Vacunación, desparasitación y seguimiento veterinario continuo.</p>
                        </div>
                        <div class="practice-card" onclick="openCattleModal('bienestar')" style="cursor:pointer">
                            <div class="practice-icon"><i class="fas fa-heart"></i></div>
                            <h5>Bienestar Animal</h5>
                            <p>Espacios adecuados y manejo sin estrés bajo normativas vigentes.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="cattle-divider"></div>

    {{-- ── FEEDING SYSTEMS ── --}}
    <section class="cattle-section" id="metodosCosecha" style="background: var(--cattle-dark);">
        <div class="container">
            <span class="section-label">Alimentación</span>
            <h2 class="section-heading">Sistemas de <em>Pastoreo</em></h2>
            <p class="section-sub">El sistema de alimentación determina la productividad, sostenibilidad y rentabilidad de la finca.</p>

            <div class="cattle-cards-grid">

                <div class="cattle-card-pro" onclick="openCattleModal('extensivo')">
                    <div class="card-img-wrap">
                        <img src="https://www.uoc.edu/content/dam/news/images/noticies/2023/200-la-tecnologia-dona-pas-al-pasturatge-digital.jpg" alt="Extensivo">
                        <span class="card-badge">Bajo Insumo</span>
                    </div>
                    <div class="card-body-pro">
                        <h5>Pastoreo Extensivo</h5>
                        <p>Animales en grandes áreas libres. Menor inversión inicial pero baja carga animal por hectárea.</p>
                        <div class="card-stats">
                            <div class="card-stat"><span>Inversión</span><span>Baja</span></div>
                            <div class="card-stat"><span>Carga/ha</span><span>0.5 – 1 UA</span></div>
                        </div>
                        <button class="card-open-btn">Ver detalles <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>

                <div class="cattle-card-pro" onclick="openCattleModal('rotacional')">
                    <div class="card-img-wrap">
                        <img src="https://infopastosyforrajes.com/wp-content/uploads/2020/04/Sistemas-de-Pastoreo-2.jpg" alt="Rotacional">
                        <span class="card-badge">Alta Eficiencia</span>
                    </div>
                    <div class="card-body-pro">
                        <h5>Rotacional (Voisin)</h5>
                        <p>Potreros divididos con cercas eléctricas. Optimiza el descanso del pasto y la nutrición animal.</p>
                        <div class="card-stats">
                            <div class="card-stat"><span>Carga/ha</span><span>2 – 4 UA</span></div>
                            <div class="card-stat"><span>Eficiencia</span><span>Alta</span></div>
                        </div>
                        <button class="card-open-btn">Ver detalles <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>

                <div class="cattle-card-pro" onclick="openCattleModal('feedlot')">
                    <div class="card-img-wrap">
                        <img src="https://a.storyblok.com/f/160385/a33fe0d0ac/aumentar-espacio-vital-ganado-esta-confinamiento.jpg" alt="Feedlot">
                        <span class="card-badge">Intensivo</span>
                    </div>
                    <div class="card-body-pro">
                        <h5>Confinamiento (Feedlot)</h5>
                        <p>Alimentación controlada en corrales. Máxima ganancia de peso diaria en el menor tiempo posible.</p>
                        <div class="card-stats">
                            <div class="card-stat"><span>GDP</span><span>1.2 – 1.8 kg</span></div>
                            <div class="card-stat"><span>Inversión</span><span>Alta</span></div>
                        </div>
                        <button class="card-open-btn">Ver detalles <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="cattle-divider"></div>

    {{-- ── NEWS ── --}}
    <section class="cattle-section" id="noticiasGanado" style="background: var(--cattle-mid);">
        <div class="container">
            <span class="section-label">Actualidad</span>
            <h2 class="section-heading">Mercados y <em>Noticias</em></h2>
            <p class="section-sub">Precios, sanidad e innovación tecnológica para el sector pecuario.</p>

            <div class="news-grid">
                <div class="news-card-c">
                    <div class="news-card-img">
                        <img src="https://www.asoregan.co/wp-content/uploads/2024/09/Claves-para-la-Compra-Rentable-de-Ganado.jpg" alt="Precios">
                    </div>
                    <div class="news-card-body">
                        <span class="news-badge badge-market">Mercado</span>
                        <h5>Tendencia de Precios en Subasta</h5>
                        <p>El ganado en pie mantiene estabilidad esta semana. Los machos de levante lideran la demanda entre cebadores.</p>
                    </div>
                </div>

                <div class="news-card-c">
                    <div class="news-card-img">
                        <img src="https://img.lalr.co/cms/2020/04/13165837/Eco_vacunacionAftosa_AGRO.jpg?r=4_3" alt="Sanidad">
                    </div>
                    <div class="news-card-body">
                        <span class="news-badge badge-health">Sanidad</span>
                        <h5>Ciclo de Vacunación 2024</h5>
                        <p>Autoridades sanitarias anuncian fechas para el primer ciclo contra fiebre aftosa y brucelosis bovina.</p>
                    </div>
                </div>

                <div class="news-card-c">
                    <div class="news-card-img">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRd4Ez5yfKD6A81dZd55Q1Cx2s1bi16_v30ug&s" alt="Tecnología">
                    </div>
                    <div class="news-card-body">
                        <span class="news-badge badge-tech">Innovación</span>
                        <h5>Identificación RFID Ganadera</h5>
                        <p>Crotales con tecnología RFID permiten control preciso de ganancia diaria de peso e historial sanitario individual.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

{{-- ═════════════════
     CATTLE MODAL
══════════════════ --}}
<div class="cattle-modal-overlay" id="cattleModalOverlay" onclick="closeCattleModalOutside(event)">
    <div class="cattle-modal" id="cattleModal">
        <button class="modal-close-btn" onclick="closeCattleModal()"><i class="fas fa-times"></i></button>
        <img class="modal-hero-img" id="cattleModalImg" src="" alt="">
        <div class="modal-body-c">
            <span class="modal-eyebrow" id="cattleModalEyebrow"></span>
            <h2 class="modal-title-c" id="cattleModalTitle"></h2>
            <p class="modal-desc-c" id="cattleModalDesc"></p>
            <div class="modal-stats-grid" id="cattleModalStats"></div>
            <h4 class="modal-section-title-c" id="cattleModalTagsTitle"></h4>
            <div class="modal-tags" id="cattleModalTags"></div>
            <div class="modal-links" id="cattleModalLinks" style="display:none">
                <h4>Recursos Técnicos</h4>
                <ul id="cattleModalLinksList"></ul>
            </div>
        </div>
    </div>
</div>

<script>
const cattleData = {
    angus: {
        eyebrow: 'Raza Cárnica Premium',
        title: 'Angus (Aberdeen Angus)',
        img: 'https://asoangusbrangus.org.co/images/razas/raza_angus.jpg',
        desc: 'Originaria de Escocia, la raza Angus es reconocida mundialmente por su carne de marmoleo superior y terneza excepcional. De pelaje negro o rojo, sin cuernos (mocha), es altamente eficiente en la conversión de alimento y se adapta bien a sistemas intensivos y semi-intensivos. El sello "Certified Angus Beef" representa el estándar más alto en carne de res premium.',
        stats: [
            { label: 'Propósito', value: 'Cárnico' },
            { label: 'Peso adulto', value: '500 – 750 kg' },
            { label: 'GDP ceba', value: '1.2 – 1.6 kg' },
        ],
        tagsTitle: 'Características técnicas',
        tags: ['Marmoleo superior', 'Sin cuernos', 'Alta eficiencia', 'Fácil manejo', 'Excelente terneza'],
        links: [
            { label: 'ANGUS Colombia', url: 'https://asoangusbrangus.org.co' },
            { label: 'Certified Angus Beef', url: 'https://www.certifiedangusbeef.com' },
        ]
    },
    holstein: {
        eyebrow: 'Raza Lechera N°1 Mundial',
        title: 'Holstein Friesian',
        img: 'https://upload.wikimedia.org/wikipedia/commons/a/a8/Koe_zijaanzicht_2.JPG',
        desc: 'La Holstein es la raza lechera más productiva del mundo. Su manto blanco y negro es inconfundible. Requiere una dieta de alta calidad y manejo nutricional preciso para sostener su producción. Se utiliza en sistemas intensivos de todo el mundo y es base de la industria láctea comercial. El cruce con Cebú genera el GYR Lechero, muy común en Colombia.',
        stats: [
            { label: 'Leche / día', value: '25 – 45 L' },
            { label: 'Grasa', value: '3.5 – 4.0%' },
            { label: 'Sistema', value: 'Intensivo' },
        ],
        tagsTitle: 'Características técnicas',
        tags: ['Alta producción láctea', 'Requiere nutrición precisa', 'Sensible al calor', 'Larga vida productiva'],
        links: [
            { label: 'FEDEGAN', url: 'https://www.fedegan.org.co' },
        ]
    },
    brahman: {
        eyebrow: 'Raza Tropical',
        title: 'Brahman (Bos indicus)',
        img: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQv3lIeK4cZ4g7u_3WHY4cRiyGjWIKeW4ammQ&s',
        desc: 'El Brahman es la raza Bos indicus más extendida en las américas. Su giba dorsal, papada pendulosa y piel suelta y pigmentada le permiten disipar calor de manera eficiente. Es extraordinariamente resistente a garrapatas, moscas y parásitos, y tolera altas temperaturas y forrajes de baja calidad. Es la base genética de la mayoría de los cruces tropicales latinoamericanos.',
        stats: [
            { label: 'Clima', value: 'Tropical' },
            { label: 'Temperatura', value: '+35°C OK' },
            { label: 'Propósito', value: 'Doble propósito' },
        ],
        tagsTitle: 'Adaptaciones tropicales',
        tags: ['Resistente al calor', 'Anti-parásitos', 'Base de cruces', 'Forraje bajo calidad', 'Longevo'],
        links: [
            { label: 'ICA – Sanidad Bovina', url: 'https://www.ica.gov.co' },
        ]
    },
    nutricion: {
        eyebrow: 'Manejo Productivo',
        title: 'Manejo Nutricional Bovino',
        img: 'https://desarrollorural.yucatan.gob.mx/files-content/galerias/5e35b133328bb9efa0466a7ee62e7606.jpg',
        desc: 'La nutrición bovina varía significativamente según la etapa productiva del animal. Las vacas en lactación requieren mayor energía y proteína que los animales en mantenimiento. El pastoreo debe complementarse con sal mineralizada, y en sistemas intensivos con mezclas de concentrado. Un déficit nutricional se traduce directamente en menor ganancia de peso, problemas reproductivos y mayor susceptibilidad a enfermedades.',
        stats: [
            { label: 'Proteína (lactación)', value: '16 – 18%' },
            { label: 'Proteína (ceba)', value: '12 – 14%' },
            { label: 'Agua (adulto)', value: '50 – 80 L/día' },
        ],
        tagsTitle: 'Suplementos clave',
        tags: ['Sal mineralizada', 'Ensilaje de maíz', 'Heno de calidad', 'Concentrado energético', 'Bloques nutricionales'],
        links: []
    },
    sanidad: {
        eyebrow: 'Programa Sanitario',
        title: 'Control Sanitario Bovino',
        img: 'https://img.lalr.co/cms/2020/04/13165837/Eco_vacunacionAftosa_AGRO.jpg?r=4_3',
        desc: 'Un programa sanitario eficaz es la base de cualquier explotación bovina rentable. En Colombia, la vacunación contra fiebre aftosa y brucelosis es obligatoria por ley. Adicionalmente, se recomienda desparasitación estratégica (2-4 veces al año según la carga parasitaria), vitaminas liposolubles y examen de brucelosis y tuberculosis en reproductores.',
        stats: [
            { label: 'Vacuna aftosa', value: 'Obligatoria' },
            { label: 'Desparasitación', value: '2 – 4 x año' },
            { label: 'Entidad', value: 'ICA Colombia' },
        ],
        tagsTitle: 'Vacunas esenciales',
        tags: ['Fiebre Aftosa', 'Brucelosis', 'Carbón sintomático', 'Clostridiosis', 'IBR / DVB'],
        links: [
            { label: 'ICA – Vacunación', url: 'https://www.ica.gov.co' },
        ]
    },
    bienestar: {
        eyebrow: 'Bienestar Animal',
        title: 'Las 5 Libertades del Ganado',
        img: 'https://a.storyblok.com/f/160385/5302138987/bienestar_animal_listindiario_com.png/m/?w=256&q=100',
        desc: 'El bienestar animal no es solo un aspecto ético — tiene impacto directo en la productividad. El estrés crónico reduce la ganancia de peso, la fertilidad y el sistema inmune. Los cinco principios del bienestar animal reconocidos internacionalmente son: libre de hambre y sed, libre de incomodidad, libre de dolor, libre de expresar comportamientos naturales y libre de miedo.',
        stats: [
            { label: 'Norma', value: 'OIE / ICA' },
            { label: 'Impacto', value: '+15% productividad' },
            { label: 'Estándar', value: '5 Libertades' },
        ],
        tagsTitle: 'Principios clave',
        tags: ['Sin hambre ni sed', 'Sin incomodidad', 'Sin dolor', 'Comportamiento natural', 'Sin miedo'],
        links: [
            { label: 'OIE – Bienestar Animal', url: 'https://www.woah.org/es/nuestros-expertos/expertos/bienestar-animal/' },
        ]
    },
    extensivo: {
        eyebrow: 'Sistema de Pastoreo',
        title: 'Pastoreo Extensivo',
        img: 'https://www.uoc.edu/content/dam/news/images/noticies/2023/200-la-tecnologia-dona-pas-al-pasturatge-digital.jpg',
        desc: 'El pastoreo extensivo es el sistema más tradicional de producción bovina, donde los animales pastorean libremente en grandes áreas sin rotación de potreros. Si bien requiere menor inversión inicial, la baja carga animal por hectárea y el deterioro gradual de la pradera por sobrepastoreo reducen significativamente su rentabilidad a largo plazo. Se recomienda solo en ecosistemas de sabana o áreas remotas.',
        stats: [
            { label: 'Carga animal', value: '0.5 – 1 UA/ha' },
            { label: 'Inversión', value: 'Muy Baja' },
            { label: 'Rentabilidad', value: 'Baja – Media' },
        ],
        tagsTitle: 'Consideraciones',
        tags: ['Bajo costo inicial', 'Degradación de pradera', 'Baja productividad', 'Grandes extensiones'],
        links: []
    },
    rotacional: {
        eyebrow: 'Sistema de Pastoreo',
        title: 'Pastoreo Rotacional (Voisin)',
        img: 'https://infopastosyforrajes.com/wp-content/uploads/2020/04/Sistemas-de-Pastoreo-2.jpg',
        desc: 'El Pastoreo Racional Voisin (PRV) divide el potrero en franjas o subdivisiones que se ocupan por cortos períodos (1-3 días) con períodos de descanso de 30-60 días. Esta técnica maximiza la producción de biomasa del pasto, aumenta la carga animal por hectárea y mejora la condición corporal del ganado. La cerca eléctrica es la herramienta central de este sistema.',
        stats: [
            { label: 'Carga animal', value: '2 – 4 UA/ha' },
            { label: 'Descanso pasto', value: '30 – 60 días' },
            { label: 'Inversión', value: 'Media' },
        ],
        tagsTitle: 'Beneficios comprobados',
        tags: ['Mayor producción por ha', 'Pasto saludable', 'Cerca eléctrica', 'Menos insumos', 'Suelo mejorado'],
        links: [
            { label: 'AGROSAVIA – Pastoreo', url: 'https://www.agrosavia.co' },
        ]
    },
    feedlot: {
        eyebrow: 'Sistema Intensivo',
        title: 'Confinamiento (Feedlot)',
        img: 'https://a.storyblok.com/f/160385/a33fe0d0ac/aumentar-espacio-vital-ganado-esta-confinamiento.jpg',
        desc: 'El feedlot o engorde a corral es el sistema de producción más intensivo. Los animales permanecen en corrales de alta densidad y reciben una ración total mezclada (TMR) diseñada para maximizar la ganancia diaria de peso. Es el sistema dominante en Argentina, EE.UU. y Brasil para la producción de carne premium. Requiere alta inversión en infraestructura y nutrición, pero permite los mejores rendimientos en menor tiempo.',
        stats: [
            { label: 'GDP promedio', value: '1.2 – 1.8 kg' },
            { label: 'Días en corral', value: '90 – 150 días' },
            { label: 'Conversión', value: '5 – 7 kg MS/kg' },
        ],
        tagsTitle: 'Requerimientos clave',
        tags: ['TMR formulada', 'Agua ad libitum', 'Sombra y espacio', 'Control sanitario estricto', 'Alta inversión'],
        links: []
    }
};

function openCattleModal(key) {
    const data = cattleData[key];
    if (!data) return;

    document.getElementById('cattleModalImg').src           = data.img;
    document.getElementById('cattleModalEyebrow').textContent = data.eyebrow;
    document.getElementById('cattleModalTitle').textContent   = data.title;
    document.getElementById('cattleModalDesc').textContent    = data.desc;

    document.getElementById('cattleModalStats').innerHTML = data.stats.map(s => `
        <div class="modal-stat">
            <span>${s.label}</span>
            <span>${s.value}</span>
        </div>
    `).join('');

    document.getElementById('cattleModalTagsTitle').textContent = data.tagsTitle;
    document.getElementById('cattleModalTags').innerHTML = data.tags.map(t =>
        `<span class="modal-tag">${t}</span>`
    ).join('');

    const linksSection = document.getElementById('cattleModalLinks');
    if (data.links && data.links.length) {
        document.getElementById('cattleModalLinksList').innerHTML = data.links.map(l =>
            `<li><a href="${l.url}" target="_blank"><i class="fas fa-external-link-alt"></i> ${l.label}</a></li>`
        ).join('');
        linksSection.style.display = 'block';
    } else {
        linksSection.style.display = 'none';
    }

    document.getElementById('cattleModalOverlay').classList.add('open');
    document.body.style.overflow = 'hidden';
}

function closeCattleModal() {
    document.getElementById('cattleModalOverlay').classList.remove('open');
    document.body.style.overflow = '';
}

function closeCattleModalOutside(e) {
    if (e.target === document.getElementById('cattleModalOverlay')) closeCattleModal();
}

document.addEventListener('keydown', e => {
    if (e.key === 'Escape') closeCattleModal();
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection