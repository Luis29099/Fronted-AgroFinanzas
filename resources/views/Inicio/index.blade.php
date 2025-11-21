@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgroFinanzas - Solución Carrusel</title>
    <!-- Carga de Tailwind CSS para estilos base -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Carga del CSS personalizado (asumiendo que se llama styles.css o similar) -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        /* Aplicamos el fondo oscuro global para que coincida con el Navbar */
        body {
            background-color: #0b0f0c;
            color: #fff;
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">

<!-- 1. Sección del Carrusel (FUERA del contenedor principal para ancho completo) -->
<div class="hero-principal">
    {{-- Carrusel de Noticias Destacadas --}}
    <div class="hero-carrusel-container">
        <div class="carrusel-slides" id="carruselSlides">
            {{-- Slide 1: Imagen Principal --}}
            <div class="carrusel-slide active">
                    <img src="https://images.unsplash.com/photo-1580570598977-4b2412d01bbc?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1167" alt="Noticia 3: Tecnología Agrícola">
                    <div class="carrusel-caption">
                        <h3></h3>
                    </div>
                </div>
            <div class="carrusel-slide">
                <img src="https://fpsuperiorufv.es/blog/wp-content/uploads/2023/02/19962385_6206720-scaled.jpg" alt="Noticia 1: Mercados Internacionales" onerror="this.onerror=null;this.src='https://placehold.co/1920x400/0e3a15/ffffff?text=Noticia+1';">
                <div class="carrusel-caption">
                    <h3>El impacto de las tasas de interés en los precios de exportación agrícola.</h3>
                </div>
            </div>
            {{-- Slide 2: Cosecha Record --}}
            <div class="carrusel-slide">
                <img src="https://excelso77.com/wp-content/uploads/2023/12/quieres-saber-como-se-cosecha-el-cafe-en-mexico-te-decimos-excelso-77.webp" alt="Noticia 2: Cosecha Record" onerror="this.onerror=null;this.src='https://placehold.co/1920x400/0e3a15/ffffff?text=Noticia+2';">
                <div class="carrusel-caption">
                    <h3>Cosecha Récord en Granos: ¿Qué significa para el mercado?</h3>
                </div>
            </div>
            {{-- Slide 3: Tecnología Agrícola --}}
            <div class="carrusel-slide">
                <img src="https://agriculturadelasamericas.com/wp-content/uploads/2019/07/tecnologia-agricola.jpg" alt="Noticia 3: Tecnología Agrícola" onerror="this.onerror=null;this.src='https://placehold.co/1920x400/0e3a15/ffffff?text=Noticia+3';">
                <div class="carrusel-caption">
                    <h3>Drones y AI: Revolucionando la eficiencia del riego en el campo.</h3>
                </div>
            </div>
        </div>
        <button class="carrusel-btn prev" onclick="moveSlide(-1)">&#10094;</button>
        <button class="carrusel-btn next" onclick="moveSlide(1)">&#10095;</button>
        
        {{-- Contenido superpuesto --}}
        <div class="hero-contenido hidden md:flex">
            <h1>AgroFinanzas</h1>
            <p><strong>Decisiones inteligentes para el campo.</strong></p>
        </div>
    </div>
</div>

<!-- 2. Contenido de la página (DENTRO del contenedor principal) -->
<main class="container mx-auto p-4 md:p-8">

    {{-- Sección del clima (con datos simulados) --}}
    <section class="clima-section">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">☁️ Estado del Clima Actual</h2>
        <div class="clima-card text-gray-700">
            <p><strong>Ubicación:</strong> Ciudad de México</p>
            <p><strong>Temperatura:</strong> 22.5 °C</p>
            <p><strong>Humedad:</strong> 65%</p>
            <p><strong>Viento:</strong> 5.2 m/s</p>
            <p><strong>Condición:</strong> Parcialmente Nublado</p>
        </div>
    </section>

    {{-- Sección de Noticias --}}
    <section class="noticias">

        {{-- Noticia 1: Ganado --}}
        <div class="noticia" onclick="openModal(this)">
            <img src="https://images.unsplash.com/photo-1593023333594-487b2f7dd415?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=687" alt="Cuidado de Vacas" onerror="this.onerror=null;this.src='https://placehold.co/300x180/0e3a15/ffffff?text=Ganado';">
            <div class="noticia-content">
                <h3 class="text-xl font-bold text-green-800">Cuidado de tus vacas</h3>
                <p class="text-gray-600">Aprende cómo garantizar la salud y productividad de tu ganado con consejos prácticos y fáciles de aplicar en el día a día.</p>
            </div>
        </div>

        {{-- Noticia 2: Cultivos --}}
        <div class="noticia" onclick="openModal(this)">
            <img src="https://images.unsplash.com/photo-1654815439629-5e93cb7f74a1?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1170" alt="Cultivos" onerror="this.onerror=null;this.src='https://placehold.co/300x180/0e3a15/ffffff?text=Cultivos';">
            <div class="noticia-content">
                <h3 class="text-xl font-bold text-green-800">Cómo cuidar tus cultivos</h3>
                <p class="text-gray-600">Descubre técnicas modernas y ecológicas para mantener tus cultivos sanos, productivos y resistentes a plagas.</p>
            </div>
        </div>

        {{-- Noticia 3: Finanzas --}}
        <div class="noticia" onclick="openModal(this)">
            <img src="https://images.unsplash.com/photo-1579621970795-87facc2f976d?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1170" alt="Finanzas" onerror="this.onerror=null;this.src='https://placehold.co/300x180/0e3a15/ffffff?text=Finanzas';">
            <div class="noticia-content">
                <h3 class="text-xl font-bold text-green-800">Mejor manejo de tus finanzas</h3>
                <p class="text-gray-600">Organiza tus ingresos, controla gastos y toma decisiones financieras inteligentes para impulsar tu emprendimiento rural.</p>
            </div>
        </div>

        {{-- Noticia 4: Riego Inteligente (Adicional) --}}
        <div class="noticia" onclick="openModal(this)">
            <img src="https://grupohidraulica.com/wp-content/uploads/2021/10/AdobeStock_33552553-scaled-e1634742242695-1536x752-1.jpeg" alt="Riego Inteligente" onerror="this.onerror=null;this.src='https://placehold.co/300x180/0e3a15/ffffff?text=Riego+Inteligente';">
            <div class="noticia-content">
                <h3 class="text-xl font-bold text-green-800">Sistemas de Riego Inteligente</h3>
                <p class="text-gray-600">Optimiza el consumo de agua y mejora la producción con tecnologías de riego controladas por sensores de humedad.</p>
            </div>
        </div>

        {{-- Noticia 5: Subsidios Agrícolas (Adicional) --}}
        <div class="noticia" onclick="openModal(this)">
            <img src="https://img.freepik.com/fotos-premium/bolsa-dinero-antecedentes-campo-agricola-prestamos-subsidios-agricultores-subvenciones-apoyo-financiero-ganancias-agronegocios-valuacion-valor-tierra-impuesto-sobre-tierra-nuevas-empresas-agricolas-prestamo-garantizado-inversiones_72572-3090.jpg?w=360" alt="Subsidios Agrícolas" onerror="this.onerror=null;this.src='https:placehold.co/300x180/0e3a15/ffffff?text=Subsidios+Agrícolas';">
            <div class="noticia-content">
                <h3 class="text-xl font-bold text-green-800">Guía de Subsidios 2024</h3>
                <p class="text-gray-600">Conoce los nuevos programas de apoyo gubernamental disponibles para pequeños y medianos productores del sector agrícola.</p>
            </div>
        </div>

        {{-- Noticia 6: Plagas y Enfermedades (Adicional) --}}
        <div class="noticia" onclick="openModal(this)">
            <img src="https://bioprotectionportal.com/wp-content/uploads/2024/09/SPANISH-blog-1.jpg?x18658" alt="Prevención de Plagas" onerror="this.onerror=null;this.src='https:placehold.co/300x180/0e3a15/ffffff?text=Prevención+Plagas';">
            <div class="noticia-content">
                <h3 class="text-xl font-bold text-green-800">Prevención y Control de Plagas</h3>
                <p class="text-gray-600">Identifica y combate las plagas más comunes en tu región antes de que afecten gravemente tu producción y cosecha.</p>
            </div>
        </div>

    </section>

</main>

{{-- MODAL PARA MOSTRAR LA NOTICIA COMPLETA (Se queda aquí porque usa la lógica JS del archivo) --}}
<div id="newsModal" class="modal-overlay" onclick="if(event.target.id === 'newsModal') closeModal()">
    <div class="modal-content">
        <button class="modal-close-btn" onclick="closeModal()">×</button>
        <img id="modalImage" class="modal-image" src="" alt="Imagen de la noticia">
        <h2 id="modalTitle" class="text-2xl font-bold text-green-800 mb-2">Título de la Noticia</h2>
        <p class="modal-summary text-gray-600 italic mb-4" id="modalSummary"></p>
        <div class="modal-full-content text-gray-700" id="modalFullContent">
            {{-- Aquí se insertará el contenido completo simulado --}}
        </div>
    </div>
</div>

<script>
    // --- LÓGICA DEL CARRUSEL ---
    let slideIndex = 0;
    let slides = [];
    let intervalId;

    document.addEventListener('DOMContentLoaded', () => {
        // Inicialización de slides y carrusel
        slides = document.querySelectorAll('.carrusel-slide');
        if (slides.length > 0) {
            // Aseguramos que la primera diapositiva tenga la clase 'active' al inicio
            slides[0].classList.add('active'); 
            showSlide(slideIndex);
            startAutoSlide();
        }
    });

    // Inicia la rotación automática
    function startAutoSlide() {
        if (intervalId) clearInterval(intervalId);
        intervalId = setInterval(() => {
            moveSlide(1);
        }, 5000); // Cambia cada 5 segundos
    }

    // Función para avanzar/retroceder
    function moveSlide(n) {
        slideIndex += n;
        if (slideIndex >= slides.length) {
            slideIndex = 0; 
        } else if (slideIndex < 0) {
            slideIndex = slides.length - 1; 
        }
        showSlide(slideIndex);
        startAutoSlide(); // Reinicia el temporizador
    }

    // Función para mostrar la diapositiva en el índice dado
    function showSlide(index) {
        slides.forEach((slide, i) => {
            if (i === index) {
                slide.classList.add('active');
            } else {
                slide.classList.remove('active');
            }
        });
    }

    // --- LÓGICA DEL MODAL DE NOTICIAS ---

    // Abre el modal al hacer clic en una noticia
    function openModal(element) {
        const title = element.querySelector('h3').textContent;
        const summary = element.querySelector('p').textContent;
        const imgElement = element.querySelector('img');
        const imgUrl = imgElement.src;

        document.getElementById('modalTitle').textContent = title;
        document.getElementById('modalSummary').textContent = summary;
        document.getElementById('modalImage').src = imgUrl;

        // Contenido completo simulado para la noticia
        document.getElementById('modalFullContent').innerHTML = 
            `<h3 class="text-xl font-semibold mb-2">${title}</h3>
            <p class="mb-4">${summary} Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            <br><br>
            Aliquam erat volutpat. Praesent dictum, massa a pellentesque iaculis, metus urna facilisis purus, in tincidunt eros est ac mauris. Nulla facilisi. Sed malesuada odio ac turpis ullamcorper, eu blandit lorem consequat.</p>
            <p><strong class="font-bold">Fecha de Publicación:</strong> 21 de Noviembre, 2025</p>`;

        document.getElementById('newsModal').classList.add('visible');
        document.body.style.overflow = 'hidden'; // Evita el scroll del fondo
    }

    // Cierra el modal
    function closeModal() {
        document.getElementById('newsModal').classList.remove('visible');
        document.body.style.overflow = 'auto'; // Restaura el scroll del fondo
    }
</script>

</body>
</html>
@endsection