<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Booking $bookings)
    {
        $sd = $request->input('s');

        $ed = $request->input('e');

        if ($sd && $ed) {
            $bookings = Booking::whereBetween('date', [$sd, $ed])->orderBy('date', 'asc')->paginate(5);
        } else {
            $bookings = Booking::orderBy('date', 'asc')->paginate(5);
        }
        // $bookings = $bookings->when($q, function ($query) use ($q) {
        //     return $query->where('name', 'like', '%' . $q . '%');
        // })->paginate(5);

        // Menumpuk searching dan pagiation
        $request = $request->all();

        return view('dashboard.booking.list', [
            'bookings' => $bookings,
            'title' => 'bookings',
            'active' => 'bookings',
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        // return view('dashboard.booking.detail', [
        //     'title' => 'booking',
        //     'active' => 'bookings',
        //     'booking' => $booking
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        return view('dashboard.booking.detail', [
            'title' => 'booking',
            'active' => 'bookings',
            'booking' => $booking
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        $validateData = $request->validate([
            'status' => 'required'
        ]);

        $booking->update($validateData);
        return redirect()
            ->route('dashboard.booking')
            ->with('success', 'Status Booking has been Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
