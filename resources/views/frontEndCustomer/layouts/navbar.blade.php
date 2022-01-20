<!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-dark py-1 fixed-top nav-yayuk-salon">
    <div class="container">
      <a href="{{ route('home') }}" class="navbar-brand"><img class="logo" src="{{ asset('assets/img/logoYayukSalon.png') }}" alt="logo" /> Yayuk Salon</a>

      <!-- Responsive NavBar -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navmenu">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item me-4">
            <a href="{{ route('home') }}" class="nav-link">Home</a>
          </li>
          <li class="nav-item me-4">
            <a href="{{ route('user.service') }}" class="nav-link">Services</a>
          </li>
          <li class="nav-item me-4">
            <a href="{{ route('user.product') }}" class="nav-link">Products</a>
          </li>
          {{-- Cek User --}}
          @auth

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ auth()->user()->username }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="{{ route('user.booking') }}"><i class="bi bi-layout-text-sidebar-reverse"></i> My Booking</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="{{ route('user.account.edit', auth()->user()->username) }}"><i class="bi bi-person"></i> My Account</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                </form>
              </li>
            </ul>
          </li>

            @else

            <li class="nav-item">
            <a href="{{ route('login') }}" class="nav-link logres">Login/Register</a>
            </li>
            
            @endauth
        </ul>
      </div>
    </div>
  </nav>
<!-- End Navbar -->