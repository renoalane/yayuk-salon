@extends('dashboard.layouts.main')

{{-- Heading --}}
@section('heading')
    <div class="d-flex align-items-center">
        <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
        <h2 class="fs-2 m-0">Dashboard</h2>
    </div>
@endsection

{{-- Content Section --}}
@section('content')
<div class="container-fluid px-4">
    <div class="row g-3 my-2">
        <div class="col-lg-3 col-md-6">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2">{{ $products }}</h3>
                    <p class="fs-5">Products</p>
                </div>
                <i class="fas fa-boxes fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2">
                        @if ($users <= 100)
                            {{ $users }}
                        @else
                            100+
                        @endif
                    </h3>
                    <p class="fs-5">Users</p>
                </div>
                <i
                    class="fas fa-users fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2">
                        @if ($booking <= 100)
                            {{ $booking }}
                        @else
                            100+
                        @endif
                    </h3>
                    <p class="fs-5">Bookings</p>
                </div>
                <i class="fas fa-calendar-alt fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2">{{ $presentase }}%</h3>
                    <p class="fs-5">Increase</p>
                </div>
                <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>
    </div>

    <div class="row my-5">
        <h3 class="fs-4 mb-3">Recent Bookings</h3>
        <div class="col">
            <table class="table bg-white rounded shadow-sm responsive-table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="50">#</th>
                        <th scope="col">Code Booking</th>
                        <th scope="col">Date</th>
                        <th scope="col">Start Time</th>
                        <th scope="col">End Time</th>
                        {{-- <th scope="col">Price</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bookings as $booking)                        
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $booking->code_booking }}</td>
                            <td>{{ date('l, d F Y', strtotime($booking->date)) }}</td>
                            <td>{{ date('H:i',strtotime($booking->start_time)) }}</td>
                            <td>{{ date('H:i',strtotime($booking->end_time)) }}</td>
                            {{-- <td>Rp. {{ number_format($booking->total_price) }}</td> --}}
                        </tr>
                    @empty
                        
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection