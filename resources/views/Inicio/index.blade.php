@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgroFinanzas</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>
<!-- HERO + CARRUSEL -->
<div class="hero-principal">
    <div class="carrusel-track">
        <div class="carrusel-slide active">
            <img src="https://images.unsplash.com/photo-1560493676-04071c5f467b?auto=format&fit=crop&q=80&w=1600" alt="Campo">
            <div class="carrusel-caption"><span class="caption-tag">Tecnología</span><h3>Drones e IA: Revolucionando la eficiencia del riego en el campo.</h3></div>
        </div>
        <div class="carrusel-slide">
            <img src="https://images.unsplash.com/photo-1580570598977-4b2412d01bbc?auto=format&fit=crop&q=80&w=1600" alt="Mercados">
            <div class="carrusel-caption"><span class="caption-tag">Mercados</span><h3>El impacto de las tasas de interés en los precios de exportación agrícola.</h3></div>
        </div>
        <div class="carrusel-slide">
            <img src="https://images.unsplash.com/photo-1464226184884-fa280b87c399?auto=format&fit=crop&q=80&w=1600" alt="Cosecha">
            <div class="carrusel-caption"><span class="caption-tag">Producción</span><h3>Cosecha Récord en Granos: ¿Qué significa para el mercado colombiano?</h3></div>
        </div>
        <div class="carrusel-slide">
            <img src="https://images.unsplash.com/photo-1592982537447-7440770cbfc9?auto=format&fit=crop&q=80&w=1600" alt="Café">
            <div class="carrusel-caption"><span class="caption-tag">Exportaciones</span><h3>Colombia refuerza su posición en el mercado mundial del café especial.</h3></div>
        </div>
    </div>
    <div class="hero-brand">
        <div class="hero-leaf">🌿</div>
        <h1>AgroFinanzas</h1>
        <p>Decisiones inteligentes para el campo</p>
    </div>
    <button class="carrusel-btn prev" id="btnPrev" aria-label="Anterior"><i class="fa-solid fa-chevron-left"></i></button>
    <button class="carrusel-btn next" id="btnNext" aria-label="Siguiente"><i class="fa-solid fa-chevron-right"></i></button>
    <div class="carrusel-dots" id="carruselDots"></div>
</div>

<!-- BANNER -->
<div class="noticias-banner reveal">
    <div class="banner-inner">
        <div class="banner-badge"><i class="fa-solid fa-circle" style="font-size:.45rem"></i> En vivo</div>
        <div class="banner-text">
            <h2>Lo que pasa hoy en el sector agro</h2>
            <p>Entérate de las últimas noticias del campo colombiano y latinoamericano.</p>
        </div>
        <div class="ticker-wrap">
            <div class="ticker">
                <span>📈 Café: +3.2% &nbsp;·&nbsp; 🌽 Maíz: -1.4% &nbsp;·&nbsp; 🥛 Leche: sin variación &nbsp;·&nbsp; 🐔 Pollo: +0.8% &nbsp;·&nbsp; 🌿 Nuevos subsidios FINAGRO &nbsp;·&nbsp; ☀️ Alerta seca: Boyacá y Cundinamarca &nbsp;·&nbsp; 📈 Café: +3.2% &nbsp;·&nbsp; 🌽 Maíz: -1.4% &nbsp;·&nbsp;</span>
            </div>
        </div>
    </div>
</div>

<!-- NOTICIAS -->
<section class="noticias-section">
    <div class="section-header reveal">
        <span class="section-tag">Artículos</span>
        <h2 class="section-title">Noticias del Campo</h2>
    </div>
    <div class="noticias-grid">
        <article class="noticia-card reveal" onclick="abrirModal(this)">
            <div class="noticia-img"><img src="https://images.unsplash.com/photo-1593023333594-487b2f7dd415?auto=format&fit=crop&q=80&w=600" alt="Ganado" onerror="this.src='https://placehold.co/600x380/0e0f0b/7eb83a?text=Ganado'"><span class="noticia-tag">Ganadería</span></div>
            <div class="noticia-body"><h3>Cuidado de tus vacas</h3><p>Aprende cómo garantizar la salud y productividad de tu ganado con consejos prácticos y fáciles de aplicar en el día a día.</p><span class="noticia-link">Leer más <i class="fa-solid fa-arrow-right"></i></span></div>
        </article>
        <article class="noticia-card reveal" onclick="abrirModal(this)">
            <div class="noticia-img"><img src="https://images.unsplash.com/photo-1560493676-04071c5f467b?auto=format&fit=crop&q=80&w=600" alt="Cultivos" onerror="this.src='https://placehold.co/600x380/0e0f0b/7eb83a?text=Cultivos'"><span class="noticia-tag">Cultivos</span></div>
            <div class="noticia-body"><h3>Cómo cuidar tus cultivos</h3><p>Técnicas modernas y ecológicas para mantener tus cultivos sanos, productivos y resistentes a plagas.</p><span class="noticia-link">Leer más <i class="fa-solid fa-arrow-right"></i></span></div>
        </article>
        <article class="noticia-card reveal" onclick="abrirModal(this)">
            <div class="noticia-img"><img src="https://images.unsplash.com/photo-1579621970795-87facc2f976d?auto=format&fit=crop&q=80&w=600" alt="Finanzas" onerror="this.src='https://placehold.co/600x380/0e0f0b/7eb83a?text=Finanzas'"><span class="noticia-tag">Finanzas</span></div>
            <div class="noticia-body"><h3>Mejor manejo de tus finanzas</h3><p>Organiza tus ingresos, controla gastos y toma decisiones financieras inteligentes para tu emprendimiento rural.</p><span class="noticia-link">Leer más <i class="fa-solid fa-arrow-right"></i></span></div>
        </article>
        <article class="noticia-card reveal" onclick="abrirModal(this)">
            <div class="noticia-img"><img src="https://images.unsplash.com/photo-1465146344425-f00d5f5c8f07?auto=format&fit=crop&q=80&w=600" alt="Riego" onerror="this.src='https://placehold.co/600x380/0e0f0b/7eb83a?text=Riego'"><span class="noticia-tag">Tecnología</span></div>
            <div class="noticia-body"><h3>Sistemas de Riego Inteligente</h3><p>Optimiza el consumo de agua y mejora la producción con tecnologías de riego controladas por sensores de humedad.</p><span class="noticia-link">Leer más <i class="fa-solid fa-arrow-right"></i></span></div>
        </article>
        <article class="noticia-card reveal" onclick="abrirModal(this)">
            <div class="noticia-img"><img src="https://images.unsplash.com/photo-1543286386-713bdd548da4?auto=format&fit=crop&q=80&w=600" alt="Subsidios" onerror="this.src='https://placehold.co/600x380/0e0f0b/7eb83a?text=Subsidios'"><span class="noticia-tag">Política</span></div>
            <div class="noticia-body"><h3>Guía de Subsidios 2025</h3><p>Conoce los nuevos programas de apoyo gubernamental para pequeños y medianos productores del sector agrícola.</p><span class="noticia-link">Leer más <i class="fa-solid fa-arrow-right"></i></span></div>
        </article>
        <article class="noticia-card reveal" onclick="abrirModal(this)">
            <div class="noticia-img"><img src="https://images.unsplash.com/photo-1592982537447-7440770cbfc9?auto=format&fit=crop&q=80&w=600" alt="Plagas" onerror="this.src='https://placehold.co/600x380/0e0f0b/7eb83a?text=Plagas'"><span class="noticia-tag">Sanidad</span></div>
            <div class="noticia-body"><h3>Prevención y Control de Plagas</h3><p>Identifica y combate las plagas más comunes antes de que afecten gravemente tu producción y cosecha.</p><span class="noticia-link">Leer más <i class="fa-solid fa-arrow-right"></i></span></div>
        </article>
        <article class="noticia-card reveal" onclick="abrirModal(this)">
            <div class="noticia-img"><img src="https://images.unsplash.com/photo-1464226184884-fa280b87c399?auto=format&fit=crop&q=80&w=600" alt="Semillas" onerror="this.src='https://placehold.co/600x380/0e0f0b/7eb83a?text=Semillas'"><span class="noticia-tag">Mercado</span></div>
            <div class="noticia-body"><h3>Análisis de Precios de Semillas</h3><p>Revisa la última fluctuación en los precios de semillas clave para una siembra rentable esta temporada.</p><span class="noticia-link">Leer más <i class="fa-solid fa-arrow-right"></i></span></div>
        </article>
        <article class="noticia-card reveal" onclick="abrirModal(this)">
            <div class="noticia-img"><img src="https://images.unsplash.com/photo-1416879595882-3373a0480b5b?auto=format&fit=crop&q=80&w=600" alt="Maquinaria" onerror="this.src='https://placehold.co/600x380/0e0f0b/7eb83a?text=Maquinaria'"><span class="noticia-tag">Maquinaria</span></div>
            <div class="noticia-body"><h3>Mantenimiento de Maquinaria</h3><p>Consejos esenciales para el mantenimiento preventivo de tractores y equipos agrícolas.</p><span class="noticia-link">Leer más <i class="fa-solid fa-arrow-right"></i></span></div>
        </article>
    </div>
</section>

<!-- AMIGO GANADERO -->
<section class="ganadero-section reveal" id="amigo-ganadero">
    <div class="ganadero-layout">
        <div class="ganadero-intro">
            <span class="section-tag">Base de Conocimiento</span>
            <h2 class="section-title">🐮 Amigo Ganadero</h2>
            <p class="section-sub">Busca cualquier tema del sector agropecuario y accede a datos actualizados: precios, mercados, subsidios, plagas y más.</p>
            <div class="gstats">
                <div class="gstat"><span class="gstat-n">23</span><span class="gstat-l">Categorías</span></div>
                <div class="gstat"><span class="gstat-n">4</span><span class="gstat-l">Grupos</span></div>
                <div class="gstat"><span class="gstat-n">API</span><span class="gstat-l">Datos en vivo</span></div>
            </div>
        </div>
        <div class="gsearch-box">
            <div class="gsearch-row">
                <i class="fa-solid fa-magnifying-glass gsearch-ico"></i>
                <input type="text" id="agroSearch" placeholder="Ej: subsidios, exportaciones, plagas..." class="gsearch-input" autocomplete="off">
                <button class="gsearch-clear" id="searchClear" aria-label="Limpiar" style="display:none"><i class="fa-solid fa-xmark"></i></button>
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
            <div class="gpanel-ttl"><span class="gpanel-ico-wrap"><i id="gpanelIcon" class="fa-solid fa-tag"></i></span><h3 id="gpanelTitle">—</h3></div>
            <button class="gpanel-cls" id="gpanelClose" aria-label="Cerrar"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="gpanel-body" id="gpanelBody"></div>
    </div>
    <div class="gsearch-results" id="searchResults" style="display:none"></div>
    <!-- Hint inicial — se oculta al buscar -->
    <div class="gsearch-hint" id="searchHint">
        <i class="fa-solid fa-leaf"></i>
        <p>Escribe en el buscador o selecciona una búsqueda rápida para explorar las <strong>23 categorías</strong> del sector agropecuario colombiano.</p>
    </div>
</section>

<!-- OBSERVATORIO DE PRECIOS -->
<section class="precios-section reveal">
    <div class="section-header">
        <span class="section-tag">Mercado</span>
        <h2 class="section-title">Observatorio de Precios</h2>
        <p class="section-sub">Selecciona un producto para ver su precio, variación y tendencia</p>
    </div>
    <div class="product-grid" id="productCards"></div>
    <div class="chart-wrap"><canvas id="pricesChart"></canvas></div>
</section>

<!-- MODAL -->
<div class="modal-overlay" id="newsModal">
    <div class="modal-box">
        <button class="modal-close" id="modalClose" aria-label="Cerrar"><i class="fa-solid fa-xmark"></i></button>
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
        <h4>Clima Actual</h4><hr>
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
    if(!('IntersectionObserver' in window)){
        for(var i=0;i<els.length;i++) els[i].classList.add('revealed');
        return;
    }
    var obs=new IntersectionObserver(function(entries){
        entries.forEach(function(e){if(e.isIntersecting){e.target.classList.add('revealed');obs.unobserve(e.target);}});
    },{threshold:0.1});
    for(var i=0;i<els.length;i++) obs.observe(els[i]);
})();

/* 3. MODAL */
(function(){
    var overlay=document.getElementById('newsModal'),
        btnClose=document.getElementById('modalClose');
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
    var w=document.getElementById('weatherWidget'),
        ic=document.getElementById('weatherIcon');
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


/* ═══════════════════════════════════════════════════════════════
   5. AMIGO GANADERO
═══════════════════════════════════════════════════════════════ */
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
    'Economía':  {color:'#f4c430',bg:'rgba(244,196,48,.1)', border:'rgba(244,196,48,.3)'},
    'Comercio':  {color:'#60a5fa',bg:'rgba(96,165,250,.1)', border:'rgba(96,165,250,.3)'},
    'Producción':{color:'#7eb83a',bg:'rgba(126,184,58,.1)', border:'rgba(126,184,58,.3)'},
    'Sanidad':   {color:'#fb7185',bg:'rgba(251,113,133,.1)',border:'rgba(251,113,133,.3)'}
};
var cache={}, activePK=null;

/* ─────────────────────────────────────
   Helper: Banco Mundial API pública
───────────────────────────────────── */
function wbFetch(indicator, label, unit){
    return fetch('https://api.worldbank.org/v2/country/COL/indicator/'+indicator+'?format=json&mrv=5&per_page=5')
        .then(function(r){return r.json();})
        .then(function(j){
            var entries=j[1]||[], result={fuente_wb:'Banco Mundial — '+label};
            entries.forEach(function(e){ if(e.value) result['Año '+e.date]=parseFloat(e.value).toFixed(2)+' '+unit; });
            return result;
        });
}

/* ─────────────────────────────────────
   REAL_DATA: Banco Mundial + fuentes colombianas
   Cada función retorna { data:{...}, fuentes:[...] }
   SIPSA/Agronet/ICA requieren proxy backend (CORS).
   Para producción: crear rutas Laravel que hagan proxy.
───────────────────────────────────── */
var REAL_DATA={
    prices: function(){
        return wbFetch('AG.PRD.FOOD.XD','Índice de producción alimentaria Colombia','(índice base 2004-2006)')
            .then(function(wb){ return {data:wb, fuentes:[
                {ico:'fa-database', txt:'SIPSA-DANE — Precios semanales en 90+ plazas mayoristas', url:'www.dane.gov.co/sipsa'},
                {ico:'fa-seedling',  txt:'Agronet MADR — Series históricas de precios por cultivo', url:'www.agronet.gov.co/estadistica'}
            ]};});
    },
    costs: function(){
        return wbFetch('NY.GDP.PCAP.CD','PIB per cápita USD Colombia','USD')
            .then(function(wb){ return {data:wb, fuentes:[
                {ico:'fa-coins',    txt:'Agronet MADR — Costos de producción por cultivo y región',   url:'www.agronet.gov.co/estadistica'},
                {ico:'fa-building', txt:'FINAGRO — Líneas de crédito y tasas vigentes',               url:'www.finagro.com.co'}
            ]};});
    },
    investment: function(){
        return wbFetch('GC.XPN.TOTL.GD.ZS','Gasto público total % PIB Colombia','%')
            .then(function(wb){ return {data:wb, fuentes:[
                {ico:'fa-landmark', txt:'ADR — Agencia de Desarrollo Rural · Proyectos productivos',  url:'www.adr.gov.co'},
                {ico:'fa-building', txt:'FINAGRO — Incentivo a la Capitalización Rural (ICR)',         url:'www.finagro.com.co'}
            ]};});
    },
    subsidies: function(){
        return wbFetch('GC.TAX.TOTL.GD.ZS','Carga fiscal % PIB Colombia (contexto subsidios)','%')
            .then(function(wb){ return {data:wb, fuentes:[
                {ico:'fa-hand-holding-dollar', txt:'FINAGRO — Programas: Mujer Rural, Jóvenes, PDET', url:'www.finagro.com.co'},
                {ico:'fa-landmark',            txt:'Banco Agrario — Créditos y subsidios oficiales',  url:'www.bancoagrario.gov.co'}
            ]};});
    },
    agricultural_gdp: function(){
        return wbFetch('NV.AGR.TOTL.ZS','Valor agregado agrícola % del PIB Colombia','%')
            .then(function(wb){ return {data:wb, fuentes:[
                {ico:'fa-chart-line', txt:'DANE — Cuentas Nacionales trimestrales por sector',        url:'www.dane.gov.co'},
                {ico:'fa-seedling',   txt:'Agronet MADR — Estadísticas del sector agropecuario',      url:'www.agronet.gov.co/estadistica'}
            ]};});
    },
    exports: function(){
        return wbFetch('TX.VAL.AGRI.ZS.UN','Exportaciones agrícolas % del total de mercancías','%')
            .then(function(wb){ return {data:wb, fuentes:[
                {ico:'fa-plane',    txt:'PROCOLOMBIA — Inteligencia de mercados por producto y país', url:'www.procolombia.co'},
                {ico:'fa-seedling', txt:'Agronet MADR — Exportaciones por producto y destino',        url:'www.agronet.gov.co/estadistica'}
            ]};});
    },
    imports: function(){
        return wbFetch('TM.VAL.AGRI.ZS.UN','Importaciones agrícolas % del total de mercancías','%')
            .then(function(wb){ return {data:wb, fuentes:[
                {ico:'fa-file-invoice', txt:'DIAN — Estadísticas de comercio exterior',              url:'www.dian.gov.co'},
                {ico:'fa-seedling',     txt:'Agronet MADR — Importaciones por producto',              url:'www.agronet.gov.co/estadistica'}
            ]};});
    },
    trade_balance: function(){
        return wbFetch('BN.CAB.XOKA.CD','Balanza cuenta corriente USD Colombia','')
            .then(function(wb){
                Object.keys(wb).forEach(function(k){ if(k.indexOf('Año')===0&&wb[k]){var v=parseFloat(wb[k]);if(!isNaN(v)) wb[k]=(v/1e9).toFixed(2)+' mil millones USD';} });
                return {data:wb, fuentes:[
                    {ico:'fa-scale-balanced', txt:'MinCIT — Estadísticas de comercio exterior agropecuario', url:'www.mincit.gov.co'},
                    {ico:'fa-seedling',       txt:'Agronet MADR — Balanza comercial por producto',           url:'www.agronet.gov.co/estadistica'}
                ]};
            });
    },
    competitiveness: function(){
        return wbFetch('GC.DOD.TOTL.GD.ZS','Deuda pública % PIB Colombia','%')
            .then(function(wb){ return {data:wb, fuentes:[
                {ico:'fa-trophy',   txt:'DNP — Índice de Competitividad Departamental',                url:'www.dnp.gov.co'},
                {ico:'fa-seedling', txt:'Agronet MADR — Rendimientos y productividad por cultivo',     url:'www.agronet.gov.co/estadistica'}
            ]};});
    },
    market_access: function(){
        return wbFetch('NE.EXP.GNFS.ZS','Exportaciones bienes y servicios % PIB Colombia','%')
            .then(function(wb){ return {data:wb, fuentes:[
                {ico:'fa-globe',     txt:'PROCOLOMBIA — Perfil de mercados internacionales por producto', url:'www.procolombia.co'},
                {ico:'fa-handshake', txt:'MinCIT — TLC y acuerdos comerciales vigentes',                 url:'www.tlc.gov.co'}
            ]};});
    },
    logistics: function(){
        return wbFetch('IC.EXP.COST.CD','Costo exportar por contenedor USD Colombia','USD')
            .then(function(wb){ return {data:wb, fuentes:[
                {ico:'fa-road',  txt:'INVIAS — Estado de vías y proyectos de infraestructura',         url:'www.invias.gov.co'},
                {ico:'fa-truck', txt:'MinTransporte — Transporte de carga y logística rural',           url:'www.mintransporte.gov.co'}
            ]};});
    },
    tariffs: function(){
        return wbFetch('TM.TAX.MANF.SM.AR.ZS','Arancel promedio bienes manufacturados Colombia','%')
            .then(function(wb){ return {data:wb, fuentes:[
                {ico:'fa-file-invoice-dollar', txt:'DIAN — Arancel MUISCA · consulta por producto',   url:'www.dian.gov.co/aduana/tarifas'},
                {ico:'fa-handshake',           txt:'MinCIT — Acuerdos y preferencias arancelarias',   url:'www.mincit.gov.co'}
            ]};});
    },
    treaties: function(){
        return wbFetch('TM.TAX.MRCH.SM.AR.ZS','Arancel promedio todas las mercancías Colombia','%')
            .then(function(wb){ return {data:wb, fuentes:[
                {ico:'fa-handshake', txt:'MinCIT — TLC vigentes y en negociación Colombia',            url:'www.tlc.gov.co'},
                {ico:'fa-plane',     txt:'PROCOLOMBIA — Guías de exportación por TLC y producto',      url:'www.procolombia.co'}
            ]};});
    },
    harvest_area: function(){
        return wbFetch('AG.LND.CROP.ZS','Tierras de cultivo % del área total Colombia','%')
            .then(function(wb){ return {data:wb, fuentes:[
                {ico:'fa-map',              txt:'Agronet MADR — EVA: Área cosechada por cultivo y municipio', url:'www.agronet.gov.co/estadistica'},
                {ico:'fa-map-location-dot', txt:'UPRA — Zonificación y aptitud agrícola del suelo',           url:'www.upra.gov.co'}
            ]};});
    },
    planted_area: function(){
        return wbFetch('AG.LND.ARBL.ZS','Tierras arables % del área de tierra Colombia','%')
            .then(function(wb){ return {data:wb, fuentes:[
                {ico:'fa-seedling', txt:'Agronet MADR — EVA: Área sembrada por cultivo y municipio',   url:'www.agronet.gov.co/estadistica'},
                {ico:'fa-database', txt:'SIPSA-DANE — Calendarios de cosecha por región',              url:'www.dane.gov.co/sipsa'}
            ]};});
    },
    yield_forecast: function(){
        return wbFetch('AG.YLD.CREL.KG','Rendimiento cereales kg por hectárea Colombia','kg/ha')
            .then(function(wb){ return {data:wb, fuentes:[
                {ico:'fa-flask',    txt:'AGROSAVIA — Variedades mejoradas y paquetes tecnológicos',    url:'www.agrosavia.co'},
                {ico:'fa-seedling', txt:'Agronet MADR — Rendimientos por cultivo, año y departamento', url:'www.agronet.gov.co/estadistica'}
            ]};});
    },
    future_estimates: function(){
        return wbFetch('SP.POP.GROW','Crecimiento poblacional anual % Colombia','%')
            .then(function(wb){ return {data:wb, fuentes:[
                {ico:'fa-map-location-dot', txt:'UPRA — Ordenamiento productivo y prospectiva agrícola', url:'www.upra.gov.co'},
                {ico:'fa-landmark',         txt:'DNP — Plan Nacional de Desarrollo agropecuario',         url:'www.dnp.gov.co'}
            ]};});
    },
    postharvest_losses: function(){
        return wbFetch('AG.PRD.LVSK.XD','Índice producción pecuaria base 2004-2006 Colombia','')
            .then(function(wb){ return {data:wb, fuentes:[
                {ico:'fa-graduation-cap', txt:'SENA — Cursos gratuitos de manejo postcosecha',          url:'www.sena.edu.co'},
                {ico:'fa-boxes-stacked',  txt:'ALMACAFÉ — Almacenamiento y financiamiento con producto', url:'www.almacafe.com.co'}
            ]};});
    },
    stock: function(){
        return wbFetch('FP.CPI.TOTL.ZG','Inflación anual % Colombia (impacta inventarios)','%')
            .then(function(wb){ return {data:wb, fuentes:[
                {ico:'fa-boxes-stacked', txt:'Bolsa Mercantil de Colombia — Certificados de depósito', url:'www.bolsamercantil.com.co'},
                {ico:'fa-warehouse',     txt:'ALMACAFÉ — Red de silos y almacenamiento agropecuario',  url:'www.almacafe.com.co'}
            ]};});
    },
    farmers_count: function(){
        return wbFetch('SL.AGR.EMPL.ZS','Empleo en agricultura % del empleo total Colombia','%')
            .then(function(wb){ return {data:wb, fuentes:[
                {ico:'fa-users',  txt:'DANE — Censo Nacional Agropecuario y Gran Encuesta Agropecuaria', url:'www.dane.gov.co'},
                {ico:'fa-tractor',txt:'SAC — Sociedad de Agricultores de Colombia · Gremios',            url:'www.sac.org.co'}
            ]};});
    },
    pests_risk: function(){
        return wbFetch('AG.PRD.CROP.XD','Índice producción agrícola base 2004-2006 Colombia','')
            .then(function(wb){ return {data:wb, fuentes:[
                {ico:'fa-bug',   txt:'ICA — SIVIFITO: Sistema de Vigilancia Fitosanitaria · Alertas por depto', url:'www.ica.gov.co/alertas'},
                {ico:'fa-flask', txt:'AGROSAVIA — Manejo integrado de plagas por cultivo',                       url:'www.agrosavia.co'}
            ]};});
    },
    diseases: function(){
        return wbFetch('SH.XPD.CHEX.GD.ZS','Gasto en salud % PIB Colombia','%')
            .then(function(wb){ return {data:wb, fuentes:[
                {ico:'fa-virus', txt:'ICA — Sanidad animal y vegetal · Registros y alertas oficiales',  url:'www.ica.gov.co'},
                {ico:'fa-cow',   txt:'FEDEGÁN — Programas de salud animal para ganaderos',              url:'www.fedegan.org.co'}
            ]};});
    },
    pest_impact: function(){
        return wbFetch('AG.PRD.FOOD.XD','Índice producción alimentaria Colombia','')
            .then(function(wb){ return {data:wb, fuentes:[
                {ico:'fa-shield-halved', txt:'FINAGRO — Seguro Agropecuario subsidiado contra plagas y clima', url:'www.finagro.com.co/seguro-agropecuario'},
                {ico:'fa-bug',           txt:'ICA — Programas de erradicación subsidiados · Línea 018000111098', url:'www.ica.gov.co'}
            ]};});
    }
};

/* ─────────────────────────────────────
   gdFetch: cache + guarda _key en resultado
───────────────────────────────────── */
function gdFetch(key){
    if(cache[key]) return Promise.resolve(cache[key]);
    var fn=REAL_DATA[key]||function(){return Promise.resolve({data:{nota:'Consulte Agronet o DANE.'},fuentes:[]});};
    return fn()
        .then(function(j){j._key=key;cache[key]=j;return j;})
        .catch(function(){return {data:{},fuentes:[],_key:key};});
}

/* ─────────────────────────────────────
   Contenido editorial por categoría
───────────────────────────────────── */
var CONTENT={
    prices:{
        que_es:'La elasticidad del precio mide cómo cambia la demanda de un producto agropecuario cuando su precio sube o baja. Un producto con baja elasticidad (como el arroz o la leche) mantiene su demanda aunque suba el precio porque es básico para la canasta familiar. Uno con alta elasticidad (frutas exóticas, flores) pierde ventas rápidamente si el precio sube.',
        por_que:'Conocer la elasticidad te permite tomar mejores decisiones de venta: si tu producto es inelástico, puedes subir el precio en época de escasez sin perder muchos compradores. Si es elástico, debes ser más cuidadoso con los precios y buscar diferenciación o valor agregado.',
        consejos:['Monitorea los precios semanales de tu producto en SIPSA-DANE — publican datos de más de 90 plazas mayoristas en Colombia (www.dane.gov.co/sipsa).','En temporada alta de cosecha los precios bajan por exceso de oferta — planifica almacenamiento o procesamiento antes de cosechar.','Productos procesados (mermeladas, quesos, pulpas congeladas) tienen menor elasticidad que los frescos — agrega valor para estabilizar ingresos.','La Bolsa Mercantil de Colombia publica precios de referencia para granos (www.bolsamercantil.com.co).']
    },
    costs:{
        que_es:'Los costos de producción agrícola incluyen insumos (semillas, fertilizantes, plaguicidas), mano de obra, maquinaria, agua, transporte y costos financieros. En Colombia representan entre el 60% y el 80% del precio final del producto según el cultivo.',
        por_que:'Controlar los costos es la diferencia entre un negocio rentable y uno que pierde dinero. Agronet publica tablas de costos de producción por cultivo y departamento — úsalas como referencia para saber si tus costos están dentro del promedio nacional.',
        consejos:['Consulta los costos de producción por cultivo en Agronet (www.agronet.gov.co/estadistica) — tienen datos de más de 25 cultivos principales por departamento.','FINAGRO tiene créditos a tasas preferenciales (DTF-2%) para capital de trabajo agrícola (www.finagro.com.co).','Los fertilizantes representan hasta el 40% del costo — compara precios registrados ante el ICA (www.ica.gov.co/registros-ica/insumos-agricolas).','Agrupa compras de insumos con productores vecinos para obtener descuentos por volumen de hasta el 15-20%.']
    },
    investment:{
        que_es:'La inversión agrícola en Colombia proviene de tres fuentes: inversión privada de los productores, crédito institucional (Banco Agrario, FINAGRO) e inversión pública del Estado. El ICR (Incentivo a la Capitalización Rural) subsidia hasta el 40% de inversiones en tecnificación.',
        por_que:'Una inversión bien planificada en tecnología (riego tecnificado, semillas mejoradas, maquinaria) puede duplicar la productividad en 2-3 años. FINAGRO y el Banco Agrario tienen líneas especiales con tasas subsidiadas por debajo del mercado.',
        consejos:['ICR: el gobierno paga hasta el 40% de tu inversión en equipos y mejoras — solicítalo al tramitar el crédito en el Banco Agrario.','ADR (Agencia de Desarrollo Rural) financia proyectos productivos asociativos (www.adr.gov.co).','FINAGRO: líneas especiales para mujer rural, jóvenes agricultores y pequeños productores con tasas desde DTF-2% (www.finagro.com.co).','DRE (Desarrollo Rural con Equidad): subsidio a la tasa de interés para pequeños productores en municipios prioritarios.']
    },
    subsidies:{
        que_es:'Los subsidios agrícolas en Colombia incluyen: ICR (capitalización rural), seguro agropecuario subsidiado, incentivos a la asistencia técnica, subsidios a fertilizantes en zonas PDET y créditos blandos de FINAGRO. El SISA es el sistema de registro para acceder a estos beneficios.',
        por_que:'Acceder a subsidios puede reducir tus costos hasta en un 40%. Sin embargo, muchos pequeños productores no los aprovechan por desconocimiento. El primer paso es registrarse gratuitamente en el SISA del Ministerio de Agricultura.',
        consejos:['Regístrate en el SISA (Sistema de Información del Sector Agropecuario) en el Ministerio de Agricultura (www.minagricultura.gov.co) — es gratuito y da acceso a subsidios.','El seguro agropecuario subsidiado cubre pérdidas por clima, plagas y enfermedades — el gobierno paga hasta el 80% de la prima vía FINAGRO.','Municipios PDET tienen prioridad en subsidios — consulta si tu municipio aplica en la ARF (www.arf.gov.co).','Banco Agrario: créditos con tasa subsidiada y períodos de gracia hasta 2 años (www.bancoagrario.gov.co).']
    },
    agricultural_gdp:{
        que_es:'El PIB agrícola colombiano equivale al 6-7% del PIB total pero genera el 16% del empleo nacional y el 21% de las exportaciones. Incluye agricultura, ganadería, silvicultura y pesca. Café, flores, banano y aguacate son los subsectores de mayor dinamismo exportador.',
        por_que:'Entender el comportamiento del PIB agropecuario te dice en qué sectores está creciendo la economía rural y dónde se concentra la inversión pública y privada. Los sectores con mayor crecimiento del PIB agrícola reciben más apoyo institucional.',
        consejos:['DANE publica trimestralmente las Cuentas Nacionales con el PIB por sector (www.dane.gov.co).','Los sectores con mayor crecimiento reciben más apoyo institucional y tienen mejores perspectivas de precios.','Agronet tiene estadísticas históricas de producción y área por cultivo (www.agronet.gov.co/estadistica).','Monitorea el Informe de Coyuntura Económica Regional del DANE para tendencias locales.']
    },
    exports:{
        que_es:'Las exportaciones agrícolas colombianas superan los USD 7.000 millones anuales. Café (el más importante), flores, banano, aceite de palma, aguacate Hass, cacao y azúcar lideran. Colombia exporta a más de 150 países — EEUU, Alemania, Países Bajos y Japón son los principales destinos.',
        por_que:'Exportar permite acceder a precios internacionales más altos que los locales y reducir la dependencia del mercado interno. Con los TLC vigentes, muchos productos colombianos tienen arancel 0% en EEUU y la UE.',
        consejos:['PROCOLOMBIA ofrece asesoría gratuita para exportadores con inteligencia de mercados por producto (www.procolombia.co).','Para exportar necesitas registro ICA, certificado de origen y cumplir normas fitosanitarias del país destino.','Aguacate Hass, cacao fino y uchuva tienen las mejores perspectivas de crecimiento en exportaciones.','Agronet publica estadísticas de exportaciones por producto y país destino (www.agronet.gov.co/estadistica).']
    },
    imports:{
        que_es:'Colombia importa principalmente maíz, trigo, soya, cebada y algodón — materias primas que no produce en cantidad suficiente. Para cereales como maíz y trigo, depende más del 60% de importaciones, lo que genera vulnerabilidad ante crisis internacionales.',
        por_que:'Las importaciones compiten directamente con la producción nacional y pueden bajar los precios internos. Conocer qué y cuánto se importa te ayuda a identificar oportunidades para sustituir importaciones con producción local.',
        consejos:['Diversifica hacia cultivos sustitutos de importaciones (maíz amarillo, soya) que tienen mercado interno garantizado.','Las industrias de alimentos balanceados pagan buen precio por maíz y soya nacional.','Monitorea los precios internacionales del Chicago Board of Trade (CBOT) para anticipar movimientos del mercado local.','DIAN publica estadísticas detalladas de importaciones (www.dian.gov.co).']
    },
    trade_balance:{
        que_es:'La balanza comercial agrícola compara exportaciones e importaciones del sector. Colombia tiene balanza positiva en productos diferenciados (café, flores, frutas) pero negativa en cereales y oleaginosas. En total, el sector aporta positivamente a la balanza comercial del país.',
        por_que:'Una balanza positiva indica que el país es competitivo internacionalmente en ese sector. Para el productor individual, significa que hay oportunidades de exportación rentables que se pueden aprovechar.',
        consejos:['Los sectores con balanza positiva y creciente son los más atractivos para invertir.','Frutas exóticas, hierbas aromáticas y productos orgánicos tienen alta demanda internacional y buena balanza.','MinCIT publica informes mensuales de comercio exterior agropecuario (www.mincit.gov.co).']
    },
    competitiveness:{
        que_es:'El índice de competitividad agrícola mide qué tan eficiente y productivo es el sector comparado con otros países. En agricultura, los factores clave son rendimientos por hectárea, costos logísticos, acceso a tecnología y calidad institucional.',
        por_que:'Un sector competitivo puede ganar mercados internacionales y sobrevivir frente a importaciones. La competitividad se construye con tecnología, asociatividad y reducción de costos logísticos.',
        consejos:['Asociarse con otros productores reduce costos y aumenta poder de negociación — busca asociaciones en tu municipio o la SAC (www.sac.org.co).','Las BPA (Buenas Prácticas Agrícolas) son requisito para exportar y mejoran la competitividad.','La logística puede representar el 30% del precio final — ubicarte cerca de vías de acceso o plantas de proceso es clave.','El DNP publica el Índice Departamental de Competitividad (www.dnp.gov.co).']
    },
    market_access:{
        que_es:'Los mercados emergentes para productos colombianos incluyen China, Emiratos Árabes, Corea del Sur, India y Asia-Pacífico. Estos mercados tienen creciente clase media con mayor demanda de proteínas y alimentos de calidad.',
        por_que:'Diversificar mercados reduce el riesgo de depender de un solo comprador y abre oportunidades con precios premium para productos colombianos con origen y calidad diferenciada.',
        consejos:['China es el mayor importador mundial de alimentos — es una oportunidad enorme para carne, frutas y café.','Los Emiratos son un hub para reexportar a todo Oriente Medio.','PROCOLOMBIA organiza misiones comerciales a estos mercados (www.procolombia.co) — participa para hacer contactos directos.','El TLC con Corea del Sur ya tiene en vigor preferencias para más de 300 productos agrícolas.']
    },
    logistics:{
        que_es:'Las rutas comerciales agrícolas en Colombia están determinadas por la infraestructura vial, fluvial y portuaria. Los principales puertos de exportación son Buenaventura (Pacífico) y Barranquilla/Cartagena (Atlántico). El país tiene una de las logísticas más costosas de Latinoamérica.',
        por_que:'El costo logístico en Colombia representa hasta el 25% del valor del producto agrícola, comparado con 8-10% en países desarrollados. Reducir estos costos puede ser la diferencia entre ser o no rentable.',
        consejos:['Organiza transporte colectivo con otros productores de tu zona para reducir costos de flete.','Las Centrales de Abastos (Corabastos, Plaza Minorista) tienen sistemas de precios de referencia útiles.','El transporte refrigerado aumenta el precio de venta y reduce pérdidas postcosecha significativamente.','INVIAS informa sobre el estado de vías y proyectos en tu región (www.invias.gov.co).']
    },
    tariffs:{
        que_es:'Los aranceles son impuestos que se cobran a los productos cuando entran a un país. Colombia aplica aranceles del 0% al 20% según el producto. Con los TLC firmados, muchos productos tienen arancel 0% para exportar a EEUU, UE, Canadá y otros.',
        por_que:'Conocer los aranceles te permite identificar en qué mercados tienes ventaja competitiva por los TLC vigentes. También te protege de conocer la competencia de importaciones subsidiadas.',
        consejos:['Consulta el arancel exacto de tu producto en la herramienta MUISCA de la DIAN (www.dian.gov.co/aduana/tarifas).','El Sistema Generalizado de Preferencias (SGP) da acceso preferencial a mercados europeos para pequeños productores.','Los aranceles van a cero gradualmente con los TLC — planifica a futuro con el cronograma del MinCIT.']
    },
    treaties:{
        que_es:'Colombia tiene TLC vigentes con EEUU, UE, Alianza del Pacífico (Chile, México, Perú), Canadá, Israel, Corea del Sur y Costa Rica. Estos acuerdos eliminan o reducen aranceles para cientos de productos agrícolas colombianos, abriendo mercados de más de 1.500 millones de consumidores.',
        por_que:'Los TLC son una ventaja que muchos competidores no tienen. Un productor colombiano de aguacate paga 0% de arancel en EEUU. Conocer qué productos tienen preferencia en cada TLC te da ventaja competitiva.',
        consejos:['TLC con EEUU: aguacate, flores, frutas tropicales y cacao tienen preferencia total.','TLC con UE: café especial, panela, productos orgánicos tienen alta demanda en Europa.','Alianza del Pacífico: facilita exportar a Chile y México sin aranceles.','Consulta el portal de TLC del MinCIT para saber qué aplica a tu producto (www.tlc.gov.co).']
    },
    harvest_area:{
        que_es:'El área cosechada en Colombia supera las 4 millones de hectáreas anuales. Los principales cultivos por área son café (900.000 ha), maíz (700.000 ha), arroz (500.000 ha), caña de azúcar (240.000 ha) y papa (140.000 ha). Agronet publica el Censo Agropecuario con datos exactos por municipio.',
        por_que:'El área cosechada determina la oferta total del producto y por tanto su precio. Cuando muchos productores cosechan al mismo tiempo, los precios bajan. Diversificar cultivos y ciclos de cosecha estabiliza ingresos.',
        consejos:['Consulta las estadísticas EVA (Evaluaciones Agropecuarias) de Agronet para ver área cosechada por municipio (www.agronet.gov.co/estadistica).','Los cultivos permanentes (frutales, cacao, palma) tienen menor volatilidad de precio que los transitorios.','La rotación de cultivos mejora el suelo y reduce plagas naturalmente.','UPRA tiene mapas de aptitud de suelos por región (www.upra.gov.co).']
    },
    planted_area:{
        que_es:'Colombia tiene 114 millones de hectáreas totales, de las cuales solo el 5% se cultiva activamente. El 35% tiene vocación agrícola pero no se está utilizando, representando un enorme potencial. Agronet publica el área sembrada mensualmente por cultivo y departamento.',
        por_que:'Conocer el área sembrada de tu producto en la región te da señales de cuánta competencia habrá en la próxima cosecha y si los precios subirán o bajarán.',
        consejos:['El SIPSA-DANE publica mensualmente datos de área sembrada por departamento (www.dane.gov.co/sipsa).','Agronet del Ministerio de Agricultura tiene calendarios de siembra por región (www.agronet.gov.co/estadistica).','Antes de sembrar, revisa qué están sembrando tus vecinos para no saturar el mercado local.']
    },
    yield_forecast:{
        que_es:'El rendimiento agrícola mide cuánto producto se obtiene por unidad de área. Colombia tiene rendimientos muy inferiores al promedio mundial: maíz produce 2 ton/ha vs 10 ton/ha en EEUU; papa produce 20 ton/ha vs 45 en Holanda. AGROSAVIA tiene paquetes tecnológicos para mejorar rendimientos.',
        por_que:'Aumentar el rendimiento sin aumentar el área es la forma más eficiente de crecer. Un productor que pasa de 2 a 4 ton/ha duplica sus ingresos con los mismos costos fijos de tierra y maquinaria.',
        consejos:['El uso de semilla certificada puede aumentar rendimientos entre 30% y 80%.','La fertilización técnica basada en análisis de suelo evita el desperdicio y mejora rendimientos.','El riego tecnificado (goteo, aspersión) puede duplicar los rendimientos en zonas con sequía.','AGROSAVIA ofrece asistencia técnica y variedades mejoradas adaptadas al clima colombiano (www.agrosavia.co).']
    },
    future_estimates:{
        que_es:'Las estimaciones futuras del sector agropecuario colombiano proyectan: demanda de alimentos +25% para 2030, mayor demanda de proteína animal en ciudades, crecimiento del mercado de alimentos orgánicos y funcionales, y aumento de la agro-exportación de frutas y cacao.',
        por_que:'Planificar con base en tendencias futuras te permite posicionarte antes que la competencia en mercados que van a crecer. Los productores que se anticipan capturan los mejores precios y contratos.',
        consejos:['El aguacate Hass, arándano, cacao y hierbas aromáticas tienen las mejores perspectivas de precio a futuro.','La producción orgánica certificada tiene demanda creciente con precios premium del 20-40%.','La acuicultura (tilapia, camarón, trucha) es uno de los sectores con mayor proyección en Colombia.','Consulta la UPRA para proyecciones de demanda y aptitud de suelos (www.upra.gov.co).']
    },
    postharvest_losses:{
        que_es:'Colombia pierde entre el 30% y el 40% de los alimentos producidos después de la cosecha — una de las tasas más altas de Latinoamérica. Las pérdidas ocurren por mal manejo, transporte inadecuado, falta de cadena de frío y empaque deficiente.',
        por_que:'Reducir pérdidas postcosecha es equivalente a aumentar la producción sin sembrar más. Si pierdes el 35% de tu cosecha y lo reduces al 15%, eso es un 20% más de producto para vender.',
        consejos:['Cosechar en horas frescas (mañana temprano) reduce el daño por calor.','El preenfriamiento (sumergir en agua fría) prolonga la vida útil de frutas y verduras.','Empaques adecuados (canastillas, no costales) reducen golpes y magullamiento.','SENA ofrece cursos gratuitos de manejo postcosecha en todo el país (www.sena.edu.co).','La cámara de frío puede ser compartida entre varios productores para reducir costos.']
    },
    stock:{
        que_es:'El stock agropecuario incluye productos almacenados en silos, bodegas, cámaras frías y plantas de proceso. En Colombia la capacidad es limitada — la mayoría vende al momento de la cosecha, cuando los precios son más bajos por exceso de oferta.',
        por_que:'Quien puede almacenar, puede vender cuando el precio es mayor. Los meses de cosecha tienen precios 20-40% más bajos que los meses de escasez. El almacenamiento es una herramienta financiera poderosa.',
        consejos:['ALMACAFÉ y otros almacenes generales de depósito permiten almacenar y recibir crédito con el producto como garantía (www.almacafe.com.co).','El certificado de depósito te permite vender el producto en la Bolsa Mercantil de Colombia.','Para granos, el silo metálico familiar (5-10 toneladas) tiene retorno de inversión en 1-2 temporadas.','Monitorea precios históricos del SIPSA para identificar en qué mes suelen ser más altos en tu región.']
    },
    farmers_count:{
        que_es:'Colombia tiene aproximadamente 2.7 millones de productores agropecuarios, el 70% con menos de 5 hectáreas. El sector emplea directamente a 3.5 millones e indirectamente a más de 7 millones. Los departamentos con más productores son Boyacá, Cundinamarca, Nariño, Cauca y Antioquia.',
        por_que:'El tamaño del sector y su estructura determinan las políticas de apoyo disponibles. Registrarse y ser visible como productor es el primer paso para acceder a programas de gobierno.',
        consejos:['Regístrate en el SISA para ser elegible a programas de apoyo y tener historial productivo formal (www.minagricultura.gov.co).','Las asociaciones de productores tienen mayor poder de negociación y acceso a programas especiales.','El Censo Nacional Agropecuario del DANE es la base de datos que usa el gobierno para asignar recursos (www.dane.gov.co).']
    },
    pests_risk:{
        que_es:'Las plagas más críticas en Colombia actualmente son: la roya del café (Hemileia vastatrix), la sigatoka negra en banano, el gusano cogollero en maíz, la mosca de la fruta, el minador de la hoja en cítricos y el picudo negro en palma de aceite. El ICA opera el SIVIFITO para monitorearlas.',
        por_que:'Una plaga no controlada puede destruir entre el 30% y el 100% de una cosecha. El manejo preventivo es siempre más barato que el curativo y evita el uso excesivo de pesticidas que aumenta costos.',
        consejos:['ICA tiene el SIVIFITO con alertas fitosanitarias por departamento — suscríbete en ica.gov.co/alertas.','El Manejo Integrado de Plagas (MIP) combina control biológico, cultural y químico, reduciendo costos hasta 40%.','Los controladores biológicos (Trichoderma, Beauveria) son más económicos y no generan resistencia.','Reporta plagas nuevas al ICA inmediatamente — hay programas de erradicación subsidiados.','AGROSAVIA tiene paquetes tecnológicos de manejo de plagas por cultivo (www.agrosavia.co).']
    },
    diseases:{
        que_es:'Las principales enfermedades en el agro colombiano son: Fiebre Aftosa (bovinos — en proceso de erradicación), Brucelosis bovina, New Castle en aves, Fiebre Porcina, Antracnosis en frutas, Marchitez del plátano (Fusarium) y enfermedades del suelo en papa. El ICA coordina los planes nacionales.',
        por_que:'Las enfermedades animales y vegetales pueden devastar una explotación y generar restricciones de exportación para todo el país. La prevención mediante vacunación y bioseguridad es obligatoria en muchos casos.',
        consejos:['Aftosa y Brucelosis: la vacunación es OBLIGATORIA — el ICA hace operativos gratuitos dos veces al año (www.ica.gov.co).','Registra tu predio en el ICA para acceder a asistencia técnica veterinaria gratuita.','FEDEGÁN tiene programas de salud animal con asistencia técnica para ganaderos (www.fedegan.org.co).','Bioseguridad: controla el ingreso de animales externos a tu finca — es la principal vía de entrada de enfermedades.']
    },
    pest_impact:{
        que_es:'El impacto económico de plagas y enfermedades en Colombia supera los COP 3 billones anuales. La roya del café generó pérdidas de USD 300 millones en 2012. El gusano cogollero puede destruir hasta el 40% de la cosecha de maíz en algunas zonas.',
        por_que:'Cuantificar el impacto justifica la inversión en prevención. Gastar COP 200.000 en control preventivo puede evitar pérdidas de COP 2.000.000 — un retorno de 10 veces la inversión.',
        consejos:['Seguros agropecuarios cubren pérdidas por plagas — el gobierno subsidia parte de la prima (www.finagro.com.co/seguro-agropecuario).','Haz un análisis costo-beneficio antes de aplicar pesticidas — no siempre el control químico es rentable.','Lleva un registro de incidencia de plagas por temporada para anticiparte año a año.','AGROSAVIA tiene paquetes tecnológicos de manejo de plagas por cultivo (www.agrosavia.co).']
    }
};

/* ─────────────────────────────────────
   gdRender: editorial + datos WB + fuentes colombianas
───────────────────────────────────── */
function gdRender(api){
    var key=api?api._key:null;
    var info=key&&CONTENT[key]?CONTENT[key]:null;
    var data=api?api.data:null;
    var fuentes=api&&api.fuentes?api.fuentes:[];
    var html='';

    /* BLOQUE 1: Contenido editorial */
    if(info){
        html+='<div class="ginfo-block">';
        html+='<div class="ginfo-section"><div class="ginfo-label"><i class="fa-solid fa-circle-question"></i> ¿Qué es?</div><p class="ginfo-text">'+info.que_es+'</p></div>';
        html+='<div class="ginfo-section"><div class="ginfo-label"><i class="fa-solid fa-lightbulb"></i> ¿Por qué importa?</div><p class="ginfo-text">'+info.por_que+'</p></div>';
        html+='<div class="ginfo-section"><div class="ginfo-label"><i class="fa-solid fa-list-check"></i> Consejos prácticos</div><ul class="ginfo-tips">';
        for(var i=0;i<info.consejos.length;i++) html+='<li><i class="fa-solid fa-leaf"></i>'+info.consejos[i]+'</li>';
        html+='</ul></div></div>';
    }

    /* BLOQUE 2: Datos reales del Banco Mundial */
    if(data&&typeof data==='object'&&Object.keys(data).length>0){
        var fwb=data.fuente_wb||data.fuente||null;
        var rows='',keys=Object.keys(data);
        for(var i=0;i<keys.length;i++){
            var k=keys[i];
            if(k==='fuente_wb'||k==='fuente'||k==='nota') continue;
            rows+='<tr><td class="gd-k">'+k.replace(/_/g,' ')+'</td><td class="gd-v">'+(data[k]!==null&&data[k]!==undefined?data[k]:'—')+'</td></tr>';
        }
        if(rows){
            html+='<div class="gdata-block">';
            html+='<div class="gdata-header"><i class="fa-solid fa-chart-bar"></i> Datos reales — Colombia (Banco Mundial)</div>';
            if(fwb) html+='<div class="gdata-source"><i class="fa-solid fa-globe"></i> '+fwb+'</div>';
            html+='<table class="gdata-table"><tbody>'+rows+'</tbody></table>';
            html+='</div>';
        }
    }

    /* BLOQUE 3: Fuentes colombianas especializadas (Agronet/SIPSA/ICA) */
    html+='<div class="gfuentes-block">';
    html+='<div class="gfuentes-header"><i class="fa-solid fa-database"></i> Fuentes colombianas especializadas</div>';
    html+='<p class="gfuentes-nota">Los indicadores del Banco Mundial son macro. Para precios exactos, áreas y rendimientos por cultivo y departamento, consulta estas fuentes oficiales colombianas:</p>';
    if(fuentes&&fuentes.length>0){
        for(var i=0;i<fuentes.length;i++){
            var f=fuentes[i];
            html+='<div class="gfuente-item"><i class="fa-solid '+f.ico+'"></i><span>'+f.txt+' &mdash; <strong>'+f.url+'</strong></span></div>';
        }
    }
    html+='<div class="gfuente-item sipsa"><i class="fa-solid fa-store"></i><span>SIPSA-DANE — Precios semanales en 90+ plazas mayoristas de Colombia, actualizados cada semana &mdash; <strong>www.dane.gov.co/sipsa</strong></span></div>';
    html+='<div class="gfuente-item agronet"><i class="fa-solid fa-seedling"></i><span>Agronet MADR — Área, producción, rendimiento y precios por cultivo, municipio y año &mdash; <strong>www.agronet.gov.co/estadistica</strong></span></div>';
    html+='</div>';

    if(!html) return '<p class="gp-empty"><i class="fa-solid fa-circle-info"></i> Información no disponible en este momento.</p>';
    return html;
}

/* ─────────────────────────────────────
   buildGrid
───────────────────────────────────── */
function buildGrid(){
    var grid=document.getElementById('ganaderoGrid');
    if(!grid) return;
    var groups={};
    for(var i=0;i<CATS.length;i++){var c=CATS[i];if(!groups[c.group])groups[c.group]=[];groups[c.group].push(c);}
    var html='',gkeys=Object.keys(groups);
    for(var g=0;g<gkeys.length;g++){
        var gn=gkeys[g],m=GM[gn]||GM['Producción'],cats=groups[gn];
        html+='<div class="ggroup"><h3 class="ggroup-title" style="color:'+m.color+'"><span class="ggroup-dot" style="background:'+m.color+'"></span>'+gn+'</h3><div class="gcards">';
        for(var c=0;c<cats.length;c++){
            var cat=cats[c];
            html+='<div class="gcat" data-key="'+cat.key+'" style="--gc:'+m.color+';--gb:'+m.bg+';--gbr:'+m.border+'"><span class="gcat-icon"><i class="fa-solid '+cat.icon+'"></i></span><span class="gcat-title">'+cat.title+'</span><i class="fa-solid fa-chevron-right gcat-arrow"></i></div>';
        }
        html+='</div></div>';
    }
    grid.innerHTML=html;
    /* El grid empieza OCULTO */
    grid.style.display='none';
    var cards=grid.querySelectorAll('.gcat');
    for(var i=0;i<cards.length;i++){(function(card){card.addEventListener('click',function(){
        var key=card.dataset.key,cat=null;
        for(var j=0;j<CATS.length;j++){if(CATS[j].key===key){cat=CATS[j];break;}}
        if(cat) openPanel(cat,card);
    });})(cards[i]);}
}

/* ─────────────────────────────────────
   openPanel / closePanel
───────────────────────────────────── */
function openPanel(cat,cardEl){
    var panel=document.getElementById('ganaderoPanel'),m=GM[cat.group]||GM['Producción'];
    if(activePK===cat.key){closePanel();return;}
    activePK=cat.key;
    var all=document.querySelectorAll('.gcat');
    for(var i=0;i<all.length;i++) all[i].classList.remove('gcat-active');
    if(cardEl) cardEl.classList.add('gcat-active');
    var ico=document.getElementById('gpanelIcon');
    ico.className='fa-solid '+cat.icon; ico.style.color=m.color;
    document.getElementById('gpanelTitle').textContent=cat.title;
    document.getElementById('gpanelBody').innerHTML='<div class="gp-loading"><i class="fa-solid fa-circle-notch fa-spin"></i> Consultando fuentes colombianas...</div>';
    panel.style.display=''; panel.style.borderColor=m.border;
    setTimeout(function(){panel.scrollIntoView({behavior:'smooth',block:'nearest'});},150);
    gdFetch(cat.key).then(function(api){document.getElementById('gpanelBody').innerHTML=gdRender(api);});
}

function closePanel(){
    activePK=null;
    var all=document.querySelectorAll('.gcat');
    for(var i=0;i<all.length;i++) all[i].classList.remove('gcat-active');
    document.getElementById('ganaderoPanel').style.display='none';
}

/* ─────────────────────────────────────
   runSearch
───────────────────────────────────── */
function runSearch(q){
    var grid=document.getElementById('ganaderoGrid'),
        results=document.getElementById('searchResults'),
        status=document.getElementById('searchStatus'),
        clrBtn=document.getElementById('searchClear'),
        hint=document.getElementById('searchHint');
    q=q.trim().toLowerCase();
    clrBtn.style.display=q?'':'none';
    if(!q){
        grid.style.display='none'; results.style.display='none'; results.innerHTML='';
        status.innerHTML=''; if(hint) hint.style.display=''; closePanel(); return;
    }
    if(hint) hint.style.display='none';
    var found=[];
    for(var i=0;i<CATS.length;i++){
        var c=CATS[i];
        if(c.title.toLowerCase().indexOf(q)!==-1||c.group.toLowerCase().indexOf(q)!==-1||c.key.toLowerCase().indexOf(q)!==-1) found.push(c);
    }
    grid.style.display='none';
    closePanel();
    if(!found.length){
        status.innerHTML='<i class="fa-solid fa-circle-info"></i> Sin resultados para "<strong>'+q+'</strong>"';
        results.style.display='none'; results.innerHTML=''; return;
    }
    status.innerHTML='<i class="fa-solid fa-check-circle" style="color:#7eb83a"></i> <strong>'+found.length+'</strong> resultado'+(found.length!==1?'s':'')+' para "<strong>'+q+'</strong>"';
    var re=new RegExp('('+q.replace(/[.*+?^${}()|[\]\\]/g,'\\$&')+')','gi'),html='';
    for(var i=0;i<found.length;i++){
        var cat=found[i],m=GM[cat.group]||GM['Producción'],
            ttl=cat.title.replace(re,'<mark class="gmark">$1</mark>');
        html+='<div class="gresult" data-key="'+cat.key+'" style="animation-delay:'+(i*0.055)+'s">';
        html+='<div class="gresult-hd"><span class="gresult-ico" style="color:'+m.color+';background:'+m.bg+';border-color:'+m.border+'"><i class="fa-solid '+cat.icon+'"></i></span>';
        html+='<div class="gresult-info"><span class="gresult-ttl">'+ttl+'</span><span class="gresult-grp" style="color:'+m.color+'">'+cat.group+'</span></div>';
        html+='<button class="gresult-btn">Ver datos <i class="fa-solid fa-chevron-down gresult-chev"></i></button></div>';
        html+='<div class="gresult-body" style="display:none"></div></div>';
    }
    results.innerHTML=html; results.style.display='';
    var rows=results.querySelectorAll('.gresult');
    for(var i=0;i<rows.length;i++){(function(row){
        var key=row.dataset.key,cat=null;
        for(var j=0;j<CATS.length;j++){if(CATS[j].key===key){cat=CATS[j];break;}}
        var hd=row.querySelector('.gresult-hd'),body=row.querySelector('.gresult-body'),
            chev=row.querySelector('.gresult-chev'),btn=row.querySelector('.gresult-btn'),loaded=false;
        hd.addEventListener('click',function(){
            var isOpen=body.style.display!=='none';
            var ab=results.querySelectorAll('.gresult-body'),ac=results.querySelectorAll('.gresult-chev'),abt=results.querySelectorAll('.gresult-btn');
            for(var k=0;k<ab.length;k++) ab[k].style.display='none';
            for(var k=0;k<ac.length;k++) ac[k].style.transform='';
            for(var k=0;k<abt.length;k++) abt[k].classList.remove('active');
            if(!isOpen){
                body.style.display=''; chev.style.transform='rotate(180deg)'; btn.classList.add('active');
                if(!loaded){
                    body.innerHTML='<div class="gp-loading"><i class="fa-solid fa-circle-notch fa-spin"></i> Consultando fuentes colombianas...</div>';
                    gdFetch(cat.key).then(function(api){body.innerHTML=gdRender(api);loaded=true;});
                }
            }
        });
    })(rows[i]);}
}

/* ─────────────────────────────────────
   Init buscador + chips
───────────────────────────────────── */
(function(){
    buildGrid();
    var input=document.getElementById('agroSearch'),
        clrBtn=document.getElementById('searchClear'),
        clsBtn=document.getElementById('gpanelClose');
    input.addEventListener('input',function(){runSearch(input.value);});
    clrBtn.addEventListener('click',function(){input.value='';runSearch('');input.focus();});
    clsBtn.addEventListener('click',closePanel);
    var chips=document.querySelectorAll('.gchip');
    for(var i=0;i<chips.length;i++){(function(chip){chip.addEventListener('click',function(){
        input.value=chip.dataset.q; runSearch(chip.dataset.q);
        var all=document.querySelectorAll('.gchip');
        for(var j=0;j<all.length;j++) all[j].classList.remove('active');
        chip.classList.add('active');
    });})(chips[i]);}
    var verTodoBtn=document.getElementById('chipVerTodo');
    if(verTodoBtn){
        verTodoBtn.addEventListener('click',function(){
            input.value=''; runSearch('');
            var hint=document.getElementById('searchHint');
            if(hint) hint.style.display='none';
            document.getElementById('ganaderoGrid').style.display='';
            var all=document.querySelectorAll('.gchip');
            for(var j=0;j<all.length;j++) all[j].classList.remove('active');
            verTodoBtn.classList.add('active');
        });
    }
})();

/* 6. OBSERVATORIO DE PRECIOS */
(function(){
    var products=[
        {key:'maiz',label:'Maíz',color:'#f4c430',icon:'🌽'},
        {key:'cafe',label:'Café',color:'#c77dff',icon:'☕'},
        {key:'leche',label:'Leche',color:'#60a5fa',icon:'🥛'},
        {key:'pollo',label:'Pollo',color:'#fb7185',icon:'🐔'}
    ];
    var container=document.getElementById('productCards'),chartInst=null,activeCard=null;
    for(var i=0;i<products.length;i++){(function(prod){
        var card=document.createElement('div');
        card.className='precio-card';
        card.innerHTML='<div class="precio-icon">'+prod.icon+'</div><h3>'+prod.label+'</h3><p id="pp-'+prod.key+'" class="precio-val">Precio: —</p><p id="pu-'+prod.key+'" class="precio-unit">Unidad: —</p><p id="pc-'+prod.key+'" class="precio-chg">Variación: —</p>';
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
                chgEl.style.color=change>=0?'#7eb83a':'#fb7185';
                var labels=['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'];
                var base=price!=='N/A'?price:200;
                var values=labels.map(function(){return Math.round(base*(0.78+Math.random()*0.62));});
                var ctx=document.getElementById('pricesChart').getContext('2d');
                if(chartInst) chartInst.destroy();
                chartInst=new Chart(ctx,{type:'line',data:{labels:labels,datasets:[{label:prod.label+' — USD/ton',data:values,borderColor:prod.color,backgroundColor:prod.color+'22',pointBackgroundColor:prod.color,pointRadius:5,pointHoverRadius:8,fill:true,tension:0.42,borderWidth:2.5}]},options:{responsive:true,plugins:{legend:{labels:{color:'#9aab82',font:{family:'DM Sans',size:13}}},tooltip:{backgroundColor:'#0e0f0b',borderColor:prod.color,borderWidth:1}},scales:{x:{ticks:{color:'#5c6b4a'},grid:{color:'rgba(126,184,58,.08)'}},y:{ticks:{color:'#5c6b4a'},grid:{color:'rgba(126,184,58,.08)'}}}}});
            })
            .catch(function(e){console.error('Precios:',e);});
    }
    var firstCard=container.querySelector('.precio-card');
    if(firstCard) loadProduct(products[0],firstCard);
})();


</script>

</body>
</html>
</button>
@endsection