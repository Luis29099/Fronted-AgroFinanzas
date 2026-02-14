@extends('layouts.app')

@section('content')
<main class="avocado-main">

    <section class="avocado-detail-section">
        <div class="avocado-detail-card">

            <h1 class="avocado-title">
             {{ $avocadocrop['variety'] }}
            </h1>

            <p class="avocado-subtitle">
                Información detallada del cultivo
            </p>

            <div class="avocado-info-grid">
                <div class="info-box">
                    <span>ID</span>
                    <strong>{{ $avocadocrop['id'] }}</strong>
                </div>

                <div class="info-box">
                    <span>Variedad</span>
                    <strong>{{ $avocadocrop['variety'] }}</strong>
                </div>

                <div class="info-box">
                    <span>Producción estimada</span>
                    <strong>{{ $avocadocrop['estimated_production'] }}</strong>
                </div>
            </div>

            <div class="detail-actions">
                <a href="{{ route('avocadocrops.index') }}" class="btn-back">
                    ← Volver a variedades
                </a>
            </div>

        </div>
    </section>

</main>
@endsection