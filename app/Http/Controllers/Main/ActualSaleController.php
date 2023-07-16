<?php

namespace App\Http\Controllers\Main;

use App\Models\Product;
use App\Models\ActualSale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

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

        return view('pages.main.actual_sale', compact('products', 'actual_sales', 'filters'));
    }

    public function changeData(Request $request)
    {
        try {
            if (ActualSale::where([['product_id', $request->product_id], ['month', $request->month], ['year', $request->year]])->exists()) {
                $actual_sale = ActualSale::where([['product_id', $request->product_id], ['month', $request->month], ['year', $request->year]])->first();
                $actual_sale->stock = $request->stock;
                $actual_sale->update();
            } else {
                $actual_sale = new ActualSale();
                $actual_sale->product_id = $request->product_id;
                $actual_sale->month = $request->month;
                $actual_sale->year = $request->year;
                $actual_sale->stock = $request->stock;
                $actual_sale->save();
            }

            return redirect()->route('actual-sale.index')->with(['success' => 'Berhasil Menambahkan Data !!']);
        } catch (\Throwable $th) {
            return redirect()->route('actual-sale.index')->with(['error' => 'Gagal Menambahkan Data !!']);
        }
    }
}
