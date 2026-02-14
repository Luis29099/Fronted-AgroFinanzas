@extends('layouts.app')

@section('content')
<style>
    .investment-container {
        max-width: 600px;
        margin: 120px auto 50px;
        padding: 0 20px;
    }
    
    .investment-card {
        background: #1a1a1a;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5), 0 0 15px rgba(59, 130, 246, 0.2);
        overflow: hidden;
    }
    
    .investment-header {
        background: linear-gradient(135deg, #3b82f6 0%, #60a5fa 100%);
        color: #fff;
        padding: 25px 30px;
        font-weight: 700;
        font-size: 1.5rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
    }
    
    .investment-body {
        padding: 35px 30px;
    }
    
    .form-group-investment {
        margin-bottom: 25px;
    }
    
    .form-group-investment label {
        display: block;
        margin-bottom: 8px;
        color: #60a5fa;
        font-weight: 600;
        font-size: 0.95rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .form-group-investment input,
    .form-group-investment textarea,
    .form-group-investment select {
        width: 100%;
        padding: 14px;
        border-radius: 8px;
        border: 2px solid #333;
        background-color: #282828;
        color: #fff;
        font-size: 1rem;
        transition: all 0.3s ease;
    }
    
    .form-group-investment input:focus,
    .form-group-investment textarea:focus,
    .form-group-investment select:focus {
        border-color: #3b82f6;
        outline: none;
        box-shadow: 0 0 10px rgba(59, 130, 246, 0.4);
        background-color: #2a2a2a;
    }
    
    .form-group-investment textarea {
        resize: vertical;
        min-height: 100px;
    }
    
    .btn-investment-submit {
        width: 100%;
        padding: 16px;
        border: none;
        border-radius: 8px;
        background: linear-gradient(135deg, #3b82f6 0%, #60a5fa 100%);
        color: #fff;
        font-size: 1.1rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
    }
    
    .btn-investment-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(59, 130, 246, 0.5);
        background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
    }
    
    .investment-icon {
        text-align: center;
        margin-bottom: 20px;
    }
    
    .investment-icon i {
        font-size: 3rem;
        color: #3b82f6;
        text-shadow: 0 0 20px rgba(59, 130, 246, 0.5);
    }
</style>

<div class="investment-container">
    <div class="investment-card">
        <div class="investment-header">
            <i class="fas fa-building"></i> Registrar Inversión
        </div>
        
        <div class="investment-body">
            <div class="investment-icon">
                <i class="fas fa-chart-line"></i>
            </div>
            
            <form action="{{ route('client.investment.store') }}" method="POST">
                @csrf

                <div class="form-group-investment">
                    <label for="investment_amount">
                        <i class="fas fa-dollar-sign"></i> Monto *
                    </label>
                    <input 
                        type="number" 
                        step="0.01" 
                        name="amount" 
                        id="investment_amount" 
                        placeholder="Ej: 15000000"
                        required
                    >
                </div>

                <div class="form-group-investment">
                    <label for="investment_date">
                        <i class="fas fa-calendar-alt"></i> Fecha de compra *
                    </label>
                    <input 
                        type="date" 
                        name="date" 
                        id="investment_date" 
                        required
                    >
                </div>

                <div class="form-group-investment">
                    <label for="investment_asset">
                        <i class="fas fa-tools"></i> Nombre del activo *
                    </label>
                    <input 
                        type="text" 
                        name="asset_name" 
                        id="investment_asset" 
                        placeholder="Ej: Tractor John Deere"
                        required
                    >
                </div>

                <div class="form-group-investment">
                    <label for="investment_category">
                        <i class="fas fa-tag"></i> Tipo de inversión
                    </label>
                    <select name="category" id="investment_category">
                        <option value="">Seleccionar...</option>
                        <option value="Maquinaria">Maquinaria</option>
                        <option value="Infraestructura">Infraestructura</option>
                        <option value="Terreno">Terreno</option>
                        <option value="Vehículo">Vehículo</option>
                        <option value="Equipo">Equipo</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>

                <div class="form-group-investment">
                    <label for="investment_depreciation">
                        <i class="fas fa-chart-line"></i> Años de depreciación
                    </label>
                    <input 
                        type="number" 
                        name="depreciation_years" 
                        id="investment_depreciation" 
                        placeholder="Ej: 10"
                        min="1"
                    >
                </div>

                <div class="form-group-investment">
                    <label for="investment_description">
                        <i class="fas fa-align-left"></i> Descripción
                    </label>
                    <textarea 
                        name="description" 
                        id="investment_description"
                        placeholder="Ej: Tractor para labores de labranza"
                    ></textarea>
                </div>

                <button type="submit" class="btn-investment-submit">
                    <i class="fas fa-save"></i> Guardar Inversión
                </button>
            </form>
        </div>
    </div>
</div>
@endsection