<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminControllers\ProductController;
use App\Http\Controllers\AdminControllers\ServiceController;
use App\Http\Controllers\AdminControllers\CategoryController;
use App\Http\Controllers\AdminControllers\DashboardController;
use App\Http\Controllers\AuthControllers\LoginController;
use App\Http\Controllers\AuthControllers\RegisterController;

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

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'autenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


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

    // Services
    Route::get('dashboard/services/', [ServiceController::class, 'index'])->name('dashboard.service');
    Route::get('dashboard/service/create/', [ServiceController::class, 'create'])->name('dashboard.service.create');
    Route::post('dashboard/services/', [ServiceController::class, 'store'])->name('dashboard.service.store');
    Route::get('dashboard/service/{service}', [ServiceController::class, 'edit'])->name('dashboard.service.edit');
    Route::put('dashboard/service/{service}', [ServiceController::class, 'update'])->name('dashboard.service.update');
    Route::delete('dashboard/service/{service}', [ServiceController::class, 'destroy'])->name('dashboard.service.destroy');
});
