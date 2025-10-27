@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white fw-bold">
            Historial de Finanzas
        </div>
        <div class="card-body">

            <!-- Botones de filtros -->
            <div class="mb-3">
                <a href="{{ route('client.index', ['filter' => 'all']) }}" 
                   class="btn btn-sm {{ $filter == 'all' ? 'btn-primary' : 'btn-outline-primary' }}">
                   Todos
                </a>
                <a href="{{ route('client.index', ['filter' => 'income']) }}" 
                   class="btn btn-sm {{ $filter == 'income' ? 'btn-success' : 'btn-outline-success' }}">
                   Ingresos
                </a>
                <a href="{{ route('client.index', ['filter' => 'expense']) }}" 
                   class="btn btn-sm {{ $filter == 'expense' ? 'btn-danger' : 'btn-outline-danger' }}">
                   Gastos
                </a>
            </div>

            <!-- Tabla de historial -->
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Tipo</th>
                        <th>Monto</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($finances as $finance)
                        <tr>
                            <td>{{ $finance['date'] ?? 'N/A' }}</td>
                            <td>
                                @if($finance['type'] == 'income')
                                    <span class="badge bg-success">Ingreso</span>
                                @else
                                    <span class="badge bg-danger">Gasto</span>
                                @endif
                            </td>
                            <td>${{ number_format($finance['amount'], 0, ',', '.') }}</td>
                            <td>{{ $finance['description'] ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No hay registros</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
