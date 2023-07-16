<?php

namespace App\Http\Controllers\Forecasting;

use App\Models\Product;
use App\Models\ActualSale;
use App\Models\WMAForecasting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WMAController extends Controller
{
    public function index()
    {
        $products = Product::all();

        $filters = WMAForecasting::distinct()->get(['month', 'year']);

        $actual_sales = [];

        foreach ($products as $product) {
            $actual_sales[$product->id] = [];
            foreach ($filters as $filter) {
                $stock = WMAForecasting::where([['product_id', $product->id], ['month', $filter->month], ['year', $filter->year]])->value('stock');

                $actual_sales[$product->id][$filter->month][$filter->year] = $stock;
            }
        }

        return view('pages.forecasting_wma.forecast_data', compact('products', 'actual_sales', 'filters'));
    }

    public function period_forecasting()
    {
        return view('pages.forecasting_wma.choose_period_wma');
    }

    public function result_wma(Request $request)
    {
        $products = Product::all();

        $filters = WMAForecasting::distinct()->orderBy('id', 'desc')->take(5)->get(['month', 'year']);
        $filters = $filters->reverse();
        $filters = collect($filters)->values()->all();

        $actual_sales = [];

        foreach ($products as $product) {
            $actual_sales[$product->id] = [];

            $predict = 0;
            foreach ($filters as $filter) {
                $stock = WMAForecasting::where([['product_id', $product->id], ['month', $filter->month], ['year', $filter->year]])->value('stock');

                $actual_sales[$product->id][$filter->month][$filter->year] = $stock;
            }

            $weights = [1, 2, 3, 4, 5];

            foreach ($filters as $i => $filter) {
                $stock = $actual_sales[$product->id][$filter->month][$filter->year] ?? 0;

                $predict += $stock * $weights[$i];
            }

            $actual_sales[$product->id][$request->month][$request->year] = $predict / 15;

            if (WMAForecasting::where([['product_id', $product->id], ['month', $request->month], ['year', $request->year]])->doesntExist()) {
                $new_actual_sales = new WMAForecasting();
                $new_actual_sales->product_id = $product->id;
                $new_actual_sales->month = $request->month;
                $new_actual_sales->year = $request->year;
                $new_actual_sales->stock = $predict / 15;
                $new_actual_sales->save();
            }
        }

        $filters = WMAForecasting::distinct()->orderBy('id', 'desc')->take(5)->get(['month', 'year']);
        $filters = $filters->reverse();
        $filters = collect($filters)->values()->all();

        return view('pages.forecasting_wma.result_wma', compact('products', 'actual_sales', 'filters'));
    }
}
