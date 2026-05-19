@extends('layouts.user.user')

@section('title', 'Satria')

@section('style')

<link rel="stylesheet" href="{{ asset('css/style.css')}}">

<style>

.hero-section{
    min-height:100vh;
    background:
    linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)),
    url('{{ asset('images/dashboard.jpeg') }}');
    background-size:cover;
    background-position:center;
    display:flex;
    align-items:center;
    justify-content:center;
    text-align:center;
    padding:40px 20px;
}

.hero-logo{
    width:100%;
    max-width:350px;
}

.hero-title{
    color:white;
    font-weight:700;
    margin-top:30px;
    text-shadow:2px 2px 10px rgba(0,0,0,0.5);
}

.section-card{
    background:#f5f5f5;
    overflow:hidden;
}

.section-image{
    width:100%;
    height:100%;
    object-fit:cover;
    min-height:320px;
}

.section-content{
    padding:40px;
    position:relative;
    height:100%;
}

.section-title{
    font-size:40px;
    font-weight:700;
    color:#222;
}

.section-desc{
    color:#666;
    font-size:15px;
    line-height:1.8;
    margin-top:20px;
}

.section-btn{
    background:#f5c400;
    border:none;
    color:#000;
    font-weight:600;
    padding:10px 22px;
    font-size:13px;
    margin-top:20px;
}

.section-number{
    position:absolute;
    right:25px;
    bottom:10px;
    font-size:60px;
    font-weight:800;
    color:#999;
    opacity:0.5;
}

@media(max-width:991px){

    .section-title{
        font-size:32px;
    }

    .section-content{
        padding:30px;
    }

}

@media(max-width:767px){

    .hero-section{
        min-height:70vh;
    }

    .hero-logo{
        max-width:220px;
    }

    .hero-title{
        font-size:28px;
    }

    .section-image{
        min-height:250px;
    }

    .section-content{
        padding:25px;
    }

    .section-title{
        font-size:28px;
    }

    .section-desc{
        font-size:14px;
    }

    .section-number{
        font-size:45px;
    }

}

</style>

@endsection

@section('content')

<!-- HERO -->
<section class="hero-section">

    <div>

        <img src="{{ asset('images/logo.png')}}" 
            alt="Logo"
            class="hero-logo">

        <h1 class="hero-title">
            One Stop Solution For Your Car
        </h1>

    </div>

</section>

<!-- CONTENT -->
<section class="container py-5">

    <!-- SECTION 1 -->
    <div class="row g-0 section-card mb-5">

        <!-- IMAGE -->
        <div class="col-lg-5">
            <img src="{{ asset('images/dashboard-sparepart.png') }}"
                class="section-image">
        </div>

        <!-- CONTENT -->
        <div class="col-lg-7">

            <div class="section-content">

                <h2 class="section-title">
                    Spareparts
                </h2>

                <p class="section-desc">
                    Menyediakan berbagai sparepart mobil berkualitas 
                    untuk kebutuhan kendaraan Anda. Mulai dari 
                    komponen mesin, kaki-kaki, rem, hingga aksesoris 
                    kendaraan tersedia dengan kualitas terbaik dan 
                    harga terpercaya.
                </p>

                <a href="#" class="btn section-btn">
                    SEE PRODUCT
                </a>

                <div class="section-number">
                    01
                </div>

            </div>

        </div>

    </div>

    <!-- SECTION 2 -->
    <div class="row g-0 section-card mb-5 flex-lg-row-reverse">

        <!-- IMAGE -->
        <div class="col-lg-5">
            <img src=""
                class="section-image">
        </div>

        <!-- CONTENT -->
        <div class="col-lg-7">

            <div class="section-content">

                <h2 class="section-title">
                    Servis
                </h2>

                <p class="section-desc">
                    Layanan servis profesional untuk menjaga performa 
                    kendaraan tetap optimal. Dikerjakan oleh mekanik 
                    berpengalaman dengan peralatan modern dan proses 
                    pengerjaan yang cepat serta terpercaya.
                </p>

                <a href="#" class="btn section-btn">
                    BOOK SERVICE
                </a>

                <div class="section-number">
                    02
                </div>

            </div>

        </div>

    </div>

    <!-- SECTION 3 -->
    <div class="row g-0 section-card">

        <!-- IMAGE -->
        <div class="col-lg-5">
            <img src=""
                class="section-image">
        </div>

        <!-- CONTENT -->
        <div class="col-lg-7">

            <div class="section-content">

                <h2 class="section-title">
                    Belajar Mengemudi
                </h2>

                <p class="section-desc">
                    Program belajar mengemudi yang aman dan nyaman 
                    dengan instruktur berpengalaman. Cocok untuk 
                    pemula maupun yang ingin meningkatkan kemampuan 
                    berkendara dengan metode pembelajaran yang mudah 
                    dipahami.
                </p>

                <a href="#" class="btn section-btn">
                    START LEARNING
                </a>

                <div class="section-number">
                    03
                </div>

            </div>

        </div>

    </div>

</section>

@endsection