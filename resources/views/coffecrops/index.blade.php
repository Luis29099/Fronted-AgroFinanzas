@extends('layouts.app')

{{-- 1. APLICA EL TEMA OSCURO Y DE CAFÉ A ESTA VISTA --}}
@section('body_class', 'coffee-theme') 

@section('content')
<div class="coffee-main container">
    <h1 class="main-title text-center mb-5">Cuidado y Manejo del Café</h1>
    
    {{-- Slider de Introducción --}}
    <section class="coffee-slider py-5">
        <div id="cafeCarousel" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-indicators">
                <button type="button" data-bs-target="#cafeCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#cafeCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#cafeCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#cafeCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>

            <div class="carousel-inner p-4 p-md-5 rounded main-card"> 
                
                {{-- Slide 1: Tipos de Café --}}
                <div class="carousel-item active">
                    <div class="row align-items-center">
                        <div class="col-md-6 order-md-2">
                            <img src="https://cafe1820.com/wp-content/uploads/2020/02/preview-lightbox-%C2%BFCu%C3%A1les-son-los-tipos-de-caf%C3%A9-m%C3%A1s-populares-en-el-mundo.jpg" class="img-fluid rounded shadow-lg slider-img" alt="Grano de Café arábica y robusta">
                        </div>
                        <div class="col-md-6 order-md-1 slider-text">
                            <h2 class="slide-title">Tipos de Café</h2>
                            <p class="text-light-coffee">
                                Conoce las principales variedades como **Arábica** (suave) y **Robusta** (fuerte).
                                Cada una aporta perfiles de sabor únicos e irrepetibles para tu taza perfecta.
                            </p>
                            <a href="#tiposCafe" class="cafeboton">Descubre Más</a>
                        </div>
                    </div>
                </div>

                {{-- Slide 2: El Viaje del Grano --}}
                <div class="carousel-item">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <img src="https://perfectdailygrind.com/es/wp-content/uploads/sites/2/2022/03/image7-4.png" class="img-fluid rounded shadow-lg slider-img" alt="Proceso de secado del café">
                        </div>
                        <div class="col-md-6 slider-text">
                            <h2 class="slide-title">El Viaje del Grano</h2>
                            <p class="text-light-coffee">
                                Desde su cultivo en la planta hasta el tostado final, cada paso
                                transforma el grano y define su calidad. ¡Un proceso artesanal!
                            </p>
                            <a href="#procesoCafe" class="cafeboton">Ver Proceso</a>
                        </div>
                    </div>
                </div>

                {{-- Slide 3: Técnicas de Cosecha --}}
                <div class="carousel-item">
                    <div class="row align-items-center">
                        <div class="col-md-6 order-md-2">
                            <img src="https://perfectdailygrind.com/es/wp-content/uploads/sites/2/2019/11/@fincaelreposo-3.jpg" class="img-fluid rounded shadow-lg slider-img" alt="Cosecha de granos de café">
                        </div>
                        <div class="col-md-6 order-md-1 slider-text">
                            <h2 class="slide-title">Técnicas de Cosecha</h2>
                            <p class="text-light-coffee">
                                Existen diversas técnicas, desde la **selectiva** (manual) hasta la **mecánica**.
                                El método de recolección afecta directamente la calidad del sabor final.
                            </p>
                            <a href="#metodosCosecha" class="cafeboton">Conocer Métodos</a>
                        </div>
                    </div>
                </div>

                {{-- Slide 4: Noticias y Tendencias --}}
                <div class="carousel-item">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <img src="https://png.pngtree.com/background/20250125/original/pngtree-cup-of-coffee-with-mist-laptop-coffee-leaf-at-breakfast-picture-image_15539570.jpg" class="img-fluid rounded shadow-lg slider-img" alt="Taza de café y laptop">
                        </div>
                        <div class="col-md-6 slider-text">
                            <h2 class="slide-title">Noticias y Tendencias</h2>
                            <p class="text-light-coffee">
                                Mantente actualizado con las últimas novedades del mundo del café.
                                Descubre nuevas fincas, récords de cata y mucho más.
                            </p>
                            <a href="#noticiasCafe" class="cafeboton">Ir a Noticias</a>
                        </div>
                    </div>
                </div>

            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#cafeCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#cafeCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    </section>

    <hr class="coffee-divider">

    {{-- Tipos de Café --}}
    <section id="tiposCafe" class="py-5">
        <h2 class="section-title text-center mb-4">Descubre las Principales Variedades</h2>
        <p class="section-subtitle text-center mb-5">Conoce las variedades con mayor impacto mundial: Sabor, Cuerpo y Cafeína.</p>

        <div class="row g-4 mt-4">
            
            {{-- Tarjeta: Café Arábica --}}
            <div class="col-md-4">
                <div class="card coffee-card h-100 shadow">
                    <img src="https://cafeyciencia.com/wp-content/uploads/2018/02/2018-02-01-4.png" class="card-img-top card-image" alt="Café Arabica">
                    <div class="card-body">
                        <h5 class="card-title text-coffee-accent">Café Arábica</h5>
                        <p class="card-text text-light-coffee small">
                            <strong class="text-coffee-accent">Sabor:</strong> Suave, dulce y aromático. Notas de frutas y flores.
                            <br><strong class="text-coffee-accent">Cafeína:</strong> Baja. (Aprox. 1.5%)
                            <br><strong class="text-coffee-accent">Calidad:</strong> Considerado el de mayor calidad mundial.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Tarjeta: Café Robusta --}}
            <div class="col-md-4">
                <div class="card coffee-card h-100 shadow">
                    <img src="https://perfectdailygrind.com/wp-content/uploads/2020/06/Fine-Robusta-Brazil-2.jpg" class="card-img-top card-image" alt="Café Robusta">
                    <div class="card-body">
                        <h5 class="card-title text-coffee-accent">Café Robusta</h5>
                        <p class="card-text text-light-coffee small">
                            <strong class="text-coffee-accent">Sabor:</strong> Fuerte, amargo y terroso. Mucho cuerpo.
                            <br><strong class="text-coffee-accent">Cafeína:</strong> Alta. (Aprox. 2.5% - 4.5%)
                            <br><strong class="text-coffee-accent">Uso:</strong> Ideal para mezclas de espresso y café instantáneo.
                        </p>
                    </div>
                </div>
            </div>
            
            {{-- Tarjeta: Café Liberica --}}
            <div class="col-md-4">
                <div class="card coffee-card h-100 shadow">
                    <img src="https://api.globy.com/public/market/66ba04c4104aa800965833bd/photos/66ba04c4104aa800965833c4/66ba04c4104aa800965833c4_lg.webp" class="card-img-top card-image" alt="Café Liberica">
                    <div class="card-body">
                        <h5 class="card-title text-coffee-accent">Café Liberica</h5>
                        <p class="card-text text-light-coffee small">
                            <strong class="text-coffee-accent">Sabor:</strong> Único, con notas ahumadas y frutales. Exótico.
                            <br><strong class="text-coffee-accent">Cafeína:</strong> Media-Baja.
                            <br><strong class="text-coffee-accent">Rareza:</strong> Opción poco común, pero muy apreciada por su perfil.
                        </p>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

    <hr class="coffee-divider">

    {{-- Proceso del Café --}}
    <section id="procesoCafe" class="py-5">
        <h2 class="section-title text-center mb-5">El Paso a Paso: Del Cerezo a la Taza</h2>

        <div class="row mt-4 align-items-center">

            <div class="col-md-6 order-md-2">
                <img src="https://cafearabo.com/wp-content/uploads/2021/04/blends-scaled.jpg"
                    class="img-fluid rounded shadow-lg process-image" alt="Proceso del café">
            </div>

            <div class="col-md-6 order-md-1">
                
                <div class="mb-5">
                    <h3 class="sub-section-title text-coffee-accent">Línea de Tiempo del Procesado</h3>
                    <ul class="timeline">
                        <li><span>Cultivo & Recolección</span>: La cereza madura es cosechada manualmente o con máquina.</li>
                        <li><span>Beneficio (Despulpado)</span>: Se retira la pulpa para exponer el grano.</li>
                        <li><span>Fermentación & Lavado</span>: Se desarrollan los precursores del aroma y sabor.</li>
                        <li><span>Secado</span>: Se reduce la humedad del grano al 10-12% para su conservación.</li>
                        <li><span>Trilla & Exportación</span>: Se retira la última capa (pergamino) y se empaca.</li>
                        <li><span>Tostado</span>: El paso que define el perfil final (claro, medio u oscuro).</li>
                    </ul>
                </div>

                <div class="mt-5">
                    <h3 class="sub-section-title text-coffee-accent">Video Resumen del Proceso</h3>
                    <div class="ratio ratio-16x9 rounded shadow-lg video-container">
                        <iframe src="https://www.youtube.com/embed/aQtn0_QSzfI?si" 
                                title="Video sobre Café" 
                                allowfullscreen></iframe>
                    </div>
                </div>

            </div>
        </div>

        <div class="row mt-5">
            <h3 class="text-coffee-accent text-center mb-4">Tipos de Procesos de Beneficio</h3>

            {{-- Procesos de Beneficio --}}
            <div class="col-md-4">
                <div class="card coffee-card h-100 shadow">
                    <img src="https://ineffablecoffee.com/cdn/shop/articles/blog-ineffable-coffee-proceso-natural-featured_31acac96-c706-44cf-a0a5-6d4bd77e8826.jpg?v=1759146546&width=2048" class="card-img-top card-image" alt="Proceso Natural">
                    <div class="card-body">
                        <h5 class="card-title text-coffee-accent">Natural</h5>
                        <p class="card-text text-light-coffee small">
                            El fruto se seca entero, con la cereza.
                            <br><strong class="text-coffee-accent">Perfil:</strong> Sabores muy **afrutados**, dulces y con mucho cuerpo.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card coffee-card h-100 shadow">
                    <img src="https://www.cafebritt.com/cdn/shop/articles/blog-honey-processed-coffee_bd5d2a8a-c490-4e49-94a9-95cc3abe69a2.webp?v=1752698091" class="card-img-top card-image" alt="Proceso Honey">
                    <div class="card-body">
                        <h5 class="card-title text-coffee-accent">Honey</h5>
                        <p class="card-text text-light-coffee small">
                            Parte del mucílago (pulpa pegajosa) queda en el grano para el secado.
                            <br><strong class="text-coffee-accent">Perfil:</strong> Balanceado, mayor **dulzor** y cuerpo que el lavado.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card coffee-card h-100 shadow">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS6asjCz-Kgp-WeyY4Uif7RCWzsKGo_cgbSbA&s" class="card-img-top card-image" alt="Proceso Lavado">
                    <div class="card-body">
                        <h5 class="card-title text-coffee-accent">Lavado +</h5>
                        <p class="card-text text-light-coffee small">
                            El mucílago se retira completamente antes de secar el grano.
                            <br><strong class="text-coffee-accent">Perfil:</strong> Sabor **limpio**, brillante y con mayor acidez.
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <hr class="coffee-divider">

    {{-- Métodos de Cosecha --}}
    <section id="metodosCosecha" class="py-5">
        <h2 class="section-title text-center mb-5">Impacto de la Cosecha en la Calidad</h2>

        <div class="row mt-4">

            {{-- Cosecha Selectiva --}}
            <div class="col-md-4 mb-4">
                <div class="card coffee-card h-100 shadow">
                    <img src="https://perfectdailygrind.com/es/wp-content/uploads/sites/2/2021/01/Recoleccion-Selectiva-1.jpg" class="card-img-top card-image" alt="Cosecha Selectiva">
                    <div class="card-body">
                        <h5 class="card-title text-coffee-accent">Cosecha Selectiva (Manual)</h5>
                        <p class="card-date text-muted fst-italic">Método Premium</p>
                        <p class="card-text text-light-coffee small">
                            Solo se recogen los **frutos maduros** a mano. Garantiza la más alta calidad y sabor.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Recolección por Barrido --}}
            <div class="col-md-4 mb-4">
                <div class="card coffee-card h-100 shadow">
                    <img src="https://www.eje21.com.co/site/wp-content/uploads/2020/07/recolector-de-cafe.-imagen-gobernacion-de-caldas..jpg" class="card-img-top card-image" alt="Recolección por Barrido">
                    <div class="card-body">
                        <h5 class="card-title text-coffee-accent">Recolección por Barrido</h5>
                        <p class="card-date text-muted fst-italic">Método Rápido</p>
                        <p class="card-text text-light-coffee small">
                            Se retiran todos los frutos (maduros, verdes y secos) a la vez. Es más rápido, pero de **menor calidad**.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Cosecha Mecánica --}}
            <div class="col-md-4 mb-4">
                <div class="card coffee-card h-100 shadow"> 
                    <img src="https://www.mundocafeto.com/wp-content/uploads/2018/06/1-Recolecci%C3%B3n-mec%C3%A1nica-de-caf%C3%A9-1.jpg" class="card-img-top card-image" alt="Cosecha Mecánica">
                    <div class="card-body">
                        <h5 class="card-title text-coffee-accent">Cosecha Mecánica</h5>
                        <p class="card-date text-muted fst-italic">Método Industrial</p>
                        <p class="card-text text-light-coffee small">
                            Uso de máquinas vibradoras en fincas planas y grandes. Muy eficiente, pero puede mezclar calidades.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <hr class="coffee-divider">
    
    {{-- Noticias --}}
    <section id="noticiasCafe" class="py-5">
        <h2 class="section-title text-center mb-5">Últimas Noticias del Mundo del Café</h2>
        <div class="row mt-4">
            @forelse($noticias as $noticia)
                <div class="col-md-4 mb-4">
                    <div class="card news-card h-100 shadow coffee-card">
                        <img src="{{ $noticia['urlToImage'] ?? 'https://via.placeholder.com/400x250/3e2723/efebe9?text=Sin+Imagen' }}" class="card-img-top card-image" alt="{{ $noticia['title'] }}">
                        <div class="card-body">
                            <h5 class="card-title text-coffee-accent">{{ $noticia['title'] }}</h5>
                            <p class="card-text text-light-coffee">{{ Str::limit($noticia['description'] ?? 'Haz clic para leer el artículo completo.', 120) }}</p>
                            <a href="{{ $noticia['url'] }}" target="_blank" class="btn btn-coffee-secondary btn-sm mt-2">Leer más</a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-muted">No se encontraron noticias en este momento.</p>
            @endforelse
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

@endsection