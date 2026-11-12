<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pendaftar - {{ $registration->nama_lengkap }}</title>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- CSS Dependencies -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* VARIABEL UNTUK TEMA TERANG (DEFAULT) */
        :root { 
            --primary: #2563eb; --primary-dark: #1d4ed8; --secondary: #64748b; 
            --background: #f8fafc; --card-bg: #ffffff; --text-primary: #1e293b; 
            --text-secondary: #64748b; --sidebar-bg: #1e293b; --sidebar-active: #334155;
            --success: #10b981; --danger: #ef4444; --warning: #f59e0b; --info: #06b6d4;
            --border-color: rgba(0, 0, 0, 0.1);
            --shadow: 0 8px 25px rgba(0,0,0,0.08);
            --hover-shadow: 0 15px 35px rgba(0,0,0,0.15);
            --gradient-primary: linear-gradient(135deg, #2563eb, #1d4ed8);
            --gradient-success: linear-gradient(135deg, #10b981, #059669);
            --gradient-warning: linear-gradient(135deg, #f59e0b, #d97706);
            --gradient-danger: linear-gradient(135deg, #ef4444, #dc2626);
            --gradient-info: linear-gradient(135deg, #06b6d4, #0891b2);
        }

        /* VARIABEL UNTUK TEMA GELAP */
        [data-theme="dark"] {
            --primary: #3b82f6; --primary-dark: #2563eb; --secondary: #94a3b8; 
            --background: #0f172a; --card-bg: #1e293b; --text-primary: #f1f5f9; 
            --text-secondary: #cbd5e1; --sidebar-bg: #0f172a; --sidebar-active: #334155;
            --success: #10b981; --danger: #ef4444; --warning: #f59e0b; --info: #06b6d4;
            --border-color: rgba(255, 255, 255, 0.1);
            --shadow: 0 8px 25px rgba(0,0,0,0.3);
            --hover-shadow: 0 15px 35px rgba(0,0,0,0.4);
            --gradient-primary: linear-gradient(135deg, #3b82f6, #2563eb);
            --gradient-success: linear-gradient(135deg, #10b981, #059669);
            --gradient-warning: linear-gradient(135deg, #f59e0b, #d97706);
            --gradient-danger: linear-gradient(135deg, #ef4444, #dc2626);
            --gradient-info: linear-gradient(135deg, #06b6d4, #0891b2);
        }

        body { 
            background: var(--background); 
            font-family: 'Segoe UI', sans-serif; 
            color: var(--text-primary);
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        
        /* Layout */
        .d-flex-wrapper { display: flex; min-height: 100vh; }
        
        /* Sidebar */
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
            border-bottom: 1px solid rgba(255,255,255,0.1); 
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
        
        .nav-link { 
            display: flex; 
            align-items: center; 
            padding: 15px 25px; 
            color: rgba(255,255,255,0.8); 
            text-decoration: none; 
            transition: 0.3s; 
            border-left: 4px solid transparent; 
        }
        
        .nav-link:hover { 
            background: rgba(255,255,255,0.05); 
            color: white; 
            border-left-color: var(--primary); 
        }
        
        .nav-link.active { 
            background: var(--sidebar-active); 
            color: white; 
            border-left-color: var(--primary); 
        }

        /* User Info Sidebar */
        .user-avatar { 
            width: 70px; 
            height: 70px; 
            background: var(--primary); 
            border-radius: 50%; 
            margin: 0 auto 15px; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            overflow: hidden; 
            border: 3px solid rgba(255,255,255,0.2); 
        }
        
        .user-avatar img { 
            width: 100%; 
            height: 100%; 
            object-fit: cover; 
        }
        
        /* Main Content */
        .main-content { 
            margin-left: 280px; 
            padding: 30px; 
            width: 100%; 
            background: var(--background);
            transition: background-color 0.3s ease;
        }
        
        .content-header { 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            margin-bottom: 30px; 
        }
        
        /* Header Profile Kanan Atas */
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
        
        /* Header Avatar */
        .user-avatar-header { 
            width: 40px; 
            height: 40px; 
            margin: 0; 
            font-size: 1.2rem; 
            border-radius: 50%; 
            overflow: hidden; 
            background: var(--primary); 
            display: flex; 
            align-items: center; 
            justify-content: center; 
        }
        
        .user-avatar-header img { 
            width: 100%; 
            height: 100%; 
            object-fit: cover; 
        }

        /* Student Header Card */
        .student-header-card {
            background: var(--gradient-primary);
            border-radius: 20px;
            padding: 30px;
            color: white;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(37, 99, 235, 0.25);
        }
        
        .student-header-bg {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 10rem;
            opacity: 0.1;
            color: white;
        }

        /* Jalur Badge */
        .jalur-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 25px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 14px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.1));
            color: white;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* Info Badges */
        .info-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 10px;
            box-shadow: var(--shadow);
            border: 1px solid var(--border-color);
        }
        
        .info-badge-primary {
            background: linear-gradient(135deg, #eff6ff, #dbeafe);
            color: var(--primary-dark);
            border: 1px solid #bfdbfe;
        }
        
        [data-theme="dark"] .info-badge-primary {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.2), rgba(37, 99, 235, 0.1));
            border-color: rgba(59, 130, 246, 0.3);
        }
        
        .info-badge-success {
            background: linear-gradient(135deg, #f0fdf4, #dcfce7);
            color: #15803d;
            border: 1px solid #bbf7d0;
        }
        
        [data-theme="dark"] .info-badge-success {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.2), rgba(5, 150, 105, 0.1));
            border-color: rgba(16, 185, 129, 0.3);
        }

        /* Detail Cards */
        .detail-card {
            background: var(--card-bg);
            border-radius: 18px;
            padding: 0;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
            border: 1px solid var(--border-color);
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .detail-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--hover-shadow);
        }
        
        .card-header-custom {
            background: var(--gradient-primary);
            color: white;
            padding: 22px 30px;
            font-size: 1.2rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .card-header-icon {
            width: 45px;
            height: 45px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }
        
        .card-body-custom {
            padding: 35px 30px;
        }
        
        /* Detail Items */
        .detail-item {
            margin-bottom: 28px;
            padding-bottom: 28px;
            border-bottom: 1px solid var(--border-color);
        }
        
        .detail-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        
        .detail-label {
            font-size: 13px;
            font-weight: 700;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .detail-label i {
            color: var(--primary);
            font-size: 14px;
        }
        
        .detail-value {
            font-size: 17px;
            font-weight: 600;
            color: var(--text-primary);
            line-height: 1.6;
        }
        
        .detail-value-highlight {
            font-size: 20px;
            font-weight: 800;
            color: var(--primary);
            background: linear-gradient(135deg, #eff6ff, #dbeafe);
            padding: 10px 20px;
            border-radius: 10px;
            display: inline-block;
            border-left: 4px solid var(--primary);
        }
        
        [data-theme="dark"] .detail-value-highlight {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.2), rgba(37, 99, 235, 0.1));
        }

        /* Status Badge */
        .status-badge-large {
            padding: 15px 35px;
            border-radius: 50px;
            font-weight: 800;
            font-size: 17px;
            display: inline-flex;
            align-items: center;
            gap: 15px;
            letter-spacing: 0.5px;
            box-shadow: var(--shadow);
            text-transform: uppercase;
        }
        
        .status-pending { 
            background: linear-gradient(135deg, #ffedd5, #fed7aa);
            color: #c2410c;
            border: 2px solid #fdba74;
        }
        
        .status-diverifikasi { 
            background: linear-gradient(135deg, #eff6ff, #dbeafe);
            color: #1d4ed8;
            border: 2px solid #bfdbfe;
        }
        
        .status-diterima { 
            background: linear-gradient(135deg, #f0fdf4, #dcfce7);
            color: #15803d;
            border: 2px solid #bbf7d0;
        }
        
        .status-ditolak { 
            background: linear-gradient(135deg, #fef2f2, #fee2e2);
            color: #dc2626;
            border: 2px solid #fecaca;
        }

        /* Document Cards */
        .document-card {
            background: linear-gradient(135deg, #f8fafc, #e2e8f0);
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            border: 2px solid #e2e8f0;
            transition: all 0.3s;
            height: 100%;
            position: relative;
            overflow: hidden;
        }
        
        [data-theme="dark"] .document-card {
            background: linear-gradient(135deg, #1e293b, #334155);
            border-color: #475569;
        }
        
        .document-card:hover {
            border-color: var(--primary);
            background: linear-gradient(135deg, #eff6ff, #dbeafe);
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(37, 99, 235, 0.2);
        }
        
        [data-theme="dark"] .document-card:hover {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.2), rgba(37, 99, 235, 0.1));
        }
        
        .document-icon {
            font-size: 3.5rem;
            margin-bottom: 20px;
            display: inline-block;
            width: 90px;
            height: 90px;
            line-height: 90px;
            border-radius: 50%;
            background: var(--card-bg);
            box-shadow: var(--shadow);
            color: var(--primary);
        }
        
        .doc-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
        }
        
        .doc-available {
            background: linear-gradient(135deg, #dcfce7, #bbf7d0);
            color: #15803d;
        }
        
        .doc-missing {
            background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
            color: #64748b;
        }
        
        [data-theme="dark"] .doc-missing {
            background: linear-gradient(135deg, #475569, #334155);
            color: #cbd5e1;
        }

        /* Action Buttons */
        .action-btn-large {
            width: 100%;
            padding: 18px;
            border-radius: 15px;
            font-weight: 800;
            font-size: 16px;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            margin-bottom: 15px;
            transition: all 0.3s;
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }
        
        .action-btn-large:hover {
            transform: translateY(-3px);
            box-shadow: var(--hover-shadow);
        }
        
        .btn-verify {
            background: var(--gradient-info);
            color: white;
        }
        
        .btn-accept {
            background: var(--gradient-success);
            color: white;
        }
        
        .btn-reject {
            background: var(--gradient-danger);
            color: white;
        }

        /* Student Profile */
        .student-profile-card {
            text-align: center;
            padding: 40px;
            background: var(--card-bg);
            border-radius: 20px;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
            border: 2px solid var(--border-color);
        }
        
        .student-avatar {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            background: var(--gradient-primary);
            margin: 0 auto 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3.5rem;
            font-weight: 800;
            box-shadow: 0 15px 35px rgba(37, 99, 235, 0.4);
            border: 5px solid var(--card-bg);
        }

        /* Success Alert */
        .success-alert {
            background: linear-gradient(135deg, #dcfce7, #bbf7d0);
            border: 2px solid #86efac;
            border-radius: 15px;
            padding: 20px 25px;
            color: #166534;
            margin-bottom: 30px;
            box-shadow: 0 5px 20px rgba(34, 197, 94, 0.2);
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .success-alert i {
            font-size: 2rem;
            color: #16a34a;
        }

        /* Buttons */
        .btn {
            transition: all 0.3s ease;
        }
        
        .btn-primary {
            background: var(--gradient-primary);
            border: none;
            color: white;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #1d4ed8, #2563eb);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.3);
        }
        
        .btn-light {
            background: var(--card-bg);
            color: var(--text-primary);
            border: 1px solid var(--border-color);
        }
        
        .btn-light:hover {
            background: var(--background);
            border-color: var(--primary);
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

        /* Alert */
        .alert-info {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(37, 99, 235, 0.05));
            border-color: rgba(59, 130, 246, 0.3);
            color: var(--primary);
        }

        /* Badge */
        .badge {
            border: 1px solid transparent;
        }
        
        .bg-secondary {
            background: linear-gradient(135deg, #64748b, #475569) !important;
            border-color: #64748b !important;
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
            
            .content-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }
        }
        
        @media (max-width: 768px) {
            .student-header-card {
                padding: 20px;
            }
            
            .student-header-bg {
                font-size: 6rem;
                right: 10px;
            }
            
            .card-body-custom {
                padding: 25px 20px;
            }
            
            .student-avatar {
                width: 120px;
                height: 120px;
                font-size: 3rem;
            }
            
            .status-badge-large {
                padding: 12px 25px;
                font-size: 15px;
            }
            
            .action-btn-large {
                padding: 15px;
                font-size: 15px;
            }
        }
    </style>
</head>
<body data-theme="light">

@php
    $photoUrl = Auth::user()->photo_url ? asset(Auth::user()->photo_url) . '?' . time() : null;
    
    // Status Menu Aktif
    $isStudentsActive = request()->routeIs('admin.students') || request()->routeIs('admin.show');
    
    // Status class
    $statusClass = 'status-' . $registration->status;
    $statusText = strtoupper($registration->status == 'pending' ? 'Menunggu' : ($registration->status == 'diverifikasi' ? 'Diverifikasi' : ($registration->status == 'diterima' ? 'Diterima' : 'Ditolak')));
    $statusIcon = $registration->status == 'pending' ? 'clock' : ($registration->status == 'diterima' ? 'check-circle' : ($registration->status == 'ditolak' ? 'times-circle' : 'search'));
@endphp

<!-- Theme Toggle Button -->
<div class="theme-toggle" onclick="toggleTheme()">
    <i class="fas fa-moon"></i>
</div>

<div class="d-flex-wrapper">
    <!-- Sidebar Admin -->
    <div class="sidebar">
        <div class="sidebar-header">
            <div class="school-logo"><i class="fas fa-school"></i></div>
            <div style="font-weight: 700; font-size: 1.1rem;">SMAN 1 PANGARIBUAN</div>
            <small style="opacity: 0.7;">Admin Panel</small>
        </div>
        <div class="user-info text-center border-bottom border-secondary">
            <a href="{{ route('admin.profile') }}" class="text-white text-decoration-none">
                <div class="user-avatar">
                    @if($photoUrl)
                        <img src="{{ $photoUrl }}" alt="Admin">
                    @else
                        <i class="fas fa-user-shield text-white fs-2"></i>
                    @endif
                </div>
                <h6 class="fw-bold mb-0 text-white">{{ Auth::user()->name }}</h6>
                <small class="text-white-50">Administrator</small>
            </a>
        </div>
        <nav class="mt-3">
            <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-tachometer-alt me-3"></i> Dashboard</a>
            <a href="{{ route('admin.students') }}" class="nav-link active"><i class="fas fa-users me-3"></i> Data Pendaftar</a>
            <a href="{{ route('admin.settings') }}" class="nav-link"><i class="fas fa-cogs me-3"></i> Pengaturan Web</a>
            <a href="{{ route('admin.profile') }}" class="nav-link"><i class="fas fa-user-cog me-3"></i> Pengaturan Profil</a>
            <form action="{{ route('logout') }}" method="POST" class="px-4 mt-5">
                @csrf
                <button class="btn btn-outline-light w-100 btn-sm"><i class="fas fa-sign-out-alt me-2"></i> Keluar</button>
            </form>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="content-header">
            <div>
                <a href="{{ route('admin.students') }}" class="btn btn-light border rounded-pill mb-2 text-secondary btn-sm px-3">
                    <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar
                </a>
                <h2 class="fw-bold text-dark m-0">Detail Pendaftar</h2>
            </div>
            
            <!-- Profil Header Kanan Atas -->
            <div class="header-actions">
                <a href="{{ route('admin.profile') }}" class="header-profile">
                    <div class="text-end d-none d-md-block">
                        <div class="fw-bold" style="font-size: 0.9rem;">{{ Auth::user()->name }}</div>
                        <div class="text-secondary" style="font-size: 0.75rem;">Administrator</div>
                    </div>
                    <div class="user-avatar-header">
                        @if($photoUrl)
                            <img src="{{ $photoUrl }}" alt="Admin">
                        @else
                            <i class="fas fa-user-shield text-white"></i>
                        @endif
                    </div>
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="success-alert">
                <i class="fas fa-check-circle"></i>
                <div class="flex-grow-1">
                    <h5 class="fw-bold mb-1">Status Berhasil Diperbarui!</h5>
                    <p class="mb-0">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <!-- Student Header -->
        <div class="student-header-card">
            <div class="position-relative z-2">
                <div class="d-flex align-items-center mb-4">
                    <h1 class="fw-bold mb-0 text-white">Detail Pendaftar</h1>
                    <div class="jalur-badge ms-auto">
                        <i class="fas fa-map-marked-alt"></i>
                        {{ strtoupper($registration->jalur_pendaftaran) }}
                    </div>
                </div>
                
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h2 class="fw-bold mb-3">{{ $registration->nama_lengkap }}</h2>
                        <div class="d-flex flex-wrap gap-2 mb-3">
                            <span class="info-badge info-badge-primary">
                                <i class="fas fa-id-card"></i>
                                NISN: {{ $registration->nisn }}
                            </span>
                            <span class="info-badge info-badge-success">
                                <i class="fas fa-calendar-check"></i>
                                Terdaftar: {{ $registration->created_at->format('d M Y') }}
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <div class="status-badge-large {{ $statusClass }}">
                            <i class="fas fa-{{ $statusIcon }}"></i>
                            {{ $statusText }}
                        </div>
                    </div>
                </div>
            </div>
            <i class="fas fa-user-graduate student-header-bg"></i>
        </div>

        <div class="row">
            <!-- Kolom Kiri: Detail Data -->
            <div class="col-lg-8">
                <!-- Student Profile -->
                <div class="student-profile-card">
                    <div class="student-avatar">
                        {{ strtoupper(substr($registration->nama_lengkap, 0, 1)) }}
                    </div>
                    <h3 class="fw-bold mb-2">{{ $registration->nama_lengkap }}</h3>
                    <p class="text-muted mb-4">{{ $registration->email }}</p>
                    <div class="info-badge info-badge-primary">
                        <i class="fab fa-whatsapp"></i>
                        {{ $registration->no_hp_wali }}
                    </div>
                </div>

                <!-- A. DATA PRIBADI -->
                <div class="detail-card">
                    <div class="card-header-custom">
                        <div class="card-header-icon">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div>Data Pribadi Siswa</div>
                    </div>
                    <div class="card-body-custom">
                        <div class="row">
                            <div class="col-md-6 detail-item">
                                <div class="detail-label">
                                    <i class="fas fa-user"></i>
                                    Nama Lengkap
                                </div>
                                <div class="detail-value-highlight">{{ $registration->nama_lengkap }}</div>
                            </div>
                            <div class="col-md-6 detail-item">
                                <div class="detail-label">
                                    <i class="fas fa-id-card"></i>
                                    NISN
                                </div>
                                <div class="detail-value">{{ $registration->nisn }}</div>
                            </div>
                            <div class="col-md-6 detail-item">
                                <div class="detail-label">
                                    <i class="fas fa-birthday-cake"></i>
                                    Tempat, Tanggal Lahir
                                </div>
                                <div class="detail-value">
                                    {{ $registration->tempat_lahir }}, {{ \Carbon\Carbon::parse($registration->tanggal_lahir)->translatedFormat('d F Y') }}
                                </div>
                            </div>
                            <div class="col-md-6 detail-item">
                                <div class="detail-label">
                                    <i class="fas fa-venus-mars"></i>
                                    Jenis Kelamin
                                </div>
                                <div class="detail-value">{{ $registration->jenis_kelamin }}</div>
                            </div>
                            <div class="col-md-6 detail-item">
                                <div class="detail-label">
                                    <i class="fas fa-pray"></i>
                                    Agama
                                </div>
                                <div class="detail-value">{{ $registration->agama }}</div>
                            </div>
                            <div class="col-md-6 detail-item">
                                <div class="detail-label">
                                    <i class="fas fa-envelope"></i>
                                    Email Siswa
                                </div>
                                <div class="detail-value">{{ $registration->email }}</div>
                            </div>
                            <div class="col-12 detail-item">
                                <div class="detail-label">
                                    <i class="fas fa-home"></i>
                                    Alamat Lengkap
                                </div>
                                <div class="detail-value">{{ $registration->alamat }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- B. DATA SEKOLAH -->
                <div class="detail-card">
                    <div class="card-header-custom" style="background: linear-gradient(135deg, #64748b, #475569);">
                        <div class="card-header-icon">
                            <i class="fas fa-school"></i>
                        </div>
                        <div>Data Sekolah Asal</div>
                    </div>
                    <div class="card-body-custom">
                        <div class="row">
                            <div class="col-md-6 detail-item">
                                <div class="detail-label">
                                    <i class="fas fa-graduation-cap"></i>
                                    Sekolah Asal
                                </div>
                                <div class="detail-value">{{ $registration->asal_sekolah }}</div>
                            </div>
                            <div class="col-md-6 detail-item">
                                <div class="detail-label">
                                    <i class="fas fa-calendar-alt"></i>
                                    Tahun Lulus
                                </div>
                                <div class="detail-value">{{ $registration->tahun_lulus }}</div>
                            </div>
                            <div class="col-12 detail-item">
                                <div class="detail-label">
                                    <i class="fas fa-map-marker-alt"></i>
                                    Alamat Sekolah
                                </div>
                                <div class="detail-value">{{ $registration->alamat_sekolah }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- C. DATA ORANG TUA -->
                <div class="detail-card">
                    <div class="card-header-custom" style="background: linear-gradient(135deg, #059669, #047857);">
                        <div class="card-header-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div>Data Orang Tua / Wali</div>
                    </div>
                    <div class="card-body-custom">
                        <div class="row">
                            <div class="col-md-6 detail-item">
                                <div class="detail-label">
                                    <i class="fas fa-user-friends"></i>
                                    Nama Orang Tua/Wali
                                </div>
                                <div class="detail-value">{{ $registration->nama_wali }}</div>
                            </div>
                            <div class="col-md-6 detail-item">
                                <div class="detail-label">
                                    <i class="fas fa-briefcase"></i>
                                    Pekerjaan Wali
                                </div>
                                <div class="detail-value">{{ $registration->pekerjaan_wali }}</div>
                            </div>
                            <div class="col-md-6 detail-item">
                                <div class="detail-label">
                                    <i class="fab fa-whatsapp"></i>
                                    No. HP Orang Tua
                                </div>
                                <div class="detail-value-highlight">
                                    {{ $registration->no_hp_wali }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan: Panel Aksi & Dokumen -->
            <div class="col-lg-4">
                <!-- Panel Aksi -->
                <div class="detail-card">
                    <div class="card-header-custom" style="background: linear-gradient(135deg, #f59e0b, #d97706);">
                        <div class="card-header-icon">
                            <i class="fas fa-gavel"></i>
                        </div>
                        <div>Tindakan Verifikasi</div>
                    </div>
                    <div class="card-body-custom">
                        <form action="{{ route('admin.updateStatus', $registration->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <p class="text-muted mb-4 text-center">Pilih keputusan untuk siswa ini:</p>
                            
                            <button type="submit" name="status" value="diverifikasi" class="action-btn-large btn-verify">
                                <i class="fas fa-search"></i>
                                <span>Sedang Diverifikasi</span>
                            </button>

                            <button type="submit" name="status" value="diterima" class="action-btn-large btn-accept">
                                <i class="fas fa-check-circle"></i>
                                <span>TERIMA SISWA</span>
                            </button>

                            <button type="submit" name="status" value="ditolak" class="action-btn-large btn-reject" 
                                    onclick="return confirm('Apakah Anda yakin ingin menolak siswa ini? Tindakan ini akan mengubah status siswa menjadi TIDAK LULUS.')">
                                <i class="fas fa-times-circle"></i>
                                <span>TOLAK SISWA</span>
                            </button>
                            
                            <div class="alert alert-info small mt-4 border-0" style="background: #eff6ff; color: #1d4ed8;">
                                <i class="fas fa-info-circle me-2"></i>
                                Perubahan status akan langsung terlihat oleh siswa di dashboard mereka.
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Panel Dokumen -->
                <div class="detail-card">
                    <div class="card-header-custom" style="background: linear-gradient(135deg, #8b5cf6, #7c3aed);">
                        <div class="card-header-icon">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <div>Dokumen Pendukung</div>
                    </div>
                    <div class="card-body-custom">
                        <div class="row g-4">
                            <!-- File Ijazah -->
                            <div class="col-12">
                                <div class="document-card">
                                    @if($registration->ijazah_file)
                                        <span class="doc-badge doc-available">Tersedia</span>
                                    @else
                                        <span class="doc-badge doc-missing">Belum Upload</span>
                                    @endif
                                    <div class="document-icon text-info">
                                        <i class="fas fa-file-pdf"></i>
                                    </div>
                                    <h6 class="fw-bold mb-2">Ijazah / SKL</h6>
                                    @if($registration->ijazah_file)
                                        <a href="{{ asset('uploads/documents/' . $registration->ijazah_file) }}" 
                                           target="_blank" 
                                           class="btn btn-primary btn-sm px-4 py-2 rounded-pill mt-2">
                                            <i class="fas fa-eye me-2"></i> Lihat File
                                        </a>
                                    @else
                                        <span class="badge bg-secondary mt-2 py-2 px-3">Belum Diupload</span>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- File Foto -->
                            <div class="col-12">
                                <div class="document-card">
                                    @if($registration->foto_file)
                                        <span class="doc-badge doc-available">Tersedia</span>
                                    @else
                                        <span class="doc-badge doc-missing">Belum Upload</span>
                                    @endif
                                    <div class="document-icon text-warning">
                                        <i class="fas fa-image"></i>
                                    </div>
                                    <h6 class="fw-bold mb-2">Pas Foto 3x4</h6>
                                    @if($registration->foto_file)
                                        <a href="{{ asset('uploads/documents/' . $registration->foto_file) }}" 
                                           target="_blank" 
                                           class="btn btn-primary btn-sm px-4 py-2 rounded-pill mt-2">
                                            <i class="fas fa-eye me-2"></i> Lihat File
                                        </a>
                                    @else
                                        <span class="badge bg-secondary mt-2 py-2 px-3">Belum Diupload</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
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

    // Efek hover untuk card
    document.querySelectorAll('.detail-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
            this.style.boxShadow = 'var(--hover-shadow)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'var(--shadow)';
        });
    });

    // Efek hover untuk document card
    document.querySelectorAll('.document-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
            this.style.boxShadow = '0 15px 35px rgba(37, 99, 235, 0.25)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'var(--shadow)';
        });
    });

    // Animasi tombol
    document.querySelectorAll('.action-btn-large').forEach(btn => {
        btn.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-3px)';
            this.style.boxShadow = 'var(--hover-shadow)';
        });
        
        btn.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'var(--shadow)';
        });
    });

    // Alert auto hide setelah 5 detik
    document.addEventListener('DOMContentLoaded', function() {
        const alerts = document.querySelectorAll('.success-alert');
        alerts.forEach(alert => {
            setTimeout(() => {
                alert.style.opacity = '0';
                alert.style.transition = 'opacity 0.5s ease';
                setTimeout(() => alert.remove(), 500);
            }, 5000);
        });
    });
</script>
</body>
</html>