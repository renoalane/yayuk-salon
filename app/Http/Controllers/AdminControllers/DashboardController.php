<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'active' => 'dashboard',
            'title' => 'dashboard',
            'products' => Product::count()
        ]);
    }
}
