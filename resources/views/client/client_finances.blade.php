@extends('layouts.app')

@section('content')
<div class="finances-dashboard">
    <h1 class="text-3xl font-extrabold text-green-400 text-center mb-10 tracking-wider">
        Gestión de Finanzas Agropecuarias
    </h1>

    <div class="main-card">
        <div class="summary-cards">
    <div class="summary-card income-card">
        <h3>Total Ingresos</h3>
        <p>${{ number_format($totalIncome, 0, ',', '.') }}</p>
    </div>

    <div class="summary-card expense-card">
        <h3>Total Gastos</h3>
        <p>${{ number_format($totalExpense, 0, ',', '.') }}</p>
    </div>

    <div class="summary-card balance-card">
        <h3>Balance</h3>
        <p class="{{ $balance >= 0 ? 'positive' : 'negative' }}">
            ${{ number_format($balance, 0, ',', '.') }}
        </p>
    </div>
</div>
<!-- ========== GRÁFICOS ========== -->
{{-- <div class="charts-container" style="margin-top: 40px;">
    <h2 class="text-2xl font-bold text-center mb-6">Resumen Gráfico</h2>

    <div style="width: 100%; max-width: 600px; margin: 0 auto;">
        <canvas id="incomeExpenseChart"></canvas>
    </div>

    <div style="width: 100%; max-width: 700px; margin: 40px auto 0;">
        <canvas id="historyChart"></canvas>
    </div>
</div> --}}

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

    <!-- NUEVA PESTAÑA -->
    <button class="tab-link" data-tab="reports-view">
        <i class="fas fa-chart-line"></i> Reportes
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
                            <th>Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse($finances as $finance)
                            <tr class="{{ $finance['type'] === 'income' ? 'row-income' : 'row-expense' }}">
    <td>{{ $finance['date'] }}</td>
    <td>
        <span class="badge {{ $finance['type'] === 'income' ? 'bg-success' : 'bg-danger' }}">
            {{ $finance['type'] === 'income' ? 'Ingreso' : 'Gasto' }}
        </span>
    </td>
    <td>${{ number_format($finance['amount'], 0, ',', '.') }}</td>
    <td>{{ $finance['description'] ?? '-' }}</td>

    <!-- NUEVA COLUMNA -->
    <td style="display:flex; gap:10px;">
        <!-- Editar -->
        <button 
            class="btn-edit"
            data-id="{{ $finance['id'] }}"
            data-type="{{ $finance['type'] }}"
            data-amount="{{ $finance['amount'] }}"
            data-date="{{ $finance['date'] }}"
            data-description="{{ $finance['description'] }}"
        >
            ✏️
        </button>

        <!-- Eliminar -->
        <form action="{{ route('client.finances.destroy', $finance['id']) }}" 
              method="POST" 
              onsubmit="return confirm('¿Seguro que deseas eliminar este registro?')">
            @csrf
            @method('DELETE')
            <button class="btn-delete">🗑️</button>
        </form>
    </td>
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
        <!-- ========== 4. REPORTES ========== -->
<div id="reports-view" class="tab-content">

    <h2 class="tab-title reports-title">Reportes Gráficos</h2>

    <!-- Botón de descarga -->
    <div class="text-right mb-4">
        <button id="downloadPdfBtn" class="submit-btn income-btn" style="padding: 10px 20px;">
            <i class="fas fa-file-pdf"></i> Descargar PDF
        </button>
    </div>

    <!-- Contenedor de gráficos -->
    <div class="charts-container"
         style="
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
            align-items: flex-start;
            margin-top: 20px;
         ">

        <!-- Gráfico 1 -->
        <div class="chart-box"
             style="
                flex: 1 1 350px;
                max-width: 420px;
                background: #ffffff10;
                padding: 20px;
                border-radius: 12px;
                backdrop-filter: blur(8px);
                box-shadow: 0 4px 12px rgba(0,0,0,0.2);
                text-align: center;
             ">
            <h3 class="chart-label">Ingresos vs Gastos</h3>
            <canvas id="incomeExpenseChart" style="margin-top: 10px;"></canvas>
        </div>

        <!-- Gráfico 2 -->
        <div class="chart-box"
             style="
                flex: 1 1 350px;
                max-width: 420px;
                background: #ffffff10;
                padding: 20px;
                border-radius: 12px;
                backdrop-filter: blur(8px);
                box-shadow: 0 4px 12px rgba(0,0,0,0.2);
                text-align: center;
             ">
            <h3 class="chart-label">Historial por Fecha</h3>
            <canvas id="historyChart" style="margin-top: 10px;"></canvas>
        </div>

    </div>
</div>


    </div>
    <!-- ================== MODAL EDITAR ================== -->
<div id="editModal" class="modal-container">
    <div class="modal-content edit-modal-box">
        
        <h2 class="modal-title">Editar Transacción</h2>

        <form id="editForm" method="POST">
            @csrf
            @method('PUT')

            <div class="modal-field">
                <label>Monto</label>
                <input type="number" step="0.01" name="amount" id="edit_amount" required>
            </div>

            <div class="modal-field">
                <label>Fecha</label>
                <input type="date" name="date" id="edit_date" required>
            </div>

            <div class="modal-field">
                <label>Descripción</label>
                <textarea name="description" id="edit_description"></textarea>
            </div>

            <div class="modal-buttons">
                <button type="submit" class="modal-btn update-btn">Actualizar</button>
                <button type="button" class="modal-btn close-btn" id="closeModal">Cerrar</button>
            </div>

        </form>
    </div>
</div>


</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', () => {

    /* ============================
       TAB SYSTEM
    ============================ */
    const tabs = document.querySelectorAll('.tab-link');
    const contents = document.querySelectorAll('.tab-content');

    function changeTab(tabId) {
        tabs.forEach(tab => tab.classList.remove('active'));
        contents.forEach(content => content.classList.remove('active'));

        const activeTab = document.querySelector(`.tab-link[data-tab="${tabId}"]`);
        const activeContent = document.getElementById(tabId);

        if (activeTab) activeTab.classList.add('active');
        if (activeContent) activeContent.classList.add('active');
    }

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            changeTab(tab.dataset.tab);
        });
    });

    // Mantener historia si hay filtro
    const urlParams = new URLSearchParams(window.location.search);
    const filter = urlParams.get('filter');

    if (filter) {
        changeTab('history-view');
    } else {
        changeTab('income-form');
    }


    /* ============================
       CHART 1 - Doughnut
    ============================ */
    const ctx1 = document.getElementById('incomeExpenseChart').getContext('2d');

    new Chart(ctx1, {
        type: 'doughnut',
        data: {
            labels: ['Ingresos', 'Gastos'],
            datasets: [{
                data: [{{ $totalIncome }}, {{ $totalExpense }}],
                backgroundColor: ['#16a34a', '#dc2626'],
                hoverOffset: 15,
                borderWidth: 0
            }]
        },
        options: {
            plugins: {
                legend: { position: 'bottom' }
            },
            animation: {
                animateRotate: true,
                animateScale: true
            }
        }
    });


    /* ============================
       CHART 2 - Line (Historial)
    ============================ */
    const historyData = @json($finances);

    const ctx2 = document.getElementById('historyChart').getContext('2d');

    const labels = historyData.map(item => item.date);
    const amounts = historyData.map(item => item.amount);
    const colors = historyData.map(item => item.type === 'income' ? '#22c55e' : '#ef4444');

    new Chart(ctx2, {
        type: 'line',
        data: {
            labels,
            datasets: [{
                label: 'Transacciones por Fecha',
                data: amounts,
                borderColor: '#2563eb',
                backgroundColor: 'rgba(37, 99, 235, 0.3)',
                fill: true,
                tension: 0.35,
                pointBackgroundColor: colors,
                pointRadius: 6,
                pointHoverRadius: 10,
                borderWidth: 3
            }]
        },
        options: {
            animation: {
                duration: 1500,
                easing: 'easeOutQuart'
            },
            scales: {
                y: { beginAtZero: false }
            }
        }
    });


    /* ============================
       PDF DOWNLOAD
    ============================ */
    document.getElementById('downloadPdfBtn').addEventListener('click', async () => {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF('p', 'mm', 'a4');
        const charts = document.querySelector('.charts-container');

        const canvasImage = await html2canvas(charts);
        const imgData = canvasImage.toDataURL('image/png');

        const imgWidth = 190;
        const imgHeight = (canvasImage.height * imgWidth) / canvasImage.width;

        doc.text("Reporte Financiero Agropecuario", 15, 15);
        doc.addImage(imgData, 'PNG', 10, 25, imgWidth, imgHeight);
        doc.save("reporte_financiero.pdf");
    });

});
/* ===========================
    MODAL EDITAR
=========================== */

const editModal = document.getElementById("editModal");
const editForm = document.getElementById("editForm");

document.querySelectorAll(".btn-edit").forEach(btn => {
    btn.addEventListener("click", () => {

        document.getElementById("edit_amount").value = btn.dataset.amount;
        document.getElementById("edit_date").value = btn.dataset.date;
        document.getElementById("edit_description").value = btn.dataset.description;

        // ruta dinámica: /client/finances/{id}
        editForm.action = `/client/finances/${btn.dataset.id}`;

        editModal.style.display = "flex";
    });
});

document.getElementById("closeModal").onclick = () => {
    editModal.style.display = "none";
};

</script>


<!-- WIDGET CALCULATOR -->
<div id="calc-widget" class="calculator-widget">
    <div class="widget-icon">
        <img src="/img/icono-calculadora.png" width="28" alt="calculadora">
    </div>
</div>

<!-- 🧮 CALCULADORA FLOTANTE -->
<div id="calc-modal" class="calc-modal hidden">
    <div class="calc-container" id="calc-drag">
        
        <div class="calc-header" id="calc-header">
            <span>Calculadora</span>
            <button class="calc-close">×</button>
        </div>

        <input type="text" id="calc-screen" class="calc-screen" disabled>

        <div class="calc-grid">
            <button>7</button><button>8</button><button>9</button><button class="op">/</button>
            <button>4</button><button>5</button><button>6</button><button class="op">*</button>
            <button>1</button><button>2</button><button>3</button><button class="op">-</button>
            <button>0</button><button>.</button><button class="op">+</button>
            <button class="equal">=</button>
        </div>
    </div>
</div>
<script>
/* ========================
   🔓 ABRIR CALCULADORA
   ======================== */
document.getElementById("calc-widget").addEventListener("click", () => {
    const modal = document.getElementById("calc-modal");
    modal.classList.remove("hidden");

    // Permitir clics SOLO dentro de la calculadora
    modal.style.pointerEvents = "none";
    document.getElementById("calc-drag").style.pointerEvents = "auto";
});

/* ========================
   ❌ CERRAR CALCULADORA
   ======================== */
document.querySelector(".calc-close").addEventListener("click", () => {
    document.getElementById("calc-modal").classList.add("hidden");
});

/* ========================
   🔢 LÓGICA DE CALCULADORA
   ======================== */
const screen = document.getElementById("calc-screen");
const buttons = document.querySelectorAll(".calc-grid button");

buttons.forEach(btn => {
    btn.addEventListener("click", () => {
        if (btn.classList.contains("equal")) {
            try { screen.value = eval(screen.value); }
            catch { screen.value = "Error"; }
        } else {
            screen.value += btn.textContent;
        }
    });
});

/* ========================
   🖱️ ARRASTRAR CALCULADORA
   ======================== */
const calc = document.getElementById("calc-drag");
const header = document.getElementById("calc-header");

let offsetX = 0, offsetY = 0, isDown = false;

header.addEventListener("mousedown", (e) => {
    isDown = true;
    offsetX = e.clientX - calc.offsetLeft;
    offsetY = e.clientY - calc.offsetTop;
    calc.style.transition = "none";  // mover suave sin animación
});

document.addEventListener("mousemove", (e) => {
    if (isDown) {
        calc.style.left = (e.clientX - offsetX) + "px";
        calc.style.top  = (e.clientY - offsetY) + "px";
        calc.style.position = "fixed"; // clave para que flote
    }
});

document.addEventListener("mouseup", () => {
    isDown = false;
});

/* =====================================================
   🔥 MEJORAS AÑADIDAS (NO modifican tu código original)
   ===================================================== */

/* Reseteo seguro para evitar romper la calculadora */
function safeReset() {
    if (screen.value === "Error" || screen.value === "Infinity" || screen.value === "NaN") {
        screen.value = "";
    }
}

/* ============================
   ⌨️ SOPORTE COMPLETO DE TECLADO
   ============================ */
document.addEventListener("keydown", (e) => {

    // No escribir si está oculta
    if (document.getElementById("calc-modal").classList.contains("hidden")) {
        return;
    }

    safeReset();

    // Números
    if (!isNaN(e.key)) {
        screen.value += e.key;
    }

    // Operadores permitidos
    if (["+", "-", "*", "/"].includes(e.key)) {
        screen.value += e.key;
    }

    // Punto decimal
    if (e.key === ".") {
        screen.value += ".";
    }

    // ENTER o "=" para calcular
    if (e.key === "Enter" || e.key === "=") {
        try {
            let result = eval(screen.value);

            if (result === Infinity || isNaN(result)) {
                screen.value = "Error";
            } else {
                screen.value = result;
            }

        } catch {
            screen.value = "Error";
        }
    }

    // ⌫ Backspace → borrar último caracter
    if (e.key === "Backspace") {
        screen.value = screen.value.slice(0, -1);
    }

    // Esc → limpiar pantalla
    if (e.key === "Escape") {
        screen.value = "";
    }
});
</script>

@endsection
