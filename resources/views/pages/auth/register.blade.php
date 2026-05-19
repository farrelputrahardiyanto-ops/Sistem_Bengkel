<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Daftar</title>

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
            --danger: #e53e3e;
            --danger-bg: #fff5f5;
            --success: #38a169;
            --success-bg: #f0fff4;
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
        .register-card {
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
        .register-left {
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

        .register-left::before,
        .register-left::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
        }
        .register-left::before {
            width: 320px; height: 320px;
            background: radial-gradient(circle, rgba(245,166,35,0.14) 0%, transparent 70%);
            top: -60px; left: -60px;
        }
        .register-left::after {
            width: 200px; height: 200px;
            background: radial-gradient(circle, rgba(245,166,35,0.10) 0%, transparent 70%);
            bottom: -40px; right: -40px;
        }

        .register-left .accent-line {
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

        .steps-list {
            display: flex;
            flex-direction: column;
            gap: 16px;
            margin-top: 32px;
            width: 100%;
            max-width: 260px;
            text-align: left;
        }

        .step-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .step-num {
            width: 26px;
            height: 26px;
            min-width: 26px;
            border-radius: 50%;
            background: var(--gold);
            color: #111;
            font-family: 'Sora', sans-serif;
            font-size: 12px;
            font-weight: 800;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 1px;
        }

        .step-text {
            font-size: 13px;
            color: #bbb;
            line-height: 1.5;
        }

        .step-text strong {
            display: block;
            color: #eee;
            font-weight: 600;
            margin-bottom: 2px;
        }

        /* ── RIGHT PANEL ── */
        .register-right {
            padding: 44px 52px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .register-eyebrow {
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 8px;
        }

        .register-title {
            font-family: 'Sora', sans-serif;
            font-weight: 800;
            font-size: 1.85rem;
            letter-spacing: -0.5px;
            color: #111;
            margin-bottom: 6px;
        }

        .register-subtitle {
            color: #888;
            font-size: 14px;
            margin-bottom: 28px;
        }

        /* form labels */
        .form-label {
            font-size: 13px;
            font-weight: 600;
            color: #333;
            margin-bottom: 6px;
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
            height: 50px;
            border: 1.5px solid #e8e8e8;
            border-left: none;
            border-radius: 0 var(--radius) var(--radius) 0 !important;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
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

        /* invalid state */
        .form-control.is-invalid {
            border-color: var(--danger) !important;
            background: var(--danger-bg);
        }

        .form-control.is-valid {
            border-color: var(--success) !important;
            background: var(--success-bg);
        }

        .invalid-feedback {
            font-size: 12px;
            color: var(--danger);
            margin-top: 5px;
            display: none;
        }

        .invalid-feedback.show {
            display: block;
        }

        /* input-group invalid border sync */
        .input-group.is-invalid .input-group-text {
            border-color: var(--danger);
        }
        .input-group.is-invalid .form-control {
            border-color: var(--danger) !important;
            background: var(--danger-bg);
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

        /* strength bar */
        .strength-bar {
            height: 4px;
            border-radius: 99px;
            background: #eee;
            margin-top: 8px;
            overflow: hidden;
        }
        .strength-bar-fill {
            height: 100%;
            border-radius: 99px;
            width: 0%;
            transition: width 0.3s, background 0.3s;
        }
        .strength-label {
            font-size: 11px;
            margin-top: 4px;
            color: #aaa;
        }

        /* submit button */
        .btn-register {
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

        .btn-register::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.18) 0%, transparent 60%);
            pointer-events: none;
        }

        .btn-register:hover {
            background: var(--gold-dark);
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(245,166,35,0.45);
        }

        .btn-register:active {
            transform: translateY(0);
            box-shadow: none;
        }

        /* divider */
        .divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 20px 0;
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

        /* login link */
        .login-link {
            color: var(--gold-dark);
            font-weight: 700;
            text-decoration: none;
            transition: color 0.2s;
        }
        .login-link:hover { color: var(--gold); text-decoration: underline; }

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

        /* Laravel validation errors */
        .laravel-error {
            font-size: 12px;
            color: var(--danger);
            margin-top: 5px;
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 991px) {
            .register-right {
                padding: 40px 36px;
            }
        }

        @media (max-width: 767px) {
            .register-card {
                border-radius: 20px;
            }
            .register-right {
                padding: 32px 24px;
            }
            .register-title {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 400px) {
            .register-right {
                padding: 26px 18px;
            }
        }

    </style>

</head>

<body>

    <div class="container-fluid px-3">
        <div class="row justify-content-center">
            <div class="col-12" style="max-width:980px;">

                <div class="row register-card g-0">

                    <!-- ─── LEFT ─── -->
                    <div class="col-lg-5 d-none d-lg-flex register-left">

                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="brand-logo">

                        <h1 class="brand-title">AutoParts<br>Premium</h1>
                        <div class="accent-line"></div>

                        <p class="brand-desc">
                            Bergabunglah dan nikmati kemudahan belanja sparepart otomotif berkualitas.
                        </p>

                        <div class="steps-list">
                            <div class="step-item">
                                <div class="step-num">1</div>
                                <div class="step-text">
                                    <strong>Buat Akun</strong>
                                    Isi data diri kamu dengan lengkap
                                </div>
                            </div>
                            <div class="step-item">
                                <div class="step-num">2</div>
                                <div class="step-text">
                                    <strong>Jelajahi Produk</strong>
                                    Temukan ribuan sparepart pilihan
                                </div>
                            </div>
                            <div class="step-item">
                                <div class="step-num">3</div>
                                <div class="step-text">
                                    <strong>Pesan & Nikmati</strong>
                                    Pengiriman cepat ke seluruh Indonesia
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- ─── RIGHT ─── -->
                    <div class="col-lg-7 bg-white">

                        <div class="register-right">

                            <p class="register-eyebrow">Daftar Sekarang</p>
                            <h2 class="register-title">Buat Akun Baru ✨</h2>
                            <p class="register-subtitle">Gratis selamanya. Daftar hanya butuh 1 menit.</p>

                            <form action="{{ route('register.post') }}" method="POST" id="registerForm" novalidate>

                                @csrf

                                <!-- NAMA -->
                                <div class="mb-3">
                                    <label class="form-label">Nama Lengkap</label>
                                    <div class="input-group {{ $errors->has('name') ? 'is-invalid' : '' }}">
                                        <span class="input-group-text">
                                            <i class="bi bi-person"></i>
                                        </span>
                                        <input type="text"
                                            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                            name="name"
                                            value="{{ old('name') }}"
                                            placeholder="Nama lengkap kamu"
                                            maxlength="100"
                                            required>
                                    </div>
                                    @error('name')
                                        <div class="laravel-error"><i class="bi bi-exclamation-circle me-1"></i>{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- EMAIL -->
                                <div class="mb-3">
                                    <label class="form-label">Alamat Email</label>
                                    <div class="input-group {{ $errors->has('email') ? 'is-invalid' : '' }}">
                                        <span class="input-group-text">
                                            <i class="bi bi-envelope"></i>
                                        </span>
                                        <input type="email"
                                            class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                            name="email"
                                            value="{{ old('email') }}"
                                            placeholder="kamu@email.com"
                                            required>
                                    </div>
                                    @error('email')
                                        <div class="laravel-error"><i class="bi bi-exclamation-circle me-1"></i>{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- NO WHATSAPP -->
                                <div class="mb-3">
                                    <label class="form-label">Nomor WhatsApp</label>
                                    <div class="input-group {{ $errors->has('no_whatsapp') ? 'is-invalid' : '' }}">
                                        <span class="input-group-text">
                                            <i class="bi bi-whatsapp"></i>
                                        </span>
                                        <input type="tel"
                                            class="form-control {{ $errors->has('no_whatsapp') ? 'is-invalid' : '' }}"
                                            name="no_whatsapp"
                                            value="{{ old('no_whatsapp') }}"
                                            placeholder="08xxxxxxxxxx"
                                            maxlength="20"
                                            required>
                                    </div>
                                    @error('no_whatsapp')
                                        <div class="laravel-error"><i class="bi bi-exclamation-circle me-1"></i>{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- PASSWORD -->
                                <div class="mb-3">
                                    <label class="form-label">Kata Sandi</label>
                                    <div class="input-group {{ $errors->has('password') ? 'is-invalid' : '' }}">
                                        <span class="input-group-text">
                                            <i class="bi bi-lock"></i>
                                        </span>
                                        <div class="pass-wrapper flex-grow-1 d-flex">
                                            <input type="password"
                                                id="passwordInput"
                                                class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                                name="password"
                                                placeholder="Minimal 8 karakter"
                                                required>
                                            <button type="button" class="pass-toggle" id="togglePass" tabindex="-1">
                                                <i class="bi bi-eye-slash" id="toggleIcon"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- strength indicator -->
                                    <div class="strength-bar">
                                        <div class="strength-bar-fill" id="strengthFill"></div>
                                    </div>
                                    <div class="strength-label" id="strengthLabel"></div>
                                    @error('password')
                                        <div class="laravel-error"><i class="bi bi-exclamation-circle me-1"></i>{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- KONFIRMASI PASSWORD -->
                                <div class="mb-4">
                                    <label class="form-label">Konfirmasi Kata Sandi</label>
                                    <div class="input-group" id="confirmGroup">
                                        <span class="input-group-text">
                                            <i class="bi bi-lock-fill"></i>
                                        </span>
                                        <div class="pass-wrapper flex-grow-1 d-flex">
                                            <input type="password"
                                                id="passwordConfirm"
                                                class="form-control"
                                                name="password_confirmation"
                                                placeholder="Ulangi kata sandi"
                                                required>
                                            <button type="button" class="pass-toggle" id="toggleConfirm" tabindex="-1">
                                                <i class="bi bi-eye-slash" id="toggleConfirmIcon"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback" id="confirmError">
                                        <i class="bi bi-exclamation-circle me-1"></i>Kata sandi tidak cocok.
                                    </div>
                                </div>

                                <!-- SUBMIT -->
                                <button type="submit" class="btn btn-register w-100" id="submitBtn">
                                    Buat Akun &nbsp;<i class="bi bi-arrow-right-short fs-5 align-middle"></i>
                                </button>

                            </form>

                            <div class="divider">atau</div>

                            <div class="text-center">
                                <small style="color:#888;">
                                    Sudah punya akun?
                                    <a href="{{ route('login') }}" class="login-link">Masuk di sini</a>
                                </small>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <!-- FLASH ERROR -->
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show alert-float" role="alert">
            <i class="bi bi-exclamation-circle me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show alert-float" role="alert">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>

    <script>

        // ── Password show/hide: password ──
        const togglePass    = document.getElementById('togglePass');
        const passwordInput = document.getElementById('passwordInput');
        const toggleIcon    = document.getElementById('toggleIcon');

        togglePass.addEventListener('click', () => {
            const isPass = passwordInput.type === 'password';
            passwordInput.type = isPass ? 'text' : 'password';
            toggleIcon.className = isPass ? 'bi bi-eye' : 'bi bi-eye-slash';
        });

        // ── Password show/hide: confirm ──
        const toggleConfirm     = document.getElementById('toggleConfirm');
        const passwordConfirm   = document.getElementById('passwordConfirm');
        const toggleConfirmIcon = document.getElementById('toggleConfirmIcon');

        toggleConfirm.addEventListener('click', () => {
            const isPass = passwordConfirm.type === 'password';
            passwordConfirm.type = isPass ? 'text' : 'password';
            toggleConfirmIcon.className = isPass ? 'bi bi-eye' : 'bi bi-eye-slash';
        });

        // ── Password strength ──
        const strengthFill  = document.getElementById('strengthFill');
        const strengthLabel = document.getElementById('strengthLabel');

        passwordInput.addEventListener('input', () => {
            const val = passwordInput.value;
            let score = 0;
            if (val.length >= 8)              score++;
            if (/[A-Z]/.test(val))            score++;
            if (/[0-9]/.test(val))            score++;
            if (/[^A-Za-z0-9]/.test(val))     score++;

            const levels = [
                { pct: '0%',   color: '#eee',       label: '' },
                { pct: '25%',  color: '#e53e3e',     label: 'Lemah' },
                { pct: '50%',  color: '#dd6b20',     label: 'Cukup' },
                { pct: '75%',  color: '#d69e2e',     label: 'Kuat' },
                { pct: '100%', color: '#38a169',     label: 'Sangat Kuat' },
            ];

            const lvl = val.length === 0 ? levels[0] : levels[score] || levels[1];
            strengthFill.style.width      = lvl.pct;
            strengthFill.style.background = lvl.color;
            strengthLabel.textContent     = lvl.label;
            strengthLabel.style.color     = lvl.color;

            validateConfirm();
        });

        // ── Confirm password live match ──
        function validateConfirm() {
            const confirmError = document.getElementById('confirmError');
            const grp = document.getElementById('confirmGroup');
            if (!passwordConfirm.value) {
                confirmError.classList.remove('show');
                passwordConfirm.classList.remove('is-invalid', 'is-valid');
                return;
            }
            const match = passwordInput.value === passwordConfirm.value;
            passwordConfirm.classList.toggle('is-invalid', !match);
            passwordConfirm.classList.toggle('is-valid', match);
            confirmError.classList.toggle('show', !match);
        }

        passwordConfirm.addEventListener('input', validateConfirm);

        // ── Block submit if confirm doesn't match ──
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            if (passwordInput.value !== passwordConfirm.value) {
                e.preventDefault();
                validateConfirm();
                passwordConfirm.focus();
            }
        });

        // ── Only allow digits on WhatsApp field ──
        document.querySelector('input[name="no_whatsapp"]').addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9+\-\s]/g, '');
        });

    </script>

</body>
</html>