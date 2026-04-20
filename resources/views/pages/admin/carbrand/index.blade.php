@extends('layouts.admin.admin')

@section('title', 'Car Brand')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-head">
                    <h1 class="h1 text-center my-2 ">Car Brands</h1>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                         <a href="{{ route('carbrand.create')}}"  class="btn btn-md btn-primary my-2">Create</a>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cars as $car)
                            <tr>
                                <td>{{ $car->name }}</td>
                                <td>
                                    <a href="{{ route('carbrand.edit', $car->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('carbrand.destroy', $car->id) }}" method="POST" style="display: inline;">
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

    @endsection