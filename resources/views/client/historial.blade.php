@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white fw-bold">
            <i class="fas fa-history"></i> Historial de Finanzas
        </div>
        <div class="card-body">

            <!-- Botones de filtros EXPANDIDOS -->
            <div class="mb-3 d-flex flex-wrap gap-2">
                <a href="{{ route('client.finances.index', ['filter' => 'all']) }}" 
                   class="btn btn-sm {{ $filter == 'all' ? 'btn-primary' : 'btn-outline-primary' }}">
                   <i class="fas fa-list"></i> Todos
                </a>
                <a href="{{ route('client.finances.index', ['filter' => 'income']) }}" 
                   class="btn btn-sm {{ $filter == 'income' ? 'btn-success' : 'btn-outline-success' }}">
                   <i class="fas fa-arrow-up"></i> Ingresos
                </a>
                <a href="{{ route('client.finances.index', ['filter' => 'expense']) }}" 
                   class="btn btn-sm {{ $filter == 'expense' ? 'btn-danger' : 'btn-outline-danger' }}">
                   <i class="fas fa-arrow-down"></i> Gastos
                </a>
                
                <!-- 🆕 NUEVOS FILTROS -->
                <a href="{{ route('client.finances.index', ['filter' => 'investment']) }}" 
                   class="btn btn-sm {{ $filter == 'investment' ? 'btn-info' : 'btn-outline-info' }}">
                   <i class="fas fa-building"></i> Inversiones
                </a>
                <a href="{{ route('client.finances.index', ['filter' => 'debt']) }}" 
                   class="btn btn-sm {{ $filter == 'debt' ? 'btn-warning' : 'btn-outline-warning' }}">
                   <i class="fas fa-credit-card"></i> Deudas
                </a>
                <a href="{{ route('client.finances.index', ['filter' => 'inventory']) }}" 
                   class="btn btn-sm {{ ($filter ?? '') == 'inventory' ? 'btn-secondary' : 'btn-outline-secondary' }}"
                   style="--bs-btn-color: #a855f7; --bs-btn-border-color: #a855f7; --bs-btn-hover-bg: #a855f7;">
                   <i class="fas fa-boxes"></i> Inventario
                </a>
                <a href="{{ route('client.finances.index', ['filter' => 'costs']) }}" 
                   class="btn btn-sm {{ ($filter ?? '') == 'costs' ? 'btn-dark' : 'btn-outline-dark' }}"
                   style="--bs-btn-color: #14b8a6; --bs-btn-border-color: #14b8a6; --bs-btn-hover-bg: #14b8a6;">
                   <i class="fas fa-seedling"></i> Costos
                </a>
            </div>

            <!-- 🆕 TARJETAS DE RESUMEN -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-body">
                            <h6 class="card-title"><i class="fas fa-arrow-up"></i> Total Ingresos</h6>
                            <h3>${{ number_format($totalIncome ?? 0, 0, ',', '.') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-danger mb-3">
                        <div class="card-body">
                            <h6 class="card-title"><i class="fas fa-arrow-down"></i> Total Gastos</h6>
                            <h3>${{ number_format($totalExpense ?? 0, 0, ',', '.') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white {{ ($balance ?? 0) >= 0 ? 'bg-primary' : 'bg-warning' }} mb-3">
                        <div class="card-body">
                            <h6 class="card-title"><i class="fas fa-balance-scale"></i> Balance</h6>
                            <h3>${{ number_format($balance ?? 0, 0, ',', '.') }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 🆕 TARJETAS ADICIONALES -->
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card text-white bg-info mb-3">
                        <div class="card-body p-2">
                            <h6 class="card-title mb-1"><i class="fas fa-building"></i> Inversiones</h6>
                            <p class="mb-0">${{ number_format($totalInvestment ?? 0, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-body p-2">
                            <h6 class="card-title mb-1"><i class="fas fa-credit-card"></i> Deudas</h6>
                            <p class="mb-0">${{ number_format($totalDebt ?? 0, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white mb-3" style="background-color: #a855f7;">
                        <div class="card-body p-2">
                            <h6 class="card-title mb-1"><i class="fas fa-boxes"></i> Inventario</h6>
                            <p class="mb-0">${{ number_format($totalInventory ?? 0, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white mb-3" style="background-color: #14b8a6;">
                        <div class="card-body p-2">
                            <h6 class="card-title mb-1"><i class="fas fa-seedling"></i> Costos</h6>
                            <p class="mb-0">${{ number_format($totalCosts ?? 0, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabla de historial MEJORADA -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th><i class="fas fa-calendar"></i> Fecha</th>
                            <th><i class="fas fa-tag"></i> Tipo</th>
                            <th><i class="fas fa-dollar-sign"></i> Monto</th>
                            <th><i class="fas fa-info-circle"></i> Detalles</th>
                            <th><i class="fas fa-align-left"></i> Descripción</th>
                            <th><i class="fas fa-cog"></i> Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($finances as $finance)
                            <tr>
                                <td>{{ $finance['date'] ?? 'N/A' }}</td>
                                <td>
                                    @if($finance['type'] == 'income')
                                        <span class="badge bg-success">
                                            <i class="fas fa-arrow-up"></i> Ingreso
                                        </span>
                                    @elseif($finance['type'] == 'expense')
                                        <span class="badge bg-danger">
                                            <i class="fas fa-arrow-down"></i> Gasto
                                        </span>
                                    @elseif($finance['type'] == 'investment')
                                        <span class="badge bg-info">
                                            <i class="fas fa-building"></i> Inversión
                                        </span>
                                    @elseif($finance['type'] == 'debt')
                                        <span class="badge bg-warning text-dark">
                                            <i class="fas fa-credit-card"></i> Deuda
                                        </span>
                                    @elseif($finance['type'] == 'inventory')
                                        <span class="badge" style="background-color: #a855f7;">
                                            <i class="fas fa-boxes"></i> Inventario
                                        </span>
                                    @elseif($finance['type'] == 'costs')
                                        <span class="badge" style="background-color: #14b8a6;">
                                            <i class="fas fa-seedling"></i> Costos
                                        </span>
                                    @endif
                                </td>
                                <td><strong>${{ number_format($finance['amount'], 0, ',', '.') }}</strong></td>
                                
                                <!-- 🆕 COLUMNA DE DETALLES ESPECÍFICOS -->
                                <td>
                                    @if($finance['type'] == 'investment' && isset($finance['asset_name']))
                                        <small class="text-muted">
                                            <i class="fas fa-tools"></i> {{ $finance['asset_name'] }}
                                        </small>
                                    @elseif($finance['type'] == 'debt' && isset($finance['creditor']))
                                        <small class="text-muted">
                                            <i class="fas fa-university"></i> {{ $finance['creditor'] }}
                                            @if(isset($finance['paid_installments']) && isset($finance['installments']))
                                                <br><i class="fas fa-check-circle"></i> {{ $finance['paid_installments'] }}/{{ $finance['installments'] }} cuotas
                                            @endif
                                        </small>
                                    @elseif($finance['type'] == 'inventory' && isset($finance['product_name']))
                                        <small class="text-muted">
                                            <i class="fas fa-box"></i> {{ $finance['product_name'] }}
                                            @if(isset($finance['quantity']) && isset($finance['unit']))
                                                <br>{{ $finance['quantity'] }} {{ $finance['unit'] }}
                                            @endif
                                        </small>
                                    @elseif($finance['type'] == 'costs' && isset($finance['crop_name']))
                                        <small class="text-muted">
                                            <i class="fas fa-leaf"></i> {{ $finance['crop_name'] }}
                                            @if(isset($finance['area']))
                                                <br>{{ $finance['area'] }} ha
                                            @endif
                                        </small>
                                    @else
                                        <small class="text-muted">-</small>
                                    @endif
                                    
                                    @if(isset($finance['category']) && $finance['category'])
                                        <br><span class="badge badge-sm bg-secondary">{{ $finance['category'] }}</span>
                                    @endif
                                </td>
                                
                                <td>{{ $finance['description'] ?? '-' }}</td>
                                
                                <!-- Acciones -->
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <button type="button" class="btn btn-outline-primary btn-sm" 
                                                onclick="editFinance({{ json_encode($finance) }})"
                                                title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        
                                        <form action="{{ route('client.finances.destroy', $finance['id']) }}" 
                                              method="POST" 
                                              style="display: inline;"
                                              onsubmit="return confirm('¿Seguro que deseas eliminar este registro?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm" title="Eliminar">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>

                                        @if($finance['type'] == 'debt' && isset($finance['paid_installments']) && isset($finance['installments']) && $finance['paid_installments'] < $finance['installments'])
                                            <form action="{{ route('client.debt.pay', $finance['id']) }}" 
                                                  method="POST" 
                                                  style="display: inline;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-outline-success btn-sm" title="Pagar cuota">
                                                    <i class="fas fa-money-bill-wave"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">
                                    <i class="fas fa-inbox fa-3x mb-2"></i>
                                    <p>No hay registros para este filtro</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<!-- 🆕 MODAL PARA EDITAR -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-edit"></i> Editar Transacción</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Monto</label>
                        <input type="number" step="0.01" name="amount" id="edit_amount" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha</label>
                        <input type="date" name="date" id="edit_date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Categoría</label>
                        <input type="text" name="category" id="edit_category" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripción</label>
                        <textarea name="description" id="edit_description" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function editFinance(finance) {
    document.getElementById('edit_amount').value = finance.amount;
    document.getElementById('edit_date').value = finance.date;
    document.getElementById('edit_category').value = finance.category || '';
    document.getElementById('edit_description').value = finance.description || '';
    
    document.getElementById('editForm').action = `/client/finances/${finance.id}`;
    
    const modal = new bootstrap.Modal(document.getElementById('editModal'));
    modal.show();
}
</script>

@endsection