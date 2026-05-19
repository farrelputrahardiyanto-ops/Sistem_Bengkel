@extends('layouts.user.user')

@section('title', 'Register Course')

@section('content')

<style>

.register-section{
    background:#f5f7fb;
    min-height:100vh;
    padding:60px 0;
}

.register-card{
    border:none;
    border-radius:28px;
    overflow:hidden;
}

/* LEFT */

.left-side{
    background:#111;
    color:white;
    padding:40px;
    height:100%;
}

.left-side h2{
    font-weight:700;
    font-size:34px;
}

.left-side p{
    opacity:.8;
    font-size:14px;
}

.info-box{
    background:rgba(255,255,255,.07);
    border-radius:18px;
    padding:18px;
    margin-top:18px;
}

.info-box small{
    color:#FFD600;
}

.info-box h5,
.info-box h6{
    margin-top:6px;
}

/* RIGHT */

.form-side{
    padding:40px;
}

.form-title{
    font-size:32px;
    font-weight:700;
}

.form-label{
    font-weight:600;
    margin-bottom:10px;
}

/* CAR CARD */

.car-option input:checked + .car-select-card{
    border-color:#FFD600;
    background:#fffdf3;
    box-shadow:0 10px 25px rgba(255,214,0,.25);
}

.car-select-card{
    border:2px solid #eee;
    border-radius:22px;
    cursor:pointer;
    transition:.25s;
    background:white;
}

.car-select-card:hover{
    transform:translateY(-5px);
    border-color:#FFD600;
    box-shadow:0 12px 24px rgba(0,0,0,.08);
}

/* INPUT */

.form-control,
.form-select{
    border-radius:14px;
    padding:12px;
    border:1px solid #ddd;
}

.form-control:focus,
.form-select:focus{
    box-shadow:none;
    border-color:#FFD600;
}

/* BUTTON */

.btn-submit{
    background:#FFD600;
    border:none;
    border-radius:16px;
    padding:14px;
    font-weight:700;
    transition:.25s;
}

.btn-submit:hover{
    transform:translateY(-2px);
    box-shadow:0 10px 20px rgba(255,214,0,.3);
}

/* TUTOR CARD */

.tutor-box{
    border-radius:16px;
    border:1px solid #eee;
    padding:14px;
    transition:.25s;
}

.tutor-box:hover{
    border-color:#FFD600;
}

/* MOBILE */

@media(max-width:768px){

    .register-section{
        padding:20px 0;
    }

    .left-side{
        padding:24px;
    }

    .left-side h2{
        font-size:26px;
    }

    .form-side{
        padding:24px;
    }

    .form-title{
        font-size:24px;
    }

}

</style>

<div class="register-section">

    <div class="container">

        <div class="card shadow-lg register-card">

            <div class="row g-0">

                {{-- LEFT --}}
                <div class="col-lg-4">

                    <div class="left-side">

                        <h2>
                            Driving Course
                        </h2>

                        <p class="mt-3">
                            Lengkapi booking course mengemudi kamu
                            dengan memilih mobil dan instruktur terbaik.
                        </p>

                        {{-- USER --}}
                        <div class="info-box">

                            <small>Nama</small>

                            <h5>
                                {{ auth()->user()->name }}
                            </h5>

                        </div>

                        <div class="info-box">

                            <small>Email</small>

                            <h6>
                                {{ auth()->user()->email }}
                            </h6>

                        </div>

                        {{-- PACKAGE --}}
                        <div class="info-box">

                            <small>Transmission</small>

                            <h5 class="text-capitalize">
                                {{ $transmission }}
                            </h5>

                        </div>

                        <div class="info-box">

                            <small>AC Type</small>

                            <h5 class="text-capitalize">
                                {{ str_replace('_', ' ', $acType) }}
                            </h5>

                        </div>

                        <div class="info-box">

                            <small>Total Package</small>

                            <h4 class="fw-bold text-warning">
                                Rp {{ number_format($package->price) }}
                            </h4>

                        </div>

                    </div>

                </div>

                {{-- RIGHT --}}
                <div class="col-lg-8">

                    <div class="form-side">

                        <h3 class="form-title mb-4">
                            Booking Form
                        </h3>

                        <form action="{{ route('register.course.store') }}"
                              method="POST">

                            @csrf

                            {{-- HIDDEN --}}
                            <input type="hidden"
                                   name="transmission"
                                   value="{{ $transmission }}">

                            <input type="hidden"
                                   name="ac_type"
                                   value="{{ $acType }}">

                            <input type="hidden"
                                   name="package_id"
                                   value="{{ $package->id }}">

                            {{-- CHOOSE CAR --}}
                            <div class="mb-4">

                                <label class="form-label">
                                    Choose Car
                                </label>

                                <div class="row g-3">

                                    @foreach($cars as $car)

                                    <div class="col-md-4 col-6">

                                        <label class="car-option w-100">

                                            <input type="radio"
                                                   name="car_model_id"
                                                   value="{{ $car->id }}"
                                                   class="d-none"
                                                   required>

                                            <div class="car-select-card p-3 text-center h-100">

                                                <img src="{{ asset('storage/carmodel/'.$car->img) }}"
                                                     class="img-fluid mb-3"
                                                     style="height:100px; object-fit:contain;">

                                                <h6 class="fw-bold mb-1">
                                                    {{ $car->name }}
                                                </h6>

                                                <small class="text-muted d-block">
                                                    {{ $car->model_year }}
                                                </small>

                                                <span class="badge bg-dark mt-2 px-3 py-2">
                                                    {{ ucfirst($car->transmission) }}
                                                </span>

                                            </div>

                                        </label>

                                    </div>

                                    @endforeach

                                </div>

                            </div>

                            {{-- TUTOR --}}
                            <div class="mb-4">

                                <label class="form-label">
                                    Choose Instructor
                                </label>

                                <select name="tutor_id"
                                        class="form-select"
                                        required>

                                    <option value="">
                                        -- Choose Instructor --
                                    </option>

                                    @foreach($tutors as $tutor)

                                    <option value="{{ $tutor->id }}">
                                        {{ $tutor->name }}
                                    </option>

                                    @endforeach

                                </select>

                            </div>

                           
                                </div>

                            </div>

                            {{-- BUTTON --}}
                            <div class="mt-4 p-4">

                                <button class="btn btn-submit w-100">

                                    Continue To Payment

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>
            
        </div>

    </div>

</div>

@endsection