@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Lista de Usuarios</h1>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Contraseña</th>
                    <th>Fecha de Nacimiento</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recommendations as $recommendation)
                    <tr>
                        <td>{{ $recommendation['id'] }}</td>
                        <td>{{ $recommendation['text'] }}</td>
                        <td>{{ $recommendation['date'] }}</td>
                        <td>{{ $recommendation['password'] }}</td>
                        <td>{{ $recommendation['birth_date'] }}</td>
                        <td>
                            <a href="{{ route('recommendation.show', $recommendation['id']) }}" class="btn btn-info btn-sm">Ver más</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection