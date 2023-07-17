<?php

namespace App\Http\Controllers\Forecasting;

use App\Models\Criteria;
use App\Models\IndexRatio;
use Illuminate\Http\Request;
use App\Models\CriteriaCompare;
use App\Http\Controllers\Controller;

class AHPController extends Controller
{
    public function index()
    {
        $criterias = Criteria::all();

        foreach ($criterias as $criteria) {
            $ahp_weighting[] = '(' . $criteria->variable . ') ' . $criteria->criteria;
        }

        return view('pages.forecasting_ahp.ahp_weighting', compact('criterias', 'ahp_weighting'));
    }

    public function store(Request $request)
    {
        $criterias = Criteria::all();

        foreach ($criterias as $criteria) {
            $listID[] = $criteria->id;
            $listName[] = '(' . $criteria->variable . ') ' . $criteria->criteria;
        }

        $count_criteria = count($criterias);

        $matrix = [];
        $no = 0;

        for ($x=0; $x <= ($count_criteria - 2) ; $x++) {
            for ($y = ($x + 1); $y <= ($count_criteria - 1); $y++) {
                $no++;

                $weighting = $request->{'weighting_' . $no};

                $matrix[$x][$y] = $weighting;
                $matrix[$y][$x] = 1 / $weighting;

                if (CriteriaCompare::where([['criteria_1', $listID[$x]], ['criteria_2', $listID[$y]]])->exists()) {
                    $criteria_compare = CriteriaCompare::where([['criteria_1', $listID[$x]], ['criteria_2', $listID[$y]]])->first();
                    $criteria_compare->value = $matrix[$x][$y];
                    $criteria_compare->update();
                } else {
                    $criteria_compare = new CriteriaCompare();
                    $criteria_compare->criteria_1 = $listID[$x];
                    $criteria_compare->criteria_2 = $listID[$y];
                    $criteria_compare->value = $matrix[$x][$y];
                    $criteria_compare->save();
                }
            }
        }

        for ($i = 0; $i <= ($count_criteria - 1); $i++) {
            $matrix[$i][$i] = 1;
        }

        $sum_matrix_criteria = [];
        $sum_eigen = [];

        for ($i = 0; $i <= ($count_criteria - 1); $i++) {
            $sum_matrix_criteria[$i] = 0;
            $sum_eigen[$i] = 0;
        }

        for ($x = 0; $x <= ($count_criteria - 1); $x++) {
            for ($y = 0; $y <= ($count_criteria - 1); $y++) {
                $value = $matrix[$x][$y];
                $sum_matrix_criteria[$y] += $value;
            }
        }

        for ($x = 0; $x <= ($count_criteria - 1); $x++) {
            for ($y = 0; $y <= ($count_criteria - 1); $y++) {
                $comparison_matrix[$x][$y] = $matrix[$x][$y] / $sum_matrix_criteria[$y];
                $value = $comparison_matrix[$x][$y];
                $sum_eigen[$x] += $value;
            }

            $mean[$x] = $sum_eigen[$x] / $count_criteria;

            if (Criteria::where('id', $listID[$x])->exists()) {
                $result_pv = Criteria::where('id', $listID[$x])->first();
                $result_pv->result_pv = $mean[$x];
                $result_pv->update();
            }
        }

        $eigen_vector = 0;

        $eigen_vector = 0;
        for ($i=0; $i <= ($count_criteria - 1) ; $i++) {
            $eigen_vector += ($sum_matrix_criteria[$i] * (($sum_eigen[$i]) / $count_criteria));
        }

        $consistency_index = ($eigen_vector - $count_criteria) / ($count_criteria - 1);

        $index_ratio = IndexRatio::where('index_ratio', $count_criteria)->first();
        $index_ratio = $index_ratio->value;

        $consistency_ratio = $consistency_index / $index_ratio;

        return view('pages.forecasting_ahp.result_ahp_weighting', compact('count_criteria', 'criterias', 'listName', 'matrix', 'sum_matrix_criteria', 'sum_eigen', 'comparison_matrix', 'mean', 'eigen_vector', 'consistency_index', 'consistency_ratio'));
    }
}
