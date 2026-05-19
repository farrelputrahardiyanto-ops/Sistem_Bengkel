@extends('layouts.user.user')

@section('title', 'Pilih Paket')

@section('content')

<style>
/* HERO */
.hero-section{
    position: relative;
    height: 480px;
    overflow: hidden;
}

.hero-section img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: brightness(45%);
}

.hero-overlay{
    position: absolute;
    inset: 0;
    display: flex;
    align-items: center;
}

.hero-content{
    color: white;
    max-width: 600px;
}

.hero-content h1{
    font-size: 52px;
    font-weight: 700;
    line-height: 1.1;
}

.hero-content p{
    font-size: 16px;
    opacity: .9;
}

/* PACKAGE */
.package-section{
    margin-top: -90px;
    position: relative;
    z-index: 10;
}

.package-card{
    border: none;
    border-radius: 24px;
    overflow: hidden;
    transition: .3s;
    background: white;
}

.package-card:hover{
    transform: translateY(-6px);
}

.package-image{
    height: 190px;
    overflow: hidden;
}

.package-image img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: .3s;
}

.package-card:hover img{
    transform: scale(1.05);
}

.package-body{
    padding: 22px;
}

.package-badge{
    display: inline-block;
    padding: 6px 14px;
    border-radius: 50px;
    font-size: 12px;
    font-weight: 600;
    background: #fff3cd;
    color: #856404;
    margin-bottom: 14px;
}

.package-title{
    font-size: 22px;
    font-weight: 700;
}

.package-price{
    font-size: 30px;
    font-weight: 700;
    color: #f0ad00;
}

.package-list{
    padding-left: 18px;
    margin-top: 18px;
}

.package-list li{
    margin-bottom: 8px;
    color: #6c757d;
    font-size: 14px;
}

.package-footer{
    margin-top: 24px;
}

.btn-package{
    border-radius: 14px;
    padding: 12px;
    font-weight: 600;
}

/* INFO */
.info-box{
    border-radius: 20px;
    background: #fff;
    padding: 30px;
}

/* MOBILE */
@media(max-width:768px){

    .hero-section{
        height: 260px;
    }

    .hero-content{
        text-align: center;
        margin: auto;
        padding: 0 20px;
    }

    .hero-content h1{
        font-size: 30px;
    }

    .hero-content p{
        font-size: 13px;
    }

    .package-section{
        margin-top: -40px;
    }

    .package-image{
        height: 140px;
    }

    .package-body{
        padding: 16px;
    }

    .package-title{
        font-size: 18px;
    }

    .package-price{
        font-size: 24px;
    }

    .package-list li{
        font-size: 12px;
    }

    .btn-package{
        font-size: 13px;
        padding: 10px;
    }
}
</style>


{{-- USER PACKAGES --}}
{{-- ========================= --}}
{{-- USER SUDAH PUNYA PACKAGE --}}
{{-- ========================= --}}
@if($userPackages->count())

<div class="container main-section pb-5">

    {{-- MY PACKAGE --}}
    <div class="mb-5">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h2 class="fw-bold mb-1">
                    My Driving Package
                </h2>

                <p class="text-muted mb-0">
                    Continue your driving lessons
                </p>

            </div>

        </div>

        <div class="row g-4">

            @foreach($userPackages as $item)

            <div class="col-lg-4">

                <div class="card shadow package-card h-100 border-0">

                    {{-- IMAGE --}}
                    <div class="package-image">

                        <img src="{{ asset('storage/carmodel/'.$item->car->img) }}">

                    </div>

                    {{-- BODY --}}
                    <div class="package-body d-flex flex-column h-100">

                        <div class="d-flex justify-content-between align-items-start mb-3">

                            <div>

                                <div class="package-badge">

                                    {{ ucfirst($item->status) }}

                                </div>

                                <div class="package-title">

                                    {{ ucfirst($item->package->transmission_type) }}
                                    {{ strtoupper(str_replace('_', ' ', $item->package->ac_type)) }}

                                </div>

                            </div>

                            <span class="badge bg-dark px-3 py-2">

                                {{ $item->remaining_hours }} Jam

                            </span>

                        </div>

                        {{-- CAR --}}
                        <div class="mb-3">

                            <small class="text-muted d-block">
                                Car
                            </small>

                            <h6 class="fw-bold mb-0">

                                {{ $item->car->name }}

                            </h6>

                        </div>

                        {{-- TUTOR --}}
                        <div class="mb-4">

                            <small class="text-muted d-block">
                                Instructor
                            </small>

                            <h6 class="fw-bold mb-0">

                                {{ $item->tutor->name }}

                            </h6>

                        </div>

                        {{-- PROGRESS --}}
                        <div class="mb-4">

                            <div class="d-flex justify-content-between mb-2">

                                <small class="text-muted">
                                    Remaining Hours
                                </small>

                                <small class="fw-semibold">

                                    {{ $item->remaining_hours }}
                                    /
                                    {{ $item->package->total_hours }} Hours

                                </small>

                            </div>

                            <div class="progress"
                                 style="height:10px; border-radius:50px;">

                                <div class="progress-bar bg-warning"
                                     style="
                                     width:
                                     {{ ($item->remaining_hours / $item->package->total_hours) * 100 }}%;
                                     ">
                                </div>

                            </div>

                        </div>

                        {{-- BUTTON --}}
                        <div class="mt-auto">

                            @if($item->status != 'cancelled')

                            <a href="{{ route('driving.session.form', $item->id) }}"
                               class="btn btn-warning w-100 btn-package">

                                Continue Session

                            </a>

                            @else

                            <button class="btn btn-secondary w-100 btn-package"
                                    disabled>

                                Package Cancelled

                            </button>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>

    {{-- SESSION HISTORY --}}
    <div>

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h2 class="fw-bold mb-1">
                    Driving Session History
                </h2>

                <p class="text-muted mb-0">
                    All your submitted driving sessions
                </p>

            </div>

        </div>

        <div class="row g-4">

            @foreach($drivingSessions as $session)

            <div class="col-lg-4 col-md-6">

                <div class="card shadow border-0 package-card h-100">

                    <div class="package-body">

                        {{-- STATUS --}}
                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <span class="
                                badge
                                @if($session->status == 'scheduled')
                                    bg-warning text-dark
                                @elseif($session->status == 'completed')
                                    bg-success
                                @else
                                    bg-danger
                                @endif
                                px-3 py-2
                            ">

                                {{ ucfirst($session->status) }}

                            </span>

                            <span class="badge bg-dark">

                                {{ $session->used_hours }} Jam

                            </span>

                        </div>

                        {{-- DATE --}}
                        <div class="mb-3">

                            <small class="text-muted d-block">
                                Schedule
                            </small>

                            <h6 class="fw-bold mb-0">

                                {{ \Carbon\Carbon::parse($session->session_date)->format('d M Y - H:i') }}

                            </h6>

                        </div>

                        {{-- CAR --}}
                        <div class="mb-3">

                            <small class="text-muted d-block">
                                Car
                            </small>

                            <h6 class="fw-bold mb-0">

                                {{ $session->userPackage->car->name }}

                            </h6>

                        </div>

                        {{-- TUTOR --}}
                        <div class="mb-3">

                            <small class="text-muted d-block">
                                Instructor
                            </small>

                            <h6 class="fw-bold mb-0">

                                {{ $session->userPackage->tutor->name }}

                            </h6>

                        </div>

                        {{-- NOTE --}}
                        <div>

                            <small class="text-muted d-block">
                                Note
                            </small>

                            <p class="mb-0">

                                {{ $session->note }}

                            </p>

                        </div>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</div>

{{-- ========================= --}}
{{-- USER BELUM PUNYA PACKAGE --}}
{{-- ========================= --}}
@else


{{-- HERO --}}
<div class="hero-section">
    <img src="{{ asset('images/dashboard-driving-course.jpg') }}">

    <div class="hero-overlay">
        <div class="container">
            <div class="hero-content">
                <h1>
                    Learn to Drive With Confidence
                </h1>

                <p class="mt-3">
                    Professional driving lessons designed for safety,
                    comfort, and real-world driving skills.
                </p>
            </div>
        </div>
    </div>
</div>

{{-- PACKAGE --}}
<div class="container package-section pb-5">

    <div class="row g-4">

        {{-- MATIC AC --}}
        <div class="col-lg-3 col-md-6 col-6">
            <div class="card shadow package-card h-100">

                <div class="package-image">
                    <img src="{{ asset('images/driving_course/avanza2025.jpg') }}">
                </div>

                <div class="package-body d-flex flex-column h-100">

                    <div class="package-badge">
                        Best Seller
                    </div>

                    <div class="package-title">
                        Matic AC
                    </div>

                    <div class="package-price mt-2">
                        Rp 500K
                    </div>

                    <ul class="package-list flex-grow-1">
                        <li>6 Jam Belajar</li>
                        <li>Mobil AC</li>
                        <li>Instruktur Profesional</li>
                        <li>Latihan Jalan Raya</li>
                    </ul>

                    <div class="package-footer">

                        <form action="{{ route('register.course', $packages[1]->id) }}" method="GET">

                            <input type="hidden" name="transmission" value="matic">
                            <input type="hidden" name="ac_type" value="ac">

                            <button class="btn btn-warning w-100 btn-package">
                                Pilih Paket
                            </button>

                        </form>

                    </div>

                </div>

            </div>
        </div>

        {{-- MANUAL AC --}}
        <div class="col-lg-3 col-md-6 col-6">
            <div class="card shadow package-card h-100">

                <div class="package-image">
                    <img src="{{ asset('images/driving_course/avanza2025.jpg') }}">
                </div>

                <div class="package-body d-flex flex-column h-100">

                    <div class="package-badge">
                        Popular
                    </div>

                    <div class="package-title">
                        Manual AC
                    </div>

                    <div class="package-price mt-2">
                        Rp 500K
                    </div>

                    <ul class="package-list flex-grow-1">
                        <li>6 Jam Belajar</li>
                        <li>Mobil AC</li>
                        <li>Kopling & Tanjakan</li>
                        <li>Instruktur Profesional</li>
                    </ul>

                    <div class="package-footer">

                        <form action="{{ route('register.course', $packages[3]->id) }}" method="GET">

                            <input type="hidden" name="transmission" value="manual">
                            <input type="hidden" name="ac_type" value="ac">

                            <button class="btn btn-warning w-100 btn-package">
                                Pilih Paket
                            </button>

                        </form>

                    </div>

                </div>

            </div>
        </div>

        {{-- MATIC NON AC --}}
        <div class="col-lg-3 col-md-6 col-6">
            <div class="card shadow package-card h-100">

                <div class="package-image">
                    <img src="{{ asset('images/driving_course/avanza2025.jpg') }}">
                </div>

                <div class="package-body d-flex flex-column h-100">

                    <div class="package-badge">
                        Hemat
                    </div>

                    <div class="package-title">
                        Matic Non AC
                    </div>

                    <div class="package-price mt-2">
                        Rp 450K
                    </div>

                    <ul class="package-list flex-grow-1">
                        <li>6 Jam Belajar</li>
                        <li>Mobil Non AC</li>
                        <li>Cocok Pemula</li>
                        <li>Instruktur Profesional</li>
                    </ul>

                    <div class="package-footer">

                        <form action="{{ route('register.course', $packages[4]->id) }}" method="GET">

                            <input type="hidden" name="transmission" value="matic">
                            <input type="hidden" name="ac_type" value="non_ac">

                            <button class="btn btn-warning w-100 btn-package">
                                Pilih Paket
                            </button>

                        </form>

                    </div>

                </div>

            </div>
        </div>

        {{-- MANUAL NON AC --}}
        <div class="col-lg-3 col-md-6 col-6">
            <div class="card shadow package-card h-100">

                <div class="package-image">
                    <img src="{{ asset('images/driving_course/avanza2025.jpg') }}">
                </div>

                <div class="package-body d-flex flex-column h-100">

                    <div class="package-badge">
                        Basic
                    </div>

                    <div class="package-title">
                        Manual Non AC
                    </div>

                    <div class="package-price mt-2">
                        Rp 450K
                    </div>

                    <ul class="package-list flex-grow-1">
                        <li>6 Jam Belajar</li>
                        <li>Mobil Non AC</li>
                        <li>Latihan Kopling</li>
                        <li>Instruktur Profesional</li>
                    </ul>

                    <div class="package-footer">

                        <form action="{{ route('register.course', $packages[5]->id) }}" method="GET">

                            <input type="hidden" name="transmission" value="manual">
                            <input type="hidden" name="ac_type" value="non_ac">

                            <button class="btn btn-warning w-100 btn-package">
                                Pilih Paket
                            </button>

                        </form>

                    </div>

                </div>

            </div>
        </div>

    </div>

</div>





{{-- HERO + PACKAGE SECTION LU TARO DISINI --}}
{{-- YANG KARTU PACKAGE ITU --}}
{{-- jadi user cuma bisa beli kalau belum punya package --}}

@endif





@endsection