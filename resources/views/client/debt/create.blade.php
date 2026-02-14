@extends('layouts.app')

@section('content')
<style>
    .debt-container {
        max-width: 650px;
        margin: 120px auto 50px;
        padding: 0 20px;
    }
    
    .debt-card {
        background: #1a1a1a;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5), 0 0 15px rgba(245, 158, 11, 0.2);
        overflow: hidden;
    }
    
    .debt-header {
        background: linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%);
        color: #000;
        padding: 25px 30px;
        font-weight: 700;
        font-size: 1.5rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
    }
    
    .debt-body {
        padding: 35px 30px;
    }
    
    .form-group-debt {
        margin-bottom: 20px;
    }
    
    .form-group-debt label {
        display: block;
        margin-bottom: 8px;
        color: #fbbf24;
        font-weight: 600;
        font-size: 0.95rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .form-group-debt input,
    .form-group-debt textarea,
    .form-group-debt select {
        width: 100%;
        padding: 14px;
        border-radius: 8px;
        border: 2px solid #333;
        background-color: #282828;
        color: #fff;
        font-size: 1rem;
        transition: all 0.3s ease;
    }
    
    .form-group-debt input:focus,
    .form-group-debt textarea:focus,
    .form-group-debt select:focus {
        border-color: #f59e0b;
        outline: none;
        box-shadow: 0 0 10px rgba(245, 158, 11, 0.4);
        background-color: #2a2a2a;
    }
    
    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }
    
    .btn-debt-submit {
        width: 100%;
        padding: 16px;
        border: none;
        border-radius: 8px;
        background: linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%);
        color: #000;
        font-size: 1.1rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
    }
    
    .btn-debt-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(245, 158, 11, 0.5);
    }
    
    .debt-icon {
        text-align: center;
        margin-bottom: 20px;
    }
    
    .debt-icon i {
        font-size: 3rem;
        color: #f59e0b;
        text-shadow: 0 0 20px rgba(245, 158, 11, 0.5);
    }

    @media (max-width: 768px) {
        .form-row {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="debt-container">
    <div class="debt-card">
        <div class="debt-header">
            <i class="fas fa-credit-card"></i> Registrar Deuda/Préstamo
        </div>
        
        <div class="debt-body">
            <div class="debt-icon">
                <i class="fas fa-hand-holding-usd"></i>
            </div>
            
            <form action="{{ route('client.debt.store') }}" method="POST">
                @csrf

                <div class="form-group-debt">
                    <label for="debt_amount">
                        <i class="fas fa-dollar-sign"></i> Monto del préstamo *
                    </label>
                    <input 
                        type="number" 
                        step="0.01" 
                        name="amount" 
                        id="debt_amount" 
                        placeholder="Ej: 50000000"
                        required
                    >
                </div>

                <div class="form-row">
                    <div class="form-group-debt">
                        <label for="debt_date">
                            <i class="fas fa-calendar-alt"></i> Fecha *
                        </label>
                        <input 
                            type="date" 
                            name="date" 
                            id="debt_date" 
                            required
                        >
                    </div>

                    <div class="form-group-debt">
                        <label for="debt_due">
                            <i class="fas fa-calendar-check"></i> Vencimiento
                        </label>
                        <input 
                            type="date" 
                            name="due_date" 
                            id="debt_due"
                        >
                    </div>
                </div>

                <div class="form-group-debt">
                    <label for="debt_creditor">
                        <i class="fas fa-university"></i> Acreedor/Banco *
                    </label>
                    <input 
                        type="text" 
                        name="creditor" 
                        id="debt_creditor" 
                        placeholder="Ej: Banco Agrario"
                        required
                    >
                </div>

                <div class="form-row">
                    <div class="form-group-debt">
                        <label for="debt_interest">
                            <i class="fas fa-percentage"></i> Tasa de interés (%)
                        </label>
                        <input 
                            type="number" 
                            step="0.01" 
                            name="interest_rate" 
                            id="debt_interest" 
                            placeholder="Ej: 8.5"
                            min="0" 
                            max="100"
                        >
                    </div>

                    <div class="form-group-debt">
                        <label for="debt_installments">
                            <i class="fas fa-list-ol"></i> Número de cuotas
                        </label>
                        <input 
                            type="number" 
                            name="installments" 
                            id="debt_installments" 
                            placeholder="Ej: 24"
                            min="1"
                        >
                    </div>
                </div>

                <div class="form-group-debt">
                    <label for="debt_paid">
                        <i class="fas fa-check-circle"></i> Cuotas ya pagadas
                    </label>
                    <input 
                        type="number" 
                        name="paid_installments" 
                        id="debt_paid" 
                        placeholder="Ej: 0"
                        min="0"
                        value="0"
                    >
                </div>

                <div class="form-group-debt">
                    <label for="debt_description">
                        <i class="fas fa-align-left"></i> Descripción
                    </label>
                    <textarea 
                        name="description" 
                        id="debt_description"
                        placeholder="Ej: Préstamo para mejoras en infraestructura"
                        rows="3"
                    ></textarea>
                </div>

                <button type="submit" class="btn-debt-submit">
                    <i class="fas fa-save"></i> Guardar Deuda
                </button>
            </form>
        </div>
    </div>
</div>
@endsection