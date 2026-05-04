@extends('layouts.admin.form')

@section('title', 'Edit Driving Packages')

@section('content')

<div class="container my-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-head">
                    <h1 class="h1 text-center my-2">Edit Driving Package</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('drivingpackage.update', $drivingpackages->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="transmission_type">Transmission Type</label>
                            <select name="transmission_type" id="" class="form-select">
                                 <option value="manual" {{ $drivingpackages->transmission_type == 'manual' ? 'selected' : '' }}>
                                     Manual
                                </option>
                                <option value="matic" {{ $drivingpackages->transmission_type == 'matic' ? 'selected' : '' }}>
                                Matic
                                </option>
                            </select>
                                     @error('transmission_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="ac_type">AC Type</label>
                            <select name="ac_type" id="" class="form-select">
                                <option value="ac" {{ $drivingpackages->ac_type == 'ac' ? 'selected' : ''}}>AC</option>
                                <option value="non_ac"{{ $drivingpackages->ac_type == 'non_ac' ? 'selected' : ''}}>Non Ac</option>
                            </select>
                              @error('ac_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="total_hours">Total Hours</label>
                            <input type="number" class="form-control @error('total_hours') is-invalid @enderror" id="total_hours" name="total_hours" value="{{ $drivingpackages->total_hours }}" required>
                            @error('total_hours')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="price">Price</label>
                            <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ $drivingpackages->price }}" required>
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Create Package</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>