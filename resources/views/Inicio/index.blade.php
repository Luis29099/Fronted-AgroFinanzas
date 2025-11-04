@extends('layouts.app')

@section('content')
<main>
    {{-- Sección de Bienvenida (Hero) --}}
    <div class="hero-principal">
        <div class="hero-contenido">
            <h1>AgroFinanzas</h1>
            <p><strong>Decisiones inteligentes para el campo.</strong></p> {{-- Nuevo subtítulo --}}
        </div>
        <div class="imagen-principal">
            {{-- La imagen se carga como fondo en el CSS para aplicar el degradado --}}
        </div>
    </div>

    {{-- Sección del clima --}}
    <section class="clima-section">

        <h2>☁️ Estado del Clima Actual</h2>

        @if(isset($data))

            <div class="clima-card">

                <p><strong>Ubicación:</strong> {{ $data['name'] ?? '---' }}</p>

                <p><strong>Temperatura:</strong> {{ $data['main']['temp'] ?? '---' }} °C</p>

                <p><strong>Humedad:</strong> {{ $data['main']['humidity'] ?? '---' }}%</p>

                <p><strong>Viento:</strong> {{ $data['wind']['speed'] ?? '---' }} m/s</p>

                <p><strong>Condición:</strong> {{ ucfirst($data['weather'][0]['description'] ?? '---') }}</p>

            </div>

        @else

            <p>No se pudieron obtener los datos del clima.</p>

        @endif

    </section>

    {{-- Noticias principales --}}
     <section class="noticias">

        <div class="noticia">

            <img src="https://images.unsplash.com/photo-1593023333594-487b2f7dd415?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=687" alt="Cuidado de Vacas">

            <div class="noticia-content">

                <h3>Cuidado de tus vacas</h3>

                <p>Aprende cómo garantizar la salud y productividad de tu ganado con consejos prácticos y fáciles de aplicar en el día a día.</p>

            </div>

        </div>



        <div class="noticia">

            <img src="https://images.unsplash.com/photo-1654815439629-5e93cb7f74a1?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1170" alt="Cultivos">

            <div class="noticia-content">

                <h3>Cómo cuidar tus cultivos</h3>

                <p>Descubre técnicas modernas y ecológicas para mantener tus cultivos sanos, productivos y resistentes a plagas.</p>

            </div>

        </div>



        <div class="noticia">

            <img src="https://images.unsplash.com/photo-1579621970795-87facc2f976d?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1170" alt="Finanzas">

            <div class="noticia-content">

                <h3>Mejor manejo de tus finanzas</h3>

                <p>Organiza tus ingresos, controla gastos y toma decisiones financieras inteligentes para impulsar tu emprendimiento rural.</p>

            </div>

        </div>

    </section>
</main>
@endsection