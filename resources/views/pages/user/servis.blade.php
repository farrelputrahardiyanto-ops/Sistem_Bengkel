@extends('layouts.user.user')

@section('title', 'Servis')

<style>
    .hero-servis {
    height: 80vh;
    background-image: linear-gradient(
        rgba(0,0,0,0.6),
        rgba(0,0,0,0.6)
    ), url('/images/dashboard-servis.jpg');

    background-size: cover;
    background-position: center;
}

.hero-title {
    font-size: 2.5rem;
    text-shadow: 2px 2px 6px rgba(0,0,0,0.5);
}

.hero-subtitle {
    font-size: 1rem;
    opacity: 0.9;
}

.btn-warning {
    background-color: #FFD600;
    border: none;
}
</style>

@section('content')

<section class="hero-servis d-flex align-items-center">

    <div class="container text-center text-white">
        <h1 class="fw-bold mb-3 hero-title">
            Service Mobil Tanpa Ribet
        </h1>

        <p class="mb-4 hero-subtitle">
            Dari spooring, oli, hingga perbaikan kaki-kaki
        </p>

        <a href="#" class="btn btn-warning px-4 py-2 fw-semibold">
            BOOK SERVICE
        </a>
    </div>

</section>

@endsection