@extends('layouts.app')

@section('content')

    <button id="scrollTopBtn" class="scroll-top-btn" aria-label="Volver arriba">
        <i class="fas fa-arrow-up"></i>
    </button>

    <div class="main-content-container">

        {{-- ══════════════════════════════════════
             HERO SECTION
        ══════════════════════════════════════ --}}
        <div class="hero-section fade-in">
            <div class="hero-badge">
                <i class="fas fa-egg"></i> Avicultura
            </div>
            <div class="hero-text">
                <h1>Aves de Corral</h1>
                <p class="hero-subtitle">Guía completa para pequeños y medianos productores</p>
                <div class="hero-stats">
                    <div class="hero-stat">
                        <span class="stat-num">300</span>
                        <span class="stat-label">Huevos/año</span>
                    </div>
                    <div class="hero-stat">
                        <span class="stat-num">18</span>
                        <span class="stat-label">Semanas inicio puesta</span>
                    </div>
                    <div class="hero-stat">
                        <span class="stat-num">5m²</span>
                        <span class="stat-label">Espacio pastoreo</span>
                    </div>
                </div>
            </div>
            <img
                src="https://certifiedhumanelatino.org/wp-content/uploads/2021/11/Design-sem-nome-2.png"
                alt="Gallinas"
                class="hero-img"
                onerror="this.onerror=null;this.src='https://placehold.co/220x220/1b1b1b/8ac926?text=🐔';"
            />
        </div>

        {{-- ══════════════════════════════════════
             TABS DE NAVEGACIÓN
        ══════════════════════════════════════ --}}
        <div class="tabs-nav fade-in">
            <button class="tab-btn active" onclick="switchTab('general')"><i class="fas fa-info-circle"></i> General</button>
            <button class="tab-btn" onclick="switchTab('razas')"><i class="fas fa-list"></i> Razas</button>
            <button class="tab-btn" onclick="switchTab('alimentacion')"><i class="fas fa-wheat-awn"></i> Alimentación</button>
            <button class="tab-btn" onclick="switchTab('sanidad')"><i class="fas fa-syringe"></i> Sanidad</button>
            <button class="tab-btn" onclick="switchTab('instalaciones')"><i class="fas fa-home"></i> Instalaciones</button>
            <button class="tab-btn" onclick="switchTab('economia')"><i class="fas fa-coins"></i> Economía</button>
        </div>

        <div class="content-grid">
            <div class="main-column">

                {{-- ══ TAB: GENERAL ══ --}}
                <div id="tab-general" class="tab-content active">

                    <div class="card fade-in">
                        <img
                            src="https://bogota.gov.co/sites/default/files/inline-images/gallinas-2_0.jpeg"
                            alt="Gallinas en campo"
                            class="card-img"
                            onerror="this.onerror=null;this.src='https://placehold.co/700x300/1b1b1b/8ac926?text=Gallinas+en+campo';"
                        >
                        <h3><i class="fas fa-feather-alt"></i> ¿Por qué criar gallinas?</h3>
                        <p>Las gallinas son una de las apuestas más rentables para el pequeño y mediano productor colombiano. Ofrecen un retorno constante en forma de huevos, carne y abono orgánico, con una inversión inicial moderada y un ciclo productivo rápido.</p>
                        <p>En regiones como el Cauca, Nariño y Antioquia, miles de familias campesinas basan parte de su seguridad alimentaria en la producción avícola de traspatio, integrándola con cultivos y ganadería.</p>

                        <div class="info-grid">
                            <div class="info-box">
                                <i class="fas fa-check-double"></i>
                                <strong>Ventajas</strong>
                                <ul>
                                    <li>Ciclo productivo corto</li>
                                    <li>Alta demanda del mercado</li>
                                    <li>Abono de alta calidad</li>
                                    <li>Fácil integración con cultivos</li>
                                </ul>
                            </div>
                            <div class="info-box info-box--warn">
                                <i class="fas fa-exclamation-triangle"></i>
                                <strong>Retos</strong>
                                <ul>
                                    <li>Control sanitario constante</li>
                                    <li>Costo de alimento balanceado</li>
                                    <li>Variación del precio del huevo</li>
                                    <li>Predadores en campo abierto</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="card fade-in">
                        <h3><i class="fas fa-brain"></i> Curiosidades</h3>
                        <div class="curiosity-grid">
                            <div class="curiosity-item">
                                <i class="fas fa-brain"></i>
                                <p>Reconocen hasta <strong>100 rostros</strong> humanos distintos.</p>
                            </div>
                            <div class="curiosity-item">
                                <i class="fas fa-microphone-alt"></i>
                                <p>Se comunican con más de <strong>30 vocalizaciones</strong> diferentes.</p>
                            </div>
                            <div class="curiosity-item">
                                <i class="fas fa-bed"></i>
                                <p>Son capaces de <strong>soñar</strong> durante el sueño REM.</p>
                            </div>
                            <div class="curiosity-item">
                                <i class="fas fa-crown"></i>
                                <p>Forman jerarquías sociales: la famosa <strong>"gallina alfa"</strong>.</p>
                            </div>
                            <div class="curiosity-item">
                                <i class="fas fa-eye"></i>
                                <p>Visión tetracromática: ven colores que los humanos <strong>no perciben</strong>.</p>
                            </div>
                            <div class="curiosity-item">
                                <i class="fas fa-heart"></i>
                                <p>Las ponedoras felices producen <strong>huevos más nutritivos</strong>.</p>
                            </div>
                        </div>
                    </div>

                    <div class="card fade-in">
                        <h3><i class="fas fa-play-circle"></i> Videos recomendados</h3>
                        <div class="video-grid">
                            <div class="video-item">
                                <p class="video-title"><i class="fas fa-hammer"></i> Cómo construir un gallinero</p>
                                <iframe
                                    title="Como construir un gallinero"
                                    src="https://www.youtube.com/embed/er1d3U2PGMo"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen loading="lazy">
                                </iframe>
                            </div>
                            <div class="video-item">
                                <p class="video-title"><i class="fas fa-egg"></i> Crianza de gallinas ponedoras</p>
                                <iframe
                                    title="Crianza de gallinas ponedoras"
                                    src="https://www.youtube.com/embed/dzUGFP2upVA"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen loading="lazy">
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ══ TAB: RAZAS ══ --}}
                <div id="tab-razas" class="tab-content">
                    <div class="card fade-in">
                        <h3><i class="fas fa-list-alt"></i> Razas según tu objetivo</h3>
                        <p>Elegir la raza correcta es el primer paso hacia una producción rentable. Aquí las más utilizadas en Colombia:</p>

                        <div class="breed-table-wrapper">
                            <table class="breed-table">
                                <thead>
                                    <tr>
                                        <th>Raza</th>
                                        <th>Tipo</th>
                                        <th>Huevos/año</th>
                                        <th>Peso adulto</th>
                                        <th>Temperamento</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Isa Brown</strong></td>
                                        <td><span class="badge badge--green">Postura</span></td>
                                        <td>300–320</td>
                                        <td>2.0 kg</td>
                                        <td>Tranquila</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Lohmann Brown</strong></td>
                                        <td><span class="badge badge--green">Postura</span></td>
                                        <td>290–310</td>
                                        <td>2.1 kg</td>
                                        <td>Dócil</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Rhode Island Red</strong></td>
                                        <td><span class="badge badge--yellow">Doble propósito</span></td>
                                        <td>200–280</td>
                                        <td>3.5 kg</td>
                                        <td>Activa</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Plymouth Rock</strong></td>
                                        <td><span class="badge badge--yellow">Doble propósito</span></td>
                                        <td>180–200</td>
                                        <td>3.8 kg</td>
                                        <td>Calmada</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Ross 308</strong></td>
                                        <td><span class="badge badge--orange">Carne (Broiler)</span></td>
                                        <td>—</td>
                                        <td>2.5 kg (42 días)</td>
                                        <td>Sedentaria</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Cobb 500</strong></td>
                                        <td><span class="badge badge--orange">Carne (Broiler)</span></td>
                                        <td>—</td>
                                        <td>2.7 kg (42 días)</td>
                                        <td>Sedentaria</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Criollo / Patio</strong></td>
                                        <td><span class="badge badge--blue">Traspatio</span></td>
                                        <td>80–120</td>
                                        <td>2.0–2.5 kg</td>
                                        <td>Rústica</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="tip-box">
                            <i class="fas fa-lightbulb"></i>
                            <div>
                                <strong>Consejo:</strong> Para sistemas de traspatio o pastoreo semi-intensivo en clima cálido, las razas de doble propósito como la Rhode Island Red son más resistentes y versátiles que las líneas comerciales de postura.
                            </div>
                        </div>
                    </div>

                    <div class="card fade-in">
                        <h3><i class="fas fa-thermometer-half"></i> Razas según el clima</h3>
                        <div class="climate-grid">
                            <div class="climate-card">
                                <div class="climate-icon">🌡️</div>
                                <h4>Clima cálido (&lt;1.500 msnm)</h4>
                                <ul class="styled-list">
                                    <li><i class="fas fa-check-circle text-accent"></i> Rhode Island Red</li>
                                    <li><i class="fas fa-check-circle text-accent"></i> Isa Brown</li>
                                    <li><i class="fas fa-check-circle text-accent"></i> Criollo de patio</li>
                                </ul>
                            </div>
                            <div class="climate-card">
                                <div class="climate-icon">🌤️</div>
                                <h4>Clima templado (1.500–2.200 msnm)</h4>
                                <ul class="styled-list">
                                    <li><i class="fas fa-check-circle text-accent"></i> Lohmann Brown</li>
                                    <li><i class="fas fa-check-circle text-accent"></i> Plymouth Rock</li>
                                    <li><i class="fas fa-check-circle text-accent"></i> Rhode Island Red</li>
                                </ul>
                            </div>
                            <div class="climate-card">
                                <div class="climate-icon">❄️</div>
                                <h4>Clima frío (&gt;2.200 msnm)</h4>
                                <ul class="styled-list">
                                    <li><i class="fas fa-check-circle text-accent"></i> Plymouth Rock</li>
                                    <li><i class="fas fa-check-circle text-accent"></i> Sussex</li>
                                    <li><i class="fas fa-check-circle text-accent"></i> Wyandotte</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ══ TAB: ALIMENTACIÓN ══ --}}
                <div id="tab-alimentacion" class="tab-content">
                    <div class="card fade-in">
                        <h3><i class="fas fa-wheat-awn"></i> Etapas de alimentación</h3>
                        <p>La nutrición varía según la etapa productiva. Nunca mezclar alimentos de iniciación con los de puesta, ya que los niveles de calcio son muy diferentes.</p>

                        <div class="stage-timeline">
                            <div class="stage-item">
                                <div class="stage-dot">1</div>
                                <div class="stage-body">
                                    <h4>Pollita (0–8 semanas)</h4>
                                    <p>Iniciador con 20–22% proteína. Agua limpia a libre acceso. Temperatura del galpón: 32°C semana 1, reducir 3°C/semana.</p>
                                </div>
                            </div>
                            <div class="stage-item">
                                <div class="stage-dot">2</div>
                                <div class="stage-body">
                                    <h4>Levante (8–18 semanas)</h4>
                                    <p>Crecimiento con 15–17% proteína. Controlar el peso semanal para llegar a la puesta con el peso ideal de raza.</p>
                                </div>
                            </div>
                            <div class="stage-item">
                                <div class="stage-dot">3</div>
                                <div class="stage-body">
                                    <h4>Prepostura (18–20 semanas)</h4>
                                    <p>Transición al alimento de postura. Aumentar calcio gradualmente para preparar el aparato reproductor.</p>
                                </div>
                            </div>
                            <div class="stage-item">
                                <div class="stage-dot">4</div>
                                <div class="stage-body">
                                    <h4>Postura (20–72 semanas)</h4>
                                    <p>Postura con 16–18% proteína y 3.5–4% calcio. Consumo promedio: 110–120 g/ave/día. Maximizar producción de huevo.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card fade-in">
                        <h3><i class="fas fa-leaf"></i> Alternativas locales para reducir costos</h3>
                        <p>En Colombia es posible sustituir hasta un 30% del concentrado comercial con materias primas regionales:</p>
                        <div class="info-grid">
                            <div class="info-box">
                                <i class="fas fa-seedling"></i>
                                <strong>Fuentes energéticas</strong>
                                <ul>
                                    <li>Maíz amarillo (energía principal)</li>
                                    <li>Yuca deshidratada</li>
                                    <li>Sorgo</li>
                                    <li>Plátano verde rallado</li>
                                </ul>
                            </div>
                            <div class="info-box">
                                <i class="fas fa-dumbbell"></i>
                                <strong>Fuentes proteicas</strong>
                                <ul>
                                    <li>Torta de soja</li>
                                    <li>Harina de pescado</li>
                                    <li>Lombriz californiana</li>
                                    <li>Larvas de mosca soldado (BSF)</li>
                                </ul>
                            </div>
                        </div>

                        <div class="tip-box tip-box--warn">
                            <i class="fas fa-ban"></i>
                            <div>
                                <strong>Alimentos prohibidos:</strong> Cebolla, ajo en exceso, aguacate, cáscaras de cítrico, alimentos con sal, restos de carne cruda, cualquier alimento mohoso o fermentado.
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ══ TAB: SANIDAD ══ --}}
                <div id="tab-sanidad" class="tab-content">
                    <div class="card fade-in">
                        <h3><i class="fas fa-shield-virus"></i> Enfermedades más comunes</h3>
                        <div class="disease-list">
                            <div class="disease-item">
                                <div class="disease-header">
                                    <span class="disease-name">Newcastle</span>
                                    <span class="severity severity--high">Alto riesgo</span>
                                </div>
                                <p><strong>Síntomas:</strong> Descarga nasal, dificultad respiratoria, diarrea verde, torticolis, mortalidad alta.</p>
                                <p><strong>Prevención:</strong> Vacunación a los 7, 21 y 60 días. Revacunar cada 3 meses en zonas endémicas.</p>
                            </div>
                            <div class="disease-item">
                                <div class="disease-header">
                                    <span class="disease-name">Marek</span>
                                    <span class="severity severity--high">Alto riesgo</span>
                                </div>
                                <p><strong>Síntomas:</strong> Parálisis de patas y alas, tumores en órganos internos, mortalidad en jóvenes.</p>
                                <p><strong>Prevención:</strong> Vacunar al día de vida. No tiene tratamiento, solo prevención.</p>
                            </div>
                            <div class="disease-item">
                                <div class="disease-header">
                                    <span class="disease-name">Gumboro (IBD)</span>
                                    <span class="severity severity--med">Riesgo medio</span>
                                </div>
                                <p><strong>Síntomas:</strong> Depresión, diarrea blanquecina, temblores, afecta la bursa de Fabricio (inmunidad).</p>
                                <p><strong>Prevención:</strong> Vacunar a los 14 y 21 días con cepa intermedia.</p>
                            </div>
                            <div class="disease-item">
                                <div class="disease-header">
                                    <span class="disease-name">Bronquitis Infecciosa</span>
                                    <span class="severity severity--med">Riesgo medio</span>
                                </div>
                                <p><strong>Síntomas:</strong> Tos, jadeo, reducción de postura, huevos deformes.</p>
                                <p><strong>Prevención:</strong> Vacunación H120 a los 7 días, H52 a las 4 semanas.</p>
                            </div>
                            <div class="disease-item">
                                <div class="disease-header">
                                    <span class="disease-name">Coccidiosis</span>
                                    <span class="severity severity--low">Manejo regular</span>
                                </div>
                                <p><strong>Síntomas:</strong> Diarrea con sangre, pérdida de peso, plumas erizadas.</p>
                                <p><strong>Prevención:</strong> Cama seca, no hacinamiento, coccidiostatos en el alimento o agua.</p>
                            </div>
                        </div>
                    </div>

                    <div class="card fade-in">
                        <h3><i class="fas fa-calendar-check"></i> Calendario sanitario básico</h3>
                        <div class="vaccine-timeline">
                            <div class="vac-row"><span class="vac-day">Día 1</span><span class="vac-name">Marek (en incubadora)</span></div>
                            <div class="vac-row"><span class="vac-day">Día 7</span><span class="vac-name">Newcastle B1 + Bronquitis H120 (ocular)</span></div>
                            <div class="vac-row"><span class="vac-day">Día 14</span><span class="vac-name">Gumboro cepa intermedia (agua)</span></div>
                            <div class="vac-row"><span class="vac-day">Día 21</span><span class="vac-name">Gumboro refuerzo + Newcastle La Sota</span></div>
                            <div class="vac-row"><span class="vac-day">Día 28</span><span class="vac-name">Vitaminas + electrolitos + desparasitación</span></div>
                            <div class="vac-row"><span class="vac-day">Semana 8</span><span class="vac-name">Viruela aviar + Newcastle refuerzo</span></div>
                            <div class="vac-row"><span class="vac-day">Semana 16</span><span class="vac-name">Newcastle + Bronquitis pre-postura</span></div>
                            <div class="vac-row"><span class="vac-day">Cada 3 meses</span><span class="vac-name">Desparasitación + Newcastle en producción</span></div>
                        </div>
                        <div class="tip-box">
                            <i class="fas fa-lightbulb"></i>
                            <div>Consultar siempre con un médico veterinario de confianza antes de aplicar cualquier vacuna o medicamento. El calendario puede variar según la región y el historial sanitario de la finca.</div>
                        </div>
                    </div>
                </div>

                {{-- ══ TAB: INSTALACIONES ══ --}}
                <div id="tab-instalaciones" class="tab-content">
                    <div class="card fade-in">
                        <h3><i class="fas fa-ruler-combined"></i> Dimensionamiento del gallinero</h3>
                        <img
                            src="https://paduamateriales.com/wp-content/uploads/que-tamano-debe-tener-un-gallinero-para-100-gallinas-1.webp"
                            class="card-img"
                            alt="Gallinero"
                            onclick="openModal(this.src)"
                            onerror="this.onerror=null;this.src='https://placehold.co/700x300/1b1b1b/8ac926?text=Gallinero';"
                        >

                        <div class="measure-grid">
                            <div class="measure-item">
                                <span class="measure-val">1 m²</span>
                                <span class="measure-desc">por gallina en interior</span>
                            </div>
                            <div class="measure-item">
                                <span class="measure-val">5 m²</span>
                                <span class="measure-desc">por gallina en pastoreo</span>
                            </div>
                            <div class="measure-item">
                                <span class="measure-val">20 cm</span>
                                <span class="measure-desc">de percha por ave</span>
                            </div>
                            <div class="measure-item">
                                <span class="measure-val">1:5</span>
                                <span class="measure-desc">nidal por cada 5 gallinas</span>
                            </div>
                        </div>

                        <ul class="styled-list" style="margin-top:16px;">
                            <li><i class="fas fa-wind text-accent"></i> Orientar el eje largo de este a oeste para aprovechar la ventilación cruzada.</li>
                            <li><i class="fas fa-sun text-accent"></i> Techo con alero suficiente para evitar lluvias directas y sol extremo.</li>
                            <li><i class="fas fa-layer-group text-accent"></i> Cama de 10–15 cm de viruta de madera, arroz o cascarilla. Voltear semanalmente.</li>
                            <li><i class="fas fa-lock text-accent"></i> Cierre perimetral enterrado 30 cm para evitar entrada de roedores y zorras.</li>
                            <li><i class="fas fa-lightbulb text-accent"></i> Iluminación artificial: 16 horas luz/día para mantener postura en invierno.</li>
                        </ul>
                    </div>

                    <div class="card fade-in">
                        <h3><i class="fas fa-recycle"></i> Beneficios ecológicos del gallinero integrado</h3>
                        <div class="eco-grid">
                            <div class="eco-item">
                                <i class="fas fa-recycle"></i>
                                <p>Transforman residuos orgánicos en abono de alta calidad (gallinaza)</p>
                            </div>
                            <div class="eco-item">
                                <i class="fas fa-bug"></i>
                                <p>Control natural de insectos y larvas en potreros y cultivos</p>
                            </div>
                            <div class="eco-item">
                                <i class="fas fa-seedling"></i>
                                <p>Integración con huerta: fertilizan el suelo directamente al pastar</p>
                            </div>
                            <div class="eco-item">
                                <i class="fas fa-sync-alt"></i>
                                <p>Ciclo cerrado: estiércol → compost → cultivo → residuos → gallinas</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ══ TAB: ECONOMÍA ══ --}}
                <div id="tab-economia" class="tab-content">
                    <div class="card fade-in">
                        <h3><i class="fas fa-calculator"></i> Estimación de costos e ingresos (100 gallinas)</h3>
                        <p>Ejemplo orientativo para producción semitecnificada en Colombia. Los precios varían por región y temporada.</p>

                        <div class="econ-table-wrapper">
                            <table class="breed-table">
                                <thead>
                                    <tr><th>Concepto</th><th>Valor mensual (COP)</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td colspan="2" class="table-section-header">📦 COSTOS</td></tr>
                                    <tr><td>Concentrado postura (100 aves × 120g × 30d)</td><td>$480.000 – $600.000</td></tr>
                                    <tr><td>Agua, luz, gas</td><td>$50.000 – $80.000</td></tr>
                                    <tr><td>Medicamentos y vacunas</td><td>$30.000 – $50.000</td></tr>
                                    <tr><td>Mano de obra (parcial)</td><td>$200.000 – $400.000</td></tr>
                                    <tr><td><strong>Total costos estimados</strong></td><td><strong>$760.000 – $1.130.000</strong></td></tr>
                                    <tr><td colspan="2" class="table-section-header">💰 INGRESOS</td></tr>
                                    <tr><td>Venta de huevos (85% postura × 30d = 2.550 huevos)</td><td>$765.000 – $1.020.000</td></tr>
                                    <tr><td>Venta de gallinaza (1 bulto/semana)</td><td>$40.000 – $80.000</td></tr>
                                    <tr><td>Venta de aves al final del ciclo</td><td>$80.000 – $150.000</td></tr>
                                    <tr><td><strong>Total ingresos estimados</strong></td><td><strong>$885.000 – $1.250.000</strong></td></tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="tip-box">
                            <i class="fas fa-chart-line"></i>
                            <div>
                                <strong>Margen neto estimado:</strong> entre $125.000 y $300.000 mensuales por cada 100 gallinas en postura. La clave para mejorar el margen es reducir el costo del alimento con ingredientes locales y vender directamente al consumidor final.
                            </div>
                        </div>
                    </div>

                    <div class="card fade-in">
                        <h3><i class="fas fa-store"></i> Canales de comercialización</h3>
                        <div class="market-grid">
                            <div class="market-item">
                                <i class="fas fa-user"></i>
                                <h4>Venta directa</h4>
                                <p>Mayor precio por unidad. Venta a vecinos, mercados campesinos, ferias.</p>
                                <span class="badge badge--green">Mayor margen</span>
                            </div>
                            <div class="market-item">
                                <i class="fas fa-store-alt"></i>
                                <h4>Tiendas y minimercados</h4>
                                <p>Volumen constante. Requiere presentación y empaque adecuado.</p>
                                <span class="badge badge--yellow">Margen medio</span>
                            </div>
                            <div class="market-item">
                                <i class="fas fa-truck"></i>
                                <h4>Intermediarios / Acopiadores</h4>
                                <p>Menor precio pero garantiza salida de todo el volumen.</p>
                                <span class="badge badge--orange">Menor margen</span>
                            </div>
                            <div class="market-item">
                                <i class="fas fa-laptop"></i>
                                <h4>Redes sociales y WhatsApp</h4>
                                <p>Canal de venta directa creciente en zonas urbanas y periurbanas.</p>
                                <span class="badge badge--blue">Emergente</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- ══════════════════════════════════════
                 ASIDE / COLUMNA LATERAL
            ══════════════════════════════════════ --}}
            <div class="aside-column">

                <div class="card fade-in">
                    <h3><i class="fas fa-images"></i> Galería</h3>
                    <div class="gallery-grid">
                        <img
                            src="https://ganadosycarnes.com/wp-content/uploads/2019/02/gallinas-felices.jpg"
                            class="aside-img gallery-img"
                            onclick="openModal(this.src)"
                            onerror="this.onerror=null;this.src='https://placehold.co/300x200/1b1b1b/8ac926?text=Galería+1';"
                        />
                        <img
                            src="https://ecohabitar.org/wp-content/uploads/2023/03/gallinero1-1.jpg"
                            class="aside-img gallery-img"
                            onclick="openModal(this.src)"
                            onerror="this.onerror=null;this.src='https://placehold.co/300x200/1b1b1b/8ac926?text=Galería+2';"
                        />
                        <img
                            src="https://d1lg8auwtggj9x.cloudfront.net/images/Chicken_feed.width-820.jpg"
                            class="aside-img gallery-img"
                            onclick="openModal(this.src)"
                            onerror="this.onerror=null;this.src='https://placehold.co/300x200/1b1b1b/8ac926?text=Galería+3';"
                        />
                    </div>
                </div>

                <div class="card fade-in">
                    <h3><i class="fas fa-tachometer-alt"></i> Indicadores clave</h3>
                    <div class="kpi-list">
                        <div class="kpi-item">
                            <span class="kpi-label">% Postura ideal</span>
                            <div class="kpi-bar"><div class="kpi-fill" style="width:90%">90%</div></div>
                        </div>
                        <div class="kpi-item">
                            <span class="kpi-label">Conversión alimenticia</span>
                            <div class="kpi-bar"><div class="kpi-fill" style="width:70%">2.2 kg/kg</div></div>
                        </div>
                        <div class="kpi-item">
                            <span class="kpi-label">Mortalidad aceptable</span>
                            <div class="kpi-bar kpi-bar--warn"><div class="kpi-fill kpi-fill--warn" style="width:5%">&lt;5%</div></div>
                        </div>
                        <div class="kpi-item">
                            <span class="kpi-label">Vida productiva</span>
                            <div class="kpi-bar"><div class="kpi-fill" style="width:75%">72 semanas</div></div>
                        </div>
                    </div>
                </div>

                <div class="card fade-in">
                    <h3><i class="fas fa-exclamation-circle"></i> Señales de alerta</h3>
                    <ul class="alert-list">
                        <li><i class="fas fa-arrow-down"></i> Caída brusca de postura (&gt;10% en una semana)</li>
                        <li><i class="fas fa-lungs"></i> Estornudos, secreción nasal o jadeos</li>
                        <li><i class="fas fa-poop"></i> Diarrea amarilla, verde o con sangre</li>
                        <li><i class="fas fa-feather"></i> Pérdida de plumas fuera de muda</li>
                        <li><i class="fas fa-eye-slash"></i> Ojos cerrados o llorosos durante el día</li>
                        <li><i class="fas fa-weight"></i> Pérdida de peso visible en pocas semanas</li>
                    </ul>
                </div>

                <div class="card fade-in">
                    <h3><i class="fas fa-link"></i> Recursos útiles</h3>
                    <ul class="resource-list">
                        <li><a href="https://www.ica.gov.co" target="_blank"><i class="fas fa-external-link-alt"></i> ICA – Sanidad Avícola Colombia</a></li>
                        <li><a href="https://www.fenavi.org" target="_blank"><i class="fas fa-external-link-alt"></i> FENAVI – Federación Avícola</a></li>
                        <li><a href="https://www.agronet.gov.co" target="_blank"><i class="fas fa-external-link-alt"></i> Agronet – Precios y estadísticas</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div id="imageModal" class="modal">
        <span class="close-modal-btn" onclick="closeModal()">&times;</span>
        <img class="modal-content" id="modalImg" alt="Imagen ampliada">
    </div>

    <script>
        // ── Modal ──
        function openModal(src) {
            document.getElementById('imageModal').style.display = 'block';
            document.getElementById('modalImg').src = src;
        }
        function closeModal() {
            document.getElementById('imageModal').style.display = 'none';
        }
        window.onclick = e => { if (e.target === document.getElementById('imageModal')) closeModal(); }

        // ── Scroll top ──
        const scrollBtn = document.getElementById('scrollTopBtn');
        window.onscroll = () => { scrollBtn.style.display = window.scrollY > 300 ? 'block' : 'none'; };
        scrollBtn.onclick = () => window.scrollTo({ top: 0, behavior: 'smooth' });

        // ── Tabs ──
        function switchTab(name) {
            document.querySelectorAll('.tab-content').forEach(t => t.classList.remove('active'));
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            document.getElementById('tab-' + name).classList.add('active');
            event.currentTarget.classList.add('active');
        }

        // ── Fade in ──
        document.addEventListener('DOMContentLoaded', () => {
            const observer = new IntersectionObserver(entries => {
                entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
            }, { threshold: 0.1 });
            document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));
        });
    </script>
    {{-- /amo las waifus --}}
@endsection