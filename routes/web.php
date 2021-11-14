<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminControllers\CategoryController;
use App\Http\Controllers\AdminControllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard.index', [
        'active' => "dashboard"
    ]);
});


// Category
Route::get('dashboard/category/', [CategoryController::class, 'index'])->name('dashboard.category');
Route::get('dashboard/category/create/', [CategoryController::class, 'create'])->name('dashboard.category.create');
Route::post('dashboard/category/', [CategoryController::class, 'store'])->name('dashboard.category.store');
Route::get('dashboard/category/{category}', [CategoryController::class, 'edit'])->name('dashboard.category.edit');
Route::put('dashboard/category/{category}', [CategoryController::class, 'update'])->name('dashboard.category.update');
Route::delete('dashboard/category/{category}', [CategoryController::class, 'destroy'])->name('dashboard.category.destroy');

// Products
Route::get('dashboard/products/', [ProductController::class, 'index'])->name('dashboard.product');
Route::get('dashboard/product/create/', [ProductController::class, 'create'])->name('dashboard.product.create');
Route::post('dashboard/products/', [ProductController::class, 'store'])->name('dashboard.product.store');
Route::get('dashboard/product/{product}', [ProductController::class, 'edit'])->name('dashboard.product.edit');
Route::put('dashboard/product/{product}', [ProductController::class, 'update'])->name('dashboard.product.update');
Route::delete('dashboard/product/{product}', [ProductController::class, 'destroy'])->name('dashboard.product.destroy');
