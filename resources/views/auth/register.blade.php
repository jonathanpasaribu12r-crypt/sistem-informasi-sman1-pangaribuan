<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - SMAN 1 Pangaribuan</title>
    
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
            overflow-y: auto; /* Agar bisa discroll jika form panjang di layar kecil */
        }

        .form-wrapper {
            width: 100%;
            max-width: 420px;
            animation: slideInLeft 0.8s ease-out;
            padding-top: 20px;
            padding-bottom: 20px;
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
            font-size: 3rem;
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

        .feature-list {
            list-style: none;
            padding: 0;
        }

        .feature-list li {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
            font-size: 1rem;
            background: rgba(255,255,255,0.1);
            padding: 12px 20px;
            border-radius: 50px;
            width: fit-content;
            backdrop-filter: blur(5px);
        }

        .feature-list i {
            color: #60a5fa;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .login-image-side {
                display: none;
            }
            .login-form-side {
                width: 100%;
                height: auto;
                min-height: 100vh;
            }
            body {
                height: auto;
                overflow-y: auto;
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
            
            <!-- Sisi Kiri: Form Register -->
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
                        <h2>Buat Akun Baru 🚀</h2>
                        <p>Lengkapi data diri Anda untuk memulai pendaftaran.</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name Input -->
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" required autofocus autocomplete="name">
                            <label for="name">Nama Lengkap</label>
                            @error('name')
                                <small class="text-danger ps-3">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Email Input -->
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}" required autocomplete="username">
                            <label for="email">Alamat Email</label>
                            @error('email')
                                <small class="text-danger ps-3">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Password Input -->
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required autocomplete="new-password">
                            <label for="password">Kata Sandi</label>
                            @error('password')
                                <small class="text-danger ps-3">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Confirm Password Input -->
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                            <label for="password_confirmation">Konfirmasi Kata Sandi</label>
                            @error('password_confirmation')
                                <small class="text-danger ps-3">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn-login">
                            DAFTAR SEKARANG <i class="fas fa-user-plus ms-2"></i>
                        </button>

                        <div class="text-center mt-4">
                            <p class="text-secondary">Sudah punya akun? <a href="{{ route('login') }}" class="fw-bold text-primary text-decoration-none">Masuk disini</a></p>
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
                        <h1>Selamat Datang Calon Siswa Baru!</h1>
                        <p>Langkah pertama menuju masa depan cerah dimulai di sini. Bergabunglah dengan ribuan siswa berprestasi lainnya.</p>
                        
                        <ul class="feature-list">
                            <li><i class="fas fa-check-circle"></i> Akses Pendaftaran 24 Jam</li>
                            <li><i class="fas fa-check-circle"></i> Notifikasi Status Real-time</li>
                            <li><i class="fas fa-check-circle"></i> Mudah & Cepat</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>