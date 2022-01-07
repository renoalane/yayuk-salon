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
            <button class="btn btn-bg-ys btn-sm"type="submit">
                Search
            </button>
            </form>
        </div>
        </div>
    </div>
    </section>
    <!-- End Title -->

    {{-- List Product --}}
    <section class="p-5 product">
        <p class="fs-2">List Services</p>
    </section>
    {{-- End List Product --}}

@endsection