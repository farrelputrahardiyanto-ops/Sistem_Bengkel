@extends('layouts.user.user')

@section('title', 'Booking Service')

@section('content')

<style>

.service-wrapper{
    background:#f4f7fb;
    min-height:100vh;
    padding:50px 0;
}

/* CARD */

.booking-card{
    border:none;
    border-radius:30px;
    overflow:hidden;
    background:white;
}

/* LEFT SIDE */

.left-panel{
    background:#111;
    color:white;
    height:100%;
    padding:40px;
    position:relative;
    overflow:hidden;
}

.left-panel::before{
    content:'';
    position:absolute;
    width:250px;
    height:250px;
    border-radius:50%;
    background:rgba(255,193,7,.08);
    top:-80px;
    right:-80px;
}

.left-title{
    font-size:32px;
    font-weight:700;
    position:relative;
    z-index:2;
}

.left-desc{
    font-size:14px;
    opacity:.75;
    line-height:1.8;
    margin-top:14px;
    position:relative;
    z-index:2;
}

.car-preview{
    margin-top:35px;
    background:rgba(255,255,255,.06);
    border:1px solid rgba(255,255,255,.08);
    border-radius:24px;
    padding:24px;
    text-align:center;
    position:relative;
    z-index:2;
}

.car-preview img{
    height:130px;
    object-fit:contain;
}

.car-name{
    font-size:22px;
    font-weight:700;
    margin-top:20px;
}

.car-year{
    color:#aaa;
    font-size:14px;
}

.car-info{
    margin-top:24px;
    display:flex;
    flex-direction:column;
    gap:14px;
}

.car-info-item{
    background:rgba(255,255,255,.05);
    border-radius:16px;
    padding:14px 16px;
    text-align:left;
}

.info-label{
    font-size:12px;
    color:#ffc107;
    margin-bottom:5px;
    display:block;
    letter-spacing:.4px;
}

.info-value{
    font-size:15px;
    font-weight:600;
    margin:0;
}

/* RIGHT SIDE */

.right-panel{
    padding:45px;
}

.form-title{
    font-size:32px;
    font-weight:700;
}

.form-subtitle{
    color:#888;
    margin-top:8px;
    margin-bottom:35px;
}

.form-label{
    font-weight:600;
    margin-bottom:10px;
    color:#333;
}

.form-control{
    border-radius:16px !important;
    border:1px solid #ddd !important;
    padding:14px 16px !important;
    font-size:14px;
}

.form-control:focus{
    box-shadow:none !important;
    border-color:#ffc107 !important;
}

/* TEXTAREA */

.service-box{
    border:1px solid #ddd;
    border-radius:20px;
    overflow:hidden;
    transition:.25s;
    background:white;
}

.service-box:focus-within{
    border-color:#ffc107;
    box-shadow:0 0 0 4px rgba(255,193,7,.12);
}

.service-textarea{
    width:100%;
    border:none;
    resize:none;
    min-height:180px;
    padding:20px;
    font-size:15px;
}

.service-textarea:focus{
    outline:none;
}

.service-footer{
    background:#fafafa;
    border-top:1px solid #f1f1f1;
    padding:14px 18px;
    font-size:12px;
    color:#888;
}

/* BUTTON */

.btn-book{
    background:#ffc107;
    border:none;
    border-radius:18px;
    padding:15px;
    font-weight:700;
    font-size:15px;
    transition:.25s;
}

.btn-book:hover{
    transform:translateY(-2px);
    box-shadow:0 12px 24px rgba(255,193,7,.25);
}

/* ALERT */

.alert{
    border-radius:16px;
}

/* MOBILE */

@media(max-width:991px){

    .left-panel{
        padding:28px;
    }

    .right-panel{
        padding:28px;
    }

    .left-title,
    .form-title{
        font-size:26px;
    }

}

</style>

<div class="service-wrapper">

    <div class="container">

        <div class="card shadow-lg booking-card">

            <div class="row g-0">

                {{-- LEFT --}}
                <div class="col-lg-4">

                    <div class="left-panel">

                        <h2 class="left-title">
                            Book Service
                        </h2>

                        <p class="left-desc">
                            Schedule your vehicle service quickly and easily.
                            Fill in the reservation form and our team will
                            process your booking immediately.
                        </p>

                        <div class="car-preview">

                            <img src="{{ asset('storage/carmodel/'.$car->model->img) }}"
                                 class="img-fluid">

                            <h4 class="car-name">
                                {{ $car->model->name }}
                            </h4>

                            <p class="car-year">
                                {{ $car->model->model_year }}
                            </p>

                            <div class="car-info">

                                <div class="car-info-item">

                                    <span class="info-label">
                                        Plate Number
                                    </span>

                                    <p class="info-value">
                                        {{ strtoupper($car->plate_number) }}
                                    </p>

                                </div>

                                <div class="car-info-item">

                                    <span class="info-label">
                                        Car ID
                                    </span>

                                    <p class="info-value">
                                        #CAR-{{ $car->id }}
                                    </p>

                                </div>

                                <div class="car-info-item">

                                    <span class="info-label">
                                        Transmission
                                    </span>

                                    <p class="info-value">
                                        {{ ucfirst($car->model->transmission) }}
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- RIGHT --}}
                <div class="col-lg-8">

                    <div class="right-panel">

                        <h3 class="form-title">
                            Service Reservation
                        </h3>

                        <p class="form-subtitle">
                            Fill in your vehicle service details
                        </p>

                        @if ($errors->any())

                            <div class="alert alert-danger mb-4">

                                <ul class="mb-0">

                                    @foreach ($errors->all() as $error)

                                        <li>{{ $error }}</li>

                                    @endforeach

                                </ul>

                            </div>

                        @endif

                        <form action="{{ route('booking.service.store') }}"
                              method="POST">

                            @csrf

                            <input type="hidden"
                                   name="car_id"
                                   value="{{ $car->id }}">

                            <div class="row">

                                {{-- DATE --}}
                                <div class="col-md-6 mb-4">

                                    <label class="form-label">
                                        Reservation Date
                                    </label>

                                    <input type="date"
                                           name="reservation_date"
                                           class="form-control"
                                           value="{{ old('reservation_date') }}"
                                           required>

                                </div>

                                {{-- TIME --}}
                                <div class="col-md-6 mb-4">

                                    <label class="form-label">
                                        Reservation Time
                                    </label>

                                    <input type="time"
                                           name="reservation_time"
                                           class="form-control"
                                           value="{{ old('reservation_time') }}"
                                           required>

                                </div>

                                {{-- DESCRIPTION --}}
                                <div class="col-12 mb-4">

                                    <label class="form-label">
                                        Service Description
                                    </label>

                                    <div class="service-box">

                                        <textarea name="services_description"
                                                  class="service-textarea"
                                                  placeholder="Contoh: Ganti oli, cek rem, suara mesin kasar, AC tidak dingin..."
                                                  required>{{ old('services_description') }}</textarea>

                                        <div class="service-footer">

                                            Jelaskan detail keluhan kendaraan
                                            agar teknisi dapat mempersiapkan service dengan lebih baik.

                                        </div>

                                    </div>

                                </div>

                                <input type="hidden" name="car_id" value="{{ $car->id }}">

                                <input type="hidden" name="plate_number" value="{{ $car->plate_number }}">

                                {{-- BUTTON --}}
                                <div class="col-12">

                                    <button class="btn btn-book w-100">

                                        Confirm Booking

                                    </button>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection