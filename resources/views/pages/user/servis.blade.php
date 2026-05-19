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

        <a href="{{ route('servis.car') }}" class="btn btn-warning px-4 py-2 fw-semibold">
            BOOK SERVICE
        </a>
    </div>

</section>

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">
                My Service Booking
            </h3>

            <p class="text-muted mb-0">
                Lihat status service kendaraan kamu
            </p>

        </div>

    </div>

    @forelse($services as $item)

        <div class="card border-0 shadow-sm rounded-4 mb-3">

            <div class="card-body p-4">

                <div class="row align-items-center">

                    <div class="col-lg-3 mb-3 mb-lg-0">

                        <h5 class="fw-bold mb-1">
                            {{ $item->car->model->name }}
                        </h5>

                        <small class="text-muted">
                            {{ strtoupper($item->car->plate_number) }}
                        </small>

                    </div>

                    <div class="col-lg-3 mb-3 mb-lg-0">

                        <small class="text-muted d-block">
                            Reservation
                        </small>

                        <strong>
                            {{ \Carbon\Carbon::parse($item->time_reservation)->format('d M Y H:i') }}
                        </strong>

                    </div>

                    <div class="col-lg-3 mb-3 mb-lg-0">

                        <small class="text-muted d-block">
                            Status
                        </small>

                        @if($item->status == 'pending')

                            <span class="badge bg-warning text-dark">
                                Pending
                            </span>

                        @elseif($item->status == 'on_progress')

                            <span class="badge bg-primary">
                                On Progress
                            </span>

                        @elseif($item->status == 'done')

                            <span class="badge bg-success">
                                Done
                            </span>

                        @else

                            <span class="badge bg-danger">
                                Cancelled
                            </span>

                        @endif

                    </div>

                    <div class="col-lg-3">

                        <small class="text-muted d-block">
                            Description
                        </small>

                        <span>
                            {{ $item->services_description }}
                        </span>

                    </div>

                </div>

            </div>

        </div>

    @empty

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body text-center py-5">

                <h5 class="fw-bold">
                    Belum ada booking service
                </h5>

                <p class="text-muted mb-0">
                    Yuk booking service kendaraan kamu sekarang
                </p>

            </div>

        </div>

    @endforelse

</div>

@endsection