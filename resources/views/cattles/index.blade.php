@extends('layouts.app')

@section('body_class', 'cattle-theme')

@section('content')
<style>
/* ===============================
   HERO
================================ */


</style>


{{-- HERO CON CARRUSEL --}}
<section class="hero-ganaderia">
  <div class="hero-content">

    {{-- TEXTO IZQUIERDA --}}
    <div class="hero-text">
      <h1>
        Manejo y Producción<br>
        <span>Ganadera</span>
      </h1>

      <div class="hero-line"></div>

      <p>
        Explora de forma integral la gestión del ganado bovino,
        abarcando genética, nutrición, sanidad y comercialización,
        bajo un enfoque técnico y sostenible.
      </p>

      <!-- <div class="hero-actions">
        <a href="#razasBovinas" class="btn btn-cattle-primary">Razas Bovinas</a>
        <a href="#procesoGanado" class="btn btn-outline-light">Ciclo Productivo</a>
      </div> -->
    </div>

    {{-- CARRUSEL DERECHA (EL ORIGINAL) --}}
    <div class="hero-carousel">
      <div id="cattleCarousel" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-indicators">
          <button type="button" data-bs-target="#cattleCarousel" data-bs-slide-to="0" class="active"></button>
          <button type="button" data-bs-target="#cattleCarousel" data-bs-slide-to="1"></button>
          <button type="button" data-bs-target="#cattleCarousel" data-bs-slide-to="2"></button>
          <button type="button" data-bs-target="#cattleCarousel" data-bs-slide-to="3"></button>
        </div>

        <div class="carousel-inner p-4 rounded main-card">

          {{-- Slide 1 --}}
          <div class="carousel-item active">
            <div class="row align-items-center">
              <div class="col-md-6 order-md-2">
                <img src="https://aurocha.com/wp-content/uploads/2021/12/vacas-angus-aberdeen-scaled.jpg"
                  class="img-fluid rounded shadow-lg slider-img">
              </div>
              <div class="col-md-6 order-md-1 slider-text">
                <h2 class="slide-title">Principales Razas</h2>
                <p class="text-light-cattle">
                  logra diferenciar entre razas de carne y leche.
                  
                </p>
                <a href="#razasBovinas" class="razabovina1">Ver Catálogo</a>
              </div>
            </div>
          </div>

          {{-- Slide 2 --}}
          <div class="carousel-item">
            <div class="row align-items-center">
              <div class="col-md-6">
                <img src="https://images.unsplash.com/photo-1500595046743-cd271d694d30"
                  class="img-fluid rounded shadow-lg slider-img">
              </div>
              <div class="col-md-6 slider-text">
                <h2 class="slide-title">Ciclo del Ganado</h2>
                <p class="text-light-cattle">
                  Desde la cría hasta la ceba final.
                  Cada etapa requiere manejo nutricional específico.
                </p>
                <a href="#procesoGanado" class="razabovina1">Ver Etapas</a>
              </div>
            </div>
          </div>

          {{-- Slide 3 --}}
          <div class="carousel-item">
            <div class="row align-items-center">
              <div class="col-md-6 order-md-2">
                <img src="https://i.pinimg.com/736x/3d/3a/6e/3d3a6e311ff5e5285a84de5dc938cc42.jpg"
                  class="img-fluid rounded shadow-lg slider-img">
              </div>
              <div class="col-md-6 order-md-1 slider-text">
                <h2 class="slide-title">Manejo de Praderas</h2>
                <p class="text-light-cattle">
                  Sistemas de pastoreo rotacional para mejorar productividad.
                </p>
                <a href="#metodosCosecha" class="razabovina1">Pastoreo</a>
              </div>
            </div>
          </div>

          {{-- Slide 4 --}}
          <div class="carousel-item">
            <div class="row align-items-center">
              <div class="col-md-6">
                <img src="https://montanaweb-bucket.s3.amazonaws.com/web/blog/1/produccion-de-terneros.png"
                  class="img-fluid rounded shadow-lg slider-img">
              </div>
              <div class="col-md-6 slider-text">
                <h2 class="slide-title">Actualidad Pecuaria</h2>
                <p class="text-light-cattle">
                  Noticias, precios y tecnología aplicada al sector.
                </p>
                <a href="#noticiasGanado" class="razabovina1">Noticias</a>
              </div>
            </div>
          </div>

        </div>

        <!-- <button class="carousel-control-prev" type="button" data-bs-target="#cattleCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#cattleCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button> -->

      </div>
    </div>

  </div>
</section>



{{--aqui weeeeeeeeeeeeee--}}
<hr class="cattle-divider">

<section id="razasBovinas" class="py-5">
  <h2 class="section-title text-center mb-5">Razas Bovinas</h2>

  <div class="row mt-4">

    <!-- ANGUS -->
    <div class="col-md-4 mb-4">
      <div class="card cattle-card h-100 shadow breed-card">
        <img src="https://asoangusbrangus.org.co/images/razas/raza_angus.jpg"
             class="card-img-top card-image" alt="Angus">

        <div class="card-body">
          <h5 class="titulocard">Angus</h5>
          <p class="card-text small">
            Raza especializada en producción de carne premium.
          </p>

          <button class="btn btn-outline-success btn-sm breed-toggle">
            Ver detalles técnicos
          </button>

          <div class="breed-extra">
            <ul>
              <li> Excelente marmoleo de carne</li>
              <li> Alta eficiencia alimenticia</li>
              <li> Ideal para sistemas intensivos</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- HOLSTEIN -->
    <div class="col-md-4 mb-4">
      <div class="card cattle-card h-100 shadow breed-card">
        <img src="https://upload.wikimedia.org/wikipedia/commons/a/a8/Koe_zijaanzicht_2.JPG"
             class="card-img-top card-image" alt="Holstein">

        <div class="card-body">
          <h5 class="titulocard">Holstein</h5>
          <p class="card-text small">
            Principal raza lechera a nivel mundial.
          </p>

          <button class="btn btn-outline-success btn-sm breed-toggle">
            Ver detalles técnicos
          </button>

          <div class="breed-extra">
            <ul>
              <li> Alta producción diaria de leche</li>
              <li> Requiere manejo nutricional preciso</li>
              <li> Común en sistemas intensivos</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- BRAHMAN -->
    <div class="col-md-4 mb-4">
      <div class="card cattle-card h-100 shadow breed-card">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQv3lIeK4cZ4g7u_3WHY4cRiyGjWIKeW4ammQ&s"
             class="card-img-top card-image" alt="Brahman">

        <div class="card-body">
          <h5 class="titulocard">Brahman</h5>
          <p class="card-text small">
            Raza adaptada a climas tropicales.
          </p>

          <button class="btn btn-outline-success btn-sm breed-toggle">
            Ver detalles técnicos
          </button>

          <div class="breed-extra">
            <ul>
              <li> Alta resistencia al calor</li>
              <li> Tolerancia a parásitos</li>
              <li> Base genética para cruces</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- BLOQUE ACADÉMICO -->
  <div class="row mt-5">
    <div class="col-12">
      <div class="reference-panel">
        <h4 class="text-success mb-3"> Importancia de la Selección Racial</h4>
        <p>
          La selección de razas bovinas debe realizarse con base en criterios técnicos,
          condiciones ambientales y objetivos productivos definidos.
        </p>

        <ul class="reference-list">
          <li><strong>Objetivo productivo:</strong> carne, leche o doble propósito.</li>
          <li><strong>Adaptación climática:</strong> influencia directa en rendimiento.</li>
          <li><strong>Sistema de manejo:</strong> intensivo, semi-intensivo o extensivo.</li>
          <li><strong>Rentabilidad:</strong> reducción de costos y mejora productiva.</li>
        </ul>
      </div>
    </div>
  </div>

</section>

{{--hasta aqui weeeeeeeeeeeeeee--}}










    <hr class="cattle-divider">

{{-- Ciclo de Manejo --}}
<section id="procesoGanado" class="container my-5">

  <!-- TÍTULO -->
  <div class="text-center mb-5">
    <h2 class="section-title">El Ciclo de Vida: Del Nacimiento al Mercado</h2>
    <p class="text_muted">
      Optimización integral del desarrollo bovino y su impacto directo en la productividad pecuaria.
    </p>
  </div>

  <!-- TEXTO + IMAGEN -->
  <div class="row align-items-center mb-5">

    <!-- TEXTO -->
    <div class="col-md-6">
      <h4 class="mb-4 text-success"> Línea de Tiempo Productiva</h4>

      <!-- <p class="text-muted mb-4">
        Cada etapa del ciclo productivo bovino influye directamente en la sanidad, el rendimiento
        y la calidad final del animal. Un manejo técnico adecuado permite maximizar resultados
        y reducir pérdidas.
      </p> -->

      <ul class="timeline-clean">
        <li>
          <strong>Nacimiento & Calostrado:</strong>
          Ingesta temprana de calostro para garantizar inmunidad pasiva y reducir mortalidad neonatal.
        </li>
        <li>
          <strong>Crianza (Lactancia):</strong>
          Desarrollo del sistema digestivo y fortalecimiento del crecimiento inicial.
        </li>
        <li>
          <strong>Destete:</strong>
          Transición controlada a dieta sólida para minimizar estrés y pérdidas productivas.
        </li>
        <li>
          <strong>Levante (Recría):</strong>
          Crecimiento óseo y muscular sostenido que define el potencial productivo.
        </li>
        <li>
          <strong>Ceba (Engorde):</strong>
          Optimización de ganancia de peso y eficiencia alimenticia.
        </li>
        <li>
          <strong>Comercialización:</strong>
          Logística, trazabilidad y transporte bajo normas de bienestar animal.
        </li>
      </ul>


      <!-- LINKS -->
      <div class="mt-4">
        <h6 class="text-success mb-2"> Recursos Técnicos</h6>
        <ul class="ganaderia-links">
          <li><a href="https://www.fao.org/home/es" target="_blank">FAO – Producción Ganadera</a></li>
          <li><a href="https://www.ica.gov.co" target="_blank">ICA – Normativa Sanitaria</a></li>
          <li><a href="https://www.agrosavia.co" target="_blank">AGROSAVIA – Investigación Pecuaria</a></li>
        </ul>
      </div>
    </div>

    <!-- IMAGEN -->
    <div class="col-md-6 text-center">
      <img
        src="https://desarrollorural.yucatan.gob.mx/files-content/galerias/5e35b133328bb9efa0466a7ee62e7606.jpg"
        class="img-fluid process-img"
        alt="Ciclo productivo bovino">
    </div>
  </div>

  <!-- VIDEO ABAJO -->
  <div class="row">
    <div class="col-12">
      <div class="video-container">
        <iframe
          width="100%"
          height="400"
          src="https://www.youtube.com/embed/0b5iyRCG3P0"
          frameborder="0"
          allowfullscreen>
        </iframe>
      </div>
    </div>
  </div>




  <section class="gan-section">
    <!-- BUENAS PRÁCTICAS GANADERAS -->
<div class="row mt-5">
  <div class="col-12 text-center mb-4">
    <h3 class="section-subtitle">Buenas Prácticas en la Producción Bovina</h3>
    <p class="text_muted">
      Lineamientos fundamentales para garantizar eficiencia, sostenibilidad y bienestar animal.
    </p>
  </div>

  <div class="col-md-4 mb-4">
    <div class="practice-card">
      <h5> Manejo Nutricional</h5>
      <p>
        Dietas balanceadas según etapa productiva para maximizar ganancia de peso y salud digestiva.
      </p>
    </div>
  </div>

  <div class="col-md-4 mb-4">
    <div class="practice-card">
      <h5> Control Sanitario</h5>
      <p>
        Programas de vacunación, desparasitación y seguimiento veterinario continuo.
      </p>
    </div>
  </div>

  <div class="col-md-4 mb-4">
    <div class="practice-card">
      <h5> Bienestar Animal</h5>
      <p>
        Espacios adecuados, manejo sin estrés y transporte bajo normativas vigentes.
      </p>
    </div>
  </div>
</div>




  





<div class="row mt-5">
  <div class="col-12 mb-4">
    <h4 class="text-success"> Valores de Referencia Productiva</h4>
    <p class="text_muted">
      Los siguientes rangos corresponden a parámetros comúnmente aceptados en
      sistemas de producción bovina bien manejados. No representan datos dinámicos
      ni resultados en tiempo real.
    </p>
  </div>

  <div class="col-md-6 mb-3">
    <p><strong> Supervivencia neonatal:</strong> Alta cuando se realiza un adecuado calostrado y manejo sanitario.</p>
  </div>

  <div class="col-md-6 mb-3">
    <p><strong> Edad promedio al sacrificio:</strong> Entre 18 y 24 meses según sistema productivo.</p>
  </div>

  <div class="col-md-6 mb-3">
    <p><strong> Eficiencia productiva:</strong> Mejora con nutrición balanceada y genética adecuada.</p>
  </div>

  <div class="col-md-6 mb-3">
    <p><strong> Trazabilidad:</strong> Recomendable en todas las etapas del ciclo productivo.</p>
  </div>
</div>

</section>

<section class="gan-section">

<!-- BIENESTAR ANIMAL -->
<div class="row align-items-center mt-5">
  <div class="col-md-6 mb-4 mb-md-0">
    <img
      src="https://a.storyblok.com/f/160385/5302138987/bienestar_animal_listindiario_com.png/m/?w=256&q=100"
      class="img-fluid rounded"
      alt="Bienestar animal en ganadería">
  </div>

  <div class="col-md-6">
    <h4 class="text-success mb-3">Compromiso con el Bienestar Animal</h4>
    <p >
      La producción ganadera moderna prioriza prácticas éticas que reduzcan el estrés,
      mejoren la calidad de vida del animal y aseguren productos de mayor calidad
      para el consumidor final.
    </p>
    <p >
      Estas acciones no solo cumplen normativas nacionales e internacionales,
      sino que fortalecen la sostenibilidad del sector pecuario.
    </p>
  </div>
</div>

</section>

</section>




    {{--aquiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii--}} 

    
    <hr class="cattle-divider">

    {{-- Métodos de Alimentación --}}
    <section id="metodosCosecha" class="py-5">
        <h2 class="section-title text-center mb-5">Sistemas de Alimentación y Pastoreo</h2>

        <div class="row mt-4">

            {{-- Pastoreo Extensivo --}}
            <div class="col-md-4 mb-4">
                <div class="card cattle-card h-100 shadow">
                    <img src="https://www.uoc.edu/content/dam/news/images/noticies/2023/200-la-tecnologia-dona-pas-al-pasturatge-digital.jpg" class="card-img-top card-image" alt="Pastoreo Extensivo">
                    <div class="card-body">
                        <h5 class="titulocard">Pastoreo Extensivo</h5>
                        <p class="card-date  fst-italic">Bajo Insumo</p>
                        <p class="card-text text-light-cattle small">
                            Los animales recorren grandes áreas. Requiere menos inversión pero tiene menor carga por hectárea.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Pastoreo Rotacional --}}
            <div class="col-md-4 mb-4">
                <div class="card cattle-card h-100 shadow">
                    <img src="https://infopastosyforrajes.com/wp-content/uploads/2020/04/Sistemas-de-Pastoreo-2.jpg" class="card-img-top card-image" alt="Pastoreo Rotacional">
                    <div class="card-body">
                        <h5 class="titulocard">Rotacional (Voisin)</h5>
                        <p class="card-date text-muted fst-italic">Alta Eficiencia</p>
                        <p class="card-text text-light-cattle small">
                            División de potreros con cercas eléctricas. Optimiza el descanso del pasto y la nutrición animal.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Feedlot --}}
            <div class="col-md-4 mb-4">
                <div class="card cattle-card h-100 shadow"> 
                    <img src="https://a.storyblok.com/f/160385/a33fe0d0ac/aumentar-espacio-vital-ganado-esta-confinamiento.jpg" class="card-img-top card-image" alt="Feedlot / Confinamiento">
                    <div class="card-body">
                        <h5 class="titulocard">Confinamiento (Feedlot)</h5>
                        <p class="card-date text-muted fst-italic">Intensivo</p>
                        <p class="card-text text-light-cattle small">
                            Alimentación controlada en corrales. Máxima ganancia de peso diaria en el menor tiempo posible.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <hr class="cattle-divider">
    
    {{-- Noticias --}}
    {{-- Noticias y Actualidad (Estático) --}}
    <section id="noticiasGanado" class="py-5">
        <h2 class="section-title text-center mb-5">Actualidad y Mercados Pecuarios</h2>
        <div class="row mt-4">
            
            {{-- Noticia 1 --}}
            <div class="col-md-4 mb-4">
                <div class="card news-card h-100 shadow cattle-card">
                    <img src="https://www.asoregan.co/wp-content/uploads/2024/09/Claves-para-la-Compra-Rentable-de-Ganado.jpg" class="card-img-top card-image" alt="Precios del ganado">
                    <div class="card-body">
                        <h5 class="titulocard">Tendencia de Precios en Subasta</h5>
                        <p class="card-text text-light-cattle">El precio del ganado en pie presenta una estabilidad esta semana. Los machos de levante se mantienen como la categoría más demandada por los cebadores.</p>
                        <span class="badge bg-success">Mercado</span>
                    </div>
                </div>
            </div>

            {{-- Noticia 2 --}}
            <div class="col-md-4 mb-4">
                <div class="card news-card h-100 shadow cattle-card">
                    <img src="https://img.lalr.co/cms/2020/04/13165837/Eco_vacunacionAftosa_AGRO.jpg?r=4_3" class="card-img-top card-image" alt="Salud Animal">
                    <div class="card-body">
                        <h5 class="titulocard">Ciclo de Vacunación 2024</h5>
                        <p class="card-text text-light-cattle">Las autoridades sanitarias anuncian las fechas oficiales para el primer ciclo contra la fiebre aftosa y brucelosis bovina. ¡Prepara tu hato!</p>
                        <span class="badge bg-danger">Sanidad</span>
                    </div>
                </div>
            </div>

            {{-- Noticia 3 --}}
            <div class="col-md-4 mb-4">
                <div class="card news-card h-100 shadow cattle-card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRd4Ez5yfKD6A81dZd55Q1Cx2s1bi16_v30ug&s" class="card-img-top card-image" alt="Tecnología">
                    <div class="card-body">
                        <h5 class="titulocard">Tecnología de Identificación</h5>
                        <p class="card-text text-light-cattle">El uso de crotales con tecnología RFID permite un control más preciso de la ganancia diaria de peso y el historial sanitario individual.</p>
                        <span class="badge bg-primary">Innovación</span>
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
            document.querySelector(this.getAttribute('href'))
                    .scrollIntoView({ behavior: 'smooth' });
        });
    });
</script>

<script>
document.querySelectorAll('.breed-toggle').forEach(button => {
  button.addEventListener('click', function () {
    const extra = this.nextElementSibling;

    extra.classList.toggle('active');

    this.textContent = extra.classList.contains('active')
      ? 'Ocultar detalles técnicos'
      : 'Ver detalles técnicos';
  });
});
</script>

@endsection