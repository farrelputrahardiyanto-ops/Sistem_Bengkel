@extends('layouts.user.user')

@section('title', 'Driving Session')

@section('content')

<style>

.session-section{
    background:#f8f9fa;
    min-height:100vh;
    padding:60px 0;
}

.session-card{
    border:none;
    border-radius:28px;
    overflow:hidden;
}

.left-side{
    background:#111;
    color:white;
    padding:40px;
    height:100%;
}

.left-side h2{
    font-size:34px;
    font-weight:700;
}

.left-side p{
    opacity:.8;
    font-size:14px;
}

.info-box{
    background:rgba(255,255,255,.08);
    border-radius:18px;
    padding:18px;
    margin-top:18px;
}

.info-box small{
    color:#ffc107;
}

.form-side{
    padding:40px;
}

.form-title{
    font-size:32px;
    font-weight:700;
}

.form-label{
    font-weight:600;
    margin-bottom:8px;
}

.form-control,
.form-select{
    border-radius:14px;
    padding:12px;
    border:1px solid #ddd;
}

.form-control:focus,
.form-select:focus{
    box-shadow:none;
    border-color:#ffc107;
}

.btn-submit{
    border-radius:14px;
    padding:14px;
    font-weight:600;
}

/* --- Car picker (marketplace style) --- */

.car-picker{
    display:grid;
    grid-template-columns:repeat(auto-fill, minmax(190px, 1fr));
    gap:16px;
}

.car-option{
    display:none;
}

.car-option-label{
    display:block;
    border:2px solid #eee;
    border-radius:18px;
    overflow:hidden;
    cursor:pointer;
    transition:.15s;
    background:#fff;
    position:relative;
}

.car-option-label:hover{
    border-color:#ffe08a;
    transform:translateY(-2px);
}

.car-option:checked + .car-option-label{
    border-color:#ffc107;
    box-shadow:0 0 0 3px rgba(255,193,7,.25);
}

.car-option-label img{
    width:100%;
    height:120px;
    object-fit:cover;
    background:#f1f1f1;
    display:block;
}

.car-option-info{
    padding:12px;
}

.car-option-info strong{
    display:block;
    font-size:14px;
    line-height:1.3;
}

.car-option-info .car-year{
    font-size:11px;
    color:#999;
}

.car-option-badges{
    display:flex;
    gap:6px;
    margin-top:8px;
    flex-wrap:wrap;
}

.badge-transmission{
    display:inline-block;
    background:#111;
    color:#ffc107;
    font-size:10px;
    padding:3px 9px;
    border-radius:20px;
    text-transform:capitalize;
}

.badge-ac{
    display:inline-block;
    background:#e7f3ff;
    color:#0d6efd;
    font-size:10px;
    padding:3px 9px;
    border-radius:20px;
    text-transform:uppercase;
}

.badge-stock{
    display:inline-block;
    background:#f1f1f1;
    color:#555;
    font-size:10px;
    padding:3px 9px;
    border-radius:20px;
}

.car-picker-empty{
    padding:20px;
    text-align:center;
    color:#999;
    border:1px dashed #ddd;
    border-radius:16px;
}

@media(max-width:768px){

    .session-section{
        padding:20px 0;
    }

    .left-side,
    .form-side{
        padding:24px;
    }

    .left-side h2,
    .form-title{
        font-size:26px;
    }

}

</style>

<div class="session-section">

    <div class="container">

        <div class="card shadow session-card">

            <div class="row g-0">

                {{-- LEFT --}}
                <div class="col-lg-4">

                    <div class="left-side">

                        <h2>
                            Driving Session
                        </h2>

                        <p class="mt-3">
                            Jadwalkan sesi latihan mengemudi berikutnya.
                        </p>

                        <div class="info-box">

                            <small>Paket</small>

                            <h5>
                                {{ ucfirst($userPackage->package->transmission_type) }}
                            </h5>

                        </div>

                        <div class="info-box">

                            <small>Tipe AC</small>

                            <h5>
                                {{ strtoupper($userPackage->package->ac_type) }}
                            </h5>

                        </div>

                        <div class="info-box">

                            <small>Sisa Jam</small>

                            <h5>
                                {{ $userPackage->remaining_hours }} Jam
                            </h5>

                        </div>

                        <div class="info-box">

                            <small>Mobil Tersedia</small>

                            <h5>
                                {{ $cars->count() }} Unit
                            </h5>

                        </div>

                        <div class="info-box">

                            <small>Tutor Tersedia</small>

                            <h5>
                                {{ $tutors->count() }} Orang
                            </h5>

                        </div>

                    </div>

                </div>

                {{-- RIGHT --}}
                <div class="col-lg-8">

                    <div class="form-side">

                        <h3 class="form-title mb-4">
                            Buat Sesi
                        </h3>

                        @if(session('error'))

                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>

                        @endif

                        <form action="{{ route('driving.session.store') }}"
                              method="POST">

                            @csrf

                            <input type="hidden"
                                   name="id_user_package"
                                   value="{{ $userPackage->id }}">

                            <div class="row">

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Tanggal Sesi
                                    </label>

                                    <input type="date"
                                           name="schedule_date"
                                           class="form-control"
                                           required>

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Jam Mulai
                                    </label>

                                    <input type="time"
                                        name="start_time"
                                        class="form-control"
                                        required>

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Gunakan Jam
                                    </label>

                                    <input type="number"
                                           name="used_hours"
                                           min="1"
                                           class="form-control"
                                           required>

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Tutor
                                    </label>

                                    <select name="tutor_id"
                                            class="form-select"
                                            required>

                                        <option value="" selected disabled>
                                            Pilih tutor
                                        </option>

                                        @foreach($tutors as $tutor)

                                            <option value="{{ $tutor->id }}">
                                                {{ $tutor->name }}
                                            </option>

                                        @endforeach

                                    </select>

                                </div>

                                <div class="col-12 mb-3">

                                    <label class="form-label">
                                        Pilih Mobil
                                    </label>

                                    @if($cars->isEmpty())

                                        <div class="car-picker-empty">
                                            Belum ada mobil yang tersedia untuk tipe AC paket ini.
                                        </div>

                                    @else

                                        <div class="car-picker">

                                            @foreach($cars as $car)

                                                <input type="radio"
                                                       name="car_id"
                                                       id="car-{{ $car->id }}"
                                                       value="{{ $car->id }}"
                                                       class="car-option"
                                                       required>

                                                <label for="car-{{ $car->id }}"
                                                       class="car-option-label">

                                                    <img src="{{ $car->car->img ? asset('storage/'.$car->carmodel) : asset('images/no-car.png') }}"
                                                         alt="{{ $car->car->brand->name }} {{ $car->car->name }}">

                                                    <div class="car-option-info">

                                                        <strong>
                                                            {{ $car->car->brand->name }}
                                                            {{ $car->car->name }}
                                                        </strong>

                                                        <span class="car-year">
                                                            {{ $car->car->model_year }}
                                                        </span>

                                                        <div class="car-option-badges">

                                                            <span class="badge-transmission">
                                                                {{ $car->car->transmission }}
                                                            </span>

                                                            <span class="badge-ac">
                                                                {{ $car->ac_type }}
                                                            </span>

                                                            <span class="badge-stock">
                                                                Stok {{ $car->amount }}
                                                            </span>

                                                        </div>

                                                    </div>

                                                </label>

                                            @endforeach

                                        </div>

                                    @endif

                                </div>

                                <div class="col-12 mt-3">

                                    <button class="btn btn-warning w-100 btn-submit">

                                        Buat Sesi

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