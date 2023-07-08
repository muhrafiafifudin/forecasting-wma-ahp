<?php

namespace App\Http\Controllers\Main;

use App\Models\Criteria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CriteriaController extends Controller
{
    public function index()
    {
        $criterias = Criteria::all();

        return view('pages.main.criteria', compact('criterias'));
    }

    public function store(Request $request)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
