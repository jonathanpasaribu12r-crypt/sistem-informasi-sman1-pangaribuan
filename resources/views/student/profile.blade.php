<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Profil - SMAN 1 Pangaribuan</title>
    
    <!-- CSS Dependencies -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --secondary: #64748b;
            --background: #f8fafc;
            --card-bg: #ffffff;
            --text-primary: #1e293b;
            --text-secondary: #64748b;
            --sidebar-bg: #1e293b;
            --sidebar-active: #334155;
            --border-color: #e2e8f0;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --info: #06b6d4;
        }

        /* === TEMA GELAP === */
        [data-theme="dark"] {
            --primary: #3b82f6;
            --primary-dark: #2563eb;
            --secondary: #94a3b8;
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
            color: var(--text-primary); 
            font-family: 'Segoe UI', sans-serif; 
            overflow-x: hidden; 
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        
        /* === LAYOUT === */
        .dashboard-container { display: flex; min-height: 100vh; }

        /* === SIDEBAR DENGAN ANIMASI === */
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
            background: rgba(0,0,0,0.1);
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
            transition: transform 0.3s ease;
        }
        
        .school-logo:hover {
            transform: rotate(15deg) scale(1.1);
        }
        
        /* === USER INFO DENGAN ONLINE STATUS === */
        .user-info { 
            padding: 20px; 
            text-align: center; 
            border-bottom: 1px solid rgba(255, 255, 255, 0.1); 
            position: relative;
        }
        
        .user-avatar { 
            width: 70px; 
            height: 70px; 
            border-radius: 50%; 
            background: var(--primary); 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            margin: 0 auto 15px; 
            font-size: 1.8rem; 
            border: 3px solid rgba(255, 255, 255, 0.2); 
            overflow: hidden; 
            position: relative;
        }
        
        .user-avatar img { 
            width: 100%; 
            height: 100%; 
            object-fit: cover; 
        }
        
        /* === NAVIGATION DENGAN COUNTER === */
        .sidebar-nav { padding: 20px 0; }
        .nav-link { 
            display: flex; 
            align-items: center; 
            padding: 15px 25px; 
            color: rgba(255, 255, 255, 0.8); 
            text-decoration: none; 
            transition: all 0.3s ease; 
            border-left: 4px solid transparent; 
            position: relative;
        }
        
        .nav-link:hover { 
            background: rgba(255, 255, 255, 0.05); 
            color: white; 
            border-left-color: #3b82f6; 
            padding-left: 30px;
        }
        
        .nav-link.active { 
            background: var(--sidebar-active); 
            color: white; 
            border-left-color: var(--primary); 
            box-shadow: inset 3px 0 10px rgba(37, 99, 235, 0.2);
        }
        
        .nav-icon { 
            width: 20px; 
            margin-right: 15px; 
            text-align: center; 
            font-size: 1.1rem;
        }
        
        .nav-badge {
            position: absolute;
            right: 20px;
            background: var(--danger);
            color: white;
            font-size: 0.7rem;
            padding: 2px 6px;
            border-radius: 10px;
            min-width: 20px;
            text-align: center;
        }
        
        /* === MAIN CONTENT === */
        .main-content { 
            flex: 1; 
            margin-left: 280px; 
            padding: 30px; 
            background: var(--background); 
            min-height: 100vh;
        }
        
        /* === HEADER DENGAN JAM DIGITAL === */
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
            display: flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        /* === HEADER ACTIONS DENGAN JAM DIGITAL === */
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
        
        /* === BREADCRUMB === */
        .breadcrumb {
            background: transparent;
            padding: 0;
            margin-bottom: 25px;
            font-size: 0.9rem;
        }
        
        .breadcrumb-item a {
            color: var(--primary);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .breadcrumb-item a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }
        
        /* === STATS CARDS === */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: var(--card-bg);
            border-radius: 12px;
            padding: 20px;
            border-left: 4px solid var(--primary);
            transition: transform 0.3s ease;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
        
        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            background: rgba(37, 99, 235, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--primary);
            margin-bottom: 15px;
        }
        
        .stat-value {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 5px;
        }
        
        /* === PROFILE CARD === */
        .settings-card { 
            background: var(--card-bg); 
            border-radius: 16px; 
            padding: 30px; 
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
            border: 1px solid var(--border-color);
            position: relative;
            overflow: hidden;
        }
        
        .settings-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--primary-dark));
        }
        
        /* === FORM SECTIONS === */
        .form-section {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px dashed var(--border-color);
        }
        
        .form-section:last-child {
            border-bottom: none;
        }
        
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding: 15px;
            background: rgba(37, 99, 235, 0.05);
            border-radius: 10px;
            border-left: 4px solid var(--primary);
        }
        
        .section-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .section-title i {
            color: var(--primary);
        }
        
        /* === FORM GROUPS DENGAN FLOATING LABEL === */
        .form-floating {
            position: relative;
            margin-bottom: 1.5rem;
        }
        
        .form-floating label {
            color: var(--text-secondary);
            padding-left: 12px;
        }
        
        .form-control { 
            padding: 1rem 1rem; 
            border-radius: 0.75rem; 
            border: 2px solid var(--border-color);
            background: var(--card-bg);
            color: var(--text-primary);
            transition: all 0.3s ease;
            font-size: 1rem;
        }
        
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(37, 99, 235, 0.15);
            transform: translateY(-2px);
        }
        
        /* === AVATAR UPLOAD IMPROVED === */
        .avatar-upload { 
            position: relative; 
            width: 150px; 
            margin: 0 auto 30px; 
        }
        
        .avatar-preview { 
            width: 150px; 
            height: 150px; 
            border-radius: 50%; 
            border: 5px solid var(--card-bg); 
            box-shadow: 0 10px 30px rgba(0,0,0,0.15); 
            overflow: hidden; 
            background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
            display: flex; 
            align-items: center; 
            justify-content: center; 
            transition: all 0.3s ease;
            position: relative;
        }
        
        [data-theme="dark"] .avatar-preview {
            background: linear-gradient(135deg, #334155, #475569);
        }
        
        .avatar-preview:hover {
            transform: scale(1.05);
            box-shadow: 0 15px 40px rgba(37, 99, 235, 0.2);
        }
        
        .avatar-change { 
            position: absolute; 
            bottom: 5px; 
            right: 5px; 
            width: 45px; 
            height: 45px; 
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
            z-index: 2;
        }
        
        .avatar-change:hover { 
            transform: scale(1.2) rotate(90deg); 
            box-shadow: 0 6px 25px rgba(37, 99, 235, 0.4);
        }
        
        /* === PASSWORD STRENGTH METER === */
        .password-strength {
            margin-top: 10px;
        }
        
        .strength-meter {
            height: 5px;
            background: var(--border-color);
            border-radius: 5px;
            overflow: hidden;
            margin-bottom: 5px;
        }
        
        .strength-fill {
            height: 100%;
            width: 0%;
            border-radius: 5px;
            transition: width 0.3s ease, background-color 0.3s ease;
        }
        
        .strength-text {
            font-size: 0.8rem;
            color: var(--text-secondary);
        }
        
        /* === ALERT IMPROVED === */
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
        
        /* === TOAST NOTIFICATION === */
        .toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
        }
        
        .toast {
            background: var(--card-bg);
            border-radius: 12px;
            padding: 15px 20px;
            margin-bottom: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
            border-left: 4px solid var(--success);
            animation: slideInRight 0.5s ease;
            display: none;
        }
        
        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(100%);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        /* === LOADING SPINNER === */
        .spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255,255,255,0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        /* === FOOTER COPYRIGHT === */
        .footer {
            text-align: center;
            padding: 20px;
            margin-top: 40px;
            color: var(--text-secondary);
            font-size: 0.9rem;
            border-top: 1px solid var(--border-color);
        }
        
        /* === BACK TO TOP BUTTON === */
        .back-to-top {
            position: fixed;
            bottom: 80px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: var(--primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            opacity: 0;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
            z-index: 999;
        }
        
        .back-to-top.show {
            opacity: 1;
            transform: translateY(0);
        }
        
        .back-to-top:hover {
            background: var(--primary-dark);
            transform: translateY(-5px);
        }
        
        /* === THEME TOGGLE IMPROVED === */
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
        
        /* === RESPONSIVE DESIGN === */
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
            
            .back-to-top {
                right: 20px;
                bottom: 70px;
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
            
            .stats-grid {
                grid-template-columns: 1fr;
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
        
        /* === PRINT STYLES === */
        @media print {
            .sidebar, .theme-toggle, .back-to-top, .btn {
                display: none !important;
            }
            
            .main-content {
                margin-left: 0 !important;
                padding: 0 !important;
            }
            
            .settings-card {
                box-shadow: none !important;
                border: 1px solid #000 !important;
            }
        }
    </style>
</head>
<body data-theme="light">

    <!-- TOAST NOTIFICATION -->
    <div class="toast-container">
        <div class="toast" id="successToast">
            <i class="fas fa-check-circle me-2 text-success"></i>
            <span id="toastMessage">Perubahan berhasil disimpan!</span>
        </div>
    </div>

    <!-- BACK TO TOP -->
    <div class="back-to-top" onclick="scrollToTop()">
        <i class="fas fa-chevron-up"></i>
    </div>

    <!-- THEME TOGGLE -->
    <div class="theme-toggle" onclick="toggleTheme()">
        <i class="fas fa-moon"></i>
    </div>

    <div class="dashboard-container">
        <!-- SIDEBAR -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="school-logo">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div style="font-weight: 700; font-size: 1.1rem;">SMAN 1 PANGARIBUAN</div>
                <div style="font-size: 0.75rem; opacity: 0.8;">Portal PPDB Digital</div>
            </div>
            
            <div class="user-info">
                <div class="user-avatar">
                    @if(Auth::user()->photo_url)
                        <img src="{{ asset(Auth::user()->photo_url) }}?{{ time() }}" alt="Avatar">
                    @else
                        <i class="fas fa-user"></i>
                    @endif
                </div>
                <div style="font-weight: 600;">{{ Auth::user()->name }}</div>
                <div style="font-size: 0.85rem; opacity: 0.8; background: rgba(255,255,255,0.1); padding: 2px 10px; border-radius: 15px; display: inline-block; margin-top: 5px;">Calon Siswa</div>
                <div style="font-size: 0.75rem; opacity: 0.7; margin-top: 5px;">
                    ID: {{ Auth::id() }}
                </div>
            </div>
            
            <div class="sidebar-nav">
                <a href="{{ route('student.dashboard') }}" class="nav-link">
                    <i class="fas fa-tachometer-alt nav-icon"></i> Dashboard
                </a>
                <a href="{{ route('student.profile') }}" class="nav-link active">
                    <i class="fas fa-user-cog nav-icon"></i> Pengaturan Profil
                </a>
                <a href="{{ route('registrations.create') }}" class="nav-link">
                    <i class="fas fa-edit nav-icon"></i> Formulir Pendaftaran
                    <span class="nav-badge" id="formBadge">1</span>
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
                    <form method="POST" action="{{ route('logout') }}" id="logoutForm">
                        @csrf
                        <button type="button" class="btn btn-danger w-100 btn-sm" onclick="confirmLogout()">
                            <i class="fas fa-sign-out-alt me-2"></i> Keluar
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <!-- BREADCRUMB -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('student.dashboard') }}"><i class="fas fa-home me-1"></i>Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user-cog me-1"></i>Pengaturan Profil</li>
                </ol>
            </nav>
            
            <!-- HEADER DENGAN JAM DIGITAL -->
            <div class="content-header">
                <div>
                    <h1 class="page-title">
                        <i class="fas fa-user-cog"></i>
                        Pengaturan Profil
                    </h1>
                    <p class="text-muted mb-0">Kelola informasi dan preferensi akun Anda</p>
                </div>
                <div class="header-actions">
                    <!-- JAM DIGITAL BESAR -->
                    <div class="header-clock" id="liveClock">
                        <i class="fas fa-clock clock-icon"></i>
                        <div class="clock-content">
                            <div class="clock-time" id="currentTime">00:00:00</div>
                            <div class="clock-date" id="currentDate">Loading...</div>
                        </div>
                    </div>
                    
                    <!-- ONLINE STATUS -->
                    <span class="badge bg-success">
                        <i class="fas fa-circle me-1" style="font-size: 0.5rem;"></i>
                        Online
                    </span>
                </div>
            </div>
            
            <!-- STATS CARDS -->
            <div class="stats-grid mb-4">
                <div class="stat-card" data-aos="fade-up">
                    <div class="stat-icon">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <div class="stat-value" id="profileCompletion">75%</div>
                    <div class="stat-label">Kelengkapan Profil</div>
                </div>
                
                <div class="stat-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div class="stat-value">
                        {{ Auth::user()->created_at->format('d/m/Y') }}
                    </div>
                    <div class="stat-label">Bergabung Sejak</div>
                </div>
                
                <div class="stat-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="stat-icon">
                        <i class="fas fa-history"></i>
                    </div>
                    <div class="stat-value" id="lastUpdate">
                        {{ Auth::user()->updated_at->diffForHumans() }}
                    </div>
                    <div class="stat-label">Terakhir Diperbarui</div>
                </div>
            </div>
            
            <!-- SETTINGS CARD -->
            <div class="settings-card" data-aos="fade-up">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-check-circle me-3" style="font-size: 1.5rem;"></i>
                            <div>
                                <h6 class="alert-heading mb-1">Berhasil!</h6>
                                <p class="mb-0">{{ session('success') }}</p>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                
                <!-- PROGRESS BAR -->
                <div class="mb-4">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="fw-semibold">Progress Kelengkapan Data</span>
                        <span id="completionText">75%</span>
                    </div>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar bg-primary" id="completionBar" style="width: 75%"></div>
                    </div>
                </div>

                <!-- FORM -->
                <form action="{{ route('student.profile.update') }}" method="POST" enctype="multipart/form-data" id="profileForm">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <!-- KOLOM KIRI -->
                        <div class="col-lg-4 mb-4 mb-lg-0">
                            <div class="section-header">
                                <div class="section-title">
                                    <i class="fas fa-id-card"></i>
                                    Foto Profil
                                </div>
                                <span class="badge bg-primary">Wajib</span>
                            </div>
                            
                            <div class="avatar-upload">
                                <div class="avatar-preview" id="avatarPreviewBox">
                                    @if(Auth::user()->photo_url)
                                        <img src="{{ asset(Auth::user()->photo_url) }}?{{ time() }}" alt="Avatar">
                                    @else
                                        <i class="fas fa-user"></i>
                                    @endif
                                </div>
                                <div class="avatar-change" onclick="document.getElementById('profile_photo').click()">
                                    <i class="fas fa-camera"></i>
                                </div>
                            </div>
                            
                            <input type="file" id="profile_photo" name="profile_photo" class="d-none" 
                                   accept="image/*" onchange="previewImage(event)">
                            
                            <div class="mt-4 text-center">
                                <p class="text-muted small">
                                    <i class="fas fa-info-circle me-1"></i>
                                    Format: JPG/PNG, maksimal 2MB
                                </p>
                                @error('profile_photo')
                                    <div class="alert alert-danger small">
                                        <i class="fas fa-exclamation-triangle me-1"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <!-- QUICK TIPS -->
                            <div class="mt-4">
                                <h6 class="fw-semibold mb-3">
                                    <i class="fas fa-lightbulb me-2 text-warning"></i>
                                    Tips Foto Profil
                                </h6>
                                <ul class="list-unstyled small">
                                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Foto formal/seragam</li>
                                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Wajah jelas dan terang</li>
                                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Background polos</li>
                                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Ukuran maksimal 2MB</li>
                                </ul>
                            </div>
                        </div>

                        <!-- KOLOM KANAN -->
                        <div class="col-lg-8">
                            <div class="section-header mb-4">
                                <div class="section-title">
                                    <i class="fas fa-user-edit"></i>
                                    Data Pribadi
                                </div>
                                <span class="badge bg-primary">Wajib Diisi</span>
                            </div>
                            
                            <!-- FORM SECTION 1 -->
                            <div class="form-section">
                                <h6 class="fw-semibold mb-3 text-primary">
                                    <i class="fas fa-user me-2"></i>
                                    Identitas Diri
                                </h6>
                                
                                <div class="form-floating mb-4">
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                                           id="floatingName" placeholder="Nama Lengkap"
                                           value="{{ old('name', Auth::user()->name) }}" required>
                                    <label for="floatingName">
                                        <i class="fas fa-user me-2"></i>
                                        Nama Lengkap
                                    </label>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                
                                <div class="form-floating mb-4">
                                    <input type="email" class="form-control" id="floatingEmail" 
                                           value="{{ Auth::user()->email }}" readonly disabled>
                                    <label for="floatingEmail">
                                        <i class="fas fa-envelope me-2"></i>
                                        Alamat Email
                                    </label>
                                    <div class="form-text mt-2">
                                        <i class="fas fa-lock me-1"></i>
                                        Email tidak dapat diubah. Hubungi admin untuk bantuan.
                                    </div>
                                </div>
                            </div>
                            
                            <!-- FORM SECTION 2 -->
                            <div class="form-section">
                                <h6 class="fw-semibold mb-3 text-primary">
                                    <i class="fas fa-phone me-2"></i>
                                    Kontak & Personal
                                </h6>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-floating">
                                            <input type="tel" name="phone" class="form-control" 
                                                   id="floatingPhone" placeholder="Nomor WhatsApp"
                                                   value="{{ old('phone', Auth::user()->phone ?? '') }}"
                                                   pattern="[0-9]{10,13}">
                                            <label for="floatingPhone">
                                                <i class="fab fa-whatsapp me-2"></i>
                                                Nomor WhatsApp
                                            </label>
                                            <div class="form-text">
                                                Contoh: 081234567890
                                            </div>
                                            @error('phone')
                                                <div class="invalid-feedback d-block">
                                                    <i class="fas fa-exclamation-circle me-1"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 mb-4">
                                        <div class="form-floating">
                                            <input type="date" name="birth_date" class="form-control" 
                                                   id="floatingBirthDate"
                                                   value="{{ old('birth_date', Auth::user()->birth_date ? \Carbon\Carbon::parse(Auth::user()->birth_date)->format('Y-m-d') : '') }}">
                                            <label for="floatingBirthDate">
                                                <i class="fas fa-birthday-cake me-2"></i>
                                                Tanggal Lahir
                                            </label>
                                            @error('birth_date')
                                                <div class="invalid-feedback d-block">
                                                    <i class="fas fa-exclamation-circle me-1"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-floating mb-4">
                                    <textarea name="address" class="form-control" 
                                              id="floatingAddress" placeholder="Alamat Lengkap"
                                              style="height: 120px">{{ old('address', Auth::user()->address ?? '') }}</textarea>
                                    <label for="floatingAddress">
                                        <i class="fas fa-map-marker-alt me-2"></i>
                                        Alamat Lengkap
                                    </label>
                                    <div class="form-text">
                                        Jalan, RT/RW, Kelurahan, Kecamatan, Kota/Kabupaten, Kode Pos
                                    </div>
                                    @error('address')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            
                            <!-- ACTION BUTTONS -->
                            <div class="d-flex justify-content-between align-items-center border-top pt-4 mt-4">
                                <div>
                                    <small class="text-muted">
                                        <i class="fas fa-clock me-1"></i>
                                        Terakhir diperbarui: 
                                        <span id="updateTime">{{ Auth::user()->updated_at->diffForHumans() }}</span>
                                    </small>
                                </div>
                                <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-outline-secondary" onclick="resetForm()">
                                        <i class="fas fa-redo me-2"></i>Reset
                                    </button>
                                    <button type="submit" class="btn btn-primary px-4" id="submitBtn">
                                        <i class="fas fa-save me-2"></i>
                                        <span id="submitText">Simpan Perubahan</span>
                                        <span id="loadingSpinner" class="d-none">
                                            <span class="spinner"></span> Menyimpan...
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            
            <!-- FOOTER -->
            <div class="footer" data-aos="fade-up">
                <p class="mb-2">
                    <i class="fas fa-copyright me-1"></i>
                    {{ date('Y') }} SMAN 1 Pangaribuan. Hak Cipta Dilindungi.
                </p>
                <p class="mb-0 small">
                    <i class="fas fa-shield-alt me-1"></i>
                    Sistem terenkripsi • Terakhir akses: {{ now()->format('d/m/Y H:i') }}
                </p>
            </div>
        </div>
    </div>

    <!-- SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
        // Initialize AOS
        AOS.init({ 
            duration: 800, 
            once: true,
            offset: 50 
        });

        // === FUNGSI UPDATE JAM DIGITAL ===
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

        // === FUNGSI UTAMA ===
        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                // Validasi
                if (file.size > 2 * 1024 * 1024) {
                    showToast('Ukuran file terlalu besar. Maksimal 2MB.', 'error');
                    event.target.value = '';
                    return;
                }
                
                if (!file.type.match('image/jpeg') && !file.type.match('image/png')) {
                    showToast('Format file tidak didukung. Gunakan JPG atau PNG.', 'error');
                    event.target.value = '';
                    return;
                }
                
                // Preview image
                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewBox = document.getElementById('avatarPreviewBox');
                    previewBox.innerHTML = `<img src="${e.target.result}" class="img-fluid">`;
                    updateProfileCompletion();
                }
                reader.readAsDataURL(file);
            }
        }

        // === TOGGLE THEME ===
        function toggleTheme() {
            const currentTheme = document.body.getAttribute('data-theme');
            const newTheme = currentTheme === 'light' ? 'dark' : 'light';
            document.body.setAttribute('data-theme', newTheme);
            
            // Update icon dengan animasi
            const themeIcon = document.querySelector('.theme-toggle i');
            themeIcon.className = newTheme === 'light' ? 'fas fa-moon' : 'fas fa-sun';
            themeIcon.style.transition = 'transform 0.5s ease';
            themeIcon.style.transform = 'rotate(360deg)';
            
            setTimeout(() => {
                themeIcon.style.transform = 'rotate(0deg)';
            }, 500);
            
            // Simpan preference
            localStorage.setItem('theme', newTheme);
            showToast(`Tema diubah ke ${newTheme === 'light' ? 'Terang' : 'Gelap'}`, 'success');
        }

        // === TOAST NOTIFICATION ===
        function showToast(message, type = 'success') {
            const toast = document.getElementById('successToast');
            const messageEl = document.getElementById('toastMessage');
            
            // Update message
            messageEl.textContent = message;
            
            // Update style berdasarkan type
            if (type === 'error') {
                toast.style.borderLeftColor = 'var(--danger)';
                toast.querySelector('i').className = 'fas fa-exclamation-circle me-2 text-danger';
            } else if (type === 'warning') {
                toast.style.borderLeftColor = 'var(--warning)';
                toast.querySelector('i').className = 'fas fa-exclamation-triangle me-2 text-warning';
            } else {
                toast.style.borderLeftColor = 'var(--success)';
                toast.querySelector('i').className = 'fas fa-check-circle me-2 text-success';
            }
            
            // Show toast
            toast.style.display = 'block';
            
            // Auto hide setelah 5 detik
            setTimeout(() => {
                toast.style.display = 'none';
            }, 5000);
        }

        // === PROFILE COMPLETION CALCULATION ===
        function updateProfileCompletion() {
            let completion = 25; // Base score
            
            // Cek field
            const name = document.getElementById('floatingName').value.trim();
            const phone = document.getElementById('floatingPhone').value.trim();
            const birthDate = document.getElementById('floatingBirthDate').value;
            const address = document.getElementById('floatingAddress').value.trim();
            const hasPhoto = document.querySelector('#avatarPreviewBox img') !== null;
            
            if (name) completion += 15;
            if (phone) completion += 15;
            if (birthDate) completion += 15;
            if (address) completion += 15;
            if (hasPhoto) completion += 15;
            
            // Batasi maksimal 100%
            completion = Math.min(completion, 100);
            
            // Update UI
            document.getElementById('profileCompletion').textContent = completion + '%';
            document.getElementById('completionText').textContent = completion + '%';
            document.getElementById('completionBar').style.width = completion + '%';
            
            // Update badge color
            const bar = document.getElementById('completionBar');
            if (completion >= 80) {
                bar.className = 'progress-bar bg-success';
            } else if (completion >= 60) {
                bar.className = 'progress-bar bg-primary';
            } else if (completion >= 40) {
                bar.className = 'progress-bar bg-warning';
            } else {
                bar.className = 'progress-bar bg-danger';
            }
        }

        // === BACK TO TOP ===
        function scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // Toggle back to top button
        window.addEventListener('scroll', function() {
            const backToTop = document.querySelector('.back-to-top');
            if (window.scrollY > 300) {
                backToTop.classList.add('show');
            } else {
                backToTop.classList.remove('show');
            }
        });

        // === FORM SUBMISSION ===
        document.getElementById('profileForm').addEventListener('submit', function(e) {
            const submitBtn = document.getElementById('submitBtn');
            const submitText = document.getElementById('submitText');
            const loadingSpinner = document.getElementById('loadingSpinner');
            
            // Validasi phone
            const phone = document.getElementById('floatingPhone').value;
            if (phone && !/^[0-9]{10,13}$/.test(phone)) {
                e.preventDefault();
                showToast('Nomor WhatsApp harus 10-13 digit angka.', 'error');
                return false;
            }
            
            // Show loading state
            submitText.classList.add('d-none');
            loadingSpinner.classList.remove('d-none');
            submitBtn.disabled = true;
            
            // Simulate auto save notification
            setTimeout(() => {
                showToast('Perubahan berhasil disimpan!', 'success');
                
                // Update last update time
                const now = new Date();
                document.getElementById('updateTime').textContent = 'Baru saja';
                document.getElementById('lastUpdate').textContent = 'Baru saja';
            }, 1500);
        });

        // === RESET FORM ===
        function resetForm() {
            if (confirm('Apakah Anda yakin ingin mengembalikan data ke nilai semula?')) {
                document.getElementById('profileForm').reset();
                updateProfileCompletion();
                showToast('Form telah direset ke nilai awal', 'info');
            }
        }

        // === CONFIRM LOGOUT ===
        function confirmLogout() {
            if (confirm('Apakah Anda yakin ingin keluar?')) {
                document.getElementById('logoutForm').submit();
            }
        }

        // === LIVE FORM VALIDATION ===
        const formInputs = document.querySelectorAll('#profileForm input, #profileForm textarea');
        formInputs.forEach(input => {
            input.addEventListener('input', function() {
                updateProfileCompletion();
                
                // Real-time validation
                if (this.name === 'phone' && this.value) {
                    if (!/^[0-9]{10,13}$/.test(this.value)) {
                        this.classList.add('is-invalid');
                    } else {
                        this.classList.remove('is-invalid');
                    }
                }
            });
        });

        // === AUTO SAVE SIMULATION ===
        let autoSaveTimeout;
        formInputs.forEach(input => {
            input.addEventListener('input', function() {
                clearTimeout(autoSaveTimeout);
                autoSaveTimeout = setTimeout(() => {
                    // Hanya simulasi, tidak benar-benar save
                    console.log('Auto-save simulated');
                }, 3000);
            });
        });

        // === PAGE LOAD ===
        document.addEventListener('DOMContentLoaded', function() {
            // Load saved theme
            const savedTheme = localStorage.getItem('theme') || 'light';
            document.body.setAttribute('data-theme', savedTheme);
            
            // Update theme icon
            const themeIcon = document.querySelector('.theme-toggle i');
            themeIcon.className = savedTheme === 'light' ? 'fas fa-moon' : 'fas fa-sun';
            
            // Initialize jam digital
            updateClock();
            setInterval(updateClock, 1000);
            
            // Animasi jam saat pertama kali load
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
            
            // Initial completion calculation
            updateProfileCompletion();
            
            // Update time every minute
            setInterval(() => {
                const timeElement = document.getElementById('updateTime');
                if (timeElement.textContent.includes('menit')) {
                    timeElement.textContent = 'Baru saja';
                }
            }, 60000);
            
            // Show welcome toast
            setTimeout(() => {
                showToast('Selamat datang di pengaturan profil!', 'success');
            }, 1000);
            
            // Keyboard shortcuts
            document.addEventListener('keydown', function(e) {
                // Ctrl + S untuk save
                if (e.ctrlKey && e.key === 's') {
                    e.preventDefault();
                    document.getElementById('submitBtn').click();
                }
                
                // Esc untuk reset
                if (e.key === 'Escape') {
                    resetForm();
                }
            });
        });
    </script>
</body>
</html>