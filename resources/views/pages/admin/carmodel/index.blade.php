@extends('layouts.admin.admin')

@section('title', 'Car Model')

@section('content')

<div class="container rounded shadow my-5">
    <div class="card border-0">
        <div class="card-head">
            <h1 class="h1 my-3 text-center">Car Model</h1>
        </div>
        <div class="card-body">
            <a href="{{ route('carmodel.create')}}" class="btn btn-primary my-2">Create</a>
    

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Brand ID</th>
                            <th>Img</th>
                            <th>Name</th>
                            <th>Transmission</th>
                            <th>Tutor Car</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $carmodels as $carmodel )
                        <tr>

                        <td>{{$carmodel->brand_id}}</td>
                        <td><img src="{{ asset('storage/' . $carmodel->img) }}" alt="{{ $carmodel->name }}" width="100"></td>
                        <td>{{$carmodel->name}}</td>
                        <td>{{$carmodel->transmission}}</td>
                        <td>{{$carmodel->is_tutor_car}}</td>
                        <td class="d-flex">
                            <a href="{{ route('carmodel.edit', $carmodel->id) }}" class="btn btn-sm btn-warning mx-1">Edit</a>

                            <form action="{{route('carmodel.destroy', $carmodel->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>

@endsection