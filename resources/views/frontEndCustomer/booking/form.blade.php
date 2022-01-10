@extends('frontEndCustomer.layouts.main')

{{-- Content --}}
@section('container')
    <!-- Form Booking -->
    <section class="p-5 booking-form">
        <div class="container my-5">
          <h1>Booking</h1>
          <form action="{{ route('user.booking.store') }}" method="POST">
            @csrf
            <div class="row g-4">
              <div class="col-lg-7">
                <h4 class="my-3">Services</h4>
                @if (session()->has('failed'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('failed') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
                <div class="list-services">
                  <ul class="list-group">
                      @forelse ($services as $service)
                      <li class="list-group-item d-flex p-4 list-service">
                        <input type="checkbox" name="service[]" class="service-checkbox" value="{{ $service->id }}" id="service" style="width: 5rem; height: 2rem; margin-top: 3px" />
                        <div class="service-information ms-2">
                          <div class="top-information row">
                            <div class="service-name col-8">
                              <h5>{{ $service->name }}</h5>
                              <p class="brown-text">{{ $service->duration }} Menit</p>
                            </div>
                            <div class="service-price col-4">
                              <h6 class="text-end">IDR {{ number_format($service->price) }}</h6>
                            </div>
                          </div>
                          <div class="description-service">
                            <p style="margin-bottom: 0">
                              {{ strip_tags( $service->description ) }}
                            </p>
                          </div>
                        </div>
                      </li>
                      @empty
                      <li class="list-group-item d-flex p-4">
                            <h3 class="mx-auto">Sorry, the service doesn't exist yet</h3>
                      </li>
                      @endforelse
                  </ul>
                </div>
              </div>
              <!-- Date -->
              <div class="col-lg-5 mt-6">
                <h4 class="my-3">Booking at</h4>
                <div class="form-group mb-3">
                  <label>Date</label>
                  <input type="text" placeholder="Years-month-day" id="datepicker" class="form-control @error('date') is-invalid @enderror" value="{{ old('date') ?? '' }}" name="date" id="date" />
                  <div>
                    @error('date')
                      {{ $message }}
                    @enderror
                  </div>
                </div>
                <div class="form-group mb-3">
                  <label>Start Time</label>
                  <input type="text" placeholder="Hours:minute" id="timepicker" class="form-control @error('start_time') is-invalid @enderror"value="{{ old('start_time') ?? '' }}" name="start_time" id="time" />
                  <div>
                    @error('start_time')
                      {{ $message }}
                    @enderror
                  </div>
                </div>
                <button type="submit" class="btn btn-md btn-primary mt-2">Book Now</button>
              </div>
            </div>
          <!-- End Date -->
        </div>
      </form>
    </div>
  </section>

  <script>
    // Datepicker
    $(function () {
      $("#datepicker").datepicker({
        dateFormat: "yy-mm-dd",
        minDate: 1,
        maxDate: "+1M +5D",
      });
    });

    const checkboxAll = document.querySelectorAll('.service-checkbox');
    const listAll = document.querySelectorAll('.list-service');

    // For Checkbox div
    listAll.forEach((element,i) => {
      element.addEventListener('click', () => {
        if(checkboxAll[i].checked){
          checkboxAll[i].checked = false
        }
        else{
          checkboxAll[i].checked = true
        }
      })
    });
    // For checkbox
    checkboxAll.forEach((element,i) => {
      element.addEventListener('click', () => {
        if(checkboxAll[i].checked){
          checkboxAll[i].checked = false
        }
        else{
          checkboxAll[i].checked = true
        }
      })
    });
    

    // Timepicker
    $(document).ready(function () {
        $("#timepicker").timepicker({
          timeFormat: "HH:mm",
          interval: 15,
          minTime: "08:30",
          maxTime: "4:00pm",
          defaultTime: "08:30",
          startTime: "08:30",
          dynamic: false,
          dropdown: true,
          scrollbar: true,
        });
      });

  </script>
@endsection