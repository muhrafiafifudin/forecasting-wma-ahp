<?php

namespace App\Http\Controllers\ForecastingWMA;

use App\Models\Product;
use App\Models\ActualSale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActualSaleController extends Controller
{
    public function index()
    {
        $products = Product::all();

        $filters = ActualSale::distinct()->get(['month', 'year']);

        $actual_sales = [];

        foreach ($products as $product) {
            $actual_sales[$product->id] = [];
            foreach ($filters as $filter) {
                $stock = ActualSale::where([['product_id', $product->id], ['month', $filter->month], ['year', $filter->year]])->value('stock');

                $actual_sales[$product->id][$filter->month][$filter->year] = $stock;
            }
        }

        return view('pages.forecasting_wma.actual_sale', compact('products', 'actual_sales', 'filters'));
    }
}
