@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="mb-4 text-success">Detalles de los cultivos de aguacate</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-success">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Fecha de Adquisición</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $animalproduction['id'] }}</td>
                    <td>{{ $animalproduction['type'] }}</td>
                    <td>{{ $animalproduction['quantity'] }}</td>
                    <td>{{ $animalproduction['acquisition_date'] }}</td>

                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection