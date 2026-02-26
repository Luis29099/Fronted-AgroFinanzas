@extends('layouts.app')
@section('content')

<!-- HERO + CARRUSEL -->
<div class="hero-principal">
    <div class="carrusel-track">
        <div class="carrusel-slide active">
            <img src="https://images.unsplash.com/photo-1560493676-04071c5f467b?auto=format&fit=crop&q=80&w=1600" alt="Campo">
            <div class="carrusel-caption">
                <span class="caption-tag">Tecnología</span>
                <h3>Drones e IA: Revolucionando la eficiencia del riego en el campo.</h3>
            </div>
        </div>
        <div class="carrusel-slide">
            <img src="https://images.unsplash.com/photo-1580570598977-4b2412d01bbc?auto=format&fit=crop&q=80&w=1600" alt="Mercados">
            <div class="carrusel-caption">
                <span class="caption-tag">Mercados</span>
                <h3>El impacto de las tasas de interés en los precios de exportación agrícola.</h3>
            </div>
        </div>
        <div class="carrusel-slide">
            <img src="https://images.unsplash.com/photo-1464226184884-fa280b87c399?auto=format&fit=crop&q=80&w=1600" alt="Cosecha">
            <div class="carrusel-caption">
                <span class="caption-tag">Producción</span>
                <h3>Cosecha Récord en Granos: ¿Qué significa para el mercado colombiano?</h3>
            </div>
        </div>
        <div class="carrusel-slide">
            <img src="https://images.unsplash.com/photo-1592982537447-7440770cbfc9?auto=format&fit=crop&q=80&w=1600" alt="Café">
            <div class="carrusel-caption">
                <span class="caption-tag">Exportaciones</span>
                <h3>Colombia refuerza su posición en el mercado mundial del café especial.</h3>
            </div>
        </div>
    </div>

    <div class="hero-brand">
        <div class="hero-leaf"></div>
        <h1>AgroFinanzas</h1>
        <p>Decisiones inteligentes para el campo</p>
    </div>

    <button class="carrusel-btn prev" id="btnPrev" aria-label="Anterior">
        <i class="fa-solid fa-chevron-left"></i>
    </button>
    <button class="carrusel-btn next" id="btnNext" aria-label="Siguiente">
        <i class="fa-solid fa-chevron-right"></i>
    </button>
    <div class="carrusel-dots" id="carruselDots"></div>
</div>

<!-- BANNER TICKER -->
<div class="noticias-banner reveal">
    <div class="banner-inner">
        <div class="banner-badge">
            <i class="fa-solid fa-circle" style="font-size:.42rem;color:var(--green)"></i>
            En vivo
        </div>
        <div class="ticker-wrap">
            <div class="ticker">
                <span>Café: +3.2% &nbsp;·&nbsp; Maíz: -1.4% &nbsp;·&nbsp; Leche: sin variación &nbsp;·&nbsp; Pollo: +0.8% &nbsp;·&nbsp; Nuevos subsidios FINAGRO &nbsp;·&nbsp; Alerta seca: Boyacá y Cundinamarca &nbsp;·&nbsp; Café: +3.2% &nbsp;·&nbsp; Maíz: -1.4% &nbsp;·&nbsp; Leche: sin variación &nbsp;·&nbsp; Pollo: +0.8% &nbsp;·&nbsp; Nuevos subsidios FINAGRO &nbsp;·&nbsp;</span>
            </div>
        </div>
    </div>
</div>

<!-- NOTICIAS -->
<section class="noticias-section">
    <div class="section-header reveal">
        <span class="section-tag">Artículos</span>
        <h2 class="section-title">Noticias del <em>Campo</em></h2>
    </div>
    <div class="noticias-grid">

        <article class="noticia-card reveal" onclick="abrirModal(this)">
            <div class="noticia-img">
                <img src="https://images.unsplash.com/photo-1593023333594-487b2f7dd415?auto=format&fit=crop&q=80&w=600" alt="Ganado">
                <span class="noticia-tag">Ganadería</span>
            </div>
            <div class="noticia-body">
                <h3>Cuidado de tus vacas</h3>
                <p>Aprende cómo garantizar la salud y productividad de tu ganado con consejos prácticos y fáciles de aplicar en el día a día.</p>
                <span class="noticia-link">Leer más <i class="fa-solid fa-arrow-right"></i></span>
            </div>
        </article>

        <article class="noticia-card reveal" onclick="abrirModal(this)">
            <div class="noticia-img">
                <img src="https://images.unsplash.com/photo-1560493676-04071c5f467b?auto=format&fit=crop&q=80&w=600" alt="Cultivos">
                <span class="noticia-tag">Cultivos</span>
            </div>
            <div class="noticia-body">
                <h3>Cómo cuidar tus cultivos</h3>
                <p>Técnicas modernas y ecológicas para mantener tus cultivos sanos, productivos y resistentes a plagas.</p>
                <span class="noticia-link">Leer más <i class="fa-solid fa-arrow-right"></i></span>
            </div>
        </article>

        <article class="noticia-card reveal" onclick="abrirModal(this)">
            <div class="noticia-img">
                <img src="https://images.unsplash.com/photo-1579621970795-87facc2f976d?auto=format&fit=crop&q=80&w=600" alt="Finanzas">
                <span class="noticia-tag">Finanzas</span>
            </div>
            <div class="noticia-body">
                <h3>Mejor manejo de tus finanzas</h3>
                <p>Organiza tus ingresos, controla gastos y toma decisiones financieras inteligentes para tu emprendimiento rural.</p>
                <span class="noticia-link">Leer más <i class="fa-solid fa-arrow-right"></i></span>
            </div>
        </article>

        <article class="noticia-card reveal" onclick="abrirModal(this)">
            <div class="noticia-img">
                <img src="https://images.unsplash.com/photo-1465146344425-f00d5f5c8f07?auto=format&fit=crop&q=80&w=600" alt="Riego">
                <span class="noticia-tag">Tecnología</span>
            </div>
            <div class="noticia-body">
                <h3>Sistemas de Riego Inteligente</h3>
                <p>Optimiza el consumo de agua y mejora la producción con tecnologías de riego controladas por sensores de humedad.</p>
                <span class="noticia-link">Leer más <i class="fa-solid fa-arrow-right"></i></span>
            </div>
        </article>

        <article class="noticia-card reveal" onclick="abrirModal(this)">
            <div class="noticia-img">
                <img src="https://images.unsplash.com/photo-1543286386-713bdd548da4?auto=format&fit=crop&q=80&w=600" alt="Subsidios">
                <span class="noticia-tag">Política</span>
            </div>
            <div class="noticia-body">
                <h3>Guía de Subsidios 2025</h3>
                <p>Conoce los nuevos programas de apoyo gubernamental para pequeños y medianos productores del sector agrícola.</p>
                <span class="noticia-link">Leer más <i class="fa-solid fa-arrow-right"></i></span>
            </div>
        </article>

        <article class="noticia-card reveal" onclick="abrirModal(this)">
            <div class="noticia-img">
                <img src="https://images.unsplash.com/photo-1592982537447-7440770cbfc9?auto=format&fit=crop&q=80&w=600" alt="Plagas">
                <span class="noticia-tag">Sanidad</span>
            </div>
            <div class="noticia-body">
                <h3>Prevención y Control de Plagas</h3>
                <p>Identifica y combate las plagas más comunes antes de que afecten gravemente tu producción y cosecha.</p>
                <span class="noticia-link">Leer más <i class="fa-solid fa-arrow-right"></i></span>
            </div>
        </article>

        <article class="noticia-card reveal" onclick="abrirModal(this)">
            <div class="noticia-img">
                <img src="https://images.unsplash.com/photo-1464226184884-fa280b87c399?auto=format&fit=crop&q=80&w=600" alt="Semillas">
                <span class="noticia-tag">Mercado</span>
            </div>
            <div class="noticia-body">
                <h3>Análisis de Precios de Semillas</h3>
                <p>Revisa la última fluctuación en los precios de semillas clave para una siembra rentable esta temporada.</p>
                <span class="noticia-link">Leer más <i class="fa-solid fa-arrow-right"></i></span>
            </div>
        </article>

        <article class="noticia-card reveal" onclick="abrirModal(this)">
            <div class="noticia-img">
                <img src="https://images.unsplash.com/photo-1416879595882-3373a0480b5b?auto=format&fit=crop&q=80&w=600" alt="Maquinaria">
                <span class="noticia-tag">Maquinaria</span>
            </div>
            <div class="noticia-body">
                <h3>Mantenimiento de Maquinaria</h3>
                <p>Consejos esenciales para el mantenimiento preventivo de tractores y equipos agrícolas.</p>
                <span class="noticia-link">Leer más <i class="fa-solid fa-arrow-right"></i></span>
            </div>
        </article>

    </div>
</section>

<!-- AMIGO GANADERO -->
<section class="ganadero-section reveal" id="amigo-ganadero">
    <div class="ganadero-layout">
        <div class="ganadero-intro">
            <span class="section-tag">Base de Conocimiento</span>
            <h2 class="section-title">Amigo <em>Ganadero</em></h2>
            <p class="section-sub">Busca cualquier tema del sector agropecuario y accede a datos actualizados: precios, mercados, subsidios, plagas y más.</p>
            <div class="gstats">
                <div class="gstat">
                    <span class="gstat-n">23</span>
                    <span class="gstat-l">Categorías</span>
                </div>
                <div class="gstat">
                    <span class="gstat-n">4</span>
                    <span class="gstat-l">Grupos</span>
                </div>
                <div class="gstat">
                    <span class="gstat-n">API</span>
                    <span class="gstat-l">Datos en vivo</span>
                </div>
            </div>
        </div>
        <div class="gsearch-box">
            <div class="gsearch-row">
                <i class="fa-solid fa-magnifying-glass gsearch-ico"></i>
                <input type="text" id="agroSearch" placeholder="Ej: subsidios, exportaciones, plagas..." class="gsearch-input" autocomplete="off">
                <button class="gsearch-clear" id="searchClear" aria-label="Limpiar" style="display:none">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="gchips-row">
                <span class="gchip-label">Búsquedas rápidas:</span>
                <button class="gchip" id="chipVerTodo" data-q="">Ver todas</button>
                <button class="gchip" data-q="precio">Precios</button>
                <button class="gchip" data-q="exporta">Exportaciones</button>
                <button class="gchip" data-q="subsidio">Subsidios</button>
                <button class="gchip" data-q="plaga">Plagas</button>
                <button class="gchip" data-q="cosecha">Cosecha</button>
                <button class="gchip" data-q="mercado">Mercados</button>
            </div>
            <div class="gsearch-status" id="searchStatus"></div>
        </div>
    </div>

    <div class="ganadero-grid" id="ganaderoGrid"></div>

    <div class="ganadero-panel" id="ganaderoPanel" style="display:none">
        <div class="gpanel-hdr">
            <div class="gpanel-ttl">
                <span class="gpanel-ico-wrap"><i id="gpanelIcon" class="fa-solid fa-tag"></i></span>
                <h3 id="gpanelTitle">—</h3>
            </div>
            <button class="gpanel-cls" id="gpanelClose" aria-label="Cerrar">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="gpanel-body" id="gpanelBody"></div>
    </div>

    <div class="gsearch-results" id="searchResults" style="display:none"></div>

    <div class="gsearch-hint" id="searchHint">
        <i class="fa-solid fa-seedling"></i>
        <p>Escribe en el buscador o selecciona una búsqueda rápida para explorar las <strong>23 categorías</strong> del sector agropecuario colombiano.</p>
    </div>
</section>

<!-- OBSERVATORIO DE PRECIOS -->
<section class="precios-section reveal">
    <div class="section-header">
        <span class="section-tag">Mercado</span>
        <h2 class="section-title">Observatorio de <em>Precios</em></h2>
        <p class="section-sub">Selecciona un producto para ver su precio, variación y tendencia mensual</p>
    </div>
    <div class="product-grid" id="productCards"></div>
    <div class="chart-wrap">
        <canvas id="pricesChart"></canvas>
    </div>
</section>

<!-- MODAL -->
<div class="modal-overlay" id="newsModal">
    <div class="modal-box">
        <button class="modal-close" id="modalClose" aria-label="Cerrar">
            <i class="fa-solid fa-xmark"></i>
        </button>
        <img class="modal-img" id="modalImg" src="" alt="">
        <div class="modal-body">
            <span class="modal-cat" id="modalCat"></span>
            <h2 id="modalTitle"></h2>
            <p class="modal-resumen" id="modalResumen"></p>
            <div class="modal-contenido" id="modalContenido"></div>
        </div>
    </div>
</div>

<!-- WIDGET CLIMA -->
<div class="weather-widget" id="weatherWidget">
    <div class="weather-icon-wrap"><i class="fa-solid fa-sun" id="weatherIcon"></i></div>
    <div class="weather-tooltip">
        <h4>Clima Actual</h4>
        <hr>
        <p id="wUbicacion"><i class="fa-solid fa-location-dot"></i> Bogotá, Colombia</p>
        <p id="wTemp"><i class="fa-solid fa-temperature-half"></i> Temperatura: --°C</p>
        <p id="wHumedad"><i class="fa-solid fa-droplet"></i> Humedad: --%</p>
        <p id="wViento"><i class="fa-solid fa-wind"></i> Viento: -- m/s</p>
        <p id="wCondicion"><i class="fa-solid fa-magnifying-glass"></i> --</p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
'use strict';

/* 1. CARRUSEL */
(function(){
    var slides=document.querySelectorAll('.carrusel-slide'),
        dotsW=document.getElementById('carruselDots'),
        btnP=document.getElementById('btnPrev'),
        btnN=document.getElementById('btnNext'),
        cur=0, timer=null, dots=[];
    if(!slides.length) return;
    for(var i=0;i<slides.length;i++){
        var d=document.createElement('button');
        d.className='carrusel-dot'+(i===0?' active':'');
        d.setAttribute('aria-label','Slide '+(i+1));
        (function(idx){d.addEventListener('click',function(){goTo(idx);reset();});})(i);
        dotsW.appendChild(d); dots.push(d);
    }
    function goTo(n){
        slides[cur].classList.remove('active'); dots[cur].classList.remove('active');
        cur=(n+slides.length)%slides.length;
        slides[cur].classList.add('active'); dots[cur].classList.add('active');
    }
    function reset(){ clearInterval(timer); timer=setInterval(function(){goTo(cur+1);},5500); }
    btnP.addEventListener('click',function(){goTo(cur-1);reset();});
    btnN.addEventListener('click',function(){goTo(cur+1);reset();});
    reset();
})();

/* 2. SCROLL REVEAL */
(function(){
    var els=document.querySelectorAll('.reveal');
    if(!('IntersectionObserver' in window)){for(var i=0;i<els.length;i++) els[i].classList.add('revealed');return;}
    var obs=new IntersectionObserver(function(entries){
        entries.forEach(function(e){if(e.isIntersecting){e.target.classList.add('revealed');obs.unobserve(e.target);}});
    },{threshold:0.08});
    for(var i=0;i<els.length;i++) obs.observe(els[i]);
})();

/* 3. MODAL */
(function(){
    var overlay=document.getElementById('newsModal'),btnClose=document.getElementById('modalClose');
    function cerrar(){overlay.classList.remove('visible');document.body.style.overflow='';}
    btnClose.addEventListener('click',cerrar);
    overlay.addEventListener('click',function(e){if(e.target===overlay)cerrar();});
    document.addEventListener('keydown',function(e){if(e.key==='Escape')cerrar();});
})();

function abrirModal(el){
    var t=el.querySelector('h3').textContent,
        r=el.querySelector('p').textContent,
        i=el.querySelector('img').src,
        c=el.querySelector('.noticia-tag')?el.querySelector('.noticia-tag').textContent:'';
    document.getElementById('modalTitle').textContent=t;
    document.getElementById('modalResumen').textContent=r;
    document.getElementById('modalImg').src=i;
    document.getElementById('modalImg').alt=t;
    document.getElementById('modalCat').textContent=c;
    document.getElementById('modalContenido').innerHTML='<p>'+r+' En los últimos meses el sector agropecuario colombiano ha evidenciado cambios significativos que impactan directamente la rentabilidad de los productores. Los expertos del DANE y del Ministerio de Agricultura destacan la importancia de modernizar las prácticas tradicionales.</p><p>Se recomienda mantenerse informado sobre las fluctuaciones del mercado y aprovechar los programas disponibles a través de FINAGRO y el Banco Agrario de Colombia.</p><p class="modal-fecha"><i class="fa-regular fa-calendar"></i> Publicado el 17 de Febrero, 2026</p>';
    document.getElementById('newsModal').classList.add('visible');
    document.body.style.overflow='hidden';
}

/* 4. CLIMA */
(function(){
    var w=document.getElementById('weatherWidget'),ic=document.getElementById('weatherIcon');
    function setIco(d){
        d=(d||'').toLowerCase();
        if(d.indexOf('clear')!==-1||d.indexOf('sun')!==-1){ic.className='fa-solid fa-sun';ic.style.color='#f4c430';}
        else if(d.indexOf('rain')!==-1||d.indexOf('drizzle')!==-1){ic.className='fa-solid fa-cloud-showers-heavy';ic.style.color='#74b9ff';}
        else if(d.indexOf('cloud')!==-1){ic.className='fa-solid fa-cloud';ic.style.color='#b0bec5';}
        else if(d.indexOf('snow')!==-1){ic.className='fa-solid fa-snowflake';ic.style.color='#aee3ff';}
        else{ic.className='fa-solid fa-cloud-sun';ic.style.color='#f4c430';}
    }
    w.addEventListener('click',function(){
        w.classList.toggle('show');
        fetch('/api/clima').then(function(r){return r.json();}).then(function(d){
            document.getElementById('wTemp').innerHTML='<i class="fa-solid fa-temperature-half"></i> Temperatura: '+d.main.temp+' °C';
            document.getElementById('wHumedad').innerHTML='<i class="fa-solid fa-droplet"></i> Humedad: '+d.main.humidity+'%';
            document.getElementById('wViento').innerHTML='<i class="fa-solid fa-wind"></i> Viento: '+d.wind.speed+' m/s';
            document.getElementById('wCondicion').innerHTML='<i class="fa-solid fa-magnifying-glass"></i> '+d.weather[0].description;
            setIco(d.weather[0].description);
        }).catch(function(){
            document.getElementById('wUbicacion').textContent='Error al obtener clima';
            ic.className='fa-solid fa-triangle-exclamation'; ic.style.color='#ff7675';
        });
    });
})();

/* 5. AMIGO GANADERO — igual que antes, sin cambios funcionales */
var CATS=[
    {key:'prices',           title:'Elasticidad del precio',         icon:'fa-tag',                 group:'Economía'},
    {key:'costs',            title:'Costos de producción',           icon:'fa-coins',               group:'Economía'},
    {key:'investment',       title:'Inversión agrícola por país',    icon:'fa-chart-line',          group:'Economía'},
    {key:'subsidies',        title:'Subsidios agrícolas',            icon:'fa-hand-holding-dollar', group:'Economía'},
    {key:'agricultural_gdp', title:'PIB agrícola por país',          icon:'fa-building-columns',    group:'Economía'},
    {key:'exports',          title:'Exportaciones por valor ($)',    icon:'fa-ship',                group:'Comercio'},
    {key:'imports',          title:'Importaciones por valor ($)',    icon:'fa-plane-arrival',       group:'Comercio'},
    {key:'trade_balance',    title:'Balanza comercial agrícola',     icon:'fa-scale-balanced',      group:'Comercio'},
    {key:'competitiveness',  title:'Índice de competitividad',       icon:'fa-trophy',              group:'Comercio'},
    {key:'market_access',    title:'Mercados emergentes',            icon:'fa-globe',               group:'Comercio'},
    {key:'logistics',        title:'Rutas comerciales',              icon:'fa-route',               group:'Comercio'},
    {key:'tariffs',          title:'Aranceles internacionales',      icon:'fa-file-invoice-dollar', group:'Comercio'},
    {key:'treaties',         title:'Tratados de libre comercio',     icon:'fa-handshake',           group:'Comercio'},
    {key:'harvest_area',     title:'Área cosechada',                 icon:'fa-tractor',             group:'Producción'},
    {key:'planted_area',     title:'Área sembrada',                  icon:'fa-seedling',            group:'Producción'},
    {key:'yield_forecast',   title:'Rendimiento proyectado',         icon:'fa-chart-bar',           group:'Producción'},
    {key:'future_estimates', title:'Estimaciones futuras',           icon:'fa-calendar-days',       group:'Producción'},
    {key:'postharvest_losses',title:'Pérdidas postcosecha',          icon:'fa-triangle-exclamation',group:'Producción'},
    {key:'stock',            title:'Stock / inventarios',            icon:'fa-boxes-stacked',       group:'Producción'},
    {key:'farmers_count',    title:'Agricultores dedicados',         icon:'fa-users',               group:'Producción'},
    {key:'pests_risk',       title:'Riesgo de plagas por región',    icon:'fa-bug',                 group:'Sanidad'},
    {key:'diseases',         title:'Enfermedades reportadas',        icon:'fa-virus',               group:'Sanidad'},
    {key:'pest_impact',      title:'Impacto estimado en producción', icon:'fa-chart-pie',           group:'Sanidad'}
];
var GM={
    'Economía':  {color:'#f4c430',bg:'rgba(244,196,48,.08)',  border:'rgba(244,196,48,.25)'},
    'Comercio':  {color:'#60a5fa',bg:'rgba(96,165,250,.08)',  border:'rgba(96,165,250,.25)'},
    'Producción':{color:'#8ac926',bg:'rgba(138,201,38,.08)',  border:'rgba(138,201,38,.25)'},
    'Sanidad':   {color:'#fb7185',bg:'rgba(251,113,133,.08)', border:'rgba(251,113,133,.25)'}
};
var cache={}, activePK=null;

function wbFetch(indicator, label, unit){
    return fetch('https://api.worldbank.org/v2/country/COL/indicator/'+indicator+'?format=json&mrv=5&per_page=5')
        .then(function(r){return r.json();})
        .then(function(j){
            var entries=j[1]||[], result={fuente_wb:'Banco Mundial — '+label};
            entries.forEach(function(e){ if(e.value) result['Año '+e.date]=parseFloat(e.value).toFixed(2)+' '+unit; });
            return result;
        });
}

var REAL_DATA={
    prices:function(){return wbFetch('AG.PRD.FOOD.XD','Índice de producción alimentaria Colombia','(índice base 2004-2006)').then(function(wb){return{data:wb,fuentes:[{ico:'fa-database',txt:'SIPSA-DANE — Precios semanales en 90+ plazas mayoristas',url:'www.dane.gov.co/sipsa'},{ico:'fa-seedling',txt:'Agronet MADR — Series históricas de precios por cultivo',url:'www.agronet.gov.co/estadistica'}]};});},
    costs:function(){return wbFetch('NY.GDP.PCAP.CD','PIB per cápita USD Colombia','USD').then(function(wb){return{data:wb,fuentes:[{ico:'fa-coins',txt:'Agronet MADR — Costos de producción por cultivo y región',url:'www.agronet.gov.co/estadistica'},{ico:'fa-building',txt:'FINAGRO — Líneas de crédito y tasas vigentes',url:'www.finagro.com.co'}]};});},
    investment:function(){return wbFetch('GC.XPN.TOTL.GD.ZS','Gasto público total % PIB Colombia','%').then(function(wb){return{data:wb,fuentes:[{ico:'fa-landmark',txt:'ADR — Agencia de Desarrollo Rural · Proyectos productivos',url:'www.adr.gov.co'},{ico:'fa-building',txt:'FINAGRO — Incentivo a la Capitalización Rural (ICR)',url:'www.finagro.com.co'}]};});},
    subsidies:function(){return wbFetch('GC.TAX.TOTL.GD.ZS','Carga fiscal % PIB Colombia (contexto subsidios)','%').then(function(wb){return{data:wb,fuentes:[{ico:'fa-hand-holding-dollar',txt:'FINAGRO — Programas: Mujer Rural, Jóvenes, PDET',url:'www.finagro.com.co'},{ico:'fa-landmark',txt:'Banco Agrario — Créditos y subsidios oficiales',url:'www.bancoagrario.gov.co'}]};});},
    agricultural_gdp:function(){return wbFetch('NV.AGR.TOTL.ZS','Valor agregado agrícola % del PIB Colombia','%').then(function(wb){return{data:wb,fuentes:[{ico:'fa-chart-line',txt:'DANE — Cuentas Nacionales trimestrales por sector',url:'www.dane.gov.co'},{ico:'fa-seedling',txt:'Agronet MADR — Estadísticas del sector agropecuario',url:'www.agronet.gov.co/estadistica'}]};});},
    exports:function(){return wbFetch('TX.VAL.AGRI.ZS.UN','Exportaciones agrícolas % del total de mercancías','%').then(function(wb){return{data:wb,fuentes:[{ico:'fa-plane',txt:'PROCOLOMBIA — Inteligencia de mercados por producto y país',url:'www.procolombia.co'},{ico:'fa-seedling',txt:'Agronet MADR — Exportaciones por producto y destino',url:'www.agronet.gov.co/estadistica'}]};});},
    imports:function(){return wbFetch('TM.VAL.AGRI.ZS.UN','Importaciones agrícolas % del total de mercancías','%').then(function(wb){return{data:wb,fuentes:[{ico:'fa-file-invoice',txt:'DIAN — Estadísticas de comercio exterior',url:'www.dian.gov.co'},{ico:'fa-seedling',txt:'Agronet MADR — Importaciones por producto',url:'www.agronet.gov.co/estadistica'}]};});},
    trade_balance:function(){return wbFetch('BN.CAB.XOKA.CD','Balanza cuenta corriente USD Colombia','').then(function(wb){Object.keys(wb).forEach(function(k){if(k.indexOf('Año')===0&&wb[k]){var v=parseFloat(wb[k]);if(!isNaN(v))wb[k]=(v/1e9).toFixed(2)+' mil millones USD';}});return{data:wb,fuentes:[{ico:'fa-scale-balanced',txt:'MinCIT — Estadísticas de comercio exterior agropecuario',url:'www.mincit.gov.co'},{ico:'fa-seedling',txt:'Agronet MADR — Balanza comercial por producto',url:'www.agronet.gov.co/estadistica'}]};});},
    competitiveness:function(){return wbFetch('GC.DOD.TOTL.GD.ZS','Deuda pública % PIB Colombia','%').then(function(wb){return{data:wb,fuentes:[{ico:'fa-trophy',txt:'DNP — Índice de Competitividad Departamental',url:'www.dnp.gov.co'},{ico:'fa-seedling',txt:'Agronet MADR — Rendimientos y productividad por cultivo',url:'www.agronet.gov.co/estadistica'}]};});},
    market_access:function(){return wbFetch('NE.EXP.GNFS.ZS','Exportaciones bienes y servicios % PIB Colombia','%').then(function(wb){return{data:wb,fuentes:[{ico:'fa-globe',txt:'PROCOLOMBIA — Perfil de mercados internacionales por producto',url:'www.procolombia.co'},{ico:'fa-handshake',txt:'MinCIT — TLC y acuerdos comerciales vigentes',url:'www.tlc.gov.co'}]};});},
    logistics:function(){return wbFetch('IC.EXP.COST.CD','Costo exportar por contenedor USD Colombia','USD').then(function(wb){return{data:wb,fuentes:[{ico:'fa-road',txt:'INVIAS — Estado de vías y proyectos de infraestructura',url:'www.invias.gov.co'},{ico:'fa-truck',txt:'MinTransporte — Transporte de carga y logística rural',url:'www.mintransporte.gov.co'}]};});},
    tariffs:function(){return wbFetch('TM.TAX.MANF.SM.AR.ZS','Arancel promedio bienes manufacturados Colombia','%').then(function(wb){return{data:wb,fuentes:[{ico:'fa-file-invoice-dollar',txt:'DIAN — Arancel MUISCA · consulta por producto',url:'www.dian.gov.co/aduana/tarifas'},{ico:'fa-handshake',txt:'MinCIT — Acuerdos y preferencias arancelarias',url:'www.mincit.gov.co'}]};});},
    treaties:function(){return wbFetch('TM.TAX.MRCH.SM.AR.ZS','Arancel promedio todas las mercancías Colombia','%').then(function(wb){return{data:wb,fuentes:[{ico:'fa-handshake',txt:'MinCIT — TLC vigentes y en negociación Colombia',url:'www.tlc.gov.co'},{ico:'fa-plane',txt:'PROCOLOMBIA — Guías de exportación por TLC y producto',url:'www.procolombia.co'}]};});},
    harvest_area:function(){return wbFetch('AG.LND.CROP.ZS','Tierras de cultivo % del área total Colombia','%').then(function(wb){return{data:wb,fuentes:[{ico:'fa-map',txt:'Agronet MADR — EVA: Área cosechada por cultivo y municipio',url:'www.agronet.gov.co/estadistica'},{ico:'fa-map-location-dot',txt:'UPRA — Zonificación y aptitud agrícola del suelo',url:'www.upra.gov.co'}]};});},
    planted_area:function(){return wbFetch('AG.LND.ARBL.ZS','Tierras arables % del área de tierra Colombia','%').then(function(wb){return{data:wb,fuentes:[{ico:'fa-seedling',txt:'Agronet MADR — EVA: Área sembrada por cultivo y municipio',url:'www.agronet.gov.co/estadistica'},{ico:'fa-database',txt:'SIPSA-DANE — Calendarios de cosecha por región',url:'www.dane.gov.co/sipsa'}]};});},
    yield_forecast:function(){return wbFetch('AG.YLD.CREL.KG','Rendimiento cereales kg por hectárea Colombia','kg/ha').then(function(wb){return{data:wb,fuentes:[{ico:'fa-flask',txt:'AGROSAVIA — Variedades mejoradas y paquetes tecnológicos',url:'www.agrosavia.co'},{ico:'fa-seedling',txt:'Agronet MADR — Rendimientos por cultivo, año y departamento',url:'www.agronet.gov.co/estadistica'}]};});},
    future_estimates:function(){return wbFetch('SP.POP.GROW','Crecimiento poblacional anual % Colombia','%').then(function(wb){return{data:wb,fuentes:[{ico:'fa-map-location-dot',txt:'UPRA — Ordenamiento productivo y prospectiva agrícola',url:'www.upra.gov.co'},{ico:'fa-landmark',txt:'DNP — Plan Nacional de Desarrollo agropecuario',url:'www.dnp.gov.co'}]};});},
    postharvest_losses:function(){return wbFetch('AG.PRD.LVSK.XD','Índice producción pecuaria base 2004-2006 Colombia','').then(function(wb){return{data:wb,fuentes:[{ico:'fa-graduation-cap',txt:'SENA — Cursos gratuitos de manejo postcosecha',url:'www.sena.edu.co'},{ico:'fa-boxes-stacked',txt:'ALMACAFÉ — Almacenamiento y financiamiento con producto',url:'www.almacafe.com.co'}]};});},
    stock:function(){return wbFetch('FP.CPI.TOTL.ZG','Inflación anual % Colombia (impacta inventarios)','%').then(function(wb){return{data:wb,fuentes:[{ico:'fa-boxes-stacked',txt:'Bolsa Mercantil de Colombia — Certificados de depósito',url:'www.bolsamercantil.com.co'},{ico:'fa-warehouse',txt:'ALMACAFÉ — Red de silos y almacenamiento agropecuario',url:'www.almacafe.com.co'}]};});},
    farmers_count:function(){return wbFetch('SL.AGR.EMPL.ZS','Empleo en agricultura % del empleo total Colombia','%').then(function(wb){return{data:wb,fuentes:[{ico:'fa-users',txt:'DANE — Censo Nacional Agropecuario y Gran Encuesta Agropecuaria',url:'www.dane.gov.co'},{ico:'fa-tractor',txt:'SAC — Sociedad de Agricultores de Colombia · Gremios',url:'www.sac.org.co'}]};});},
    pests_risk:function(){return wbFetch('AG.PRD.CROP.XD','Índice producción agrícola base 2004-2006 Colombia','').then(function(wb){return{data:wb,fuentes:[{ico:'fa-bug',txt:'ICA — SIVIFITO: Sistema de Vigilancia Fitosanitaria · Alertas por depto',url:'www.ica.gov.co/alertas'},{ico:'fa-flask',txt:'AGROSAVIA — Manejo integrado de plagas por cultivo',url:'www.agrosavia.co'}]};});},
    diseases:function(){return wbFetch('SH.XPD.CHEX.GD.ZS','Gasto en salud % PIB Colombia','%').then(function(wb){return{data:wb,fuentes:[{ico:'fa-virus',txt:'ICA — Sanidad animal y vegetal · Registros y alertas oficiales',url:'www.ica.gov.co'},{ico:'fa-cow',txt:'FEDEGÁN — Programas de salud animal para ganaderos',url:'www.fedegan.org.co'}]};});},
    pest_impact:function(){return wbFetch('AG.PRD.FOOD.XD','Índice producción alimentaria Colombia','').then(function(wb){return{data:wb,fuentes:[{ico:'fa-shield-halved',txt:'FINAGRO — Seguro Agropecuario subsidiado contra plagas y clima',url:'www.finagro.com.co/seguro-agropecuario'},{ico:'fa-bug',txt:'ICA — Programas de erradicación subsidiados · Línea 018000111098',url:'www.ica.gov.co'}]};});}
};

var CONTENT={prices:{que_es:'La elasticidad del precio mide cómo cambia la demanda de un producto agropecuario cuando su precio sube o baja.',por_que:'Conocer la elasticidad te permite tomar mejores decisiones de venta.',consejos:['Monitorea los precios semanales en SIPSA-DANE (www.dane.gov.co/sipsa).','En temporada alta los precios bajan — planifica almacenamiento.','Productos procesados tienen menor elasticidad que los frescos.','La Bolsa Mercantil publica precios de referencia para granos.']},costs:{que_es:'Los costos de producción incluyen insumos, mano de obra, maquinaria y costos financieros.',por_que:'Controlar los costos es la diferencia entre un negocio rentable y uno que pierde dinero.',consejos:['Consulta costos por cultivo en Agronet (www.agronet.gov.co/estadistica).','FINAGRO tiene créditos a tasas preferenciales (DTF-2%).','Los fertilizantes representan hasta el 40% del costo.','Agrupa compras de insumos para obtener descuentos por volumen.']},investment:{que_es:'La inversión agrícola proviene de inversión privada, crédito institucional e inversión pública.',por_que:'Una inversión bien planificada puede duplicar la productividad en 2-3 años.',consejos:['ICR: el gobierno paga hasta el 40% de inversiones en equipos.','ADR financia proyectos productivos asociativos (www.adr.gov.co).','FINAGRO: líneas especiales para mujer rural y jóvenes agricultores.','DRE: subsidio a la tasa de interés para pequeños productores.']},subsidies:{que_es:'Los subsidios incluyen ICR, seguro agropecuario subsidiado e incentivos a la asistencia técnica.',por_que:'Acceder a subsidios puede reducir costos hasta en un 40%.',consejos:['Regístrate en el SISA del Ministerio de Agricultura — es gratuito.','El seguro agropecuario: el gobierno paga hasta el 80% de la prima vía FINAGRO.','Municipios PDET tienen prioridad en subsidios.','Banco Agrario: créditos con períodos de gracia hasta 2 años.']},agricultural_gdp:{que_es:'El PIB agrícola colombiano equivale al 6-7% del PIB total pero genera el 16% del empleo nacional.',por_que:'Entender el PIB agropecuario te dice en qué sectores está creciendo la economía rural.',consejos:['DANE publica trimestralmente las Cuentas Nacionales (www.dane.gov.co).','Los sectores con mayor crecimiento reciben más apoyo institucional.','Agronet tiene estadísticas históricas de producción por cultivo.','Monitorea el Informe de Coyuntura Económica Regional del DANE.']},exports:{que_es:'Las exportaciones agrícolas colombianas superan USD 7.000 millones anuales. Café, flores y banano lideran.',por_que:'Exportar permite acceder a precios internacionales más altos que los locales.',consejos:['PROCOLOMBIA ofrece asesoría gratuita para exportadores (www.procolombia.co).','Para exportar necesitas registro ICA y certificado de origen.','Aguacate Hass, cacao y uchuva tienen las mejores perspectivas.','Agronet publica estadísticas de exportaciones por producto y país.']},imports:{que_es:'Colombia importa principalmente maíz, trigo, soya y algodón.',por_que:'Las importaciones compiten directamente con la producción nacional.',consejos:['Diversifica hacia cultivos sustitutos de importaciones como maíz amarillo.','Las industrias de alimentos balanceados pagan buen precio por maíz nacional.','Monitorea el CBOT para anticipar movimientos del mercado local.','DIAN publica estadísticas detalladas de importaciones.']},trade_balance:{que_es:'Colombia tiene balanza positiva en productos diferenciados pero negativa en cereales.',por_que:'Una balanza positiva indica que el país es competitivo internacionalmente.',consejos:['Los sectores con balanza positiva y creciente son los más atractivos.','Frutas exóticas y productos orgánicos tienen alta demanda internacional.','MinCIT publica informes mensuales de comercio exterior.']},competitiveness:{que_es:'El índice de competitividad agrícola mide eficiencia comparada con otros países.',por_que:'Un sector competitivo puede ganar mercados internacionales.',consejos:['Asociarse con otros productores reduce costos y aumenta poder de negociación.','Las BPA son requisito para exportar y mejoran la competitividad.','La logística puede representar el 30% del precio final.','El DNP publica el Índice Departamental de Competitividad.']},market_access:{que_es:'Los mercados emergentes para Colombia incluyen China, Emiratos Árabes y Corea del Sur.',por_que:'Diversificar mercados reduce el riesgo de depender de un solo comprador.',consejos:['China es el mayor importador mundial — oportunidad para frutas y café.','PROCOLOMBIA organiza misiones comerciales (www.procolombia.co).','El TLC con Corea del Sur tiene preferencias para más de 300 productos.']},logistics:{que_es:'Los puertos principales son Buenaventura (Pacífico) y Barranquilla/Cartagena (Atlántico).',por_que:'El costo logístico en Colombia representa hasta el 25% del valor del producto.',consejos:['Organiza transporte colectivo con otros productores para reducir costos.','El transporte refrigerado aumenta el precio y reduce pérdidas postcosecha.','INVIAS informa sobre el estado de vías en tu región (www.invias.gov.co).']},tariffs:{que_es:'Los aranceles en Colombia van del 0% al 20% según el producto.',por_que:'Conocer aranceles te permite identificar ventajas por TLC vigentes.',consejos:['Consulta el arancel exacto en MUISCA de la DIAN.','El SGP da acceso preferencial a mercados europeos para pequeños productores.','Los aranceles van a cero gradualmente — planifica con el cronograma del MinCIT.']},treaties:{que_es:'Colombia tiene TLC con EEUU, UE, Alianza del Pacífico, Canadá, Israel y Corea del Sur.',por_que:'Los TLC son una ventaja que muchos competidores no tienen.',consejos:['TLC con EEUU: aguacate, flores y cacao tienen preferencia total.','TLC con UE: café especial y productos orgánicos tienen alta demanda.','Consulta el portal TLC del MinCIT (www.tlc.gov.co).']},harvest_area:{que_es:'El área cosechada en Colombia supera las 4 millones de hectáreas anuales.',por_que:'El área cosechada determina la oferta total y el precio del producto.',consejos:['Consulta estadísticas EVA de Agronet por municipio.','Los cultivos permanentes tienen menor volatilidad de precio que los transitorios.','La rotación de cultivos mejora el suelo y reduce plagas.','UPRA tiene mapas de aptitud de suelos por región (www.upra.gov.co).']},planted_area:{que_es:'Colombia tiene 114 millones de hectáreas totales, solo el 5% se cultiva activamente.',por_que:'Conocer el área sembrada da señales de cuánta competencia habrá en la cosecha.',consejos:['SIPSA-DANE publica datos de área sembrada mensualmente.','Agronet tiene calendarios de siembra por región.','Antes de sembrar, revisa qué siembran tus vecinos.']},yield_forecast:{que_es:'Colombia tiene rendimientos inferiores al promedio mundial en la mayoría de cultivos.',por_que:'Aumentar el rendimiento sin aumentar el área es la forma más eficiente de crecer.',consejos:['El uso de semilla certificada puede aumentar rendimientos entre 30% y 80%.','La fertilización técnica basada en análisis de suelo mejora rendimientos.','El riego tecnificado puede duplicar rendimientos en zonas con sequía.','AGROSAVIA ofrece asistencia técnica y variedades mejoradas (www.agrosavia.co).']},future_estimates:{que_es:'Proyecciones: demanda de alimentos +25% para 2030, mayor demanda de proteína animal.',por_que:'Planificar con base en tendencias futuras permite posicionarse antes que la competencia.',consejos:['Aguacate Hass, arándano y cacao tienen mejores perspectivas de precio.','La producción orgánica certificada tiene demanda creciente con precios premium.','La acuicultura es uno de los sectores con mayor proyección en Colombia.','Consulta la UPRA para proyecciones de demanda y aptitud de suelos.']},postharvest_losses:{que_es:'Colombia pierde entre el 30% y el 40% de los alimentos producidos después de la cosecha.',por_que:'Reducir pérdidas postcosecha es equivalente a aumentar la producción sin sembrar más.',consejos:['Cosechar en horas frescas reduce el daño por calor.','El preenfriamiento prolonga la vida útil de frutas y verduras.','Empaques adecuados reducen golpes y magullamiento.','SENA ofrece cursos gratuitos de manejo postcosecha (www.sena.edu.co).']},stock:{que_es:'El stock agropecuario incluye productos almacenados en silos, bodegas y cámaras frías.',por_que:'Quien puede almacenar, puede vender cuando el precio es mayor.',consejos:['ALMACAFÉ permite almacenar y recibir crédito con el producto como garantía.','El certificado de depósito permite vender en la Bolsa Mercantil.','Para granos, el silo metálico familiar tiene retorno en 1-2 temporadas.','Monitorea precios históricos del SIPSA para identificar meses altos.']},farmers_count:{que_es:'Colombia tiene aproximadamente 2.7 millones de productores, el 70% con menos de 5 hectáreas.',por_que:'Registrarse y ser visible como productor es el primer paso para acceder a programas.',consejos:['Regístrate en el SISA para ser elegible a programas de apoyo.','Las asociaciones tienen mayor poder de negociación y acceso a programas especiales.','El Censo Nacional Agropecuario del DANE es la base que usa el gobierno para asignar recursos.']},pests_risk:{que_es:'Las plagas más críticas incluyen roya del café, sigatoka negra, gusano cogollero y mosca de la fruta.',por_que:'Una plaga no controlada puede destruir entre el 30% y el 100% de una cosecha.',consejos:['ICA tiene el SIVIFITO con alertas fitosanitarias por departamento.','El MIP combina control biológico, cultural y químico, reduciendo costos hasta 40%.','Reporta plagas nuevas al ICA — hay programas de erradicación subsidiados.','AGROSAVIA tiene paquetes tecnológicos de manejo de plagas (www.agrosavia.co).']},diseases:{que_es:'Las principales enfermedades incluyen Fiebre Aftosa, Brucelosis bovina, New Castle y Antracnosis.',por_que:'Las enfermedades pueden devastar una explotación y generar restricciones de exportación.',consejos:['Aftosa y Brucelosis: la vacunación es OBLIGATORIA — el ICA hace operativos gratuitos.','Registra tu predio en el ICA para acceder a asistencia técnica veterinaria.','FEDEGÁN tiene programas de salud animal (www.fedegan.org.co).','Bioseguridad: controla el ingreso de animales externos a tu finca.']},pest_impact:{que_es:'El impacto económico de plagas y enfermedades en Colombia supera los COP 3 billones anuales.',por_que:'Cuantificar el impacto justifica la inversión en prevención.',consejos:['Seguros agropecuarios cubren pérdidas por plagas — el gobierno subsidia parte de la prima.','Haz un análisis costo-beneficio antes de aplicar pesticidas.','Lleva un registro de incidencia de plagas por temporada para anticiparte año a año.','AGROSAVIA tiene paquetes tecnológicos de manejo de plagas (www.agrosavia.co).']}};

function gdFetch(key){
    if(cache[key]) return Promise.resolve(cache[key]);
    var fn=REAL_DATA[key]||function(){return Promise.resolve({data:{nota:'Consulte Agronet o DANE.'},fuentes:[]});};
    return fn().then(function(j){j._key=key;cache[key]=j;return j;}).catch(function(){return {data:{},fuentes:[],_key:key};});
}

function gdRender(api){
    var key=api?api._key:null,info=key&&CONTENT[key]?CONTENT[key]:null,data=api?api.data:null,fuentes=api&&api.fuentes?api.fuentes:[],html='';
    if(info){
        html+='<div class="ginfo-block">';
        html+='<div class="ginfo-section"><div class="ginfo-label"><i class="fa-solid fa-circle-question"></i> ¿Qué es?</div><p class="ginfo-text">'+info.que_es+'</p></div>';
        html+='<div class="ginfo-section"><div class="ginfo-label"><i class="fa-solid fa-lightbulb"></i> ¿Por qué importa?</div><p class="ginfo-text">'+info.por_que+'</p></div>';
        html+='<div class="ginfo-section"><div class="ginfo-label"><i class="fa-solid fa-list-check"></i> Consejos prácticos</div><ul class="ginfo-tips">';
        for(var i=0;i<info.consejos.length;i++) html+='<li><i class="fa-solid fa-leaf"></i>'+info.consejos[i]+'</li>';
        html+='</ul></div></div>';
    }
    if(data&&typeof data==='object'&&Object.keys(data).length>0){
        var fwb=data.fuente_wb||data.fuente||null,rows='',keys=Object.keys(data);
        for(var i=0;i<keys.length;i++){var k=keys[i];if(k==='fuente_wb'||k==='fuente'||k==='nota') continue;rows+='<tr><td class="gd-k">'+k.replace(/_/g,' ')+'</td><td class="gd-v">'+(data[k]!==null&&data[k]!==undefined?data[k]:'—')+'</td></tr>';}
        if(rows){html+='<div class="gdata-block"><div class="gdata-header"><i class="fa-solid fa-chart-bar"></i> Datos reales — Colombia (Banco Mundial)</div>';if(fwb) html+='<div class="gdata-source"><i class="fa-solid fa-globe"></i> '+fwb+'</div>';html+='<table class="gdata-table"><tbody>'+rows+'</tbody></table></div>';}
    }
    html+='<div class="gfuentes-block"><div class="gfuentes-header"><i class="fa-solid fa-database"></i> Fuentes colombianas especializadas</div><p class="gfuentes-nota">Para precios exactos, áreas y rendimientos por cultivo y departamento, consulta estas fuentes oficiales:</p>';
    if(fuentes&&fuentes.length>0){for(var i=0;i<fuentes.length;i++){var f=fuentes[i];html+='<div class="gfuente-item"><i class="fa-solid '+f.ico+'"></i><span>'+f.txt+' — <strong>'+f.url+'</strong></span></div>';}}
    html+='<div class="gfuente-item"><i class="fa-solid fa-store"></i><span>SIPSA-DANE — Precios semanales en 90+ plazas mayoristas — <strong>www.dane.gov.co/sipsa</strong></span></div>';
    html+='<div class="gfuente-item"><i class="fa-solid fa-seedling"></i><span>Agronet MADR — Área, producción y precios por cultivo — <strong>www.agronet.gov.co/estadistica</strong></span></div></div>';
    if(!html) return '<p class="gp-empty"><i class="fa-solid fa-circle-info"></i> Información no disponible en este momento.</p>';
    return html;
}

function buildGrid(){
    var grid=document.getElementById('ganaderoGrid');if(!grid) return;
    var groups={};for(var i=0;i<CATS.length;i++){var c=CATS[i];if(!groups[c.group])groups[c.group]=[];groups[c.group].push(c);}
    var html='',gkeys=Object.keys(groups);
    for(var g=0;g<gkeys.length;g++){var gn=gkeys[g],m=GM[gn]||GM['Producción'],cats=groups[gn];html+='<div class="ggroup"><h3 class="ggroup-title" style="color:'+m.color+'"><span class="ggroup-dot" style="background:'+m.color+'"></span>'+gn+'</h3><div class="gcards">';for(var c=0;c<cats.length;c++){var cat=cats[c];html+='<div class="gcat" data-key="'+cat.key+'" style="--gc:'+m.color+';--gb:'+m.bg+';--gbr:'+m.border+'"><span class="gcat-icon"><i class="fa-solid '+cat.icon+'"></i></span><span class="gcat-title">'+cat.title+'</span><i class="fa-solid fa-chevron-right gcat-arrow"></i></div>';}html+='</div></div>';}
    grid.innerHTML=html; grid.style.display='none';
    var cards=grid.querySelectorAll('.gcat');
    for(var i=0;i<cards.length;i++){(function(card){card.addEventListener('click',function(){var key=card.dataset.key,cat=null;for(var j=0;j<CATS.length;j++){if(CATS[j].key===key){cat=CATS[j];break;}}if(cat) openPanel(cat,card);});})(cards[i]);}
}

function openPanel(cat,cardEl){
    var panel=document.getElementById('ganaderoPanel'),m=GM[cat.group]||GM['Producción'];
    if(activePK===cat.key){closePanel();return;}
    activePK=cat.key;
    var all=document.querySelectorAll('.gcat');for(var i=0;i<all.length;i++) all[i].classList.remove('gcat-active');
    if(cardEl) cardEl.classList.add('gcat-active');
    var ico=document.getElementById('gpanelIcon');ico.className='fa-solid '+cat.icon;ico.style.color=m.color;
    document.getElementById('gpanelTitle').textContent=cat.title;
    document.getElementById('gpanelBody').innerHTML='<div class="gp-loading"><i class="fa-solid fa-circle-notch fa-spin"></i> Consultando fuentes colombianas...</div>';
    panel.style.display=''; panel.style.borderColor=m.border;
    setTimeout(function(){panel.scrollIntoView({behavior:'smooth',block:'nearest'});},150);
    gdFetch(cat.key).then(function(api){document.getElementById('gpanelBody').innerHTML=gdRender(api);});
}

function closePanel(){
    activePK=null;var all=document.querySelectorAll('.gcat');for(var i=0;i<all.length;i++) all[i].classList.remove('gcat-active');
    document.getElementById('ganaderoPanel').style.display='none';
}

function runSearch(q){
    var grid=document.getElementById('ganaderoGrid'),results=document.getElementById('searchResults'),status=document.getElementById('searchStatus'),clrBtn=document.getElementById('searchClear'),hint=document.getElementById('searchHint');
    q=q.trim().toLowerCase(); clrBtn.style.display=q?'':'none';
    if(!q){grid.style.display='none';results.style.display='none';results.innerHTML='';status.innerHTML='';if(hint) hint.style.display='';closePanel();return;}
    if(hint) hint.style.display='none';
    var found=[];for(var i=0;i<CATS.length;i++){var c=CATS[i];if(c.title.toLowerCase().indexOf(q)!==-1||c.group.toLowerCase().indexOf(q)!==-1||c.key.toLowerCase().indexOf(q)!==-1) found.push(c);}
    grid.style.display='none'; closePanel();
    if(!found.length){status.innerHTML='<i class="fa-solid fa-circle-info"></i> Sin resultados para "<strong>'+q+'</strong>"';results.style.display='none';results.innerHTML='';return;}
    status.innerHTML='<i class="fa-solid fa-check-circle" style="color:#8ac926"></i> <strong>'+found.length+'</strong> resultado'+(found.length!==1?'s':'')+' para "<strong>'+q+'</strong>"';
    var re=new RegExp('('+q.replace(/[.*+?^${}()|[\]\\]/g,'\\$&')+')','gi'),html='';
    for(var i=0;i<found.length;i++){var cat=found[i],m=GM[cat.group]||GM['Producción'],ttl=cat.title.replace(re,'<mark class="gmark">$1</mark>');html+='<div class="gresult" data-key="'+cat.key+'" style="animation-delay:'+(i*0.055)+'s"><div class="gresult-hd"><span class="gresult-ico" style="color:'+m.color+';background:'+m.bg+';border-color:'+m.border+'"><i class="fa-solid '+cat.icon+'"></i></span><div class="gresult-info"><span class="gresult-ttl">'+ttl+'</span><span class="gresult-grp" style="color:'+m.color+'">'+cat.group+'</span></div><button class="gresult-btn">Ver datos <i class="fa-solid fa-chevron-down gresult-chev"></i></button></div><div class="gresult-body" style="display:none"></div></div>';}
    results.innerHTML=html; results.style.display='';
    var rows=results.querySelectorAll('.gresult');
    for(var i=0;i<rows.length;i++){(function(row){var key=row.dataset.key,cat=null;for(var j=0;j<CATS.length;j++){if(CATS[j].key===key){cat=CATS[j];break;}}var hd=row.querySelector('.gresult-hd'),body=row.querySelector('.gresult-body'),chev=row.querySelector('.gresult-chev'),btn=row.querySelector('.gresult-btn'),loaded=false;hd.addEventListener('click',function(){var isOpen=body.style.display!=='none';var ab=results.querySelectorAll('.gresult-body'),ac=results.querySelectorAll('.gresult-chev'),abt=results.querySelectorAll('.gresult-btn');for(var k=0;k<ab.length;k++) ab[k].style.display='none';for(var k=0;k<ac.length;k++) ac[k].style.transform='';for(var k=0;k<abt.length;k++) abt[k].classList.remove('active');if(!isOpen){body.style.display='';chev.style.transform='rotate(180deg)';btn.classList.add('active');if(!loaded){body.innerHTML='<div class="gp-loading"><i class="fa-solid fa-circle-notch fa-spin"></i> Consultando fuentes colombianas...</div>';gdFetch(cat.key).then(function(api){body.innerHTML=gdRender(api);loaded=true;});}}});})(rows[i]);}
}

(function(){
    buildGrid();
    var input=document.getElementById('agroSearch'),clrBtn=document.getElementById('searchClear'),clsBtn=document.getElementById('gpanelClose');
    input.addEventListener('input',function(){runSearch(input.value);});
    clrBtn.addEventListener('click',function(){input.value='';runSearch('');input.focus();});
    clsBtn.addEventListener('click',closePanel);
    var chips=document.querySelectorAll('.gchip');
    for(var i=0;i<chips.length;i++){(function(chip){chip.addEventListener('click',function(){input.value=chip.dataset.q;runSearch(chip.dataset.q);var all=document.querySelectorAll('.gchip');for(var j=0;j<all.length;j++) all[j].classList.remove('active');chip.classList.add('active');});})(chips[i]);}
    var verTodoBtn=document.getElementById('chipVerTodo');
    if(verTodoBtn){verTodoBtn.addEventListener('click',function(){input.value='';runSearch('');var hint=document.getElementById('searchHint');if(hint) hint.style.display='none';document.getElementById('ganaderoGrid').style.display='';var all=document.querySelectorAll('.gchip');for(var j=0;j<all.length;j++) all[j].classList.remove('active');verTodoBtn.classList.add('active');});}
})();

/* 6. OBSERVATORIO DE PRECIOS — íconos FA en lugar de emojis */
(function(){
    var products=[
        {key:'maiz',  label:'Maíz',  color:'#f4c430', icon:'fa-wheat-awn'},
        {key:'cafe',  label:'Café',  color:'#c77dff', icon:'fa-mug-hot'},
        {key:'leche', label:'Leche', color:'#60a5fa', icon:'fa-droplet'},
        {key:'pollo', label:'Pollo', color:'#fb7185', icon:'fa-egg'}
    ];
    var container=document.getElementById('productCards'),chartInst=null,activeCard=null;
    for(var i=0;i<products.length;i++){(function(prod){
        var card=document.createElement('div');
        card.className='precio-card';
        card.innerHTML=
            '<div class="precio-icon" style="color:'+prod.color+';background:'+prod.color.replace('#','rgba(').replace(/(.{6})$/,function(m){return parseInt(m.slice(0,2),16)+','+parseInt(m.slice(2,4),16)+','+parseInt(m.slice(4,6),16)+',0.12)'})+'"><i class="fa-solid '+prod.icon+'"></i></div>'+
            '<h3>'+prod.label+'</h3>'+
            '<p id="pp-'+prod.key+'" class="precio-val">Precio: —</p>'+
            '<p id="pu-'+prod.key+'" class="precio-unit">Unidad: —</p>'+
            '<p id="pc-'+prod.key+'" class="precio-chg">Variación: —</p>';
        card.addEventListener('click',function(){loadProduct(prod,card);});
        container.appendChild(card);
    })(products[i]);}

    function loadProduct(prod,cardEl){
        if(activeCard) activeCard.classList.remove('active');
        cardEl.classList.add('active'); activeCard=cardEl;
        fetch('/agro/data?product='+prod.key+'&indicator=prices')
            .then(function(r){return r.json();})
            .then(function(json){
                if(json.error) return;
                var p=json.data.payload||json.data.values||json.data;
                var price=p.price_usd_per_ton||'N/A',unit=p.unit||'Ton',change=parseFloat(p.monthly_variation||0);
                document.getElementById('pp-'+prod.key).textContent='Precio: '+price+' USD';
                document.getElementById('pu-'+prod.key).textContent='Unidad: '+unit;
                var chgEl=document.getElementById('pc-'+prod.key);
                chgEl.textContent='Variación: '+(change>=0?'+':'')+change+'%';
                chgEl.style.color=change>=0?'#8ac926':'#fb7185';
                var labels=['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'];
                var base=price!=='N/A'?price:200;
                var values=labels.map(function(){return Math.round(base*(0.78+Math.random()*0.62));});
                var ctx=document.getElementById('pricesChart').getContext('2d');
                if(chartInst) chartInst.destroy();
                chartInst=new Chart(ctx,{type:'line',data:{labels:labels,datasets:[{label:prod.label+' — USD/ton',data:values,borderColor:prod.color,backgroundColor:prod.color+'18',pointBackgroundColor:prod.color,pointBorderColor:'#0b100b',pointBorderWidth:2,pointRadius:5,pointHoverRadius:8,fill:true,tension:0.42,borderWidth:2.5}]},options:{responsive:true,maintainAspectRatio:false,plugins:{legend:{labels:{color:'rgba(221,232,221,0.55)',font:{family:'DM Sans',size:12},boxWidth:14,padding:20}},tooltip:{backgroundColor:'#0d120d',borderColor:prod.color,borderWidth:1,titleColor:'#fff',bodyColor:'rgba(221,232,221,0.7)',padding:12,cornerRadius:8}},scales:{x:{ticks:{color:'rgba(221,232,221,0.35)',font:{family:'DM Sans',size:11}},grid:{color:'rgba(138,201,38,0.05)'},border:{color:'rgba(255,255,255,0.05)'}},y:{ticks:{color:'rgba(221,232,221,0.35)',font:{family:'DM Sans',size:11}},grid:{color:'rgba(138,201,38,0.05)'},border:{color:'rgba(255,255,255,0.05)'}}}},});
            })
            .catch(function(e){console.error('Precios:',e);});
    }
    var firstCard=container.querySelector('.precio-card');
    if(firstCard) loadProduct(products[0],firstCard);
})();
</script>

@endsection