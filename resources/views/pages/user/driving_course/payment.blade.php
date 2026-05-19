@extends('layouts.user.user')

@section('content')

<div class="container py-5">

    <div class="card border-0 shadow p-5">

        <h2 class="fw-bold">
            Complete Payment
        </h2>

        <p class="text-muted">
            Driving Course Package
        </p>

        <hr>

        <h3 class="fw-bold text-warning">
            Rp {{ number_format($package->price) }}
        </h3>

        <button id="pay-button"
                class="btn btn-warning btn-lg mt-4">

            Pay Now

        </button>

    </div>

</div>

<script
src="https://app.sandbox.midtrans.com/snap/snap.js"
data-client-key="{{ config('midtrans.client_key') }}">
</script>

<script>

document
.getElementById('pay-button')
.onclick = function(){

    snap.pay('{{ $snapToken }}', {

        onSuccess: function(result){

            window.location.href =
                "{{ route('course.payment.success') }}";

        },

        onPending: function(result){

            alert('Waiting Payment');

        },

        onError: function(result){

            alert('Payment Failed');

        }

    });

};

</script>

@endsection