<!-- Sidebar -->
<div class="bg-white" id="sidebar-wrapper">
    <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><img style="width: 2rem;" src="{{asset('assets/img/logoYayukSalon.png')}}" alt="logo" class="mb-1"/> </i>Yayuk Salon</div>
    <div class="list-group list-group-flush my-3">
        <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action bg-transparent second-text {{ $active == 'dashboard' ? 'active' : 'fw-bold'  }}">
            <i class="fas fa-tachometer-alt me-2"></i>Dashboard
        </a>
        <a href="{{ route('dashboard.booking') }}" class="list-group-item list-group-item-action bg-transparent second-text {{ $active == 'bookings' ? 'active' : 'fw-bold'  }}">
            <i class="fas fa-calendar-alt me-2"></i>Bookings
        </a>
        <a href="{{ route("dashboard.category") }}" class="list-group-item list-group-item-action bg-transparent second-text {{ $active == 'categories' ? 'active' : 'fw-bold'  }}">
            <i class="fas fa-list me-2"></i>Categories
        </a>
        <a href="{{ route('dashboard.product') }}" class="list-group-item list-group-item-action bg-transparent second-text {{ $active == 'products' ? 'active' : 'fw-bold'  }}">
            <i class="fas fa-boxes me-2"></i>Products
        </a>
        <a href="{{ route('dashboard.service') }}" class="list-group-item list-group-item-action bg-transparent second-text {{ $active == 'services' ? 'active' : 'fw-bold'  }}">
            <i class="fas fa-cut me-2"></i>Services
        </a>
        <a href="{{ route('dashboard.user') }}" class="list-group-item list-group-item-action bg-transparent second-text {{ $active == 'users' ? 'active' : 'fw-bold' }}">
            <i class="fas fa-users me-2"></i>Users
        </a>
    </div>
</div>