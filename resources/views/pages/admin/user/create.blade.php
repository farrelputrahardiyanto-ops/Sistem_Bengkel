@extends('layouts.admin.form')

@section('title', 'Create User')




@section('content')


@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
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
                                <h2 class="text-center my-2">User</h2>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                    <div class="card-body  mx-3">

                        <form action="{{ route('user.store')}}" method="POST"  enctype="multipart/form-data">

                            @csrf

                            <div class="form-group mb-3">
                                <label for="" class="font-weight-bold">Profile Picture</label>
                                <input type="file" class="form-control" name="profile_picture">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">No Whatsapp</label>
                                <input type="text" name="no_whatsapp" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Role</label>
                                <select name="role" class="form-control">
                                    <option value="user">User</option>
                                    <option value="tutor">Tutor</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control">
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

    @if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <p style="color:red;">{{ $error }}</p>
        @endforeach
    </div>
@endif

@endsection