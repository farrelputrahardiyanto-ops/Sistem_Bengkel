@extends('layouts.admin.form')
@section('title', 'Edit User')
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
                            <div class="col-md-12">
                                <h2 class="text-center my-2">User</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body  mx-3">

                        <form action="{{ route('user.update', $user->id)}}" method="post"  enctype="multipart/form-data">

                            @csrf
                            @method('PATCH')

                            <div class="form-group mb-3">
                                <label for="" class="font-weight-bold">Profile Picture</label>
                                <input type="file" class="form-control" name="profile_picture">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control " value="{{ $user->name}}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email}}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">No Whatsapp</label>
                                <input type="text" name="no_whatsapp" class="form-control" value="{{ $user->no_whatsapp}}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Role</label>
                                <select name="role" class="form-control">
                                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                                    <option value="tutor" {{ $user->role === 'tutor' ? 'selected' : '' }}>Tutor</option>
                                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" value="">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>

                            <div class="row">
                                <div class="col-md-4 ">          
                                </div>
                                <div class="col-md-4 d-flex align-items-center justify-center">
                                     <button class="btn btn-md btn-primary">Submit</button>
                                </div>
                                <div class="col-md-4 "></div>
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