@extends('layouts.admin.admin')

@section('title', 'User')

@section('content')
<div class="container my-5 rounded shadow">
        <div class="card border-0">
            <div class="card-head border-0">
                <h1 class="h1 text-center my-2">
                    Data Users
                </h1>
            </div>
            <div class="card-body">
                <a href="{{ route('user.create')}}"  class="btn btn-md btn-primary my-2">Create</a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Profile Picture</th>
                            <th>Email</th>
                            <th>No Whatsapp</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user )
                            <tr>
                                <td>{{ $user->id}}</td>
                                <td>{{ $user->name}}</td>
                                 <td>   <img src="{{ asset('storage/user/'. $user->profile_picture) }}" style="width: 30px; height: 30px" alt="profile picture" class="rounded">  </td>
                                <td>{{ $user->email}}</td>
                                <td>{{ $user->no_whatsapp}}</td>
                                <td>{{ $user->role}}</td>
                                <td class="d-flex">
                                     <form action="{{ route('user.destroy', $user->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
    
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin mau hapus?')">
                                            Delete
                                        </button>
                                    </form>
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-warning mx-2">Edit</a>
                                    <a href="{{ route('user.show', $user->id) }}" class="btn btn-sm btn-secondary">Show</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection