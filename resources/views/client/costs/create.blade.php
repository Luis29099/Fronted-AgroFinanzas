@extends('layouts.app')

@section('content')
<style>
    .costs-container {
        max-width: 650px;
        margin: 120px auto 50px;
        padding: 0 20px;
    }
    
    .costs-card {
        background: #1a1a1a;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5), 0 0 15px rgba(20, 184, 166, 0.2);
        overflow: hidden;
    }
    
    .costs-header {
        background: linear-gradient(135deg, #14b8a6 0%, #2dd4bf 100%);
        color: #fff;
        padding: 25px 30px;
        font-weight: 700;
        font-size: 1.5rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        box-shadow: 0 4px 12px rgba(20, 184, 166, 0.3);
    }
    
    .costs-body {
        padding: 35px 30px;
    }
    
    .form-group-costs {
        margin-bottom: 20px;
    }
    
    .form-group-costs label {
        display: block;
        margin-bottom: 8px;
        color: #2dd4bf;
        font-weight: 600;
        font-size: 0.95rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .form-group-costs input,
    .form-group-costs textarea,
    .form-group-costs select {
        width: 100%;
        padding: 14px;
        border-radius: 8px;
        border: 2px solid #333;
        background-color: #282828;
        color: #fff;
        font-size: 1rem;
        transition: all 0.3s ease;
    }
    
    .form-group-costs input:focus,
    .form-group-costs select:focus {
        border-color: #14b8a6;
        outline: none;
        box-shadow: 0 0 10px rgba(20, 184, 166, 0.4);
        background-color: #2a2a2a;
    }
    
    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }
    
    .btn-costs-submit {
        width: 100%;
        padding: 16px;
        border: none;
        border-radius: 8px;
        background: linear-gradient(135deg, #14b8a6 0%, #2dd4bf 100%);
        color: #fff;
        font-size: 1.1rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(20, 184, 166, 0.3);
    }
    
    .btn-costs-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(20, 184, 166, 0.5);
    }
    
    .costs-icon {
        text-align: center;
        margin-bottom: 20px;
    }
    
    .costs-icon i {
        font-size: 3rem;
        color: #14b8a6;
        text-shadow: 0 0 20px rgba(20, 184, 166, 0.5);
    }

    @media (max-width: 768px) {
        .form-row {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="costs-container">
    <div class="costs-card">
        <div class="costs-header">
            <i class="fas fa-seedling"></i> Registrar Costos de Producción
        </div>
        
        <div class="costs-body">
            <div class="costs-icon">
                <i class="fas fa-tractor"></i>
            </div>
            
            <form action="{{ route('client.costs.store') }}" method="POST">
                @csrf

                <div class="form-row">
                    <div class="form-group-costs">
                        <label for="costs_date">
                            <i class="fas fa-calendar-alt"></i> Fecha *
                        </label>
                        <input 
                            type="date" 
                            name="date" 
                            id="costs_date" 
                            required
                        >
                    </div>

                    <div class="form-group-costs">
                        <label for="costs_amount">
                            <i class="fas fa-dollar-sign"></i> Costo total *
                        </label>
                        <input 
                            type="number" 
                            step="0.01" 
                            name="amount" 
                            id="costs_amount" 
                            placeholder="Ej: 2500000"
                            required
                        >
                    </div>
                </div>

                <div class="form-group-costs">
                    <label for="costs_crop">
                        <i class="fas fa-leaf"></i> Cultivo/Producción *
                    </label>
                    <input 
                        type="text" 
                        name="crop_name" 
                        id="costs_crop" 
                        placeholder="Ej: Maíz"
                        required
                    >
                </div>

                <div class="form-row">
                    <div class="form-group-costs">
                        <label for="costs_area">
                            <i class="fas fa-map"></i> Área (hectáreas)
                        </label>
                        <input 
                            type="number" 
                            step="0.01" 
                            name="area" 
                            id="costs_area" 
                            placeholder="Ej: 5"
                        >
                    </div>

                    <div class="form-group-costs">
                        <label for="costs_per_unit">
                            <i class="fas fa-calculator"></i> Costo/Hectárea
                        </label>
                        <input 
                            type="number" 
                            step="0.01" 
                            name="cost_per_unit" 
                            id="costs_per_unit" 
                            placeholder="Ej: 500000"
                        >
                    </div>
                </div>

                <div class="form-group-costs">
                    <label for="costs_cycle">
                        <i class="fas fa-sync-alt"></i> Ciclo de producción
                    </label>
                    <input 
                        type="text" 
                        name="production_cycle" 
                        id="costs_cycle" 
                        placeholder="Ej: Semestre A 2024"
                    >
                </div>

                <div class="form-group-costs">
                    <label for="costs_category">
                        <i class="fas fa-tag"></i> Tipo de costo
                    </label>
                    <select name="category" id="costs_category">
                        <option value="">Seleccionar...</option>
                        <option value="Semillas">Semillas</option>
                        <option value="Fertilizante">Fertilizante</option>
                        <option value="Mano de obra">Mano de obra</option>
                        <option value="Maquinaria">Uso de maquinaria</option>
                        <option value="Riego">Sistema de riego</option>
                        <option value="Plaguicidas">Plaguicidas</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>

                <div class="form-group-costs">
                    <label for="costs_description">
                        <i class="fas fa-align-left"></i> Descripción
                    </label>
                    <textarea 
                        name="description" 
                        id="costs_description"
                        placeholder="Ej: Costos de siembra y preparación del terreno"
                        rows="3"
                    ></textarea>
                </div>

                <button type="submit" class="btn-costs-submit">
                    <i class="fas fa-save"></i> Guardar Costos
                </button>
            </form>
        </div>
    </div>
</div>

<script>
// Calcular costo por hectárea automáticamente
document.getElementById('costs_amount').addEventListener('input', calculateCostPerUnit);
document.getElementById('costs_area').addEventListener('input', calculateCostPerUnit);

function calculateCostPerUnit() {
    const amount = parseFloat(document.getElementById('costs_amount').value) || 0;
    const area = parseFloat(document.getElementById('costs_area').value) || 0;
    
    if (amount > 0 && area > 0) {
        const costPerUnit = amount / area;
        document.getElementById('costs_per_unit').value = costPerUnit.toFixed(2);
    }
}
</script>

@endsection