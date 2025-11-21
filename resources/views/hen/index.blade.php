{{-- @extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Lista de Usuarios</h1>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Raza</th>
                    <th>Producción diaria de huevos</th>
                    <th>Total mensual de huevos</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hens as $hen)
                    <tr>
                        <td>{{ $hen['id'] }}</td>
                        <td>{{ $hen['breed'] }}</td>
                        <td>{{ $hen['daily_egg_production'] }}</td>
                        <td>{{ $hen['monthly_egg_total'] }}</td>
                        <td>
                            <a href="{{ route('hen.show', $hen['id']) }}" class="btn btn-info btn-sm">Ver más</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection --}}
@extends('layouts.app')

{{-- 
    NOTA: Esta vista asume que el archivo CSS personalizado (agronomy_styles.css) 
    y Font Awesome están enlazados en layouts/app.blade.php.
--}}

@section('content')
    {{-- Botón volver arriba --}}
    {{-- Mantenemos el ID 'scrollTopBtn' para el JS --}}
    <button id="scrollTopBtn" class="scroll-top-btn" aria-label="Volver arriba">
        <i class="fas fa-arrow-up"></i>
    </button>

    {{-- Contenedor principal responsive --}}
    <div class="main-content-container">
        <div class="main-column">
            {{-- Sección de Título Principal --}}
            <div class="title-section fade-in">
                {{-- Imagen de la sección (Gallinas) --}}
                <img 
                    src="https://certifiedhumanelatino.org/wp-content/uploads/2021/11/Design-sem-nome-2.png" 
                    alt="Gallinas" 
                    class="title-img" 
                    onerror="this.onerror=null;this.src='https://placehold.co/100x100/18d92e/0b0f0c?text=AGRO';"
                />
                <div>
                    <h2>Gallinas: Guía para pequeños productores</h2>
                    <p class="subtitle">Conoce razas, alimentación y técnicas básicas de manejo.</p>
                </div>
            </div>

            {{-- Card 1: ¿Por qué criar gallinas? --}}
            <div class="card fade-in" style="animation-delay: 0.1s;">
                <img 
                    src="https://bogota.gov.co/sites/default/files/inline-images/gallinas-2_0.jpeg" 
                    alt="Gallinas en campo" 
                    class="card-img"
                    onerror="this.onerror=null;this.src='https://placehold.co/700x300/1b1b1b/18d92e?text=IMAGEN+1';"
                >
                <h3>¿Por qué criar gallinas?</h3>
                <p>Las gallinas son una fuente constante de huevos, carne y fertilizante. Su cría es relativamente sencilla y puede generar ingresos significativos o servir como sustento familiar en fincas pequeñas y medianas.</p>
            </div>

            {{-- Card 2: Alimentación --}}
            <div class="card fade-in" style="animation-delay: 0.2s;">
                <h3>¿Qué comen las gallinas?</h3>
                <ul class="styled-list">
                    <li><i class="fas fa-check-circle text-neon-green"></i> <strong>Pienso balanceado:</strong> Ofrecer según la etapa de vida (iniciación, crecimiento, puesta).</li>
                    <li><i class="fas fa-check-circle text-neon-green"></i> <strong>Granos:</strong> Maíz, trigo, sorgo, como fuente de energía.</li>
                    <li><i class="fas fa-check-circle text-neon-green"></i> <strong>Proteínas:</strong> Complementar con soja, pescado o insectos para una buena producción de huevos.</li>
                    <li><i class="fas fa-check-circle text-neon-green"></i> <strong>Verdes:</strong> Hojas, pasto, y restos vegetales no procesados.</li>
                    <li><i class="fas fa-check-circle text-neon-green"></i> <strong>Grit y calcio:</strong> Concha de ostra o arena gruesa para la digestión y cáscaras fuertes.</li>
                </ul>
                <p>Evitar alimentos mohosos, salados, dulces o plantas tóxicas. La sanidad empieza por la nutrición.</p>
            </div>

            {{-- Card 3: Manejo básico --}}
            <div class="card fade-in" style="animation-delay: 0.3s;">
                <h3>Manejo básico</h3>
                <ul class="styled-list">
                    <li><i class="fas fa-cogs text-neon-green"></i> Gallinero limpio, ventilado y protegido de depredadores.</li>
                    <li><i class="fas fa-tractor text-neon-green"></i> Rotación de áreas de pastoreo para prevenir parásitos y mantener la salud del suelo.</li>
                    <li><i class="fas fa-syringe text-neon-green"></i> Programa de vacunación y control sanitario riguroso.</li>
                    <li><i class="fas fa-clipboard-list text-neon-green"></i> Registro de producción de huevos y consumo de alimento.</li>
                </ul>
            </div>

            {{-- Card 4: Gallinero adecuado --}}
            <div class="card fade-in" style="animation-delay: 0.4s;">
                <h3>¿Cómo debe ser un gallinero adecuado?</h3>
                <img 
                    src="https://paduamateriales.com/wp-content/uploads/que-tamano-debe-tener-un-gallinero-para-100-gallinas-1.webp" 
                    class="card-img" 
                    alt="Gallinero"
                    onclick="openModal(this.src)"
                    onerror="this.onerror=null;this.src='https:placehold.co/700x300/1b1b1b/18d92e?text=IMAGEN+2';"
                >
                <ul class="styled-list">
                    <li><i class="fas fa-ruler-combined text-neon-green"></i> <strong>Espacio:</strong> Mínimo 1 m² por gallina en interiores.</li>
                    <li><i class="fas fa-layer-group text-neon-green"></i> <strong>Pisos secos:</strong> Usar cama profunda de viruta de madera o paja, cambiada periódicamente.</li>
                    <li><i class="fas fa-home text-neon-green"></i> <strong>Pernos y nidos:</strong> Superficies elevadas para descansar y ponederos cómodos.</li>
                    <li><i class="fas fa-wind text-neon-green"></i> <strong>Buena ventilación:</strong> Esencial para evitar enfermedades respiratorias.</li>
                    <li><i class="fas fa-external-link-alt text-neon-green"></i> <strong>Acceso al exterior:</strong> Zona segura para pastorear, vital para la salud y la calidad del huevo.</li>
                </ul>
            </div>

            {{-- Card 5: Videos recomendados --}}
            <div class="card fade-in" style="animation-delay: 0.5s;">
                <h3>Videos recomendados</h3>
                <div class="video-grid">

                    <p class="video-title"><strong>Como construir un gallinero</strong></p>
                    <iframe 
                        title="YouTube video player 1" 
                        src="https://www.youtube.com/embed/er1d3U2PGMo" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen
                        loading="lazy">
                    </iframe>

                    <p class="video-title"><strong>Crianza de gallinas ponedoras</strong></p>
                    <iframe 
                        title="YouTube video player 2" 
                        src="https://www.youtube.com/embed/dzUGFP2upVA" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen
                        loading="lazy">
                    </iframe>

                </div>
            </div>
            
        </div>
        
        {{-- Columna Lateral (Aside) --}}
        <div class="aside-column">
            {{-- Card Lateral 1: Galería y Datos Rápidos --}}
            <div class="card fade-in" style="animation-delay: 0.6s;">
                <h3>Galería & Datos Rápidos</h3>
                <div class="gallery-grid">
                    <img 
                        src="https://ganadosycarnes.com/wp-content/uploads/2019/02/gallinas-felices.jpg" 
                        class="aside-img gallery-img"
                        onclick="openModal(this.src)"
                        onerror="this.onerror=null;this.src='https://placehold.co/300x200/1b1b1b/18d92e?text=GALERIA+1';"
                    />
                    <img 
                        src="https://ecohabitar.org/wp-content/uploads/2023/03/gallinero1-1.jpg" 
                        class="aside-img gallery-img"
                        onclick="openModal(this.src)"
                        onerror="this.onerror=null;this.src='https://placehold.co/300x200/1b1b1b/18d92e?text=GALERIA+2';"
                    />
                    <img 
                        src="https://d1lg8auwtggj9x.cloudfront.net/images/Chicken_feed.width-820.jpg" 
                        class="aside-img gallery-img"
                        onclick="openModal(this.src)"
                        onerror="this.onerror=null;this.src='https://placehold.co/300x200/1b1b1b/18d92e?text=GALERIA+3';"
                    />
                </div>
                
                <h4 class="aside-subtitle">Datos Clave</h4>
                <ul class="styled-list">
                    <li><i class="fas fa-calendar-alt text-neon-green"></i> <strong>Edad de puesta:</strong> 18–24 semanas</li>
                    <li><i class="fas fa-egg text-neon-green"></i> <strong>Producción anual:</strong> 150–300 huevos</li>
                    <li><i class="fas fa-ruler text-neon-green"></i> <strong>Espacio libre:</strong> 4–5 m² por ave en pastoreo.</li>
                </ul>
            </div>

            {{-- Card Lateral 2: Ventajas económicas --}}
            <div class="card fade-in" style="animation-delay: 0.7s;">
                <h3>Ventajas económicas</h3>
                <p>La producción diversificada de huevos, carne y abono natural reduce la dependencia de insumos externos, genera ingresos estables y aumenta la autosuficiencia de la finca. Es una inversión sostenible.</p>
            </div>
            
            {{-- Card Lateral 3: Curiosidades (Movido a la derecha para consistencia) --}}
            <div class="card fade-in" style="animation-delay: 0.8s;">
                <h3>Curiosidades sobre las gallinas</h3>
                <ul class="styled-list">
                    <li><i class="fas fa-brain text-neon-green"></i> Recuerdan hasta 100 caras humanas.</li>
                    <li><i class="fas fa-microphone-alt text-neon-green"></i> Se comunican con más de 30 sonidos distintos.</li>
                    <li><i class="fas fa-bed text-neon-green"></i> Son capaces de soñar mientras duermen.</li>
                    <li><i class="fas fa-crown text-neon-green"></i> Tienen jerarquías sociales (la famosa "gallina alfa").</li>
                </ul>
            </div>
            
            {{-- Card Lateral 4: Beneficios Ecológicos (Movido a la derecha) --}}
            <div class="card fade-in" style="animation-delay: 0.9s;">
                <h3>Beneficios ecológicos</h3>
                <ul class="styled-list">
                    <li><i class="fas fa-recycle text-neon-green"></i> Reducen restos de comida y residuos orgánicos.</li>
                    <li><i class="fas fa-leaf text-neon-green"></i> Fertilizante natural de alta calidad con su estiércol.</li>
                    <li><i class="fas fa-bug text-neon-green"></i> Controlan plagas e insectos en el campo.</li>
                    <li><i class="fas fa-sync-alt text-neon-green"></i> Contribuyen a la rotación de cultivos al limpiar y preparar el suelo.</li>
                </ul>
            </div>

        </div>
    </div>

    {{-- Modal para imágenes (Debe estar fuera del main-content-container) --}}
    <div id="imageModal" class="modal">
        <span id="closeModal" class="close-modal-btn" onclick="closeModal()">&times;</span>
        <img class="modal-content" id="modalImg" alt="Imagen ampliada">
    </div>

    {{-- Script para el Modal y Scroll (Se mantiene la funcionalidad JS) --}}
    <script>
        // Funcionalidad del Modal
        const modal = document.getElementById("imageModal");
        const modalImg = document.getElementById("modalImg");

        function openModal(src) {
            modal.style.display = "block";
            modalImg.src = src;
        }

        function closeModal() {
            modal.style.display = "none";
        }
        
        // Cierra el modal al hacer clic fuera de la imagen
        window.onclick = function(event) {
            if (event.target == modal) {
                closeModal();
            }
        }

        // Funcionalidad Scroll Top
        const scrollTopBtn = document.getElementById("scrollTopBtn");

        window.onscroll = function() {
            if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
                scrollTopBtn.style.display = "block";
            } else {
                scrollTopBtn.style.display = "none";
            }
        };

        scrollTopBtn.onclick = function() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        };

        // Activación de animaciones fade-in
        document.addEventListener('DOMContentLoaded', () => {
            const elements = document.querySelectorAll('.fade-in');
            elements.forEach((el, index) => {
                // Añade un delay basado en la posición para un efecto escalonado
                el.style.animationDelay = `${index * 0.1}s`; 
                el.style.opacity = 1; // Necesario si la animación no se ejecuta por alguna razón
            });
        });

    </script>
@endsection