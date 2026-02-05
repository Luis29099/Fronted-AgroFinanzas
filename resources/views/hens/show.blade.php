@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="mb-4 text-success">Detalles de los usuarios</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-success">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Raza</th>
                    <th scope="col">Producción diaria de huevos</th>
                    <th scope="col">Total mensual de huevos</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $hen['id'] }}</td>
                    <td>{{ $hen['breed'] }}</td>
                    <td>{{ $hen['daily_egg_production'] }}</td>
                    <td>{{ $hen['monthly_egg_total'] }}</td>

                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection