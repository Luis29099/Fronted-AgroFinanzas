<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FinanceClienteController extends Controller
{
    // 🔸 Formulario de Ingreso
    public function createIncome()
    {
        return view('client.income.create');
    }

    public function storeIncome(Request $request)
    {
        $data = $request->validate([
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        $data['type'] = 'income';

        Http::post('http://api.AgroFinanzas.test/api/finances', $data);

        return redirect()->route('client.index')->with('success', 'Ingreso registrado correctamente.');
    }

    // 🔸 Formulario de Gasto
    public function createExpense()
    {
        return view('client.expense.create');
    }

    public function storeExpense(Request $request)
    {
        $data = $request->validate([
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        $data['type'] = 'expense';

        Http::post('http://api.AgroFinanzas.test/api/finances', $data);

        return redirect()->route('client.index')->with('success', 'Gasto registrado correctamente.');
    }
    public function index(Request $request)
{
    // Recibir filtro desde la URL (?filter=income o expense)
    $filter = $request->query('filter', 'all'); // por defecto 'all'

    $response = Http::get('http://api.AgroFinanzas.test/api/finances');

    if ($response->successful()) {
        $finances = $response->json();

        // Filtrar en el cliente
        if ($filter !== 'all') {
            $finances = array_filter($finances, function($item) use ($filter) {
                return $item['type'] === $filter;
            });
        }

        return view('client.index', [
            'finances' => $finances,
            'filter' => $filter
        ]);
    }

    return view('client.index', [
        'finances' => [],
        'filter' => $filter
    ])->with('error', 'No se pudo cargar el historial.');
}


//original----------------------------------------

    // public function index()
    // {
    //     $finances = Http::get('http://api.AgroFinanzas.test/api/finances')->json();
    //     return view('client.index', compact('finances'));
    // }

    // public function store(Request $request)
    // {
    //     $data = $request->validate([
    //         'income'  => 'required|numeric',
    //         'expense' => 'required|numeric',
    //         'date'    => 'required|date',
    //     ]);

    //     $response = Http::post('http://api.AgroFinanzas.test/api/finances', $data);

    //     if ($response->successful()) {
    //         return redirect()->route('client.index')->with('success', 'Registro agregado correctamente.');
    //     }

    //     return redirect()->back()->with('error', $response->json('message') ?? 'Error al agregar el registro.');
    // }
    //----------------------------------------------------------------------------
    public function store(Request $request)
{
    $data = $request->validate([
        'type'        => 'required|in:income,expense',
        'amount'      => 'required|numeric',
        'date'        => 'required|date',
        'description' => 'nullable|string',
    ]);

    $response = Http::post('http://api.AgroFinanzas.test/api/finances', $data);

    if ($response->successful()) {
        return redirect()->route('client.index')->with('success', 'Registro agregado correctamente.');
    }

    return redirect()->back()->with('error', $response->json('message') ?? 'Error al agregar el registro.');
}

}



