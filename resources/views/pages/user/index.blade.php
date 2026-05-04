@extends('layouts.user.user')

@section('title', 'Satria')

@section('style')

<link rel="stylesheet" href="{{ asset('css/style.css')}}">

@endsection

@section('content')

<div class="container-fluid " style="background-image:   linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),url({{ asset('images/dashboard.jpeg') }}); background-size: cover; height: 100vh; background-position: center; backdrop-filter: blur(10px);">
    <div class="row">
      <div class="col-md-12 d-flex align-items-center justify-content-center" >
        <img src="{{ asset('images/logo.png')}}" alt="" width="400" class=" mx-5 my-5">
        </div>
        <div class="col-md-12 d-flex align-items-center justify-content-center">
            <h1 class="text-white text-center my-5 " style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);">
                Welcome to Satria Auto Workshop
            </h1>
        </div> 
     </div>  
</div>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<section class="container my-5">

    <!-- SECTION 1 -->
    <div class="row align-items-center section-item">
        <!-- IMAGE -->
        <div class="col-md-4 col-sm-12 position-relative img-wrapper">
            <img src="{{ asset('images/dashboard-sparepart.png') }}" class="img-fluid w-100">

            <!-- overlay (mobile only) -->
            <div class="overlay d-md-none"></div>

            <!-- text overlay (mobile only) -->
            <div class="text-overlay d-md-none">
                <h3>Spareparts</h3>
                <p>Everything your vehicle needs — in one place.</p>
                <a href="#" class="btn btn-warning btn-sm">SEE PRODUCT</a>
            </div>
        </div>

        <!-- TEXT DESKTOP -->
        <div class="col-md-8 d-none d-md-block">
            <h3>Spareparts</h3>
            <p>
                Everything your vehicle needs — in one place.
                Discover high-quality spareparts that improve performance and safety.
            </p>
            <a href="#" class="btn btn-warning">SEE PRODUCT</a>
        </div>
    </div>

    <!-- SECTION 2 (reverse desktop) -->
    <div class="row align-items-center section-item flex-md-row-reverse mt-5">
        <div class="col-md-4 col-sm-12 position-relative img-wrapper">
            <img src="your-image-2.jpg" class="img-fluid w-100">

            <div class="overlay d-md-none"></div>

            <div class="text-overlay d-md-none">
                <h3>Servis</h3>
                <p>Professional automotive service.</p>
                <a href="#" class="btn btn-warning btn-sm">BOOK SERVICE</a>
            </div>
        </div>

        <div class="col-md-8 d-none d-md-block">
            <h3>Servis</h3>
            <p>
                Professional automotive service designed for performance and safety.
            </p>
            <a href="#" class="btn btn-warning">BOOK SERVICE</a>
        </div>
    </div>

</section>

@endsection