@extends('layouts.app')

@section('content')
<!-- Enlace al CSS externo (asumiendo que se carga correctamente en el entorno de Blade) -->
<link rel="stylesheet" href="bovine_style.css"> 
<!-- Fuente Poppins y Font Awesome para íconos profesionales -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<!-- Contenedor principal para encapsular estilos y tema -->
<div id="bovine-page" class="bovine-page">

    <!-- Botón Flotante de Modo Oscuro - ID Único -->
    <button id="theme-toggle-btn" onclick="toggleTheme()" class="floating-btn dark-mode">
        <i class="fas fa-moon"></i> Cambiar tema
    </button>


    <!-- ===== CONTENIDO PRINCIPAL - Clase Única ===== -->
    <main class="bovine-container">
        <h1>🐄 Ganado Bovino: Manejo y Producción</h1>

        <!-- Razas - Clase Única -->
        <section class="bovine-card" id="razas">
            <h2>Razas más comunes 
                <button onclick="toggleSection('razas-content')" class="mostrar"><i class="fas fa-chevron-down"></i></button>
            </h2>
            <div id="razas-content" class="bovine-content">
                <p>
                    Entre las más conocidas están: <strong>Holstein</strong> (alta producción de leche), 
                    <strong>Jersey</strong> (leche rica en grasa), <strong>Angus</strong> (carne de calidad) y 
                    <strong>Brahman</strong> (resistencia a climas cálidos).
                </p>
                <div class="bovine-collage">
                    <img src="https://licnz.com/wp-content/uploads/2020/10/Holstein-Friesian-bull-Mint-Edition-Front-on.jpg" onerror="this.onerror=null; this.src='https://placehold.co/300x200/222/18d92e?text=HOLSTEIN';" alt="Vaca Holstein" onclick="enlargeImage(this)">
                    <img src="https://i.pinimg.com/originals/e5/79/01/e57901f813294688ca0bf4f313e5c840.jpg" onerror="this.onerror=null; this.src='https://placehold.co/300x200/222/18d92e?text=JERSEY';" alt="Vaca Jersey" onclick="enlargeImage(this)">
                    <img src="https://www.lechedeflorida.com/core/fileparse.php/278/urlt/Holstein-Cow-Headshot.jpg" onerror="this.onerror=null; this.src='https://placehold.co/300x200/222/18d92e?text=LECHE';" alt="Vaca de leche" onclick="enlargeImage(this)">
                    <img src="https://www.miguelvergara.com/actualidad/wp-content/uploads/2023/10/vaca-frisona-listado.jpg" onerror="this.onerror=null; this.src='https://placehold.co/300x200/222/18d92e?text=FRISONA';" alt="Vaca frisona" onclick="enlargeImage(this)">
                </div>
            </div>
        </section>

        <!-- Suelo y pasturas -->
        <section class="bovine-card" id="suelo">
            <h2>Suelo y pasturas 
                <button onclick="toggleSection('suelo-content')" class="mostrar"><i class="fas fa-chevron-down"></i></button>
            </h2>
            <div id="suelo-content" class="bovine-content">
                <p>
                    Prefieren suelos bien drenados, con pastos nutritivos como <em>kikuyo</em>, 
                    <em>ryegrass</em> y <em>trébol</em>. El pH ideal está entre 6 y 7, con alto contenido
                    de materia orgánica.
                </p>
                <div class="bovine-collage two-cols">
                    <img src="https://images.unsplash.com/photo-1714983894044-44ca0451216b?q=80&w=1170&auto=format&fit=crop" onerror="this.onerror=null; this.src='https://placehold.co/300x200/222/18d92e?text=PASTURAS';" alt="Pasturas nutritivas" onclick="enlargeImage(this)">
                    <img src="https://www.gob.mx/cms/uploads/article/main_image/72605/vacas.jpg" onerror="this.onerror=null; this.src='https://placehold.co/300x200/222/18d92e?text=FORRAJE';" alt="Forrajes para ganado" onclick="enlargeImage(this)">
                </div>
            </div>
        </section>

        <!-- Alimentación -->
        <section class="bovine-card" id="alimentacion">
            <h2>Alimentación 
                <button onclick="toggleSection('alimentacion-content')" class="mostrar"><i class="fas fa-chevron-down"></i></button>
            </h2>
            <div id="alimentacion-content" class="bovine-content">
                <p>
                    La dieta del ganado vacuno se basa principalmente en pasto, silo y heno. 
                    También se puede complementar con granos (maíz, sorgo) y suplementos proteicos.
                </p>
                <ul>
                    <li><i class="fas fa-seedling"></i> <strong>Pasto fresco:</strong> principal fuente de nutrientes.</li>
                    <li><i class="fas fa-tractor"></i> <strong>Heno y ensilaje:</strong> reservas para épocas secas.</li>
                    <li><i class="fas fa-pills"></i> <strong>Suplementos:</strong> sales minerales y vitaminas.</li>
                </ul>
            </div>
        </section>

        <!-- Producción de leche -->
        <section class="bovine-card" id="leche">
            <h2>Producción de leche 
                <button onclick="toggleSection('leche-content')" class="mostrar"><i class="fas fa-chevron-down"></i></button>
            </h2>
            <div id="leche-content" class="bovine-content">
                <p>
                    Una vaca lechera puede producir entre <strong>20 y 40 litros diarios</strong> de leche,
                    dependiendo de la raza, la genética, la alimentación y el manejo.
                </p>
                <p>
                    La <strong>Holstein</strong> es la más productiva, mientras que la <strong>Jersey</strong> 
                    destaca por la calidad y el contenido graso de su leche.
                </p>
            </div>
        </section>

        <!-- Producción de carne -->
        <section class="bovine-card" id="carne">
            <h2>Producción de carne 
                <button onclick="toggleSection('carne-content')" class="mostrar"><i class="fas fa-chevron-down"></i></button>
            </h2>
            <div id="carne-content" class="bovine-content">
                <p>
                    Las razas de carne como <strong>Angus</strong> y <strong>Hereford</strong> 
                    son criadas por su carne de alta calidad y rápido crecimiento.
                </p>
                <p>
                    El manejo adecuado de la alimentación y el pastoreo influye directamente 
                    en la calidad del producto final.
                </p>
            </div>
        </section>

        <!-- Salud y manejo -->
        <section class="bovine-card" id="salud">
            <h2>Salud y manejo 
                <button onclick="toggleSection('salud-content')" class="mostrar"><i class="fas fa-chevron-down"></i></button>
            </h2>
            <div id="salud-content" class="bovine-content">
                <p>
                    El ganado requiere cuidados veterinarios periódicos: vacunación, desparasitación 
                    y control de parásitos externos. 
                </p>
                <ul>
                    <li><i class="fas fa-syringe"></i> Vacunas contra fiebre aftosa y brucelosis.</li>
                    <li><i class="fas fa-bug"></i> Desparasitación interna y externa.</li>
                    <li><i class="fas fa-house-chimney"></i> Corrales limpios y ventilados.</li>
                </ul>
            </div>
        </section>

        <!-- Noticias -->
        <section class="bovine-card">
            <h2>📰 Noticias sobre ganado</h2>
            <input type="text" id="bovine-news-search" placeholder="Buscar noticias..." onkeyup="filterNews()" class="buscador">
            <div id="news-container">
                <!-- Contenido de noticias simulado para el filtro -->
                <div class="news-item">
                    <h3 class="text-neon">Inversión en Genética Bovina</h3>
                    <p>El gobierno anuncia nuevos programas de apoyo para la mejora genética de las razas lecheras y cárnicas.</p>
                </div>
                <div class="news-item">
                    <h3 class="text-neon">Estrategias de Pastoreo Rotacional</h3>
                    <p>Expertos discuten las mejores prácticas para maximizar la eficiencia del pastoreo en climas variables.</p>
                </div>
            </div>
        </section>

        <!-- Modal de imágenes -->
        <div id="image-modal" class="modal" onclick="closeModal()">
            <img id="modal-img" src="" alt="imagen ampliada">
            <span class="close" onclick="closeModal(event)">✖</span>
        </div>
    </main>


    <!-- ===== JAVASCRIPT DE INTERACTIVIDAD (Nombres de ID/Clase actualizados) ===== -->
    <script>
        // Cierra el modal de imagen, evitando que el clic en el botón cierre el modal
        function closeModal(event) {
            if (event && event.target.classList.contains('close')) {
                event.stopPropagation();
            }
            document.getElementById('image-modal').style.display = 'none';
        }

        // Abre y muestra la imagen en el modal
        function enlargeImage(imgElement) {
            const modal = document.getElementById('image-modal');
            const modalImg = document.getElementById('modal-img');
            modal.style.display = 'flex';
            modalImg.src = imgElement.src;
        }

        // Muestra/Oculta secciones con transición
        function toggleSection(id) {
            const content = document.getElementById(id);
            const button = content.previousElementSibling.querySelector('.mostrar i');
            
            if (content.style.maxHeight) {
                content.style.maxHeight = null;
                // Usamos la misma lógica de padding que en el CSS para una transición suave
                content.style.padding = '0 15px'; 
                button.style.transform = 'rotate(0deg)';
            } else {
                // Usamos scrollHeight + un margen para asegurar que se muestre todo el contenido
                content.style.maxHeight = content.scrollHeight + 30 + "px"; 
                content.style.padding = '15px 15px 0 15px'; 
                button.style.transform = 'rotate(180deg)';
            }
        }

        // Filtra las noticias (simulado)
        function filterNews() {
            const searchInput = document.getElementById('bovine-news-search').value.toLowerCase(); 
            const newsContainer = document.getElementById('news-container');
            const newsItems = newsContainer.querySelectorAll('.news-item');

            newsItems.forEach(item => {
                const text = item.textContent.toLowerCase();
                if (text.includes(searchInput)) {
                    item.style.display = ''; 
                } else {
                    item.style.display = 'none'; 
                }
            });
        }

        // Función de cambio de tema (Oscuro <-> Claro)
        function toggleTheme() {
            const pageContainer = document.getElementById('bovine-page'); // Nuevo ID
            const icon = document.querySelector('#theme-toggle-btn i'); // Nuevo ID
            
            if (pageContainer.classList.contains('light-mode')) {
                pageContainer.classList.remove('light-mode');
                icon.classList.remove('fa-sun');
                icon.classList.add('fa-moon');
            } else {
                pageContainer.classList.add('light-mode');
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');
            }
        }

        // Inicializa las secciones colapsadas
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.bovine-content').forEach(content => { // Nueva clase
                content.style.maxHeight = null;
                content.style.padding = '0 15px'; 
            });
        });
    </script>
</div>
@endsection