<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Tanggal lebih dari sama dengan sekakrang belum
        $bookings = Booking::select('code_booking', 'date', 'start_time', 'end_time', 'total_price')->where('date', '>=', Carbon::today())->orderBy('date', 'asc')->skip(0)->take(8)->get();
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
