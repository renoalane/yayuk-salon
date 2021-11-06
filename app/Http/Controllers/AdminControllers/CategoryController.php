<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Category $categories)
    {
        $q = $request->input('q');

        $categories = $categories->when($q, function ($query) use ($q) {
            return $query->where('name', 'like', '%' . $q . '%');
        })->paginate(5);

        // Menumpuk searching dan pagiation
        $request = $request->all();

        return view('dashboard.category.list', [
            'categories' => $categories,
            'active' => 'categories',
            'request' => $request
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.category.form', [
            'active' => 'categories',
            'button' => 'Create',
            'url' => 'dashboard.category.store'
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
            'status' => 'required',
        ]);

        Category::create($validateData);

        return redirect()
            ->route('dashboard.category')
            ->with('success', 'New Category Has been create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.category.form', [
            'active' => 'categories',
            'button' => 'Update',
            'category' => $category,
            'url' => 'dashboard.category.update'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'status' => 'required',
        ]);

        Category::where('id', $category->id)
            ->update($validateData);

        return redirect()
            ->route('dashboard.category')
            ->with('success', 'Category has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);


        return redirect()
            ->route('dashboard.category')
            ->with('success', 'Category has been deleted');
    }
}
