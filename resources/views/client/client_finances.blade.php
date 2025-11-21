@extends('layouts.app')

@section('content')
<div class="finances-dashboard">
    <h1 class="text-3xl font-extrabold text-green-400 text-center mb-10 tracking-wider">
        Gestión de Finanzas Agropecuarias
    </h1>

    <div class="main-card">
        
        <!-- PESTAÑAS DE NAVEGACIÓN -->
        <div class="tab-buttons">
            <button class="tab-link active" data-tab="income-form">
                <i class="fas fa-plus-circle"></i> Ingreso
            </button>
            <button class="tab-link" data-tab="expense-form">
                <i class="fas fa-minus-circle"></i> Gasto
            </button>
            <button class="tab-link" data-tab="history-view">
                <i class="fas fa-history"></i> Historial
            </button>
        </div>

        <!-- CONTENIDO DE LAS PESTAÑAS -->

        <!-- 1. Formulario de Ingreso -->
        <div id="income-form" class="tab-content active">
            <h2 class="tab-title income-title">Registrar Ingreso</h2>
            <form action="{{ route('client.income.store') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="income_amount">Monto</label>
                    <input type="number" step="0.01" name="amount" id="income_amount" required>
                </div>

                <div class="form-group">
                    <label for="income_date">Fecha</label>
                    <input type="date" name="date" id="income_date" required>
                </div>

                <div class="form-group">
                    <label for="income_description">Descripción</label>
                    <textarea name="description" id="income_description"></textarea>
                </div>

                <button type="submit" class="submit-btn income-btn">Guardar Ingreso</button>
            </form>
        </div>

        <!-- 2. Formulario de Gasto -->
        <div id="expense-form" class="tab-content">
            <h2 class="tab-title expense-title">Registrar Gasto</h2>
            <form action="{{ route('client.expense.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="expense_amount">Monto</label>
                    <input type="number" step="0.01" name="amount" id="expense_amount" required>
                </div>

                <div class="form-group">
                    <label for="expense_date">Fecha</label>
                    <input type="date" name="date" id="expense_date" required>
                </div>

                <div class="form-group">
                    <label for="expense_description">Descripción</label>
                    <textarea name="description" id="expense_description"></textarea>
                </div>

                <button type="submit" class="submit-btn expense-btn">Guardar Gasto</button>
            </form>
        </div>

        <!-- 3. Historial de Transacciones (Requiere datos pasados desde el controlador) -->
        <div id="history-view" class="tab-content">
            <h2 class="tab-title history-title">Historial de Finanzas</h2>
            
            <!-- Botones de Filtros -->
            <div class="filter-buttons">
                <a href="{{ route('client.finances.index', ['filter' => 'all']) }}" 
                   class="filter-btn {{ $filter == 'all' ? 'active-all' : '' }}">
                    Todos
                </a>
                <a href="{{ route('client.finances.index', ['filter' => 'income']) }}" 
                   class="filter-btn {{ $filter == 'income' ? 'active-income' : '' }}">
                    Ingresos
                </a>
                <a href="{{ route('client.finances.index', ['filter' => 'expense']) }}" 
                   class="filter-btn {{ $filter == 'expense' ? 'active-expense' : '' }}">
                    Gastos
                </a>
            </div>

            <!-- Tabla de Historial -->
            <div class="history-table-container">
                <table class="history-table">
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
                            <tr class="{{ $finance['type'] === 'income' ? 'row-income' : 'row-expense' }}">
                                <td>{{ $finance['date'] ?? 'N/A' }}</td>
                                <td>
                                    <span class="badge {{ $finance['type'] === 'income' ? 'bg-success' : 'bg-danger' }}">
                                        {{ $finance['type'] === 'income' ? 'Ingreso' : 'Gasto' }}
                                    </span>
                                </td>
                                <td>${{ number_format($finance['amount'], 0, ',', '.') }}</td>
                                <td>{{ $finance['description'] ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center-empty">No hay registros de transacciones para este filtro.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const tabs = document.querySelectorAll('.tab-link');
        const contents = document.querySelectorAll('.tab-content');
        
        // Función para cambiar la pestaña
        function changeTab(tabId) {
            tabs.forEach(tab => tab.classList.remove('active'));
            contents.forEach(content => content.classList.remove('active'));

            const activeTab = document.querySelector(`.tab-link[data-tab="${tabId}"]`);
            const activeContent = document.getElementById(tabId);
            
            if (activeTab) {
                activeTab.classList.add('active');
            }
            if (activeContent) {
                activeContent.classList.add('active');
            }
        }
        
        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const tabId = tab.dataset.tab;
                changeTab(tabId);

                // Opcional: Si el usuario está en la vista Historial, mantener la URL limpia.
                // Si está en Ingreso o Gasto, no cambia la URL.
                if (tabId === 'history-view') {
                    // Cargar o recargar el historial si es necesario
                    // En Laravel, esto ya se maneja al recargar la página si se hace un submit.
                }
            });
        });
        
        // Lógica para determinar qué pestaña mostrar al cargar la página:
        // Si hay un error o un éxito de redirección (después de guardar),
        // se puede forzar la pestaña, pero por simplicidad, iniciamos en Ingresos.
        
        // Revisar la URL para ver si se hizo un filtro (para mantener la pestaña de historial abierta)
        const urlParams = new URLSearchParams(window.location.search);
        const filter = urlParams.get('filter');
        
        // Si la URL contiene un filtro, abre la pestaña de Historial por defecto.
        if (filter) {
            changeTab('history-view');
        } else {
            // De lo contrario, abrir la pestaña de Ingreso por defecto.
            changeTab('income-form');
        }
        
    });
</script>
@endsection
