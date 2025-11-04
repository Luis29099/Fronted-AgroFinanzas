@extends('layouts.app')

@section('content')
<div class="clima-section">
  @isset($error)
    <p>❌ {{ $error }}</p>
  @else
    <h2>🌦 Estado del Clima Actual</h2>
    <div class="clima-card">
      <p><strong>Ubicación:</strong> Bogotá, Colombia</p>
      <p><strong>Temperatura:</strong> {{ number_format($data['main']['temp'] - 273.15, 1) }} °C</p>
      <p><strong>Humedad:</strong> {{ $data['main']['humidity'] }}%</p>
      <p><strong>Viento:</strong> {{ $data['wind']['speed'] }} m/s</p>
      <p><strong>Condición:</strong> {{ $data['weather'][0]['description'] }}</p>
    </div>
  @endisset
</div>
@endsection
