<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - SMAN 1 Pangaribuan</title>
    
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
        .sidebar-nav {
            padding: 20px 0;
        }
        
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
        
        .page-title { font-size: 1.8rem; font-weight: 700; color: var(--text-primary); margin: 0; }
        .page-subtitle { color: var(--text-secondary); margin-top: 5px; }
        
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

        /* Stat Cards */
        .stat-card {
            background: var(--card-bg);
            border-radius: 16px;
            padding: 25px;
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
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
        .bg-gradient-primary {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
        }
        
        .bg-gradient-warning {
            background: linear-gradient(135deg, #f59e0b, #d97706);
        }
        
        .bg-gradient-success {
            background: linear-gradient(135deg, #10b981, #059669);
        }
        
        .bg-gradient-info {
            background: linear-gradient(135deg, #06b6d4, #0891b2);
        }

        /* Welcome Banner */
        .welcome-banner {
            background: linear-gradient(135deg, var(--primary), #1e40af);
            border-radius: 20px;
            padding: 40px;
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
            font-size: 12rem;
            opacity: 0.1;
            color: white;
        }

        /* Charts & Quick Actions */
        .chart-card {
            height: 400px;
            background: var(--card-bg);
            border-radius: 16px;
            padding: 25px;
            box-shadow: var(--shadow);
            border: 1px solid var(--border-color);
        }
        
        .action-card {
            background: var(--card-bg);
            border-radius: 16px;
            padding: 25px;
            box-shadow: var(--shadow);
            height: 100%;
            border: 1px solid var(--border-color);
        }
        
        .quick-btn {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
            border-radius: 12px;
            background: var(--background);
            border: 1px solid var(--border-color);
            text-decoration: none;
            color: var(--text-primary);
            transition: all 0.3s ease;
            margin-bottom: 15px;
        }
        
        .quick-btn:hover {
            background: var(--primary-light);
            border-color: var(--primary);
            transform: translateX(5px);
        }
        
        .quick-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: var(--card-bg);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: var(--primary);
            box-shadow: var(--shadow);
        }

        /* Progress Bar */
        .progress {
            background-color: rgba(0, 0, 0, 0.1);
            height: 6px;
            border-radius: 3px;
        }
        
        [data-theme="dark"] .progress {
            background-color: rgba(255, 255, 255, 0.1);
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

        /* Responsive Design */
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
        }
        
        @media (max-width: 768px) {
            .welcome-banner {
                padding: 30px 20px;
            }
            
            .welcome-bg-icon {
                font-size: 8rem;
                right: 10px;
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
            
            .stat-value {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body data-theme="light">
    
    @php
        $photoUrl = Auth::user()->photo_url ? asset(Auth::user()->photo_url) . '?' . time() : null;
        
        // Menghitung Persentase untuk Statistik
        $percentageVerified = $totalSiswa > 0 ? round(($verified / $totalSiswa) * 100) : 0;
    @endphp

    <!-- Theme Toggle Button -->
    <div class="theme-toggle" onclick="toggleTheme()">
        <i class="fas fa-moon"></i>
    </div>

    <div class="dashboard-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header">
                <div class="school-logo"><i class="fas fa-school"></i></div>
                <div class="school-name">SMAN 1 PANGARIBUAN</div>
                <div class="school-motto">Admin Panel</div>
            </div>
            <div class="user-info">
                <div class="user-avatar">
                    @if($photoUrl)
                        <img src="{{ $photoUrl }}" alt="Admin">
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
                    <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.students') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i> Data Pendaftar
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.settings') }}" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i> Pengaturan Web
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.profile') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-cog"></i> Pengaturan Profil
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
            <div class="content-header">
                <div>
                    <h1 class="page-title">Dashboard Overview</h1>
                    <p class="page-subtitle">Ringkasan data PPDB Real-time</p>
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

            <!-- Welcome Banner -->
            <div class="welcome-banner" data-aos="fade-up">
                <div class="position-relative z-2">
                    <h2 class="fw-bold mb-2">Selamat Datang, Administrator!</h2>
                    <p class="mb-4" style="opacity: 0.9; max-width: 700px;">
                        Anda memiliki akses penuh untuk mengelola data pendaftaran siswa baru, memverifikasi berkas, serta mengatur tampilan dan informasi pada website sekolah.
                    </p>
                    <a href="{{ route('admin.students') }}" class="btn btn-light text-primary fw-bold px-4 rounded-pill shadow-sm">
                        <i class="fas fa-users me-2"></i> Mulai Verifikasi Siswa
                    </a>
                </div>
                <i class="fas fa-chart-pie welcome-bg-icon"></i>
            </div>

            <!-- Stats Cards Row -->
            <div class="row g-4 mb-4">
                <!-- Total -->
                <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="0">
                    <div class="stat-card">
                        <div class="stat-icon-wrapper bg-gradient-primary">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stat-label">Total Pendaftar</div>
                        <div class="stat-value">{{ $totalSiswa }}</div>
                        <i class="fas fa-users stat-bg-icon"></i>
                    </div>
                </div>

                <!-- Pending -->
                <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-card">
                        <div class="stat-icon-wrapper bg-gradient-warning">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="stat-label">Menunggu Verifikasi</div>
                        <div class="stat-value">{{ $pending }}</div>
                        <i class="fas fa-clock stat-bg-icon"></i>
                    </div>
                </div>

                <!-- Verified -->
                <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="stat-card">
                        <div class="stat-icon-wrapper bg-gradient-success">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="stat-label">Sudah Diproses</div>
                        <div class="stat-value">{{ $verified }}</div>
                        <i class="fas fa-check-circle stat-bg-icon"></i>
                    </div>
                </div>

                <!-- Percentage -->
                <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="stat-card">
                        <div class="stat-icon-wrapper bg-gradient-info">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="stat-label">Progress Verifikasi</div>
                        <div class="stat-value">{{ $percentageVerified }}%</div>
                        <div class="progress mt-2">
                            <div class="progress-bar bg-info" style="width: {{ $percentageVerified }}%"></div>
                        </div>
                        <i class="fas fa-chart-line stat-bg-icon"></i>
                    </div>
                </div>
            </div>

            <!-- Charts & Actions Row -->
            <div class="row g-4">
                <!-- Grafik -->
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="400">
                    <div class="chart-card">
                        <h5 class="fw-bold mb-4"><i class="fas fa-chart-pie me-2 text-primary"></i> Statistik Pendaftaran</h5>
                        <div style="height: 300px; width: 100%;">
                            <canvas id="registrationChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="500">
                    <div class="action-card">
                        <h5 class="fw-bold mb-4">Akses Cepat</h5>
                        
                        <a href="{{ route('admin.students') }}" class="quick-btn">
                            <div class="quick-icon"><i class="fas fa-list-ul"></i></div>
                            <div>
                                <div class="fw-bold">Data Pendaftar</div>
                                <small class="text-muted">Lihat semua data siswa</small>
                            </div>
                        </a>

                        <a href="{{ route('admin.students.export') }}" class="quick-btn">
                            <div class="quick-icon"><i class="fas fa-file-excel"></i></div>
                            <div>
                                <div class="fw-bold">Export Excel</div>
                                <small class="text-muted">Download laporan CSV</small>
                            </div>
                        </a>

                        <a href="{{ route('admin.settings') }}" class="quick-btn">
                            <div class="quick-icon"><i class="fas fa-globe"></i></div>
                            <div>
                                <div class="fw-bold">Pengaturan Web</div>
                                <small class="text-muted">Ubah info landing page</small>
                            </div>
                        </a>

                        <a href="{{ route('admin.profile') }}" class="quick-btn">
                            <div class="quick-icon"><i class="fas fa-user-shield"></i></div>
                            <div>
                                <div class="fw-bold">Profil Admin</div>
                                <small class="text-muted">Ganti foto & password</small>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
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
            
            // Update chart colors if needed
            updateChartColors(newTheme);
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

        // Setup Chart.js
        const ctx = document.getElementById('registrationChart').getContext('2d');
        let registrationChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Menunggu Verifikasi', 'Sudah Diverifikasi', 'Diterima'],
                datasets: [{
                    data: [{{ $pending }}, {{ $verified }}, {{ $totalSiswa - $pending - $verified }}],
                    backgroundColor: [
                        '#f59e0b', // Warning (Pending)
                        '#3b82f6', // Info (Verified)
                        '#10b981'  // Success (Accepted)
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                            padding: 20,
                            color: function() {
                                const theme = document.body.getAttribute('data-theme');
                                return theme === 'dark' ? '#cbd5e1' : '#1e293b';
                            }
                        }
                    }
                },
                cutout: '70%'
            }
        });

        // Function to update chart colors based on theme
        function updateChartColors(theme) {
            if (registrationChart) {
                registrationChart.options.plugins.legend.labels.color = theme === 'dark' ? '#cbd5e1' : '#1e293b';
                registrationChart.update();
            }
        }

        // Initialize chart colors based on current theme
        document.addEventListener('DOMContentLoaded', function() {
            const currentTheme = document.body.getAttribute('data-theme');
            updateChartColors(currentTheme);
        });
    </script>
</body>
</html>