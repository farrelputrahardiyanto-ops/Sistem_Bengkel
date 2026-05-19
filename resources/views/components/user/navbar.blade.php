<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-4">
    <div class="container-fluid">

        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard') }}">
            <img src="{{ asset('images/logo.png') }}" alt="logo" height="40" class="me-2">
        </a>

        <!-- Toggle (mobile) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active-custom' : '' }}"
                        href="{{ route('dashboard') }}">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('sparepart*') ? 'active-custom' : '' }}"
                        href="{{ route('dashboard.sparepart.index') }}">
                        Sparepart
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('servis*') ? 'active-custom' : '' }}"
                        href="{{ route('dashboard.servis') }}">
                        Servis
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('belajar-mengemudi*') ? 'active-custom' : '' }}"
                        href="{{ route('dashboard.driving-course') }}">
                        Belajar Mengemudi
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('contact*') ? 'active-custom' : '' }}"
                        href="{{ route('dashboard.contact') }}">
                        Contact
                    </a>
                </li>

            </ul>
        </div>

        <!-- Icon kanan -->
        
        <!-- RIGHT SIDE -->
<div class="d-flex align-items-center gap-3">

    @auth

        <!-- Cart -->
        <a href="{{ route('cart.index') }}"
            class="text-dark text-decoration-none">

            <div class="d-flex align-items-center justify-content-center"
                style="width:42px; height:42px;">

                <img src="{{ asset('images/cart.svg') }}"
                    alt="cart"
                    style="width:28px; height:28px; object-fit:contain;">

            </div>

        </a>



        <!-- Profile -->
        <div class="dropdown">

            <button class="btn p-0 border-0 bg-transparent"
                type="button"
                data-bs-toggle="dropdown"
                aria-expanded="false">

                @if(auth()->user()->profile_picture)

                    <img src="{{ asset('storage/user/' . auth()->user()->profile_picture) }}"
                        alt="profile"
                        width="36"
                        height="36"
                        class="rounded-circle object-fit-cover border">

                @else

                    <img src="{{ asset('images/default-profile.svg') }}"
                        alt="default profile"
                        width="36"
                        height="36"
                        class="rounded-circle object-fit-cover border">

                @endif

            </button>

            <ul class="dropdown-menu dropdown-menu-end shadow border-0">

                <li class="px-3 py-2">
                    <small class="text-muted">Signed in as</small><br>
                    <strong>{{ auth()->user()->name }}</strong>
                </li>

                <li><hr class="dropdown-divider"></li>

                <li>
                    <a class="dropdown-item"
                        href="{{ route('profile.show') }}">

                        <i class="bi bi-person me-2"></i>
                        My Profile

                    </a>
                </li>

                
                <li><hr class="dropdown-divider"></li>

                <li>
                    <form action="{{ route('logout') }}" method="POST">

                        @csrf

                        <button class="dropdown-item text-danger">

                            <i class="bi bi-box-arrow-right me-2"></i>
                            Logout

                        </button>

                    </form>
                </li>

            </ul>

        </div>

    @else

        <!-- LOGIN -->
        <a href="{{ route('login') }}"
           class="btn btn-outline-dark rounded-pill px-4">

            Login

        </a>

        <!-- REGISTER -->
        <a href=""
           class="btn btn-warning rounded-pill px-4">

            Register    

        </a>

    @endauth

</div>

    </div>
</nav>