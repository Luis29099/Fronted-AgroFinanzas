@extends('layouts.app')

@section('content')
<style>
    .income-container {
        max-width: 600px;
        margin: 120px auto 50px;
        padding: 0 20px;
    }
    
    .income-card {
        background: #1a1a1a;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5), 0 0 15px rgba(138, 201, 38, 0.2);
        overflow: hidden;
    }
    
    .income-header {
        background: linear-gradient(135deg, #8ac926 0%, #a8e05f 100%);
        color: #0b0f0c;
        padding: 25px 30px;
        font-weight: 700;
        font-size: 1.5rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        box-shadow: 0 4px 12px rgba(138, 201, 38, 0.3);
    }
    
    .income-body {
        padding: 35px 30px;
    }
    
    .form-group-income {
        margin-bottom: 25px;
    }
    
    .form-group-income label {
        display: block;
        margin-bottom: 8px;
        color: #a8e05f;
        font-weight: 600;
        font-size: 0.95rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .form-group-income input,
    .form-group-income textarea {
        width: 100%;
        padding: 14px;
        border-radius: 8px;
        border: 2px solid #333;
        background-color: #282828;
        color: #fff;
        font-size: 1rem;
        transition: all 0.3s ease;
    }
    
    .form-group-income input:focus,
    .form-group-income textarea:focus {
        border-color: #8ac926;
        outline: none;
        box-shadow: 0 0 10px rgba(138, 201, 38, 0.4);
        background-color: #2a2a2a;
    }
    
    .form-group-income textarea {
        resize: vertical;
        min-height: 100px;
    }
    
    .btn-income-submit {
        width: 100%;
        padding: 16px;
        border: none;
        border-radius: 8px;
        background: linear-gradient(135deg, #8ac926 0%, #a8e05f 100%);
        color: #0b0f0c;
        font-size: 1.1rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(138, 201, 38, 0.3);
    }
    
    .btn-income-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(138, 201, 38, 0.5);
        background: linear-gradient(135deg, #a8e05f 0%, #8ac926 100%);
    }
    
    .btn-income-submit:active {
        transform: translateY(0);
    }
    
    /* Icono decorativo */
    .income-icon {
        text-align: center;
        margin-bottom: 20px;
    }
    
    .income-icon i {
        font-size: 3rem;
        color: #8ac926;
        text-shadow: 0 0 20px rgba(138, 201, 38, 0.5);
    }
</style>

<div class="income-container">
    <div class="income-card">
        <div class="income-header">
            <i class="fas fa-plus-circle"></i> Registrar Ingreso
        </div>
        
        <div class="income-body">
            <div class="income-icon">
                <i class="fas fa-hand-holding-usd"></i>
            </div>
            
            <form action="{{ route('client.income.store') }}" method="POST">
                @csrf

                <div class="form-group-income">
                    <label for="income_amount">
                        <i class="fas fa-dollar-sign"></i> Monto
                    </label>
                    <input 
                        type="number" 
                        step="0.01" 
                        name="amount" 
                        id="income_amount" 
                        placeholder="Ej: 150000"
                        required
                    >
                </div>

                <div class="form-group-income">
                    <label for="income_date">
                        <i class="fas fa-calendar-alt"></i> Fecha
                    </label>
                    <input 
                        type="date" 
                        name="date" 
                        id="income_date" 
                        required
                    >
                </div>

                <div class="form-group-income">
                    <label for="income_description">
                        <i class="fas fa-align-left"></i> Descripción
                    </label>
                    <textarea 
                        name="description" 
                        id="income_description"
                        placeholder="Ej: Venta de productos agrícolas"
                    ></textarea>
                </div>

                <button type="submit" class="btn-income-submit">
                    <i class="fas fa-save"></i> Guardar Ingreso
                </button>
            </form>
        </div>
    </div>
</div>
@endsection