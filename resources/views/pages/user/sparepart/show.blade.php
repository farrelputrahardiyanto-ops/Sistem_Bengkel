@extends('layouts.user.user')

@section('title', 'Detail')

<style>
    .btn-warning {
    background-color: #FFC107;
    border: none;
}

.btn-warning:hover {
    background-color: #e0aa00;
}

img {
    transition: 0.3s;
}

img:hover {
    transform: scale(1.05);
}
</style>

@section('content')


<div class="container my-5">
    <div class="row align-items-center">

        <!-- 🔽 IMAGE -->
        <div class="col-md-6 text-center mb-4">
            <img src="{{ Storage::url('sparepart/'.$spareparts->img) }}" alt="{{ $spareparts->name }}"
                 class="img-fluid"
                 style="max-height:300px; object-fit:contain;">
        </div>

        <!-- 🔽 DETAIL -->
        <div class="col-md-6">

            <h4 class="fw-bold">
                {{ $spareparts->name }}
            </h4>

            <p class="text-muted mb-1">
                {{ $spareparts->brand_car }} • {{ $spareparts->car_type }}
            </p>

            <h5 class="text-warning fw-bold mb-3">
                Rp {{ number_format($spareparts->price,0,',','.') }}
            </h5>

            <!-- 🔽 DESCRIPTION -->
            <div>
                <p id="descText" class="text-muted">
                    {{ Str::limit($spareparts->description, 120) }}
                </p>

                @if(strlen($spareparts->description) > 120)
                    <span id="toggleBtn" class="text-warning" style="cursor:pointer;">
                        Read more
                    </span>
                @endif
            </div>

            <!-- FULL TEXT HIDDEN -->
            <p id="fullDesc" class="d-none text-muted">
                {{ $spareparts->description }}
            </p>

            <!-- 🔽 BUTTON -->
            <div class="mt-4 d-flex gap-2">
                <button class="btn btn-warning px-4">Buy Now</button>
                <button class="btn btn-outline-dark px-4">
                    <i class="bi bi-cart"></i> Add to Cart
                </button>
            </div>

        </div>

    </div>
</div>

<script>
    const toggleBtn = document.getElementById('toggleBtn');

    if(toggleBtn){
        toggleBtn.addEventListener('click', function(){
            const shortText = document.getElementById('descText');
            const fullText = document.getElementById('fullDesc');

            if(fullText.classList.contains('d-none')){
                shortText.innerHTML = fullText.innerHTML;
                fullText.classList.remove('d-none');
                toggleBtn.innerText = 'Read less';
            } else {
                shortText.innerHTML = "{{ Str::limit($spareparts->description, 120) }}";
                fullText.classList.add('d-none');
                toggleBtn.innerText = 'Read more';
            }
        });
    }
</script>

@endsection