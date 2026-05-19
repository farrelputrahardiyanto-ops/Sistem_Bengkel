@extends('layouts.user.user')

@section('title', 'My Car')

@section('content')

<style>
    body{
        background:#f5f7fb;
    }

    .section-title{
        font-size:28px;
        font-weight:700;
    }

    .add-car-btn{
        background:#FFD600;
        border:none;
        border-radius:14px;
        padding:12px 22px;
        font-weight:600;
        transition:.25s;
    }

    .add-car-btn:hover{
        transform:translateY(-2px);
        box-shadow:0 10px 20px rgba(255,214,0,.3);
    }

    .form-wrapper{
        border-radius:24px;
        overflow:hidden;
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

    .car-option input:checked + .car-select-card{
        border-color:#FFD600;
        background:#fffdf3;
        box-shadow:0 10px 25px rgba(255,214,0,.25);
    }

    .car-user-card{
        border:none;
        border-radius:24px;
        overflow:hidden;
        transition:.25s;
    }

    .car-user-card:hover{
        transform:translateY(-6px);
        box-shadow:0 18px 30px rgba(0,0,0,.08);
    }

    .car-image-wrapper{
        background:#f8f9fa;
        height:180px;
    }

    .service-btn{
        background:#FFD600;
        border:none;
        border-radius:14px;
        font-weight:600;
        padding:12px;
        transition:.25s;
    }

    .service-btn:hover{
        transform:translateY(-2px);
        box-shadow:0 10px 20px rgba(255,214,0,.3);
    }

    .plate-badge{
        background:#111;
        color:white;
        border-radius:10px;
        padding:6px 12px;
        font-size:13px;
        display:inline-block;
    }

    .empty-card{
        border:2px dashed #ccc;
        border-radius:24px;
        background:white;
        cursor:pointer;
        transition:.25s;
        min-height:320px;
    }

    .empty-card:hover{
        border-color:#FFD600;
        transform:translateY(-5px);
    }

    .plus-icon{
        width:70px;
        height:70px;
        border-radius:50%;
        background:#FFD600;
        display:flex;
        align-items:center;
        justify-content:center;
        font-size:36px;
        font-weight:bold;
    }
</style>

<section class="py-5">

    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h2 class="section-title mb-1">
                    My Cars
                </h2>

                <p class="text-muted mb-0">
                    Manage your registered vehicles
                </p>

            </div>

            <button onclick="toggleForm()"
                    class="add-car-btn">

                + Add Car

            </button>

        </div>

        {{-- FORM --}}
        <div id="formCar"
             class="card shadow-lg border-0 form-wrapper p-4 mb-5 d-none">

            <form action="{{ route('servis.car.store') }}"
                  method="POST">

                @csrf

                <div class="mb-4">

                    <label class="form-label fw-semibold mb-2">
                        License Plate
                    </label>

                    <input type="text"
                           name="plate_number"
                           class="form-control form-control-lg"
                           placeholder="B 1234 XYZ"
                           required>

                </div>

                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Choose Car Model
                    </label>

                </div>

                <div class="row g-4">

                    @foreach($models as $model)

                    <div class="col-md-4 col-6">

                        <label class="car-option w-100">

                            <input type="radio"
                                   name="car_model_id"
                                   value="{{ $model->id }}"
                                   class="d-none"
                                   required>

                            <div class="car-select-card p-3 text-center h-100">

                                <img src="{{ asset('storage/carmodel/'.$model->img) }}"
                                     class="img-fluid mb-3"
                                     style="height:100px; object-fit:contain;">

                                <h6 class="fw-bold mb-1">
                                    {{ $model->name }}
                                </h6>

                                <small class="text-muted d-block">
                                    {{ $model->model_year }}
                                </small>

                                <span class="badge bg-dark mt-2 px-3 py-2">
                                    {{ ucfirst($model->transmission) }}
                                </span>

                            </div>

                        </label>

                    </div>

                    @endforeach

                </div>

                <button class="btn service-btn w-100 mt-4">

                    Save My Car

                </button>

            </form>

        </div>

        {{-- LIST CAR --}}
        <div class="row g-4">

            {{-- ADD CARD --}}
            <div class="col-md-4 col-6">

                <div onclick="toggleForm()"
                     class="empty-card d-flex flex-column justify-content-center align-items-center">

                    <div class="plus-icon mb-3">
                        +
                    </div>

                    <h5 class="fw-bold mb-1">
                        Add New Car
                    </h5>

                    <small class="text-muted">
                        Register your vehicle
                    </small>

                </div>

            </div>

            {{-- USER CAR --}}
            @foreach($cars as $car)

            <div class="col-md-4 col-6">

                <div class="card car-user-card shadow-sm h-100">

                    <div class="car-image-wrapper d-flex align-items-center justify-content-center">

                        <img src="{{ asset('storage/carmodel/'.$car->model->img) }}"
                             class="img-fluid"
                             style="height:120px; object-fit:contain;">

                    </div>

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-start mb-2">

                            <div>

                                <h5 class="fw-bold mb-1">
                                    {{ $car->model->name }}
                                </h5>

                                <small class="text-muted">
                                    {{ $car->model->model_year }}
                                </small>

                            </div>

                            <span class="badge bg-dark">
                                {{ ucfirst($car->model->transmission) }}
                            </span>

                        </div>

                        <div class="plate-badge mb-4">
                            {{ strtoupper($car->plate_number) }}
                        </div>

                        <div class="d-grid">

                            <a href="{{ route('servis.booking', $car->id) }}"
                               class="btn service-btn">

                                Service Now

                            </a>

                        </div>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</section>

<script>

function toggleForm()
{
    document.getElementById('formCar')
            .classList
            .toggle('d-none');
}

</script>

@endsection