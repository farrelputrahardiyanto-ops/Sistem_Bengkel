<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-4">
    <div class="container-fluid">

        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="#">
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
                    <a class="nav-link" href="#">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('sparepart*') ? 'active-custom' : '' }}" href="#">Sparepart</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('servis*') ? 'active-custom' : '' }}" href="#">Servis</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('belajar-mengemudi*') ? 'active-custom' : '' }}" href="#">Belajar Mengemudi</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('contact*') ? 'active-custom' : '' }}  " href="#">Contact</a>
                </li>

            </ul>
        </div>

        <!-- Icon kanan -->
        <div class="d-flex gap-2 mx-3">
            <i class="bi bi-person-circle fs-4"></i>
            <i class="bi bi-bag fs-4"></i>
        </div>

    </div>
</nav>