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
        // take this month
        $this_month = Carbon::now()->month;
        // Take last month
        $last_month = Carbon::now()->subMonth()->month;
        // Take this year
        $this_year = Carbon::now()->year;

        // Total price at this Month this years
        $sum_this_booking = (int)Booking::select('total_price')->where('status', 2)->whereYear('date', $this_year)->whereMonth('date', $this_month)->sum('total_price');
        // Total price at last month this years
        $sum_last_booking = (int)Booking::select('total_price')->where('status', 2)->whereYear('date', $this_year)->whereMonth('date', $last_month)->sum('total_price');

        // If last month diferrence years
        if ($this_month < $last_month) {
            $last_year = Carbon::now()->subMonth()->year;

            $sum_last_booking = (int)Booking::select('total_price')->where('status', 2)->whereYear('date', $last_year)->whereMonth('date', $last_month)->sum('total_price');
        }


        // Precentase income booking month to month
        if ($sum_this_booking === 0 || $sum_this_booking < $sum_last_booking || $sum_last_booking === 0) {
            $presentase = 0;
        } else {
            $presentase = round(($sum_this_booking - $sum_last_booking) / $sum_last_booking * 100);
        }


        $bookings = Booking::select('code_booking', 'date', 'start_time', 'end_time', 'total_price')->where('date', '>=', Carbon::today())->where('status', '=', 0)->orderBy('date', 'asc')->skip(0)->take(8)->get();
        return view('dashboard.index', [
            'active' => 'dashboard',
            'title' => 'dashboard',
            'products' => Product::count(),
            'users' => User::count(),
            'booking' => Booking::count(),
            'bookings' => $bookings,
            'presentase' => $presentase
        ]);
    }
}
