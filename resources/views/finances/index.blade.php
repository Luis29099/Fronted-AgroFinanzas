{{-- @extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Lista de Usuarios</h1>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Ingreso</th>
                    <th>Gasto</th>
                    <th>Beneficio</th>
                    <th>Fecha</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($finances as $finance)
                    <tr>
                        <td>{{ $finance['id'] }}</td>
                        <td>{{ $finance['income'] }}</td>
                        <td>{{ $finance['expense'] }}</td>
                        <td>{{ $finance['profit'] }}</td>
                        <td>{{ $finance['date'] }}</td>
                        <td>
                            <a href="{{ route('finance.show', $finance['id']) }}" class="btn btn-info btn-sm">Ver más</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-success fw-bold">Finanzas (API)</h2>

    <table class="table table-bordered table-hover">
        <thead class="table-success text-center">
            <tr>
                <th>ID</th>
                <th>Ingreso</th>
                <th>Gasto</th>
                <th>Ganancia</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($finances as $finance)
                <tr class="text-center">
                    <td>{{ $finance['id'] }}</td>
                    <td>${{ number_format($finance['income'], 0, ',', '.') }}</td>
                    <td>${{ number_format($finance['expense'], 0, ',', '.') }}</td>
                    <td class="fw-bold text-success">${{ number_format($finance['profit'], 0, ',', '.') }}</td>
                    <td>{{ $finance['date'] }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">No hay registros en la API.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
