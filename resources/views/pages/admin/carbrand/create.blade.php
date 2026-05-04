@extends('layouts.admin.form')

@section('title', 'Create Car Brand')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-head">
                    <h1 class="h1 text-center my-2">Create Car Brand</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('carbrand.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-md btn-primary my-3">Save</button>
                        <a href="{{ route('carbrand.index') }}" class="btn btn-md btn-secondary">Back</a>
                    </form>
                </div>
            </div>


        </div>
    </div>  
</div>
@endsection