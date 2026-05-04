@extends('layouts.user.user')

@section('title', 'Detail Servis')

<style>
    .add-car-section {
    background-color: #f8f9fa;
}

.add-car-card {
    height: 140px;
    border: 2px dashed #ccc;
    cursor: pointer;
    border-radius: 12px;
    transition: 0.2s;
}

.add-car-card:hover {
    border-color: #FFD600;
    transform: scale(1.03);
}

.plus-icon {
    font-size: 32px;
    font-weight: bold;
    color: #999;
}

.car-card {
    border-radius: 12px;
    border: 1px solid #eee;
    transition: 0.2s;
}

.car-card:hover {
    transform: scale(1.02);
}
</style>

@section('content')



<section class="add-car-section py-5">

    <div class="container">

        <h6 class="mb-4 fw-semibold text-muted">
            My Car
        </h6>

        <div class="row g-4">

            {{-- CARD ADD --}}
            <div class="col-md-3 col-6">
                <div class="card add-car-card d-flex justify-content-center align-items-center"
                     onclick="toggleForm()">
                    
                    <span class="plus-icon">+</span>
                    <small class="mt-2">Add My Car</small>

                </div>
            </div>

            {{-- (OPTIONAL) LOOP CAR --}}
            @foreach($cars as $car)
            <div class="col-md-3 col-6">
                <div class="card car-card p-3 text-center">
                    <img src="{{ asset('storage/'.$car->model->img) }}"
                         class="img-fluid mb-2"
                         style="height:80px; object-fit:contain;">

                    <small class="fw-semibold">
                        {{ $car->model->name }}
                    </small>

                    <small class="text-muted d-block">
                        {{ $car->plate_number }}
                    </small>
                </div>
            </div>
            @endforeach

        </div>

    </div>

</section>

<script>
function toggleForm() {
    document.getElementById('formCar').classList.toggle('d-none');
}
</script>


@endsection