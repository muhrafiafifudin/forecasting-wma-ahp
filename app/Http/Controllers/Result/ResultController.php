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

        foreach ($products as $product) {
            $listVar[] = $product->variable;
            $listName[] = $product->product;
        }

        $count_product = count($products);

        $result = [];
        $sum_result = [];
        $rank_sum_result = [];

        for ($x=0; $x < $count_product; $x++) {
            for ($y=0; $y < $count_criteria; $y++) {
                $alternative_weight = AlternativeWeight::where([['product_id', ($x+1)], ['criteria_id', ($y+1)]])->value('weight');

                $criteria = AlternativeWeight::where([['product_id', ($x+1)], ['criteria_id', ($y+1)]])->first();
                $criteria = $criteria->criteria->result_pv;

                $result[$x][$y] = $alternative_weight * $criteria;
            }

            $sum_result[] = array_sum($result[$x]) / $count_criteria;
            $rank_sum_result[] = array_sum($result[$x]) / $count_criteria;
        }

        rsort($rank_sum_result);

        $ranking = [];

        foreach ($rank_sum_result as $key => $value) {
            $ranking[$key] = [
                'value' => $value,
                'rank' => array_search($value, $sum_result) + 1
            ];
        }

        return view('pages.result.result', compact('listVar', 'listName', 'criterias', 'count_criteria', 'products', 'count_product', 'result', 'sum_result', 'ranking'));
    }
}
