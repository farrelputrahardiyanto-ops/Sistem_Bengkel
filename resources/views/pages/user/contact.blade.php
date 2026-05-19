@extends('layouts.user.user')

@section('title', 'Contact')

@section('content')

<div class="container py-4 py-md-5">

    <!-- Header -->
    <div class="text-center mb-4 mb-md-5">
        <h1 class="fw-bold display-6 display-md-5">
            Satria Bengkel & Sekolah Setir <br>
        </h1>

        <p class="text-muted px-2">
            Hubungi kami untuk informasi lebih lanjut.
        </p>
    </div>

    <!-- Address + Maps -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 mb-md-5">

        <!-- Address -->
        <div class="p-3 p-md-4 border-bottom">

            <h4 class="fw-bold mb-3 fs-5 fs-md-4">
                <i class="bi bi-geo-alt-fill text-danger me-2"></i>
                Alamat
            </h4>

            <p class="text-muted mb-0 small small-md-normal">
                Bengkel Mobil & Sekolah Setir Satria <br>
                Jl. Contoh Alamat No. 123, Semarang, Jawa Tengah, Indonesia
            </p>

        </div>

        <!-- Google Maps -->
        <div class="w-100">

            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.8934948324377!2d110.33321877475801!3d-7.021803992979864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708bcfa484ffab%3A0x8fae49eace9db630!2sBENGKEL%20MOBIL%20%26%20SEKOLAH%20SETIR%20SATRIA!5e0!3m2!1sen!2sid!4v1778566589981!5m2!1sen!2sid"
                width="100%"
                height="450"
                style="border:0;"
                class="d-block"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>

        </div>

    </div>

    <!-- Social Media + Contact -->
    <div class="row g-4">

        <!-- Social Media -->
        <div class="col-12 col-md-6">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body p-3 p-md-4">

                    <h4 class="fw-bold mb-4 fs-5 fs-md-4">
                        <i class="bi bi-share-fill me-2"></i>
                        Social Media
                    </h4>

                    <div class="d-flex flex-column gap-3">

                        <a href="https://instagram.com"
                            target="_blank"
                            class="text-decoration-none text-dark d-flex align-items-center">

                            <i class="bi bi-instagram text-danger me-3 fs-5"></i>

                            <span class="small fs-md-6">
                                Instagram
                            </span>

                        </a>

                        <a href="https://facebook.com"
                            target="_blank"
                            class="text-decoration-none text-dark d-flex align-items-center">

                            <i class="bi bi-facebook text-primary me-3 fs-5"></i>

                            <span class="small fs-md-6">
                                Facebook
                            </span>

                        </a>

                        <a href="https://twitter.com"
                            target="_blank"
                            class="text-decoration-none text-dark d-flex align-items-center">

                            <i class="bi bi-twitter-x me-3 fs-5"></i>

                            <span class="small fs-md-6">
                                Twitter / X
                            </span>

                        </a>

                        <a href="https://youtube.com"
                            target="_blank"
                            class="text-decoration-none text-dark d-flex align-items-center">

                            <i class="bi bi-youtube text-danger me-3 fs-5"></i>

                            <span class="small fs-md-6">
                                YouTube
                            </span>

                        </a>

                    </div>

                </div>

            </div>

        </div>

        <!-- Contact -->
        <div class="col-12 col-md-6">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body p-3 p-md-4">

                    <h4 class="fw-bold mb-4 fs-5 fs-md-4">
                        <i class="bi bi-telephone-fill text-success me-2"></i>
                        Contact
                    </h4>

                    <div class="mb-3">

                        <h6 class="fw-semibold small text-uppercase">
                            Phone
                        </h6>

                        <p class="text-muted mb-0 small fs-md-6">
                            +62 812-3456-7890
                        </p>

                    </div>

                    <div class="mb-3">

                        <h6 class="fw-semibold small text-uppercase">
                            Email
                        </h6>

                        <p class="text-muted mb-0 small fs-md-6">
                            project@email.com
                        </p>

                    </div>

                    <div>

                        <h6 class="fw-semibold small text-uppercase">
                            Jam Operasional
                        </h6>

                        <p class="text-muted mb-0 small fs-md-6">
                            Senin - Sabtu <br>
                            08:00 - 17:00 WIB
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection