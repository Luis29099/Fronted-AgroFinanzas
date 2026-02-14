@extends('layouts.app')

@section('content')
<style>
    .inventory-container {
        max-width: 650px;
        margin: 120px auto 50px;
        padding: 0 20px;
    }
    
    .inventory-card {
        background: #1a1a1a;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5), 0 0 15px rgba(168, 85, 247, 0.2);
        overflow: hidden;
    }
    
    .inventory-header {
        background: linear-gradient(135deg, #a855f7 0%, #c084fc 100%);
        color: #fff;
        padding: 25px 30px;
        font-weight: 700;
        font-size: 1.5rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        box-shadow: 0 4px 12px rgba(168, 85, 247, 0.3);
    }
    
    .inventory-body {
        padding: 35px 30px;
    }
    
    .form-group-inventory {
        margin-bottom: 20px;
    }
    
    .form-group-inventory label {
        display: block;
        margin-bottom: 8px;
        color: #c084fc;
        font-weight: 600;
        font-size: 0.95rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .form-group-inventory input,
    .form-group-inventory textarea,
    .form-group-inventory select {
        width: 100%;
        padding: 14px;
        border-radius: 8px;
        border: 2px solid #333;
        background-color: #282828;
        color: #fff;
        font-size: 1rem;
        transition: all 0.3s ease;
    }
    
    .form-group-inventory input:focus,
    .form-group-inventory select:focus {
        border-color: #a855f7;
        outline: none;
        box-shadow: 0 0 10px rgba(168, 85, 247, 0.4);
        background-color: #2a2a2a;
    }
    
    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }
    
    .btn-inventory-submit {
        width: 100%;
        padding: 16px;
        border: none;
        border-radius: 8px;
        background: linear-gradient(135deg, #a855f7 0%, #c084fc 100%);
        color: #fff;
        font-size: 1.1rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(168, 85, 247, 0.3);
    }
    
    .btn-inventory-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(168, 85, 247, 0.5);
    }
    
    .inventory-icon {
        text-align: center;
        margin-bottom: 20px;
    }
    
    .inventory-icon i {
        font-size: 3rem;
        color: #a855f7;
        text-shadow: 0 0 20px rgba(168, 85, 247, 0.5);
    }

    @media (max-width: 768px) {
        .form-row {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="inventory-container">
    <div class="inventory-card">
        <div class="inventory-header">
            <i class="fas fa-boxes"></i> Registrar Inventario
        </div>
        
        <div class="inventory-body">
            <div class="inventory-icon">
                <i class="fas fa-warehouse"></i>
            </div>
            
            <form action="{{ route('client.inventory.store') }}" method="POST">
                @csrf

                <div class="form-group-inventory">
                    <label for="inventory_date">
                        <i class="fas fa-calendar-alt"></i> Fecha de registro *
                    </label>
                    <input 
                        type="date" 
                        name="date" 
                        id="inventory_date" 
                        required
                    >
                </div>

                <div class="form-group-inventory">
                    <label for="inventory_product">
                        <i class="fas fa-box"></i> Producto/Animal *
                    </label>
                    <input 
                        type="text" 
                        name="product_name" 
                        id="inventory_product" 
                        placeholder="Ej: Café pergamino"
                        required
                    >
                </div>

                <div class="form-group-inventory">
                    <label for="inventory_category">
                        <i class="fas fa-tag"></i> Categoría
                    </label>
                    <select name="category" id="inventory_category">
                        <option value="">Seleccionar...</option>
                        <option value="Cultivos">Cultivos</option>
                        <option value="Ganado">Ganado</option>
                        <option value="Insumos">Insumos</option>
                        <option value="Productos">Productos procesados</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>

                <div class="form-row">
                    <div class="form-group-inventory">
                        <label for="inventory_quantity">
                            <i class="fas fa-sort-numeric-up"></i> Cantidad *
                        </label>
                        <input 
                            type="number" 
                            step="0.01" 
                            name="quantity" 
                            id="inventory_quantity" 
                            placeholder="Ej: 500"
                            required
                        >
                    </div>

                    <div class="form-group-inventory">
                        <label for="inventory_unit">
                            <i class="fas fa-balance-scale"></i> Unidad *
                        </label>
                        <select name="unit" id="inventory_unit" required>
                            <option value="">Seleccionar...</option>
                            <option value="kg">Kilogramos (kg)</option>
                            <option value="litros">Litros</option>
                            <option value="cabezas">Cabezas (animales)</option>
                            <option value="unidades">Unidades</option>
                            <option value="toneladas">Toneladas</option>
                            <option value="hectareas">Hectáreas</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group-inventory">
                        <label for="inventory_unit_cost">
                            <i class="fas fa-tag"></i> Valor unitario
                        </label>
                        <input 
                            type="number" 
                            step="0.01" 
                            name="unit_cost" 
                            id="inventory_unit_cost" 
                            placeholder="Ej: 7000"
                        >
                    </div>

                    <div class="form-group-inventory">
                        <label for="inventory_amount">
                            <i class="fas fa-dollar-sign"></i> Valor total *
                        </label>
                        <input 
                            type="number" 
                            step="0.01" 
                            name="amount" 
                            id="inventory_amount" 
                            placeholder="Ej: 3500000"
                            required
                        >
                    </div>
                </div>

                <div class="form-group-inventory">
                    <label for="inventory_description">
                        <i class="fas fa-map-marker-alt"></i> Ubicación/Descripción
                    </label>
                    <textarea 
                        name="description" 
                        id="inventory_description"
                        placeholder="Ej: Bodega principal, lote 5"
                        rows="3"
                    ></textarea>
                </div>

                <button type="submit" class="btn-inventory-submit">
                    <i class="fas fa-save"></i> Guardar Inventario
                </button>
            </form>
        </div>
    </div>
</div>

<script>
// Calcular automáticamente el valor total
document.getElementById('inventory_quantity').addEventListener('input', calculateTotal);
document.getElementById('inventory_unit_cost').addEventListener('input', calculateTotal);

function calculateTotal() {
    const quantity = parseFloat(document.getElementById('inventory_quantity').value) || 0;
    const unitCost = parseFloat(document.getElementById('inventory_unit_cost').value) || 0;
    const total = quantity * unitCost;
    
    if (total > 0) {
        document.getElementById('inventory_amount').value = total.toFixed(2);
    }
}
</script>

@endsection