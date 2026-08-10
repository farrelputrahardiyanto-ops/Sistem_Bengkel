@extends('layouts.user.user')

@section('title', 'SATRIA')

@section('style')

<link rel="stylesheet" href="{{ asset('css/style.css')}}">

<style>

:root{
    --primary:#f5c400;
    --dark:#111;
    --gray:#666;
    --light:#f7f7f7;
}

/* ================= HERO ================= */

.hero-section{
    min-height:100vh;
    background:
    linear-gradient(rgba(0,0,0,.72), rgba(0,0,0,.72)),
    url('{{ asset('images/dashboard.jpeg') }}');
    background-size:cover;
    background-position:center;
    display:flex;
    align-items:center;
    justify-content:center;
    text-align:center;
    padding:60px 20px;
    position:relative;
}

.hero-section::before{
    content:'';
    position:absolute;
    inset:0;
    background:linear-gradient(
        to bottom,
        rgba(0,0,0,.2),
        rgba(0,0,0,.6)
    );
}

.hero-content{
    position:relative;
    z-index:2;
    max-width:850px;
}

.hero-logo{
    width:100%;
    max-width:340px;
    filter:drop-shadow(0 10px 30px rgba(0,0,0,.35));
}

.hero-badge{
    display:inline-block;
    background:rgba(245,196,0,.15);
    color:var(--primary);
    border:1px solid rgba(245,196,0,.3);
    padding:10px 18px;
    border-radius:999px;
    font-size:14px;
    font-weight:600;
    margin-bottom:28px;
    backdrop-filter:blur(10px);
}

.hero-title{
    color:white;
    font-size:58px;
    font-weight:800;
    line-height:1.15;
    margin-top:35px;
    text-shadow:0 8px 20px rgba(0,0,0,.4);
}

.hero-subtitle{
    color:rgba(255,255,255,.8);
    font-size:17px;
    line-height:1.9;
    margin-top:22px;
}

.hero-btns{
    margin-top:35px;
    display:flex;
    justify-content:center;
    gap:16px;
    flex-wrap:wrap;
}

.btn-hero-primary{
    background:var(--primary);
    color:#000;
    padding:14px 28px;
    border-radius:16px;
    font-weight:700;
    text-decoration:none;
    transition:.25s;
}

.btn-hero-primary:hover{
    transform:translateY(-3px);
    box-shadow:0 14px 30px rgba(245,196,0,.35);
}

.btn-hero-outline{
    border:1px solid rgba(255,255,255,.2);
    color:white;
    padding:14px 28px;
    border-radius:16px;
    font-weight:600;
    text-decoration:none;
    backdrop-filter:blur(8px);
    transition:.25s;
}

.btn-hero-outline:hover{
    background:rgba(255,255,255,.08);
}

/* ================= SECTION ================= */

.main-section{
    padding:90px 0;
    background:white;
}

.section-header{
    text-align:center;
    margin-bottom:70px;
}

.section-header span{
    color:var(--primary);
    font-weight:700;
    letter-spacing:2px;
    font-size:13px;
}

.section-header h2{
    font-size:44px;
    font-weight:800;
    margin-top:14px;
    color:#111;
}

.section-header p{
    color:#777;
    max-width:700px;
    margin:auto;
    margin-top:18px;
    line-height:1.9;
}

/* ================= SERVICE CARD ================= */

.service-card{
    background:white;
    border-radius:30px;
    overflow:hidden;
    box-shadow:0 10px 35px rgba(0,0,0,.06);
    transition:.3s;
    height:100%;
    border:1px solid #eee;
}

.service-card:hover{
    transform:translateY(-8px);
    box-shadow:0 20px 50px rgba(0,0,0,.1);
}

.service-image-wrapper{
    background:#f7f7f7;
    height:260px;
    display:flex;
    align-items:center;
    justify-content:center;
    overflow:hidden;
}

.service-image{
    width:100%;
    height:100%;
    object-fit:cover;
}

.service-body{
    padding:35px;
    position:relative;
}

.service-number{
    position:absolute;
    top:25px;
    right:25px;
    font-size:55px;
    font-weight:900;
    color:#f1f1f1;
    line-height:1;
}

.service-title{
    font-size:34px;
    font-weight:800;
    color:#111;
    margin-bottom:18px;
}

.service-desc{
    color:#666;
    line-height:1.9;
    font-size:15px;
}

.service-btn{
    margin-top:28px;
    display:inline-flex;
    align-items:center;
    gap:10px;
    background:var(--primary);
    color:#000;
    text-decoration:none;
    padding:13px 24px;
    border-radius:14px;
    font-weight:700;
    transition:.25s;
}

.service-btn:hover{
    transform:translateY(-2px);
    box-shadow:0 10px 24px rgba(245,196,0,.3);
}

/* ================= MOBILE ================= */

@media(max-width:991px){

    .hero-title{
        font-size:46px;
    }

    .section-header h2{
        font-size:36px;
    }

    .service-title{
        font-size:28px;
    }

}

@media(max-width:767px){

    .hero-section{
        min-height:85vh;
    }

    .hero-logo{
        max-width:220px;
    }

    .hero-title{
        font-size:34px;
    }

    .hero-subtitle{
        font-size:15px;
    }

    .section-header h2{
        font-size:28px;
    }

    .service-body{
        padding:28px;
    }

    .service-title{
        font-size:24px;
    }

    .service-image-wrapper{
        height:220px;
    }

}

</style>

@endsection

@section('content')

{{-- HERO --}}
<section class="hero-section">

    <div class="hero-content">

        <span class="hero-badge">
            Bengkel • Sparepart • Sekolah Mengemudi
        </span>

        <div>
            <img src="{{ asset('images/logo.png') }}"
                 alt="Logo SATRIA"
                 class="hero-logo">
        </div>

        <h1 class="hero-title">
            Solusi Lengkap <br>
            Untuk Kendaraan Anda
        </h1>

        <p class="hero-subtitle">
            SATRIA hadir sebagai pusat layanan otomotif terpercaya mulai dari
            sparepart berkualitas, servis profesional, hingga program belajar
            mengemudi dengan instruktur berpengalaman.
        </p>

        <div class="hero-btns">

            <a href="{{ route('servis.car') }}"
               class="btn-hero-primary">

                Book Service

            </a>

            <a href="#layanan"
               class="btn-hero-outline">

                Jelajahi Layanan

            </a>

        </div>

    </div>

</section>

{{-- CONTENT --}}
<section class="main-section" id="layanan">

    <div class="container">

        <div class="section-header">

            <span>LAYANAN KAMI</span>

            <h2>
                Semua Kebutuhan Mobil <br>
                Dalam Satu Tempat
            </h2>

            <p>
                Kami menyediakan layanan otomotif terbaik dengan kualitas,
                kenyamanan, dan pelayanan profesional untuk memastikan
                kendaraan Anda selalu dalam kondisi optimal.
            </p>

        </div>

        <div class="row g-4">

            {{-- SPAREPART --}}
            <div class="col-lg-4">

                <div class="service-card">

                    <div class="service-image-wrapper">

                        <img src="{{ asset('images/dashboard-sparepart.png') }}"
                             class="service-image">

                    </div>

                    <div class="service-body">

                         
                        <h3 class="service-title">
                            Sparepart
                        </h3>

                        <p class="service-desc">
                            Menyediakan berbagai sparepart mobil berkualitas
                            mulai dari komponen mesin, rem, kaki-kaki,
                            hingga aksesoris kendaraan dengan harga terbaik.
                        </p>

                        <a href="{{ route('dashboard.sparepart.index') }}"
                           class="service-btn">

                            Lihat Produk →

                        </a>

                    </div>

                </div>

            </div>

            {{-- SERVICE --}}
            <div class="col-lg-4">

                <div class="service-card">

                    <div class="service-image-wrapper">

                        <img src="{{ asset('images/dashboard-servis.jpg') }}"
                             class="service-image">

                    </div>

                    <div class="service-body">

                        

                        <h3 class="service-title">
                            Servis Mobil
                        </h3>

                        <p class="service-desc">
                            Layanan servis profesional dengan teknisi
                            berpengalaman dan peralatan modern untuk menjaga
                            performa kendaraan tetap maksimal.
                        </p>

                        <a href="{{ route('dashboard.servis') }}"
                           class="service-btn">

                            Book Service →

                        </a>

                    </div>

                </div>

            </div>

            {{-- DRIVING --}}
            <div class="col-lg-4">

                <div class="service-card">

                    <div class="service-image-wrapper">

                        <img src="{{ asset('images/dashboard-driving-course.jpg') }}"
                             class="service-image">

                    </div>

                    <div class="service-body">

                        

                        <h3 class="service-title">
                            Belajar Mengemudi
                        </h3>

                        <p class="service-desc">
                            Program belajar mengemudi aman dan nyaman
                            bersama instruktur profesional, cocok untuk
                            pemula maupun meningkatkan skill berkendara.
                        </p>

                        <a href="{{ route('dashboard.driving-course') }}"
                           class="service-btn">

                            Mulai Belajar →

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection