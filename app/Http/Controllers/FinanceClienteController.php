<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FinanceClienteController extends Controller
{
    // ----------------------------------------------------------------------
    // 1. VISTA UNIFICADA (INDEX)
    // ----------------------------------------------------------------------

    /**
     * Muestra la vista principal de finanzas con el historial y formularios.
     * La vista se llama 'client/client_finances'.
     */
    public function index(Request $request)
{
     // si necesitas el usuario

    // ============================================================
    // 1. Llamar a tu API backend (ajusta la URL al tuyo)
    // ============================================================
    $response = Http::get("http://api.AgroFinanzas.test/api/finances");

    // tu API devuelve una lista normal de finances
    $finances = collect($response->json());

    // ============================================================
    // 2. Obtener filtro si existe
    // ============================================================
    $filter = $request->get('filter', 'all');

    $filteredFinances = $finances;

    if ($filter !== 'all') {
        $filteredFinances = $finances->where('type', $filter);
    }

    // ============================================================
    // 3. Calcular totales según tu estructura
    // ============================================================
    $totalIncome = $finances->where('type', 'income')->sum('amount');
    $totalExpense = $finances->where('type', 'expense')->sum('amount');
    $balance = $totalIncome - $totalExpense;

    // ============================================================
    // 4. Enviar a la vista el filtro + totales
    // ============================================================
    return view('client.client_finances', [
        'finances' => $filteredFinances,
        'filter' => $filter,

        // valores que te estaban faltando 👇
        'totalIncome' => $totalIncome,
        'totalExpense' => $totalExpense,
        'balance' => $balance,
    ]);
}

    // ----------------------------------------------------------------------
    // 2. ACCIONES DE GUARDADO (STORE)
    // ----------------------------------------------------------------------

    // 🔸 Guardar Ingreso
    public function storeIncome(Request $request)
    {
        // Validación del frontend (para UX inmediata)
        $data = $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'description' => 'nullable|string|max:255',
            'date' => 'required|date',
        ]);

        $data['type'] = 'income';

        // Llama a la API (Backend)
        $response = Http::post('http://api.AgroFinanzas.test/api/finances', $data);

        if ($response->successful()) {
            return redirect()->route('client.finances.index', ['filter' => 'income'])->with('success', 'Ingreso registrado correctamente.');
        }
        
        // --- DEPURACIÓN: Muestra el error exacto del backend ---
        $errorMessage = $response->json('message') ?? 'Error desconocido al guardar el ingreso en el API.';
        if ($response->failed() && $response->json('errors')) {
            $errorMessage = "Error de validación del API. Detalles: " . json_encode($response->json('errors'));
        }
        // --- FIN DEPURACIÓN ---

        return redirect()->back()->with('error', $errorMessage)->withInput();
    }

    // 🔸 Guardar Gasto
    public function storeExpense(Request $request)
    {
        // Validación del frontend (para UX inmediata)
        $data = $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'description' => 'nullable|string|max:255',
            'date' => 'required|date',
        ]);

        $data['type'] = 'expense';

        // Llama a la API (Backend)
        $response = Http::post('http://api.AgroFinanzas.test/api/finances', $data);

        if ($response->successful()) {
            return redirect()->route('client.finances.index', ['filter' => 'expense'])->with('success', 'Gasto registrado correctamente.');
        }

        // --- DEPURACIÓN: Muestra el error exacto del backend ---
        $errorMessage = $response->json('message') ?? 'Error desconocido al guardar el gasto en el API.';
        if ($response->failed() && $response->json('errors')) {
            $errorMessage = "Error de validación del API. Detalles: " . json_encode($response->json('errors'));
        }
        // --- FIN DEPURACIÓN ---

        return redirect()->back()->with('error', $errorMessage)->withInput();
    }

    // El método 'store' original
    public function store(Request $request)
    {
        $data = $request->validate([
            'type'      => 'required|in:income,expense',
            'amount'      => 'required|numeric|min:0.01',
            'date'        => 'required|date',
            'description' => 'nullable|string|max:255',
        ]);

        $response = Http::post('http://api.AgroFinanzas.test/api/finances', $data);

        if ($response->successful()) {
            return redirect()->route('client.finances.index')->with('success', 'Registro agregado correctamente.');
        }

        // --- DEPURACIÓN: Muestra el error exacto del backend ---
        $errorMessage = $response->json('message') ?? 'Error desconocido al agregar el registro.';
        if ($response->failed() && $response->json('errors')) {
            $errorMessage = "Error de validación del API. Detalles: " . json_encode($response->json('errors'));
        }
        // --- FIN DEPURACIÓN ---

        return redirect()->back()->with('error', $errorMessage)->withInput();
    }

    // Los métodos createIncome() y createExpense() ya no son necesarios
    // ya que la vista index() los incluye todos.
    public function update(Request $request, $id)
{
    $data = $request->validate([
        'amount' => 'required|numeric',
        'date' => 'required|date',
        'description' => 'nullable|string'
    ]);

    $response = Http::put("http://api.AgroFinanzas.test/api/finances/$id", $data);

    if ($response->successful()) {
        return back()->with('success', 'Registro actualizado correctamente.');
    }

    return back()->with('error', 'Error al actualizar.');
}


public function destroy($id)
{
    $response = Http::delete("http://api.AgroFinanzas.test/api/finances/$id");

    if ($response->successful()) {
        return back()->with('success', 'Registro eliminado.');
    }

    return back()->with('error', 'Error al eliminar.');
}

}
