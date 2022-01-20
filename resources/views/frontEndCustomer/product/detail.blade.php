@extends('frontEndCustomer.layouts.main')

{{-- Container --}}
@section('container')
    <!-- Product Info -->
    <section class="p-5 product-info mt-5">
        <div class="container">
          <div class="d-sm-flex justify-content-evenly">
            <div class="product-image-description d-flex justify-content-sm-end">
              <img class="product-image rounded img-fluid" src="{{ asset('storage/'. $product->image) }}" alt="" />
            </div>
            <div class="description-product">
              <h2>{{ $product->name }}</h2>
              <h3>Rp. {{ number_format($product->price) }}</h3>
              <p>{!! $product->description !!}</p>
            </div>
          </div>
          <button type="button" onclick="window.history.back()" class="btn d-block mx-auto btn-md btn-secondary">Back</button>
        </div>
      </section>
      <!-- End Product Info -->
@endsection