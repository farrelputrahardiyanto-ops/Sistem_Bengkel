<div id="sidebar" class="bg-dark text-white p-3" style="width: 250px; min-height: 100vh;">
    
    <h4 class="text-center fw-bold mb-4" style="color: #FFD400;">
        ADMIN PANEL
    </h4>

    <ul class="nav flex-column">

        <li class="nav-item mb-2">
            <a href="/admin/dashboard" class="nav-link text-white">Dashboard</a>
        </li>

        <li class="nav-item mb-2">
            <a href="{{ route('user.index') }}" class="nav-link text-white">Users</a>
        </li>

        <li class="nav-item mb-2">
            <a class="nav-link text-white" data-bs-toggle="collapse" href="#carMenu">
                Cars
            </a>
            <div class="collapse ps-3" id="carMenu">
                <a href="/admin/car-brands" class="nav-link text-white small">Brands</a>
                <a href="/admin/car-models" class="nav-link text-white small">Models</a>
                <a href="/admin/service-cars" class="nav-link text-white small">Service Cars</a>
            </div>
        </li>

        <li class="nav-item mb-2">
            <a href="{{ route('sparepart.index') }}" class="nav-link text-white">Spareparts</a>
        </li>

        <li class="nav-item mb-2">
            <a href="/admin/sales" class="nav-link text-white">Sales</a>
        </li>

        <li class="nav-item mb-2">
            <a href="/admin/services" class="nav-link text-white">Services</a>
        </li>

        <li class="nav-item mb-2">
            <a href="/admin/payments" class="nav-link text-white">Payments</a>
        </li>

    </ul>
</div>