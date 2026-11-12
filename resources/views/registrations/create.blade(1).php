<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran - SMAN 1 Pangaribuan</title>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        /* STYLE UTAMA DENGAN TEMA GELAP/TERANG */
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
            --border-color: #e2e8f0;
        }

        /* TEMA GELAP */
        [data-theme="dark"] {
            --primary: #3b82f6;
            --primary-dark: #2563eb;
            --primary-light: #60a5fa;
            --secondary: #94a3b8;
            --accent: #f59e0b;
            --background: #0f172a;
            --card-bg: #1e293b;
            --text-primary: #f1f5f9;
            --text-secondary: #cbd5e1;
            --sidebar-bg: #0f172a;
            --sidebar-active: #334155;
            --border-color: #334155;
        }

        body { 
            background: var(--background); 
            font-family: 'Segoe UI', sans-serif; 
            color: var(--text-primary); 
            overflow-x: hidden; 
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        
        .dashboard-container { display: flex; min-height: 100vh; }

        /* Sidebar */
        .sidebar { 
            width: 280px; 
            background: var(--sidebar-bg); 
            color: white; 
            position: fixed; 
            height: 100vh; 
            overflow-y: auto; 
            z-index: 1000; 
            transition: transform 0.3s ease;
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
            transition: transform 0.3s ease;
        }
        
        .school-logo:hover {
            transform: rotate(15deg) scale(1.1);
        }
        
        .user-info { 
            padding: 20px; 
            text-align: center; 
            border-bottom: 1px solid rgba(255, 255, 255, 0.1); 
        }
        
        .user-avatar { 
            width: 70px; 
            height: 70px; 
            border-radius: 50%; 
            background: var(--primary); 
            margin: 0 auto 15px; 
            overflow: hidden; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            border: 3px solid rgba(255, 255, 255, 0.2); 
        }
        
        .user-avatar img { 
            width: 100%; 
            height: 100%; 
            object-fit: cover; 
        }
        
        /* Navigation */
        .sidebar-nav { padding: 20px 0; }
        .nav-link { 
            display: flex; 
            align-items: center; 
            padding: 15px 25px; 
            color: rgba(255, 255, 255, 0.8); 
            text-decoration: none; 
            transition: 0.3s; 
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
            text-align: center; 
        }

        /* Main Content */
        .main-content { 
            flex: 1; 
            margin-left: 280px; 
            padding: 30px; 
            background: var(--background); 
            min-height: 100vh;
        }
        
        /* HEADER DENGAN JAM DIGITAL */
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
            margin: 0; 
            color: var(--text-primary);
        }
        
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
        
        /* HEADER PROFILE */
        .header-profile { 
            display: flex; 
            align-items: center; 
            gap: 12px; 
            padding: 8px 15px; 
            background: var(--card-bg); 
            border-radius: 50px; 
            box-shadow: 0 4px 10px rgba(0,0,0,0.05); 
            text-decoration: none; 
            color: var(--text-primary); 
            transition: 0.3s; 
            border: 1px solid var(--border-color); 
        }
        
        .header-profile:hover { 
            transform: translateY(-2px); 
            box-shadow: 0 6px 15px rgba(0,0,0,0.1); 
        }

        /* Form Styles */
        .form-card { 
            background: var(--card-bg); 
            border-radius: 16px; 
            padding: 40px; 
            box-shadow: 0 10px 40px rgba(0,0,0,0.05); 
            border: 1px solid var(--border-color);
            position: relative;
            overflow: hidden;
        }
        
        .form-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--primary-dark));
        }
        
        .form-section-title { 
            font-size: 1.2rem; 
            font-weight: 700; 
            color: var(--primary); 
            margin-bottom: 20px; 
            padding-bottom: 10px; 
            border-bottom: 2px solid var(--border-color); 
            display: flex; 
            align-items: center; 
            gap: 10px; 
        }
        
        .form-label { 
            font-weight: 600; 
            margin-bottom: 8px; 
            color: var(--text-primary); 
        }
        
        .required:after { 
            content: " *"; 
            color: var(--danger); 
        }
        
        .form-control, .form-select { 
            padding: 12px 15px; 
            border-radius: 10px; 
            border: 2px solid var(--border-color);
            background: var(--card-bg);
            color: var(--text-primary);
            transition: all 0.3s ease; 
        }
        
        .form-control:focus, .form-select:focus { 
            border-color: var(--primary); 
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1); 
            outline: none;
        }
        
        /* File Upload */
        .file-upload-box { 
            border: 2px dashed var(--border-color); 
            border-radius: 12px; 
            padding: 25px; 
            text-align: center; 
            cursor: pointer; 
            transition: all 0.3s ease; 
            background: rgba(37, 99, 235, 0.05);
            height: 100%;
        }
        
        .file-upload-box:hover { 
            border-color: var(--primary); 
            background: rgba(37, 99, 235, 0.1); 
            transform: translateY(-2px);
        }
        
        .file-icon { 
            font-size: 2.5rem; 
            color: var(--primary); 
            margin-bottom: 15px; 
        }
        
        .file-name { 
            font-size: 0.9rem; 
            font-weight: 600; 
            color: var(--primary); 
            margin-top: 5px; 
        }

        /* ALERTS */
        .alert {
            border-radius: 12px;
            border: none;
            padding: 1.25rem 1.5rem;
            margin-bottom: 1.5rem;
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
        
        /* THEME TOGGLE */
        .theme-toggle {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 55px;
            height: 55px;
            border-radius: 50%;
            background: var(--card-bg);
            border: 2px solid var(--primary);
            color: var(--text-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
            z-index: 999;
            transition: all 0.3s ease;
        }
        
        .theme-toggle:hover {
            transform: scale(1.1) rotate(15deg);
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        }
        
        /* RESPONSIVE DESIGN */
        @media (max-width: 1200px) {
            .header-clock {
                min-width: 180px;
            }
            
            .clock-time {
                font-size: 1.1rem;
            }
        }
        
        @media (max-width: 992px) {
            .sidebar { 
                transform: translateX(-100%);
                width: 280px;
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .main-content { 
                margin-left: 0; 
                padding: 20px;
            }
            
            .theme-toggle {
                bottom: 20px;
                right: 20px;
            }
            
            .form-card {
                padding: 25px;
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
        }
        
        @media (max-width: 768px) {
            .content-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .page-title {
                font-size: 1.5rem;
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
            
            .form-card {
                padding: 20px;
            }
        }
        
        @media (max-width: 400px) {
            .header-actions {
                gap: 10px;
            }
            
            .header-clock {
                padding: 8px 12px;
                min-width: 140px;
            }
            
            .clock-time {
                font-size: 0.9rem;
            }
            
            .clock-date {
                font-size: 0.7rem;
            }
        }
    </style>
</head>
<body data-theme="light">

    <!-- THEME TOGGLE -->
    <div class="theme-toggle" onclick="toggleTheme()">
        <i class="fas fa-moon"></i>
    </div>

    <!-- Logic untuk Foto Profil -->
    @php
        $photoUrl = Auth::user()->photo_url ? asset(Auth::user()->photo_url) . '?' . time() : null;
        
        // Penentuan Status Aktif Menu
        $isDashboardActive = request()->routeIs('student.dashboard');
        $isProfileActive = request()->routeIs('student.profile');
        $isRegistrationActive = request()->routeIs('registrations.create') || request()->routeIs('registrations.edit');
    @endphp

    <div class="dashboard-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header">
                <div class="school-logo">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div style="font-weight: 700; font-size: 1.1rem;">SMAN 1 PANGARIBUAN</div>
                <div style="font-size: 0.75rem; opacity: 0.8;">Portal PPDB Digital</div>
            </div>
            
            <div class="user-info">
                <a href="{{ route('student.profile') }}" class="text-white text-decoration-none">
                    <div class="user-avatar">
                        @if($photoUrl)
                            <img src="{{ $photoUrl }}" alt="Avatar">
                        @else
                            <i class="fas fa-user"></i>
                        @endif
                    </div>
                    <div style="font-weight: 600;">{{ Auth::user()->name }}</div>
                </a>
                <div style="font-size: 0.85rem; opacity: 0.8; margin-top: 5px;">Calon Siswa</div>
            </div>
            
            <div class="sidebar-nav">
                <a href="{{ route('student.dashboard') }}" class="nav-link {{ $isDashboardActive ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt nav-icon"></i> Dashboard
                </a>
                <a href="{{ route('student.profile') }}" class="nav-link {{ $isProfileActive ? 'active' : '' }}">
                    <i class="fas fa-user-cog nav-icon"></i> Pengaturan Profil
                </a>
                <!-- MENU INI AKTIF -->
                <a href="{{ route('registrations.create') }}" class="nav-link {{ $isRegistrationActive ? 'active' : '' }}">
                    <i class="fas fa-edit nav-icon"></i> Formulir Pendaftaran
                </a>
                <a href="{{ route('student.results') }}" class="nav-link">
                    <i class="fas fa-chart-bar nav-icon"></i> Hasil Seleksi
                </a>
                <a href="{{ route('student.info') }}" class="nav-link">
                    <i class="fas fa-info-circle nav-icon"></i> Informasi
                </a>
                <a href="{{ route('student.contact') }}" class="nav-link">
                    <i class="fas fa-phone nav-icon"></i> Kontak
                </a>
                <div class="mt-4 px-3">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-danger w-100 btn-sm">
                            <i class="fas fa-sign-out-alt me-2"></i> Keluar
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="main-content">
            <div class="content-header">
                <h1 class="page-title">Formulir Pendaftaran</h1>
                <!-- Header Actions dengan Jam Digital -->
                <div class="header-actions">
                    <!-- JAM DIGITAL BESAR -->
                    <div class="header-clock" id="liveClock">
                        <i class="fas fa-clock clock-icon"></i>
                        <div class="clock-content">
                            <div class="clock-time" id="currentTime">00:00:00</div>
                            <div class="clock-date" id="currentDate">Loading...</div>
                        </div>
                    </div>
                    
                    <!-- Header Profile Kanan Atas -->
                    <a href="{{ route('student.profile') }}" class="header-profile">
                        <div class="text-end d-none d-md-block">
                            <div class="fw-bold" style="font-size: 0.9rem;">{{ Auth::user()->name }}</div>
                            <div class="text-secondary" style="font-size: 0.75rem;">Siswa</div>
                        </div>
                        <div class="user-avatar" style="width: 40px; height: 40px; margin: 0; font-size: 1.2rem;">
                            @if($photoUrl)
                                <img src="{{ $photoUrl }}" alt="Avatar">
                            @else
                                <i class="fas fa-user"></i>
                            @endif
                        </div>
                    </a>
                </div>
            </div>

            <div class="form-card" data-aos="fade-up">
                <div class="text-center mb-5">
                    <h2 class="fw-bold text-primary">Formulir Pendaftaran PPDB</h2>
                    <p class="text-secondary">Tahun Ajaran {{ date('Y') }}/{{ date('Y')+1 }}</p>
                </div>

                <!-- Alert Success -->
                @if(session('success'))
                    <div class="alert alert-success mb-4">
                        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger mb-4">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ isset($registration) ? route('registrations.update', $registration->id) : route('registrations.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($registration))
                        @method('PUT')
                    @endif

                    <!-- A. DATA PRIBADI -->
                    <div class="mb-5">
                        <h5 class="form-section-title"><i class="fas fa-user"></i> A. Data Pribadi Calon Siswa</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label required">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $registration->nama_lengkap ?? Auth::user()->name) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label required">NISN</label>
                                <input type="number" name="nisn" class="form-control" value="{{ old('nisn', $registration->nisn ?? '') }}" required placeholder="10 digit angka">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label required">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir', $registration->tempat_lahir ?? '') }}" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label required">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $registration->tanggal_lahir ?? Auth::user()->birth_date ?? '') }}" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label required">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-select" required>
                                    <option value="">Pilih...</option>
                                    <option value="Laki-laki" {{ (old('jenis_kelamin', $registration->jenis_kelamin ?? '') == 'Laki-laki') ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ (old('jenis_kelamin', $registration->jenis_kelamin ?? '') == 'Perempuan') ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label required">Agama</label>
                                <select name="agama" class="form-select" required>
                                    <option value="">Pilih...</option>
                                    <option value="Islam" {{ (old('agama', $registration->agama ?? '') == 'Islam') ? 'selected' : '' }}>Islam</option>
                                    <option value="Kristen" {{ (old('agama', $registration->agama ?? '') == 'Kristen') ? 'selected' : '' }}>Kristen</option>
                                    <option value="Katolik" {{ (old('agama', $registration->agama ?? '') == 'Katolik') ? 'selected' : '' }}>Katolik</option>
                                    <option value="Hindu" {{ (old('agama', $registration->agama ?? '') == 'Hindu') ? 'selected' : '' }}>Hindu</option>
                                    <option value="Buddha" {{ (old('agama', $registration->agama ?? '') == 'Buddha') ? 'selected' : '' }}>Buddha</option>
                                </select>
                            </div>
                            <div class="col-md-8">
                                <label class="form-label required">Alamat Lengkap</label>
                                <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $registration->alamat ?? Auth::user()->address ?? '') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label required">No. HP / WhatsApp</label>
                                <input type="tel" name="no_hp" class="form-control" value="{{ old('no_hp', $registration->no_hp ?? Auth::user()->phone ?? '') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label required">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email', $registration->email ?? Auth::user()->email) }}" readonly>
                            </div>
                        </div>
                    </div>

                    <!-- B. DATA SEKOLAH ASAL -->
                    <div class="mb-5">
                        <h5 class="form-section-title"><i class="fas fa-school"></i> B. Data Sekolah Asal</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label required">Nama Sekolah Asal</label>
                                <input type="text" name="asal_sekolah" class="form-control" value="{{ old('asal_sekolah', $registration->asal_sekolah ?? '') }}" required placeholder="Contoh: SMP Negeri 1 Pangaribuan">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label required">Alamat Sekolah</label>
                                <input type="text" name="alamat_sekolah" class="form-control" value="{{ old('alamat_sekolah', $registration->alamat_sekolah ?? '') }}" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label required">Tahun Lulus</label>
                                <input type="number" name="tahun_lulus" class="form-control" value="{{ old('tahun_lulus', $registration->tahun_lulus ?? date('Y')) }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- C. JALUR PENDAFTARAN -->
                    <div class="mb-5">
                        <h5 class="form-section-title"><i class="fas fa-map-signs"></i> C. Jalur Pendaftaran</h5>
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="form-label required">Pilih Jalur</label>
                                <select name="jalur_pendaftaran" class="form-select" required>
                                    <option value="">Pilih Jalur...</option>
                                    <option value="zonasi" {{ (old('jalur_pendaftaran', $registration->jalur_pendaftaran ?? '') == 'zonasi') ? 'selected' : '' }}>Zonasi</option>
                                    <option value="prestasi" {{ (old('jalur_pendaftaran', $registration->jalur_pendaftaran ?? '') == 'prestasi') ? 'selected' : '' }}>Prestasi</option>
                                    <option value="afirmasi" {{ (old('jalur_pendaftaran', $registration->jalur_pendaftaran ?? '') == 'afirmasi') ? 'selected' : '' }}>Afirmasi</option>
                                    <option value="perpindahan" {{ (old('jalur_pendaftaran', $registration->jalur_pendaftaran ?? '') == 'perpindahan') ? 'selected' : '' }}>Perpindahan Orang Tua</option>
                                </select>
                                <div class="form-text text-primary"><i class="fas fa-info-circle"></i> Pastikan Anda memilih jalur yang sesuai dengan berkas yang Anda miliki.</div>
                            </div>
                        </div>
                    </div>

                    <!-- D. DATA ORANG TUA -->
                    <div class="mb-5">
                        <h5 class="form-section-title"><i class="fas fa-users"></i> D. Data Orang Tua / Wali</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label required">Nama Orang Tua / Wali</label>
                                <input type="text" name="nama_wali" class="form-control" value="{{ old('nama_wali', $registration->nama_wali ?? '') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label required">Pekerjaan</label>
                                <input type="text" name="pekerjaan_wali" class="form-control" value="{{ old('pekerjaan_wali', $registration->pekerjaan_wali ?? '') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label required">No. HP Orang Tua</label>
                                <input type="tel" name="no_hp_wali" class="form-control" value="{{ old('no_hp_wali', $registration->no_hp_wali ?? '') }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- E. UPLOAD DOKUMEN -->
                    <div class="mb-5">
                        <h5 class="form-section-title"><i class="fas fa-file-upload"></i> E. Upload Dokumen (Opsional)</h5>
                        <div class="alert alert-info small"><i class="fas fa-info-circle"></i> Dokumen fisik wajib dibawa saat verifikasi ulang. Upload di sini untuk pendataan awal.</div>
                        
                        <div class="row g-4">
                            <!-- Ijazah -->
                            <div class="col-md-6">
                                <div class="file-upload-box" onclick="document.getElementById('ijazah_file').click()">
                                    <div class="file-icon"><i class="fas fa-file-alt"></i></div>
                                    <div class="file-name" id="ijazah_label">Upload Ijazah / SKL</div>
                                    <small class="text-muted">PDF/JPG Max 2MB</small>
                                    <input type="file" name="ijazah_file" id="ijazah_file" class="d-none" onchange="updateFileName(this, 'ijazah_label')">
                                </div>
                            </div>
                            
                            <!-- Pas Foto -->
                            <div class="col-md-6">
                                <div class="file-upload-box" onclick="document.getElementById('foto_file').click()">
                                    <div class="file-icon"><i class="fas fa-camera"></i></div>
                                    <div class="file-name" id="foto_label">Upload Pas Foto 3x4</div>
                                    <small class="text-muted">JPG/PNG Max 2MB</small>
                                    <input type="file" name="foto_file" id="foto_file" class="d-none" onchange="updateFileName(this, 'foto_label')">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TOMBOL SIMPAN -->
                    <div class="text-end">
                        <a href="{{ route('student.dashboard') }}" class="btn btn-secondary me-2">Batal</a>
                        <button type="submit" class="btn btn-primary px-5 py-3 fw-bold">
                            <i class="fas fa-paper-plane me-2"></i> {{ isset($registration) ? 'Perbarui Pendaftaran' : 'Kirim Pendaftaran' }}
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
        AOS.init({ duration: 800, once: true });

        // Fungsi untuk update jam digital
        function updateClock() {
            const now = new Date();
            
            // Format waktu
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            
            // Format tanggal
            const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            
            const dayName = days[now.getDay()];
            const date = now.getDate();
            const monthName = months[now.getMonth()];
            const year = now.getFullYear();
            
            // Update tampilan jam
            document.getElementById('currentTime').textContent = `${hours}:${minutes}:${seconds}`;
            document.getElementById('currentDate').textContent = `${dayName}, ${date} ${monthName} ${year}`;
        }

        // Fungsi untuk toggle tema
        function toggleTheme() {
            const currentTheme = document.body.getAttribute('data-theme');
            const newTheme = currentTheme === 'light' ? 'dark' : 'light';
            document.body.setAttribute('data-theme', newTheme);
            
            // Update icon
            const icon = document.querySelector('.theme-toggle i');
            icon.className = newTheme === 'light' ? 'fas fa-moon' : 'fas fa-sun';
            
            // Simpan preference
            localStorage.setItem('theme', newTheme);
        }

        function updateFileName(input, labelId) {
            const label = document.getElementById(labelId);
            if (input.files && input.files.length > 0) {
                label.innerText = input.files[0].name;
                label.classList.add('text-success');
            }
        }

        // Load saved theme dan initialize jam
        document.addEventListener('DOMContentLoaded', function() {
            // Load tema yang disimpan
            const savedTheme = localStorage.getItem('theme') || 'light';
            document.body.setAttribute('data-theme', savedTheme);
            
            const icon = document.querySelector('.theme-toggle i');
            icon.className = savedTheme === 'light' ? 'fas fa-moon' : 'fas fa-sun';
            
            // Initialize jam
            updateClock();
            setInterval(updateClock, 1000);
            
            // Animasi jam
            const clockElement = document.getElementById('liveClock');
            if (clockElement) {
                setTimeout(() => {
                    clockElement.style.transform = 'scale(1.05)';
                    clockElement.style.transition = 'transform 0.3s ease';
                    
                    setTimeout(() => {
                        clockElement.style.transform = 'scale(1)';
                    }, 300);
                }, 500);
            }
        });
    </script>
</body>
</html>