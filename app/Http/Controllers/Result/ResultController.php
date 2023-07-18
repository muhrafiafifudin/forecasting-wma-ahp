<?php

namespace App\Http\Controllers\Result;

use App\Models\Product;
use App\Models\Criteria;
use Illuminate\Http\Request;
use App\Models\AlternativeWeight;
use App\Http\Controllers\Controller;

class ResultController extends Controller
{
    public function index()
    {
        $criterias = Criteria::all();
        $count_criteria = count($criterias);

        $alternative_weight = AlternativeWeight::all();

        $products = Product::all();
        $count_product = count($products);

        $result = [];

        // foreach ($products as $product) {
        //     foreach ($criterias as $criteria) {
        //         $result[$product->]
        //     }
        // }

        for ($x=0; $x < $count_product; $x++) {
            for ($y=0; $y < $count_criteria; $y++) {
                $result[$x][$y] = 1;
            }
        }

        dd($result);

        return view('pages.result.result', compact('criterias', 'count_criteria', 'products'));
    }
}
