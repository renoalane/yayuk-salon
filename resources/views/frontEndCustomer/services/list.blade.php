@extends('frontEndCustomer.layouts.main')

{{-- Content --}}
@section('container')
    <!-- Title -->
    <section class="title">
        <div class="container">
          <h3 class="first text-center">Services</h3>
          <div class="row justify-content-center">
            <div class="col-md-6">
              <form class="d-flex">
                <input class="form-control me-2" type="search" name="q" value="{{ $request['q'] ?? '' }}" placeholder="Search service" aria-label="Search" />
                <button
                  class="btn btn-bg-ys btn-sm"
                  type="sub
              mit"
                >
                  Search
                </button>
              </form>
            </div>
            <!-- Button Book -->
            <div class="form-group mt-4 d-flex justify-content-center">
              <a href="{{ route('user.booking.create') }}" class="btn btn-lg btn-primary">Let's Book Now</a>
            </div>
            <!-- End Button Book -->
          </div>
        </div>
      </section>
      <!-- End Title -->
  
      <!-- List Service -->
      <section class="p-5 service">
        <div class="container">
            <p class="fs-2">List Services</p>
            <ul class="list-group">
                @forelse ($services as $service)   
                <li class="list-group-item">
                <div class="item-service">
                    <div class="top-information row">
                      <div class="service-name col-8">
                          <h5>{{ $service->name }}</h5>
                          <p class="brown-text">{{ $service->duration }} Menit</p>
                      </div>
                      <div class="service-price col-4">
                          <h5 class="text-end">IDR {{ number_format($service->price) }}</h5>
                      </div>
                    </div>
                    <div class="bottom-information">
                      {{ strip_tags($service->description) }}
                    </div>
                </div>
                </li>
                @empty
                    <div class="row justify-content-center align-items-center">
                        <h1 class="text-center">Soon</h1>
                    </div>
                @endforelse
            </ul>
            {{-- Pagination --}}
            {{ $services->appends($request)->links() }}
        </div>
      </section>
      <!-- List Service -->
@endsection