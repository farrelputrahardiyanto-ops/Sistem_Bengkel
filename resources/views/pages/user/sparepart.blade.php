@extends('layouts.user.user')

@section('title', 'Spareparts')

<style>

.product-card{
    border-radius: 18px;
    overflow: hidden;
    transition: .3s ease;
    position: relative;
    background: #fff;
}

.product-card:hover{
    transform: translateY(-6px);
}

.product-card img{
    transition: .3s ease;
}

.product-card:hover img{
    transform: scale(1.05);
}

/* DARK OVERLAY */
.product-card::after{
    content: "";
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0);
    transition: .3s ease;
    pointer-events: none;
}

.product-card:hover::after{
    background: rgba(0,0,0,0.12);
}

/* HOVER ACTION */
.card-actions{
    position: absolute;
    bottom: -100px;
    left: 0;
    width: 100%;
    padding: 0 14px 14px;
    transition: .3s ease;
    z-index: 5;
}

.product-card:hover .card-actions{
    bottom: 0;
}

.card-actions .btn{
    border-radius: 12px;
    height: 42px;
    font-size: 14px;
    font-weight: 600;
}

.card-actions form{
    margin: 0;
}

.buy-btn{
    flex: 1;
}

.cart-btn{
    width: 48px;
}

@media(max-width:576px){

    .card-actions{
        bottom: 0;
        position: relative;
        padding-top: 0;
    }

    .product-card::after{
        display: none;
    }

}

</style>

</style>

@section('content')

<div class="container-fluid my-4">
    <div class="row">

        <!-- SIDEBAR -->
        <div class="col-lg-2 mb-3">
            <form method="GET">
                <div class="bg-light p-3 rounded">
                    <h6>Filter</h6>

                    <label class="mt-2">Price Range</label>
                    <div class="d-flex gap-2">
                        <input type="number" name="min_price" class="form-control" placeholder="Min" value="{{ request('min_price') }}">
                        <input type="number" name="max_price" class="form-control" placeholder="Max" value="{{ request('max_price') }}">
                    </div>

                    <label>Car Brands</label>
                    <select name="brand_car" class="form-select mb-2">
                        <option value="">All</option>
                        @foreach($brands as $b)
                            <option value="{{ $b }}" {{ request('brand_car') == $b ? 'selected' : '' }}>
                                {{ $b }}
                            </option>
                        @endforeach
                    </select>

                    <label>Category</label>
                    <select name="car_type" class="form-select mb-2">
                        <option value="">All</option>
                        @foreach($types as $t)
                            <option value="{{ $t }}" {{ request('car_type') == $t ? 'selected' : '' }}>
                                {{ $t }}
                            </option>
                        @endforeach
                    </select>

                    <label>Brand Spareparts</label>
                    <select name="brand_sparepart" class="form-select mb-2">
                        <option value="">All</option>
                        @foreach($spBrands as $sp)
                            <option value="{{ $sp }}" {{ request('brand_sparepart') == $sp ? 'selected' : '' }}>
                                {{ $sp }}
                            </option>
                        @endforeach
                    </select>

                    <button class="btn btn-warning w-100 mt-2">Apply</button>
                </div>
            </form>
        </div>

        <!-- CONTENT -->
        <div class="col-lg-10">

            <!-- SEARCH -->
            <form method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control"
                        placeholder="Search spareparts..."
                        value="{{ request('search') }}">

                    <input type="hidden" name="brand_car" value="{{ request('brand_car') }}">
                    <input type="hidden" name="car_type" value="{{ request('car_type') }}">
                    <input type="hidden" name="brand_sparepart" value="{{ request('brand_sparepart') }}">
                    <input type="hidden" name="min_price" value="{{ request('min_price') }}">
                    <input type="hidden" name="max_price" value="{{ request('max_price') }}">

                    <button class="btn btn-warning">Search</button>
                </div>
            </form>

            <!-- GRID -->
            <div class="row">

    @forelse($spareparts as $item)

        <div class="col-lg-3 col-md-4 col-6 mb-4">

            <div class="card product-card shadow-sm border-0 h-100">

                {{-- CLICKABLE CONTENT --}}
                <a href="{{ route('sparepart.show', $item->id) }}"
                   class="text-decoration-none text-dark">

                    <img src="{{ Storage::url('sparepart/'.$item->img) }}"
                         class="card-img-top p-3"
                         style="height:180px; object-fit:contain;">

                    <div class="card-body text-center pb-5">

                        <h6 class="mb-1 fw-semibold">
                            {{ $item->name }}
                        </h6>

                        <small class="text-muted d-block">
                            {{ $item->car_type }}
                        </small>

                        <p class="fw-bold text-warning mt-2 mb-0 fs-5">
                            Rp {{ number_format($item->price,0,',','.') }}
                        </p>

                    </div>

                </a>

                {{-- HOVER BUTTON --}}
                <div class="card-actions">

                    <div class="d-flex gap-2">

                        {{-- BUY --}}
                        <a href="{{ route('sparepart.show', $item->id) }}"
                           class="btn btn-warning buy-btn">

                            Buy Now

                        </a>

                        {{-- ADD TO CART --}}
                        <form action="{{ route('cart.add') }}"
                              method="POST">

                            @csrf

                            <input type="hidden"
                                   name="sparepart_id"
                                   value="{{ $item->id }}">

                            <button class="btn btn-light cart-btn">

                                <i class="bi bi-bag-plus"></i>

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    @empty

        <div class="text-center py-5">
            <h5>Data tidak ditemukan</h5>
        </div>

    @endforelse

</div>

            <!-- PAGINATION -->
            <div class="d-flex justify-content-center">
                {{ $spareparts->appends(request()->query())->links() }}
            </div>

        </div>
    </div>
</div>

@endsection