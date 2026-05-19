@extends('layouts.user.user')

@section('title', 'Payment')

@section('content')

<div class="container py-5 text-center">

    <h3 class="fw-bold mb-4">
        Complete Your Payment
    </h3>

    <button id="pay-button"
            class="btn btn-warning px-5 py-3 rounded-4">

        Pay Now

    </button>

</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}">
</script>

<script>

document.getElementById('pay-button').onclick = function () {

    snap.pay('{{ $snapToken }}', {

        onSuccess: function(result){

            window.location.href = "/cart";
        },

        onPending: function(result){

            window.location.href = "/cart";
        },

        onError: function(result){

            alert('Payment Failed');
        }
    });
};

</script>

@endsection