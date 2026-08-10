@extends('layouts.admin.admin')

@section('title', 'Driving Packages')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-head">
                    <h1 class="h1 text-center my-2 ">Driving Packages</h1>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                         <a href="{{ route('drivingpackage.create')}}"  class="btn btn-md btn-primary my-2">Create</a>
                        <thead>
                            <tr>
                                <th>AC Type</th>
                                <th>Total Hours</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($drivingPackages as $package)
                            <tr>
                                <td>{{ $package->ac_type }}</td>
                                <td>{{ $package->total_hours }}</td>
                                <td>{{ $package->price }}</td>
                                <td>
                                    <a href="{{ route('drivingpackage.edit', $package->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('drivingpackage.destroy', $package->id) }}" method="POST" class="d-inline">
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