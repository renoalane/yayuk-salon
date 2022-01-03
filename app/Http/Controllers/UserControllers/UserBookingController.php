<?php

namespace App\Http\Controllers\UserControllers;

use App\Models\Booking;
use App\Models\Service;
use App\Models\DetailBooking;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\ValidatedData;

class UserBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

            // if ($minute >= 60 && $minute < 120) {
            //     $time[0] = $time[0] + (1 * 1);
            //     $time[1] = $total_duration - (60 * 1 - $time[1]);
            // } elseif ($minute >= 120 && $minute < 180) {
            //     $time[0] = $time[0] + (1 * 2);
            //     $time[1] = $total_duration - (60 * 2 - $time[1]);
            // } elseif ($minute >= 180 && $minute < ) {
            //     $time[0] = $time[0] + (1 * 3);
            //     $time[1] = $total_duration - (60 * 3 - $time[1]);
            // } else {
            //     echo "belum";
            // }

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
        // dd($time, $total_duration, $request->start_time, $end_time);

        $rules = [
            'user_name' => auth()->user()->name,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'total_price' => 0
        ];

        // User Login
        $rules['user_id'] = auth()->user()->id;

        // Code booking random
        $rules['code_booking'] = Str::random(3) . '-' . 'ys' . time();

        // $rules['excerpt'] = Str::limit(strip_tags($request->description), 200);
        $rules['end_time'] = $end_time;

        $booking =  Booking::create($rules);

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
            'total_price' => $total_price,
            'end_time' => $end_time
        ]);

        return redirect()
            ->route('user.booking')
            ->with('success', 'Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
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
