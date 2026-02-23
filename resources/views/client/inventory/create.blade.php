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
        font-family: 'Poppins', sans-serif;
    }
    
    .form-group-inventory input:focus,
    .form-group-inventory select:focus,
    .form-group-inventory textarea:focus {
        border-color: #a855f7;
        outline: none;
        box-shadow: 0 0 10px rgba(168, 85, 247, 0.4);
        background-color: #2a2a2a;
    }

    .form-group-inventory select option { background: #1a1a1a; }
    
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
        font-family: 'Poppins', sans-serif;
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

    /* Aviso de redirección al hato */
    .cattle-notice {
        display: flex;
        align-items: center;
        gap: 12px;
        background: rgba(245, 158, 11, 0.08);
        border: 1px solid rgba(245, 158, 11, 0.25);
        border-radius: 10px;
        padding: 14px 16px;
        margin-bottom: 24px;
        font-size: 0.82rem;
        color: #f59e0b;
        line-height: 1.5;
    }
    .cattle-notice i { font-size: 1.3rem; flex-shrink: 0; }
    .cattle-notice a {
        color: #fbbf24;
        font-weight: 700;
        text-decoration: underline;
        text-underline-offset: 2px;
    }
    .cattle-notice a:hover { color: #fff; }

    /* Campo personalizado visible/oculto */
    #custom-product-wrapper { display: none; }

    @media (max-width: 768px) {
        .form-row { grid-template-columns: 1fr; }
        .inventory-body { padding: 24px 18px; }
    }
</style>

<div class="inventory-container">
    <div class="inventory-card">
        <div class="inventory-header">
            <i class="fas fa-boxes"></i> Registrar Inventario Agrícola
        </div>
        
        <div class="inventory-body">
            <div class="inventory-icon">
                <i class="fas fa-seedling"></i>
            </div>

            {{-- Aviso sobre ganado --}}
            <div class="cattle-notice">
                <i class="fas fa-cow"></i>
                <span>
                    ¿Quieres registrar ganado o animales?
                    Gestiona cada animal individualmente en
                    <a href="{{ route('client.cattle.index') }}">Mi Hato Ganadero</a>.
                </span>
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

                {{-- Selector de tipo de producto --}}
                <div class="form-group-inventory">
                    <label for="inventory_category">
                        <i class="fas fa-tag"></i> Tipo de producto *
                    </label>
                    <select name="category" id="inventory_category" required onchange="handleCategoryChange(this)">
                        <option value="">Seleccionar...</option>
                        <optgroup label="☕ Café">
                            <option value="Café pergamino">Café pergamino</option>
                            <option value="Café cereza">Café cereza</option>
                            <option value="Café tostado">Café tostado</option>
                        </optgroup>
                        <optgroup label="🥑 Aguacate">
                            <option value="Aguacate Hass">Aguacate Hass</option>
                            <option value="Aguacate criollo">Aguacate criollo</option>
                        </optgroup>
                        <optgroup label="🌽 Otros Cultivos">
                            <option value="Maíz">Maíz</option>
                            <option value="Fríjol">Fríjol</option>
                            <option value="Caña">Caña</option>
                            <option value="Plátano">Plátano</option>
                            <option value="Yuca">Yuca</option>
                        </optgroup>
                        <optgroup label="🧪 Insumos">
                            <option value="Fertilizante">Fertilizante</option>
                            <option value="Plaguicida">Plaguicida</option>
                            <option value="Semillas">Semillas</option>
                            <option value="Abono orgánico">Abono orgánico</option>
                        </optgroup>
                        <optgroup label="📦 Otros">
                            <option value="Producto procesado">Producto procesado</option>
                            <option value="otro">Otro (especificar)</option>
                        </optgroup>
                    </select>
                </div>

                {{-- Campo personalizado para "Otro" --}}
                <div class="form-group-inventory" id="custom-product-wrapper">
                    <label for="inventory_product">
                        <i class="fas fa-pencil"></i> Especifica el producto *
                    </label>
                    <input 
                        type="text" 
                        name="product_name" 
                        id="inventory_product" 
                        placeholder="Ej: Mora, Tomate de árbol..."
                    >
                </div>

                {{-- Campo oculto product_name que se autocompleta desde la categoría --}}
                <input type="hidden" name="product_name" id="product_name_hidden">

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
                            <option value="toneladas">Toneladas</option>
                            <option value="litros">Litros</option>
                            <option value="arrobas">Arrobas</option>
                            <option value="bultos">Bultos</option>
                            <option value="unidades">Unidades</option>
                            <option value="cajas">Cajas</option>
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
                        <i class="fas fa-map-marker-alt"></i> Ubicación / Descripción
                    </label>
                    <textarea 
                        name="description" 
                        id="inventory_description"
                        placeholder="Ej: Bodega principal, lote 5, cosecha de marzo..."
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
// ── Calcular valor total automáticamente ──────────────────────
document.getElementById('inventory_quantity').addEventListener('input', calculateTotal);
document.getElementById('inventory_unit_cost').addEventListener('input', calculateTotal);

function calculateTotal() {
    const quantity = parseFloat(document.getElementById('inventory_quantity').value) || 0;
    const unitCost = parseFloat(document.getElementById('inventory_unit_cost').value) || 0;
    const total    = quantity * unitCost;
    if (total > 0) {
        document.getElementById('inventory_amount').value = total.toFixed(2);
    }
}

// ── Mostrar/ocultar campo personalizado ───────────────────────
function handleCategoryChange(select) {
    const customWrapper = document.getElementById('custom-product-wrapper');
    const customInput   = document.getElementById('inventory_product');
    const hiddenInput   = document.getElementById('product_name_hidden');

    if (select.value === 'otro') {
        // Mostrar campo de texto libre
        customWrapper.style.display = 'block';
        customInput.required = true;
        hiddenInput.name = ''; // desactivar el hidden para que no duplique
        customInput.name = 'product_name';
    } else {
        // Ocultar campo personalizado y copiar la categoría al hidden
        customWrapper.style.display = 'none';
        customInput.required = false;
        customInput.name = '';            // desactivar el visible
        hiddenInput.name = 'product_name';
        hiddenInput.value = select.value; // el product_name = la categoría elegida
    }
}

// Inicializar al cargar
document.addEventListener('DOMContentLoaded', () => {
    const sel = document.getElementById('inventory_category');
    if (sel.value) handleCategoryChange(sel);
});
</script>

@endsection