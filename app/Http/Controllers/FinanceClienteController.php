<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FinanceClienteController extends Controller
{
    // URL base de la API
    // ===============================
// VISTAS CREATE
// ===============================

public function createIncome()
{
    return view('client.income.create');
}

public function createExpense()
{
    return view('client.expense.create');
}

public function createInvestment()
{
    return view('client.investment.create');
}

public function createDebt()
{
    return view('client.debt.create');
}

public function createInventory()
{
    return view('client.inventory.create');
}

public function createCosts()
{
    return view('client.costs.create');
}

    private $apiUrl = "http://api.AgroFinanzas.test/api/finances";

    /**
     * Muestra la vista principal de finanzas con el historial y formularios
     */
    public function index(Request $request)
{
    // Llamar a la API para obtener todos los registros
    $response = Http::get($this->apiUrl);
    $finances = collect($response->json());

    // Obtener filtro si existe
    $filter = $request->get('filter', 'all');

    // Filtrar según el tipo
    $filteredFinances = $finances;
    if ($filter !== 'all') {
        $filteredFinances = $finances->where('type', $filter);
    }

    // 🔥 FORMATEAR FECHAS CORRECTAMENTE
    $filteredFinances = $filteredFinances->map(function($finance) {
        // Guardar fecha original para edición
        $finance['date_original'] = $finance['date'] ?? null;
        
        // Formatear fecha para mostrar
        if (isset($finance['date'])) {
            try {
                $date = new \DateTime($finance['date']);
                $finance['date_formatted'] = $date->format('d/m/Y'); // Para mostrar
            } catch (\Exception $e) {
                $finance['date_formatted'] = 'Fecha inválida';
            }
        } else {
            $finance['date_formatted'] = 'N/A';
        }
        
        // También formatear due_date si existe (para deudas)
        if (isset($finance['due_date'])) {
            $finance['due_date_original'] = $finance['due_date'];
            try {
                $date = new \DateTime($finance['due_date']);
                $finance['due_date_formatted'] = $date->format('d/m/Y');
            } catch (\Exception $e) {
                $finance['due_date_formatted'] = null;
            }
        }
        
        return $finance;
    });

    // Calcular totales
    $totalIncome = $finances->where('type', 'income')->sum('amount');
    $totalExpense = $finances->where('type', 'expense')->sum('amount');
    $totalInvestment = $finances->where('type', 'investment')->sum('amount');
    $totalDebt = $finances->where('type', 'debt')->sum('amount');
    $totalInventory = $finances->where('type', 'inventory')->sum('amount');
    $totalCosts = $finances->where('type', 'costs')->sum('amount');
    
    $balance = $totalIncome - $totalExpense;

    // Enviar a la vista
    return view('client.client_finances', [
        'finances' => $filteredFinances,
        'filter' => $filter,
        'totalIncome' => $totalIncome,
        'totalExpense' => $totalExpense,
        'totalInvestment' => $totalInvestment,
        'totalDebt' => $totalDebt,
        'totalInventory' => $totalInventory,
        'totalCosts' => $totalCosts,
        'balance' => $balance,
    ]);
}

    /**
     * Guardar INGRESO
     */
    public function storeIncome(Request $request)
    {
        $data = $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'date' => 'required|date',
            'description' => 'nullable|string|max:500',
            'category' => 'nullable|string|max:100',
        ]);

        $data['type'] = 'income';

        $response = Http::post($this->apiUrl, $data);

        if ($response->successful()) {
            return redirect()->route('client.finances.index', ['filter' => 'income'])
                           ->with('success', 'Ingreso registrado correctamente.');
        }

        return $this->handleApiError($response);
    }

    /**
     * Guardar GASTO
     */
    public function storeExpense(Request $request)
    {
        $data = $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'date' => 'required|date',
            'description' => 'nullable|string|max:500',
            'category' => 'nullable|string|max:100',
        ]);

        $data['type'] = 'expense';

        $response = Http::post($this->apiUrl, $data);

        if ($response->successful()) {
            return redirect()->route('client.finances.index', ['filter' => 'expense'])
                           ->with('success', 'Gasto registrado correctamente.');
        }

        return $this->handleApiError($response);
    }

    /**
     * Guardar INVERSIÓN
     */
    public function storeInvestment(Request $request)
    {
        $data = $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'date' => 'required|date',
            'asset_name' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'depreciation_years' => 'nullable|integer|min:1|max:50',
            'description' => 'nullable|string|max:500',
        ]);

        $data['type'] = 'investment';

        $response = Http::post($this->apiUrl, $data);

        if ($response->successful()) {
            return redirect()->route('client.finances.index', ['filter' => 'investment'])
                           ->with('success', 'Inversión registrada correctamente.');
        }

        return $this->handleApiError($response);
    }

    /**
     * Guardar DEUDA/PRÉSTAMO
     */
    public function storeDebt(Request $request)
    {
        $data = $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'date' => 'required|date',
            'creditor' => 'required|string|max:255',
            'interest_rate' => 'nullable|numeric|min:0|max:100',
            'due_date' => 'nullable|date|after:date',
            'installments' => 'nullable|integer|min:1',
            'paid_installments' => 'nullable|integer|min:0',
            'description' => 'nullable|string|max:500',
        ]);

        $data['type'] = 'debt';

        $response = Http::post($this->apiUrl, $data);

        if ($response->successful()) {
            return redirect()->route('client.finances.index', ['filter' => 'debt'])
                           ->with('success', 'Deuda registrada correctamente.');
        }

        return $this->handleApiError($response);
    }

    /**
     * Guardar INVENTARIO
     */
    public function storeInventory(Request $request)
    {
        $data = $request->validate([
            'date' => 'required|date',
            'product_name' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'quantity' => 'required|numeric|min:0',
            'unit' => 'required|string|max:50',
            'unit_cost' => 'nullable|numeric|min:0',
            'amount' => 'required|numeric|min:0.01',
            'description' => 'nullable|string|max:500',
        ]);

        $data['type'] = 'inventory';

        $response = Http::post($this->apiUrl, $data);

        if ($response->successful()) {
            return redirect()->route('client.finances.index', ['filter' => 'inventory'])
                           ->with('success', 'Inventario registrado correctamente.');
        }

        return $this->handleApiError($response);
    }

    /**
     * Guardar COSTOS DE PRODUCCIÓN
     */
    public function storeCosts(Request $request)
    {
        $data = $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'date' => 'required|date',
            'crop_name' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'area' => 'nullable|numeric|min:0',
            'production_cycle' => 'nullable|string|max:100',
            'cost_per_unit' => 'nullable|numeric|min:0',
            'description' => 'nullable|string|max:500',
        ]);

        $data['type'] = 'costs';

        $response = Http::post($this->apiUrl, $data);

        if ($response->successful()) {
            return redirect()->route('client.finances.index', ['filter' => 'costs'])
                           ->with('success', 'Costos registrados correctamente.');
        }

        return $this->handleApiError($response);
    }

    /**
     * Actualizar cualquier registro
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'date' => 'required|date',
            'description' => 'nullable|string|max:500',
            'category' => 'nullable|string|max:100',
        ]);

        $response = Http::put("{$this->apiUrl}/{$id}", $data);

        if ($response->successful()) {
            return redirect()->back()->with('success', 'Registro actualizado correctamente.');
        }

        return $this->handleApiError($response);
    }

    /**
     * Eliminar un registro
     */
    public function destroy($id)
    {
        $response = Http::delete("{$this->apiUrl}/{$id}");

        if ($response->successful()) {
            return redirect()->back()->with('success', 'Registro eliminado correctamente.');
        }

        return $this->handleApiError($response);
    }

    /**
     * Pagar cuota de deuda
     */
    public function payDebtInstallment($id)
    {
        $response = Http::patch("{$this->apiUrl}/{$id}/pay-installment");

        if ($response->successful()) {
            return redirect()->back()->with('success', 'Cuota pagada correctamente.');
        }

        return $this->handleApiError($response);
    }

    /**
     * Método legacy para compatibilidad
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|in:income,expense,investment,debt,inventory,costs',
            'amount' => 'required|numeric|min:0.01',
            'date' => 'required|date',
            'description' => 'nullable|string|max:500',
        ]);

        $response = Http::post($this->apiUrl, $data);

        if ($response->successful()) {
            return redirect()->route('client.finances.index')->with('success', 'Registro agregado correctamente.');
        }

        return $this->handleApiError($response);
    }

    /**
     * Manejo centralizado de errores de API
     */
    private function handleApiError($response)
    {
        $errorMessage = $response->json('message') ?? 'Error desconocido al comunicarse con la API.';
        
        if ($response->failed() && $response->json('errors')) {
            $errorMessage = "Error de validación: " . json_encode($response->json('errors'));
        }

        return redirect()->back()
                       ->with('error', $errorMessage)
                       ->withInput();
    }
}