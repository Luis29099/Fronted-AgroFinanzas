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
                @foreach ($user_apps as $user_app)
                    <tr>
                        <td>{{ $user_app['id'] }}</td>
                        <td>{{ $user_app['name'] }}</td>
                        <td>{{ $user_app['email'] }}</td>
                        <td>{{ $user_app['password'] }}</td>
                        <td>{{ $user_app['birth_date'] }}</td>
                        <td>
                            <a href="{{ route('user_app.show', $user_app['id']) }}" class="btn btn-info btn-sm">Ver más</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection