@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Lista de cultivos de aguacate</h1>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Variedad</th>
                    <th>Producción Estimada</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($avocadocrops as $avocadocrop)
                    <tr>
                        <td>{{ $avocadocrop['id'] }}</td>
                        <td>{{ $avocadocrop['variety'] }}</td>
                        <td>{{ $avocadocrop['estimated_production'] }}</td>
                        <td>
                            <a href="{{ route('avocadocrop.show', $avocadocrop['id']) }}" class="btn btn-info btn-sm">Ver más</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection