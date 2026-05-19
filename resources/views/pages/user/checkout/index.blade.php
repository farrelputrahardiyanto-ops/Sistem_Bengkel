@extends('layouts.user.user')

@section('title', 'Checkout')

@section('content')

<div class="container py-5">

    <div class="row g-4">

        {{-- LEFT --}}
        <div class="col-lg-8">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-4">

                    <h4 class="fw-bold mb-4">
                        Checkout
                    </h4>

                    @foreach($cart->items as $item)

                        <div class="d-flex align-items-center mb-4">

                            <img src="{{ Storage::url('sparepart/'.$item->sparepart->img) }}"
                                 width="90"
                                 height="90"
                                 class="rounded-4 bg-light p-2 object-fit-contain">

                            <div class="ms-3 flex-grow-1">

                                <h6 class="fw-bold mb-1">
                                    {{ $item->sparepart->name }}
                                </h6>

                                <small class="text-muted">
                                    Qty : {{ $item->qty }}
                                </small>

                            </div>

                            <div class="fw-bold">
                                Rp {{ number_format($item->qty * $item->price,0,',','.') }}
                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

        </div>

        {{-- RIGHT --}}
        <div class="col-lg-4">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-4">

                    <h5 class="fw-bold mb-4">
                        Payment Summary
                    </h5>

                    <div class="d-flex justify-content-between mb-3">

                        <span>Total Item</span>

                        <span>
                            {{ $cart->items->sum('qty') }}
                        </span>

                    </div>

                    <hr>

                    <div class="d-flex justify-content-between mb-4">

                        <h5>Total</h5>

                        <h4 class="fw-bold text-warning">
                            Rp {{ number_format($total,0,',','.') }}
                        </h4>

                    </div>

                    <form action="{{ route('checkout.process') }}"
                          method="POST">

                        @csrf

                        <button class="btn btn-warning w-100 py-3 rounded-4 fw-semibold">

                            Bayar Sekarang

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection