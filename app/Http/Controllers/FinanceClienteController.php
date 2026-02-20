<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FinanceClienteController extends Controller
{
    private $apiUrl = "http://api.AgroFinanzas.test/api/finances";

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

    public function index(Request $request)
    {
        $user = session('user');

        if (!$user || !isset($user['id'])) {
            return redirect()->route('login')->withErrors(['auth_error' => 'Sesión expirada']);
        }

        $userId = $user['id'];

        $response = Http::get($this->apiUrl, [
            'user_id' => $userId
        ]);

        if (!$response->successful()) {
            Log::error('Error al cargar finanzas:', [
                'status' => $response->status(),
                'body'   => $response->body()
            ]);
            return back()->with('error', 'Error al cargar las finanzas');
        }

        $finances = collect($response->json());
        $filter   = $request->get('filter', 'all');

        $filteredFinances = $filter !== 'all'
            ? $finances->where('type', $filter)
            : $finances;

        $filteredFinances = $filteredFinances->map(function ($finance) {
            $finance['date_original'] = $finance['date'] ?? null;

            if (isset($finance['date'])) {
                try {
                    $finance['date_formatted'] = (new \DateTime($finance['date']))->format('d/m/Y');
                } catch (\Exception $e) {
                    $finance['date_formatted'] = 'Fecha inválida';
                }
            } else {
                $finance['date_formatted'] = 'N/A';
            }

            if (isset($finance['due_date'])) {
                $finance['due_date_original'] = $finance['due_date'];
                try {
                    $finance['due_date_formatted'] = (new \DateTime($finance['due_date']))->format('d/m/Y');
                } catch (\Exception $e) {
                    $finance['due_date_formatted'] = null;
                }
            }

            return $finance;
        });

        $totalIncome     = $finances->where('type', 'income')->sum('amount');
        $totalExpense    = $finances->where('type', 'expense')->sum('amount');
        $totalInvestment = $finances->where('type', 'investment')->sum('amount');
        $totalDebt       = $finances->where('type', 'debt')->sum('amount');
        $totalInventory  = $finances->where('type', 'inventory')->sum('amount');
        $totalCosts      = $finances->where('type', 'costs')->sum('amount');
        $balance         = $totalIncome - $totalExpense;

        return view('client.client_finances', [
            'finances'        => $filteredFinances,
            'filter'          => $filter,
            'totalIncome'     => $totalIncome,
            'totalExpense'    => $totalExpense,
            'totalInvestment' => $totalInvestment,
            'totalDebt'       => $totalDebt,
            'totalInventory'  => $totalInventory,
            'totalCosts'      => $totalCosts,
            'balance'         => $balance,
        ]);
    }

    public function storeIncome(Request $request)
    {
        $user = session('user');
        if (!$user || !isset($user['id'])) return redirect()->route('login');

        $data = $request->validate([
            'amount'      => 'required|numeric|min:0.01',
            'date'        => 'required|date',
            'description' => 'nullable|string|max:500',
            'category'    => 'nullable|string|max:100',
        ]);

        $data['type']    = 'income';
        $data['user_id'] = $user['id'];

        $response = Http::post($this->apiUrl, $data);

        if ($response->successful()) {
            return redirect()->route('client.finances.index', ['filter' => 'income'])
                             ->with('success', 'Ingreso registrado correctamente.');
        }

        return $this->handleApiError($response);
    }

    public function storeExpense(Request $request)
    {
        $user = session('user');
        if (!$user || !isset($user['id'])) return redirect()->route('login');

        $data = $request->validate([
            'amount'      => 'required|numeric|min:0.01',
            'date'        => 'required|date',
            'description' => 'nullable|string|max:500',
            'category'    => 'nullable|string|max:100',
        ]);

        $data['type']    = 'expense';
        $data['user_id'] = $user['id'];

        $response = Http::post($this->apiUrl, $data);

        if ($response->successful()) {
            return redirect()->route('client.finances.index', ['filter' => 'expense'])
                             ->with('success', 'Gasto registrado correctamente.');
        }

        return $this->handleApiError($response);
    }

    public function storeInvestment(Request $request)
    {
        $user = session('user');
        if (!$user || !isset($user['id'])) return redirect()->route('login');

        $data = $request->validate([
            'amount'             => 'required|numeric|min:0.01',
            'date'               => 'required|date',
            'asset_name'         => 'required|string|max:255',
            'category'           => 'nullable|string|max:100',
            'depreciation_years' => 'nullable|integer|min:1|max:50',
            'description'        => 'nullable|string|max:500',
        ]);

        $data['type']    = 'investment';
        $data['user_id'] = $user['id'];

        $response = Http::post($this->apiUrl, $data);

        if ($response->successful()) {
            return redirect()->route('client.finances.index', ['filter' => 'investment'])
                             ->with('success', 'Inversión registrada correctamente.');
        }

        return $this->handleApiError($response);
    }

    public function storeDebt(Request $request)
    {
        $user = session('user');
        if (!$user || !isset($user['id'])) return redirect()->route('login');

        $data = $request->validate([
            'amount'            => 'required|numeric|min:0.01',
            'date'              => 'required|date',
            'creditor'          => 'required|string|max:255',
            'interest_rate'     => 'nullable|numeric|min:0|max:100',
            'due_date'          => 'nullable|date|after:date',
            'installments'      => 'nullable|integer|min:1',
            'paid_installments' => 'nullable|integer|min:0',
            'description'       => 'nullable|string|max:500',
        ]);

        $data['type']    = 'debt';
        $data['user_id'] = $user['id'];

        $response = Http::post($this->apiUrl, $data);

        if ($response->successful()) {
            return redirect()->route('client.finances.index', ['filter' => 'debt'])
                             ->with('success', 'Deuda registrada correctamente.');
        }

        return $this->handleApiError($response);
    }

    public function storeInventory(Request $request)
    {
        $user = session('user');
        if (!$user || !isset($user['id'])) return redirect()->route('login');

        $data = $request->validate([
            'date'         => 'required|date',
            'product_name' => 'required|string|max:255',
            'category'     => 'nullable|string|max:100',
            'quantity'     => 'required|numeric|min:0',
            'unit'         => 'required|string|max:50',
            'unit_cost'    => 'nullable|numeric|min:0',
            'amount'       => 'required|numeric|min:0.01',
            'description'  => 'nullable|string|max:500',
        ]);

        $data['type']    = 'inventory';
        $data['user_id'] = $user['id'];

        $response = Http::post($this->apiUrl, $data);

        if ($response->successful()) {
            return redirect()->route('client.finances.index', ['filter' => 'inventory'])
                             ->with('success', 'Inventario registrado correctamente.');
        }

        return $this->handleApiError($response);
    }

    public function storeCosts(Request $request)
    {
        $user = session('user');
        if (!$user || !isset($user['id'])) return redirect()->route('login');

        $data = $request->validate([
            'amount'           => 'required|numeric|min:0.01',
            'date'             => 'required|date',
            'crop_name'        => 'required|string|max:255',
            'category'         => 'nullable|string|max:100',
            'area'             => 'nullable|numeric|min:0',
            'production_cycle' => 'nullable|string|max:100',
            'cost_per_unit'    => 'nullable|numeric|min:0',
            'description'      => 'nullable|string|max:500',
        ]);

        $data['type']    = 'costs';
        $data['user_id'] = $user['id'];

        $response = Http::post($this->apiUrl, $data);

        if ($response->successful()) {
            return redirect()->route('client.finances.index', ['filter' => 'costs'])
                             ->with('success', 'Costos registrados correctamente.');
        }

        return $this->handleApiError($response);
    }

    public function update(Request $request, $id)
    {
        $user = session('user');
        if (!$user || !isset($user['id'])) return redirect()->route('login');

        $data = $request->validate([
            'amount'      => 'required|numeric|min:0.01',
            'date'        => 'required|date',
            'description' => 'nullable|string|max:500',
            'category'    => 'nullable|string|max:100',
        ]);

        $response = Http::put("{$this->apiUrl}/{$id}?user_id={$user['id']}", $data);

        if ($response->successful()) {
            return redirect()->back()->with('success', 'Registro actualizado correctamente.');
        }

        return $this->handleApiError($response);
    }

    public function destroy($id)
    {
        $user = session('user');
        if (!$user || !isset($user['id'])) return redirect()->route('login');

        $response = Http::delete("{$this->apiUrl}/{$id}?user_id={$user['id']}");

        if ($response->successful()) {
            return redirect()->back()->with('success', 'Registro eliminado correctamente.');
        }

        return $this->handleApiError($response);
    }

    public function payDebtInstallment($id)
    {
        $user = session('user');
        if (!$user || !isset($user['id'])) return redirect()->route('login');

        $response = Http::patch("{$this->apiUrl}/{$id}/pay-installment?user_id={$user['id']}");

        if ($response->successful()) {
            return redirect()->back()->with('success', 'Cuota pagada correctamente.');
        }

        return $this->handleApiError($response);
    }

    public function store(Request $request)
    {
        $user = session('user');
        if (!$user || !isset($user['id'])) return redirect()->route('login');

        $data = $request->validate([
            'type'        => 'required|in:income,expense,investment,debt,inventory,costs',
            'amount'      => 'required|numeric|min:0.01',
            'date'        => 'required|date',
            'description' => 'nullable|string|max:500',
        ]);

        $data['user_id'] = $user['id'];

        $response = Http::post($this->apiUrl, $data);

        if ($response->successful()) {
            return redirect()->route('client.finances.index')
                             ->with('success', 'Registro agregado correctamente.');
        }

        return $this->handleApiError($response);
    }

    private function handleApiError($response)
    {
        $errorMessage = $response->json('message') ?? 'Error desconocido al comunicarse con la API.';

        if ($response->failed() && $response->json('errors')) {
            $errorMessage = "Error de validación: " . json_encode($response->json('errors'));
        }

        Log::error('API Error:', [
            'status'  => $response->status(),
            'message' => $errorMessage,
            'body'    => $response->body()
        ]);

        return redirect()->back()
                        ->with('error', $errorMessage)
                        ->withInput();
    }
}