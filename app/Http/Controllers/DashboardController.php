<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Criteria;
use App\Models\ActualSale;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::count();
        $products = Product::count();
        $criterias = Criteria::count();
        $actual_sales = ActualSale::count();

        return view('pages.dashboard', compact('users', 'products', 'criterias', 'actual_sales'));
    }
}
