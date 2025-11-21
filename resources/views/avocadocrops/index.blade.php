@extends('layouts.app')

@section('content')
    <main class="avocado-main">
<!-- Galería de Variedades (Contenido original, pero bien integrado) -->
<section class="varieties-section">
    <h2>Conoce las Variedades</h2>
    <div class="contenedor-tarjetas">
        {{-- Tarjeta de Proyecto 1 (Hass) --}}
        <div class="tarjeta">
            <img src="https://www.reyesgutierrez.com/wp-content/uploads/2021/04/aguacate-hass.jpg" alt="Aguacate Hass">
            <h2>Hass</h2>
            <p>La variedad más popular. Piel rugosa que se oscurece al madurar, pulpa cremosa y excelente sabor a nuez.</p>
        </div>

        {{-- Tarjeta de Proyecto 2 (Fuerte) --}}
        <div class="tarjeta">
            <img src="https://fertilizantesecoforce.es/wp-content/uploads/2022/06/Comprar-arbol-aguacate-fuerte.jpeg" alt="Aguacate Fuerte">
            <h2>Fuerte</h2>
            <p>Híbrido de piel suave y verde, forma de pera. Resistente y se cultiva principalmente en México y Centroamérica.</p>
        </div>

        {{-- Tarjeta de Proyecto 3 (Gwen) --}}
        <div class="tarjeta">
            <img src="https://i.etsystatic.com/32029892/r/il/1db8dd/4476791049/il_1080xN.4476791049_7t7k.jpg" alt="Aguacate Gwen">
            <h2>Gwen</h2>
            <p>Se caracteriza por su textura cremosa, sabor a mantequilla y piel gruesa. Excelente opción para el consumo fresco.</p>
        </div>

        {{-- Tarjeta de Proyecto 4 (Lamb Hass) --}}
        <div class="tarjeta">
            <img src="https://sigfridofruit.com/wp-content/uploads/Lamb-Hass.webp" alt="Aguacate Lamb Hass">
            <h2>Lamb Hass</h2>
            <p>Variedad de maduración tardía, ofrece frutos grandes y de alta resistencia a las enfermedades, ideal para exportación.</p>
        </div>

        {{-- Tarjeta de Proyecto 5 (Zutano) --}}
        <div class="tarjeta">
            <img src="https://sigfridofruit.com/wp-content/uploads/Aguacate-Zutano.webp" alt="Aguacate Zutano">
            <h2>Zutano</h2>
            <p>De origen mexicano, con piel delgada y lisa. Conocido por ser un buen polinizador en huertos mixtos.</p>
        </div>

        {{-- Tarjeta de Proyecto 6 (Pinkerton) --}}
        <div class="tarjeta">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStG5Dzo1AbS8dj0SB-_5Pkm-R6yXIppNx5Yw&s" alt="Aguacate Pinkerton">
            <h2>Pinkerton</h2>
            <p>Híbrido de origen guatemalteco y mexicano. Tiene forma alargada, piel rugosa y pulpa cremosa, buen rendimiento.</p>
        </div>

        {{-- Tarjeta de Proyecto 7 (Lorena) --}}
        <div class="tarjeta">
            <img src="https://la-canasta.org/wp-content/uploads/2025/06/Aguacate_Lorena.jpg" alt="Aguacate Lorena">
            <h2>Lorena</h2>
            <p>Cultivada en Colombia. Grande, piel lisa y verde brillante. Pulpa cremosa y sabor suave.</p>
        </div>

        {{-- Tarjeta de Proyecto 8 (Carlos) --}}
        <div class="tarjeta">
            <img src="https://www.freshplaza.es/remote/https/agfstorage.blob.core.windows.net/misc/FP_es/2025/01/29/JE_5_.jpg?preset=ContentFullSmall" alt="Aguacate Carlos">
            <h2>Carlos</h2>
            <p>Originario de los Andes colombianos. Piel rugosa, pulpa amarilla intensa y sabor ligeramente dulce.</p>
        </div>
        
    </div>
</section>

<!-- Sección de Recomendaciones de Cuidado -->
<section class="care-recommendations">
    <h2>Recomendaciones Clave para el Cuidado</h2>
    <div class="recommendation-list">
        <div class="recommendation-item">
            <span class="icon-number">1</span>
            <div>
                <h3>Poda Estratégica</h3>
                <p>Realice podas de formación en los primeros años y podas sanitarias para eliminar ramas secas o enfermas.</p>
            </div>
        </div>
        <div class="recommendation-item">
            <span class="icon-number">2</span>
            <div>
                <h3>Manejo de Plagas</h3>
                <p>Monitoree constantemente la presencia de trips y ácaros. Use control biológico siempre que sea posible.</p>
            </div>
        </div>
        <div class="recommendation-item">
            <span class="icon-number">3</span>
                <h3>Fertilización</h3>
                <p>Aplique fertilizantes ricos en Nitrógeno, Fósforo y Potasio (NPK), ajustando las dosis según la etapa fenológica.</p>
        </div>
    </div>
</section>

<section class="quick-data-section">
    <h2>Datos Rápidos del Cultivo</h2>
    <div class="data-grid">
        <div class="data-card">
            <i class="fas fa-temperature-low"></i>
            <h3>Temperatura Ideal</h3>
            <p>15°C a 30°C</p>
        </div>
        <div class="data-card">
            <i class="fas fa-tint"></i>
            <h3>Riego</h3>
            <p>Requiere riego constante, pero sin encharcamiento.</p>
        </div>
        <div class="data-card">
            <i class="fas fa-tree"></i>
            <h3>Suelo</h3>
            <p>Bien drenado, franco-arenoso, pH 5.5 a 6.5.</p>
        </div>
        <div class="data-card">
            <i class="fas fa-sun"></i>
            <h3>Luz</h3>
            <p>Necesita pleno sol para una buena producción.</p>
        </div>
    </div>
</section>
    </main>
@endsection