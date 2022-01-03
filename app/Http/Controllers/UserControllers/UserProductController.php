<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowProductController extends Controller
{
    public function index(Request $request)
    {
        return view('frontEndCustomer.products.list');
    }
}
