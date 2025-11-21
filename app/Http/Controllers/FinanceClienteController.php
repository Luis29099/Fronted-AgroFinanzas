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
        // 1. Obtener filtro desde la URL (query)
        $filter = $request->query('filter', 'all'); // por defecto 'all'

        // 2. Llamada a la API para obtener todos los registros
        $response = Http::get('http://api.AgroFinanzas.test/api/finances');

        if ($response->successful()) {
            $finances = $response->json();

            // 3. Filtrar los datos en el cliente (si el filtro no es 'all')
            if ($filter !== 'all') {
                $finances = array_filter($finances, function($item) use ($filter) {
                    // Usar 'type' como fallback si el campo falta
                    return ($item['type'] ?? 'N/A') === $filter;
                });
            }
            
            // Revertir el orden para mostrar el más reciente primero
            $finances = array_reverse($finances); 

            // 4. Retornar la vista unificada
            return view('client.client_finances', [
                'finances' => $finances,
                'filter' => $filter // Se pasa el filtro para resaltar el botón correcto en la vista
            ]);
        }
        
        // Manejo de error de API
        return view('client.client_finances', [
            'finances' => [],
            'filter' => $filter
        ])->with('error', 'No se pudo cargar el historial de finanzas. Revisar API.');
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
}
