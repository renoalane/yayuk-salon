<?php

namespace App\Http\Controllers\UserControllers;

use App\Models\Booking;
use App\Models\Service;
use App\Models\DetailBooking;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Contracts\Support\ValidatedData;

class UserBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Menumpuk request
        $request = $request->all();

        return view('frontEndCustomer.booking.list', [
            'title' => 'Booking',
            'bookings' => Booking::where('user_id', auth()->user()->id)->paginate(10),
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
        return view('frontEndCustomer.booking.form', [
            'title' => 'Booking',
            'services' => Service::all()
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
        $oldBooking = Booking::select('date', 'start_time', 'end_time')->get();

        // Validate input
        $validateData = $request->validate([
            'date' => 'required|after_or_equal:now|date|date_format:Y-m-d',
            'start_time' => 'required|date_format:H:i'
        ]);

        // Check Request Service
        if (is_null($request->service)) {
            return redirect()
                ->route('user.booking.create')
                ->with('failed', 'Service must be required');
        }

        // string to array 
        $time = explode(':', $request->start_time);
        // array string to int string
        $time[0] = (int)$time[0];
        $time[1] = (int)$time[1];

        // Total Duration
        $total_duration = 0;
        foreach ($request->service as $ser) {
            $servis = Service::find($ser);

            $total_duration += $servis->duration;
        }


        // check total duration to end time
        if ($total_duration > 60) {
            $minute = $time[1] + $total_duration;
            $permenit = 60;
            $perjam = 1;
            $sisaMenit = 0;
            $sisaJam = $time[0];
            while ($total_duration >= $permenit) {
                $sisaMenit = $total_duration - $permenit;
                $permenit = 60 * ($perjam++);
                $tambahanJam = $sisaJam++;
            }
            $time[0] = $tambahanJam;
            $time[1] = $sisaMenit;
        } else {
            $minute = $time[1] + $total_duration;
            if ($minute >= 60) {
                $time[0] = $time[0] + 1;
                $time[1] = $total_duration - (60 - $time[1]);
            } else {
                $time[1] = $time[1] + $total_duration;
            }
        }

        $end_time = implode(':', $time);
        $end_time = date('H:i:s', strtotime($end_time));
        $end_time = Carbon::create($end_time);
        $start_time = date('H:i:s', strtotime($request->start_time));
        $start_time = Carbon::create($start_time);


        // Validate Time and Date if avaible book
        foreach ($oldBooking as $old) {
            if ($old->date === $request->date) {
                $theDate = Booking::where('date', $request->date)->get();
                foreach ($theDate as $date) {
                    $dt_start = Carbon::create($date->start_time)->toTimeString();
                    $dt_end = Carbon::create($date->end_time)->toTimeString();
                    if ($start_time->between($dt_start, $dt_end) || $end_time->between($dt_start, $dt_end)) {
                        return redirect()
                            ->route('user.booking.create')
                            ->with('failed', 'Sorry, For the time and date someone already booked');
                    }
                }
            }
        }

        // Validate Time if greater then 5pm
        if ($end_time > Carbon::create('17:00:00')) {
            return redirect()
                ->route('user.booking.create')
                ->with('failed', 'Sorry, duration exceeds working hours');
        }

        // User Login
        $validateData['user_id'] = auth()->user()->id;
        $validateData['user_name'] = auth()->user()->name;

        // Code booking random
        $validateData['code_booking'] = Str::random(3) . '-' . 'ys' . time();

        $validateData['total_price'] = 0;

        $validateData['end_time'] = $end_time;

        $booking =  Booking::create($validateData);

        $total_price = 0;
        foreach ($request->service as $reqser) {
            $service = Service::find($reqser);

            $total_price += $service->price;
            $total_duration += $service->duration;
            DetailBooking::create([
                'booking_id' => $booking->id,
                'service_id' => $service->id,
                'service_name' => $service->name,
                'service_price' => $service->price,
                'service_duration' => $service->duration
            ]);
        }

        Booking::where('id', $booking->id)->update([
            'total_price' => $total_price
        ]);

        return redirect()
            ->route('user.booking')
            ->with('success', 'Thank you for ordering, please wait for whatsapp confirmation from admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        return view('frontEndCustomer.booking.detail', [
            'title' => 'Booking',
            'booking' => $booking
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
