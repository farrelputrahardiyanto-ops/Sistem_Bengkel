@extends('layouts.user.user')

@section('title', 'Satria')

@section('content')

<div class="container-fluid " style="background-image:   linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),url({{ asset('images/dashboard.jpeg') }}); background-size: cover; height: 100vh; background-position: center; backdrop-filter: blur(10px);">
    <div class="row">
      <div class="col-md-12 d-flex align-items-center justify-content-center" >
        <img src="{{ asset('images/logo.png')}}" alt="" width="400" class=" mx-5 my-5">
        </div>
        <div class="col-md-12 d-flex align-items-center justify-content-center">
            <h1 class="text-white text-center my-5 " style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);">
                Welcome to Satria Auto Workshop
            </h1>
        </div> 
     </div>  
</div>


@endsection