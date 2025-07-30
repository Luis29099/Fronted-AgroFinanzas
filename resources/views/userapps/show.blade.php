@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="mb-4 text-success">Detalles de los usuarios</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-success">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contraseña</th>
                    <th scope="col">Fecha de Nacimiento</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $user_app['id'] }}</td>
                    <td>{{ $user_app['name'] }}</td>
                    <td>{{ $user_app['email'] }}</td>
                    <td>{{ $user_app['password'] }}</td>
                    <td>{{ $user_app['birth_date'] }}</td>

                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection