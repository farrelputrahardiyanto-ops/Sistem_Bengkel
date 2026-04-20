<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css')}}">
   <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    

    <!-- Custom CSS -->
    <style>
        #sidebar {
            background-color: #1e1e1e;
        }

        #sidebar .nav-link {
            border-radius: 8px;
            transition: 0.2s;
        }

        #sidebar .nav-link:hover {
            background-color: #FFD400;
            color: black !important;
        }

        #sidebar .nav-link.active {
            background-color: #FFD400;
            color: black !important;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="d-flex">
    
    <!-- SIDEBAR -->
    <x-admin.sidebar />

    <!-- CONTENT -->
    <div class="flex-grow-1 p-4">
        @yield('content')
    </div>

</div>

<!-- Bootstrap JS (WAJIB buat collapse) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>