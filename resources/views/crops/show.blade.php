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
                    <th scope="col">Área</th>
                    <th scope="col">Fecha de Siembra</th>
                    <th scope="col">Fecha de Cosecha</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $crop['id'] }}</td>
                    <td>{{ $crop['name'] }}</td>
                    <td>{{ $crop['area'] }}</td>
                    <td>{{ $crop['sowing_date'] }}</td>
                    <td>{{ $crop['harvest_date'] }}</td>

                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection