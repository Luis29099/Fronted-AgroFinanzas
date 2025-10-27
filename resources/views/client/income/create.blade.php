{{-- @extends('layouts.app')
@section('content')
<div class="container my-4">
    <h2 class="text-success">Registrar Ingreso</h2>

    <form action="{{ route('client.store') }}" method="POST">
        @csrf
        <input type="hidden" name="type" value="income">

        <div class="mb-3">
            <label for="amount" class="form-label">Monto</label>
            <input type="number" step="0.01" name="amount" id="amount" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Fecha</label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <input type="text" name="description" id="description" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Guardar Ingreso</button>
    </form>
</div>
@endsection --}}
@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white fw-bold">
            Registrar Ingreso
        </div>
        <div class="card-body">
            <form action="{{ route('client.income.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Monto</label>
                    <input type="number" name="amount" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Fecha</label>
                    <input type="date" name="date" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Descripción</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>

                <button type="submit" class="btn btn-success">Guardar Ingreso</button>
            </form>
        </div>
    </div>
</div>
@endsection
