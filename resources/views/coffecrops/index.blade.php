@extends('layouts.app')

@section('content')
    <main class="coffe-main">
        <!-- Galería de Procesos de Café (Contenido original adaptado) -->
<section class="process-section">
    <h2>Proceso de Cultivo y Beneficio</h2>
    <div class="contenedor-tarjetas">
        
        <div class="tarjeta">
            <img src="https://www.qualery.com/almacen/noticias/detalle_medicionmatas1.jpg" alt="Preparación del terreno">
            <h3>Preparación del Terreno</h3>
            <p>Una buena preparación del terreno asegura el éxito del cafetal desde el inicio. Los agrónomos recomiendan realizar análisis de suelos antes de sembrar.</p>
        </div>

        <div class="tarjeta">
            <img src="https://cloudfront-us-east-1.images.arcpublishing.com/semana/KGC6ADXGD5FHHCNFNR5FVPSYWY.jpg" alt="Sombra regulada">
            <h3>Sombra y Densidad</h3>
            <p>La sombra regulada mejora la calidad del grano y protege el suelo. Los expertos advierten que demasiada cobertura puede reducir la productividad.</p>
        </div>

        <div class="tarjeta">
            <img src="https://agrotendencia.tv/wp-content/uploads/2018/11/Fertilizaci%C3%B3n.png" alt="Fertilización oportuna">
            <h3>Fertilización Oportuna</h3>
            <p>La fertilización oportuna fortalece las plantas y mejora la producción. Con base en los análisis del suelo, se aplican fertilizantes ricos en NPK.</p>
        </div>

        <div class="tarjeta">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRpyGWtiFjfpEGdybB0BgPCWXnl-N-Ms-NSDg&s" alt="Control de plagas">
            <h3>Control de Plagas</h3>
            <p>El control de plagas y enfermedades debe ser preventivo y constante. Enfermedades como la roya o plagas como el broca afectan directamente el rendimiento.</p>
        </div>

        <div class="tarjeta">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS1bKHQVhQC6J_umP5XD3Ot7Bh6A7jOYav3Cg&s" alt="Manejo del agua">
            <h3>Manejo del Agua</h3>
            <p>El manejo del agua es vital, especialmente en zonas de clima variable. Aunque el café requiere buena humedad, el exceso puede provocar pudrición de raíces.</p>
        </div>

        <div class="tarjeta">
            <img src="https://live.staticflickr.com/4372/37344454245_92a172d731_b.jpg" alt="Podas de café">
            <h3>Podas del Cafetal</h3>
            <p>Las podas bien hechas (producción, formación, saneamiento) rejuvenecen el cafetal y son esenciales para mejorar su producción y vigor.</p>
        </div>

        <div class="tarjeta">
            <img src="https://perfectdailygrind.com/es/wp-content/uploads/sites/2/2021/01/Recoleccion-Selectiva-1.jpg" alt="Cosecha selectiva">
            <h3>Cosecha Selectiva</h3>
            <p>La cosecha debe ser selectiva para asegurar un café de calidad. Recolectar solo los granos maduros, de forma manual, garantiza un mejor sabor.</p>
        </div>

        <div class="tarjeta">
            <img src="https://www.cafedeespecialidad.cafe/wp-content/uploads/2025/03/secado_cafe.jpg" alt="Beneficio y secado">
            <h3>Beneficio y Secado</h3>
            <p>El beneficio (lavado, fermentación) y secado influyen directamente en el valor del producto. Un mal proceso puede reducir drásticamente la calidad.</p>
        </div>

        <div class="tarjeta">
            <img src="https://www.yoamoelcafedecolombia.com/wp-content/uploads/2017/01/fotos-pagina.jpg" alt="Almacenamiento de café">
            <h3>Almacenamiento</h3>
            <p>El almacenamiento adecuado preserva la calidad del café. Guardar el café en lugares frescos, secos y ventilados evita la pérdida de aroma y sabor.</p>
        </div>

        <div class="tarjeta">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRZaVIDpsCx4eEoFTZP53gAJCqQuCeiAWlzOA&s" alt="Exportación de café">
            <h3>Normas de Exportación</h3>
            <p>La exportación de café exige cumplir con altos estándares. Desde la selección de granos hasta el empaque, todo debe cumplir con las normas internacionales.</p>
        </div>
        
    </div>
</section><!-- Sección de Datos Rápidos del Cultivo -->
<section class="quick-data-section">
    <h2>Datos Rápidos de Siembra y Cuidado</h2>
    <div class="data-grid">
        <div class="data-card">
            <i class="fas fa-seedling"></i>
            <h3>Altitud Ideal</h3>
            <p>900 a 1800 msnm</p>
        </div>
        <div class="data-card">
            <i class="fas fa-thermometer-half"></i>
            <h3>Temperatura</h3>
            <p>18°C a 24°C (Evitar heladas)</p>
        </div>
        <div class="data-card">
            <i class="fas fa-umbrella"></i>
            <h3>Sombra</h3>
            <p>Sombra regulada (35% - 50%)</p>
        </div>
        <div class="data-card">
            <i class="fas fa-layer-group"></i>
            <h3>Suelo</h3>
            <p>Franco-arcilloso, profundo y ácido (pH 5.0 a 5.5).</p>
        </div>
    </div>
</section>

<!-- Sección de Recomendaciones de Cuidado Específicas -->
<section class="care-recommendations">
    <h2>Recomendaciones para la Productividad</h2>
    <div class="recommendation-list">
        <div class="recommendation-item">
            <span class="icon-number">1</span>
            <div>
                <h3>Manejo de Nutrientes</h3>
                <p>Realice análisis foliares y de suelo anuales para una fertilización balanceada y precisa.</p>
            </div>
        </div>
        <div class="recommendation-item">
            <span class="icon-number">2</span>
            <div>
                <h3>Control de Roya y Broca</h3>
                <p>Implemente variedades resistentes (e.g., Castillo, Cenicafé 1) y maneje la broca con trampeo y control biológico.</p>
            </div>
        </div>
        <div class="recommendation-item">
            <span class="icon-number">3</span>
                <h3>Poda de Rejuvenecimiento</h3>
                <p>Ratifique la necesidad de zoca o deschuponamiento para mantener la altura y vigor de la planta, maximizando la cosecha.</p>
        </div>
    </div>
</section>


</main>
    </div>
@endsection