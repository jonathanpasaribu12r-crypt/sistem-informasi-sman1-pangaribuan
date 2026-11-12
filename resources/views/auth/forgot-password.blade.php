<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - SMAN 1 Pangaribuan</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --primary-light: #eff6ff;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fff;
            height: 100vh;
            overflow: hidden;
        }

        .login-container {
            height: 100vh;
            width: 100%;
        }

        /* Bagian Kiri (Formulir) */
        .login-form-side {
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            position: relative;
        }

        .form-wrapper {
            width: 100%;
            max-width: 420px;
            animation: slideInLeft 0.8s ease-out;
        }

        .brand-logo {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 30px;
        }

        .logo-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            box-shadow: 0 10px 20px rgba(37, 99, 235, 0.2);
        }

        .brand-text h4 {
            font-weight: 700;
            color: #1e293b;
            margin: 0;
            font-size: 1.2rem;
        }

        .brand-text p {
            font-size: 0.8rem;
            color: #64748b;
            margin: 0;
        }

        .welcome-text h2 {
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 10px;
        }

        .welcome-text p {
            color: #64748b;
            margin-bottom: 25px;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        /* Custom Input Styling */
        .form-floating > .form-control {
            border-radius: 12px;
            border: 2px solid #f1f5f9;
            background-color: #f8fafc;
            padding-left: 20px;
            height: 55px;
        }

        .form-floating > .form-control:focus {
            border-color: var(--primary);
            background-color: white;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
        }

        .form-floating > label {
            padding-left: 20px;
            color: #94a3b8;
        }

        .btn-login {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            border: none;
            padding: 15px;
            border-radius: 12px;
            font-weight: 600;
            width: 100%;
            margin-top: 10px;
            transition: all 0.3s;
            box-shadow: 0 10px 25px -5px rgba(37, 99, 235, 0.4);
            font-size: 1rem;
            letter-spacing: 0.5px;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px -5px rgba(37, 99, 235, 0.5);
            color: white;
        }

        /* Bagian Kanan (Gambar) */
        .login-image-side {
            background: url('{{ asset("images/landing.jpg") }}') no-repeat center center;
            background-size: cover;
            position: relative;
            overflow: hidden;
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(37, 99, 235, 0.9), rgba(15, 23, 42, 0.8));
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 60px;
            color: white;
        }

        .overlay-content {
            max-width: 500px;
            animation: slideInRight 0.8s ease-out;
        }

        .overlay-content h1 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .overlay-content p {
            font-size: 1.1rem;
            opacity: 0.9;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            margin-top: 20px;
            transition: 0.3s;
        }

        .back-link:hover {
            gap: 12px;
            color: var(--primary-dark);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .login-image-side {
                display: none;
            }
            .login-form-side {
                width: 100%;
            }
        }

        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(50px); }
            to { opacity: 1; transform: translateX(0); }
        }
    </style>
</head>
<body>

    <div class="container-fluid p-0">
        <div class="row g-0 login-container">
            
            <!-- Sisi Kiri: Form Reset -->
            <div class="col-lg-6 col-12 login-form-side">
                <div class="form-wrapper">
                    <!-- Logo Header -->
                    <div class="brand-logo">
                        <div class="logo-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="brand-text">
                            <h4>SMAN 1 PANGARIBUAN</h4>
                            <p>Portal PPDB Digital</p>
                        </div>
                    </div>

                    <div class="welcome-text">
                        <h2>Lupa Password? 🔑</h2>
                        <p>Jangan khawatir. Masukkan alamat email Anda dan kami akan mengirimkan tautan untuk mereset kata sandi Anda.</p>
                    </div>

                    <!-- Session Status -->
                    @if(session('status'))
                        <div class="alert alert-success mb-4 border-0 shadow-sm" style="background: #dcfce7; color: #166534;">
                            <i class="fas fa-check-circle me-2"></i> {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- Email Input -->
                        <div class="form-floating mb-4">
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}" required autofocus>
                            <label for="email">Alamat Email Terdaftar</label>
                            @error('email')
                                <small class="text-danger ps-3 fw-bold">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn-login">
                            KIRIM LINK RESET <i class="fas fa-paper-plane ms-2"></i>
                        </button>

                        <div class="text-center mt-4">
                            <a href="{{ route('login') }}" class="back-link">
                                <i class="fas fa-arrow-left"></i> Kembali ke Login
                            </a>
                        </div>
                    </form>
                </div>
                
                <!-- Dekorasi Bulat Abstrak -->
                <div style="position: absolute; bottom: -50px; left: -50px; width: 200px; height: 200px; background: var(--primary-light); border-radius: 50%; z-index: -1;"></div>
                <div style="position: absolute; top: -30px; right: -30px; width: 150px; height: 150px; background: #f1f5f9; border-radius: 50%; z-index: -1;"></div>
            </div>

            <!-- Sisi Kanan: Gambar & Info -->
            <div class="col-lg-6 d-none d-lg-block login-image-side">
                <div class="image-overlay">
                    <div class="overlay-content">
                        <h1>Akses Kembali Akun Anda</h1>
                        <p>Kami menjaga keamanan data Anda. Proses reset password dilakukan dengan aman melalui verifikasi email.</p>
                        <div style="background: rgba(255,255,255,0.15); padding: 20px; border-radius: 15px; backdrop-filter: blur(5px);">
                            <small class="d-block text-white mb-2"><i class="fas fa-info-circle me-2"></i> Tips:</small>
                            <p class="m-0 small opacity-75">Periksa folder Spam jika email reset password tidak muncul di Inbox dalam beberapa menit.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>