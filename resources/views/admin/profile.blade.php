<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Admin - SMAN 1 Pangaribuan</title>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- CSS Dependencies -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        /* VARIABEL UNTUK TEMA TERANG (DEFAULT) */
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --primary-light: #3b82f6;
            --secondary: #64748b;
            --accent: #f59e0b;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --info: #06b6d4;
            --background: #f8fafc;
            --card-bg: #ffffff;
            --text-primary: #1e293b;
            --text-secondary: #64748b;
            --sidebar-bg: #1e293b;
            --sidebar-active: #334155;
            --border-color: rgba(0, 0, 0, 0.1);
            --shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            --hover-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        /* VARIABEL UNTUK TEMA GELAP */
        [data-theme="dark"] {
            --primary: #3b82f6;
            --primary-dark: #2563eb;
            --primary-light: #60a5fa;
            --secondary: #94a3b8;
            --accent: #f59e0b;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --info: #06b6d4;
            --background: #0f172a;
            --card-bg: #1e293b;
            --text-primary: #f1f5f9;
            --text-secondary: #cbd5e1;
            --sidebar-bg: #0f172a;
            --sidebar-active: #334155;
            --border-color: rgba(255, 255, 255, 0.1);
            --shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            --hover-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            background: var(--background);
            color: var(--text-primary);
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
            overflow-x: hidden;
            transition: all 0.3s ease;
        }
        
        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background: var(--sidebar-bg);
            color: white;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            z-index: 1000;
            transition: all 0.3s ease;
        }
        
        .sidebar-header {
            padding: 25px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
        }
        
        .school-logo {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 1.5rem;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
        }
        
        .school-name { font-weight: 700; font-size: 1.1rem; margin-bottom: 5px; }
        .school-motto { font-size: 0.75rem; opacity: 0.8; }
        
        .user-info {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .user-avatar {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 1.8rem;
            border: 3px solid rgba(255, 255, 255, 0.2);
            overflow: hidden;
        }
        
        .user-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .user-name { font-weight: 600; margin-bottom: 5px; font-size: 1.1rem; }
        .user-role { 
            font-size: 0.85rem; 
            opacity: 0.8; 
            background: rgba(255, 255, 255, 0.1); 
            padding: 4px 12px; 
            border-radius: 20px; 
            display: inline-block; 
            margin-bottom: 5px; 
        }
        .user-id { font-size: 0.75rem; opacity: 0.7; }
        
        /* Navigation */
        .sidebar-nav { padding: 20px 0; }
        .nav-item { margin-bottom: 5px; }
        .nav-link {
            display: flex;
            align-items: center;
            padding: 15px 25px;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }
        
        .nav-link:hover {
            background: rgba(255, 255, 255, 0.05);
            color: white;
            border-left-color: var(--primary-light);
        }
        
        .nav-link.active {
            background: var(--sidebar-active);
            color: white;
            border-left-color: var(--primary);
        }
        
        .nav-icon {
            width: 20px;
            margin-right: 15px;
            font-size: 1.1rem;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 280px;
            padding: 30px;
            background: var(--background);
            min-height: 100vh;
            transition: all 0.3s ease;
        }
        
        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--border-color);
        }
        
        .page-title { 
            font-size: 1.8rem; 
            font-weight: 700; 
            color: var(--text-primary); 
            margin: 0; 
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .page-subtitle { 
            color: var(--text-secondary); 
            margin-top: 5px; 
            font-size: 0.95rem;
        }
        
        /* HEADER ACTIONS DENGAN JAM */
        .header-actions { 
            display: flex; 
            align-items: center; 
            gap: 15px; 
        }
        
        /* JAM DIGITAL BESAR */
        .header-clock {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 12px 20px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.25);
            border: 1px solid rgba(255, 255, 255, 0.2);
            min-width: 200px;
            transition: all 0.3s ease;
        }
        
        .header-clock:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.35);
        }
        
        .clock-icon {
            color: white;
            font-size: 1.4rem;
            background: rgba(255, 255, 255, 0.2);
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .clock-content {
            display: flex;
            flex-direction: column;
        }
        
        .clock-time {
            font-family: 'Courier New', monospace;
            font-size: 1.2rem;
            font-weight: 700;
            color: white;
            letter-spacing: 1px;
            line-height: 1.2;
        }
        
        .clock-date {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.9);
            margin-top: 3px;
            font-weight: 500;
        }
        
        .welcome-text {
            color: var(--text-secondary);
            font-weight: 500;
            font-size: 1rem;
        }

        /* Profile Card */
        .card-profile {
            background: var(--card-bg);
            border-radius: 16px;
            padding: 35px;
            box-shadow: var(--shadow);
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .card-profile:hover {
            box-shadow: var(--hover-shadow);
        }
        
        .card-profile::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        }
        
        /* Avatar Upload */
        .avatar-upload {
            position: relative;
            width: 180px;
            margin: 0 auto 20px;
        }
        
        .avatar-preview {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
            overflow: hidden;
            border: 6px solid var(--card-bg);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        
        [data-theme="dark"] .avatar-preview {
            background: linear-gradient(135deg, #334155, #475569);
        }
        
        .avatar-preview:hover {
            transform: scale(1.05);
            box-shadow: 0 15px 40px rgba(37, 99, 235, 0.2);
        }
        
        .avatar-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .avatar-change {
            position: absolute;
            bottom: 10px;
            right: 10px;
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            cursor: pointer;
            border: 4px solid var(--card-bg);
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
        }
        
        .avatar-change:hover {
            transform: scale(1.2) rotate(90deg);
            box-shadow: 0 6px 25px rgba(37, 99, 235, 0.4);
        }

        /* Form Elements */
        .form-control, .form-select {
            background: var(--card-bg);
            color: var(--text-primary);
            border: 2px solid var(--border-color);
            padding: 12px 15px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus, .form-select:focus {
            background: var(--card-bg);
            color: var(--text-primary);
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
        }
        
        .form-control:read-only {
            background-color: rgba(0, 0, 0, 0.05);
            cursor: not-allowed;
        }
        
        [data-theme="dark"] .form-control:read-only {
            background-color: rgba(255, 255, 255, 0.05);
        }
        
        .form-label {
            color: var(--text-primary);
            font-weight: 600;
            margin-bottom: 8px;
            display: block;
        }

        /* Alerts */
        .alert {
            border: 1px solid transparent;
            background: var(--card-bg);
            color: var(--text-primary);
            border-radius: 12px;
            padding: 15px 20px;
            margin-bottom: 20px;
            animation: slideIn 0.5s ease;
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .alert-success {
            background: rgba(16, 185, 129, 0.1);
            border-color: var(--success);
            color: var(--success);
        }
        
        .alert-danger {
            background: rgba(239, 68, 68, 0.1);
            border-color: var(--danger);
            color: var(--danger);
        }

        /* Buttons */
        .btn {
            padding: 12px 25px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border: none;
            color: white;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary));
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.4);
            color: white;
        }
        
        .btn-outline-secondary {
            border: 2px solid var(--border-color);
            color: var(--text-secondary);
        }
        
        .btn-outline-secondary:hover {
            border-color: var(--primary);
            background: var(--primary);
            color: white;
        }
        
        .btn-outline-light {
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: rgba(255, 255, 255, 0.8);
        }
        
        .btn-outline-light:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: white;
            color: white;
        }

        /* Theme Toggle Button */
        .theme-toggle {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            background: var(--card-bg);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            z-index: 1000;
            transition: all 0.3s ease;
            border: 2px solid var(--primary);
        }
        
        .theme-toggle:hover {
            transform: scale(1.1) rotate(15deg);
        }

        /* Info Card */
        .info-card {
            background: var(--card-bg);
            border-radius: 16px;
            padding: 25px;
            box-shadow: var(--shadow);
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
        }
        
        .info-card:hover {
            box-shadow: var(--hover-shadow);
        }
        
        /* Responsive */
        @media (max-width: 1200px) {
            .header-clock {
                min-width: 180px;
            }
            
            .clock-time {
                font-size: 1.1rem;
            }
            
            .welcome-text {
                display: none;
            }
        }
        
        @media (max-width: 992px) {
            .sidebar { 
                width: 100%; 
                height: auto; 
                position: relative; 
            } 
            
            .main-content { 
                margin-left: 0; 
                padding: 25px; 
            } 
            
            .content-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }
            
            .header-actions {
                width: 100%;
                justify-content: space-between;
                flex-wrap: wrap;
                gap: 15px;
            }
            
            .header-clock {
                min-width: 170px;
                padding: 10px 15px;
            }
            
            .clock-icon {
                width: 40px;
                height: 40px;
                font-size: 1.2rem;
            }
            
            .clock-time {
                font-size: 1rem;
            }
            
            .welcome-text {
                display: block;
                order: -1;
                width: 100%;
                text-align: center;
            }
            
            .avatar-upload {
                width: 150px;
            }
            
            .avatar-preview {
                width: 150px;
                height: 150px;
            }
        }
        
        @media (max-width: 768px) {
            .content-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .header-actions {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }
            
            .header-clock {
                width: 100%;
                max-width: 250px;
                justify-content: center;
            }
            
            .card-profile {
                padding: 25px;
            }
        }
        
        @media (max-width: 576px) {
            .page-title {
                font-size: 1.5rem;
            }
            
            .content-header { 
                flex-direction: column; 
                align-items: flex-start; 
                gap: 10px; 
            }
            
            .header-actions { 
                width: 100%; 
                justify-content: space-between; 
            }
            
            .header-clock {
                padding: 10px 15px;
                gap: 12px;
                min-width: 160px;
            }
            
            .clock-icon {
                width: 35px;
                height: 35px;
                font-size: 1rem;
            }
            
            .clock-time {
                font-size: 0.95rem;
            }
            
            .clock-date {
                font-size: 0.75rem;
            }
            
            .btn {
                padding: 10px 20px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body data-theme="light">
    
    <!-- Theme Toggle Button -->
    <div class="theme-toggle" onclick="toggleTheme()">
        <i class="fas fa-moon"></i>
    </div>

    <div class="dashboard-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header">
                <div class="school-logo">
                    <i class="fas fa-school"></i>
                </div>
                <div class="school-name">SMAN 1 PANGARIBUAN</div>
                <div class="school-motto">Admin Panel</div>
            </div>
            <div class="user-info">
                <div class="user-avatar" id="sidebarAvatar">
                    @if(Auth::user()->photo_url)
                        <img src="{{ asset(Auth::user()->photo_url) }}?{{ time() }}" alt="Admin">
                    @else
                        <i class="fas fa-user-shield text-white"></i>
                    @endif
                </div>
                <div class="user-name">{{ Auth::user()->name }}</div>
                <div class="user-role">Administrator</div>
                <div class="user-id">ID: ADMIN-{{ str_pad(Auth::id(), 4, '0', STR_PAD_LEFT) }}</div>
            </div>
            <div class="sidebar-nav">
                <div class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.students') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <span>Data Pendaftar</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.settings') }}" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <span>Pengaturan Web</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.profile') }}" class="nav-link active">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <span>Pengaturan Profil</span>
                    </a>
                </div>
                <div class="mt-4 px-3">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-outline-light w-100 btn-sm">
                            <i class="fas fa-sign-out-alt me-2"></i> Keluar
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header dengan Jam Digital -->
            <div class="content-header">
                <div>
                    <h1 class="page-title">
                        <i class="fas fa-user-cog text-primary"></i>
                        Pengaturan Profil Admin
                    </h1>
                    <p class="page-subtitle">Kelola informasi akun administrator Anda</p>
                </div>
                <div class="header-actions">
                    <!-- Jam Digital Besar -->
                    <div class="header-clock" id="liveClock">
                        <i class="fas fa-clock clock-icon"></i>
                        <div class="clock-content">
                            <div class="clock-time" id="currentTime">00:00:00</div>
                            <div class="clock-date" id="currentDate">Loading...</div>
                        </div>
                    </div>
                    
                    <!-- Teks Welcome -->
                    <span class="welcome-text">
                        Selamat datang, {{ Auth::user()->name }}!
                    </span>
                </div>
            </div>

            <!-- Alert Messages -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle me-2"></i>
                        <div>{{ session('success') }}</div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <div>
                            <strong>Terjadi kesalahan:</strong>
                            <ul class="mb-0 mt-1">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Main Profile Form Card -->
            <div class="card-profile mb-4">
                <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" id="profileForm">
                    @csrf
                    @method('PUT')

                    <div class="row align-items-center">
                        <!-- Avatar Column -->
                        <div class="col-lg-4 text-center border-end border-lg-end-0 border-bottom border-lg-bottom-0 pb-4 pb-lg-0">
                            <div class="avatar-upload">
                                <div class="avatar-preview" id="avatarPreview">
                                    @if(Auth::user()->photo_url)
                                        <img src="{{ asset(Auth::user()->photo_url) }}?{{ time() }}" alt="Avatar Admin">
                                    @else
                                        <i class="fas fa-user-shield" style="font-size: 3rem; color: var(--primary);"></i>
                                    @endif
                                </div>
                                <div class="avatar-change" onclick="document.getElementById('photoInput').click()">
                                    <i class="fas fa-camera"></i>
                                </div>
                                <input type="file" id="photoInput" name="photo" class="d-none" accept="image/*" onchange="previewImage(event)">
                            </div>
                            
                            <div class="mt-4">
                                <h6 class="fw-bold mb-2">Foto Profil</h6>
                                <p class="text-muted small mb-0">Klik ikon kamera untuk mengubah foto</p>
                                <p class="text-muted small">Format: JPG, PNG, max 2MB</p>
                            </div>
                        </div>

                        <!-- Form Column -->
                        <div class="col-lg-8 ps-lg-5 pt-4 pt-lg-0">
                            <h4 class="fw-bold mb-4">Informasi Akun</h4>
                            
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input type="text" name="name" class="form-control" 
                                           value="{{ old('name', Auth::user()->name) }}" required>
                                </div>
                                
                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" 
                                           value="{{ Auth::user()->email }}" readonly disabled>
                                    <small class="text-muted">Email tidak dapat diubah</small>
                                </div>
                            </div>
                            
                            <hr class="my-4">
                            
                            <h5 class="fw-bold mb-3"><i class="fas fa-lock me-2 text-primary"></i> Ganti Password (Opsional)</h5>
                            
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Password Baru</label>
                                    <input type="password" name="password" class="form-control" 
                                           placeholder="Biarkan kosong jika tidak diganti" 
                                           autocomplete="new-password">
                                    <small class="text-muted">Minimal 8 karakter</small>
                                </div>
                                
                                <div class="col-md-6">
                                    <label class="form-label">Konfirmasi Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" 
                                           placeholder="Ulangi password baru" 
                                           autocomplete="new-password">
                                </div>
                            </div>
                            
                            <div class="row mt-5 pt-3">
                                <div class="col-md-6">
                                    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary w-100">
                                        <i class="fas fa-arrow-left me-2"></i> Kembali ke Dashboard
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary w-100" id="submitBtn">
                                        <i class="fas fa-save me-2"></i>
                                        <span id="submitText">Simpan Perubahan</span>
                                        <span id="loadingSpinner" class="d-none">
                                            <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                                            Menyimpan...
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Additional Info Card -->
            <div class="info-card" data-aos="fade-up">
                <h5 class="fw-bold mb-4"><i class="fas fa-info-circle me-2 text-primary"></i> Informasi Akun</h5>
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="p-3 rounded" style="background: rgba(37, 99, 235, 0.05);">
                            <label class="small text-muted mb-1">Tanggal Bergabung</label>
                            <div class="fw-bold">{{ Auth::user()->created_at->format('d F Y') }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 rounded" style="background: rgba(37, 99, 235, 0.05);">
                            <label class="small text-muted mb-1">Terakhir Login</label>
                            <div class="fw-bold">
                                {{ Auth::user()->last_login_at ? \Carbon\Carbon::parse(Auth::user()->last_login_at)->format('d F Y H:i') : 'Belum pernah login' }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 rounded" style="background: rgba(37, 99, 235, 0.05);">
                            <label class="small text-muted mb-1">Hak Akses</label>
                            <div class="fw-bold"><span class="badge bg-primary">Administrator Penuh</span></div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4 pt-3 border-top">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="small text-muted mb-1">Terakhir Update Profil</label>
                            <div class="fw-bold">{{ Auth::user()->updated_at->format('d F Y H:i') }}</div>
                        </div>
                        <div class="col-md-6">
                            <label class="small text-muted mb-1">Status Akun</label>
                            <div class="fw-bold"><span class="badge bg-success">Aktif</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
        // Initialize AOS
        AOS.init({ 
            duration: 800, 
            once: true,
            offset: 50 
        });

        // Theme Toggle Function
        function toggleTheme() {
            const currentTheme = document.body.getAttribute('data-theme');
            const newTheme = currentTheme === 'light' ? 'dark' : 'light';
            document.body.setAttribute('data-theme', newTheme);
            localStorage.setItem('admin-theme', newTheme);
            
            // Update theme toggle icon
            const icon = document.querySelector('.theme-toggle i');
            icon.className = newTheme === 'light' ? 'fas fa-moon' : 'fas fa-sun';
        }

        // Load saved theme
        const savedTheme = localStorage.getItem('admin-theme') || 'light';
        document.body.setAttribute('data-theme', savedTheme);
        const icon = document.querySelector('.theme-toggle i');
        icon.className = savedTheme === 'light' ? 'fas fa-moon' : 'fas fa-sun';

        // Function to update live clock
        function updateClock() {
            const now = new Date();
            
            // Format time
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            
            // Format date
            const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            
            const dayName = days[now.getDay()];
            const date = now.getDate();
            const monthName = months[now.getMonth()];
            const year = now.getFullYear();
            
            // Update clock display
            document.getElementById('currentTime').textContent = `${hours}:${minutes}:${seconds}`;
            document.getElementById('currentDate').textContent = `${dayName}, ${date} ${monthName} ${year}`;
        }
        
        // Initialize clock and update every second
        document.addEventListener('DOMContentLoaded', function() {
            updateClock();
            setInterval(updateClock, 1000);
            
            // Add animation effect to clock
            const clockElement = document.getElementById('liveClock');
            if (clockElement) {
                // Initial animation
                setTimeout(() => {
                    clockElement.style.transform = 'scale(1.05)';
                    clockElement.style.transition = 'transform 0.3s ease';
                    
                    setTimeout(() => {
                        clockElement.style.transform = 'scale(1)';
                    }, 300);
                }, 500);
            }
        });

        // Image preview function
        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                // Validate file size (max 2MB)
                if (file.size > 2 * 1024 * 1024) {
                    alert('Ukuran file maksimal 2MB');
                    event.target.value = '';
                    return;
                }
                
                // Validate file type
                if (!file.type.match('image/jpeg') && !file.type.match('image/png')) {
                    alert('Format file harus JPG atau PNG');
                    event.target.value = '';
                    return;
                }
                
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Update preview
                    const preview = document.getElementById('avatarPreview');
                    preview.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
                    
                    // Also update sidebar avatar
                    const sidebarAvatar = document.getElementById('sidebarAvatar');
                    if (sidebarAvatar) {
                        sidebarAvatar.innerHTML = `<img src="${e.target.result}" alt="Admin">`;
                    }
                };
                reader.readAsDataURL(file);
            }
        }

        // Form validation and submission handling
        document.getElementById('profileForm').addEventListener('submit', function(e) {
            const password = this.querySelector('input[name="password"]').value;
            const confirmPassword = this.querySelector('input[name="password_confirmation"]').value;
            
            // Validate password
            if (password && password.length < 8) {
                e.preventDefault();
                alert('Password minimal 8 karakter!');
                return false;
            }
            
            if (password !== confirmPassword) {
                e.preventDefault();
                alert('Password dan konfirmasi password tidak cocok!');
                return false;
            }
            
            // Show loading state
            const submitBtn = document.getElementById('submitBtn');
            const submitText = document.getElementById('submitText');
            const loadingSpinner = document.getElementById('loadingSpinner');
            
            submitText.classList.add('d-none');
            loadingSpinner.classList.remove('d-none');
            submitBtn.disabled = true;
            
            // Re-enable button after 5 seconds (in case of error)
            setTimeout(() => {
                submitText.classList.remove('d-none');
                loadingSpinner.classList.add('d-none');
                submitBtn.disabled = false;
            }, 5000);
        });

        // Input validation
        const formInputs = document.querySelectorAll('#profileForm input');
        formInputs.forEach(input => {
            if (input.name === 'password' || input.name === 'password_confirmation') {
                input.addEventListener('input', function() {
                    const password = document.querySelector('input[name="password"]').value;
                    const confirm = document.querySelector('input[name="password_confirmation"]').value;
                    
                    if (password && confirm && password !== confirm) {
                        input.classList.add('is-invalid');
                    } else {
                        input.classList.remove('is-invalid');
                    }
                });
            }
        });
    </script>
</body>
</html>