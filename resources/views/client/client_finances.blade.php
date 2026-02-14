@extends('layouts.app')

@section('content')
<style>
/* ========================================
   VARIABLES DE COLOR MEJORADAS
   ======================================== */
:root {
    --primary-green: #8ac926;
    --light-green: #a8e05f;
    --dark-green: #6fa019;
    
    --income-color: #10b981;
    --expense-color: #ef4444;
    --investment-color: #3b82f6;
    --debt-color: #f59e0b;
    --inventory-color: #a855f7;
    --costs-color: #14b8a6;
    
    --bg-dark: #0f172a;
    --bg-card: #1e293b;
    --bg-hover: #334155;
    --border-color: #475569;
    --text-primary: #f8fafc;
    --text-secondary: #cbd5e1;
    --text-muted: #94a3b8;
}

/* ========================================
   CONTAINER PRINCIPAL
   ======================================== */
.finance-dashboard {
    max-width: 1400px;
    margin: 100px auto 50px;
    padding: 0 24px;
    animation: fadeInUp 0.6s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* ========================================
   ALERTAS MEJORADAS
   ======================================== */
.modern-alert {
    padding: 16px 20px;
    border-radius: 12px;
    margin-bottom: 24px;
    display: flex;
    align-items: center;
    gap: 12px;
    font-weight: 500;
    animation: slideInRight 0.5s ease-out;
    backdrop-filter: blur(10px);
}

@keyframes slideInRight {
    from {
        opacity: 0;
        transform: translateX(-20px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.modern-alert.success {
    background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(16, 185, 129, 0.05) 100%);
    border-left: 4px solid var(--income-color);
    color: var(--income-color);
}

.modern-alert.error {
    background: linear-gradient(135deg, rgba(239, 68, 68, 0.1) 0%, rgba(239, 68, 68, 0.05) 100%);
    border-left: 4px solid var(--expense-color);
    color: var(--expense-color);
}

.modern-alert i {
    font-size: 1.5rem;
}

/* ========================================
   HEADER PRINCIPAL
   ======================================== */
.dashboard-header {
    background: linear-gradient(135deg, var(--bg-card) 0%, var(--bg-dark) 100%);
    border-radius: 16px;
    padding: 32px;
    margin-bottom: 32px;
    border: 1px solid var(--border-color);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
}

.dashboard-title {
    font-size: 2.5rem;
    font-weight: 800;
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--light-green) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 16px;
}

.dashboard-title i {
    color: var(--primary-green);
    -webkit-text-fill-color: var(--primary-green);
}

/* ========================================
   BOTONES DE FILTRO MODERNOS
   ======================================== */
.filter-section {
    margin-bottom: 32px;
}

.filter-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
    gap: 12px;
}

.filter-button {
    padding: 14px 20px;
    border-radius: 12px;
    border: 2px solid transparent;
    background: var(--bg-card);
    color: var(--text-secondary);
    text-decoration: none;
    font-weight: 600;
    font-size: 0.95rem;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    position: relative;
    overflow: hidden;
}

.filter-button::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
    transition: left 0.5s;
}

.filter-button:hover::before {
    left: 100%;
}

.filter-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.4);
}

.filter-button.active {
    border-color: currentColor;
    box-shadow: 0 8px 24px currentColor, inset 0 0 20px rgba(255,255,255,0.05);
}

.filter-button.all { color: var(--text-primary); }
.filter-button.all.active { border-color: var(--primary-green); color: var(--primary-green); }

.filter-button.income { color: var(--income-color); }
.filter-button.income.active { border-color: var(--income-color); background: rgba(16, 185, 129, 0.1); }

.filter-button.expense { color: var(--expense-color); }
.filter-button.expense.active { border-color: var(--expense-color); background: rgba(239, 68, 68, 0.1); }

.filter-button.investment { color: var(--investment-color); }
.filter-button.investment.active { border-color: var(--investment-color); background: rgba(59, 130, 246, 0.1); }

.filter-button.debt { color: var(--debt-color); }
.filter-button.debt.active { border-color: var(--debt-color); background: rgba(245, 158, 11, 0.1); }

.filter-button.inventory { color: var(--inventory-color); }
.filter-button.inventory.active { border-color: var(--inventory-color); background: rgba(168, 85, 247, 0.1); }

.filter-button.costs { color: var(--costs-color); }
.filter-button.costs.active { border-color: var(--costs-color); background: rgba(20, 184, 166, 0.1); }

/* ========================================
   TARJETAS DE RESUMEN MEJORADAS
   ======================================== */
.summary-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 20px;
    margin-bottom: 32px;
}

.summary-card {
    background: var(--bg-card);
    border-radius: 16px;
    padding: 24px;
    border: 1px solid var(--border-color);
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
}

.summary-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 4px;
    height: 100%;
    background: currentColor;
}

.summary-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 32px rgba(0, 0, 0, 0.5);
    border-color: currentColor;
}

.summary-card.income { color: var(--income-color); }
.summary-card.expense { color: var(--expense-color); }
.summary-card.balance { color: var(--primary-green); }
.summary-card.investment { color: var(--investment-color); }
.summary-card.debt { color: var(--debt-color); }
.summary-card.inventory { color: var(--inventory-color); }
.summary-card.costs { color: var(--costs-color); }

.summary-card-header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 16px;
    color: var(--text-secondary);
    font-size: 0.9rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.summary-card-icon {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    background: rgba(255, 255, 255, 0.05);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    color: currentColor;
}

.summary-card-value {
    font-size: 2rem;
    font-weight: 700;
    color: var(--text-primary);
    margin: 0;
}

/* ========================================
   TABLA MODERNA
   ======================================== */
.table-container {
    background: var(--bg-card);
    border-radius: 16px;
    border: 1px solid var(--border-color);
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    margin-bottom: 40px;
}

.modern-table {
    width: 100%;
    border-collapse: collapse;
}

.modern-table thead {
    background: var(--bg-dark);
    position: sticky;
    top: 0;
    z-index: 10;
}

.modern-table th {
    padding: 20px 24px;
    text-align: left;
    font-weight: 700;
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    color: var(--primary-green);
    border-bottom: 2px solid var(--primary-green);
}

.modern-table tbody tr {
    border-bottom: 1px solid rgba(71, 85, 105, 0.3);
    transition: all 0.2s ease;
}

.modern-table tbody tr:hover {
    background: var(--bg-hover);
    transform: scale(1.01);
}

.modern-table td {
    padding: 20px 24px;
    color: var(--text-secondary);
    font-size: 0.95rem;
}

.date-column {
    color: var(--text-muted);
    font-family: 'Courier New', monospace;
    font-size: 0.9rem;
}

.amount-column {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--text-primary);
}

/* ========================================
   BADGES MODERNOS
   ======================================== */
.type-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.3px;
    border: 1.5px solid currentColor;
}

.badge-income {
    background: rgba(16, 185, 129, 0.15);
    color: var(--income-color);
}

.badge-expense {
    background: rgba(239, 68, 68, 0.15);
    color: var(--expense-color);
}

.badge-investment {
    background: rgba(59, 130, 246, 0.15);
    color: var(--investment-color);
}

.badge-debt {
    background: rgba(245, 158, 11, 0.15);
    color: var(--debt-color);
}

.badge-inventory {
    background: rgba(168, 85, 247, 0.15);
    color: var(--inventory-color);
}

.badge-costs {
    background: rgba(20, 184, 166, 0.15);
    color: var(--costs-color);
}

.category-badge {
    display: inline-block;
    padding: 4px 10px;
    border-radius: 6px;
    font-size: 0.75rem;
    font-weight: 500;
    background: rgba(255, 255, 255, 0.05);
    color: var(--text-muted);
    margin-top: 4px;
}

/* ========================================
   DETALLES ESPECÍFICOS
   ======================================== */
.details-content {
    display: flex;
    flex-direction: column;
    gap: 6px;
}

.detail-item {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 0.9rem;
    color: var(--text-muted);
}

.detail-item i {
    color: currentColor;
    width: 16px;
}

.progress-indicator {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 4px 10px;
    border-radius: 12px;
    background: rgba(16, 185, 129, 0.1);
    color: var(--income-color);
    font-size: 0.8rem;
    font-weight: 600;
}

/* ========================================
   BOTONES DE ACCIÓN MODERNOS
   ======================================== */
.action-buttons {
    display: flex;
    gap: 8px;
}

.action-btn {
    width: 36px;
    height: 36px;
    border-radius: 8px;
    border: 1.5px solid transparent;
    background: rgba(255, 255, 255, 0.05);
    color: var(--text-secondary);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s ease;
    font-size: 0.9rem;
}

.action-btn:hover {
    transform: scale(1.1);
}

.action-btn.edit {
    border-color: var(--investment-color);
    color: var(--investment-color);
}

.action-btn.edit:hover {
    background: var(--investment-color);
    color: white;
    box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
}

.action-btn.delete {
    border-color: var(--expense-color);
    color: var(--expense-color);
}

.action-btn.delete:hover {
    background: var(--expense-color);
    color: white;
    box-shadow: 0 4px 12px rgba(239, 68, 68, 0.4);
}

.action-btn.pay {
    border-color: var(--income-color);
    color: var(--income-color);
}

.action-btn.pay:hover {
    background: var(--income-color);
    color: white;
    box-shadow: 0 4px 12px rgba(16, 185, 129, 0.4);
}

/* ========================================
   EMPTY STATE
   ======================================== */
.empty-state {
    text-align: center;
    padding: 80px 24px;
    color: var(--text-muted);
}

.empty-state i {
    font-size: 4rem;
    margin-bottom: 20px;
    opacity: 0.3;
}

.empty-state-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--text-secondary);
    margin-bottom: 8px;
}

.empty-state-text {
    font-size: 0.95rem;
}

/* ========================================
   MODAL MEJORADO
   ======================================== */
.modal-content {
    background: var(--bg-card);
    border: 1px solid var(--border-color);
    border-radius: 16px;
}

.modal-header {
    background: var(--bg-dark);
    border-bottom: 1px solid var(--border-color);
    padding: 24px;
    border-radius: 16px 16px 0 0;
}

.modal-title {
    color: var(--primary-green);
    font-weight: 700;
    font-size: 1.5rem;
    display: flex;
    align-items: center;
    gap: 12px;
}

.modal-body {
    padding: 32px 24px;
}

.modal-body .form-label {
    color: var(--text-secondary);
    font-weight: 600;
    font-size: 0.9rem;
    margin-bottom: 8px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.modal-body .form-control {
    background: var(--bg-dark);
    border: 2px solid var(--border-color);
    color: var(--text-primary);
    border-radius: 8px;
    padding: 12px;
    transition: all 0.3s ease;
}

.modal-body .form-control:focus {
    border-color: var(--primary-green);
    box-shadow: 0 0 0 3px rgba(138, 201, 38, 0.1);
    background: var(--bg-hover);
}

.modal-footer {
    background: var(--bg-dark);
    border-top: 1px solid var(--border-color);
    padding: 20px 24px;
    border-radius: 0 0 16px 16px;
}

.btn-primary {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--light-green) 100%);
    border: none;
    color: var(--bg-dark);
    font-weight: 700;
    padding: 12px 24px;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(138, 201, 38, 0.4);
}

.btn-secondary {
    background: var(--bg-hover);
    border: 2px solid var(--border-color);
    color: var(--text-secondary);
    font-weight: 600;
    padding: 12px 24px;
    border-radius: 8px;
}

/* ========================================
   SECCIÓN DE GRÁFICOS
   ======================================== */
.charts-section {
    margin-top: 48px;
    margin-bottom: 40px;
}

.charts-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 32px;
}

.charts-title {
    font-size: 2rem;
    font-weight: 700;
    color: var(--primary-green);
}

.download-btn {
    padding: 12px 24px;
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--light-green) 100%);
    color: var(--bg-dark);
    border: none;
    border-radius: 8px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 8px;
}

.download-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(138, 201, 38, 0.4);
}

.charts-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: 24px;
}

.chart-card {
    background: var(--bg-card);
    border-radius: 16px;
    padding: 24px;
    border: 1px solid var(--border-color);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
}

.chart-card-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 20px;
    text-align: center;
}

.chart-canvas {
    position: relative;
    height: 300px;
}

/* ========================================
   CALCULADORA FLOTANTE
   ======================================== */
#calc-widget {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 60px;
    height: 60px;
    background: var(--bg-card);
    border: 2px solid var(--primary-green);
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    box-shadow: 0 0 14px var(--primary-green), inset 0 0 6px var(--primary-green);
    transition: 0.25s ease;
    z-index: 9999;
}

#calc-widget:hover {
    transform: scale(1.1);
    box-shadow: 0 0 22px var(--primary-green), inset 0 0 10px var(--primary-green);
}

#calc-widget i {
    font-size: 1.5rem;
    color: var(--primary-green);
}

.calc-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: 999999;
}

.calc-modal.hidden {
    display: none;
}

.calc-container {
    width: 260px;
    background: var(--bg-card);
    border: 2px solid var(--primary-green);
    padding: 15px;
    border-radius: 12px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.5), 0 0 20px rgba(138, 201, 38, 0.3);
    position: absolute;
    top: 120px;
    left: 120px;
}

.calc-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: var(--primary-green);
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
    cursor: grab;
    padding: 8px;
    border-radius: 6px;
    background: rgba(138, 201, 38, 0.1);
}

.calc-header:active {
    cursor: grabbing;
}

.calc-close {
    background: none;
    border: none;
    color: var(--primary-green);
    font-size: 22px;
    cursor: pointer;
    transition: all 0.2s ease;
}

.calc-close:hover {
    color: var(--expense-color);
    transform: scale(1.2);
}

.calc-screen {
    width: 100%;
    padding: 12px;
    font-size: 22px;
    background: var(--bg-dark);
    border: 2px solid var(--border-color);
    color: var(--primary-green);
    border-radius: 8px;
    text-align: right;
    margin-bottom: 12px;
    font-family: 'Courier New', monospace;
}

.calc-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 8px;
}

.calc-grid button {
    padding: 12px;
    font-size: 18px;
    background: var(--bg-dark);
    border: 1px solid var(--border-color);
    color: var(--text-primary);
    border-radius: 8px;
    cursor: pointer;
    transition: 0.2s ease;
    font-weight: 600;
}

.calc-grid button:hover {
    background: var(--primary-green);
    color: var(--bg-dark);
    box-shadow: 0 0 12px rgba(138, 201, 38, 0.5);
    transform: scale(1.05);
}

.calc-grid button.op {
    background: var(--bg-hover);
    color: var(--primary-green);
}

.calc-grid button.equal {
    background: var(--primary-green);
    color: var(--bg-dark);
    font-weight: bold;
    grid-column: span 1;
}

.calc-grid button.equal:hover {
    background: var(--light-green);
}

/* ========================================
   RESPONSIVE
   ======================================== */
@media (max-width: 768px) {
    .dashboard-title {
        font-size: 1.8rem;
    }
    
    .filter-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .summary-grid {
        grid-template-columns: 1fr;
    }
    
    .modern-table th,
    .modern-table td {
        padding: 12px;
        font-size: 0.85rem;
    }
    
    .action-buttons {
        flex-direction: column;
    }
    
    .charts-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<div class="finance-dashboard">
    {{-- Alertas --}}
    @if(session('success'))
        <div class="modern-alert success">
            <i class="fas fa-check-circle"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="modern-alert error">
            <i class="fas fa-exclamation-triangle"></i>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    {{-- Header --}}
    <div class="dashboard-header">
        <h1 class="dashboard-title">
            <i class="fas fa-chart-line"></i>
            Historial Financiero
        </h1>
    </div>

    {{-- Filtros --}}
    <div class="filter-section">
        <div class="filter-grid">
            <a href="{{ route('client.finances.index', ['filter' => 'all']) }}" 
               class="filter-button all {{ $filter == 'all' ? 'active' : '' }}">
                <i class="fas fa-th-large"></i> Todos
            </a>
            <a href="{{ route('client.finances.index', ['filter' => 'income']) }}" 
               class="filter-button income {{ $filter == 'income' ? 'active' : '' }}">
                <i class="fas fa-arrow-trend-up"></i> Ingresos
            </a>
            <a href="{{ route('client.finances.index', ['filter' => 'expense']) }}" 
               class="filter-button expense {{ $filter == 'expense' ? 'active' : '' }}">
                <i class="fas fa-arrow-trend-down"></i> Gastos
            </a>
            <a href="{{ route('client.finances.index', ['filter' => 'investment']) }}" 
               class="filter-button investment {{ $filter == 'investment' ? 'active' : '' }}">
                <i class="fas fa-building"></i> Inversiones
            </a>
            <a href="{{ route('client.finances.index', ['filter' => 'debt']) }}" 
               class="filter-button debt {{ $filter == 'debt' ? 'active' : '' }}">
                <i class="fas fa-credit-card"></i> Deudas
            </a>
            <a href="{{ route('client.finances.index', ['filter' => 'inventory']) }}" 
               class="filter-button inventory {{ $filter == 'inventory' ? 'active' : '' }}">
                <i class="fas fa-boxes-stacked"></i> Inventario
            </a>
            <a href="{{ route('client.finances.index', ['filter' => 'costs']) }}" 
               class="filter-button costs {{ $filter == 'costs' ? 'active' : '' }}">
                <i class="fas fa-seedling"></i> Costos
            </a>
        </div>
    </div>

    {{-- Cards de Resumen --}}
    <div class="summary-grid">
        <div class="summary-card income">
            <div class="summary-card-header">
                <div class="summary-card-icon">
                    <i class="fas fa-arrow-trend-up"></i>
                </div>
                <span>Total Ingresos</span>
            </div>
            <p class="summary-card-value">${{ number_format($totalIncome ?? 0, 0, ',', '.') }}</p>
        </div>

        <div class="summary-card expense">
            <div class="summary-card-header">
                <div class="summary-card-icon">
                    <i class="fas fa-arrow-trend-down"></i>
                </div>
                <span>Total Gastos</span>
            </div>
            <p class="summary-card-value">${{ number_format($totalExpense ?? 0, 0, ',', '.') }}</p>
        </div>

        <div class="summary-card balance">
            <div class="summary-card-header">
                <div class="summary-card-icon">
                    <i class="fas fa-scale-balanced"></i>
                </div>
                <span>Balance</span>
            </div>
            <p class="summary-card-value">${{ number_format($balance ?? 0, 0, ',', '.') }}</p>
        </div>

        <div class="summary-card investment">
            <div class="summary-card-header">
                <div class="summary-card-icon">
                    <i class="fas fa-building"></i>
                </div>
                <span>Inversiones</span>
            </div>
            <p class="summary-card-value">${{ number_format($totalInvestment ?? 0, 0, ',', '.') }}</p>
        </div>

        <div class="summary-card debt">
            <div class="summary-card-header">
                <div class="summary-card-icon">
                    <i class="fas fa-credit-card"></i>
                </div>
                <span>Deudas</span>
            </div>
            <p class="summary-card-value">${{ number_format($totalDebt ?? 0, 0, ',', '.') }}</p>
        </div>

        <div class="summary-card inventory">
            <div class="summary-card-header">
                <div class="summary-card-icon">
                    <i class="fas fa-boxes-stacked"></i>
                </div>
                <span>Inventario</span>
            </div>
            <p class="summary-card-value">${{ number_format($totalInventory ?? 0, 0, ',', '.') }}</p>
        </div>

        <div class="summary-card costs">
            <div class="summary-card-header">
                <div class="summary-card-icon">
                    <i class="fas fa-seedling"></i>
                </div>
                <span>Costos</span>
            </div>
            <p class="summary-card-value">${{ number_format($totalCosts ?? 0, 0, ',', '.') }}</p>
        </div>
    </div>

    {{-- Tabla --}}
    <div class="table-container">
        <table class="modern-table">
            <thead>
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
                    @php
                        $financeData = is_array($finance) ? $finance : (array) $finance;
                        $type = $financeData['type'] ?? 'unknown';
                    @endphp
                    <tr>
                        <td class="date-column">{{ $financeData['date_formatted'] ?? 'N/A' }}</td>
                        
                        <td>
                            @switch($type)
                                @case('income')
                                    <span class="type-badge badge-income">
                                        <i class="fas fa-arrow-trend-up"></i> Ingreso
                                    </span>
                                    @break
                                @case('expense')
                                    <span class="type-badge badge-expense">
                                        <i class="fas fa-arrow-trend-down"></i> Gasto
                                    </span>
                                    @break
                                @case('investment')
                                    <span class="type-badge badge-investment">
                                        <i class="fas fa-building"></i> Inversión
                                    </span>
                                    @break
                                @case('debt')
                                    <span class="type-badge badge-debt">
                                        <i class="fas fa-credit-card"></i> Deuda
                                    </span>
                                    @break
                                @case('inventory')
                                    <span class="type-badge badge-inventory">
                                        <i class="fas fa-boxes-stacked"></i> Inventario
                                    </span>
                                    @break
                                @case('costs')
                                    <span class="type-badge badge-costs">
                                        <i class="fas fa-seedling"></i> Costos
                                    </span>
                                    @break
                            @endswitch
                        </td>
                        
                        <td class="amount-column">
                            ${{ number_format($financeData['amount'] ?? 0, 0, ',', '.') }}
                        </td>
                        
                        <td>
                            <div class="details-content">
                                @switch($type)
                                    @case('investment')
                                        @if(isset($financeData['asset_name']))
                                            <div class="detail-item">
                                                <i class="fas fa-tools"></i>
                                                <span>{{ $financeData['asset_name'] }}</span>
                                            </div>
                                        @endif
                                        @break
                                    
                                    @case('debt')
                                        @if(isset($financeData['creditor']))
                                            <div class="detail-item">
                                                <i class="fas fa-building-columns"></i>
                                                <span>{{ $financeData['creditor'] }}</span>
                                            </div>
                                            @if(isset($financeData['paid_installments']) && isset($financeData['installments']))
                                                <span class="progress-indicator">
                                                    <i class="fas fa-chart-pie"></i>
                                                    {{ $financeData['paid_installments'] }}/{{ $financeData['installments'] }}
                                                </span>
                                            @endif
                                        @endif
                                        @break
                                    
                                    @case('inventory')
                                        @if(isset($financeData['product_name']))
                                            <div class="detail-item">
                                                <i class="fas fa-box"></i>
                                                <span>{{ $financeData['product_name'] }}</span>
                                            </div>
                                            @if(isset($financeData['quantity']) && isset($financeData['unit']))
                                                <div class="detail-item">
                                                    <i class="fas fa-weight-scale"></i>
                                                    <span>{{ $financeData['quantity'] }} {{ $financeData['unit'] }}</span>
                                                </div>
                                            @endif
                                        @endif
                                        @break
                                    
                                    @case('costs')
                                        @if(isset($financeData['crop_name']))
                                            <div class="detail-item">
                                                <i class="fas fa-leaf"></i>
                                                <span>{{ $financeData['crop_name'] }}</span>
                                            </div>
                                            @if(isset($financeData['area']))
                                                <div class="detail-item">
                                                    <i class="fas fa-chart-area"></i>
                                                    <span>{{ $financeData['area'] }} ha</span>
                                                </div>
                                            @endif
                                        @endif
                                        @break
                                    
                                    @default
                                        <span class="detail-item">-</span>
                                @endswitch
                                
                                @if(isset($financeData['category']) && $financeData['category'])
                                    <span class="category-badge">{{ $financeData['category'] }}</span>
                                @endif
                            </div>
                        </td>
                        
                        <td>{{ $financeData['description'] ?? '-' }}</td>
                        
                        <td>
                            <div class="action-buttons">
                                <button type="button" 
                                        class="action-btn edit" 
                                        onclick='editFinance(@json($financeData))'
                                        title="Editar">
                                    <i class="fas fa-pen"></i>
                                </button>
                                
                                <form action="{{ route('client.finances.destroy', $financeData['id']) }}" 
                                      method="POST" 
                                      style="display: inline;"
                                      onsubmit="return confirm('¿Eliminar este registro?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn delete" title="Eliminar">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>

                                @if($type == 'debt' && isset($financeData['paid_installments']) && isset($financeData['installments']) && $financeData['paid_installments'] < $financeData['installments'])
                                    <form action="{{ route('client.debt.pay', $financeData['id']) }}" 
                                          method="POST" 
                                          style="display: inline;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="action-btn pay" title="Pagar cuota">
                                            <i class="fas fa-dollar-sign"></i>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            <div class="empty-state">
                                <i class="fas fa-inbox"></i>
                                <p class="empty-state-title">No hay registros</p>
                                <p class="empty-state-text">Intenta cambiar el filtro o agregar una nueva transacción</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Sección de Gráficos --}}
    <div class="charts-section">
        <div class="charts-header">
            <h2 class="charts-title">
                <i class="fas fa-chart-bar"></i> Análisis Visual
            </h2>
            <button id="downloadPdfBtn" class="download-btn">
                <i class="fas fa-file-pdf"></i> Descargar PDF
            </button>
        </div>
        
        <div class="charts-grid">
            <div class="chart-card">
                <h3 class="chart-card-title">Distribución: Ingresos vs Gastos</h3>
                <div class="chart-canvas">
                    <canvas id="incomeExpenseChart"></canvas>
                </div>
            </div>
            
            <div class="chart-card">
                <h3 class="chart-card-title">Tendencia Temporal</h3>
                <div class="chart-canvas">
                    <canvas id="historyChart"></canvas>
                </div>
            </div>

            <div class="chart-card">
                <h3 class="chart-card-title">Por Categoría</h3>
                <div class="chart-canvas">
                    <canvas id="categoryChart"></canvas>
                </div>
            </div>

            <div class="chart-card">
                <h3 class="chart-card-title">Balance Acumulado</h3>
                <div class="chart-canvas">
                    <canvas id="balanceChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Editar --}}
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-pen"></i> Editar Transacción
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Widget Calculadora --}}
<div id="calc-widget">
    <i class="fas fa-calculator"></i>
</div>

{{-- Modal Calculadora --}}
<div id="calc-modal" class="calc-modal hidden">
    <div class="calc-container" id="calc-drag">
        <div class="calc-header" id="calc-header">
            <span><i class="fas fa-calculator"></i> Calculadora</span>
            <button class="calc-close">×</button>
        </div>

        <input type="text" id="calc-screen" class="calc-screen" disabled>

        <div class="calc-grid">
            <button>7</button><button>8</button><button>9</button><button class="op">/</button>
            <button>4</button><button>5</button><button>6</button><button class="op">*</button>
            <button>1</button><button>2</button><button>3</button><button class="op">-</button>
            <button>0</button><button>.</button><button class="op">+</button>
            <button class="equal">=</button>
            <button style="grid-column: span 3;" onclick="document.getElementById('calc-screen').value = ''">C</button>
        </div>
    </div>
</div>

{{-- Scripts --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<script>
// Modal de edición
function editFinance(finance) {
    document.getElementById('edit_amount').value = finance.amount || '';
    document.getElementById('edit_date').value = finance.date_original || finance.date || '';
    document.getElementById('edit_category').value = finance.category || '';
    document.getElementById('edit_description').value = finance.description || '';
    document.getElementById('editForm').action = `/client/finances/${finance.id}`;
    
    const modal = new bootstrap.Modal(document.getElementById('editModal'));
    modal.show();
}

// Auto-cerrar alertas
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(() => {
        document.querySelectorAll('.modern-alert').forEach(alert => {
            alert.style.opacity = '0';
            alert.style.transform = 'translateX(100%)';
            setTimeout(() => alert.remove(), 300);
        });
    }, 5000);

    // Gráficos
    initCharts();
    
    // Calculadora
    initCalculator();
});

// Inicializar gráficos
function initCharts() {
    const finances = @json($finances);
    
    // Gráfico 1: Doughnut - Ingresos vs Gastos
    new Chart(document.getElementById('incomeExpenseChart'), {
        type: 'doughnut',
        data: {
            labels: ['Ingresos', 'Gastos'],
            datasets: [{
                data: [{{ $totalIncome }}, {{ $totalExpense }}],
                backgroundColor: ['#10b981', '#ef4444'],
                borderWidth: 0,
                hoverOffset: 15
            }]
        },
        options: {
            plugins: {
                legend: { position: 'bottom', labels: { color: '#cbd5e1' } }
            },
            animation: { animateRotate: true, animateScale: true }
        }
    });

    // Gráfico 2: Línea - Historial temporal
    const sortedFinances = finances.slice().sort((a, b) => new Date(a.date) - new Date(b.date));
    new Chart(document.getElementById('historyChart'), {
        type: 'line',
        data: {
            labels: sortedFinances.map(f => f.date_formatted || f.date),
            datasets: [{
                label: 'Monto',
                data: sortedFinances.map(f => f.amount),
                borderColor: '#8ac926',
                backgroundColor: 'rgba(138, 201, 38, 0.1)',
                fill: true,
                tension: 0.4,
                pointBackgroundColor: sortedFinances.map(f => f.type === 'income' ? '#10b981' : '#ef4444'),
                pointRadius: 5
            }]
        },
        options: {
            plugins: { legend: { labels: { color: '#cbd5e1' } } },
            scales: {
                y: { ticks: { color: '#cbd5e1' }, grid: { color: '#334155' } },
                x: { ticks: { color: '#cbd5e1' }, grid: { color: '#334155' } }
            }
        }
    });

    // Gráfico 3: Bar - Por categoría
    const categories = {
        'income': {{ $totalIncome }},
        'expense': {{ $totalExpense }},
        'investment': {{ $totalInvestment }},
        'debt': {{ $totalDebt }},
        'inventory': {{ $totalInventory }},
        'costs': {{ $totalCosts }}
    };
    
    new Chart(document.getElementById('categoryChart'), {
        type: 'bar',
        data: {
            labels: ['Ingresos', 'Gastos', 'Inversiones', 'Deudas', 'Inventario', 'Costos'],
            datasets: [{
                label: 'Total por Categoría',
                data: Object.values(categories),
                backgroundColor: ['#10b981', '#ef4444', '#3b82f6', '#f59e0b', '#a855f7', '#14b8a6']
            }]
        },
        options: {
            plugins: { legend: { display: false } },
            scales: {
                y: { ticks: { color: '#cbd5e1' }, grid: { color: '#334155' } },
                x: { ticks: { color: '#cbd5e1' }, grid: { display: false } }
            }
        }
    });

    // Gráfico 4: Línea - Balance acumulado
    let accumulated = 0;
    const balanceData = sortedFinances.map(f => {
        accumulated += (f.type === 'income' ? f.amount : -f.amount);
        return accumulated;
    });
    
    new Chart(document.getElementById('balanceChart'), {
        type: 'line',
        data: {
            labels: sortedFinances.map(f => f.date_formatted || f.date),
            datasets: [{
                label: 'Balance Acumulado',
                data: balanceData,
                borderColor: '#8ac926',
                backgroundColor: 'rgba(138, 201, 38, 0.2)',
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            plugins: { legend: { labels: { color: '#cbd5e1' } } },
            scales: {
                y: { ticks: { color: '#cbd5e1' }, grid: { color: '#334155' } },
                x: { ticks: { color: '#cbd5e1' }, grid: { color: '#334155' } }
            }
        }
    });
}

// Descargar PDF
document.getElementById('downloadPdfBtn').addEventListener('click', async () => {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF('p', 'mm', 'a4');
    const charts = document.querySelector('.charts-grid');

    const canvas = await html2canvas(charts, { backgroundColor: '#0f172a' });
    const imgData = canvas.toDataURL('image/png');

    const imgWidth = 190;
    const imgHeight = (canvas.height * imgWidth) / canvas.width;

    doc.setFontSize(16);
    doc.text("Reporte Financiero Agropecuario", 15, 15);
    doc.setFontSize(10);
    doc.text(`Generado: ${new Date().toLocaleDateString()}`, 15, 22);
    doc.addImage(imgData, 'PNG', 10, 30, imgWidth, imgHeight);
    doc.save("reporte_financiero.pdf");
});

// Calculadora
function initCalculator() {
    const widget = document.getElementById("calc-widget");
    const modal = document.getElementById("calc-modal");
    const closeBtn = document.querySelector(".calc-close");
    const screen = document.getElementById("calc-screen");
    const buttons = document.querySelectorAll(".calc-grid button");

    // Abrir calculadora
    widget.addEventListener("click", () => {
        modal.classList.remove("hidden");
        modal.style.pointerEvents = "none";
        document.getElementById("calc-drag").style.pointerEvents = "auto";
    });

    // Cerrar calculadora
    closeBtn.addEventListener("click", () => {
        modal.classList.add("hidden");
    });

    // Botones de calculadora
    buttons.forEach(btn => {
        btn.addEventListener("click", () => {
            const text = btn.textContent.trim();
            
            if (text === '=') {
                try {
                    screen.value = eval(screen.value);
                } catch {
                    screen.value = "Error";
                }
            } else if (text === 'C') {
                screen.value = '';
            } else {
                screen.value += text;
            }
        });
    });

    // Soporte de teclado
    document.addEventListener("keydown", (e) => {
        if (modal.classList.contains("hidden")) return;
        
        if (!isNaN(e.key) || ['+', '-', '*', '/', '.'].includes(e.key)) {
            screen.value += e.key;
        }
        
        if (e.key === 'Enter' || e.key === '=') {
            try {
                screen.value = eval(screen.value);
            } catch {
                screen.value = "Error";
            }
        }
        
        if (e.key === 'Backspace') {
            screen.value = screen.value.slice(0, -1);
        }
        
        if (e.key === 'Escape') {
            screen.value = "";
        }
    });

    // Arrastrar calculadora
    const calc = document.getElementById("calc-drag");
    const header = document.getElementById("calc-header");
    let offsetX = 0, offsetY = 0, isDown = false;

    header.addEventListener("mousedown", (e) => {
        isDown = true;
        offsetX = e.clientX - calc.offsetLeft;
        offsetY = e.clientY - calc.offsetTop;
        calc.style.transition = "none";
    });

    document.addEventListener("mousemove", (e) => {
        if (isDown) {
            calc.style.left = (e.clientX - offsetX) + "px";
            calc.style.top = (e.clientY - offsetY) + "px";
            calc.style.position = "fixed";
        }
    });

    document.addEventListener("mouseup", () => {
        isDown = false;
    });
}
</script>
@endsection