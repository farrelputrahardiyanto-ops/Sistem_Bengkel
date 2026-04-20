@extends('layouts.admin.admin')

@section('title', 'Spareparts')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-head">
                    <h1 class="h1 text-center my-2 ">Spareparts</h1>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                         <a href="{{ route('sparepart.create')}}"  class="btn btn-md btn-primary my-2">Create</a>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Brand Spareparts</th>
                                <th>Brand Car</th>
                                <th>Car Type</th>
                                <th>Part Code</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($spareparts as $sparepart)
                            <tr>
                                <td>{{ $sparepart->name }}</td>
                                <td>{{ $sparepart->brand_spareparts }}</td>
                                <td>{{ $sparepart->brand_car }}</td>
                                <td>{{ $sparepart->car_type }}</td>
                                <td>{{ $sparepart->part_code }}</td>
                                <td>{{ $sparepart->price }}</td>
                                <td>{{ $sparepart->stock }}</td>
                                <td>{{ $sparepart->description }}</td>
                                <td><img src="{{ Storage::url('sparepart/'.$sparepart->img) }}" alt="{{ $sparepart->name }}" width="100"></td>
                                <td>
                                    <a href="{{ route('sparepart.edit', $sparepart->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('sparepart.destroy', $sparepart->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection