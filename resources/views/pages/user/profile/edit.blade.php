@extends('layouts.user.user')

@section('title', 'Edit Profile')

@section('content')

<style>

    :root{
        --gold:#F5A623;
        --gold-dark:#d58d1c;
        --gray:#6c757d;
    }

    .profile-wrapper{
        max-width: 850px;
        margin:auto;
    }

    .profile-card{
        border:none;
        border-radius:28px;
        overflow:hidden;
        background:#fff;
        box-shadow:0 10px 40px rgba(0,0,0,0.08);
    }

    .profile-header{
        background:
            linear-gradient(rgba(0,0,0,.45), rgba(0,0,0,.45)),
            url('{{ asset("images/dashboard.jpeg") }}');
        background-size:cover;
        background-position:center;
        padding:60px 20px 90px;
        position:relative;
    }

    .profile-photo-wrapper{
        margin-top:-65px;
        position:relative;
        z-index:2;
    }

    .profile-photo{
        width:130px;
        height:130px;
        object-fit:cover;
        border-radius:50%;
        border:5px solid #fff;
        box-shadow:0 5px 20px rgba(0,0,0,0.15);
    }

    .edit-photo-btn{
        display:inline-block;
        margin-top:12px;
        font-size:14px;
        color:var(--gold-dark);
        font-weight:600;
        text-decoration:none;
        cursor:pointer;
    }

    .edit-photo-btn:hover{
        color:var(--gold);
    }

    .profile-body{
        padding:35px;
    }

    .form-label{
        font-weight:600;
        font-size:14px;
        margin-bottom:8px;
        color:#222;
    }

    .form-control{
        border-radius:14px;
        height:52px;
        border:1.5px solid #e5e5e5;
        padding:0 16px;
        transition:.2s;
    }

    .form-control:focus{
        border-color:var(--gold);
        box-shadow:0 0 0 4px rgba(245,166,35,.15);
    }

    .save-btn{
        height:52px;
        border:none;
        border-radius:16px;
        background:var(--gold);
        font-weight:700;
        padding:0 28px;
        transition:.2s;
    }

    .save-btn:hover{
        background:var(--gold-dark);
        transform:translateY(-2px);
    }

    .cancel-btn{
        height:52px;
        border-radius:16px;
        font-weight:600;
    }

    .section-title{
        font-size:24px;
        font-weight:800;
    }

    .section-subtitle{
        color:var(--gray);
        font-size:14px;
    }

    @media(max-width:768px){

        .profile-body{
            padding:24px;
        }

        .profile-header{
            padding:50px 20px 80px;
        }

        .profile-photo{
            width:110px;
            height:110px;
        }

        .section-title{
            font-size:20px;
        }

    }

</style>

<div class="container py-4 py-md-5">

    <div class="profile-wrapper">

        <div class="profile-card">

            {{-- HEADER --}}
            <div class="profile-header"></div>

            {{-- PHOTO --}}
            <div class="text-center profile-photo-wrapper">

                @if($user->profile_picture)

                    <img src="{{ asset('storage/user/' . $user->profile_picture) }}"
                         class="profile-photo">

                @else

                    <img src="{{ asset('images/default-profile.svg') }}"
                         class="profile-photo">

                @endif

                <br>

                <label for="photoInput" class="edit-photo-btn">
                    Edit photo
                </label>

            </div>

            {{-- BODY --}}
            <div class="profile-body">

                <div class="text-center mb-5">

                    <h2 class="section-title">
                        Edit Profile
                    </h2>

                    <p class="section-subtitle mb-0">
                        Update informasi akun kamu
                    </p>

                </div>

                <form action="{{ route('profile.update') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    {{-- hidden upload --}}
                    <input type="file"
                           name="profile_picture"
                           id="photoInput"
                           hidden>

                    <div class="row">

                        {{-- NAME --}}
                        <div class="col-md-6 mb-4">

                            <label class="form-label">
                                Full Name
                            </label>

                            <input type="text"
                                   name="name"
                                   value="{{ old('name', $user->name) }}"
                                   class="form-control">

                        </div>

                        {{-- EMAIL --}}
                        <div class="col-md-6 mb-4">

                            <label class="form-label">
                                Email Address
                            </label>

                            <input type="email"
                                   name="email"
                                   value="{{ old('email', $user->email) }}"
                                   class="form-control">

                        </div>

                        {{-- WA --}}
                        <div class="col-md-6 mb-4">

                            <label class="form-label">
                                WhatsApp Number
                            </label>

                            <input type="text"
                                   name="no_whatsapp"
                                   value="{{ old('no_whatsapp', $user->no_whatsapp) }}"
                                   class="form-control">

                        </div>


                    

                        {{-- PASSWORD --}}
                        <div class="col-md-6 mb-4">

                            <label class="form-label">
                                New Password
                            </label>

                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   placeholder="Leave blank if unchanged">

                        </div>

                        {{-- CONFIRM --}}
                        <div class="col-md-6 mb-4">

                            <label class="form-label">
                                Confirm Password
                            </label>

                            <input type="password"
                                   name="password_confirmation"
                                   class="form-control"
                                   placeholder="Repeat password">

                        </div>

                    </div>

                    {{-- BUTTON --}}
                    <div class="d-flex flex-column flex-md-row gap-3 mt-2">

                        <button class="btn save-btn text-dark">

                            Save Changes

                        </button>

                        <a href="{{ route('profile.show') }}"
                           class="btn btn-light cancel-btn">

                            Cancel

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection