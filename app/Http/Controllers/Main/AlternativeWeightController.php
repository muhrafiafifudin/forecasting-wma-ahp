<?php

namespace App\Http\Controllers\Main;

use App\Models\AlternativeWeight;
use App\Models\Product;
use App\Models\Criteria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlternativeWeightController extends Controller
{
    public function index()
    {
        $criterias = Criteria::all();
        $alternative_weight_distinct = AlternativeWeight::distinct()->get(['weight']);
        $products = Product::all();

        $alternative_weight = [];

        foreach ($alternative_weight_distinct as $data) {
            $alternative_weight[$data->weight] = [];
            foreach ($criterias as $criteria) {
                $product_id = AlternativeWeight::where([['weight', $data->weight], ['criteria_id', $criteria->id]])->value('product_id');

                $product = Product::where('id', $product_id)->first();

                $alternative_weight[$data->weight][$criteria->id] = '(' . $product->variable . ') ' . $product->product;
            }
        }

        return view('pages.main.alternative_weight', compact('criterias', 'alternative_weight', 'alternative_weight_distinct', 'products'));
    }

    public function changeData(Request $request)
    {
        try {
            if (AlternativeWeight::where([['weight', $request->weight], ['criteria_id', $request->criteria_id]])->exists()) {
                $alternative_weight = AlternativeWeight::where([['weight', $request->weight], ['criteria_id', $request->criteria_id]])->first();
                $alternative_weight->product_id = $request->product_id;
                $alternative_weight->update();
            }

            return redirect()->route('alternative-weight.index')->with(['success' => 'Berhasil Menambahkan Data !!']);
        } catch (\Throwable $th) {
            return redirect()->route('alternative-weight.index')->with(['error' => 'Gagal Menambahkan Data !!']);
        }
    }
}
