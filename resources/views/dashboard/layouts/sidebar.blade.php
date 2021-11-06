<!-- Sidebar -->
<div class="bg-white" id="sidebar-wrapper">
    <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
            class="fas fa-user-secret me-2"></i>Codersbite</div>
    <div class="list-group list-group-flush my-3">
        <a href="" class="list-group-item list-group-item-action bg-transparent second-text {{ $active == 'dashboard' ? 'active' : 'fw-bold'  }}">
            <i class="fas fa-tachometer-alt me-2"></i>Dashboard
        </a>
        <a href="{{ route("dashboard.category") }}" class="list-group-item list-group-item-action bg-transparent second-text {{ $active == 'categories' ? 'active' : 'fw-bold'  }}">
            <i class="fas fa-list me-2"></i>Categories
        </a>
        <a href="{{-- route('dashboard.products') --}}" class="list-group-item list-group-item-action bg-transparent second-text {{ $active == 'products' ? 'active' : 'fw-bold'  }}">
            <i class="fas fa-gift me-2"></i>Products
        </a>
        <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-chart-line me-2"></i>Analytics
        </a>
        <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-paperclip me-2"></i>Reports
        </a>
        <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-shopping-cart me-2"></i>Store Mng
        </a>
        <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-comment-dots me-2"></i>Chat
        </a>
        <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-map-marker-alt me-2"></i>Outlet
        </a>
        <a href="#" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
            <i class="fas fa-power-off me-2"></i>Logout
            </a>
    </div>
</div>