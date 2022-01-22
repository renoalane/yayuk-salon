<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootsrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" />
    <link rel="shortcut icon" href="{{asset('assets/img/logoYayukSalon.png')}}" type="image/x-icon" />

    <link rel="stylesheet" href="{{ asset('css/frontend.css') }}" />

    <title>Yayuk Salon</title>
  </head>
  <body>
    {{-- Navbar --}}
    @include('frontEndCustomer.layouts.navbar')
    {{-- End Navbar --}}

    <!-- ShowCase -->
    <section class="text-light bg-start pt-sm-5 mt-sm-5 text-center text-sm-start showcase">
        <div class="container">
          <div class="d-sm-flex align-items-center justify-content-evenly">
            <div class="py-5 mt-5 responsive-div">
              <h1 class="first yayuksalon">Yayuk Salon</h1>
              <h1 class="first"><span class="span-logo">Beauty Salon</span></h1>
              <p class="fs-6 first res-text">Hadir untuk memberikan pelayanan terbaik untuk para wanita indonesia yang memiliki masalah dalam merawat rambut dan kulit wajah</p>
              <div class="d-sm-block ms-0 my-3">
                <a href="{{ route('user.booking.create') }}" class="btn btn-outline-light btn-md me-2">Booking</a>
                <a href="#location" class="btn btn-outline-light btn-md">Location</a>
              </div>
            </div>
            <img class="img-fluid d-sm-block responsive-img pt-sm-5" src="{{ asset('assets/img/kissping.png') }}" alt="" />
          </div>
        </div>
      </section>
      <!-- End ShowCase -->
  
      <!-- Description -->
      <section id="description" class="p-5">
        <div class="container">
          <div class="description p-lg-5 p-sm-0">
            <h2 class="text-center">Yayuk Salon</h2>
            <p class="fs-5 text-md-start show-respon">Mengutamakan kenyamanan dan privasi bagi wanita yang ingin melakukan perawatan kecantikan, menjadi prioritas utama Yayuk Salon. Tidak menerima pelanggan pria dan diharapkan memberikan kenyamanan maksimal.</p>
          </div>
          <div class="row g-2 pb-lg-5 px-lg-5 p-sm-0">
            <div class="col-md-6 col-lg-4"><img class="img-fluid rounded" src="{{ asset('assets/img/profil1.jpg') }}" alt="" /></div>
            <div class="col-md-6 col-lg-4"><img class="img-fluid rounded" src="{{ asset('assets/img/profil2.jpg') }}" alt="" /></div>
            <div class="col-md-6 col-lg-4 item-3"><img class="img-fluid rounded" src="{{ asset('assets/img/profil3.jpg') }}" alt="" /></div>
          </div>
        </div>
      </section>
      <!-- EndDeskription -->
  
      <!-- Show Main Service -->
      <section class="show-main-service p-5">
        <div class="containter">
          <h2 class="text-center mb-4 fs-4 service-description">Enjoy Our Best Service</h2>
          <p class="pb-4 pt-2 service-description">Yayuk Salon melayani perawatan kecantikan rambut dan wajah untuk wanita Indonesia dengan bahan-bahan berkualitas yang aman untuk kesehatan.</p>
          <div class="d-md-flex justify-content-evenly align-items-center text-center">
            <div class="icon-section">
              <div class="icon rounded-circle">
                <img src="{{ asset('assets/icon/haircut.png') }}" alt="" class="p-3" style="width: 100px; height: 100px" />
              </div>
              <p class="text-light fs-4 mt-2">Haircut</p>
            </div>
            <div class="icon-section">
              <div class="icon rounded-circle">
                <img src="{{ asset('assets/icon/facial.png') }}" alt="" class="p-3" style="width: 100px; height: 100px" />
              </div>
              <p class="text-light fs-4 mt-2">Facial</p>
            </div>
            <div class="icon-section">
              <div class="icon rounded-circle">
                <img src="{{ asset('assets/icon/makeup.png') }}" alt="" class="p-3" style="width: 100px; height: 100px" />
              </div>
              <p class="text-light fs-4 mt-2">make up</p>
            </div>
          </div>
          <div class="d-flex justify-content-center">
            <a href="{{ route('user.service') }}" class="btn m-4 btn-md btn-outline-light">Other Services ></a>
          </div>
        </div>
      </section>
      <!-- End Show Main Service -->
  
      <!-- operational Work -->
      <section class="oper">
        <div class="container operational rounded">
          <div class="row g-4 p-5">
            <div class="col-md-5">
              <h2 class="text-end text-working-hours">Working<br />Hours</h2>
            </div>
            <div class="col">
              <table class="table-responsive-sm working-hours my-4">
                <tr>
                  <td class="responsive-text">Working Days</td>
                  <td class="text-end responsive-text">08:00 WIB - 18:00 WIB</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </section>
      <!-- End operational Work -->
  
      <!-- Product -->
      <section class="pb-5 product">
        <div class="container">
          <h2 class="text-center mb-4">Products</h2>
          <div class="row g-2 p-0 m-5 justify-content-center">
          @forelse ($products as $product)
              <div class="col-lg-3 col-md-3 p-0 contain-card">
                <div class="card card-index mx-auto">
                  <div class="img-card">
                    <img src="{{ asset('storage/'. $product->image) }}" class="card-img-top" alt="product image" />
                  </div>
                  <div class="card-body">
                    <p class="opacity-50 category-name mb-0">{{ $product->category->name }}</p>
                    <h5 class="card-title">{{ $product->name }}</h5>
                  </div>
                </div>
              </div>  
            @empty
              <div class="row justify-content-center align-items-center mt-2 mb-3">
                <h3 class="text-center">Sorry, the product is still out of stock</h3>
              </div>    
          @endforelse
          </div>
          <div class="d-flex justify-content-center">
            <a href="{{ route('user.product') }}" class="btn m-4 btn-md btn-outline-dark">Other Product ></a>
          </div>
        </div>
      </section>
      <!-- ENd Product -->
  
      <!-- Maps and Contanct -->
      <section class="p-5" id="location">
        <div class="container">
          <div class="row g-4">
            <div class="col-md">
              <h2 class="text-center mb-4">Contact Info</h2>
              <ul class="list-group list-group-flush lead fs-4">
                <li class="list-group-item"><span class="fw-bold">Location :<br/> </span>Puhpelem, Wonogiri, Jawa Tengah</li>
                <li class="list-group-item"><span class="fw-bold">Phone Number :<br/> </span>0812-3281-7620</li>
              </ul>
            </div>
            <div class="col-md">
              <div class="ratio ratio-4x3 rounded">
                <iframe
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.942423856573!2d111.27849051477817!3d-7.795920994381962!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7985e29e05cef5%3A0x2657db76a2d2e1e4!2sYayuk%20Salon!5e0!3m2!1sen!2sid!4v1637641722961!5m2!1sen!2sid"
                  width="600"
                  height="450"
                  style="border: 0"
                  allowfullscreen=""
                  loading="lazy"
                ></iframe>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Maps and Contanct -->

    {{-- Footer --}}
    @include('frontEndCustomer.layouts.footer')
    {{-- End Footer --}}

    <!-- JS Boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
