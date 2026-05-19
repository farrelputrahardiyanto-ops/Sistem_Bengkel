@extends('layouts.user.user')

@section('title', 'My Cart')

@section('style')

<style>

.cart-card{
    border: none;
    border-radius: 18px;
    overflow: hidden;
}

.cart-item{
    border-bottom: 1px solid #f1f1f1;
    padding: 20px 0;
}

.cart-item:last-child{
    border-bottom: none;
}

.cart-img{
    width: 110px;
    height: 110px;
    object-fit: contain;
    background: #f8f9fa;
    border-radius: 14px;
    padding: 10px;
}

.qty-input{
    width: 80px;
}

.summary-card{
    border: none;
    border-radius: 18px;
    position: sticky;
    top: 100px;
}

.checkout-btn{
    height: 52px;
    border-radius: 14px;
    font-weight: 600;
    font-size: 15px;
}

.remove-btn{
    border-radius: 10px;
}

.empty-cart{
    min-height: 60vh;
}

@media(max-width:768px){

    .cart-img{
        width: 85px;
        height: 85px;
    }

    .qty-mobile{
        width: 100%;
    }

    .summary-card{
        position: relative;
        top: 0;
    }

}

</style>

@endsection

@section('content')

<div class="container py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">

        <div>
            <h3 class="fw-bold mb-1">My Cart</h3>
            <small class="text-muted">
                Review your spareparts before checkout
            </small>
        </div>

        <a href="{{ route('dashboard.sparepart.index') }}"
           class="btn btn-outline-dark rounded-pill px-4">
            <i class="bi bi-arrow-left me-1"></i>
            Continue Shopping
        </a>

    </div>

    {{-- ALERT --}}
    @if(session('success'))
        <div class="alert alert-success rounded-4 border-0 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    @if($cart && $cart->items->count())

        @php
            $total = 0;
        @endphp

        <div class="row g-4">

            {{-- LEFT --}}
            <div class="col-lg-8">

                <div class="card shadow-sm cart-card">

                    <div class="card-body p-4">

                        @foreach($cart->items as $item)

                            @php
                                $subtotal = $item->qty * $item->price;
                                $total += $subtotal;
                            @endphp

                            <div class="cart-item">

                                <div class="row align-items-center gy-3">

                                    {{-- IMAGE --}}
                                    <div class="col-md-2 col-4 text-center">

                                        <img src="{{ Storage::url('sparepart/'.$item->sparepart->img) }}"
                                             class="cart-img">

                                    </div>

                                    {{-- INFO --}}
                                    <div class="col-md-4 col-8">

                                        <h5 class="fw-semibold mb-1">
                                            {{ $item->sparepart->name }}
                                        </h5>

                                        <small class="text-muted d-block">
                                            {{ $item->sparepart->brand_sparepart }}
                                        </small>

                                        <small class="text-muted">
                                            {{ $item->sparepart->car_type }}
                                        </small>

                                    </div>

                                    {{-- QTY --}}
                                    <div class="col-md-3 col-6">

                                        <form action="{{ route('cart.update', $item->id) }}"
                                              method="POST">

                                            @csrf

                                            <div class="d-flex gap-2 qty-mobile">

                                                <input type="number"
                                                       name="qty"
                                                       value="{{ $item->qty }}"
                                                       min="1"
                                                       class="form-control qty-input">

                                                <button class="btn btn-warning">
                                                    Update
                                                </button>

                                            </div>

                                        </form>

                                    </div>

                                    {{-- PRICE --}}
                                    <div class="col-md-2 col-6 text-md-center text-end">

                                        <div class="fw-bold fs-6">
                                            Rp {{ number_format($subtotal,0,',','.') }}
                                        </div>

                                    </div>

                                    {{-- DELETE --}}
                                    <div class="col-md-1 text-end">

                                        <form action="{{ route('cart.delete', $item->id) }}"
                                              method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-light border remove-btn">

                                                <i class="bi bi-trash text-danger"></i>

                                            </button>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>

            </div>

            {{-- RIGHT --}}
            <div class="col-lg-4">

                <div class="card shadow-sm summary-card">

                    <div class="card-body p-4">

                        <h5 class="fw-bold mb-4">
                            Order Summary
                        </h5>

                        <div class="d-flex justify-content-between mb-3">

                            <span class="text-muted">
                                Total Items
                            </span>

                            <span class="fw-semibold">
                                {{ $cart->items->sum('qty') }}
                            </span>

                        </div>

                        <div class="d-flex justify-content-between mb-3">

                            <span class="text-muted">
                                Shipping
                            </span>

                            <span class="text-success fw-semibold">
                                Free
                            </span>

                        </div>

                        <hr>

                        <div class="d-flex justify-content-between align-items-center mb-4">

                            <h5 class="mb-0">
                                Total
                            </h5>

                            <h4 class="fw-bold text-warning mb-0">
                                Rp {{ number_format($total,0,',','.') }}
                            </h4>

                        </div>

                        {{-- CHECKOUT --}}
                        <a href="{{ route('checkout') }}"
                            class="btn btn-warning w-100 checkout-btn">

                                <i class="bi bi-credit-card me-2"></i>
                                Proceed to Checkout

                        </a>

                        <small class="text-muted d-block text-center mt-3">
                            Secure checkout & fast processing
                        </small>

                    </div>

                </div>

            </div>

        </div>

    @else

        {{-- EMPTY --}}
        <div class="empty-cart d-flex align-items-center justify-content-center">

            <div class="text-center">

                <img src="{{ asset('images/empty-cart.png') }}"
                     width="220"
                     class="mb-4">

                <h4 class="fw-bold mb-2">
                    Your cart is empty
                </h4>

                <p class="text-muted mb-4">
                    Looks like you haven’t added any spareparts yet.
                </p>

                <a href="{{ route('dashboard.sparepart.index') }}"
                   class="btn btn-warning px-4 py-2 rounded-pill">

                    Start Shopping

                </a>

            </div>

        </div>

    @endif

</div>

@endsection