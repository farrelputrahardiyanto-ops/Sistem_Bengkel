@extends('layouts.admin.form')

@section('title', 'Create Car Model')

@section('content')


<div class="container my-5 rounded shadow">
    <div class="card border-0">
        <div class="card-head">
            <h1 class="h1 my-2 text-center">Create Car Model</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('carmodel.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-ggroup mb-3">
                    <label for="">Car Image</label>
                    <input type="file" name="img" class="form-control">
                </div>

                  <div class="form-group mb-3">
                <label for="">Car Brand</label>
                <select name="brand_id" id="" class="form-select">
                    @foreach ($brands as $brand )

                        <option value="{{ $brand->id}}"> {{$brand->name}}</option>
                        
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="">Car Type</label>
                <input type="text" name="name" class="form-control">
            </div>

            <div class="form-group mb-3">
                <label for="">Transmissiom</label>
                <select name="transmission" id="" class="form-select">
                    <option value="manual">Manual</option>
                    <option value="matic">Matic</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="">Tutor Car</label>
                <select name="is_tutor_car" id="" class="form-select">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
            </div>
        </div>

        <button class="btn btn-primary mb-3">Submit</button>
            </form>
          
    </div>
</div>


@endsection