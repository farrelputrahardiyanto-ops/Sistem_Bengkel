@extends('layouts.admin.form')
@section('title', 'Create Sparepart')
@section('content')

    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card rounded border-0 shadow">
                    <div class="card-head">
                        <div class="row">
                            <div class="col-md-3">
                                <a href="{{ url()->previous() }}" class="btn btn-secondary my-3 mx-4"><i class="bi bi-arrow-left"></i></a>
                            </div>
                            <div class="col-md-6">
                                <h2 class="text-center my-2">Sparepart</h2>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                    <div class="card-body  mx-3">

                        <form action="{{ route('sparepart.store')}}" method="post"  enctype="multipart/form-data">

                            @csrf

                            <div class="form-group mb-3">
                                <label for="" class="font-weight-bold">Image</label>
                                <input type="file" class="form-control" name="img"> 
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control">    
                            </div>  

                            <div class="form-group mb-3">
                                <label for="">Brand Spareparts</label>
                                <input type="text" name="brand_spareparts" class="form-control">    
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Brand Car</label>
                                <input type="text" name="brand_car" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Car Type</label>
                                <input type="text" name="car_type" class="form-control">
                            </div>

                            <div class="form-group  mb-3">
                                <label for="">Part Code</label>
                                <input type="text" name="part_code" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Price</label>
                                <input type="number" name="price" class="form-control">
                            </div>  

                            <div class="form-group mb-3">
                                <label for="">Stock</label>
                                <input type="number" name="stock" class="form-control">
                            </div>  

                            <div class="form-group mb-3">
                                <label for="">Description</label>
                                <textarea name="description" class="form-control" rows="4"></textarea>
                            </div>      

                            <div class="row">
                                <div class="col-md-12 d-flex align-items-center justify-center">
                                     <button class="btn btn-md btn-primary">Submit</button>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>  
        </div>
    </div>

    @endsection

    @if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <p style="color:red;">{{ $error }}</p>
        @endforeach
    </div>
    @endif

    