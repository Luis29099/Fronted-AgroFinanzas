@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Lista de animales</h1>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Cantidad</th>
                    <th>Fecha de Adquisición</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($animalproductions as $animalproduction)
                    <tr>
                        <td>{{ $animalproduction['id'] }}</td>
                        <td>{{ $animalproduction['type'] }}</td>
                        <td>{{ $animalproduction['quantity'] }}</td>
                        <td>{{ $animalproduction['acquisition_date'] }}</td>
                        <td>
                            <a href="{{ route('animalproduction.show', $animalproduction['id']) }}" class="btn btn-info btn-sm">Ver más</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection