<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa - SMAN 1 Pangaribuan</title>
    
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
        
        /* HEADER ACTIONS DENGAN JAM - DITAMBAHKAN */
        .header-actions { 
            display: flex; 
            align-items: center; 
            gap: 15px; 
        }
        
        /* JAM DIGITAL BESAR - DITAMBAHKAN */
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

        /* Cards */
        .dashboard-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 25px; margin-bottom: 30px; }
        .dashboard-card { background: var(--card-bg); border-radius: 16px; padding: 30px; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1); border: 1px solid rgba(255, 255, 255, 0.1); transition: all 0.3s ease; position: relative; overflow: hidden; display: flex; flex-direction: column; }
        .dashboard-card:hover { transform: translateY(-5px); box-shadow: 0 15px 50px rgba(0, 0, 0, 0.15); }
        .dashboard-card::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 4px; background: linear-gradient(135deg, var(--primary), var(--primary-dark)); }
        
        .card-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; }
        .card-icon { width: 60px; height: 60px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; color: white; }
        .card-icon.primary { background: linear-gradient(135deg, var(--primary), var(--primary-dark)); }
        .card-icon.success { background: linear-gradient(135deg, var(--success), #059669); }
        .card-icon.warning { background: linear-gradient(135deg, var(--warning), #d97706); }
        .card-icon.danger { background: linear-gradient(135deg, var(--danger), #dc2626); }
        
        .card-title { font-size: 1.2rem; font-weight: 600; color: var(--text-primary); margin-bottom: 10px; }
        .card-value { font-size: 2.5rem; font-weight: 700; margin-bottom: 10px; }
        .card-value.primary { color: var(--primary); }
        .card-value.success { color: var(--success); }
        .card-value.warning { color: var(--warning); }
        .card-value.danger { color: var(--danger); }
        .card-description { color: var(--text-secondary); line-height: 1.5; margin-bottom: 20px; flex-grow: 1;}

        /* Progress */
        .progress-section { background: var(--card-bg); border-radius: 16px; padding: 30px; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1); margin-bottom: 30px; border: 1px solid rgba(255, 255, 255, 0.1); }
        .section-title { font-size: 1.4rem; font-weight: 600; color: var(--text-primary); margin-bottom: 25px; display: flex; align-items: center; gap: 10px; }
        .progress-container { margin-bottom: 30px; }
        .progress-info { display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; }
        .progress-label { font-weight: 600; color: var(--text-primary); }
        .progress-percentage { font-weight: 700; color: var(--primary); font-size: 1.2rem; }
        .progress-bar { height: 12px; background: #e2e8f0; border-radius: 10px; overflow: hidden; position: relative; }
        .progress-fill { height: 100%; background: linear-gradient(135deg, var(--primary), var(--primary-dark)); border-radius: 10px; width: 0%; transition: width 1s ease-in-out; position: relative; }
        
        .progress-steps { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-top: 30px; }
        .step-card { background: #f8fafc; padding: 25px; border-radius: 12px; text-align: center; transition: all 0.3s ease; border: 2px solid transparent; }
        [data-theme="dark"] .step-card { background: #1f2937; }
        .step-card.completed { background: linear-gradient(135deg, #f0fdf4, #dcfce7); border-color: var(--success); }
        .step-card.active { background: linear-gradient(135deg, #eff6ff, #dbeafe); border-color: var(--primary); transform: scale(1.05); box-shadow: 0 8px 25px rgba(37, 99, 235, 0.15); }
        .step-card.rejected { background: linear-gradient(135deg, #fef2f2, #fee2e2); border-color: var(--danger); }
        .step-icon { width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px; font-size: 1.5rem; font-weight: 600; }
        .step-card.completed .step-icon { background: var(--success); color: white; }
        .step-card.active .step-icon { background: var(--primary); color: white; }
        .step-card.rejected .step-icon { background: var(--danger); color: white; }
        .step-card:not(.completed):not(.active):not(.rejected) .step-icon { background: #e2e8f0; color: var(--text-secondary); }

        .announcement-section { background: linear-gradient(135deg, var(--primary-dark), var(--primary)); color: white; padding: 30px; border-radius: 16px; margin-bottom: 30px; box-shadow: 0 10px 40px rgba(37, 99, 235, 0.3); position: relative; overflow: hidden; }
        .announcement-badge { background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px); padding: 8px 16px; border-radius: 20px; font-size: 0.85rem; font-weight: 600; margin-bottom: 15px; display: inline-block; border: 1px solid rgba(255, 255, 255, 0.3); }
        .deadline-card { background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); padding: 20px; border-radius: 12px; border: 1px solid rgba(255, 255, 255, 0.2); }
        .deadline-date { font-size: 1.3rem; font-weight: 700; color: var(--accent); }

        /* Buttons */
        .btn { display: inline-flex; align-items: center; gap: 10px; padding: 12px 24px; border: none; border-radius: 10px; font-weight: 600; font-size: 1rem; cursor: pointer; transition: all 0.3s ease; text-decoration: none; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); justify-content: center;}
        .btn-primary { background: linear-gradient(135deg, var(--primary), var(--primary-dark)); color: white; }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(37, 99, 235, 0.3); }
        .btn-success { background: linear-gradient(135deg, var(--success), #059669); color: white; }
        .btn-success:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(16, 185, 129, 0.3); }
        .btn-block { display: block; width: 100%; text-align: center; }
        
        .theme-toggle { position: fixed; bottom: 30px; right: 30px; width: 60px; height: 60px; background: var(--card-bg); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2); cursor: pointer; z-index: 1000; transition: all 0.3s ease; border: 2px solid var(--primary); }
        .theme-toggle:hover { transform: scale(1.1) rotate(15deg); }

        /* RESPONSIVE DESIGN UNTUK HEADER DENGAN JAM */
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
                padding: 20px; 
            } 
            
            .dashboard-grid { 
                grid-template-columns: 1fr; 
            }
            
            .progress-steps { 
                grid-template-columns: repeat(2, 1fr); 
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
        }
        
        @media (max-width: 768px) {
            .hero-section {
                padding: 35px 25px;
            }
            
            .hero-title {
                font-size: 2rem;
            }
            
            .hero-subtitle {
                font-size: 1rem;
            }
            
            .info-grid {
                grid-template-columns: 1fr;
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
            
            .progress-steps { 
                grid-template-columns: 1fr; 
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
                <div class="user-avatar" id="sidebarAvatar">
                    @if(auth()->user()->photo_url)
                        <img src="{{ asset(auth()->user()->photo_url) }}?{{ time() }}" alt="Avatar" 
                             id="sidebarAvatarImg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
                    @else
                        <i class="fas fa-user" id="sidebarAvatarIcon"></i>
                    @endif
                </div>
                <div class="user-name" id="sidebarUserName">{{ Auth::user()->name }}</div>
                <div class="user-role">Calon Peserta Didik</div>
                <div class="user-id">ID: SISWA-{{ str_pad(Auth::id(), 4, '0', STR_PAD_LEFT) }}</div>
            </div>
            
            <!-- Menu Navigasi SISWA -->
            <div class="sidebar-nav">
                <div class="nav-item">
                    <a href="{{ route('student.dashboard') }}" class="nav-link {{ request()->routeIs('student.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <span>Dashboard Utama</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('student.profile') }}" class="nav-link {{ request()->routeIs('student.profile') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <span>Pengaturan Profil</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('registrations.create') }}" class="nav-link {{ request()->routeIs('registrations.create') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-edit"></i>
                        <span>Formulir Pendaftaran</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('student.results') }}" class="nav-link {{ request()->routeIs('student.results') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <span>Hasil Seleksi</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('student.info') }}" class="nav-link {{ request()->routeIs('student.info') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-info-circle"></i>
                        <span>Informasi PPDB</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('student.contact') }}" class="nav-link {{ request()->routeIs('student.contact') ? 'active' : '' }}">
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
                <h1 class="page-title">Dashboard Utama</h1>
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

            <!-- Stats Grid -->
            <div class="dashboard-grid">
                <!-- CARD 1: Status Pendaftaran -->
                <div class="dashboard-card" data-aos="fade-up">
                    <div class="card-header">
                        <div class="card-icon primary">
                            <i class="fas fa-clipboard-check"></i>
                        </div>
                    </div>
                    <div class="card-value primary">
                        @if(isset($registration) && $registration) 
                            SUDAH DAFTAR 
                        @else 
                            BELUM DAFTAR 
                        @endif
                    </div>
                    <div class="card-title">Status Pendaftaran</div>
                    <div class="card-description">
                        @if(isset($registration) && $registration) 
                            ✅ Formulir pendaftaran telah diterima. 
                        @else 
                            ⚠️ Lengkapi formulir pendaftaran. 
                        @endif
                    </div>
                    @if(!isset($registration) || !$registration)
                        <a href="{{ route('registrations.create') }}" class="btn btn-primary btn-block">
                            <i class="fas fa-play-circle"></i> Mulai Pendaftaran
                        </a>
                    @else
                        <a href="{{ route('registrations.create') }}" class="btn btn-block" style="background: var(--secondary); color: white;">
                            <i class="fas fa-eye"></i> Lihat Data
                        </a>
                    @endif
                </div>

                <!-- CARD 2: Progress Pendaftaran -->
                <div class="dashboard-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-header">
                        <div class="card-icon success">
                            <i class="fas fa-rocket"></i>
                        </div>
                    </div>
                    <div class="card-value success">
                        {{ isset($progress) ? $progress : 25 }}%
                    </div>
                    <div class="card-title">Progress Pendaftaran</div>
                    <div class="card-description">
                        Ikuti semua tahapan untuk menyelesaikan pendaftaran.
                    </div>
                </div>

                <!-- CARD 3: Status Verifikasi -->
                <div class="dashboard-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="card-header">
                        @if(isset($registration) && $registration)
                            @if($registration->status == 'ditolak')
                                <div class="card-icon danger"><i class="fas fa-times-circle"></i></div>
                            @elseif($registration->status == 'diterima')
                                <div class="card-icon success"><i class="fas fa-check-circle"></i></div>
                            @elseif($registration->status == 'diverifikasi')
                                <div class="card-icon warning"><i class="fas fa-clock"></i></div>
                            @else
                                <div class="card-icon warning"><i class="fas fa-clock"></i></div>
                            @endif
                        @else
                            <div class="card-icon warning"><i class="fas fa-clock"></i></div>
                        @endif
                    </div>
                    <div class="card-value warning">
                        @if(isset($registration) && $registration)
                            {{ strtoupper($registration->status == 'pending' ? 'Menunggu' : $registration->status) }}
                        @else
                            MENUNGGU
                        @endif
                    </div>
                    <div class="card-title">Status Verifikasi</div>
                    <div class="card-description">
                        @if(isset($registration) && $registration)
                             @if($registration->status == 'ditolak')
                                Mohon maaf, berkas Anda <strong>DITOLAK</strong>.
                             @elseif($registration->status == 'diterima')
                                Selamat! Berkas Anda <strong>DITERIMA</strong>.
                             @elseif($registration->status == 'diverifikasi')
                                Sedang diverifikasi tahap akhir.
                             @else
                                Sedang diverifikasi oleh panitia.
                             @endif
                        @else
                            Data Anda sedang dalam proses verifikasi.
                        @endif
                    </div>
                    
                    <!-- TOMBOL CETAK KARTU (FITUR BARU) -->
                    @if(isset($registration) && in_array($registration->status, ['diverifikasi', 'diterima']))
                        <div class="mt-4 pt-3 border-top w-100">
                            <a href="{{ route('student.print.card') }}" target="_blank" class="btn btn-success btn-block w-100 fw-bold">
                                <i class="fas fa-print me-2"></i> Cetak Kartu Peserta
                            </a>
                            <small class="text-muted d-block mt-2 text-center" style="font-size: 0.75rem;">
                                *Klik untuk mengunduh kartu peserta (PDF).
                            </small>
                        </div>
                    @endif

                </div>
            </div>

            <!-- Progress Section -->
            <div class="progress-section" data-aos="fade-up">
                <h3 class="section-title">
                    <i class="fas fa-chart-line" style="color: var(--primary);"></i> Progress Pendaftaran
                </h3>
                <div class="progress-container">
                    <div class="progress-info">
                        <span class="progress-label">Status Terkini</span>
                        <span class="progress-percentage">{{ isset($progress) ? $progress : 25 }}%</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" id="progressFill" style="width: {{ isset($progress) ? $progress : 25 }}%"></div>
                    </div>
                </div>
                
                <div class="progress-steps">
                    <!-- Step 1: Registrasi Akun (25%) -->
                    <div class="step-card completed">
                        <div class="step-icon"><i class="fas fa-check"></i></div>
                        <div class="step-title">Registrasi Akun</div>
                        <div class="step-description">Akun berhasil dibuat</div>
                    </div>
                    
                    <!-- Step 2: Isi Formulir (50%) -->
                    <div class="step-card {{ (isset($registration) && $registration) ? 'completed' : 'active' }}">
                        <div class="step-icon">
                            @if(isset($registration) && $registration) <i class="fas fa-check"></i> @else 2 @endif
                        </div>
                        <div class="step-title">Isi Formulir</div>
                        <div class="step-description">Lengkapi data diri</div>
                    </div>
                    
                    <!-- Step 3: Verifikasi Data (75%) -->
                    @php
                        $step3Class = '';
                        $step3Icon = '3';
                        if (isset($registration) && in_array($registration->status, ['diverifikasi', 'diterima', 'ditolak'])) {
                            $step3Class = 'completed';
                            $step3Icon = '<i class="fas fa-check"></i>';
                        } elseif (isset($registration) && $registration->status == 'pending') {
                            $step3Class = 'active';
                            $step3Icon = '<i class="fas fa-clock"></i>';
                        }
                    @endphp
                    <div class="step-card {{ $step3Class }}">
                        <div class="step-icon">{!! $step3Icon !!}</div>
                        <div class="step-title">Verifikasi Data</div>
                        <div class="step-description">Pengecekan oleh Admin</div>
                    </div>
                    
                    <!-- Step 4: Hasil Seleksi -->
                     @php
                        $step4Class = '';
                        $step4Icon = '4';
                        $step4Title = 'Hasil Seleksi';
                        if (isset($registration) && $registration->status == 'diterima') {
                            $step4Class = 'completed';
                            $step4Icon = '<i class="fas fa-check"></i>';
                            $step4Title = 'Diterima';
                        } elseif (isset($registration) && $registration->status == 'ditolak') {
                            $step4Class = 'rejected';
                            $step4Icon = '<i class="fas fa-times"></i>';
                            $step4Title = 'Ditolak';
                        }
                    @endphp
                    <div class="step-card {{ $step4Class }}">
                        <div class="step-icon">{!! $step4Icon !!}</div>
                        <div class="step-title">{{ $step4Title }}</div>
                        <div class="step-description">Lihat hasil akhir</div>
                    </div>
                </div>
            </div>

            <!-- Announcement Section -->
            <div class="announcement-section" data-aos="fade-up">
                <div class="announcement-content">
                    <div class="announcement-badge">
                        <i class="fas fa-bullhorn me-2"></i>PENGUMUMAN PENTING
                    </div>
                    <h3 class="announcement-title">PPDB SMAN 1 Pangaribuan 2024/2025</h3>
                    <p class="announcement-text">
                        Pendaftaran dibuka untuk jalur Prestasi, Zonasi, dan Afirmasi. 
                        Pastikan data yang diisi sesuai dengan dokumen asli dan lengkapi semua persyaratan.
                    </p>
                    <div class="deadline-card">
                        <div class="deadline-title">
                            <i class="fas fa-clock"></i> Batas Waktu Pendaftaran:
                        </div>
                        <div class="deadline-date">31 Desember 2024 - 23:59 WIB</div>
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
        AOS.init({ duration: 800, once: true, offset: 50 });

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
            
            // Animate progress bar
            const progressFill = document.getElementById('progressFill');
            if (progressFill) {
                const width = progressFill.style.width;
                progressFill.style.width = '0%';
                setTimeout(() => { 
                    progressFill.style.width = width; 
                }, 500);
            }
        });
    </script>
</body>
</html>