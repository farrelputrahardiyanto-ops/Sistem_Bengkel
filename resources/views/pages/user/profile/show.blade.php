@extends('layouts.user.user')

@section('title', 'My Profile')

@section('content')

<style>

    :root{
        --gold:#F5A623;
        --gold-dark:#d58d1c;
        --gray:#6c757d;
    }

    .profile-wrapper{
        max-width:850px;
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

    .profile-body{
        padding:35px;
    }

    .profile-name{
        font-size:28px;
        font-weight:800;
        margin-bottom:6px;
    }

    .profile-email{
        color:var(--gray);
        font-size:15px;
    }

    .info-card{
        background:#fafafa;
        border-radius:18px;
        padding:20px;
        height:100%;
        border:1px solid #f0f0f0;
        transition:.2s;
    }

    .info-card:hover{
        transform:translateY(-2px);
        box-shadow:0 6px 18px rgba(0,0,0,0.06);
    }

    .info-label{
        font-size:13px;
        color:#888;
        margin-bottom:6px;
    }

    .info-value{
        font-size:18px;
        font-weight:700;
        color:#111;
        margin-bottom:0;
        word-break:break-word;
    }

    .edit-btn{
        height:52px;
        border:none;
        border-radius:16px;
        background:var(--gold);
        font-weight:700;
        padding:0 28px;
        transition:.2s;
    }

    .edit-btn:hover{
        background:var(--gold-dark);
        transform:translateY(-2px);
    }

    .badge-role{
        display:inline-flex;
        align-items:center;
        gap:6px;
        padding:8px 14px;
        border-radius:999px;
        background:rgba(245,166,35,.12);
        color:var(--gold-dark);
        font-size:13px;
        font-weight:700;
        text-transform:capitalize;
    }

    .edit-profile-btn{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:10px;

    padding:14px 28px;

    border-radius:18px;

    background:linear-gradient(135deg, #F5A623, #e89a17);

    color:#111;
    text-decoration:none;

    font-weight:700;
    font-size:15px;

    transition:.25s ease;

    box-shadow:
        0 8px 20px rgba(245,166,35,.25),
        inset 0 1px 0 rgba(255,255,255,.35);
}

.edit-profile-btn i{
    font-size:16px;
    display:flex;
    align-items:center;
}

.edit-profile-btn:hover{
    transform:translateY(-3px);
    color:#111;

    box-shadow:
        0 14px 30px rgba(245,166,35,.35),
        inset 0 1px 0 rgba(255,255,255,.35);
}

.edit-profile-btn:active{
    transform:translateY(0);
}

@media(max-width:576px){

    .edit-profile-btn{
        width:100%;
    }

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

        .profile-name{
            font-size:22px;
        }

        .info-value{
            font-size:16px;
        }

    }

</style>

<div class="container py-4 py-md-5">

    <div class="profile-wrapper">

        @if(session('success'))

            <div class="alert alert-success rounded-4 border-0 shadow-sm mb-4">
                {{ session('success') }}
            </div>

        @endif

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

            </div>

            {{-- BODY --}}
            <div class="profile-body">

                {{-- NAME --}}
                <div class="text-center mb-5">

                    <h2 class="profile-name">
                        {{ $user->name }}
                    </h2>

                    <p class="profile-email mb-3">
                        {{ $user->email }}
                    </p>

                    <span class="badge-role">

                        <i class="bi bi-person-badge"></i>

                        {{ $user->role }}

                    </span>

                </div>

                {{-- INFO --}}
                <div class="row g-4 mb-5">

                    {{-- WA --}}
                    <div class="col-md-6">

                        <div class="info-card">

                            <p class="info-label">
                                WhatsApp Number
                            </p>

                            <h5 class="info-value">
                                {{ $user->no_whatsapp }}
                            </h5>

                        </div>

                    </div>

                    {{-- EMAIL --}}
                    <div class="col-md-6">

                        <div class="info-card">

                            <p class="info-label">
                                Email Address
                            </p>

                            <h5 class="info-value">
                                {{ $user->email }}
                            </h5>

                        </div>

                    </div>

                </div>

                {{-- BUTTON --}}
                <div class="text-center">

                    <a href="{{ route('profile.edit') }}"
                    class="edit-profile-btn">

                        <i class="bi bi-pencil-square"></i>

                        <span>Edit Profile</span>

                    </a>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection