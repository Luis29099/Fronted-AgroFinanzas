<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AgricultureDataService;
use Illuminate\Validation\ValidationException;

class AgricultureController extends Controller
{
    protected AgricultureDataService $service;

    public function __construct(AgricultureDataService $service)
    {
        $this->service = $service;
    }

    // Devuelve productos soportados
    public function products()
    {
        return response()->json([
            'products' => $this->service->supportedProducts()
        ]);
    }

    // /api/agro/data?product=maiz&indicator=prices
    public function data(Request $request)
    {
        $validated = $request->validate([
            'product' => 'required|string',
            'indicator' => 'required|string', // prices, production, trade, yield, ranking
            'year' => 'nullable|integer',
            'country' => 'nullable|string',
        ]);

        $product = strtolower($validated['product']);
        $indicator = strtolower($validated['indicator']);
        $year = $validated['year'] ?? null;
        $country = $validated['country'] ?? null;

        // Check supported product
        if (!in_array($product, $this->service->supportedProducts())) {
            return response()->json([
                'error' => true,
                'message' => "Producto no soportado: {$product}"
            ], 422);
        }

        try {
            $result = $this->service->getData($product, $indicator, $year, $country);

            return response()->json([
                'error' => false,
                'product' => $product,
                'indicator' => $indicator,
                'params' => [
                    'year' => $year,
                    'country' => $country
                ],
                'data' => $result,
            ]);
        } catch (\Exception $e) {

            // Opcional: \Log::error($e);

            return response()->json([
                'error' => true,
                'message' => 'No fue posible obtener los datos: ' . $e->getMessage()
            ], 500);
        }
    }

    // Resumen: devuelve varios indicadores para una lista de productos
    public function summary(Request $request)
    {
        $products = $request->get('products', $this->service->supportedProducts());
        $year = $request->get('year', null);

        $summary = $this->service->summary($products, $year);

        return response()->json([
            'error' => false,
            'summary' => $summary
            
        ]);
    }

    // /api/agro/ranking?product=cafe&year=2024
    public function ranking(Request $request)
    {
        $product = strtolower($request->get('product', 'maiz'));
        $year = $request->get('year', null);

        if (!in_array($product, $this->service->supportedProducts())) {
            return response()->json([
                'error' => true,
                'message' => "Producto no soportado: {$product}"
            ], 422);
        }

        $ranking = $this->service->ranking($product, $year);

        return response()->json([
            'error' => false,
            'product' => $product,
            'year' => $year,
            'ranking' => $ranking
        ]);
    }
}