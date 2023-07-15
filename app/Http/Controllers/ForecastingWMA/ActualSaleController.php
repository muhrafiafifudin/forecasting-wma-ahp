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

    public function period_forecasting()
    {
        return view('pages.forecasting_wma.choose_period_wma');
    }

    public function result_wma(Request $request)
    {
        $products = Product::all();

        $filters = ActualSale::distinct()->get(['month', 'year']);

        if ($filters->count() > 5) {
            $filters = $filters->splice(1, 5);
        }

        // dd($filters);

        $actual_sales = [];

        foreach ($products as $product) {
            $actual_sales[$product->id] = [];

            $predict = 0;
            foreach ($filters as $filter) {
                $stock = ActualSale::where([['product_id', $product->id], ['month', $filter->month], ['year', $filter->year]])->value('stock');

                $actual_sales[$product->id][$filter->month][$filter->year] = $stock;
            }

            $weights = [1, 2, 3, 4, 5];

            foreach ($filters as $i => $filter) {
                $stock = $actual_sales[$product->id][$filter->month][$filter->year] ?? 0;

                $predict += $stock * $weights[$i];
            }

            $actual_sales[$product->id][$request->month][$request->year] = $predict / 15;

            if (ActualSale::where([['product_id', $product->id], ['month', $request->month], ['year', $request->year]])->doesntExist()) {
                $new_actual_sales = new ActualSale();
                $new_actual_sales->product_id = $product->id;
                $new_actual_sales->month = $request->month;
                $new_actual_sales->year = $request->year;
                $new_actual_sales->stock = $predict / 15;
                $new_actual_sales->save();
            }
        }

        // $predict_month = (object) [
        //     'month' => $request->month,
        //     'year' => $request->year
        // ];

        // $filters->push($predict_month);

        $filters = ActualSale::distinct()->get(['month', 'year']);
        // dd($filters);

        return view('pages.forecasting_wma.result_wma', compact('products', 'actual_sales', 'filters'));
    }
}
