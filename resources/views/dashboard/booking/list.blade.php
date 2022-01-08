@extends('dashboard.layouts.main')

{{-- Heading --}}
@section('heading')
    <div class="d-flex align-items-center">
        <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
        <h2 class="fs-2 m-0">Bookings</h2>
    </div>
@endsection

{{-- Content --}}
@section('content')
    
    {{-- <!-- Searching -->
    <div class="row g-3 my-2">
        <form class="d-flex">
            <input class="form-control me-2" type="search" name="q" value="{{ $request['q'] ?? '' }}" placeholder="Search" aria-label="Search">
            <button class="btn btn-primary" type="sub
            mit">Search</button>
            </form>
    </div>
    End Searching --}}
    {{-- Date --}}
    <div class="row g-3 my-2">
        <div class="col-5">
            <form class="d-flex">
                <div class="px-2">
                    <label class="form-label">From</label>
                    <input type="text" placeholder="Years-month-day" id="fromDate" class="form-control me-2" name="s" value="{{ $request['s'] ?? '' }}" aria-label="date">
                </div>
                <div class="px-2">
                    <label class="form-label">To</label>
                    <input type="text" placeholder="Years-month-day" id="toDate" class="form-control me-2" name="e" value="{{ $request['e'] ?? '' }}" aria-label="date">
                </div>
                <div class="position-relative">
                    <button class="btn btn-primary position-absolute bottom-0" type="submit">GET</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row g-3 my-2">
        <div class="col-4">
            <a href="{{ route('dashboard.booking') }}">
                <button class="btn btn-primary ms-2" type="submit">GET All</button>
            </a>
        </div>
    </div>
    {{-- End Date --}}

    {{-- Information CRUD --}}
    {{-- Success --}}
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>
                {{ session('success') }}
            </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Failed --}}
    @if (session()->has('failed'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>
            {{ session('failed') }}
        </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    {{-- End Information CRUD --}}

    {{-- Content Table --}}
    <div class="row my-2">
        <h3 class="fs-4 my-3">List Booking</h3>
        <div class="col">
            <table class="table bg-white rounded shadow-sm table-hover table-striped table-responsive-sm">
                <thead>
                    <tr>
                        <th scope="col">Code booking</th>
                        <th scope="col">Name User</th>
                        <th scope="col">Date</th>
                        <th scope="col">Start time</th>
                        <th scope="col">End time</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($bookings as $booking)
                    
                        <tr>
                            <th scope="row">{{ $booking->code_booking }}</th>
                            <td>{{ $booking->user_name }}</td>
                            <td>{{ date('l, d F Y', strtotime($booking->date)) }}</td>
                            <td>{{ date("H:i", strtotime($booking->start_time)) }}</td>
                            <td>{{ date("H:i", strtotime($booking->end_time)) }}</td>
                            <td>{{ number_format($booking->total_price) }}</td>
                            @if ($booking->status === 0)
                                <td><span class="badge bg-secondary">New</span></td>
                            @elseif($booking->status === 1)
                                <td><span class="badge bg-primary">Confirmed</span></td>
                            @elseif($booking->status === 2)
                                <td><span class="badge bg-success">Done</span></td>
                            @else
                                <td><span class="badge bg-danger">Rejected</span></td>
                            @endif
                            <td class="text-center">                       
                                {{-- button edit --}}
                                <a href="{{ route('dashboard.booking.edit', $booking->code_booking) }}" class="btn btn-sm btn-warning"><i class="far fa-edit"> Edit Status</i></a>
                            </td>
                        </tr>
                    @empty
                        <th colspan="8" class="text-center">Empty Booking</th>
                    @endforelse
                </tbody>
            </table>

            {{-- Pagination --}}
        
            {{ $bookings->appends($request)->links() }}

        </div>
    </div>
    {{-- End Content Table --}}


     {{-- POp Up Delete noted --}}
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure..?</p>
                </div>
                <div class="modal-footer">
                    <form action="" class="formDelete" method="POST">
                        @csrf
                        @method('delete')

                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>    

    <script>
    // Datepicker From date to date 
    $(function () {
        var from = $("#fromDate")
            .datepicker({
              dateFormat: "yy-mm-dd",
              changeMonth: true,
            })
            .on("change", function () {
              to.datepicker("option", "minDate", getDate(this));
            }),
          to = $("#toDate")
            .datepicker({
              dateFormat: "yy-mm-dd",
              changeMonth: true,
            })
            .on("change", function () {
              from.datepicker("option", "maxDate", getDate(this));
            });

        function getDate(element) {
          var date;
          var dateFormat = "yy-mm-dd";
          try {
            date = $.datepicker.parseDate(dateFormat, element.value);
          } catch (error) {
            date = null;
          }

          return date;
        }
    });
    // End Datepicker

    </script>
@endsection