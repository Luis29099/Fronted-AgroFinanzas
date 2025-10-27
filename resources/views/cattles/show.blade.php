@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="mb-4 text-success">Detalles de los cultivos de cafe</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-success">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Raza</th>
                    <th scope="col">Peso Promedio</th>
                    <th scope="col">Uso (Leche / Carne)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $coffecrop['id'] }}</td>
                    <td>{{ $cattle['breed'] }}</td>
                    <td>{{ $cattle['average_weight'] }}</td>
                    <td>{{ $cattle['use_milk_meat'] }}</td>

                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection