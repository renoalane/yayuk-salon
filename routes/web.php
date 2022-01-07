<?php


use App\Models\User;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminControllers\BookingController;
use App\Http\Controllers\AdminControllers\UserController;
use App\Http\Controllers\AuthControllers\LoginController;
use App\Http\Controllers\AdminControllers\ProductController;
use App\Http\Controllers\AdminControllers\ServiceController;
use App\Http\Controllers\AuthControllers\RegisterController;
use App\Http\Controllers\AdminControllers\CategoryController;
use App\Http\Controllers\AdminControllers\DashboardController;
use App\Http\Controllers\UserControllers\UserBookingController;
use App\Http\Controllers\UserControllers\UserServiceController;

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
    return view('frontEndCustomer.index');
})->name('home');
Route::get('/products', function () {
    return view('frontEndCustomer.booking.detail');
})->name('product');

// List Services User
Route::get('/services/', [UserServiceController::class, 'index'])->name('user.service');



// Booking
Route::middleware('auth')->group(function () {
    Route::get('/booking/', [UserBookingController::class, 'index'])->name('user.booking');
    Route::get('/booking/create/', [UserBookingController::class, 'create'])->name('user.booking.create');
    Route::post('/booking/', [UserBookingController::class, 'store'])->name('user.booking.store');
    Route::get('/booking/{booking:code_booking}', [UserBookingController::class, 'show'])->name('user.booking.show');
});
// End Booking


Route::get('/product/{product}', function () {
    return view('frontEndCustomer.products.list', [
        'title' => 'Products'
    ]);
})->name('product.detail');

// Register
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'autenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Users


// Admin
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Bookings
    Route::get('dashboard/bookings/', [BookingController::class, 'index'])->name('dashboard.booking');
    Route::get('dashboard/booking/create/', [BookingController::class, 'create'])->name('dashboard.booking.create');
    Route::post('dashboard/bookings/', [BookingController::class, 'store'])->name('dashboard.booking.store');
    Route::get('dashboard/booking/{booking:code_booking}', [BookingController::class, 'show'])->name('dashboard.booking.show');
    Route::get('dashboard/booking/{booking:code_booking}/edit', [BookingController::class, 'edit'])->name('dashboard.booking.edit');
    Route::put('dashboard/booking/{booking:code_booking}', [BookingController::class, 'update'])->name('dashboard.booking.update');
    Route::delete('dashboard/booking/{booking}', [BookingController::class, 'destroy'])->name('dashboard.booking.destroy');


    // Category
    Route::get('dashboard/categories/', [CategoryController::class, 'index'])->name('dashboard.category');
    Route::get('dashboard/category/create/', [CategoryController::class, 'create'])->name('dashboard.category.create');
    Route::post('dashboard/categories/', [CategoryController::class, 'store'])->name('dashboard.category.store');
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

    // Users
    Route::get('dashboard/users/', [UserController::class, 'index'])->name('dashboard.user');
    Route::get('dashboard/user/{user}', [UserController::class, 'edit'])->name('dashboard.user.edit');
    Route::put('dashboard/user/{user}', [UserController::class, 'update'])->name('dashboard.user.update');
    Route::delete('dashboard/user/{user}', [UserController::class, 'destroy'])->name('dashboard.user.destroy');
});
