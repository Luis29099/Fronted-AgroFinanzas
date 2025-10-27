{{-- @extends('layouts.app')
@section('content')

<div class="container my-4">

    <!-- Formulario de Finanzas -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-success text-white fw-bold">
            Agregar Registro de Finanzas
        </div>
        <div class="card-body">
            <form action="{{ route('client.store') }}" method="POST">
                @csrf
                <div class="row g-3 align-items-end">
                    <div class="col-md-3">
                        <label for="income" class="form-label">Ingreso</label>
                        <input type="number" id="income" name="income" placeholder="Ingrese ingreso" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label for="expense" class="form-label">Gasto</label>
                        <input type="number" id="expense" name="expense" placeholder="Ingrese gasto" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label for="date" class="form-label">Fecha</label>
                        <input type="date" id="date" name="date" class="form-control" required>
                    </div>
                    <div class="col-md-3 d-grid">
                        <button type="submit" class="btn btn-success">Agregar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabla de Finanzas -->
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white fw-bold">
            Tabla de Finanzas
        </div>
        <div class="card-body p-0">
            <table class="table table-striped table-hover mb-0">
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
    </div>
</div>

@endsection --}}
@extends('layouts.app')

@section('content')
<div class="container my-4">

    {{-- Mensajes de éxito --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Historial de Finanzas</h2>

        <div>
            <a href="{{ route('client.income.create') }}" class="btn btn-success me-2">
                + Registrar Ingreso
            </a>
            <a href="{{ route('client.expense.create') }}" class="btn btn-danger">
                + Registrar Gasto
            </a>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
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
                            <td>{{ $finance['date'] }}</td>
                            <td>
                                @if($finance['type'] === 'income')
                                    <span class="badge bg-success">Ingreso</span>
                                @else
                                    <span class="badge bg-danger">Gasto</span>
                                @endif
                            </td>
                            <td>${{ number_format($finance['amount'], 2) }}</td>
                            <td>{{ $finance['description'] ?? '---' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No hay registros todavía.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
