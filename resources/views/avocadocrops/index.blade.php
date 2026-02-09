@extends('layouts.app')

{{-- 1. APLICA EL TEMA OSCURO (Reutilizando la lógica de Cattle Theme) --}}
@section('body_class', 'cattle-theme') 

@section('content')
<div class="cattle-main container">
    <h1 class="main-title text-center mb-5">Manual Técnico del Cultivo de Aguacate</h1>
    
    {{-- Slider de Introducción --}}
    <section class="cattle-slider py-5">
        <div id="avocadoCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#avocadoCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#avocadoCarousel" data-bs-slide-to="1"></button>
            </div>

            <div class="carousel-inner p-4 p-md-5 rounded main-card" style="background-color: var(--color-coffee-darker);"> 
                {{-- Slide 1: Variedades --}}
                <div class="carousel-item active">
                    <div class="row align-items-center">
                        <div class="col-md-6 order-md-2">
                            <img src="https://www.reyesgutierrez.com/wp-content/uploads/2021/04/aguacate-hass.jpg" class="img-fluid rounded shadow-lg slider-img" alt="Aguacate Hass">
                        </div>
                        <div class="col-md-6 order-md-1 slider-text">
                            <h2 class="slide-title">Variedades de Exportación</h2>
                            <p class="text-light-cattle">
                                Desde el estándar mundial **Hass** hasta variedades tropicales como **Lorena**. 
                                La elección de la semilla define el éxito de su mercado.
                            </p>
                            <a href="#variedadesAguacate" class="btn btn-cattle-primary scroll-suave">Ver Variedades</a>
                        </div>
                    </div>
                </div>

                {{-- Slide 2: Manejo Técnico --}}
                <div class="carousel-item">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <img src="https://www.bbva.com/wp-content/uploads/2021/09/BBVA-tecnologias_riego_eficientes-sostenibilidad-innovacion.jpg" class="img-fluid rounded shadow-lg slider-img" alt="Riego Aguacate">
                        </div>
                        <div class="col-md-6 slider-text">
                            <h2 class="slide-title">Tecnología de Riego</h2>
                            <p class="text-light-cattle">
                                El aguacate requiere precisión hídrica. Evite la asfixia radicular mediante sistemas 
                                de microaspersión y monitoreo constante de humedad.
                            </p>
                            <a href="#procesoAguacate" class="btn btn-cattle-primary scroll-suave">Ver Plan de Manejo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <hr class="cattle-divider">

    {{-- Sección de Variedades --}}
    <section id="variedadesAguacate" class="py-5">
        <h2 class="section-title text-center mb-4">Principales Variedades</h2>
        <p class="section-subtitle text-center mb-5">Seleccione el cultivar según la altitud y clima de su predio.</p>

        <div class="row g-4 mt-4">
            {{-- Hass --}}
            <div class="col-md-4">
                <div class="card cattle-card h-100 shadow">
                    <img src="https://www.reyesgutierrez.com/wp-content/uploads/2021/04/aguacate-hass.jpg" class="card-img-top card-image" alt="Hass">
                    <div class="card-body">
                        <h5 class="card-title">Hass (Premium)</h5>
                        <p class="card-text">
                            <strong class="text-cattle-accent">Mercado:</strong> Internacional (Exportación).
                            <br><strong class="text-cattle-accent">Clima:</strong> Templado (1.600 - 2.400 msnm).
                            <br><strong class="text-cattle-accent">Nota:</strong> Alto contenido de aceite y sabor a nuez.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Lorena --}}
            <div class="col-md-4">
                <div class="card cattle-card h-100 shadow">
                    <img src="https://la-canasta.org/wp-content/uploads/2025/06/Aguacate_Lorena.jpg" class="card-img-top card-image" alt="Lorena">
                    <div class="card-body">
                        <h5 class="card-title">Lorena (Papelillo)</h5>
                        <p class="card-text">
                            <strong class="text-cattle-accent">Mercado:</strong> Nacional / Fresco.
                            <br><strong class="text-cattle-accent">Clima:</strong> Cálido (Trópico bajo y medio).
                            <br><strong class="text-cattle-accent">Nota:</strong> Frutos grandes, piel lisa y pulpa suave.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Fuerte --}}
            <div class="col-md-4">
                <div class="card cattle-card h-100 shadow">
                    <img src="https://fertilizantesecoforce.es/wp-content/uploads/2022/06/Comprar-arbol-aguacate-fuerte.jpeg" class="card-img-top card-image" alt="Fuerte">
                    <div class="card-body">
                        <h5 class="card-title">Fuerte (Híbrido)</h5>
                        <p class="card-text">
                            <strong class="text-cattle-accent">Mercado:</strong> Polinizador y consumo local.
                            <br><strong class="text-cattle-accent">Clima:</strong> Adaptable a climas fríos.
                            <br><strong class="text-cattle-accent">Nota:</strong> Forma de pera y piel verde mate.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <hr class="cattle-divider">

    {{-- Ciclo de Manejo con Timeline --}}
    <section id="procesoAguacate" class="py-5">
        <h2 class="section-title text-center mb-5">Cronograma Técnico del Cultivo</h2>

        <div class="row mt-4 align-items-center">
            <div class="col-md-6 order-md-2">
                <img src="https://i.ytimg.com/vi/Jx-rEIh3x-8/maxresdefault.jpg"
                    class="img-fluid rounded shadow-lg process-image" alt="Poda de Aguacate">
            </div>

            <div class="col-md-6 order-md-1">
                <div class="mb-5">
                    <h3 class="sub-section-title text-cattle-accent">Línea de Tiempo del Cultivo</h3>
                    <ul class="timeline">
                        <li><span>Preparación de Suelo</span>: Análisis de pH y corrección con cales si es necesario.</li>
                        <li><span>Siembra</span>: Ahoyado de 60x60x60 cm con abonamiento de fondo orgánico.</li>
                        <li><span>Poda de Formación</span>: Definición de ejes principales en los primeros 2 años.</li>
                        <li><span>Floración y Cuajado</span>: Monitoreo crítico de trips y nutrición con Boro y Zinc.</li>
                        <li><span>Cosecha</span>: Determinación de materia seca (mínimo 21% para Hass).</li>
                        <li><span>Poda Fitosanitaria</span>: Desinfección de herramientas para prevenir Phytophthora.</li>
                    </ul>
                </div>

                <div class="mt-5">
                    <h3 class="sub-section-title text-cattle-accent">Video Tutorial: Poda y Manejo</h3>
                    <div class="ratio ratio-16x9 rounded shadow-lg video-container">
                        <iframe 
    width="560" 
    height="315" 
    src="https://www.youtube.com/embed/PisWYhRZvvI" 
    title="YouTube video player" 
    frameborder="0" 
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
    allowfullscreen>
</iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <hr class="cattle-divider">

    {{-- Datos Rápidos y Noticias --}}
    <section class="py-5">
        <h2 class="section-title text-center mb-5">Fichas de Cuidado Rápido</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card cattle-card h-100 shadow text-center p-4">
                    <div class="card-body">
                        <i class="fas fa-tint fa-3x mb-3 text-cattle-accent"></i>
                        <h5 class="card-title">Riego Controlado</h5>
                        <p class="card-text">Evite el encharcamiento. El aguacate muere por exceso de agua más rápido que por sequía.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card cattle-card h-100 shadow text-center p-4">
                    <div class="card-body">
                        <i class="fas fa-bug fa-3x mb-3 text-cattle-accent"></i>
                        <h5 class="card-title">Control de Plagas</h5>
                        <p class="card-text">Vigile el "Pasador del Fruto" y la "Hormiga Arriera" en etapas tempranas.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card cattle-card h-100 shadow text-center p-4">
                    <div class="card-body">
                        <i class="fas fa-sun fa-3x mb-3 text-cattle-accent"></i>
                        <h5 class="card-title">Luz Solar</h5>
                        <p class="card-text">Requiere mínimo 6-8 horas de sol directo para una fotosíntesis óptima.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    document.querySelectorAll('.scroll-suave').forEach(link => {
        link.addEventListener('click', function(e){
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({ behavior: 'smooth' });
        });
    });
</script>
@endsection