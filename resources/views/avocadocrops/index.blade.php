@extends('layouts.app')

@section('content')


<div class="avocado-page">

<style>

</style>

<section class="hero-avocado">
    <div class="hero-content">
        <h1>Conoce mas sobre aguacates</h1>
        <p>Variedades, manejo técnico y recomendaciones clave para una producción eficiente y sostenible.</p>
    </div>
</section>

<main class="avocado-main">
<!-- ===== PRIMERAS 3 CARDS ===== -->
<div class="contenedor-tarjetas contenedor-principal">

    <!-- Hass -->
    <div class="avocado-card">
        <div class="avocado-img">
            <img src="https://www.reyesgutierrez.com/wp-content/uploads/2021/04/aguacate-hass.jpg" alt="Aguacate Hass">
        </div>
        <div class="avocado-body">
            <h3>Hass</h3>
            <span>Variedad comercial · Exportación</span>
            <a href="https://camposdelabuelo.com/blogs/novedades/el-aguacate-mas-popular-de-todos-el-hass" 
               target="_blank" 
               class="btn-card-link">
               Ver detalles
            </a>
        </div>
    </div>

    <!-- Fuerte -->
    <div class="avocado-card">
        <div class="avocado-img">
            <img src="https://fertilizantesecoforce.es/wp-content/uploads/2022/06/Comprar-arbol-aguacate-fuerte.jpeg" alt="Aguacate Fuerte">
        </div>
        <div class="avocado-body">
            <h3>Fuerte</h3>
            <span>Híbrido · Producción estable</span>
            <a href="https://www.campodebenamayor.es/frutas-tropicales/aguacate-fuerte/?srsltid=AfmBOorD8yUWGS0Ooa2xJtuTvv2OOj92WRvxPXP_pYmCW3qtzDcot5uE" 
               target="_blank" 
               class="btn-card-link">
               Ver detalles
            </a>
        </div>
    </div>

    <!-- Gwen -->
    <div class="avocado-card">
        <div class="avocado-img">
            <img src="https://i.etsystatic.com/32029892/r/il/1db8dd/4476791049/il_1080xN.4476791049_7t7k.jpg" alt="Aguacate Gwen">
        </div>
        <div class="avocado-body">
            <h3>Gwen</h3>
            <span>Consumo fresco · Alta calidad</span>
            <a href="https://www.frutamare.com/variedades-de-frutas/variedades-de-aguacates/aguacate-gwen/" 
               target="_blank" 
               class="btn-card-link">
               Ver detalles
            </a>
        </div>
    </div>

</div>


<!-- ===== BLOQUE INFORMATIVO ===== -->
<section class="avocado-info-wrapper">
    <div class="avocado-info">
        <div class="info-container">
            <h2>Otras variedades de aguacate</h2>

            <p>
                Además de las variedades más reconocidas a nivel comercial, existen otros tipos de aguacate que cumplen un papel clave dentro de la producción agrícola. Estas variedades permiten diversificar la producción y aprovechar mejor las condiciones del entorno, ya que muchas de ellas se adaptan a climas específicos, suelos particulares o presentan mayor resistencia a plagas y enfermedades.
                Algunas de estas variedades se cultivan principalmente para consumo local o regional, mientras que otras son utilizadas como portainjertos para mejorar el rendimiento de las plantaciones comerciales. Asimismo, pueden diferenciarse por características como el tamaño y la forma del fruto, el color y grosor de la cáscara, el contenido de aceite y el sabor de la pulpa.

                Estas variedades permiten diversificar la producción y aprovechar mejor las condiciones del entorno.
            </p>
        </div>
    </div>

    <div class="avocado-info">
        <div class="info-container">
            <h2>Importancia productiva</h2>

            <p>
                Importancia productiva Muchas de estas variedades se destinan al consumo local y a los mercados regionales, donde son valoradas por sus características particulares de sabor, textura o época de cosecha. Otras cumplen una función estratégica dentro de los huertos mixtos, especialmente como variedades polinizadoras, ya que favorecen una mejor floración y cuajado de frutos en las plantaciones comerciales.
                La correcta selección y combinación de variedades permite optimizar el uso de los recursos naturales, reducir riesgos productivos y mejorar la estabilidad del sistema agrícola frente a factores climáticos, plagas o fluctuaciones del mercado. De esta manera, se fortalece la productividad a largo plazo y se promueve un sistema más eficiente, diversificado y sostenible.
            </p>
        </div>
    </div>
</section>
<section class="avocado-carousel-section"><section class="avocado-carousel-pro">
    <div class="carousel-header">
        <h2>Variedades Complementarias</h2>
        <p>
            Otras variedades relevantes utilizadas para consumo local, polinización,
            portainjertos y diversificación productiva.
        </p>
    </div>




    <div class="carousel-pro-wrapper">

    <button class="carousel-pro-btn left" onclick="moveCarousel(-1)">‹</button>

    <div class="carousel-pro-viewport">
        <div class="carousel-pro-track" id="carouselTrack">
            <div class="carousel-pro-card" onclick="openDetail('bacon')">
                <img src="https://cdn.shopify.com/s/files/1/0611/0252/2576/files/2_1_0bdb538a-f436-4495-8653-1166025065a7.png?v=1729876018">
                <div class="card-overlay">
                    <h4>Bacon</h4>
                    <span>Clima frío · Buena resistencia</span>
                </div>
            </div>

            <div class="carousel-pro-card" onclick="openDetail('zutano')">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0cOTcbGdhpAEe3o3GaXidm0rSfx0OTe-wEA&s">
                <div class="card-overlay">
                    <h4>Zutano</h4>
                    <span>Polinizador · Alta rusticidad</span>
                </div>
            </div>

            <div class="carousel-pro-card" onclick="openDetail('reed')">
                <img src="https://stcroperproduction.blob.core.windows.net/uploads-public/images/9x-45dqi-ts6iteki-hnh/lg.webp">
                <div class="card-overlay">
                    <h4>Reed</h4>
                    <span>Fruto grande · Consumo fresco</span>
                </div>
            </div>

            <div class="carousel-pro-card" onclick="openDetail('pinkerton')">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTFlTO7iI6C48XZHtSMdoh8wxbebN_UlRR6gQ&s">
                <div class="card-overlay">
                    <h4>Pinkerton</h4>
                    <span>Alto rendimiento · Exportación</span>
                </div>
            </div>

            <div class="carousel-pro-card" onclick="openDetail('russell')">
                <img src="https://veliyathgarden.com/cdn/shop/files/virallongneckavocadomiamifruit_1138x-eb87f5abdf3042a38ab3c31d600dcaca_1946x.jpg?v=1747213969">
                <div class="card-overlay">
                    <h4>Russell</h4>
                    <span>Fruto alargado · Mercado local</span>
                </div>
            </div>
        </div>
    </div>

    <button class="carousel-pro-btn right" onclick="moveCarousel(1)">›</button>

</div>

</section>

    
</section>

<!-- ================== RECOMENDACIONES CLAVE – SECCIÓN PRO ================== -->
<section class="care-pro">
  <div class="care-pro-header">
    <h2>Recomendaciones Clave para el Cuidado</h2>
    <p>
      Lineamientos técnicos fundamentales para una producción eficiente,
      responsable y sostenible del cultivo de aguacate.
    </p>
  </div>

  <div class="care-pro-content">
    <div class="care-pro-text">
      <h3>Manejo agronómico responsable</h3>
      <ul>
        <li>Lineamientos técnicos fundamentales para una producción eficiente,
    responsable y sostenible del cultivo de aguacate. Estos principios
    integran buenas prácticas agronómicas, uso racional de recursos
    naturales y estrategias orientadas a la productividad a largo plazo,
    garantizando calidad, rentabilidad y sostenibilidad ambiental.</li>
    
        <li>El riego controlado en los aguacates es fundamental porque esta especie es muy sensible al exceso de agua, que puede provocar encharcamientos y favorecer enfermedades de raíz como la Phytophthora.
             Lo ideal es mantener el suelo húmedo pero bien drenado, aplicando agua de manera uniforme y en 
             cantidades que cubran las necesidades del árbol según su edad, tamaño y etapa de desarrollo.
        </li>

        <li>Monitoreo constante de plagas y enfermedades.</li>
        <!-- <li>Poda técnica para mejorar aireación y productividad.</li> -->
      </ul>
    </div>

    <div class="care-pro-video">
      <iframe
        src="https://www.bing.com/videos/riverview/relatedvideo?q=Recomendaciones+Clave+para+el+Cuidado+de+aguacate&&mid=A2B3F8C43DACCB4C48BBA2B3F8C43DACCB4C48BB&FORM=VRDGAR"
        allowfullscreen>
      </iframe>
    </div>
  </div>
 <div class="wide-text">
  <p>
    Lineamientos técnicos fundamentales para una producción eficiente,
    responsable y sostenible del cultivo de aguacate. Estos principios
    integran buenas prácticas agronómicas, uso racional de recursos
    naturales y estrategias orientadas a la productividad a largo plazo,
    garantizando calidad, rentabilidad y sostenibilidad ambiental.
  </p>
</div>


</section>

<section class="agro-metrics">
  <div class="agro-metrics-header">
    <h2>Parámetros Técnicos del Cultivo</h2>
    <p>
      Indicadores agronómicos esenciales que definen el desarrollo,
      rendimiento y sostenibilidad del cultivo de aguacate.
    </p>
  </div>

  <div class="agro-metrics-grid">

    <div class="metric-card">
      <span class="metric-label">Temperatura óptima</span>
      <h3>15° – 30° C</h3>
      <p>
        Rango térmico ideal para un crecimiento vegetativo estable
        y una correcta formación del fruto.
      </p>
    </div>

    <div class="metric-card">
      <span class="metric-label">Requerimiento hídrico</span>
      <h3>Riego controlado</h3>
      <p>
        Aporte constante de agua con drenaje eficiente para evitar
        estrés radicular y enfermedades.
      </p>
    </div>

    <div class="metric-card">
      <span class="metric-label">Tipo de suelo</span>
      <h3>Franco – Arenoso</h3>
      <p>
        Suelos bien aireados, con buen drenaje y pH ligeramente ácido
        entre 5.5 y 6.5.
      </p>
    </div>

    <div class="metric-card">
      <span class="metric-label">Altitud recomendada</span>
      <h3>1.200 – 2.500 msnm</h3>
      <p>
        Zonas de media y alta montaña que favorecen la floración
        y calidad del fruto.
      </p>
    </div>

  </div>
</section>


</main>


<!-- ===== MEGA DETAIL MODAL ===== -->
<div id="avocadoDetailModal" class="avocado-detail-modal">
  <div class="avocado-detail-content">
    <span class="detail-close" onclick="closeDetail()">×</span>

    <div class="detail-grid">

      <div class="detail-gallery">
        <img id="detail-main-img" src="" alt="Aguacate">
        <div class="detail-thumbs" id="detail-thumbs"></div>
      </div>

      <div class="detail-info">
        <h2 id="detail-title"></h2>
        <p id="detail-description"></p>

        <div class="detail-data" id="detail-data"></div>

        <div class="detail-video">
          <iframe
            id="detail-video"
            width="100%"
            height="220"
            frameborder="0"
            allowfullscreen>
          </iframe>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- ===== MODAL + SCRIPT ===== -->


<!-- ===== MODAL + SCRIPT ===== -->
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

let index = 0;
let locked = false;

let currentIndex = 0;



function moveCarousel(direction) {
    const track = document.getElementById('carouselTrack');
    const cards = document.querySelectorAll('.carousel-pro-card');

    const gap = 35;
    const cardWidth = cards[0].offsetWidth + gap;

    const totalCards = cards.length;
    const visibleCards = 3;
    const maxIndex = totalCards - visibleCards;

    currentIndex += direction;

    if (currentIndex < 0) {
        currentIndex = 0;
    }

    if (currentIndex > maxIndex) {
        currentIndex = maxIndex;
    }

    track.style.transform = `translateX(-${currentIndex * cardWidth}px)`;
}




const avocadoData = {

  bacon: {
    title: "Aguacate Bacon",
    description: "Variedad resistente al frío, utilizada como polinizador y complemento productivo en huertos mixtos.",
    images: [
      "https://cdn.shopify.com/s/files/1/0611/0252/2576/files/2_1_0bdb538a-f436-4495-8653-1166025065a7.png?v=1729876018",
      "https://cdn.shopify.com/s/files/1/0611/0252/2576/files/1_1.png?v=1729875883",
      "https://fertilizantesecoforce.es/wp-content/uploads/aguacate-bacon-web-1.jpg"
    ],
    video: "https://www.youtube.com/embed/DJm-K1CGfKA",
    
    data: [
      "Clima: Frío – templado",
      "Altitud: 1.200 – 2.400 msnm",
      "Función: Excelente polinizador",
      "Piel: Verde lisa",
      "Contenido de aceite: Medio"
    ]
    
  },

  zutano: {
    title: "Aguacate Zutano",
    description: "Variedad de crecimiento vigoroso, comúnmente usada como polinizador tipo B.",
    images: [
      "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0cOTcbGdhpAEe3o3GaXidm0rSfx0OTe-wEA&s",
      "https://www.vivercitrus.com/wp-content/uploads/2020/11/ZUTANO.jpg"
    ],
    video: "https://www.youtube.com/embed/3a-_yNfPz9M",
    data: [
      "Floración tipo B",
      "Alta rusticidad",
      "Producción estable",
      "Buena adaptación climática",
      "Pulpa menos cremosa"
    ]
  },

  reed: {
    title: "Aguacate Reed",
    description: "Fruto grande y redondo, excelente para consumo fresco por su sabor suave.",
    images: [
      "https://stcroperproduction.blob.core.windows.net/uploads-public/images/9x-45dqi-ts6iteki-hnh/lg.webp",
      "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTn6DJUPnM-fJOwsP-jLn6siSWZVEvLRtnr-Q&s"
    ],
    video: "https://www.youtube.com/embed/IxruIp23Pmk",
    data: [
      "Fruto grande",
      "Pulpa cremosa",
      "Alta calidad comercial",
      "Cosecha tardía",
      "Piel gruesa"
    ]
  },

  pinkerton: {
    title: "Aguacate Pinkerton",
    description: "Variedad de alto rendimiento, muy apreciada para exportación.",
    images: [
      "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTFlTO7iI6C48XZHtSMdoh8wxbebN_UlRR6gQ&s",
      "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQdfFRgpQH7cCVfT7ExzM5zg3ExiXFpuFKSCw&s"
    ],
    video: "https://www.youtube.com/embed/1r9IBXG-18Q",
    data: [
      "Alto rendimiento por hectárea",
      "Forma alargada",
      "Contenido alto de aceite",
      "Buena conservación postcosecha",
      "Alta demanda internacional"
    ]
  },

  russell: {
    title: "Aguacate Russell",
    description: "Variedad de fruto alargado utilizada principalmente para mercados locales.",
    images: [
      "https://veliyathgarden.com/cdn/shop/files/virallongneckavocadomiamifruit_1138x-eb87f5abdf3042a38ab3c31d600dcaca_1946x.jpg?v=1747213969",
      "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTD1cUSO2pdvXBXJmI-CRdsePdMkKUYjJgtBw&s"
    ],
    video: "https://www.youtube.com/embed/h9j3C4Bvm74",
    data: [
      "Fruto extremadamente largo",
      "Mercado regional",
      "Pulpa suave",
      "Producción media",
      "Alta curiosidad comercial"
    ]
  }

};


function openDetail(type){

  const modal = document.getElementById("avocadoDetailModal");
  const data = avocadoData[type];

  if(!data){
    console.warn("Variedad no encontrada:", type);
    return;
  }

  document.getElementById("detail-title").innerText = data.title;
  document.getElementById("detail-description").innerText = data.description;
  document.getElementById("detail-main-img").src = data.images[0];
  document.getElementById("detail-video").src = data.video;

  const thumbs = document.getElementById("detail-thumbs");
  thumbs.innerHTML = "";

  data.images.forEach(img=>{
    thumbs.innerHTML += `
      <img src="${img}" 
      onclick="document.getElementById('detail-main-img').src='${img}'">
    `;
  });

  const detailData = document.getElementById("detail-data");
  detailData.innerHTML = "";

  data.data.forEach(d=>{
    detailData.innerHTML += `<div>• ${d}</div>`;
  });

  modal.style.display = "flex";
modal.style.opacity = "0";
setTimeout(()=> modal.style.opacity = "1", 10);

}


function closeDetail(){
  document.getElementById("avocadoDetailModal").style.display = "none";
  document.getElementById("detail-video").src = "";
}


</script>



</div>
@endsection