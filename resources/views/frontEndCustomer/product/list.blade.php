@extends('frontEndCustomer.layouts.main')

{{-- Content --}}
@section('container')

    <!-- Title -->
    <section class="title">
    <div class="container">
        <h3 class="first text-center">Products</h3>
        <div class="row justify-content-center">
        <div class="col-md-6">
            <form class="d-flex">
            @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            <input class="form-control me-2" type="search" name="q" value="{{ $request['q'] ?? '' }}" placeholder="Search product" aria-label="Search" />
            <button class="btn btn-outline-light btn-sm"type="submit">
                Search
            </button>
            </form>
        </div>
        </div>
    </div>
    </section>
    <!-- End Title -->

    {{-- List Product --}}
    <section class="p-5 product-main">
        <div class="container">
          <div class="d-block">

            <!-- Category -->
            @include('frontEndCustomer.product.layoutsProduct.sidecategory')
            <!-- End Category -->
            
            <div class="row g-2 p-0 product-list align-self-start">
            @forelse ($products as $product)
                <div class="col-lg-3 col-sm-6 p-0 contain-card">
                    <div class="card card-product mx-1 d-block mx-auto">
                        <div class="img-card">
                        <img src="{{ asset('storage/'. $product->image) }}" class="card-img-product" alt="" />
                        </div>
                        <div class="card-body">
                        <a href="/products?category={{ $product->category->id }}" class="opacity-50 category-name">{{ $product->category->name }}</a>
                        <h5 class="card-title fs-6">{{ $product->name }}</h5>
                        <p class="card-text">Rp. {{ number_format($product->price) }}</p>
                        <a href="{{ route('user.product.show', $product->id) }}" class="btn btn-primary">Product Info</a>
                        </div>
                    </div>
                </div>
            @empty
                <h3 class="text-center">Sorry, the product is still out of stock</h3>
            @endforelse
            {{-- Pagination --}}
            {{ $products->appends($request)->links() }}
            </div>
          </div>
        </div>
      </section>
    {{-- End List Product --}}

@endsection