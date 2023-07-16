<?php

namespace App\Http\Controllers\Main;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('pages.main.product', compact('products'));
    }

    public function store(Request $request)
    {
        try {
            $product = new Product();
            $product->variable = $request->variable;
            $product->code = $request->code;
            $product->product = $request->product;
            $product->price = $request->price;
            $product->exp_date = $request->exp_date;
            $product->stock = $request->stock;
            $product->actual_sale = $request->actual_sale;
            $product->forecasting = $request->forecasting;
            $product->save();

            return redirect()->route('product.index')->with(['success' => 'Berhasil Menambahkan Data !!']);
        } catch (\Throwable $th) {
            return redirect()->route('product.index')->with(['error' => 'Gagal Menambahkan Data !!']);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $id = Crypt::decrypt($id);

            $product = Product::findOrFail($id);
            $product->variable = $request->variable;
            $product->code = $request->code;
            $product->product = $request->product;
            $product->price = $request->price;
            $product->exp_date = $request->exp_date;
            $product->stock = $request->stock;
            $product->actual_sale = $request->actual_sale;
            $product->forecasting = $request->forecasting;
            $product->update();

            return redirect()->route('product.index')->with(['success' => 'Berhasil Mengubah Data !!']);
        } catch (\Throwable $th) {
            return redirect()->route('product.index')->with(['error' => 'Gagal Mengubah Data !!']);
        }
    }

    public function destroy($id)
    {
        try {
            $id = Crypt::decrypt($id);

            $product = Product::findOrFail($id);
            $product->delete();

            return redirect()->route('product.index')->with(['success' => 'Berhasil Menghapus Data !!']);
        } catch (\Throwable $th) {
            return redirect()->route('product.index')->with(['error' => 'Gagal Menghapus Data !!']);
        }
    }
}
