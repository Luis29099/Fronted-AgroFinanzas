@extends('layouts.app')

{{-- 1. APLICA EL TEMA OSCURO DE GANADERÍA --}}
@section('body_class', 'cattle-theme') 

@section('content')
<div class="cattle-main container">
    <h1 class="main-title text-center mb-5">Manejo y Producción Ganadera</h1>
    
    {{-- Slider de Introducción --}}
    <section class="cattle-slider py-5">
        <div id="cattleCarousel" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-indicators">
                <button type="button" data-bs-target="#cattleCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#cattleCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#cattleCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#cattleCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>

            <div class="carousel-inner p-4 p-md-5 rounded main-card"> 
                
                {{-- Slide 1: Razas Bovinas --}}
                <div class="carousel-item active">
                    <div class="row align-items-center">
                        <div class="col-md-6 order-md-2">
                            <img src="https://aurocha.com/wp-content/uploads/2021/12/vacas-angus-aberdeen-scaled.jpg" class="img-fluid rounded shadow-lg slider-img" alt="Ganado Angus y Hereford">
                        </div>
                        <div class="col-md-6 order-md-1 slider-text">
                            <h2 class="slide-title">Principales Razas</h2>
                            <p class="text-light-cattle">
                                Domina las diferencias entre razas de **carne** (Angus, Brangus) y **leche** (Holstein, Jersey).
                                La genética es el primer paso para una producción eficiente y rentable.
                            </p>
                            <a href="#razasBovinas" class="btn btn-cattle-primary scroll-suave">Ver Catálogo</a>
                        </div>
                    </div>
                </div>

                {{-- Slide 2: Ciclo de Producción --}}
                <div class="carousel-item">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <img src="https://images.unsplash.com/photo-1500595046743-cd271d694d30?q=80&w=1000&auto=format&fit=crop" class="img-fluid rounded shadow-lg slider-img" alt="Terneros en pastoreo">
                        </div>
                        <div class="col-md-6 slider-text">
                            <h2 class="slide-title">Ciclo del Ganado</h2>
                            <p class="text-light-cattle">
                                Desde la cría y el levante hasta la ceba final. Cada etapa requiere 
                                un manejo nutricional específico para maximizar el rendimiento.
                            </p>
                            <a href="#procesoGanado" class="btn btn-cattle-primary scroll-suave">Ver Etapas</a>
                        </div>
                    </div>
                </div>

                {{-- Slide 3: Nutrición y Pastoreo --}}
                <div class="carousel-item">
                    <div class="row align-items-center">
                        <div class="col-md-6 order-md-2">
                            <img src="https://i.pinimg.com/736x/3d/3a/6e/3d3a6e311ff5e5285a84de5dc938cc42.jpg" class="img-fluid rounded shadow-lg slider-img" alt="Pastoreo rotacional">
                        </div>
                        <div class="col-md-6 order-md-1 slider-text">
                            <h2 class="slide-title">Manejo de Praderas</h2>
                            <p class="text-light-cattle">
                                Implementa sistemas de **pastoreo rotacional** para mejorar la carga animal.
                                Un suelo sano significa animales más productivos y resistentes.
                            </p>
                            <a href="#metodosCosecha" class="btn btn-cattle-primary scroll-suave">Sistemas de Pastoreo</a>
                        </div>
                    </div>
                </div>

                {{-- Slide 4: Noticias del Sector --}}
                <div class="carousel-item">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <img src="https://montanaweb-bucket.s3.amazonaws.com/web/blog/1/produccion-de-terneros.png" class="img-fluid rounded shadow-lg slider-img" alt="Tecnología en el campo">
                        </div>
                        <div class="col-md-6 slider-text">
                            <h2 class="slide-title">Actualidad Pecuaria</h2>
                            <p class="text-light-cattle">
                                Mantente al día con los precios del ganado, tendencias en genética
                                y nuevas tecnologías para el monitoreo de hatos en tiempo real.
                            </p>
                            <a href="#noticiasGanado" class="btn btn-cattle-primary scroll-suave">Noticias</a>
                        </div>
                    </div>
                </div>

            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#cattleCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#cattleCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    </section>

    <hr class="cattle-divider">

    {{-- Razas de Ganado --}}
    <section id="razasBovinas" class="py-5">
        <h2 class="section-title text-center mb-4">Principales Razas de Explotación</h2>
        <p class="section-subtitle text-center mb-5">Selecciona la genética adecuada según tu propósito comercial.</p>

        <div class="row g-4 mt-4">
            
            {{-- Tarjeta: Angus --}}
            <div class="col-md-4">
                <div class="card cattle-card h-100 shadow">
                    <img src="https://asoangusbrangus.org.co/images/razas/raza_angus.jpg" class="card-img-top card-image" alt="Raza Angus">
                    <div class="card-body">
                        <h5 class="card-title text-cattle-accent">Angus (Cárnico)</h5>
                        <p class="card-text text-light-cattle small">
                            <strong class="text-cattle-accent">Fortaleza:</strong> Calidad de carne (marmoleo) y precocidad.
                            <br><strong class="text-cattle-accent">Adaptación:</strong> Excelente en climas templados.
                            <br><strong class="text-cattle-accent">Mercado:</strong> El estándar de oro para exportación.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Tarjeta: Holstein --}}
            <div class="col-md-4">
                <div class="card cattle-card h-100 shadow">
                    <img src="https://molinoschampion.com/wp-content/uploads/2021/03/Mesa-de-trabajo-1-copia-14-100.jpg" class="card-img-top card-image" alt="Raza Holstein">
                    <div class="card-body">
                        <h5 class="card-title text-cattle-accent">Holstein (Lácteo)</h5>
                        <p class="card-text text-light-cattle small">
                            <strong class="text-cattle-accent">Producción:</strong> La raza con mayor volumen de leche.
                            <br><strong class="text-cattle-accent">Uso:</strong> Principal proveedor de la industria láctea.
                            <br><strong class="text-cattle-accent">Cuidado:</strong> Requiere alta suplementación nutricional.
                        </p>
                    </div>
                </div>
            </div>
            
            {{-- Tarjeta: Brahman --}}
            <div class="col-md-4">
                <div class="card cattle-card h-100 shadow">
                    <img src="https://diariolaeconomia.com/media/k2/items/cache/891bc0e45e0849a552d0ba70b9f8ec5e_XL.jpg" class="card-img-top card-image" alt="Raza Brahman">
                    <div class="card-body">
                        <h5 class="card-title text-cattle-accent">Brahman (Rústico)</h5>
                        <p class="card-text text-light-cattle small">
                            <strong class="text-cattle-accent">Resistencia:</strong> Alta tolerancia al calor y parásitos.
                            <br><strong class="text-cattle-accent">Hibridación:</strong> Base perfecta para cruces F1.
                            <br><strong class="text-cattle-accent">Zona:</strong> Ideal para ganadería en trópico bajo.
                        </p>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

    <hr class="cattle-divider">

    {{-- Ciclo de Manejo --}}
    <section id="procesoGanado" class="py-5">
        <h2 class="section-title text-center mb-5">El Ciclo de Vida: Del Nacimiento al Mercado</h2>

        <div class="row mt-4 align-items-center">

            <div class="col-md-6 order-md-2">
                <img src="https://desarrollorural.yucatan.gob.mx/files-content/galerias/5e35b133328bb9efa0466a7ee62e7606.jpg"
                    class="img-fluid rounded shadow-lg process-image" alt="Pesaje de ganado">
            </div>

            <div class="col-md-6 order-md-1">
                
                <div class="mb-5">
                    <h3 class="sub-section-title text-cattle-accent">Línea de Tiempo Productiva</h3>
                    <ul class="timeline">
                        <li><span>Nacimiento & Calostrado</span>: Fase crítica para la inmunidad del ternero.</li>
                        <li><span>Crianza (Lactancia)</span>: Desarrollo del sistema digestivo inicial.</li>
                        <li><span>Destete</span>: Transición a dieta sólida basada en forraje y concentrado.</li>
                        <li><span>Levante (Recría)</span>: Crecimiento óseo y muscular sostenido.</li>
                        <li><span>Ceba (Engorde)</span>: Finalización para alcanzar el peso óptimo de sacrificio.</li>
                        <li><span>Comercialización</span>: Gestión de logística y transporte bajo normas de bienestar animal.</li>
                    </ul>
                </div>

                <div class="mt-5">
                    <h3 class="sub-section-title text-cattle-accent">Bienestar y Sanidad Animal</h3>
                    <div class="ratio ratio-16x9 rounded shadow-lg video-container">
                        {{-- Video sugerido sobre manejo de ganado --}}
                        <iframe 
    width="560" 
    height="315" 
    src="https://www.youtube.com/embed/0b5iyRCG3P0" 
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

    {{-- Métodos de Alimentación --}}
    <section id="metodosCosecha" class="py-5">
        <h2 class="section-title text-center mb-5">Sistemas de Alimentación y Pastoreo</h2>

        <div class="row mt-4">

            {{-- Pastoreo Extensivo --}}
            <div class="col-md-4 mb-4">
                <div class="card cattle-card h-100 shadow">
                    <img src="https://www.uoc.edu/content/dam/news/images/noticies/2023/200-la-tecnologia-dona-pas-al-pasturatge-digital.jpg" class="card-img-top card-image" alt="Pastoreo Extensivo">
                    <div class="card-body">
                        <h5 class="card-title text-cattle-accent">Pastoreo Extensivo</h5>
                        <p class="card-date text-muted fst-italic">Bajo Insumo</p>
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
                        <h5 class="card-title text-cattle-accent">Rotacional (Voisin)</h5>
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
                        <h5 class="card-title text-cattle-accent">Confinamiento (Feedlot)</h5>
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
                        <h5 class="card-title text-cattle-accent">Tendencia de Precios en Subasta</h5>
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
                        <h5 class="card-title text-cattle-accent">Ciclo de Vacunación 2024</h5>
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
                        <h5 class="card-title text-cattle-accent">Tecnología de Identificación</h5>
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
@endsection