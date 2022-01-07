<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $bookings = Booking::select('code_booking', 'date', 'start_time', 'end_time', 'total_price')->orderBy('date', 'asc')->skip(0)->take(8)->get();
        return view('dashboard.index', [
            'active' => 'dashboard',
            'title' => 'dashboard',
            'products' => Product::count(),
            'users' => User::count(),
            'booking' => Booking::count(),
            'bookings' => $bookings
        ]);
    }
}
