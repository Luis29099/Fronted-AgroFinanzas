@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="mb-4 text-success">Detalles de los cultivos de aguacate</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-success">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Variedad</th>
                    <th scope="col">Producción Estimada</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $avocadocrop['id'] }}</td>
                    <td>{{ $avocadocrop['variety'] }}</td>
                    <td>{{ $avocadocrop['estimated_production'] }}</td>

                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection