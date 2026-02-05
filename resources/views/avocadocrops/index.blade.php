@extends('layouts.app')

@section('content')
<main class="avocado-main">

    <!-- Galería de Variedades -->
    <section class="varieties-section">
        <h2>Conoce las Variedades</h2>
        <div class="contenedor-tarjetas">
            {{-- Tarjeta Hass --}}
            <div class="tarjeta" onclick="abrirModal('Hass','https://www.reyesgutierrez.com/wp-content/uploads/2021/04/aguacate-hass.jpg','La variedad más popular. Piel rugosa que se oscurece al madurar, pulpa cremosa y excelente sabor a nuez.')">
                <img src="https://www.reyesgutierrez.com/wp-content/uploads/2021/04/aguacate-hass.jpg" alt="Aguacate Hass">
                <h2>Hass</h2>
                <p>La variedad más popular. Piel rugosa que se oscurece al madurar, pulpa cremosa y excelente sabor a nuez.</p>
            </div>

            {{-- Tarjeta Fuerte --}}
            <div class="tarjeta" onclick="abrirModal('Fuerte','https://fertilizantesecoforce.es/wp-content/uploads/2022/06/Comprar-arbol-aguacate-fuerte.jpeg','Híbrido de piel suave y verde, forma de pera. Resistente y se cultiva principalmente en México y Centroamérica.')">
                <img src="https://fertilizantesecoforce.es/wp-content/uploads/2022/06/Comprar-arbol-aguacate-fuerte.jpeg" alt="Aguacate Fuerte">
                <h2>Fuerte</h2>
                <p>Híbrido de piel suave y verde, forma de pera. Resistente y se cultiva principalmente en México y Centroamérica.</p>
            </div>

            {{-- Tarjeta Gwen --}}
            <div class="tarjeta" onclick="abrirModal('Gwen','https://i.etsystatic.com/32029892/r/il/1db8dd/4476791049/il_1080xN.4476791049_7t7k.jpg','Se caracteriza por su textura cremosa, sabor a mantequilla y piel gruesa. Excelente opción para el consumo fresco.')">
                <img src="https://i.etsystatic.com/32029892/r/il/1db8dd/4476791049/il_1080xN.4476791049_7t7k.jpg" alt="Aguacate Gwen">
                <h2>Gwen</h2>
                <p>Se caracteriza por su textura cremosa, sabor a mantequilla y piel gruesa. Excelente opción para el consumo fresco.</p>
            </div>

            {{-- Tarjeta Lamb Hass --}}
            <div class="tarjeta" onclick="abrirModal('Lamb Hass','https://sigfridofruit.com/wp-content/uploads/Lamb-Hass.webp','Variedad de maduración tardía, ofrece frutos grandes y de alta resistencia a las enfermedades, ideal para exportación.')">
                <img src="https://sigfridofruit.com/wp-content/uploads/Lamb-Hass.webp" alt="Aguacate Lamb Hass">
                <h2>Lamb Hass</h2>
                <p>Variedad de maduración tardía, ofrece frutos grandes y de alta resistencia a las enfermedades, ideal para exportación.</p>
            </div>

            {{-- Tarjeta Zutano --}}
            <div class="tarjeta" onclick="abrirModal('Zutano','https://sigfridofruit.com/wp-content/uploads/Aguacate-Zutano.webp','De origen mexicano, con piel delgada y lisa. Conocido por ser un buen polinizador en huertos mixtos.')">
                <img src="https://sigfridofruit.com/wp-content/uploads/Aguacate-Zutano.webp" alt="Aguacate Zutano">
                <h2>Zutano</h2>
                <p>De origen mexicano, con piel delgada y lisa. Conocido por ser un buen polinizador en huertos mixtos.</p>
            </div>

            {{-- Tarjeta Pinkerton --}}
            <div class="tarjeta" onclick="abrirModal('Pinkerton','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStG5Dzo1AbS8dj0SB-_5Pkm-R6yXIppNx5Yw&s','Híbrido de origen guatemalteco y mexicano. Tiene forma alargada, piel rugosa y pulpa cremosa, buen rendimiento.')">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStG5Dzo1AbS8dj0SB-_5Pkm-R6yXIppNx5Yw&s" alt="Aguacate Pinkerton">
                <h2>Pinkerton</h2>
                <p>Híbrido de origen guatemalteco y mexicano. Tiene forma alargada, piel rugosa y pulpa cremosa, buen rendimiento.</p>
            </div>

            {{-- Tarjeta Lorena --}}
            <div class="tarjeta" onclick="abrirModal('Lorena','https://la-canasta.org/wp-content/uploads/2025/06/Aguacate_Lorena.jpg','Cultivada en Colombia. Grande, piel lisa y verde brillante. Pulpa cremosa y sabor suave.')">
                <img src="https://la-canasta.org/wp-content/uploads/2025/06/Aguacate_Lorena.jpg" alt="Aguacate Lorena">
                <h2>Lorena</h2>
                <p>Cultivada en Colombia. Grande, piel lisa y verde brillante. Pulpa cremosa y sabor suave.</p>
            </div>

            {{-- Tarjeta Carlos --}}
            <div class="tarjeta" onclick="abrirModal('Carlos','https://www.freshplaza.es/remote/https/agfstorage.blob.core.windows.net/misc/FP_es/2025/01/29/JE_5_.jpg?preset=ContentFullSmall','Originario de los Andes colombianos. Piel rugosa, pulpa amarilla intensa y sabor ligeramente dulce.')">
                <img src="https://www.freshplaza.es/remote/https/agfstorage.blob.core.windows.net/misc/FP_es/2025/01/29/JE_5_.jpg?preset=ContentFullSmall" alt="Aguacate Carlos">
                <h2>Carlos</h2>
                <p>Originario de los Andes colombianos. Piel rugosa, pulpa amarilla intensa y sabor ligeramente dulce.</p>
            </div>
        </div>
    </section>

    <!-- Recomendaciones de cuidado -->
    <section class="care-recommendations">
        <h2>Recomendaciones Clave para el Cuidado</h2>
        <div class="recommendation-list">
            <div class="recommendation-item">
                <span class="icon-number">1</span>
                <div>
                    <h3>Poda Estratégica</h3>
                    <p>Realice podas de formación en los primeros años y podas sanitarias para eliminar ramas secas o enfermas. Favorece la ventilación y la entrada de luz.</p>
                </div>
            </div>
            <div class="recommendation-item">
                <span class="icon-number">2</span>
                <div>
                    <h3>Manejo de Plagas</h3>
                    <p>Monitoree trips, ácaros y cochinillas. Use control biológico como insectos benéficos y productos orgánicos certificados.</p>
                </div>
            </div>
            <div class="recommendation-item">
                <span class="icon-number">3</span>
                <div>
                    <h3>Fertilización</h3>
                    <p>Aplique fertilizantes ricos en NPK, además de calcio y magnesio según análisis de suelo. Ajuste dosis según etapa de crecimiento y fruto.</p>
                </div>
            </div>
            <div class="recommendation-item">
                <span class="icon-number">4</span>
                <div>
                    <h3>Riego</h3>
                    <p>Riego constante pero sin encharcamiento. Sistemas por goteo o microaspersión son ideales. Monitoree humedad y clima.</p>
                </div>
            </div>
            <div class="recommendation-item">
                <span class="icon-number">5</span>
                <div>
                    <h3>Polinización</h3>
                    <p>Instale colmenas de abejas cerca de los árboles para mejorar la polinización y aumentar la producción de frutos.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Datos Rápidos -->
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

<!-- Modal -->
<div id="modalAguacate" class="modal" style="display:none;">
    <div class="modal-content">
        <span class="close" onclick="cerrarModal()">&times;</span>
        <h2 id="modal-title">Título de Aguacate</h2>
        <img id="modal-img" src="" alt="Aguacate">
        <p id="modal-desc">Descripción extendida del aguacate...</p>
    </div>
</div>

<!-- Scripts -->
<script>
function abrirModal(titulo, imgSrc, desc) {
    document.getElementById('modal-title').innerText = titulo;
    document.getElementById('modal-img').src = imgSrc;
    document.getElementById('modal-desc').innerText = desc;
    document.getElementById('modalAguacate').style.display = 'flex';
}

function cerrarModal() {
    document.getElementById('modalAguacate').style.display = 'none';
}

// Cerrar modal al hacer click fuera del contenido
window.onclick = function(event) {
    let modal = document.getElementById('modalAguacate');
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}
</script>
@endsection