@extends('layouts.user.user')

@section('title', 'Driving Session')

@section('content')

<style>

.session-section{
    background:#f8f9fa;
    min-height:100vh;
    padding:60px 0;
}

.session-card{
    border:none;
    border-radius:28px;
    overflow:hidden;
}

.left-side{
    background:#111;
    color:white;
    padding:40px;
    height:100%;
}

.left-side h2{
    font-size:34px;
    font-weight:700;
}

.left-side p{
    opacity:.8;
    font-size:14px;
}

.info-box{
    background:rgba(255,255,255,.08);
    border-radius:18px;
    padding:18px;
    margin-top:18px;
}

.info-box small{
    color:#ffc107;
}

.form-side{
    padding:40px;
}

.form-title{
    font-size:32px;
    font-weight:700;
}

.form-label{
    font-weight:600;
    margin-bottom:8px;
}

.form-control{
    border-radius:14px;
    padding:12px;
    border:1px solid #ddd;
}

.form-control:focus{
    box-shadow:none;
    border-color:#ffc107;
}

.btn-submit{
    border-radius:14px;
    padding:14px;
    font-weight:600;
}

@media(max-width:768px){

    .session-section{
        padding:20px 0;
    }

    .left-side,
    .form-side{
        padding:24px;
    }

    .left-side h2,
    .form-title{
        font-size:26px;
    }

}

</style>

<div class="session-section">

    <div class="container">

        <div class="card shadow session-card">

            <div class="row g-0">

                {{-- LEFT --}}
                <div class="col-lg-4">

                    <div class="left-side">

                        <h2>
                            Driving Session
                        </h2>

                        <p class="mt-3">
                            Schedule your next driving lesson.
                        </p>

                        <div class="info-box">

                            <small>Package</small>

                            <h5>
                                {{ ucfirst($userPackage->package->transmission_type) }}
                            </h5>

                        </div>

                        <div class="info-box">

                            <small>Car</small>

                            <h5>
                                {{ $userPackage->car->name }}
                            </h5>

                        </div>

                        <div class="info-box">

                            <small>Instructor</small>

                            <h5>
                                {{ $userPackage->tutor->name }}
                            </h5>

                        </div>

                        <div class="info-box">

                            <small>Remaining Hours</small>

                            <h5>
                                {{ $userPackage->remaining_hours }} Hours
                            </h5>

                        </div>

                    </div>

                </div>

                {{-- RIGHT --}}
                <div class="col-lg-8">

                    <div class="form-side">

                        <h3 class="form-title mb-4">
                            Book Session
                        </h3>

                        <form action="{{ route('driving.session.store') }}"
                              method="POST">

                            @csrf

                            <input type="hidden"
                                   name="id_user_package"
                                   value="{{ $userPackage->id }}">

                            <div class="row">

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Session Date
                                    </label>

                                    <input type="date"
                                           name="schedule_date"
                                           class="form-control"
                                           required>

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Start Time
                                    </label>

                                    <input type="time"
                                        name="start_time"
                                        class="form-control"
                                        required>

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Use Hours
                                    </label>

                                    <input type="number"
                                           name="used_hours"
                                           class="form-control"
                                           required>

                                </div>


                                <div class="col-12 mt-3">

                                    <button class="btn btn-warning w-100 btn-submit">

                                        Create Session

                                    </button>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection