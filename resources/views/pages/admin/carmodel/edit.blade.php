@extends('layouts.admin.form')

@section('title', 'Edit Car Model')

@section('content')


<div class="container my-5 rounded shadow">
    <div class="card border-0">
        <div class="card-head">
            <h1 class="h1 my-2 text-center">Edit Car Model</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('carmodel.update', $carmodel->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-ggroup mb-3">
                    <label for="">Car Image</label>
                    <input type="file" name="img" class="form-control" >
                </div>

                  <div class="form-group mb-3">
                <label for="">Car Brand</label>
                <select name="brand_id" id="" class="form-select">
                    @foreach ($brands as $brand )

                       <option value="{{ $brand->id }}"
                            {{ $carmodel->brand_id == $brand->id ? 'selected' : '' }}>
                            {{ $brand->name }}
                        </option>
                        
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="">Car Type</label>
                <input type="text" name="name" class="form-control" value="{{ $carmodel->name }}">
            </div>

            <div class="form-group mb-3">
                <label for="">Car Year</label>
                <input type="number" name="model_year" class="form-control" value="{{ $carmodel->model_year }}">
            </div>

            <div class="form-group mb-3">
                <label for="">Transmissiom</label>
                <select name="transmission" id="" class="form-select">
                    <option value="manual" {{ $carmodel->transmission == 'manual' ? 'selected' : '' }}>Manual</option>
                    <option value="matic" {{ $carmodel->transmission == 'matic' ? 'selected' : '' }}>Matic</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="">Tutor Car</label>
                <select name="is_tutor_car" id="" class="form-select">
                    <option value="0" {{ $carmodel->is_tutor_car == 0 ? 'selected' : '' }}>No</option>
                    <option value="1" {{ $carmodel->is_tutor_car == 1 ? 'selected' : '' }}>Yes</option>
                </select>
            </div>
        </div>

        <button class="btn btn-primary mb-3">Submit</button>
            </form>
          
    </div>
</div>


@endsection