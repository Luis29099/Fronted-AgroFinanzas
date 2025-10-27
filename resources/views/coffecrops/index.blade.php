@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Lista de cultivos de cafe</h1>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Variedad</th>
                    <th>Producción Estimada</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($coffecrops as $coffecrop)
                    <tr>
                        <td>{{ $coffecrop['id'] }}</td>
                        <td>{{ $coffecrop['variety'] }}</td>
                        <td>{{ $coffecrop['estimated_production'] }}</td>
                        <td>
                            <a href="{{ route('coffecrop.show', $coffecrop['id']) }}" class="btn btn-info btn-sm">Ver más</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection