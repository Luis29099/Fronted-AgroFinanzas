<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class AgricultureDataService
{
    protected int $cacheTtlSeconds = 60 * 60 * 24; // 24 horas

    // Lista base de productos soportados (en español)
    public function supportedProducts(): array
    {
        return [
            'maiz','arroz','trigo','soya','cebada','avena',
            'cafe','cacao','banano','flores','azucar',
            'carne_bovina','pollo','cerdo','leche','huevo'
        ];
    }

    /**
     * getData
     * product: string (ej: 'maiz')
     * indicator: 'prices'|'production'|'trade'|'yield'|'ranking'
     */
    public function getData(string $product, string $indicator, ?int $year = null, ?string $country = null): array
    {
        $cacheKey = "agro:{$product}:{$indicator}:" . ($year ?? 'any') . ":" . ($country ?? 'any');

        return Cache::remember($cacheKey, $this->cacheTtlSeconds, function () use ($product, $indicator, $year, $country) {

            // 1) Intentamos proveedor 1 (ejemplo: WORLD BANK / FAO)
            $providers = [
                'fao' => env('FAO_API_URL'), // coloca tu endpoint FAO en .env
                'worldbank' => 'https://api.worldbank.org/v2', // ejemplo
                'commodityPrices' => env('COMMODITY_API_URL') // otros proveedores
            ];

            // A) Ejemplo: si indicator == 'prices' intentar COMMODITY API
            if ($indicator === 'prices') {
                $res = $this->fetchFromCommodityApi($product, $year, $country);
                if ($res) return $res;
            }

            // B) Ejemplo: production / yield -> FAO or WorldBank
            if (in_array($indicator, ['production','yield','trade'])) {
                $res = $this->fetchFromFaostatOrWorldBank($product, $indicator, $year, $country);
                if ($res) return $res;
            }

            // C) Ranking: calculado localmente desde datos de producción
            if ($indicator === 'ranking') {
                $res = $this->computeRankingSample($product, $year);
                if ($res) return $res;
            }

            // D) Fallback: si no obtuvimos nada, devolvemos datos de ejemplo para que la API no rompa
            return $this->sampleFallback($product, $indicator, $year, $country);
        });
    }

    /** Ejemplo de llamada a un proveedor de "precios de commodities".
     *  Reemplaza la URL por la de tu proveedor gratuito.
     */
    protected function fetchFromCommodityApi(string $product, ?int $year = null, ?string $country = null): ?array
    {
        $url = env('COMMODITY_API_URL'); // set en .env (opcional)
        if (!$url) return null;

        try {
            $resp = Http::timeout(10)->get($url, [
                'product' => $product,
                'year' => $year,
                'country' => $country,
                'apikey' => env('COMMODITY_API_KEY')
            ]);

            if ($resp->ok()) {
                $json = $resp->json();
                // Normaliza aquí según proveedor
                return [
                    'source' => 'commodity_api',
                    'fetched_at' => now()->toIso8601String(),
                    'payload' => $json
                ];
            }
        } catch (\Exception $e) {
            // log opcional
        }

        return null;
    }

    /** Ejemplo para FAO/WORLD BANK (simulado): intenta varios endpoints */
    protected function fetchFromFaostatOrWorldBank(string $product, string $indicator, ?int $year = null, ?string $country = null): ?array
    {
        // Ejemplo simple usando World Bank si aplica (muchos indicadores están en FAO o WB)
        // World Bank requiere mapping entre commodity y indicadores; aquí devolvemos intento básico.
        // Si quieres integrar FAOSTAT real, pon la URL/API key en .env y normaliza la respuesta.

        // Intento World Bank (ejemplo genérico)
        try {
            $wbUrl = "https://api.worldbank.org/v2/country/all/indicator/SP.POP.TOTL"; // solo ejemplo
            $resp = Http::timeout(8)->get($wbUrl, [
                'format' => 'json',
                'per_page' => 100,
            ]);

            if ($resp->ok()) {
                $json = $resp->json();
                return [
                    'source' => 'world_bank_sample',
                    'fetched_at' => now()->toIso8601String(),
                    'payload' => $json
                ];
            }
        } catch (\Exception $e) {
            // ignore
        }

        return null;
    }

    /** Ranking de ejemplo: crea un ranking simulado */
    protected function computeRankingSample(string $product, ?int $year = null): array
    {
        // Datos de ejemplo: (pais => toneladas)
        $sample = [
            ['country' => 'USA', 'production_t' => 12000000],
            ['country' => 'Brasil', 'production_t' => 9800000],
            ['country' => 'Argentina', 'production_t' => 3200000],
            ['country' => 'Colombia', 'production_t' => 400000],
        ];

        return [
            'source' => 'simulated_ranking',
            'year' => $year,
            'ranking' => $sample
        ];
    }

    /** Fallback sample data */
    protected function sampleFallback(string $product, string $indicator, ?int $year = null, ?string $country = null): array
    {
        return [
            'source' => 'fallback_sample',
            'product' => $product,
            'indicator' => $indicator,
            'year' => $year,
            'country' => $country,
            'values' => [
                'price_usd_per_ton' => rand(120, 800),
                'production_tons' => rand(10000, 1000000),
                'yield_t_ha' => round(rand(1000, 8000) / 1000, 2)
            ],
            'note' => 'Datos de ejemplo (configura proveedores reales en .env para obtener datos reales).'
        ];
    }

    /**
     * summary: obtiene varios indicadores para una lista de productos
     */
public function summary(array $products, ?int $year = null): array
{
    $out = [];

    foreach ($products as $p) {

        if (!in_array($p, $this->supportedProducts())) continue;

        $out[$p] = [
            'prices'     => $this->getData($p, 'prices', $year),
            'production' => $this->getData($p, 'production', $year),
            'yield'      => $this->getData($p, 'yield', $year),
            'trade'      => $this->getData($p, 'trade', $year),   // export/import
            'ranking'    => $this->getData($p, 'ranking', $year),
        ];
    }

    return $out;
}

    /**
     * ranking wrapper
     */
    public function ranking(string $product, ?int $year = null): array
    {
        return $this->getData($product, 'ranking', $year, null);
    }
}