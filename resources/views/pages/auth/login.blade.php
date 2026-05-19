<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Masuk</title>

    <!-- Logo -->
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">

    <style>

        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --gold: #F5A623;
            --gold-dark: #D4891A;
            --gold-glow: rgba(245,166,35,0.35);
            --dark-1: #0D0D0D;
            --dark-2: #161616;
            --dark-3: #1E1E1E;
            --dark-4: #2A2A2A;
            --text-muted: #888;
            --radius: 16px;
        }

        body {
            min-height: 100vh;
            font-family: 'DM Sans', sans-serif;
            background:
                linear-gradient(135deg, rgba(0,0,0,0.72) 0%, rgba(0,0,0,0.60) 100%),
                url('{{ asset("images/bg-login.jpg") }}') center/cover no-repeat fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 24px 16px;
        }

        /* ── CARD ── */
        .login-card {
            width: 100%;
            max-width: 980px;
            border-radius: 28px;
            overflow: hidden;
            background: #fff;
            box-shadow:
                0 0 0 1px rgba(255,255,255,0.06),
                0 32px 80px rgba(0,0,0,0.55),
                0 8px 24px rgba(0,0,0,0.3);
            animation: cardIn 0.55s cubic-bezier(.22,.68,0,1.2) both;
        }

        @keyframes cardIn {
            from { opacity: 0; transform: translateY(28px) scale(0.97); }
            to   { opacity: 1; transform: translateY(0)   scale(1); }
        }

        /* ── LEFT PANEL ── */
        .login-left {
            position: relative;
            background: var(--dark-1);
            color: #fff;
            padding: 56px 44px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            overflow: hidden;
        }

        /* decorative blobs */
        .login-left::before,
        .login-left::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
        }
        .login-left::before {
            width: 320px; height: 320px;
            background: radial-gradient(circle, rgba(245,166,35,0.14) 0%, transparent 70%);
            top: -60px; left: -60px;
        }
        .login-left::after {
            width: 200px; height: 200px;
            background: radial-gradient(circle, rgba(245,166,35,0.10) 0%, transparent 70%);
            bottom: -40px; right: -40px;
        }

        /* thin gold line accent */
        .login-left .accent-line {
            width: 48px;
            height: 3px;
            border-radius: 99px;
            background: var(--gold);
            margin: 18px auto 0;
        }

        .brand-logo {
            width: 96px;
            height: 96px;
            object-fit: contain;
            margin-bottom: 24px;
            filter: drop-shadow(0 4px 18px rgba(245,166,35,0.45));
            animation: logoPulse 3.5s ease-in-out infinite;
        }

        @keyframes logoPulse {
            0%, 100% { filter: drop-shadow(0 4px 18px rgba(245,166,35,0.40)); }
            50%       { filter: drop-shadow(0 4px 30px rgba(245,166,35,0.75)); }
        }

        .brand-title {
            font-family: 'Sora', sans-serif;
            font-size: 1.75rem;
            font-weight: 800;
            letter-spacing: -0.5px;
            line-height: 1.2;
        }

        .brand-desc {
            color: var(--text-muted);
            font-size: 14px;
            line-height: 1.7;
            margin-top: 14px;
            max-width: 260px;
        }

        /* pill badges */
        .feature-pills {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 32px;
            align-items: flex-start;
            width: 100%;
            max-width: 260px;
        }

        .feature-pill {
            display: flex;
            align-items: center;
            gap: 10px;
            background: var(--dark-3);
            border: 1px solid var(--dark-4);
            border-radius: 50px;
            padding: 8px 16px;
            font-size: 13px;
            color: #ccc;
            width: 100%;
        }

        .feature-pill i {
            color: var(--gold);
            font-size: 14px;
            flex-shrink: 0;
        }

        /* ── RIGHT PANEL ── */
        .login-right {
            padding: 56px 52px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-eyebrow {
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 8px;
        }

        .login-title {
            font-family: 'Sora', sans-serif;
            font-weight: 800;
            font-size: 2rem;
            letter-spacing: -0.5px;
            color: #111;
            margin-bottom: 8px;
        }

        .login-subtitle {
            color: #888;
            font-size: 14.5px;
            margin-bottom: 36px;
        }

        /* form labels */
        .form-label {
            font-size: 13px;
            font-weight: 600;
            color: #333;
            margin-bottom: 7px;
        }

        /* input group */
        .input-group {
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            transition: box-shadow 0.25s;
        }

        .input-group:focus-within {
            box-shadow: 0 0 0 3px var(--gold-glow);
        }

        .input-group-text {
            background: #f7f7f7;
            border: 1.5px solid #e8e8e8;
            border-right: none;
            border-radius: var(--radius) 0 0 var(--radius) !important;
            padding: 0 16px;
            color: #888;
            font-size: 16px;
        }

        .form-control {
            height: 52px;
            border: 1.5px solid #e8e8e8;
            border-left: none;
            border-radius: 0 var(--radius) var(--radius) 0 !important;
            font-family: 'DM Sans', sans-serif;
            font-size: 14.5px;
            color: #222;
            background: #fff;
            transition: border-color 0.2s, background 0.2s;
            padding-left: 4px;
        }

        .form-control:focus {
            border-color: var(--gold);
            background: #fffdf7;
            box-shadow: none;
            outline: none;
        }

        .form-control::placeholder {
            color: #bbb;
        }

        /* password toggle */
        .pass-toggle {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            padding: 0;
            color: #aaa;
            cursor: pointer;
            font-size: 17px;
            line-height: 1;
            z-index: 10;
            transition: color 0.2s;
        }
        .pass-toggle:hover { color: var(--gold); }

        .pass-wrapper {
            position: relative;
        }
        .pass-wrapper .form-control {
            padding-right: 44px;
        }

        /* submit button */
        .btn-login {
            height: 52px;
            border-radius: var(--radius);
            background: var(--gold);
            border: none;
            font-family: 'Sora', sans-serif;
            font-weight: 700;
            font-size: 15px;
            color: #111;
            letter-spacing: 0.3px;
            transition: background 0.25s, transform 0.2s, box-shadow 0.25s;
            position: relative;
            overflow: hidden;
        }

        .btn-login::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.18) 0%, transparent 60%);
            pointer-events: none;
        }

        .btn-login:hover {
            background: var(--gold-dark);
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(245,166,35,0.45);
        }

        .btn-login:active {
            transform: translateY(0);
            box-shadow: none;
        }

        /* divider */
        .divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 24px 0;
            color: #ccc;
            font-size: 12px;
        }
        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #eee;
        }

        /* register */
        .register-link {
            color: var(--gold-dark);
            font-weight: 700;
            text-decoration: none;
            transition: color 0.2s;
        }
        .register-link:hover { color: var(--gold); text-decoration: underline; }

        /* alert */
        .alert-float {
            position: fixed;
            top: 24px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 9999;
            min-width: 320px;
            border-radius: 14px;
            box-shadow: 0 8px 28px rgba(0,0,0,0.18);
            animation: slideDown 0.4s ease both;
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateX(-50%) translateY(-20px); }
            to   { opacity: 1; transform: translateX(-50%) translateY(0); }
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 991px) {
            .login-right {
                padding: 44px 36px;
            }
        }

        @media (max-width: 767px) {
            .login-card {
                border-radius: 20px;
            }
            .login-right {
                padding: 36px 24px;
            }
            .login-title {
                font-size: 1.65rem;
            }
        }

        @media (max-width: 400px) {
            .login-right {
                padding: 30px 18px;
            }
        }

    </style>

</head>

<body>

    <div class="container-fluid px-3">
        <div class="row justify-content-center">
            <div class="col-12" style="max-width:980px;">

                <div class="row login-card g-0">

                    <!-- ─── LEFT ─── -->
                    <div class="col-lg-5 d-none d-lg-flex login-left">

                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="brand-logo">

                        <h1 class="brand-title">AutoParts<br>Premium</h1>
                        <div class="accent-line"></div>

                        <p class="brand-desc">
                            Marketplace sparepart premium untuk para pecinta otomotif.
                            Temukan suku cadang berkualitas tinggi dengan mudah dan cepat.
                        </p>

                        <div class="feature-pills">
                            <div class="feature-pill">
                                <i class="bi bi-shield-check"></i>
                                Suku Cadang Terjamin Original
                            </div>
                            <div class="feature-pill">
                                <i class="bi bi-truck"></i>
                                Pengiriman Cepat & Terlacak
                            </div>
                            <div class="feature-pill">
                                <i class="bi bi-star-half"></i>
                                Dipercaya 10.000+ Pembeli
                            </div>
                        </div>

                    </div>

                    <!-- ─── RIGHT ─── -->
                    <div class="col-lg-7 bg-white">

                        <div class="login-right">

                            
                            <h2 class="login-title">Selamat Datang Kembali 👋</h2>
                            <p class="login-subtitle">Masuk untuk mengakses akun dan pesanan kamu.</p>

                            <form action="{{ route('login.post') }}" method="POST">

                                @csrf

                                <!-- EMAIL -->
                                <div class="mb-3">
                                    <label class="form-label">Alamat Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-envelope"></i>
                                        </span>
                                        <input type="email"
                                            class="form-control"
                                            name="email"
                                            placeholder="kamu@email.com"
                                            required>
                                    </div>
                                </div>

                                <!-- PASSWORD -->
                                <div class="mb-4">
                                    <label class="form-label">Kata Sandi</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-lock"></i>
                                        </span>
                                        <div class="pass-wrapper flex-grow-1 d-flex">
                                            <input type="password"
                                                id="passwordInput"
                                                class="form-control"
                                                name="password"
                                                placeholder="Masukkan kata sandi"
                                                required>
                                            <button type="button" class="pass-toggle" id="togglePass" tabindex="-1">
                                                <i class="bi bi-eye-slash" id="toggleIcon"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- SUBMIT -->
                                <button type="submit" class="btn btn-login w-100 mt-1">
                                    Masuk &nbsp;<i class="bi bi-arrow-right-short fs-5 align-middle"></i>
                                </button>

                            </form>

                            <div class="divider">atau</div>

                            <!-- REGISTER -->
                            <div class="text-center">
                                <small style="color:#888;">
                                    Belum punya akun?
                                    <a href="{{ route('register') }}" class="register-link">Register</a>
                                </small>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- FLASH ERROR -->
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show alert-float" role="alert">
            <i class="bi bi-exclamation-circle me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>

    <script>
        // Password visibility toggle
        const togglePass = document.getElementById('togglePass');
        const passwordInput = document.getElementById('passwordInput');
        const toggleIcon = document.getElementById('toggleIcon');

        togglePass.addEventListener('click', () => {
            const isPassword = passwordInput.type === 'password';
            passwordInput.type = isPassword ? 'text' : 'password';
            toggleIcon.className = isPassword ? 'bi bi-eye' : 'bi bi-eye-slash';
        });
    </script>

</body>
</html>