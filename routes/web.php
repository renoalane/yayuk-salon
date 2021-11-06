<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminControllers\CategoryController;

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

Route::get('/', function () {
    return view('dashboard.category.list');
});


// Category
Route::get('dashboard/category/', [CategoryController::class, 'index'])->name('dashboard.category');
Route::get('dashboard/category/create/', [CategoryController::class, 'create'])->name('dashboard.category.create');
Route::post('dashboard/category/', [CategoryController::class, 'store'])->name('dashboard.category.store');
Route::get('dashboard/category/{category}', [CategoryController::class, 'edit'])->name('dashboard.category.edit');
Route::put('dashboard/category/{category}', [CategoryController::class, 'update'])->name('dashboard.category.update');
Route::delete('dashboard/category/{category}', [CategoryController::class, 'destroy'])->name('dashboard.category.destroy');

// Products
