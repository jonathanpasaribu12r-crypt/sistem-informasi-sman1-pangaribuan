<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Seleksi - SMAN 1 Pangaribuan</title>
    
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

        /* === SIDEBAR === */
        .sidebar { 
            width: 280px; 
            background: var(--sidebar-bg); 
            color: white; 
            position: fixed; 
            height: 100vh; 
            overflow-y: auto; 
            z-index: 1000; 
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
        
        /* === NAVIGATION === */
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

        /* === MAIN CONTENT === */
        .main-content { 
            flex: 1; 
            margin-left: 280px; 
            padding: 30px; 
            background: var(--background);
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

        /* === RESULTS CONTAINER === */
        .results-container { 
            background: var(--card-bg); 
            border-radius: 20px; 
            padding: 40px; 
            box-shadow: 0 10px 40px rgba(0,0,0,0.05); 
            border: 1px solid var(--border-color); 
            max-width: 900px; 
            margin: 0 auto; 
        }
        
        .results-header { 
            text-align: center; 
            margin-bottom: 40px; 
            padding-bottom: 25px; 
            border-bottom: 2px solid var(--border-color); 
        }
        
        .results-title { 
            margin-bottom: 10px; 
            font-size: 2.2rem; 
            font-weight: 800; 
            color: var(--primary); 
        }
        
        /* === STATUS CARDS === */
        .status-card { 
            padding: 40px; 
            border-radius: 16px; 
            margin-bottom: 30px; 
            text-align: center; 
            border: 2px solid transparent; 
            transition: 0.3s; 
        }
        
        .status-pending { 
            background: rgba(245, 158, 11, 0.1); 
            border-color: var(--warning); 
            color: #b45309; 
        }
        
        [data-theme="dark"] .status-pending {
            background: rgba(245, 158, 11, 0.2);
            color: #fbbf24;
        }
        
        .status-accepted { 
            background: rgba(16, 185, 129, 0.1); 
            border-color: var(--success); 
            color: #047857; 
        }
        
        [data-theme="dark"] .status-accepted {
            background: rgba(16, 185, 129, 0.2);
            color: #34d399;
        }
        
        .status-rejected { 
            background: rgba(239, 68, 68, 0.1); 
            border-color: var(--danger); 
            color: #b91c1c; 
        }
        
        [data-theme="dark"] .status-rejected {
            background: rgba(239, 68, 68, 0.2);
            color: #f87171;
        }
        
        .status-icon { 
            font-size: 4rem; 
            margin-bottom: 20px; 
        }
        
        .status-title { 
            font-size: 1.8rem; 
            margin-bottom: 15px; 
            font-weight: 700; 
        }
        
        /* === STUDENT INFO === */
        .student-info { 
            background: linear-gradient(135deg, var(--primary), var(--primary-dark)); 
            color: white; 
            padding: 30px; 
            border-radius: 15px; 
            margin-bottom: 30px; 
            box-shadow: 0 8px 30px rgba(37, 99, 235, 0.3); 
        }
        
        .info-grid { 
            display: grid; 
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); 
            gap: 20px; 
            margin-top: 20px; 
        }
        
        .info-label { 
            font-size: 0.9rem; 
            opacity: 0.8; 
            margin-bottom: 5px; 
        }
        
        .info-value { 
            font-size: 1.1rem; 
            font-weight: 600; 
        }

        .info-box { 
            background: var(--background); 
            border: 1px solid var(--border-color); 
            border-radius: 12px; 
            padding: 25px; 
            margin-top: 25px; 
            text-align: left; 
        }
        
        .info-box h4 { 
            color: var(--text-primary); 
            margin-bottom: 15px; 
            font-size: 1.2rem; 
            font-weight: 700; 
        }

        /* === THEME TOGGLE === */
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
        }

        /* === BUTTONS === */
        .btn {
            padding: 10px 25px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.3);
        }
        
        .btn-secondary {
            background: var(--secondary);
            color: white;
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
            }
            
            .main-content { 
                margin-left: 0; 
                padding: 20px;
            }
            
            .theme-toggle {
                bottom: 20px;
                right: 20px;
            }
            
            .results-container {
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
            
            .info-grid {
                grid-template-columns: 1fr;
            }
            
            .results-title {
                font-size: 1.8rem;
            }
            
            .status-card {
                padding: 25px;
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
    </style>
</head>
<body data-theme="light">

    <!-- Theme Toggle Button -->
    <div class="theme-toggle" onclick="toggleTheme()">
        <i class="fas fa-moon"></i>
    </div>

    <!-- Logic Data -->
    @php
        // Persiapan URL Foto dengan cache busting
        $photoUrl = Auth::user()->photo_url ? asset(Auth::user()->photo_url) . '?' . time() : null;
        $isResultsActive = true;
        $registration = $registration ?? null;
        
        // Status berdasarkan data dari database
        $status = $registration->status ?? 'draft';
        
        // Data peserta dari database
        $nama_lengkap = $registration->nama_lengkap ?? Auth::user()->name;
        $nisn = $registration->nisn ?? '-';
        $jalur_pendaftaran = $registration->jalur_pendaftaran ?? '-';
        $asal_sekolah = $registration->asal_sekolah ?? '-';
        
        // Info tambahan untuk pengumuman
        $tahun_ajaran = date('Y') . '/' . (date('Y') + 1);
        $nomor_referensi = 'PPDB-' . ($registration->id ?? '000000') . '-' . date('Ymd');
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
                <div style="font-size: 0.85rem; opacity: 0.8; margin-top: 5px; background: rgba(255,255,255,0.1); padding: 2px 10px; border-radius: 15px; display: inline-block;">Calon Siswa</div>
            </div>
            
            <div class="sidebar-nav">
                <a href="{{ route('student.dashboard') }}" class="nav-link">
                    <i class="fas fa-tachometer-alt nav-icon"></i> Dashboard
                </a>
                <a href="{{ route('student.profile') }}" class="nav-link">
                    <i class="fas fa-user-cog nav-icon"></i> Pengaturan Profil
                </a>
                <a href="{{ route('registrations.create') }}" class="nav-link">
                    <i class="fas fa-edit nav-icon"></i> Formulir Pendaftaran
                </a>
                <!-- MENU INI AKTIF -->
                <a href="{{ route('student.results') }}" class="nav-link active">
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
                <h1 class="page-title">Hasil Seleksi</h1>
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
                            <div style="font-size: 0.75rem; color: var(--text-secondary);">
                                @if($status == 'diterima')
                                    <i class="fas fa-check-circle text-success me-1"></i>Lolos Seleksi
                                @elseif($status == 'ditolak')
                                    <i class="fas fa-times-circle text-danger me-1"></i>Tidak Lolos
                                @else
                                    <i class="fas fa-clock text-warning me-1"></i>Dalam Proses
                                @endif
                            </div>
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

            <div class="results-container" data-aos="fade-up">
                <div class="results-header">
                    <h1 class="results-title">Pengumuman Hasil Seleksi PPDB</h1>
                    <p style="color: var(--text-secondary);">Tahun Ajaran {{ $tahun_ajaran }}</p>
                    @if($status == 'diterima')
                        <small class="text-muted">Nomor Referensi: {{ $nomor_referensi }}</small>
                    @endif
                </div>

                <!-- Info Siswa -->
                <div class="student-info">
                    <h5 class="mb-4 border-bottom pb-2 border-white border-opacity-25"><i class="fas fa-user-graduate me-2"></i> Data Peserta</h5>
                    <div class="info-grid">
                        <div>
                            <div class="info-label">Nama Lengkap</div>
                            <div class="info-value">{{ $nama_lengkap }}</div>
                        </div>
                        <div>
                            <div class="info-label">NISN</div>
                            <div class="info-value">{{ $nisn }}</div>
                        </div>
                        <div>
                            <div class="info-label">Jalur Pendaftaran</div>
                            <div class="info-value text-uppercase">{{ $jalur_pendaftaran }}</div>
                        </div>
                        <div>
                            <div class="info-label">Asal Sekolah</div>
                            <div class="info-value">{{ $asal_sekolah }}</div>
                        </div>
                    </div>
                </div>

                <!-- Status Card - BERDASARKAN DATA DATABASE -->
                @if($status == 'draft')
                    <div class="status-card status-pending">
                        <div class="status-icon">📝</div>
                        <div class="status-title">BELUM MENDAFTAR</div>
                        <p>Anda belum mengirimkan formulir pendaftaran. Silakan lengkapi formulir Anda terlebih dahulu.</p>
                        <div class="info-box">
                            <h4><i class="fas fa-info-circle me-2" style="color: var(--warning);"></i> Informasi Penting</h4>
                            <p style="color: var(--text-secondary);">Pendaftaran akan ditutup pada 31 Desember 2024. Segera lengkapi formulir Anda sebelum batas waktu.</p>
                        </div>
                        <a href="{{ route('registrations.create') }}" class="btn btn-primary mt-3">
                            <i class="fas fa-edit me-2"></i>Isi Formulir Sekarang
                        </a>
                    </div>

                @elseif($status == 'pending')
                    <div class="status-card status-pending">
                        <div class="status-icon">⏳</div>
                        <div class="status-title">SEDANG DIPROSES</div>
                        <p>Berkas pendaftaran Anda sedang dalam tahap verifikasi oleh panitia PPDB.</p>
                        <div class="info-box">
                            <h4><i class="fas fa-info-circle me-2" style="color: var(--warning);"></i> Informasi Penting</h4>
                            <p style="color: var(--text-secondary);">Harap pantau halaman ini secara berkala. Hasil akan diumumkan sesuai jadwal yang ditentukan.</p>
                        </div>
                        <div class="mt-3">
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" style="width: 60%"></div>
                            </div>
                            <small class="text-muted">Proses verifikasi: 60%</small>
                        </div>
                    </div>

                @elseif($status == 'diterima')
                    <div class="status-card status-accepted">
                        <div class="status-icon">🎉</div>
                        <div class="status-title">SELAMAT! ANDA DITERIMA</div>
                        <p>Selamat! Anda dinyatakan <strong>LULUS</strong> seleksi penerimaan peserta didik baru di SMAN 1 Pangaribuan.</p>
                        <div class="info-box" style="border-color: var(--success);">
                            <h4 style="color: var(--success);"><i class="fas fa-check-circle me-2"></i> Tahap Selanjutnya</h4>
                            <p style="color: var(--text-secondary);">1. Simpan atau cetak hasil seleksi ini.</p>
                            <p style="color: var(--text-secondary);">2. Lakukan Daftar Ulang sesuai jadwal yang ditentukan.</p>
                            <p style="color: var(--text-secondary);">3. Bawa dokumen asli ke sekolah untuk verifikasi fisik.</p>
                        </div>
                        <button class="btn btn-success mt-3" onclick="printResults()">
                            <i class="fas fa-print me-2"></i>Cetak Hasil Seleksi
                        </button>
                    </div>

                @elseif($status == 'ditolak')
                    <div class="status-card status-rejected">
                        <div class="status-icon">😔</div>
                        <div class="status-title">MAAF, BELUM BERHASIL</div>
                        <p>Mohon maaf, Anda dinyatakan <strong>TIDAK LULUS</strong> seleksi pada tahap ini.</p>
                        <div class="info-box" style="border-color: var(--danger);">
                            <h4 style="color: var(--danger);"><i class="fas fa-exclamation-triangle me-2"></i> Catatan</h4>
                            <p style="color: var(--text-secondary);">Jangan patah semangat! Tetap berjuang dan coba lagi di kesempatan lain.</p>
                            <p style="color: var(--text-secondary);">Anda bisa mencoba mendaftar melalui jalur lain atau di tahun ajaran berikutnya.</p>
                        </div>
                    </div>

                @else
                     <div class="status-card status-pending">
                        <div class="status-icon">🔍</div>
                        <div class="status-title">MENUNGGU VERIFIKASI</div>
                        <p>Data Anda sedang dalam antrean verifikasi. Mohon menunggu.</p>
                    </div>
                @endif

                <!-- Contact Information -->
                <div class="info-box" data-aos="fade-up" data-aos-delay="200">
                    <h4><i class="fas fa-phone"></i> Pusat Bantuan & Kontak</h4>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <p style="color: var(--text-secondary);"><strong><i class="fas fa-phone me-2"></i>Telepon:</strong> (0631) 123456</p>
                            <p style="color: var(--text-secondary);"><strong><i class="fas fa-envelope me-2"></i>Email:</strong> info@sman1pangaribuan.sch.id</p>
                        </div>
                        <div class="col-md-6">
                            <p style="color: var(--text-secondary);"><strong><i class="fas fa-map-marker-alt me-2"></i>Alamat:</strong> Jl. Pendidikan No. 1, Pangaribuan</p>
                            <p style="color: var(--text-secondary);"><strong><i class="fas fa-clock me-2"></i>Jam Operasional:</strong> Senin - Jumat, 08:00 - 16:00 WIB</p>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div style="text-align: center; margin-top: 30px;" data-aos="fade-up" data-aos-delay="250">
                    <a href="{{ route('student.dashboard') }}" class="btn btn-secondary me-2">
                        <i class="fas fa-arrow-left me-2"></i>Kembali ke Dashboard
                    </a>
                    @if($status == 'draft')
                        <a href="{{ route('registrations.create') }}" class="btn btn-primary">
                            <i class="fas fa-edit me-2"></i>Isi Formulir
                        </a>
                    @else
                        <a href="{{ route('registrations.create') }}" class="btn btn-primary">
                            <i class="fas fa-eye me-2"></i>Lihat Formulir
                        </a>
                    @endif
                </div>
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
            localStorage.setItem('theme', newTheme);
            
            // Update icon
            const icon = document.querySelector('.theme-toggle i');
            icon.className = newTheme === 'light' ? 'fas fa-moon' : 'fas fa-sun';
        }
        
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
        
        // Print results
        function printResults() {
            const name = '{{ $nama_lengkap }}';
            const date = new Date().toLocaleDateString('id-ID', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
            
            const content = `
                <div style="font-family: Arial, sans-serif; padding: 40px; max-width: 800px; margin: 0 auto;">
                    <div style="text-align: center; border-bottom: 3px solid #2563eb; padding-bottom: 20px; margin-bottom: 30px;">
                        <h1 style="color: #2563eb; margin-bottom: 10px;">SMAN 1 PANGARIBUAN</h1>
                        <h2 style="color: #333;">BUKTI HASIL SELEKSI PPDB</h2>
                        <p>Tahun Ajaran {{ $tahun_ajaran }}</p>
                        <p>Nomor Referensi: {{ $nomor_referensi }}</p>
                    </div>
                    
                    <div style="background: #f8f9fa; padding: 30px; border-radius: 10px; margin-bottom: 30px;">
                        <h3 style="color: #10b981; text-align: center; margin-bottom: 30px;">
                            <i class="fas fa-check-circle"></i> SELAMAT! ANDA DITERIMA
                        </h3>
                        
                        <div style="margin-bottom: 20px;">
                            <strong>Nama Lengkap:</strong> ${name}<br>
                            <strong>NISN:</strong> {{ $nisn }}<br>
                            <strong>Jalur Pendaftaran:</strong> {{ $jalur_pendaftaran }}<br>
                            <strong>Asal Sekolah:</strong> {{ $asal_sekolah }}<br>
                            <strong>Tanggal Cetak:</strong> ${date}
                        </div>
                    </div>
                    
                    <div style="margin-top: 40px; text-align: center; color: #666; font-size: 12px;">
                        <p>Dokumen ini sah sebagai bukti hasil seleksi.<br>
                        Harap dibawa saat daftar ulang.</p>
                        <p style="margin-top: 20px;">TTD,<br>
                        <strong>Panitia PPDB SMAN 1 Pangaribuan</strong></p>
                    </div>
                </div>
            `;
            
            const printWindow = window.open('', '_blank');
            printWindow.document.write(`
                <!DOCTYPE html>
                <html>
                <head>
                    <title>Hasil Seleksi - ${name}</title>
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
                    <style>
                        @media print {
                            body { margin: 0; }
                            @page { margin: 20mm; }
                        }
                    </style>
                </head>
                <body>
                    ${content}
                    <script>
                        window.onload = function() {
                            window.print();
                            setTimeout(function() {
                                window.close();
                            }, 1000);
                        };
                    <\/script>
                </body>
                </html>
            `);
            printWindow.document.close();
        }
    </script>
</body>
</html>