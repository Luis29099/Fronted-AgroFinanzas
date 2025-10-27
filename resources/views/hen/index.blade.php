{{-- @extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Lista de Usuarios</h1>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Raza</th>
                    <th>Producción diaria de huevos</th>
                    <th>Total mensual de huevos</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hens as $hen)
                    <tr>
                        <td>{{ $hen['id'] }}</td>
                        <td>{{ $hen['breed'] }}</td>
                        <td>{{ $hen['daily_egg_production'] }}</td>
                        <td>{{ $hen['monthly_egg_total'] }}</td>
                        <td>
                            <a href="{{ route('hen.show', $hen['id']) }}" class="btn btn-info btn-sm">Ver más</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection --}}
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Lista de Gallinas</h1>

    <div class="row">
        @foreach ($hens as $hen)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title">Raza: {{ $hen['breed'] }}</h5>
                        <p class="card-text"><strong>Producción diaria:</strong> {{ $hen['daily_egg_production'] }} huevos</p>
                        <p class="card-text"><strong>Total mensual:</strong> {{ $hen['monthly_egg_total'] }} huevos</p>
                        <a href="{{ route('hen.show', $hen['id']) }}" class="btn btn-primary btn-sm">Ver más</a>
                    </div>
                                        <div class="card-footer text-muted text-end">
                        ID: {{ $hen['id'] }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
