<?php

namespace App\Http\Controllers\Main;

use App\Models\Criteria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class CriteriaController extends Controller
{
    public function index()
    {
        $criterias = Criteria::all();

        return view('pages.main.criteria', compact('criterias'));
    }

    public function store(Request $request)
    {
        try {
            $criteria = new Criteria();
            $criteria->variable = $request->variable;
            $criteria->criteria = $request->criteria;
            $criteria->save();

            return redirect()->route('criteria.index')->with(['success' => 'Berhasil Menambahkan Data !!']);
        } catch (\Throwable $th) {
            return redirect()->route('criteria.index')->with(['error' => 'Gagal Menambahkan Data !!']);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $id = Crypt::decrypt($id);

            $criteria = Criteria::findOrFail($id);
            $criteria->variable = $request->variable;
            $criteria->criteria = $request->criteria;
            $criteria->update();

            return redirect()->route('criteria.index')->with(['success' => 'Berhasil Mengubah Data !!']);
        } catch (\Throwable $th) {
            return redirect()->route('criteria.index')->with(['error' => 'Gagal Mengubah Data !!']);
        }
    }

    public function destroy($id)
    {
        try {
            $id = Crypt::decrypt($id);

            $criteria = Criteria::findOrFail($id);
            $criteria->delete();

            return redirect()->route('criteria.index')->with(['success' => 'Berhasil Menghapus Data !!']);
        } catch (\Throwable $th) {
            return redirect()->route('criteria.index')->with(['error' => 'Gagal Menghapus Data !!']);
        }
    }
}
