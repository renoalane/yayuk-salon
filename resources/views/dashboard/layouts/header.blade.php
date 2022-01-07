{{-- Header --}}

<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown me-5">
            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user me-2"></i>{{ auth()->user()->username }}
            </a>
            <ul class="dropdown-menu" style="position: absolute; left:-13px;" aria-labelledby="navbarDropdown">
                {{-- <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li> --}}
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                      @csrf
                      <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                    </form>
                  </li>
            </ul>
        </li>
    </ul>
</div>
