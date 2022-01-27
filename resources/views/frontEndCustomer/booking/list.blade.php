@extends('frontEndCustomer.layouts.main')

@section('container')
<div class="container">
    <section class="py-5 my-5 booking-user">
        {{-- Content Table --}}
        <div class="row my-2">
            <h3 class="fs-4 my-3">List Booking</h3>

            {{-- Success --}}
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>
                    {{ session('success') }}
                </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
    

            @if (count($bookings) > 0)
            <div class="form-group my-2">
                <a href="{{ route('user.booking.create') }}" class="btn btn-sm btn-success">Book Again</a>
            </div>
            @endif
            <div class="col">
                <table class="table bg-white rounded shadow-sm table-hover table-striped table-responsive-sm">
                    <thead>
                        <tr>
                            <th scope="col" width="50">#</th>
                            <th scope="col">Code booking</th>
                            <th scope="col">Date</th>
                            <th scope="col">Start time</th>
                            <th scope="col">End time</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="text-center">Print Nota</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($bookings as $booking)
                        
                            <tr>
                                <th scope="row">{{ ($bookings->currentPage()-1) * $bookings->perPage() + $loop->iteration }}</th>
                                <td>{{ $booking->code_booking }}</td>
                                <td>{{ date('l, d F Y', strtotime($booking->date)) }}</td>
                                <td>{{ date("H:i", strtotime($booking->start_time)) }}</td>
                                <td>{{ date("H:i", strtotime($booking->end_time)) }}</td>
                                <td>Rp. {{ number_format($booking->total_price) }}</td>
                                @if ($booking->status === 0)
                                    <td><span class="badge bg-secondary">Wait</span></td>
                                @elseif($booking->status === 1)
                                    <td><span class="badge bg-primary">Terkonfirmasi</span></td>
                                @elseif($booking->status === 2)
                                    <td><span class="badge bg-success">Thank You</span></td>
                                @else
                                    <td><span class="badge bg-danger">Rejected</span></td>
                                @endif
                                @if ($booking->status > 0 && $booking->status < 3)
                                <td class="text-center">                       
                                    {{-- button show --}}
                                    <a href="{{ route('user.booking.show', $booking->code_booking) }}" class="btn btn-sm btn-info"><i class="far fa-edit">Show</i></a>
                                </td>
                                @else
                                <td></td>
                                @endif
                            </tr>
                        @empty
                            <th colspan="8" class="text-center">
                                <a href="{{ route('user.booking.create') }}" class="btn btn-md btn-success"><i class="far fa-edit">Let's Book Now</i></a>
                            </th>
                        @endforelse
                    </tbody>
                </table>

                {{-- Pagination --}}
            
                {{ $bookings->appends($request)->links() }}

            </div>
        </div>
    {{-- End Content Table --}}
    </section>
</div>
@endsection