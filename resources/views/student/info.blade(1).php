<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi PPDB - SMAN 1 Pangaribuan</title>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        /* STYLE DASHBOARD SISWA (Warna Biru Terang) */
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
            --input-bg: #ffffff;
            --input-border: #e2e8f0;
        }

        [data-theme="dark"] {
            --primary: #3b82f6;
            --primary-dark: #2563eb;
            --primary-light: #60a5fa;
            --secondary: #94a3b8;
            --background: #0f172a;
            --card-bg: #1e293b;
            --text-primary: #f1f5f9;
            --text-secondary: #cbd5e1;
            --sidebar-bg: #0f172a;
            --sidebar-active: #334155;
            --input-bg: #1f2937;
            --input-border: #374151;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { background: var(--background); color: var(--text-primary); font-family: 'Inter', 'Segoe UI', system-ui, sans-serif; transition: all 0.3s ease; overflow-x: hidden; }

        /* Layout & Sidebar */
        .dashboard-container { display: flex; min-height: 100vh; }
        .sidebar { width: 280px; background: var(--sidebar-bg); color: white; transition: all 0.3s ease; position: fixed; height: 100vh; overflow-y: auto; z-index: 1000; }
        .sidebar-header { padding: 25px 20px; border-bottom: 1px solid rgba(255, 255, 255, 0.1); text-align: center; }
        .school-logo { width: 60px; height: 60px; background: linear-gradient(135deg, var(--primary), var(--primary-dark)); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px; font-size: 1.5rem; box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3); }
        .school-name { font-weight: 700; font-size: 1.1rem; margin-bottom: 5px; }
        .school-motto { font-size: 0.75rem; opacity: 0.8; }
        
        /* User Info */
        .user-info { padding: 20px; text-align: center; border-bottom: 1px solid rgba(255, 255, 255, 0.1); }
        .user-avatar { width: 70px; height: 70px; border-radius: 50%; background: linear-gradient(135deg, var(--primary), var(--primary-dark)); display: flex; align-items: center; justify-content: center; margin: 0 auto 15px; font-size: 1.8rem; border: 3px solid rgba(255, 255, 255, 0.2); overflow: hidden; }
        .user-avatar img { width: 100%; height: 100%; object-fit: cover; }
        .user-name { font-weight: 600; margin-bottom: 5px; font-size: 1.1rem; }
        .user-role { font-size: 0.85rem; opacity: 0.8; background: rgba(255, 255, 255, 0.1); padding: 4px 12px; border-radius: 20px; display: inline-block; margin-bottom: 5px; }
        .user-id { font-size: 0.75rem; opacity: 0.7; }
        
        /* Navigation */
        .sidebar-nav { padding: 20px 0; }
        .nav-item { margin-bottom: 5px; }
        .nav-link { display: flex; align-items: center; padding: 15px 25px; color: rgba(255, 255, 255, 0.8); text-decoration: none; transition: all 0.3s ease; border-left: 4px solid transparent; }
        .nav-link:hover { background: rgba(255, 255, 255, 0.05); color: white; border-left-color: var(--primary-light); }
        .nav-link.active { background: var(--sidebar-active); color: white; border-left-color: var(--primary); }
        .nav-icon { width: 20px; margin-right: 15px; font-size: 1.1rem; }

        /* Main Content */
        .main-content { flex: 1; margin-left: 280px; padding: 30px; background: var(--background); min-height: 100vh; }
        .content-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; padding-bottom: 20px; border-bottom: 1px solid rgba(0, 0, 0, 0.1); }
        .page-title { font-size: 1.8rem; font-weight: 700; color: var(--text-primary); margin: 0; }
        
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

        /* Theme Toggle */
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

        /* Info Page Specific Styles */
        .info-container { 
            max-width: 1200px; 
            margin: 0 auto; 
        }
        
        /* Hero Section */
        .hero-section { 
            background: linear-gradient(135deg, var(--primary-dark), var(--primary)); 
            color: white; 
            padding: 60px 40px; 
            border-radius: 20px; 
            margin-bottom: 40px; 
            text-align: center; 
            box-shadow: 0 10px 40px rgba(37, 99, 235, 0.3); 
            position: relative; 
            overflow: hidden; 
        }
        
        .hero-section::before { 
            content: ''; 
            position: absolute; 
            top: 0; 
            left: 0; 
            right: 0; 
            bottom: 0; 
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="rgba(255,255,255,0.05)" points="0,1000 1000,0 1000,1000"/></svg>'); 
        }
        
        .hero-content { 
            position: relative; 
            z-index: 2; 
        }
        
        .hero-title { 
            font-size: 2.5rem; 
            font-weight: 800; 
            margin-bottom: 15px; 
        }
        
        .hero-subtitle { 
            font-size: 1.2rem; 
            opacity: 0.9; 
            margin-bottom: 25px; 
        }
        
        .academic-year { 
            background: rgba(255, 255, 255, 0.2); 
            backdrop-filter: blur(10px); 
            padding: 10px 25px; 
            border-radius: 25px; 
            display: inline-block; 
            font-weight: 600; 
            border: 1px solid rgba(255, 255, 255, 0.3); 
            font-size: 1.1rem;
        }

        /* Info Cards */
        .info-grid { 
            display: grid; 
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); 
            gap: 25px; 
            margin-bottom: 40px; 
        }
        
        .info-card { 
            background: var(--card-bg); 
            border-radius: 16px; 
            padding: 30px; 
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1); 
            border: 1px solid rgba(255, 255, 255, 0.1); 
            transition: all 0.3s ease; 
        }
        
        .info-card:hover { 
            transform: translateY(-5px); 
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.15); 
        }
        
        .info-card.important { 
            border-left: 6px solid var(--accent); 
            background: linear-gradient(135deg, var(--card-bg), rgba(245, 158, 11, 0.05)); 
        }
        
        .card-header { 
            display: flex; 
            align-items: center; 
            margin-bottom: 20px; 
            gap: 15px; 
        }
        
        .card-icon { 
            width: 50px; 
            height: 50px; 
            border-radius: 12px; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            font-size: 1.5rem; 
            color: white; 
        }
        
        .card-icon.primary { 
            background: var(--primary); 
        }
        
        .card-icon.success { 
            background: var(--success); 
        }
        
        .card-icon.warning { 
            background: var(--warning); 
        }
        
        .card-title { 
            font-size: 1.3rem; 
            font-weight: 700; 
            color: var(--text-primary); 
            margin: 0; 
        }
        
        .card-content { 
            color: var(--text-secondary); 
            line-height: 1.6; 
        }
        
        .feature-list { 
            list-style: none; 
            padding: 0; 
            margin: 15px 0; 
        }
        
        .feature-list li { 
            padding: 10px 0; 
            display: flex; 
            align-items: center; 
            gap: 10px; 
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .feature-list li:last-child { 
            border-bottom: none; 
        }
        
        .feature-list li i { 
            color: var(--success); 
            font-size: 0.9rem; 
        }

        /* Timeline */
        .timeline-section { 
            background: var(--card-bg); 
            border-radius: 16px; 
            padding: 40px; 
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1); 
            margin-bottom: 40px; 
            border: 1px solid rgba(255, 255, 255, 0.1); 
        }
        
        .section-title { 
            font-size: 1.5rem; 
            font-weight: 700; 
            color: var(--text-primary); 
            margin-bottom: 30px; 
            display: flex; 
            align-items: center; 
            gap: 10px; 
        }
        
        .timeline { 
            position: relative; 
            max-width: 800px; 
            margin: 0 auto; 
        }
        
        .timeline::before { 
            content: ''; 
            position: absolute; 
            left: 30px; 
            top: 0; 
            bottom: 0; 
            width: 3px; 
            background: linear-gradient(135deg, var(--primary), var(--primary-dark)); 
        }
        
        .timeline-item { 
            position: relative; 
            margin-bottom: 40px; 
            padding-left: 80px; 
        }
        
        .timeline-date { 
            position: absolute; 
            left: 0; 
            top: 0; 
            width: 60px; 
            height: 60px; 
            background: linear-gradient(135deg, var(--primary), var(--primary-dark)); 
            color: white; 
            border-radius: 50%; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            font-weight: 700; 
            font-size: 0.9rem; 
            text-align: center; 
            line-height: 1.2; 
            z-index: 2; 
            border: 4px solid var(--background); 
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
        }
        
        .timeline-content { 
            background: rgba(37, 99, 235, 0.05); 
            padding: 25px; 
            border-radius: 12px; 
            border-left: 4px solid var(--primary); 
            transition: all 0.3s ease;
        }
        
        .timeline-content:hover {
            background: rgba(37, 99, 235, 0.08);
            transform: translateX(5px);
        }
        
        .timeline-title { 
            font-weight: 600; 
            margin-bottom: 10px; 
            color: var(--text-primary); 
            font-size: 1.1rem;
        }
        
        .timeline-description { 
            color: var(--text-secondary); 
            line-height: 1.5; 
        }

        /* Requirements */
        .requirements-grid { 
            display: grid; 
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); 
            gap: 20px; 
            margin-top: 20px; 
        }
        
        .requirement-item { 
            background: rgba(37, 99, 235, 0.05); 
            padding: 25px 20px; 
            border-radius: 12px; 
            text-align: center; 
            transition: all 0.3s ease; 
            border: 1px solid rgba(37, 99, 235, 0.1); 
        }
        
        .requirement-item:hover { 
            transform: translateY(-5px); 
            box-shadow: 0 8px 25px rgba(37, 99, 235, 0.15); 
            border-color: var(--primary-light);
            background: rgba(37, 99, 235, 0.08);
        }
        
        .requirement-icon { 
            font-size: 2.5rem; 
            margin-bottom: 15px; 
            color: var(--primary); 
        }
        
        .requirement-title { 
            font-weight: 600; 
            margin-bottom: 10px; 
            color: var(--text-primary); 
            font-size: 1.1rem;
        }
        
        .requirement-desc { 
            color: var(--text-secondary); 
            font-size: 0.9rem; 
            line-height: 1.4; 
        }

        /* Buttons */
        .btn { 
            display: inline-flex; 
            align-items: center; 
            gap: 10px; 
            padding: 14px 28px; 
            border: none; 
            border-radius: 12px; 
            font-weight: 600; 
            font-size: 1rem; 
            cursor: pointer; 
            transition: all 0.3s ease; 
            text-decoration: none; 
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); 
            margin: 5px; 
        }
        
        .btn-primary { 
            background: linear-gradient(135deg, var(--primary), var(--primary-dark)); 
            color: white; 
        }
        
        .btn-primary:hover { 
            transform: translateY(-3px); 
            box-shadow: 0 8px 25px rgba(37, 99, 235, 0.4); 
        }
        
        .btn-secondary { 
            background: linear-gradient(135deg, var(--secondary), #475569); 
            color: white; 
        }
        
        .btn-success { 
            background: linear-gradient(135deg, var(--success), #059669); 
            color: white; 
        }
        
        .btn-success:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.4);
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
            
            .hero-title {
                font-size: 2.2rem;
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
            
            .info-grid { 
                grid-template-columns: 1fr; 
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
            
            .hero-section {
                padding: 40px 25px;
            }
            
            .hero-title {
                font-size: 2rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
        }
        
        @media (max-width: 768px) {
            .hero-section {
                padding: 35px 20px;
            }
            
            .hero-title {
                font-size: 1.8rem;
            }
            
            .hero-subtitle {
                font-size: 1rem;
            }
            
            .requirements-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .timeline-section {
                padding: 30px 20px;
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
            
            .timeline::before {
                left: 25px;
            }
            
            .timeline-item {
                padding-left: 70px;
            }
            
            .timeline-date {
                width: 50px;
                height: 50px;
                font-size: 0.8rem;
            }
        }
        
        @media (max-width: 576px) {
            .hero-title {
                font-size: 1.6rem;
            }
            
            .page-title {
                font-size: 1.5rem;
            }
            
            .info-card {
                padding: 25px 20px;
            }
            
            .requirements-grid {
                grid-template-columns: 1fr;
            }
            
            .timeline::before {
                left: 25px;
            }
            
            .timeline-item {
                padding-left: 70px;
            }
            
            .timeline-date {
                width: 50px;
                height: 50px;
                font-size: 0.8rem;
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
                padding: 12px 20px;
                font-size: 0.9rem;
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
    @php
        $photoUrl = Auth::user()->photo_url ? asset(Auth::user()->photo_url) . '?' . time() : null;
    @endphp

    <!-- Theme Toggle -->
    <div class="theme-toggle" onclick="toggleTheme()">
        <i class="fas fa-moon"></i>
    </div>

    <!-- Dashboard Container -->
    <div class="dashboard-container">
        <!-- Sidebar SISWA -->
        <div class="sidebar">
            <div class="sidebar-header">
                <div class="school-logo">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="school-name">SMAN 1 PANGARIBUAN</div>
                <div class="school-motto">Portal PPDB Digital</div>
            </div>
            
            <!-- Info User dengan Avatar -->
            <div class="user-info">
                <a href="{{ route('student.profile') }}" class="text-white text-decoration-none">
                    <div class="user-avatar" id="sidebarAvatar">
                        @if($photoUrl)
                            <img src="{{ $photoUrl }}" alt="Avatar" id="sidebarAvatarImg">
                        @else
                            <i class="fas fa-user" id="sidebarAvatarIcon"></i>
                        @endif
                    </div>
                    <div class="user-name">{{ Auth::user()->name }}</div>
                </a>
                <div class="user-role">Calon Peserta Didik</div>
                <div class="user-id">ID: SISWA-{{ str_pad(Auth::id(), 4, '0', STR_PAD_LEFT) }}</div>
            </div>
            
            <!-- Menu Navigasi SISWA -->
            <div class="sidebar-nav">
                <div class="nav-item">
                    <a href="{{ route('student.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <span>Dashboard Utama</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('student.profile') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <span>Pengaturan Profil</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('registrations.create') }}" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <span>Formulir Pendaftaran</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('student.results') }}" class="nav-link">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <span>Hasil Seleksi</span>
                    </a>
                </div>
                <!-- MENU INI AKTIF -->
                <div class="nav-item">
                    <a href="{{ route('student.info') }}" class="nav-link active">
                        <i class="nav-icon fas fa-info-circle"></i>
                        <span>Informasi PPDB</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('student.contact') }}" class="nav-link">
                        <i class="nav-icon fas fa-phone"></i>
                        <span>Kontak Panitia</span>
                    </a>
                </div>
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
                <h1 class="page-title">Informasi PPDB</h1>
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

            <div class="info-container">
                <!-- Hero Section -->
                <div class="hero-section" data-aos="fade-up">
                    <div class="hero-content">
                        <h1 class="hero-title">Penerimaan Peserta Didik Baru</h1>
                        <p class="hero-subtitle">SMAN 1 Pangaribuan Membuka Pendaftaran untuk Tahun Ajaran {{ date('Y') }}/{{ date('Y')+1 }}</p>
                        <div class="academic-year">{{ date('Y') }}/{{ date('Y')+1 }}</div>
                    </div>
                </div>

                <!-- Important Information -->
                <div class="info-grid">
                    <div class="info-card important" data-aos="fade-up" data-aos-delay="100">
                        <div class="card-header">
                            <div class="card-icon warning">
                                <i class="fas fa-exclamation-circle"></i>
                            </div>
                            <h3 class="card-title">Informasi Penting</h3>
                        </div>
                        <div class="card-content">
                            <ul class="feature-list">
                                <li><i class="fas fa-check"></i> Pendaftaran dibuka mulai 1 Desember 2024</li>
                                <li><i class="fas fa-check"></i> Batas akhir pendaftaran: 24 Januari 2025</li>
                                <li><i class="fas fa-check"></i> Pengumuman hasil seleksi: 15 Februari 2025</li>
                                <li><i class="fas fa-check"></i> Daftar ulang: 16-20 Februari 2025</li>
                                <li><i class="fas fa-check"></i> Masa sanggah: 15-17 Februari 2025</li>
                            </ul>
                        </div>
                    </div>

                    <div class="info-card" data-aos="fade-up" data-aos-delay="150">
                        <div class="card-header">
                            <div class="card-icon primary">
                                <i class="fas fa-users"></i>
                            </div>
                            <h3 class="card-title">Kuota Penerimaan</h3>
                        </div>
                        <div class="card-content">
                            <p><strong>Total Kuota:</strong> 320 Siswa</p>
                            <p><strong>Jurusan IPA:</strong> 160 Siswa</p>
                            <p><strong>Jurusan IPS:</strong> 160 Siswa</p>
                            <p><strong>Zonasi:</strong> 60% | <strong>Prestasi:</strong> 20%</p>
                            <p><strong>Afirmasi:</strong> 20%</p>
                        </div>
                    </div>

                    <div class="info-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="card-header">
                            <div class="card-icon success">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <h3 class="card-title">Jurusan Tersedia</h3>
                        </div>
                        <div class="card-content">
                            <ul class="feature-list">
                                <li><i class="fas fa-flask"></i> Ilmu Pengetahuan Alam (IPA)</li>
                                <li><i class="fas fa-chart-bar"></i> Ilmu Pengetahuan Sosial (IPS)</li>
                            </ul>
                            <p style="margin-top: 15px; font-size: 0.9rem; color: var(--text-secondary);">
                                Setiap jurusan memiliki kuota terbatas. Pilihan jurusan dapat diubah sebelum batas waktu pendaftaran.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Timeline Section -->
                <div class="timeline-section" data-aos="fade-up">
                    <h2 class="section-title">
                        <i class="fas fa-calendar-alt"></i>
                        Timeline PPDB {{ date('Y') }}
                    </h2>
                    <div class="timeline">
                        <div class="timeline-item" data-aos="fade-right">
                            <div class="timeline-date">1 Des</div>
                            <div class="timeline-content">
                                <h4 class="timeline-title">Pembukaan Pendaftaran</h4>
                                <p class="timeline-description">Pendaftaran online dibuka melalui portal PPDB SMAN 1 Pangaribuan</p>
                            </div>
                        </div>
                        <div class="timeline-item" data-aos="fade-right" data-aos-delay="100">
                            <div class="timeline-date">24 Jan</div>
                            <div class="timeline-content">
                                <h4 class="timeline-title">Penutupan Pendaftaran</h4>
                                <p class="timeline-description">Batas akhir pengisian formulir dan upload dokumen pendaftaran pukul 23:59 WIB</p>
                            </div>
                        </div>
                        <div class="timeline-item" data-aos="fade-right" data-aos-delay="200">
                            <div class="timeline-date">25 Jan - 14 Feb</div>
                            <div class="timeline-content">
                                <h4 class="timeline-title">Proses Seleksi</h4>
                                <p class="timeline-description">Verifikasi dokumen dan proses seleksi oleh panitia PPDB</p>
                            </div>
                        </div>
                        <div class="timeline-item" data-aos="fade-right" data-aos-delay="300">
                            <div class="timeline-date">15 Feb</div>
                            <div class="timeline-content">
                                <h4 class="timeline-title">Pengumuman Hasil</h4>
                                <p class="timeline-description">Pengumuman hasil seleksi melalui portal dan papan pengumuman sekolah</p>
                            </div>
                        </div>
                        <div class="timeline-item" data-aos="fade-right" data-aos-delay="400">
                            <div class="timeline-date">16-20 Feb</div>
                            <div class="timeline-content">
                                <h4 class="timeline-title">Daftar Ulang</h4>
                                <p class="timeline-description">Proses daftar ulang bagi calon peserta didik yang diterima</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Requirements Section -->
                <div class="info-card" data-aos="fade-up">
                    <div class="card-header">
                        <div class="card-icon primary">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                        <h3 class="card-title">Persyaratan Pendaftaran</h3>
                    </div>
                    <div class="card-content">
                        <div class="requirements-grid">
                            <div class="requirement-item">
                                <div class="requirement-icon"><i class="fas fa-book"></i></div>
                                <div class="requirement-title">Ijazah SMP/MTs</div>
                                <div class="requirement-desc">Fotokopi ijazah yang telah dilegalisir</div>
                            </div>
                            <div class="requirement-item">
                                <div class="requirement-icon"><i class="fas fa-clipboard-list"></i></div>
                                <div class="requirement-title">SKHUN/SKHUS</div>
                                <div class="requirement-desc">Surat Keterangan Hasil Ujian Nasional/Sekolah</div>
                            </div>
                            <div class="requirement-item">
                                <div class="requirement-icon"><i class="fas fa-id-card"></i></div>
                                <div class="requirement-title">Kartu Keluarga</div>
                                <div class="requirement-desc">Fotokopi kartu keluarga terbaru</div>
                            </div>
                            <div class="requirement-item">
                                <div class="requirement-icon"><i class="fas fa-child"></i></div>
                                <div class="requirement-title">Akta Kelahiran</div>
                                <div class="requirement-desc">Fotokopi akta kelahiran</div>
                            </div>
                            <div class="requirement-item">
                                <div class="requirement-icon"><i class="fas fa-camera"></i></div>
                                <div class="requirement-title">Foto 3x4</div>
                                <div class="requirement-desc">Pas foto latar merah (3 lembar)</div>
                            </div>
                            <div class="requirement-item">
                                <div class="requirement-icon"><i class="fas fa-trophy"></i></div>
                                <div class="requirement-title">Sertifikat Prestasi</div>
                                <div class="requirement-desc">Untuk jalur prestasi (jika ada)</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div style="text-align: center; margin-top: 50px; margin-bottom: 30px;" data-aos="fade-up">
                    <a href="{{ route('registrations.create') }}" class="btn btn-primary">
                        <i class="fas fa-edit me-2"></i> Mulai Pendaftaran
                    </a>
                    <a href="{{ route('student.contact') }}" class="btn btn-success">
                        <i class="fas fa-phone me-2"></i> Hubungi Panitia
                    </a>
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
            localStorage.setItem('theme', newTheme);
            const icon = document.querySelector('.theme-toggle i');
            icon.className = newTheme === 'light' ? 'fas fa-moon' : 'fas fa-sun';
        }

        // Load saved theme
        const savedTheme = localStorage.getItem('theme') || 'light';
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
    </script>
</body>
</html>