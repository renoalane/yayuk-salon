@extends('frontEndCustomer.layouts.main')

{{-- Container --}}
@section('container')
    <!-- Product Info -->
    <section class="p-5 product-info mt-5">
        <div class="container">
          <div class="d-sm-flex justify-content-evenly">
            <div class="product-image-description d-flex justify-content-sm-end">
              <img class="product-image rounded img-fluid" src="winter.jpg" alt="" />
            </div>
            <div class="description-product">
              <h2>Maskara LAbuan Bajo Indonesia</h2>
              <h3>IDR 400,000</h3>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae blanditiis, officiis neque iste libero repellat! Adipisci id maxime aliquam laborum nisi saepe alias, sed nobis, rem expedita deleniti quasi corrupti?</p>
            </div>
          </div>
        </div>
      </section>
      <!-- End Product Info -->
@endsection