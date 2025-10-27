@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Lista de cultivos</h1>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Área</th>
                    <th>Fecha de Siembra</th>
                    <th>Fecha de Cosecha</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($crops as $crop)
                    <tr>
                        <td>{{ $crop['id'] }}</td>
                        <td>{{ $crop['name'] }}</td>
                        <td>{{ $crop['area'] }}</td>
                        <td>{{ $crop['sowing_date'] }}</td>
                        <td>{{ $crop['harvest_date'] }}</td>
                        <td>
                            <a href="{{ route('crop.show', $crop['id']) }}" class="btn btn-info btn-sm">Ver más</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection