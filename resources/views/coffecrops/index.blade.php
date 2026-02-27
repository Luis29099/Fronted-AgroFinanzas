@extends('layouts.app')

@section('body_class', 'coffee-theme')

@push('styles')
<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600&family=DM+Sans:wght@300;400;500;600&display=swap');

:root {
    --coffee-dark:   #1a0e08;
    --coffee-mid:    #2c1810;
    --coffee-warm:   #3d2012;
    --coffee-accent: #c8722a;
    --coffee-gold:   #e8a84c;
    --coffee-cream:  #f5ead8;
    --coffee-light:  #d4b896;
    --text-muted:    rgba(245,234,216,0.45);
    --card-bg:       rgba(44,24,16,0.7);
    --border:        rgba(200,114,42,0.18);
}

/* ── BASE ── */
.coffee-page {
    background: var(--coffee-dark);
    color: var(--coffee-cream);
    font-family: 'DM Sans', sans-serif;
    min-height: 100vh;
}

/* ── HERO ── */
.coffee-hero {
    position: relative;
    min-height: 72vh;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    background: var(--coffee-dark);
}
.coffee-hero-bg {
    position: absolute;
    inset: 0;
}
.coffee-hero-bg img {
    width: 100%; height: 100%;
    object-fit: cover;
    opacity: 0.25;
    filter: saturate(0.8);
}
.coffee-hero-bg::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(to bottom,
        rgba(26,14,8,0.4) 0%,
        rgba(26,14,8,0.1) 40%,
        rgba(26,14,8,0.85) 100%
    );
}
.coffee-hero-content {
    position: relative;
    z-index: 1;
    text-align: center;
    padding: 60px 20px;
    max-width: 800px;
}
.hero-eyebrow {
    font-size: 0.72rem;
    font-weight: 600;
    letter-spacing: 4px;
    text-transform: uppercase;
    color: var(--coffee-accent);
    margin-bottom: 16px;
    display: block;
}
.coffee-hero-content h1 {
    font-family: 'Playfair Display', serif;
    font-size: clamp(2.4rem, 6vw, 4rem);
    font-weight: 700;
    color: var(--coffee-cream);
    line-height: 1.1;
    margin-bottom: 18px;
}
.coffee-hero-content h1 em {
    font-style: italic;
    color: var(--coffee-gold);
}
.coffee-hero-content p {
    font-size: 1rem;
    color: var(--text-muted);
    line-height: 1.7;
    max-width: 540px;
    margin: 0 auto 30px;
}
.hero-scroll-indicator {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    margin-top: 40px;
    opacity: 0.4;
    animation: heroScroll 2s ease-in-out infinite;
}
.hero-scroll-indicator span { font-size: 0.68rem; letter-spacing: 2px; text-transform: uppercase; }
.hero-scroll-indicator i { font-size: 1.1rem; }
@keyframes heroScroll { 0%,100%{ transform:translateY(0); } 50%{ transform:translateY(6px); } }

/* ── SLIDER SECTION ── */
.coffee-slider-section {
    background: var(--coffee-mid);
    padding: 60px 20px;
}
.coffee-slider-section .container { max-width: 1100px; margin: 0 auto; }

.section-label {
    font-size: 0.7rem;
    font-weight: 600;
    letter-spacing: 3.5px;
    text-transform: uppercase;
    color: var(--coffee-accent);
    margin-bottom: 8px;
    display: block;
}
.section-heading {
    font-family: 'Playfair Display', serif;
    font-size: clamp(1.8rem, 4vw, 2.6rem);
    font-weight: 600;
    color: var(--coffee-cream);
    line-height: 1.15;
    margin-bottom: 6px;
}
.section-heading em { font-style: italic; color: var(--coffee-gold); }
.section-sub {
    font-size: 0.88rem;
    color: var(--text-muted);
    margin-bottom: 36px;
    max-width: 520px;
}

.coffee-divider {
    border: none;
    height: 1px;
    background: linear-gradient(90deg, transparent, var(--coffee-accent), transparent);
    opacity: 0.25;
    margin: 0;
}

/* ── CAROUSEL ── */
.cafe-carousel-wrap {
    background: rgba(0,0,0,0.3);
    border: 1px solid var(--border);
    border-radius: 20px;
    overflow: hidden;
}
.carousel-inner.styled-carousel { padding: 0; background: transparent; }
.carousel-item-inner {
    display: grid;
    grid-template-columns: 1fr 1fr;
    min-height: 340px;
    align-items: center;
}
.carousel-item-img {
    height: 340px;
    overflow: hidden;
}
.carousel-item-img img {
    width: 100%; height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
}
.carousel-item.active .carousel-item-img img { transform: scale(1.03); }
.carousel-item-text {
    padding: 40px 50px;
}
.carousel-item-text h2 {
    font-family: 'Playfair Display', serif;
    font-size: 1.9rem;
    font-weight: 600;
    color: var(--coffee-cream);
    margin-bottom: 12px;
}
.carousel-item-text p {
    font-size: 0.9rem;
    color: var(--text-muted);
    line-height: 1.7;
    margin-bottom: 24px;
}
.cafe-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 24px;
    border: 1px solid rgba(200,114,42,0.4);
    border-radius: 999px;
    background: transparent;
    color: var(--coffee-gold);
    font-family: 'DM Sans', sans-serif;
    font-size: 0.8rem;
    font-weight: 600;
    letter-spacing: 1px;
    text-transform: uppercase;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.3s ease;
}
.cafe-btn:hover {
    background: rgba(200,114,42,0.12);
    border-color: var(--coffee-gold);
    color: var(--coffee-gold);
    transform: translateY(-1px);
}
.cafe-btn-filled {
    background: var(--coffee-accent);
    border-color: var(--coffee-accent);
    color: #fff;
}
.cafe-btn-filled:hover { background: var(--coffee-gold); border-color: var(--coffee-gold); color: #1a0e08; }

.carousel-indicators { bottom: 14px; }
.carousel-indicators button {
    width: 28px; height: 3px;
    border-radius: 2px;
    background: rgba(200,114,42,0.3);
    border: none;
    opacity: 1;
    transition: all 0.3s;
}
.carousel-indicators button.active { background: var(--coffee-accent); width: 44px; }
.carousel-control-prev, .carousel-control-next {
    width: 48px; height: 48px;
    background: rgba(200,114,42,0.15);
    border: 1px solid var(--border);
    border-radius: 50%;
    top: 50%; transform: translateY(-50%);
    opacity: 1;
    transition: all 0.3s;
}
.carousel-control-prev { left: 16px; }
.carousel-control-next { right: 16px; }
.carousel-control-prev:hover, .carousel-control-next:hover { background: rgba(200,114,42,0.35); }

/* ── VARIETIES SECTION ── */
.varieties-section {
    padding: 80px 20px;
    background: var(--coffee-dark);
}
.varieties-section .container { max-width: 1100px; margin: 0 auto; }

/* ── CARDS ── */
.coffee-cards-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
    margin-top: 40px;
}
.coffee-card-pro {
    background: var(--card-bg);
    border: 1px solid var(--border);
    border-radius: 16px;
    overflow: hidden;
    cursor: pointer;
    transition: all 0.35s ease;
    position: relative;
}
.coffee-card-pro::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(200,114,42,0.05), transparent);
    opacity: 0;
    transition: opacity 0.35s;
    pointer-events: none;
    z-index: 0;
}
.coffee-card-pro:hover {
    transform: translateY(-6px);
    border-color: rgba(200,114,42,0.4);
    box-shadow: 0 20px 50px rgba(0,0,0,0.5), 0 0 0 1px rgba(200,114,42,0.15);
}
.coffee-card-pro:hover::before { opacity: 1; }

.card-img-wrap {
    height: 210px;
    overflow: hidden;
    position: relative;
}
.card-img-wrap img {
    width: 100%; height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}
.coffee-card-pro:hover .card-img-wrap img { transform: scale(1.06); }

.card-badge {
    position: absolute;
    top: 12px; right: 12px;
    background: rgba(26,14,8,0.85);
    border: 1px solid var(--border);
    color: var(--coffee-gold);
    font-size: 0.65rem;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    padding: 4px 10px;
    border-radius: 999px;
    backdrop-filter: blur(6px);
}

.card-body-pro {
    padding: 22px;
    position: relative;
    z-index: 1;
}
.card-body-pro h5 {
    font-family: 'Playfair Display', serif;
    font-size: 1.25rem;
    font-weight: 600;
    color: var(--coffee-cream);
    margin-bottom: 6px;
}
.card-body-pro p {
    font-size: 0.82rem;
    color: var(--text-muted);
    line-height: 1.6;
    margin-bottom: 16px;
}

.card-stats {
    display: flex;
    gap: 16px;
    margin-bottom: 16px;
}
.card-stat {
    display: flex;
    flex-direction: column;
    gap: 2px;
}
.card-stat span:first-child {
    font-size: 0.62rem;
    font-weight: 600;
    letter-spacing: 1px;
    text-transform: uppercase;
    color: rgba(200,114,42,0.6);
}
.card-stat span:last-child {
    font-size: 0.82rem;
    color: var(--coffee-cream);
    font-weight: 500;
}

.card-open-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 0.76rem;
    font-weight: 600;
    color: var(--coffee-accent);
    background: none;
    border: none;
    cursor: pointer;
    padding: 0;
    font-family: 'DM Sans', sans-serif;
    transition: color 0.2s;
    letter-spacing: 0.5px;
}
.card-open-btn:hover { color: var(--coffee-gold); }
.card-open-btn i { font-size: 0.7rem; transition: transform 0.2s; }
.card-open-btn:hover i { transform: translateX(3px); }

/* ── PROCESS SECTION ── */
.process-section {
    padding: 80px 20px;
    background: var(--coffee-mid);
}
.process-section .container { max-width: 1100px; margin: 0 auto; }

.timeline-pro {
    list-style: none;
    padding: 0;
    margin: 0;
    position: relative;
}
.timeline-pro::before {
    content: '';
    position: absolute;
    left: 17px; top: 0; bottom: 0;
    width: 1px;
    background: linear-gradient(to bottom, transparent, var(--coffee-accent), transparent);
    opacity: 0.3;
}
.timeline-pro li {
    display: flex;
    gap: 20px;
    margin-bottom: 22px;
    position: relative;
}
.tl-dot {
    width: 36px; height: 36px;
    border-radius: 50%;
    background: var(--coffee-warm);
    border: 2px solid rgba(200,114,42,0.4);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    color: var(--coffee-gold);
    font-size: 0.75rem;
    z-index: 1;
    transition: all 0.3s;
}
.timeline-pro li:hover .tl-dot {
    background: var(--coffee-accent);
    border-color: var(--coffee-gold);
    box-shadow: 0 0 16px rgba(200,114,42,0.35);
}
.tl-body { padding-top: 6px; }
.tl-body strong {
    display: block;
    font-size: 0.88rem;
    font-weight: 600;
    color: var(--coffee-cream);
    margin-bottom: 3px;
}
.tl-body p { font-size: 0.8rem; color: var(--text-muted); line-height: 1.55; margin: 0; }

.process-img-wrap {
    border-radius: 16px;
    overflow: hidden;
    border: 1px solid var(--border);
    position: relative;
}
.process-img-wrap img { width: 100%; height: 100%; object-fit: cover; display: block; }

.benefit-cards-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    margin-top: 40px;
}
.benefit-card {
    background: rgba(0,0,0,0.3);
    border: 1px solid var(--border);
    border-radius: 14px;
    padding: 24px;
    text-align: center;
    transition: all 0.3s ease;
}
.benefit-card:hover {
    border-color: rgba(200,114,42,0.4);
    background: rgba(200,114,42,0.06);
    transform: translateY(-3px);
}
.benefit-card-icon {
    width: 52px; height: 52px;
    border-radius: 50%;
    background: rgba(200,114,42,0.1);
    border: 1px solid rgba(200,114,42,0.25);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 14px;
    font-size: 1.2rem;
    color: var(--coffee-gold);
}
.benefit-card h5 {
    font-family: 'Playfair Display', serif;
    font-size: 1rem;
    color: var(--coffee-cream);
    margin-bottom: 8px;
}
.benefit-card p { font-size: 0.8rem; color: var(--text-muted); line-height: 1.6; margin: 0; }

/* ── HARVEST SECTION ── */
.harvest-section {
    padding: 80px 20px;
    background: var(--coffee-dark);
}
.harvest-section .container { max-width: 1100px; margin: 0 auto; }

/* ── NEWS SECTION ── */
.news-section {
    padding: 80px 20px;
    background: var(--coffee-mid);
}
.news-section .container { max-width: 1100px; margin: 0 auto; }

.news-cards-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
    margin-top: 40px;
}
.news-card-pro {
    background: var(--card-bg);
    border: 1px solid var(--border);
    border-radius: 14px;
    overflow: hidden;
    transition: all 0.3s ease;
}
.news-card-pro:hover {
    transform: translateY(-4px);
    border-color: rgba(200,114,42,0.35);
    box-shadow: 0 16px 40px rgba(0,0,0,0.4);
}
.news-card-img {
    height: 190px;
    overflow: hidden;
}
.news-card-img img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s; }
.news-card-pro:hover .news-card-img img { transform: scale(1.05); }
.news-card-body { padding: 20px; }
.news-card-body h5 {
    font-family: 'Playfair Display', serif;
    font-size: 1rem;
    color: var(--coffee-cream);
    margin-bottom: 8px;
    line-height: 1.4;
}
.news-card-body p {
    font-size: 0.8rem;
    color: var(--text-muted);
    line-height: 1.6;
    margin-bottom: 14px;
}
.news-link {
    font-size: 0.76rem;
    font-weight: 600;
    color: var(--coffee-accent);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    transition: color 0.2s;
}
.news-link:hover { color: var(--coffee-gold); }

/* ═══════════════════════════
   MODAL
═══════════════════════════ */
.coffee-modal-overlay {
    position: fixed;
    inset: 0;
    z-index: 9000;
    background: rgba(10,5,3,0.82);
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
.coffee-modal-overlay.open {
    opacity: 1;
    pointer-events: all;
}
.coffee-modal {
    background: linear-gradient(160deg, #2c1810 0%, #1f100a 100%);
    border: 1px solid rgba(200,114,42,0.25);
    border-radius: 24px;
    width: 100%;
    max-width: 820px;
    max-height: 90vh;
    overflow-y: auto;
    box-shadow: 0 40px 80px rgba(0,0,0,0.7), 0 0 0 1px rgba(200,114,42,0.08);
    transform: translateY(24px) scale(0.97);
    transition: transform 0.35s cubic-bezier(0.34,1.4,0.64,1);
    position: relative;
    scrollbar-width: thin;
    scrollbar-color: rgba(200,114,42,0.3) transparent;
}
.coffee-modal-overlay.open .coffee-modal {
    transform: translateY(0) scale(1);
}
.coffee-modal::-webkit-scrollbar { width: 4px; }
.coffee-modal::-webkit-scrollbar-track { background: transparent; }
.coffee-modal::-webkit-scrollbar-thumb { background: rgba(200,114,42,0.3); border-radius: 4px; }

.modal-close-btn {
    position: absolute;
    top: 16px; right: 18px;
    width: 34px; height: 34px;
    border-radius: 50%;
    background: rgba(255,255,255,0.06);
    border: 1px solid rgba(255,255,255,0.08);
    color: rgba(255,255,255,0.4);
    font-size: 0.9rem;
    cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    transition: all 0.2s;
    z-index: 10;
}
.modal-close-btn:hover { background: rgba(200,114,42,0.2); color: #fff; border-color: rgba(200,114,42,0.4); }

.modal-hero-img {
    width: 100%;
    height: 280px;
    object-fit: cover;
    border-radius: 24px 24px 0 0;
    display: block;
}
.modal-body-content {
    padding: 32px 36px 36px;
}
.modal-eyebrow {
    font-size: 0.66rem;
    font-weight: 700;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: var(--coffee-accent);
    margin-bottom: 8px;
    display: block;
}
.modal-title {
    font-family: 'Playfair Display', serif;
    font-size: 1.9rem;
    font-weight: 700;
    color: var(--coffee-cream);
    margin-bottom: 14px;
    line-height: 1.2;
}
.modal-desc {
    font-size: 0.9rem;
    color: rgba(245,234,216,0.6);
    line-height: 1.75;
    margin-bottom: 26px;
}
.modal-stats-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 14px;
    margin-bottom: 28px;
}
.modal-stat {
    background: rgba(0,0,0,0.3);
    border: 1px solid var(--border);
    border-radius: 12px;
    padding: 14px 16px;
    text-align: center;
}
.modal-stat span:first-child {
    display: block;
    font-size: 0.63rem;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    color: rgba(200,114,42,0.55);
    margin-bottom: 5px;
}
.modal-stat span:last-child {
    display: block;
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--coffee-cream);
}
.modal-section-title {
    font-family: 'Playfair Display', serif;
    font-size: 1.1rem;
    color: var(--coffee-gold);
    margin-bottom: 12px;
    font-style: italic;
}
.modal-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 24px;
}
.modal-tag {
    padding: 5px 14px;
    background: rgba(200,114,42,0.1);
    border: 1px solid rgba(200,114,42,0.2);
    border-radius: 999px;
    font-size: 0.76rem;
    color: var(--coffee-gold);
    font-weight: 500;
}
.modal-video-wrap {
    border-radius: 12px;
    overflow: hidden;
    border: 1px solid var(--border);
}
.modal-video-wrap iframe { display: block; width: 100%; height: 260px; }

/* ── RESPONSIVE ── */
@media (max-width: 900px) {
    .coffee-cards-grid, .news-cards-grid { grid-template-columns: repeat(2, 1fr); }
    .benefit-cards-grid { grid-template-columns: repeat(2, 1fr); }
    .carousel-item-inner { grid-template-columns: 1fr; }
    .carousel-item-img { height: 240px; }
    .carousel-item-text { padding: 28px 30px; }
    .modal-stats-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 600px) {
    .coffee-cards-grid, .news-cards-grid, .benefit-cards-grid { grid-template-columns: 1fr; }
    .modal-body-content { padding: 22px 20px 28px; }
    .modal-stats-grid { grid-template-columns: repeat(2, 1fr); }
    .modal-hero-img { height: 200px; }
}
</style>
@endpush

@section('content')
<div class="coffee-page">

    {{-- ── HERO ── --}}
    <section class="coffee-hero">
        <div class="coffee-hero-bg">
            <img src="https://images.unsplash.com/photo-1447933601403-0c6688de566e?w=1600" alt="Café">
        </div>
        <div class="coffee-hero-content">
            <span class="hero-eyebrow"><i class="fas fa-coffee"></i> &nbsp; AgroFinanzas</span>
            <h1>Cuidado y Manejo<br>del <em>Café</em></h1>
            <p>Desde el cultivo del cerezo hasta la taza perfecta — conoce las variedades, procesos y técnicas que definen el café de calidad.</p>
            <div class="hero-scroll-indicator">
                <span>Explorar</span>
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>
    </section>

    {{-- ── CAROUSEL ── --}}
    <section class="coffee-slider-section" id="slider">
        <div class="container">
            <div id="cafeCarousel" class="carousel slide cafe-carousel-wrap" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#cafeCarousel" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#cafeCarousel" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#cafeCarousel" data-bs-slide-to="2"></button>
                    <button type="button" data-bs-target="#cafeCarousel" data-bs-slide-to="3"></button>
                </div>
                <div class="carousel-inner styled-carousel">

                    <div class="carousel-item active">
                        <div class="carousel-item-inner">
                            <div class="carousel-item-img">
                                <img src="https://cafe1820.com/wp-content/uploads/2020/02/preview-lightbox-%C2%BFCu%C3%A1les-son-los-tipos-de-caf%C3%A9-m%C3%A1s-populares-en-el-mundo.jpg" alt="Tipos de Café">
                            </div>
                            <div class="carousel-item-text">
                                <h2>Tipos de Café</h2>
                                <p>Arábica suave, Robusta intenso, Liberica exótico — cada variedad cuenta una historia de sabor única.</p>
                                <a href="#tiposCafe" class="cafe-btn"><i class="fas fa-arrow-down"></i> Ver variedades</a>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="carousel-item-inner">
                            <div class="carousel-item-img">
                                <img src="https://perfectdailygrind.com/es/wp-content/uploads/sites/2/2022/03/image7-4.png" alt="Viaje del Grano">
                            </div>
                            <div class="carousel-item-text">
                                <h2>El Viaje del Grano</h2>
                                <p>Del cerezo al tostado final — cada etapa transforma el grano y define el carácter de tu taza.</p>
                                <a href="#procesoCafe" class="cafe-btn"><i class="fas fa-arrow-down"></i> Ver proceso</a>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="carousel-item-inner">
                            <div class="carousel-item-img">
                                <img src="https://perfectdailygrind.com/es/wp-content/uploads/sites/2/2019/11/@fincaelreposo-3.jpg" alt="Cosecha">
                            </div>
                            <div class="carousel-item-text">
                                <h2>Técnicas de Cosecha</h2>
                                <p>Selectiva, por barrido o mecánica — el método de recolección impacta directamente la calidad del grano.</p>
                                <a href="#metodosCosecha" class="cafe-btn"><i class="fas fa-arrow-down"></i> Ver métodos</a>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="carousel-item-inner">
                            <div class="carousel-item-img">
                                <img src="https://png.pngtree.com/background/20250125/original/pngtree-cup-of-coffee-with-mist-laptop-coffee-leaf-at-breakfast-picture-image_15539570.jpg" alt="Noticias">
                            </div>
                            <div class="carousel-item-text">
                                <h2>Actualidad Cafetera</h2>
                                <p>Mantente al día con noticias, precios y tendencias del mundo del café a nivel global.</p>
                                <a href="#noticiasCafe" class="cafe-btn"><i class="fas fa-arrow-down"></i> Ir a noticias</a>
                            </div>
                        </div>
                    </div>

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#cafeCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#cafeCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </section>

    <div class="coffee-divider"></div>

    {{-- ── VARIETIES ── --}}
    <section class="varieties-section" id="tiposCafe">
        <div class="container">
            <span class="section-label">Variedades</span>
            <h2 class="section-heading">Principales <em>Especies</em></h2>
            <p class="section-sub">Cada variedad tiene un perfil único de sabor, cafeína y adaptación climática.</p>

            <div class="coffee-cards-grid">

                {{-- Card: Arábica --}}
                <div class="coffee-card-pro" onclick="openCoffeeModal('arabica')">
                    <div class="card-img-wrap">
                        <img src="https://cafeyciencia.com/wp-content/uploads/2018/02/2018-02-01-4.png" alt="Arábica">
                        <span class="card-badge">Alta Calidad</span>
                    </div>
                    <div class="card-body-pro">
                        <h5>Café Arábica</h5>
                        <p>El café más apreciado a nivel mundial. Sabor suave, aromático y complejo.</p>
                        <div class="card-stats">
                            <div class="card-stat">
                                <span>Cafeína</span>
                                <span>~1.5%</span>
                            </div>
                            <div class="card-stat">
                                <span>Perfil</span>
                                <span>Dulce y frutal</span>
                            </div>
                        </div>
                        <button class="card-open-btn">Ver detalles <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>

                {{-- Card: Robusta --}}
                <div class="coffee-card-pro" onclick="openCoffeeModal('robusta')">
                    <div class="card-img-wrap">
                        <img src="https://perfectdailygrind.com/wp-content/uploads/2020/06/Fine-Robusta-Brazil-2.jpg" alt="Robusta">
                        <span class="card-badge">Alta Cafeína</span>
                    </div>
                    <div class="card-body-pro">
                        <h5>Café Robusta</h5>
                        <p>Cuerpo intenso, amargo y terroso. Ideal para espresso y café instantáneo.</p>
                        <div class="card-stats">
                            <div class="card-stat">
                                <span>Cafeína</span>
                                <span>2.5 – 4.5%</span>
                            </div>
                            <div class="card-stat">
                                <span>Perfil</span>
                                <span>Fuerte y terroso</span>
                            </div>
                        </div>
                        <button class="card-open-btn">Ver detalles <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>

                {{-- Card: Liberica --}}
                <div class="coffee-card-pro" onclick="openCoffeeModal('liberica')">
                    <div class="card-img-wrap">
                        <img src="https://api.globy.com/public/market/66ba04c4104aa800965833bd/photos/66ba04c4104aa800965833c4/66ba04c4104aa800965833c4_lg.webp" alt="Liberica">
                        <span class="card-badge">Exótico</span>
                    </div>
                    <div class="card-body-pro">
                        <h5>Café Liberica</h5>
                        <p>Opción poco común, muy apreciada por su perfil ahumado y frutal único.</p>
                        <div class="card-stats">
                            <div class="card-stat">
                                <span>Cafeína</span>
                                <span>Media-Baja</span>
                            </div>
                            <div class="card-stat">
                                <span>Perfil</span>
                                <span>Ahumado y floral</span>
                            </div>
                        </div>
                        <button class="card-open-btn">Ver detalles <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="coffee-divider"></div>

    {{-- ── PROCESS ── --}}
    <section class="process-section" id="procesoCafe">
        <div class="container">
            <span class="section-label">Proceso</span>
            <h2 class="section-heading">Del Cerezo<br><em>a la Taza</em></h2>
            <p class="section-sub">Cada paso del procesado transforma el grano y construye el sabor final.</p>

            <div class="row align-items-start mt-5">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <ul class="timeline-pro">
                        <li>
                            <div class="tl-dot"><i class="fas fa-seedling"></i></div>
                            <div class="tl-body">
                                <strong>Cultivo & Recolección</strong>
                                <p>La cereza madura es cosechada manualmente o con maquinaria según el sistema productivo.</p>
                            </div>
                        </li>
                        <li>
                            <div class="tl-dot"><i class="fas fa-cogs"></i></div>
                            <div class="tl-body">
                                <strong>Beneficio (Despulpado)</strong>
                                <p>Se retira la pulpa exterior para exponer el grano y comenzar el desarrollo de aromas.</p>
                            </div>
                        </li>
                        <li>
                            <div class="tl-dot"><i class="fas fa-water"></i></div>
                            <div class="tl-body">
                                <strong>Fermentación & Lavado</strong>
                                <p>Proceso clave para desarrollar los precursores aromáticos y la acidez característica.</p>
                            </div>
                        </li>
                        <li>
                            <div class="tl-dot"><i class="fas fa-sun"></i></div>
                            <div class="tl-body">
                                <strong>Secado</strong>
                                <p>Se reduce la humedad del grano al 10–12% para garantizar su conservación.</p>
                            </div>
                        </li>
                        <li>
                            <div class="tl-dot"><i class="fas fa-boxes"></i></div>
                            <div class="tl-body">
                                <strong>Trilla & Exportación</strong>
                                <p>Se retira el pergamino, se clasifica por calidad y se prepara para exportación.</p>
                            </div>
                        </li>
                        <li>
                            <div class="tl-dot"><i class="fas fa-fire"></i></div>
                            <div class="tl-body">
                                <strong>Tostado</strong>
                                <p>El perfil final — claro, medio u oscuro — nace en esta etapa crítica y artesanal.</p>
                            </div>
                        </li>
                    </ul>

                    <div class="mt-4">
                        <div class="ratio ratio-16x9 process-img-wrap" style="max-width:100%; border-radius:14px; overflow:hidden;">
                            <iframe src="https://www.youtube.com/embed/aQtn0_QSzfI" title="Proceso del café" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="process-img-wrap" style="height: 320px; margin-bottom: 24px;">
                        <img src="https://cafearabo.com/wp-content/uploads/2021/04/blends-scaled.jpg" alt="Proceso café" style="width:100%; height:100%; object-fit:cover;">
                    </div>

                    <div class="benefit-cards-grid">
                        <div class="benefit-card" onclick="openCoffeeModal('natural')" style="cursor:pointer">
                            <div class="benefit-card-icon"><i class="fas fa-leaf"></i></div>
                            <h5>Natural</h5>
                            <p>Fruto seco entero. Perfil muy afrutado y dulce con mucho cuerpo.</p>
                        </div>
                        <div class="benefit-card" onclick="openCoffeeModal('honey')" style="cursor:pointer">
                            <div class="benefit-card-icon"><i class="fas fa-star"></i></div>
                            <h5>Honey</h5>
                            <p>Mucílago parcial. Balance entre dulzor y limpieza de taza.</p>
                        </div>
                        <div class="benefit-card" onclick="openCoffeeModal('lavado')" style="cursor:pointer">
                            <div class="benefit-card-icon"><i class="fas fa-tint"></i></div>
                            <h5>Lavado</h5>
                            <p>Mucílago total removido. Sabor limpio, brillante y ácido.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="coffee-divider"></div>

    {{-- ── HARVEST ── --}}
    <section class="harvest-section" id="metodosCosecha">
        <div class="container">
            <span class="section-label">Cosecha</span>
            <h2 class="section-heading">Métodos de <em>Recolección</em></h2>
            <p class="section-sub">El método de cosecha determina la uniformidad y la calidad del lote final.</p>

            <div class="coffee-cards-grid" style="margin-top: 40px;">

                <div class="coffee-card-pro" onclick="openCoffeeModal('selectiva')">
                    <div class="card-img-wrap">
                        <img src="https://perfectdailygrind.com/es/wp-content/uploads/sites/2/2021/01/Recoleccion-Selectiva-1.jpg" alt="Selectiva">
                        <span class="card-badge">Premium</span>
                    </div>
                    <div class="card-body-pro">
                        <h5>Cosecha Selectiva</h5>
                        <p>Solo frutos maduros a mano. Máxima calidad y homogeneidad del lote.</p>
                        <div class="card-stats">
                            <div class="card-stat"><span>Tipo</span><span>Manual</span></div>
                            <div class="card-stat"><span>Calidad</span><span>Muy Alta</span></div>
                        </div>
                        <button class="card-open-btn">Ver detalles <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>

                <div class="coffee-card-pro" onclick="openCoffeeModal('barrido')">
                    <div class="card-img-wrap">
                        <img src="https://www.eje21.com.co/site/wp-content/uploads/2020/07/recolector-de-cafe.-imagen-gobernacion-de-caldas..jpg" alt="Barrido">
                        <span class="card-badge">Rápido</span>
                    </div>
                    <div class="card-body-pro">
                        <h5>Recolección por Barrido</h5>
                        <p>Todos los frutos de una vez. Más eficiente pero menos uniforme en calidad.</p>
                        <div class="card-stats">
                            <div class="card-stat"><span>Tipo</span><span>Manual</span></div>
                            <div class="card-stat"><span>Calidad</span><span>Media</span></div>
                        </div>
                        <button class="card-open-btn">Ver detalles <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>

                <div class="coffee-card-pro" onclick="openCoffeeModal('mecanica')">
                    <div class="card-img-wrap">
                        <img src="https://www.mundocafeto.com/wp-content/uploads/2018/06/1-Recolecci%C3%B3n-mec%C3%A1nica-de-caf%C3%A9-1.jpg" alt="Mecánica">
                        <span class="card-badge">Industrial</span>
                    </div>
                    <div class="card-body-pro">
                        <h5>Cosecha Mecánica</h5>
                        <p>Máquinas vibradoras en terrenos planos. Alta eficiencia para grandes volúmenes.</p>
                        <div class="card-stats">
                            <div class="card-stat"><span>Tipo</span><span>Mecánico</span></div>
                            <div class="card-stat"><span>Escala</span><span>Industrial</span></div>
                        </div>
                        <button class="card-open-btn">Ver detalles <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="coffee-divider"></div>

    {{-- ── NEWS ── --}}
    <section class="news-section" id="noticiasCafe">
        <div class="container">
            <span class="section-label">Actualidad</span>
            <h2 class="section-heading">Noticias del<br><em>Mundo Cafetero</em></h2>
            <p class="section-sub">Últimas tendencias, precios y novedades del sector caficultor.</p>

            <div class="news-cards-grid">
                @forelse($noticias as $noticia)
                    <div class="news-card-pro">
                        <div class="news-card-img">
                            <img src="{{ $noticia['urlToImage'] ?? 'https://images.unsplash.com/photo-1447933601403-0c6688de566e?w=600' }}" alt="{{ $noticia['title'] }}">
                        </div>
                        <div class="news-card-body">
                            <h5>{{ $noticia['title'] }}</h5>
                            <p>{{ Str::limit($noticia['description'] ?? 'Haz clic para leer el artículo completo.', 100) }}</p>
                            <a href="{{ $noticia['url'] }}" target="_blank" class="news-link">Leer artículo <i class="fas fa-external-link-alt"></i></a>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center" style="color: var(--text-muted);">
                        <i class="fas fa-newspaper" style="font-size:2rem; margin-bottom:10px; display:block;"></i>
                        No se encontraron noticias en este momento.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

</div>

{{-- ═══════════════════════
     COFFEE MODAL
════════════════════════ --}}
<div class="coffee-modal-overlay" id="coffeeModalOverlay" onclick="closeCoffeeModalOutside(event)">
    <div class="coffee-modal" id="coffeeModal">
        <button class="modal-close-btn" onclick="closeCoffeeModal()"><i class="fas fa-times"></i></button>
        <img class="modal-hero-img" id="modalHeroImg" src="" alt="">
        <div class="modal-body-content">
            <span class="modal-eyebrow" id="modalEyebrow"></span>
            <h2 class="modal-title" id="modalTitle"></h2>
            <p class="modal-desc" id="modalDesc"></p>
            <div class="modal-stats-grid" id="modalStats"></div>
            <h4 class="modal-section-title" id="modalTagsTitle"></h4>
            <div class="modal-tags" id="modalTags"></div>
            <div class="modal-video-wrap" id="modalVideoWrap" style="display:none">
                <iframe id="modalVideo" src="" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

<script>
const coffeeData = {
    arabica: {
        eyebrow: 'Variedad Premium',
        title: 'Café Arábica',
        img: 'https://cafeyciencia.com/wp-content/uploads/2018/02/2018-02-01-4.png',
        desc: 'Coffea arabica es la especie de mayor valor comercial y la más consumida en el mundo. Originaria de las tierras altas de Etiopía, se cultiva principalmente entre 1.200 y 2.200 msnm. Su grano contiene menos cafeína que el Robusta, lo que contribuye a su sabor suave y dulce con notas de frutas, flores y chocolate.',
        stats: [
            { label: 'Cafeína', value: '~1.5%' },
            { label: 'Altitud', value: '1.200 – 2.200 m' },
            { label: 'Acidez', value: 'Alta a Media' },
        ],
        tagsTitle: 'Características del perfil',
        tags: ['Dulce', 'Aromático', 'Frutal', 'Floral', 'Suave', 'Complejo'],
        video: null
    },
    robusta: {
        eyebrow: 'Alto Contenido de Cafeína',
        title: 'Café Robusta',
        img: 'https://perfectdailygrind.com/wp-content/uploads/2020/06/Fine-Robusta-Brazil-2.jpg',
        desc: 'Coffea canephora (Robusta) es más resistente a plagas y enfermedades que el Arábica, y produce mejor en altitudes bajas. Contiene casi el doble de cafeína, lo que le da mayor amargura y cuerpo. Es fundamental en mezclas de espresso y en la producción de café instantáneo por su crema densa.',
        stats: [
            { label: 'Cafeína', value: '2.5 – 4.5%' },
            { label: 'Altitud', value: '0 – 1.000 m' },
            { label: 'Cuerpo', value: 'Muy Alto' },
        ],
        tagsTitle: 'Características del perfil',
        tags: ['Fuerte', 'Amargo', 'Terroso', 'Mucho Cuerpo', 'Crema densa'],
        video: null
    },
    liberica: {
        eyebrow: 'Variedad Exótica',
        title: 'Café Liberica',
        img: 'https://api.globy.com/public/market/66ba04c4104aa800965833bd/photos/66ba04c4104aa800965833c4/66ba04c4104aa800965833c4_lg.webp',
        desc: 'Coffea liberica es una especie poco comercial pero muy apreciada por los conocedores. Nativa de África Occidental, produce granos asimétricos más grandes que el Arábica. Su perfil de sabor es único: notas ahumadas, maderosas y afrutadas con una acidez media y un aroma muy distintivo.',
        stats: [
            { label: 'Cafeína', value: 'Media-Baja' },
            { label: 'Origen', value: 'África Occidental' },
            { label: 'Producción', value: 'Muy Limitada' },
        ],
        tagsTitle: 'Características del perfil',
        tags: ['Ahumado', 'Maderoso', 'Floral', 'Exótico', 'Afrutado'],
        video: null
    },
    natural: {
        eyebrow: 'Proceso de Beneficio',
        title: 'Proceso Natural',
        img: 'https://ineffablecoffee.com/cdn/shop/articles/blog-ineffable-coffee-proceso-natural-featured_31acac96-c706-44cf-a0a5-6d4bd77e8826.jpg?v=1759146546&width=2048',
        desc: 'El proceso natural (o seco) es el más antiguo. El fruto entero con su cereza se seca directamente al sol por 3 a 6 semanas. El grano absorbe los azúcares y aromas de la pulpa durante el secado, generando un perfil de sabor intensamente frutal, dulce y con mucho cuerpo.',
        stats: [
            { label: 'Dulzor', value: 'Muy Alto' },
            { label: 'Cuerpo', value: 'Alto' },
            { label: 'Acidez', value: 'Baja' },
        ],
        tagsTitle: 'Notas de cata típicas',
        tags: ['Arándano', 'Mango', 'Vino', 'Miel', 'Chocolate negro'],
        video: null
    },
    honey: {
        eyebrow: 'Proceso de Beneficio',
        title: 'Proceso Honey',
        img: 'https://www.cafebritt.com/cdn/shop/articles/blog-honey-processed-coffee_bd5d2a8a-c490-4e49-94a9-95cc3abe69a2.webp?v=1752698091',
        desc: 'En el proceso honey se retira la pulpa exterior pero se deja parte del mucílago (la capa pegajosa) en el grano durante el secado. Según la cantidad de mucílago que permanece, el proceso se clasifica en Yellow, Red o Black Honey. El resultado es un café con mayor dulzor que el lavado y más limpieza que el natural.',
        stats: [
            { label: 'Dulzor', value: 'Alto' },
            { label: 'Cuerpo', value: 'Medio-Alto' },
            { label: 'Acidez', value: 'Media' },
        ],
        tagsTitle: 'Notas de cata típicas',
        tags: ['Durazno', 'Caramelo', 'Miel', 'Albaricoque', 'Flores'],
        video: null
    },
    lavado: {
        eyebrow: 'Proceso de Beneficio',
        title: 'Proceso Lavado',
        img: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS6asjCz-Kgp-WeyY4Uif7RCWzsKGo_cgbSbA&s',
        desc: 'El proceso lavado o húmedo elimina completamente el mucílago antes del secado mediante fermentación y lavado con agua. Esto produce un café de taza limpia donde el perfil del grano y el terroir se expresan con mayor claridad. Es el método preferido para cafés de especialidad de alta acidez.',
        stats: [
            { label: 'Dulzor', value: 'Medio' },
            { label: 'Limpieza', value: 'Muy Alta' },
            { label: 'Acidez', value: 'Alta y Brillante' },
        ],
        tagsTitle: 'Notas de cata típicas',
        tags: ['Cítrico', 'Limón', 'Té negro', 'Floral', 'Limpio'],
        video: null
    },
    selectiva: {
        eyebrow: 'Método Premium',
        title: 'Cosecha Selectiva',
        img: 'https://perfectdailygrind.com/es/wp-content/uploads/sites/2/2021/01/Recoleccion-Selectiva-1.jpg',
        desc: 'La cosecha selectiva (picking) es la técnica más costosa y laboriosa, pero produce el café de mayor calidad. Los recolectores recogen únicamente los frutos de color rojo (o amarillo según la variedad) perfectamente maduros, pasando varias veces por la misma planta para ir cosechando a medida que maduran. Garantiza homogeneidad y calidad de taza superior.',
        stats: [
            { label: 'Calidad', value: 'Muy Alta' },
            { label: 'Uniformidad', value: 'Excelente' },
            { label: 'Costo', value: 'Alto' },
        ],
        tagsTitle: 'Ventajas clave',
        tags: ['Solo frutos maduros', 'Homogeneidad total', 'Mejor precio comercial', 'Menos defectos'],
        video: null
    },
    barrido: {
        eyebrow: 'Método Rápido',
        title: 'Recolección por Barrido',
        img: 'https://www.eje21.com.co/site/wp-content/uploads/2020/07/recolector-de-cafe.-imagen-gobernacion-de-caldas..jpg',
        desc: 'La recolección por barrido (stripping) consiste en desgranar toda la rama de una sola pasada, recogiendo frutos en distintos estados de madurez. Es significativamente más rápido y económico que la cosecha selectiva, pero la mezcla de frutos verdes, maduros y sobremaduros afecta la uniformidad y calidad del lote.',
        stats: [
            { label: 'Velocidad', value: 'Alta' },
            { label: 'Uniformidad', value: 'Media' },
            { label: 'Costo', value: 'Bajo' },
        ],
        tagsTitle: 'Consideraciones',
        tags: ['Rápido', 'Económico', 'Mezcla de madurez', 'Requiere clasificación posterior'],
        video: null
    },
    mecanica: {
        eyebrow: 'Método Industrial',
        title: 'Cosecha Mecánica',
        img: 'https://www.mundocafeto.com/wp-content/uploads/2018/06/1-Recolecci%C3%B3n-mec%C3%A1nica-de-caf%C3%A9-1.jpg',
        desc: 'La cosecha mecánica utiliza máquinas derribadoras o vibradoras que golpean el tronco o las ramas para desprender los frutos. Solo es viable en terrenos con pendiente baja (menor al 10%) y cultivos de alta densidad. Se aplica principalmente en Brasil, el mayor productor mundial. Maximiza la eficiencia pero requiere clasificación posterior intensiva.',
        stats: [
            { label: 'Escala', value: 'Industrial' },
            { label: 'Eficiencia', value: 'Máxima' },
            { label: 'Terreno', value: 'Plano (< 10%)' },
        ],
        tagsTitle: 'Aplicación típica',
        tags: ['Brasil', 'Grandes fincas', 'Café commodity', 'Muy eficiente'],
        video: null
    }
};

function openCoffeeModal(key) {
    const data = coffeeData[key];
    if (!data) return;

    document.getElementById('modalHeroImg').src    = data.img;
    document.getElementById('modalEyebrow').textContent = data.eyebrow;
    document.getElementById('modalTitle').textContent   = data.title;
    document.getElementById('modalDesc').textContent    = data.desc;

    const statsEl = document.getElementById('modalStats');
    statsEl.innerHTML = data.stats.map(s => `
        <div class="modal-stat">
            <span>${s.label}</span>
            <span>${s.value}</span>
        </div>
    `).join('');

    document.getElementById('modalTagsTitle').textContent = data.tagsTitle;
    const tagsEl = document.getElementById('modalTags');
    tagsEl.innerHTML = data.tags.map(t => `<span class="modal-tag">${t}</span>`).join('');

    const videoWrap = document.getElementById('modalVideoWrap');
    if (data.video) {
        document.getElementById('modalVideo').src = data.video;
        videoWrap.style.display = 'block';
    } else {
        videoWrap.style.display = 'none';
        document.getElementById('modalVideo').src = '';
    }

    document.getElementById('coffeeModalOverlay').classList.add('open');
    document.body.style.overflow = 'hidden';
}

function closeCoffeeModal() {
    document.getElementById('coffeeModalOverlay').classList.remove('open');
    document.getElementById('modalVideo').src = '';
    document.body.style.overflow = '';
}

function closeCoffeeModalOutside(e) {
    if (e.target === document.getElementById('coffeeModalOverlay')) closeCoffeeModal();
}

document.addEventListener('keydown', e => {
    if (e.key === 'Escape') closeCoffeeModal();
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection