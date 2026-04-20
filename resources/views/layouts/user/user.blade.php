<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('public/images/logo.png') }}">

    <link rel="stylesheet" href="{{ asset('assets/bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css')}}">
   <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
   <link rel="stylesheet" href="{{ asset('css/navbar-user.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">

</head>
<body>
    <x-user.navbar />
    @yield('content')
</body>
</html>