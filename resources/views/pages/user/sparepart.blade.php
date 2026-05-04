@extends('layouts.user.user')

@section('title', 'Spareparts')

<style>
.card {
    transition: 0.3s;
    position: relative;
    overflow: hidden;
}

.card:hover {
    transform: translateY(-5px);
}

/* overlay button */
.card-overlay {
    position: absolute;
    bottom: -50px;
    left: 0;
    width: 100%;
    text-align: center;
    transition: 0.3s;
}

.card:hover .card-overlay {
    bottom: 15px;
}

/* dark hover effect */
.card::after {
    content: "";
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0);
    transition: 0.3s;
}

.card:hover::after {
    background: rgba(0,0,0,0.2);
}
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

                        <a href="{{ route('sparepart.show', $item->id) }}" class="text-decoration-none text-dark">
                            <div class="card h-100 shadow-sm border-0">

                                <img src="{{ Storage::url('sparepart/'.$item->img) }}"
                                     class="card-img-top"
                                     style="height:150px; object-fit:contain;">

                                <div class="card-body text-center">
                                    <h6 class="mb-1">{{ $item->name }}</h6>
                                    <small class="text-muted">{{ $item->car_type }}</small>

                                    <p class="fw-bold mt-2">
                                        Rp {{ number_format($item->price,0,',','.') }}
                                    </p>
                                </div>

                                <!-- HOVER BUTTON -->
                                <div class="card-overlay">
                                    <form action="" method="POST">
                                        @csrf
                                        <input type="hidden" name="sparepart_id" value="{{ $item->id }}">
                                        <button class="btn btn-warning btn-sm">
                                            Add to Cart
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </a>

                    </div>
                @empty
                    <p class="text-center">Data tidak ditemukan</p>
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