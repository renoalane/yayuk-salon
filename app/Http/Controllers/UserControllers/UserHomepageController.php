<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class UserHomepageController extends Controller
{
    public function index()
    {
        $products = Product::select('name', 'image', 'category_id')->where('status', 1)->orderBy('created_at', 'asc')->skip(0)->take(4)->get();

        return view('frontEndCustomer.index', [
            'products' => $products
        ]);
    }
}
