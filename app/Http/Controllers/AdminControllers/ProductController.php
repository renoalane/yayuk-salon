<?php

namespace App\Http\Controllers\AdminControllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Product $products)
    {
        $q = $request->input('q');

        $products = $products->when($q, function ($query) use ($q) {
            return $query->where('name', 'like', '%' . $q . '%');
        })->paginate(5);

        // Menumpuk searching dan pagiation
        $request = $request->all();

        return view('dashboard.product.list', [
            'products' => $products,
            'title' => 'product',
            'active' => 'products',
            'request' => $request,
            'categories' => Category::all()->where('status', 1)->count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.product.form', [
            'active' => 'products',
            'title' => 'product',
            'button' => 'Create',
            'url' => 'dashboard.product.store',
            'categories' => Category::all()->where('status', 1)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required',
            'description' => 'required',
            'image' => 'required|image|file|max:2048',
            'stok' => 'required',
            'price' => 'required|regex:^[1-9][0-9]+^|not_in:0',
            'status' => 'required'
        ]);

        //validate jika ada image
        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('products-image');
        };

        Product::create($validateData);

        return redirect()
            ->route('dashboard.product')
            ->with('success', 'Product has been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('dashboard.product.form', [
            'active' => 'products',
            'title' => 'product',
            'button' => 'Update',
            'product' => $product,
            'categories' => Category::all()->where('status', 1),
            'url' => 'dashboard.product.update'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required',
            'description' => 'required',
            'image' => 'image|file|max:2048',
            'stok' => 'required|numeric|gt:0',
            'price' => 'required|regex:^[1-9][0-9]+^|not_in:0',
            'status' => 'required'
        ]);

        //validate jika ada image
        if ($request->file('image')) {

            // JIka Ada gambar lama di update hapus di storage
            if ($request->oldImage) [
                Storage::delete($request->oldImage)
            ];
            $validateData['image'] = $request->file('image')->store('products-image');
        };

        Product::where('id', $product->id)
            ->update($validateData);

        return redirect()
            ->route('dashboard.product')
            ->with('success', 'Product has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // delete filenya baru tabel
        if ($product->image) [
            Storage::delete($product->image)
        ];
        Product::destroy($product->id);

        return redirect()
            ->route('dashboard.product')
            ->with('success', 'Product has been Deleted');
    }
}
