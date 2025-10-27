@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="mb-4 text-success">Detalles de los usuarios</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-success">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Texto</th>
                    <th scope="col">Fecha</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $recommendation['id'] }}</td>
                    <td>{{ $recommendation['text'] }}</td>
                    <td>{{ $recommendation['date'] }}</td>

                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection