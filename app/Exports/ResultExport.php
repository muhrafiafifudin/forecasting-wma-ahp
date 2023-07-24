<?php

namespace App\Exports;

use App\Models\Product;
use App\Models\ActualSale;
use App\Models\WMAForecasting;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ResultExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $actual_sales = ActualSale::distinct()->get(['month', 'year']);
        $count_actual_sale = count($actual_sales);

        $wma_forecastings = WMAForecasting::where('updated_at', '!=', NULL)->distinct()->get(['month', 'year']);
        $count_wma_forecasting = count($wma_forecastings);

        $products = Product::all();

        $actual_sale_results = [];

        foreach ($products as $product) {
            $actual_sale_results[$product->id] = [];
            foreach ($actual_sales as $actual_sale) {
                $stock = ActualSale::where([['product_id', $product->id], ['month', $actual_sale->month], ['year', $actual_sale->year]])->value('stock');

                $actual_sale_results[$product->id][$actual_sale->month][$actual_sale->year] = $stock;
            }
        }

        $wma_results = [];

        foreach ($products as $product) {
            $wma_results[$product->id] = [];
            foreach ($wma_forecastings as $wma_forecasting) {
                $stock = WMAForecasting::where([['product_id', $product->id], ['month', $wma_forecasting->month], ['year', $wma_forecasting->year]])->value('stock');

                $wma_results[$product->id][$wma_forecasting->month][$wma_forecasting->year] = $stock;
            }
        }

        return view('pages.result.excel.result_excel', compact('actual_sales', 'count_actual_sale', 'wma_forecastings', 'count_wma_forecasting', 'products', 'actual_sale_results', 'wma_results'));
    }
}
