@extends('layouts.app')

@section('content')
<style>
    .expense-container {
        max-width: 600px;
        margin: 120px auto 50px;
        padding: 0 20px;
    }
    
    .expense-card {
        background: #1a1a1a;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5), 0 0 15px rgba(255, 107, 107, 0.2);
        overflow: hidden;
    }
    
    .expense-header {
        background: linear-gradient(135deg, #ff6b6b 0%, #ff8787 100%);
        color: #fff;
        padding: 25px 30px;
        font-weight: 700;
        font-size: 1.5rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        box-shadow: 0 4px 12px rgba(255, 107, 107, 0.3);
    }
    
    .expense-body {
        padding: 35px 30px;
    }
    
    .form-group-expense {
        margin-bottom: 25px;
    }
    
    .form-group-expense label {
        display: block;
        margin-bottom: 8px;
        color: #ff8787;
        font-weight: 600;
        font-size: 0.95rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .form-group-expense input,
    .form-group-expense textarea {
        width: 100%;
        padding: 14px;
        border-radius: 8px;
        border: 2px solid #333;
        background-color: #282828;
        color: #fff;
        font-size: 1rem;
        transition: all 0.3s ease;
    }
    
    .form-group-expense input:focus,
    .form-group-expense textarea:focus {
        border-color: #ff6b6b;
        outline: none;
        box-shadow: 0 0 10px rgba(255, 107, 107, 0.4);
        background-color: #2a2a2a;
    }
    
    .form-group-expense textarea {
        resize: vertical;
        min-height: 100px;
    }
    
    .btn-expense-submit {
        width: 100%;
        padding: 16px;
        border: none;
        border-radius: 8px;
        background: linear-gradient(135deg, #ff6b6b 0%, #ff8787 100%);
        color: #fff;
        font-size: 1.1rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(255, 107, 107, 0.3);
    }
    
    .btn-expense-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(255, 107, 107, 0.5);
        background: linear-gradient(135deg, #e84c4c 0%, #ff6b6b 100%);
    }
    
    .btn-expense-submit:active {
        transform: translateY(0);
    }
    
    /* Icono decorativo */
    .expense-icon {
        text-align: center;
        margin-bottom: 20px;
    }
    
    .expense-icon i {
        font-size: 3rem;
        color: #ff6b6b;
        text-shadow: 0 0 20px rgba(255, 107, 107, 0.5);
    }
</style>

<div class="expense-container">
    <div class="expense-card">
        <div class="expense-header">
            <i class="fas fa-minus-circle"></i> Registrar Gasto
        </div>
        
        <div class="expense-body">
            <div class="expense-icon">
                <i class="fas fa-money-bill-wave"></i>
            </div>
            
            <form action="{{ route('client.expense.store') }}" method="POST">
                @csrf

                <div class="form-group-expense">
                    <label for="expense_amount">
                        <i class="fas fa-dollar-sign"></i> Monto
                    </label>
                    <input 
                        type="number" 
                        step="0.01" 
                        name="amount" 
                        id="expense_amount" 
                        placeholder="Ej: 50000"
                        required
                    >
                </div>

                <div class="form-group-expense">
                    <label for="expense_date">
                        <i class="fas fa-calendar-alt"></i> Fecha
                    </label>
                    <input 
                        type="date" 
                        name="date" 
                        id="expense_date" 
                        required
                    >
                </div>

                <div class="form-group-expense">
                    <label for="expense_description">
                        <i class="fas fa-align-left"></i> Descripción
                    </label>
                    <textarea 
                        name="description" 
                        id="expense_description"
                        placeholder="Ej: Compra de fertilizantes"
                    ></textarea>
                </div>

                <button type="submit" class="btn-expense-submit">
                    <i class="fas fa-save"></i> Guardar Gasto
                </button>
            </form>
        </div>
    </div>
</div>
@endsection