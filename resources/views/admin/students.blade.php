<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pendaftar - Admin Panel</title>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- CSS Dependencies -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        /* VARIABEL UNTUK TEMA TERANG (DEFAULT) */
        :root {
            --primary: #2563eb; --primary-dark: #1d4ed8; --primary-light: #3b82f6;
            --secondary: #64748b; --accent: #f59e0b; --success: #10b981;
            --danger: #ef4444; --warning: #f59e0b; --info: #06b6d4;
            --background: #f8fafc; --card-bg: #ffffff;
            --text-primary: #1e293b; --text-secondary: #64748b;
            --sidebar-bg: #1e293b; --sidebar-active: #334155;
            --border-color: rgba(0, 0, 0, 0.1);
            --shadow: 0 4px 15px rgba(0,0,0,0.05);
            --hover-shadow: 0 10px 25px rgba(0,0,0,0.1);
            --gradient-primary: linear-gradient(135deg, #2563eb, #1d4ed8);
        }

        /* VARIABEL UNTUK TEMA GELAP */
        [data-theme="dark"] {
            --primary: #3b82f6; --primary-dark: #2563eb; --primary-light: #60a5fa;
            --secondary: #94a3b8; --accent: #f59e0b; --success: #10b981;
            --danger: #ef4444; --warning: #f59e0b; --info: #06b6d4;
            --background: #0f172a; --card-bg: #1e293b;
            --text-primary: #f1f5f9; --text-secondary: #cbd5e1;
            --sidebar-bg: #0f172a; --sidebar-active: #334155;
            --border-color: rgba(255, 255, 255, 0.1);
            --shadow: 0 4px 15px rgba(0,0,0,0.2);
            --hover-shadow: 0 10px 25px rgba(0,0,0,0.3);
            --gradient-primary: linear-gradient(135deg, #3b82f6, #2563eb);
        }

        body { 
            background: var(--background); 
            color: var(--text-primary); 
            font-family: 'Segoe UI', sans-serif; 
            overflow-x: hidden; 
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        
        .dashboard-container { 
            display: flex; 
            min-height: 100vh; 
        }

        /* Sidebar - SAMA DENGAN DASHBOARD */
        .sidebar { 
            width: 280px; 
            background: var(--sidebar-bg); 
            color: white; 
            position: fixed; 
            height: 100vh; 
            overflow-y: auto; 
            z-index: 1000;
            transition: background-color 0.3s ease;
        }
        
        .sidebar-header { 
            padding: 25px 20px; 
            border-bottom: 1px solid rgba(255, 255, 255, 0.1); 
            text-align: center; 
        }
        
        .school-logo { 
            width: 60px; 
            height: 60px; 
            background: var(--gradient-primary); 
            border-radius: 12px; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            margin: 0 auto 15px; 
            font-size: 1.5rem; 
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3); 
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
        .sidebar-nav { 
            padding: 20px 0; 
        }
        
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
            font-size: 1.1rem; 
        }

        /* Main Content */
        .main-content { 
            flex: 1; 
            margin-left: 280px; 
            padding: 30px;
            background: var(--background);
            transition: background-color 0.3s ease;
        }
        
        .content-header { 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            margin-bottom: 30px; 
        }
        
        /* Header Profile - SAMA DENGAN DASHBOARD */
        .header-profile { 
            display: flex; 
            align-items: center; 
            gap: 12px; 
            padding: 8px 15px; 
            background: var(--card-bg); 
            border-radius: 50px; 
            box-shadow: var(--shadow); 
            text-decoration: none; 
            color: var(--text-primary); 
            transition: 0.3s; 
            border: 1px solid var(--border-color); 
        }
        
        .header-profile:hover { 
            transform: translateY(-2px); 
            box-shadow: var(--hover-shadow); 
        }

        /* Welcome Banner Style - SAMA DENGAN DASHBOARD */
        .welcome-banner { 
            background: var(--gradient-primary); 
            border-radius: 20px; 
            padding: 30px; 
            color: white; 
            margin-bottom: 30px; 
            position: relative; 
            overflow: hidden; 
            box-shadow: 0 10px 30px rgba(37, 99, 235, 0.25); 
        }
        
        .welcome-bg-icon { 
            position: absolute; 
            right: 20px; 
            top: 50%; 
            transform: translateY(-50%); 
            font-size: 8rem; 
            opacity: 0.1; 
            color: white; 
        }

        /* Table Card - DIPERBAIKI MIRIP DASHBOARD */
        .table-card { 
            background: var(--card-bg); 
            border-radius: 20px; 
            padding: 0; 
            box-shadow: var(--shadow); 
            position: relative; 
            overflow: hidden; 
            border: 1px solid var(--border-color);
        }

        .table-header { 
            padding: 25px 30px; 
            border-bottom: 1px solid var(--border-color);
            background: var(--background);
        }

        .table-header h3 {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
        }

        .search-box {
            position: relative;
            width: 300px;
        }

        .search-box input {
            width: 100%;
            padding: 12px 20px 12px 45px;
            border: 1px solid var(--border-color);
            border-radius: 12px;
            font-size: 14px;
            transition: all 0.3s;
            background: var(--card-bg);
            color: var(--text-primary);
        }

        .search-box input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-secondary);
            z-index: 10;
        }

        .table { 
            margin: 0;
            border-collapse: separate;
            border-spacing: 0;
        }
        
        .table thead th { 
            background-color: var(--background); 
            color: var(--text-secondary); 
            font-weight: 600; 
            padding: 18px 25px; 
            font-size: 13px; 
            text-transform: uppercase; 
            letter-spacing: 0.5px;
            border-bottom: 2px solid var(--border-color);
            white-space: nowrap;
        }
        
        .table tbody td { 
            padding: 20px 25px; 
            vertical-align: middle; 
            color: var(--text-primary); 
            border-bottom: 1px solid var(--border-color); 
            font-size: 14px;
            transition: all 0.3s;
        }
        
        .table tbody tr:hover {
            background-color: var(--background);
            transform: translateX(5px);
        }

        /* Badges & Buttons - DIPERBAIKI */
        .badge-status { 
            padding: 8px 16px; 
            border-radius: 50px; 
            font-size: 12px; 
            font-weight: 700; 
            display: inline-flex; 
            align-items: center; 
            gap: 8px; 
            letter-spacing: 0.3px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        
        .bg-pending { 
            background: linear-gradient(135deg, #ffedd5, #fed7aa); 
            color: #c2410c; 
            border: 1px solid #fed7aa; 
        }
        
        .bg-diverifikasi { 
            background: linear-gradient(135deg, #dbeafe, #bfdbfe); 
            color: #1d4ed8; 
            border: 1px solid #bfdbfe; 
        }
        
        .bg-diterima { 
            background: linear-gradient(135deg, #dcfce7, #bbf7d0); 
            color: #15803d; 
            border: 1px solid #bbf7d0; 
        }
        
        .bg-ditolak { 
            background: linear-gradient(135deg, #fee2e2, #fecaca); 
            color: #dc2626; 
            border: 1px solid #fecaca; 
        }
        
        .avatar-initial { 
            width: 45px; 
            height: 45px; 
            background: var(--gradient-primary); 
            color: white; 
            border-radius: 50%; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            font-weight: bold; 
            font-size: 18px; 
            margin-right: 15px; 
            flex-shrink: 0;
            box-shadow: 0 4px 10px rgba(37, 99, 235, 0.2);
        }
        
        /* Jalur Badge */
        .badge-jalur { 
            padding: 6px 14px; 
            border-radius: 8px; 
            font-size: 12px; 
            font-weight: 700; 
            background: var(--background); 
            color: var(--text-primary); 
            border: 1px solid var(--border-color); 
            display: inline-block;
            box-shadow: var(--shadow);
        }
        
        /* Action Button - DIPERBAIKI */
        .btn-action { 
            padding: 10px 20px; 
            font-size: 13px; 
            border-radius: 10px; 
            background: var(--gradient-primary);
            color: white;
            border: none;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            box-shadow: var(--shadow);
        }
        
        .btn-action:hover {
            background: linear-gradient(135deg, var(--primary-dark), #1e40af);
            transform: translateY(-2px);
            box-shadow: var(--hover-shadow);
            color: white;
        }
        
        /* Pagination */
        .pagination-container {
            padding: 25px 30px;
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: center;
            background: var(--background);
        }
        
        .pagination {
            margin: 0;
        }
        
        .pagination .page-link {
            padding: 10px 16px;
            font-size: 14px;
            border-radius: 10px;
            margin: 0 5px;
            border: 1px solid var(--border-color);
            color: var(--text-primary);
            font-weight: 600;
            background: var(--card-bg);
            transition: all 0.3s;
        }
        
        .pagination .page-link:hover {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }
        
        .pagination .page-item.active .page-link {
            background: var(--gradient-primary);
            border-color: var(--primary);
            color: white;
            box-shadow: 0 4px 10px rgba(37, 99, 235, 0.2);
        }

        /* Empty State */
        .empty-state {
            padding: 80px 20px;
            text-align: center;
        }
        
        .empty-state i {
            font-size: 4rem;
            opacity: 0.1;
            margin-bottom: 25px;
            color: var(--primary);
        }
        
        .empty-state h6 {
            color: var(--text-secondary);
            font-size: 16px;
            font-weight: 600;
        }

        /* Stats Cards - SAMA DENGAN DASHBOARD */
        .stat-card { 
            background: var(--card-bg); 
            border-radius: 16px; 
            padding: 25px; 
            box-shadow: var(--shadow); 
            position: relative; 
            overflow: hidden; 
            transition: 0.3s; 
            border: 1px solid var(--border-color); 
            height: 100%; 
        }
        
        .stat-card:hover { 
            transform: translateY(-5px); 
            box-shadow: var(--hover-shadow); 
        }
        
        .stat-icon-wrapper { 
            width: 50px; 
            height: 50px; 
            border-radius: 12px; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            font-size: 1.5rem; 
            color: white; 
            margin-bottom: 15px; 
        }
        
        .stat-label { 
            color: var(--text-secondary); 
            font-size: 0.85rem; 
            font-weight: 600; 
            text-transform: uppercase; 
            letter-spacing: 0.5px; 
        }
        
        .stat-value { 
            font-size: 2.2rem; 
            font-weight: 800; 
            color: var(--text-primary); 
            line-height: 1.2; 
        }
        
        .stat-bg-icon { 
            position: absolute; 
            right: -10px; 
            bottom: -10px; 
            font-size: 6rem; 
            opacity: 0.05; 
            transform: rotate(-15deg); 
        }

        /* Colors */
        .bg-gradient-primary { background: linear-gradient(135deg, #3b82f6, #2563eb); }
        .bg-gradient-warning { background: linear-gradient(135deg, #f59e0b, #d97706); }
        .bg-gradient-success { background: linear-gradient(135deg, #10b981, #059669); }
        .bg-gradient-info { background: linear-gradient(135deg, #06b6d4, #0891b2); }

        /* Buttons */
        .btn {
            transition: all 0.3s ease;
        }
        
        .btn-light {
            background: var(--card-bg);
            color: var(--text-primary);
            border: 1px solid var(--border-color);
        }
        
        .btn-light:hover {
            background: var(--background);
            border-color: var(--primary);
            color: var(--primary);
        }
        
        .btn-outline-light {
            border-color: rgba(255, 255, 255, 0.3);
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
            color: var(--text-primary);
        }
        
        .theme-toggle:hover {
            transform: scale(1.1) rotate(15deg);
        }

        /* Text Colors */
        .text-muted {
            color: var(--text-secondary) !important;
        }
        
        .text-dark {
            color: var(--text-primary) !important;
        }
        
        .text-white-50 {
            color: rgba(255, 255, 255, 0.5) !important;
        }

        /* Responsive */
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
            
            .content-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }
            
            .search-box {
                width: 100%;
            }
            
            .header-profile {
                align-self: flex-start;
            }
        }
        
        @media (max-width: 768px) {
            .table-responsive {
                font-size: 13px;
            }
            
            .table thead th,
            .table tbody td {
                padding: 15px 20px;
            }
            
            .avatar-initial {
                width: 40px;
                height: 40px;
                font-size: 16px;
                margin-right: 12px;
            }
            
            .badge-status, .badge-jalur {
                padding: 6px 12px;
                font-size: 11px;
            }
            
            .btn-action {
                padding: 8px 15px;
                font-size: 12px;
            }
        }
    </style>
</head>
<body data-theme="light">

    @php
        $photoUrl = Auth::user()->photo_url ? asset(Auth::user()->photo_url) . '?' . time() : null;
        
        // Status Menu Aktif
        $isDashboardActive = request()->routeIs('admin.dashboard');
        $isProfileActive = request()->routeIs('admin.profile');
        $isStudentsActive = request()->routeIs('admin.students') || request()->routeIs('admin.show');
        $isSettingsActive = request()->routeIs('admin.settings');
    @endphp

    <!-- Theme Toggle Button -->
    <div class="theme-toggle" onclick="toggleTheme()">
        <i class="fas fa-moon"></i>
    </div>

    <div class="dashboard-container">
        <!-- Sidebar - SAMA DENGAN DASHBOARD -->
        <div class="sidebar">
            <div class="sidebar-header">
                <div class="school-logo"><i class="fas fa-school"></i></div>
                <div style="font-weight: 700; font-size: 1.1rem;">SMAN 1 PANGARIBUAN</div>
                <small style="opacity: 0.7;">Admin Panel</small>
            </div>
            <div class="user-info">
                <a href="{{ route('admin.profile') }}" class="text-white text-decoration-none">
                    <div class="user-avatar">
                        @if($photoUrl)
                            <img src="{{ $photoUrl }}" alt="Admin">
                        @else
                            <i class="fas fa-user-shield text-white fs-2"></i>
                        @endif
                    </div>
                    <h6 class="mb-0 fw-bold mt-2">{{ Auth::user()->name }}</h6>
                    <span class="badge bg-primary rounded-pill mt-1">Administrator</span>
                </a>
            </div>
            <div class="sidebar-nav">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ $isDashboardActive ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i> Dashboard
                </a>
                <a href="{{ route('admin.students') }}" class="nav-link {{ $isStudentsActive ? 'active' : '' }}">
                    <i class="nav-icon fas fa-users"></i> Data Pendaftar
                </a>
                <a href="{{ route('admin.settings') }}" class="nav-link {{ $isSettingsActive ? 'active' : '' }}">
                    <i class="nav-icon fas fa-cogs"></i> Pengaturan Web
                </a>
                <a href="{{ route('admin.profile') }}" class="nav-link {{ $isProfileActive ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user-cog"></i> Pengaturan Profil
                </a>
                <div class="px-4 mt-5">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-outline-light w-100 py-2 rounded-pill">
                            <i class="fas fa-sign-out-alt me-2"></i> Keluar
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <div class="content-header">
                <div>
                    <h2 class="fw-bold m-0" style="font-size: 1.8rem;">Data Pendaftar</h2>
                    <p class="text-secondary m-0">Kelola dan verifikasi data calon peserta didik baru</p>
                </div>
                
                <!-- Header Profile Kanan Atas - SAMA DENGAN DASHBOARD -->
                <a href="{{ route('admin.profile') }}" class="header-profile">
                    <div class="text-end d-none d-md-block">
                        <div class="fw-bold" style="font-size: 0.9rem;">{{ Auth::user()->name }}</div>
                        <div class="text-secondary" style="font-size: 0.75rem;">Administrator</div>
                    </div>
                    <div class="user-avatar" style="width: 40px; height: 40px; margin: 0; font-size: 1.2rem;">
                        @if($photoUrl)
                            <img src="{{ $photoUrl }}" alt="Admin">
                        @else
                            <i class="fas fa-user-shield text-white"></i>
                        @endif
                    </div>
                </a>
            </div>

            <!-- Welcome Banner - STYLE SAMA DENGAN DASHBOARD -->
            <div class="welcome-banner" data-aos="fade-up">
                <div class="position-relative z-2">
                    <h3 class="fw-bold mb-2">Verifikasi Data Pendaftar</h3>
                    <p class="mb-3" style="opacity: 0.9; max-width: 700px;">
                        Verifikasi data calon peserta didik dengan teliti. Pastikan semua dokumen dan informasi sudah lengkap sebelum menyetujui pendaftaran.
                    </p>
                    <div class="d-flex gap-2">
                        <div class="search-box">
                            <i class="fas fa-search search-icon"></i>
                            <form action="{{ route('admin.students') }}" method="GET" id="searchForm">
                                <input type="text" name="search" class="form-control" placeholder="Cari Nama / NISN / Email..." value="{{ request('search') }}" 
                                       onkeypress="if(event.keyCode === 13) { document.getElementById('searchForm').submit(); }">
                            </form>
                        </div>
                        <button class="btn btn-light text-primary fw-bold px-4 rounded-pill shadow-sm" onclick="document.getElementById('searchForm').submit()">
                            <i class="fas fa-search me-2"></i> Cari
                        </button>
                    </div>
                </div>
                <i class="fas fa-users welcome-bg-icon"></i>
            </div>

            <!-- Stats Cards Row - STYLE SAMA DENGAN DASHBOARD -->
            @if(isset($stats))
            <div class="row g-4 mb-4">
                <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="0">
                    <div class="stat-card">
                        <div class="stat-icon-wrapper bg-gradient-primary">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stat-label">Total Pendaftar</div>
                        <div class="stat-value">{{ $stats['total'] ?? count($registrations) }}</div>
                        <i class="fas fa-users stat-bg-icon"></i>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-card">
                        <div class="stat-icon-wrapper bg-gradient-warning">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="stat-label">Menunggu</div>
                        <div class="stat-value">{{ $stats['pending'] ?? 0 }}</div>
                        <i class="fas fa-clock stat-bg-icon"></i>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="stat-card">
                        <div class="stat-icon-wrapper bg-gradient-success">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="stat-label">Diterima</div>
                        <div class="stat-value">{{ $stats['accepted'] ?? 0 }}</div>
                        <i class="fas fa-check-circle stat-bg-icon"></i>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="stat-card">
                        <div class="stat-icon-wrapper bg-gradient-info">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="stat-label">Diverifikasi</div>
                        <div class="stat-value">{{ $stats['verified'] ?? 0 }}</div>
                        <i class="fas fa-chart-line stat-bg-icon"></i>
                    </div>
                </div>
            </div>
            @endif

            <!-- Table Card -->
            <div class="table-card" data-aos="fade-up">
                <div class="table-header">
                    <h3><i class="fas fa-list-ul me-2 text-primary"></i> Daftar Calon Peserta Didik</h3>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th width="60">No</th>
                                <th>Nama Lengkap</th>
                                <th width="120">NISN</th>
                                <th width="100">Jalur</th>
                                <th width="120">Status</th>
                                <th width="120">Tanggal Daftar</th>
                                <th width="80" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($registrations as $index => $student)
                            <tr data-aos="fade-up" data-aos-delay="{{ $index * 50 }}">
                                <td>{{ $registrations->firstItem() + $index }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-initial">
                                            {{ strtoupper(substr($student->nama_lengkap, 0, 1)) }}
                                        </div>
                                        <div>
                                            <div class="fw-bold text-dark" style="font-size: 15px;">{{ $student->nama_lengkap }}</div>
                                            <small class="text-muted" style="font-size: 12px;">{{ $student->email }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="fw-bold" style="font-size: 14px;">{{ $student->nisn }}</td>
                                <td>
                                    <span class="badge-jalur">
                                        {{ ucfirst($student->jalur_pendaftaran) }}
                                    </span>
                                </td>
                                <td>
                                    @if($student->status == 'pending')
                                        <span class="badge-status bg-pending">
                                            <i class="fas fa-clock"></i> Menunggu
                                        </span>
                                    @elseif($student->status == 'diverifikasi')
                                        <span class="badge-status bg-diverifikasi">
                                            <i class="fas fa-search"></i> Diverifikasi
                                        </span>
                                    @elseif($student->status == 'diterima')
                                        <span class="badge-status bg-diterima">
                                            <i class="fas fa-check-circle"></i> Diterima
                                        </span>
                                    @else
                                        <span class="badge-status bg-ditolak">
                                            <i class="fas fa-times-circle"></i> Ditolak
                                        </span>
                                    @endif
                                </td>
                                <td style="font-size: 13px; font-weight: 500;">{{ $student->created_at->format('d M Y') }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.show', $student->id) }}" class="btn-action">
                                        <i class="fas fa-eye"></i>
                                        <span class="d-none d-md-inline">Lihat</span>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7">
                                    <div class="empty-state">
                                        <i class="fas fa-users"></i>
                                        <h6 class="mt-3">Belum ada data pendaftar yang masuk.</h6>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                @if(isset($registrations) && $registrations->hasPages())
                    <div class="pagination-container">
                        {{ $registrations->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
        // Initialize AOS
        AOS.init({ duration: 800, once: true });

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

        // Efek hover untuk row tabel
        document.querySelectorAll('tbody tr').forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.transform = 'translateX(5px)';
                this.style.transition = 'transform 0.3s ease';
            });
            
            row.addEventListener('mouseleave', function() {
                this.style.transform = 'translateX(0)';
            });
        });

        // Efek untuk tombol aksi
        document.querySelectorAll('.btn-action').forEach(btn => {
            btn.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
                this.style.boxShadow = 'var(--hover-shadow)';
            });
            
            btn.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = 'var(--shadow)';
            });
        });

        // Efek untuk stat card
        document.querySelectorAll('.stat-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
                this.style.boxShadow = 'var(--hover-shadow)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = 'var(--shadow)';
            });
        });

        // Submit form pencarian dengan tombol enter
        document.addEventListener('keypress', function(e) {
            if (e.key === 'Enter' && e.target.name === 'search') {
                e.preventDefault();
                document.getElementById('searchForm').submit();
            }
        });

        // Clear search when clicking X in search input
        document.querySelectorAll('.search-box input').forEach(input => {
            input.addEventListener('input', function() {
                if (this.value === '') {
                    this.form.submit();
                }
            });
        });

        // Export data functionality (placeholder)
        function exportData(format) {
            const formatName = format === 'excel' ? 'Excel' : 'PDF';
            alert(`Fitur export ke ${formatName} akan segera tersedia!`);
        }
    </script>
</body>
</html>