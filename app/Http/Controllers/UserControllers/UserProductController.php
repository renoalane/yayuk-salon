<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class UserProductController extends Controller
{
    public function index(Request $request, Product $products)
    {

        $q = $request->input('q');

        $products = $products->where('status', 1)
            ->when($q, function ($query) use ($q) {
                return $query->where('name', 'like', '%' . $q . '%');
            })->paginate(8);

        $categories = Category::where('status', 1)->get();

        if ($request->category) {
            $products = Product::where('category_id', $request->category)->where('status', 1)->paginate(8);
        }

        $request = $request->all();

        return view('frontEndCustomer.product.list', [
            'products' => $products,
            'categories' => $categories,
            'request' => $request,
            'title' => 'Products'
        ]);
    }
    public function show(Product $product)
    {
        return view('frontEndCustomer.product.detail', [
            'title' => 'Product',
            'product' => $product
        ]);
    }
}
