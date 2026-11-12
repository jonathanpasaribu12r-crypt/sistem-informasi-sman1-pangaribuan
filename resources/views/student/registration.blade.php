<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran - SMAN 1 Pangaribuan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: var(--background);
            color: var(--text-primary);
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
            transition: all 0.3s ease;
            overflow-x: hidden;
        }

        /* Layout */
        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background: var(--sidebar-bg);
            color: white;
            transition: all 0.3s ease;
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

        .school-name {
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 5px;
        }

        .school-motto {
            font-size: 0.75rem;
            opacity: 0.8;
        }

        /* User Info */
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
        }

        .user-name {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .user-role {
            font-size: 0.85rem;
            opacity: 0.8;
            background: rgba(255, 255, 255, 0.1);
            padding: 4px 12px;
            border-radius: 20px;
            display: inline-block;
        }

        .user-id {
            font-size: 0.75rem;
            opacity: 0.7;
            margin-top: 5px;
        }

        /* Navigation */
        .sidebar-nav {
            padding: 20px 0;
        }

        .nav-item {
            margin-bottom: 5px;
        }

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
        }

        /* Header dengan Jam Digital */
        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        [data-theme="dark"] .content-header {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .page-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
        }

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

        /* Form Container */
        .form-container {
            background: var(--card-bg);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.1);
            max-width: 1200px;
            margin: 0 auto;
        }

        .form-header {
            text-align: center;
            margin-bottom: 40px;
            padding-bottom: 25px;
            border-bottom: 2px solid rgba(0, 0, 0, 0.1);
        }

        [data-theme="dark"] .form-header {
            border-bottom: 2px solid rgba(255, 255, 255, 0.1);
        }

        .form-title {
            color: var(--text-primary);
            margin-bottom: 10px;
            font-size: 2.2rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .form-subtitle {
            color: var(--text-secondary);
            font-size: 1.1rem;
        }

        /* Form Sections */
        .form-section {
            margin-bottom: 40px;
            padding: 30px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            background: rgba(0, 0, 0, 0.02);
            transition: all 0.3s ease;
        }

        [data-theme="dark"] .form-section {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .form-section:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .section-title {
            color: var(--text-primary);
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 3px solid var(--primary);
            font-size: 1.4rem;
            font-weight: 700;
            display: flex;
            align-items: center;
        }

        .section-icon {
            margin-right: 12px;
            font-size: 1.3rem;
            color: var(--primary);
        }

        /* Form Elements */
        .form-group {
            margin-bottom: 25px;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -12px;
        }

        .form-col {
            flex: 1;
            padding: 0 12px;
            min-width: 280px;
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--text-primary);
        }

        .required:after {
            content: ' *';
            color: var(--danger);
        }

        input, select, textarea {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: var(--card-bg);
            color: var(--text-primary);
        }

        [data-theme="dark"] input, 
        [data-theme="dark"] select, 
        [data-theme="dark"] textarea {
            border: 2px solid #374151;
            background: #1f2937;
        }

        input:focus, select:focus, textarea:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
            transform: translateY(-1px);
        }

        /* File Upload */
        .file-upload-group {
            margin-bottom: 20px;
        }

        .file-upload-label {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px;
            border: 2px dashed #e2e8f0;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: var(--card-bg);
        }

        [data-theme="dark"] .file-upload-label {
            border: 2px dashed #374151;
        }

        .file-upload-label:hover {
            border-color: var(--primary);
            background: rgba(37, 99, 235, 0.05);
        }

        .file-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .file-icon {
            width: 40px;
            height: 40px;
            background: var(--primary);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }

        .file-details h5 {
            margin: 0;
            font-size: 1rem;
            color: var(--text-primary);
        }

        .file-details p {
            margin: 0;
            font-size: 0.85rem;
            color: var(--text-secondary);
        }

        .file-upload-btn {
            background: var(--primary);
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 0.9rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .file-upload-btn:hover {
            background: var(--primary-dark);
        }

        .file-input {
            display: none;
        }

        .file-requirements {
            font-size: 0.85rem;
            color: var(--text-secondary);
            margin-top: 8px;
            padding-left: 10px;
        }

        .uploaded-file {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid var(--success);
            border-radius: 8px;
            margin-top: 10px;
        }

        .uploaded-file i {
            color: var(--success);
        }

        /* Document Requirements */
        .requirements-list {
            background: rgba(245, 158, 11, 0.1);
            border: 1px solid rgba(245, 158, 11, 0.3);
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 30px;
        }

        .requirements-title {
            color: var(--warning);
            font-weight: 700;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .requirement-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 12px;
            padding: 10px;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 8px;
        }

        [data-theme="dark"] .requirement-item {
            background: rgba(255, 255, 255, 0.1);
        }

        .requirement-item i {
            color: var(--success);
            margin-top: 2px;
        }

        .requirement-text strong {
            color: var(--text-primary);
        }

        .requirement-text p {
            margin: 0;
            color: var(--text-secondary);
            font-size: 0.9rem;
        }

        /* Checkbox Group */
        .checkbox-group {
            display: flex;
            align-items: flex-start;
            margin: 30px 0;
            padding: 25px;
            background: linear-gradient(135deg, rgba(37, 99, 235, 0.05), rgba(37, 99, 235, 0.1));
            border-radius: 15px;
            border-left: 4px solid var(--primary);
            transition: all 0.3s ease;
        }

        .checkbox-group:hover {
            transform: translateX(5px);
        }

        .checkbox-group input {
            width: auto;
            margin-right: 15px;
            margin-top: 5px;
        }

        /* Buttons */
        .form-actions {
            margin-top: 40px;
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }

        [data-theme="dark"] .form-actions {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 15px 35px;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            margin: 0 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(37, 99, 235, 0.4);
        }

        .btn-success {
            background: linear-gradient(135deg, var(--success), #059669);
            color: white;
        }

        .btn-success:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.4);
        }

        .btn-secondary {
            background: linear-gradient(135deg, var(--secondary), #475569);
            color: white;
        }

        .btn-secondary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(100, 116, 139, 0.4);
        }

        /* Alerts and Messages */
        .alert {
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 25px;
            border-left: 4px solid;
            font-weight: 500;
        }

        .alert-success {
            background: rgba(16, 185, 129, 0.1);
            color: var(--success);
            border-left-color: var(--success);
        }

        .alert-warning {
            background: rgba(245, 158, 11, 0.1);
            color: var(--warning);
            border-left-color: var(--warning);
        }

        .form-note {
            background: rgba(245, 158, 11, 0.1);
            border: 1px solid rgba(245, 158, 11, 0.3);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 30px;
            color: var(--warning);
            font-weight: 500;
            border-left: 4px solid var(--warning);
        }

        /* Error and Info Text */
        .error {
            color: var(--danger);
            font-size: 0.9rem;
            margin-top: 8px;
            display: block;
            font-weight: 500;
        }

        .info-text {
            color: var(--text-secondary);
            font-size: 0.85rem;
            margin-top: 6px;
            display: block;
        }

        /* Theme Toggle */
        .theme-toggle {
            background: var(--card-bg);
            border: 2px solid var(--primary);
            color: var(--text-primary);
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 1000;
        }

        .theme-toggle:hover {
            transform: scale(1.1) rotate(15deg);
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .header-clock {
                min-width: 180px;
            }
            
            .clock-time {
                font-size: 1.1rem;
            }
        }
        
        @media (max-width: 992px) {
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
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            
            .main-content {
                margin-left: 0;
                padding: 20px;
            }
            
            .form-container {
                padding: 25px;
            }
            
            .form-row {
                flex-direction: column;
            }
            
            .form-col {
                width: 100%;
            }
            
            .btn {
                padding: 12px 25px;
                font-size: 1rem;
                margin: 5px;
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
    <div class="theme-toggle" onclick="toggleTheme()">
        <i class="fas fa-moon"></i>
    </div>

    <div class="dashboard-container">
        <div class="sidebar">
            <div class="sidebar-header">
                <div class="school-logo">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="school-name">SMAN 1 PANGARIBUAN</div>
                <div class="school-motto">Portal PPDB Digital</div>
            </div>
            
            <div class="user-info">
                <div class="user-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <div class="user-name">{{ Auth::user()->name }}</div>
                <div class="user-role">Calon Peserta Didik</div>
                <div class="user-id">ID: PPDB{{ Auth::id() }}{{ date('Y') }}</div>
            </div>
            
            <div class="sidebar-nav">
                <div class="nav-item">
                    <a href="{{ route('registrations.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <span>Dashboard Utama</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('registrations.create') }}" class="nav-link active">
                        <i class="nav-icon fas fa-edit"></i>
                        <span>Formulir Pendaftaran</span>
                    </a>
                </div>
                <div class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="nav-link" style="background: none; border: none; width: 100%; text-align: left; color: inherit;">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <span>Keluar</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="main-content">
            <div class="content-header">
                <h1 class="page-title">Formulir Pendaftaran</h1>
                <div class="header-actions">
                    <!-- Jam Digital Besar -->
                    <div class="header-clock" id="liveClock">
                        <i class="fas fa-clock clock-icon"></i>
                        <div class="clock-content">
                            <div class="clock-time" id="currentTime">00:00:00</div>
                            <div class="clock-date" id="currentDate">Loading...</div>
                        </div>
                    </div>
                    
                    <!-- Tombol Logout -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-secondary">
                            <i class="fas fa-sign-out-alt"></i>
                            Logout
                        </button>
                    </form>
                </div>
            </div>

            <div class="form-container" data-aos="fade-up">
                <div class="form-header">
                    <h1 class="form-title">Formulir Pendaftaran PPDB</h1>
                    <p class="form-subtitle">SMAN 1 Pangaribuan - Tahun Ajaran 2024/2025</p>
                </div>
                
                @if(session('success'))
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle"></i> {{ session('success') }}
                    </div>
                @endif
                
                @if($errors->any())
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-circle"></i> Ada data yang belum lengkap/salah. Silakan cek kembali.
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                
                <div class="form-note">
                    <strong><i class="fas fa-exclamation-circle"></i> Perhatian:</strong> Isilah formulir ini dengan data yang benar dan sesuai dengan dokumen asli.
                </div>

                @if(isset($registration))
                    <form method="POST" action="{{ route('registrations.update', $registration->id) }}" id="registrationForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                @else
                    <form method="POST" action="{{ route('registrations.store') }}" id="registrationForm" enctype="multipart/form-data">
                    @csrf
                @endif
                    
                    <!-- [Bagian form tetap sama seperti sebelumnya] -->
                    <div class="form-section" data-aos="fade-up" data-aos-delay="100">
                        <h3 class="section-title">
                            <i class="section-icon fas fa-user"></i>
                            A. DATA PRIBADI CALON PESERTA DIDIK
                        </h3>
                        
                        <div class="form-row">
                            <div class="form-col">
                                <div class="form-group">
                                    <label for="nama_lengkap" class="required">Nama Lengkap</label>
                                    <input type="text" id="nama_lengkap" name="nama_lengkap" 
                                           value="{{ old('nama_lengkap', $registration->nama_lengkap ?? '') }}" 
                                           placeholder="Sesuai Akta Kelahiran" required>
                                </div>
                            </div>
                            <div class="form-col">
                                <div class="form-group">
                                    <label for="nisn" class="required">NISN</label>
                                    <input type="text" id="nisn" name="nisn" 
                                           value="{{ old('nisn', $registration->nisn ?? '') }}"
                                           placeholder="10 digit angka" pattern="[0-9]{10}" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-col">
                                <div class="form-group">
                                    <label for="tempat_lahir" class="required">Tempat Lahir</label>
                                    <input type="text" id="tempat_lahir" name="tempat_lahir" 
                                           value="{{ old('tempat_lahir', $registration->tempat_lahir ?? '') }}" required>
                                </div>
                            </div>
                            <div class="form-col">
                                <div class="form-group">
                                    <label for="tanggal_lahir" class="required">Tanggal Lahir</label>
                                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" 
                                           value="{{ old('tanggal_lahir', $registration->tanggal_lahir ?? '') }}" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-col">
                                <div class="form-group">
                                    <label for="jenis_kelamin" class="required">Jenis Kelamin</label>
                                    <select id="jenis_kelamin" name="jenis_kelamin" required>
                                        <option value="">Pilih...</option>
                                        <option value="Laki-laki" {{ (old('jenis_kelamin', $registration->jenis_kelamin ?? '') == 'Laki-laki') ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ (old('jenis_kelamin', $registration->jenis_kelamin ?? '') == 'Perempuan') ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-col">
                                <div class="form-group">
                                    <label for="agama" class="required">Agama</label>
                                    <select id="agama" name="agama" required>
                                        <option value="">Pilih...</option>
                                        <option value="Islam" {{ (old('agama', $registration->agama ?? '') == 'Islam') ? 'selected' : '' }}>Islam</option>
                                        <option value="Kristen" {{ (old('agama', $registration->agama ?? '') == 'Kristen') ? 'selected' : '' }}>Kristen</option>
                                        <option value="Katolik" {{ (old('agama', $registration->agama ?? '') == 'Katolik') ? 'selected' : '' }}>Katolik</option>
                                        <option value="Hindu" {{ (old('agama', $registration->agama ?? '') == 'Hindu') ? 'selected' : '' }}>Hindu</option>
                                        <option value="Buddha" {{ (old('agama', $registration->agama ?? '') == 'Buddha') ? 'selected' : '' }}>Buddha</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-section" data-aos="fade-up" data-aos-delay="150">
                        <h3 class="section-title">
                            <i class="section-icon fas fa-home"></i>
                            B. ALAMAT & KONTAK
                        </h3>
                        
                        <div class="form-group">
                            <label for="alamat" class="required">Alamat Lengkap</label>
                            <textarea id="alamat" name="alamat" rows="2" required>{{ old('alamat', $registration->alamat ?? '') }}</textarea>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-col">
                                <div class="form-group">
                                    <label for="no_hp" class="required">No. HP / WA</label>
                                    <input type="tel" id="no_hp" name="no_hp" 
                                           value="{{ old('no_hp', $registration->no_hp ?? '') }}" required>
                                </div>
                            </div>
                            <div class="form-col">
                                <div class="form-group">
                                    <label for="email" class="required">Email</label>
                                    <input type="email" id="email" name="email" 
                                           value="{{ old('email', $registration->email ?? Auth::user()->email) }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-section" data-aos="fade-up" data-aos-delay="200">
                        <h3 class="section-title">
                            <i class="section-icon fas fa-school"></i>
                            C. SEKOLAH ASAL
                        </h3>
                        
                        <div class="form-group">
                            <label for="asal_sekolah" class="required">Nama Sekolah Asal</label>
                            <input type="text" id="asal_sekolah" name="asal_sekolah" 
                                   value="{{ old('asal_sekolah', $registration->asal_sekolah ?? '') }}" required>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-col">
                                <div class="form-group">
                                    <label for="alamat_sekolah" class="required">Alamat Sekolah</label>
                                    <input type="text" id="alamat_sekolah" name="alamat_sekolah" 
                                           value="{{ old('alamat_sekolah', $registration->alamat_sekolah ?? '') }}" required>
                                </div>
                            </div>
                            <div class="form-col">
                                <div class="form-group">
                                    <label for="tahun_lulus" class="required">Tahun Lulus</label>
                                    <select id="tahun_lulus" name="tahun_lulus" required>
                                        @for($y = date('Y'); $y >= 2020; $y--)
                                            <option value="{{ $y }}" {{ (old('tahun_lulus', $registration->tahun_lulus ?? '') == $y) ? 'selected' : '' }}>{{ $y }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>

                         <div class="form-group">
                            <label for="jalur_pendaftaran" class="required">Jalur Pendaftaran</label>
                            <select id="jalur_pendaftaran" name="jalur_pendaftaran" required>
                                <option value="">Pilih Jalur</option>
                                <option value="zonasi" {{ (old('jalur_pendaftaran', $registration->jalur_pendaftaran ?? '') == 'zonasi') ? 'selected' : '' }}>Zonasi</option>
                                <option value="prestasi" {{ (old('jalur_pendaftaran', $registration->jalur_pendaftaran ?? '') == 'prestasi') ? 'selected' : '' }}>Prestasi</option>
                                <option value="afirmasi" {{ (old('jalur_pendaftaran', $registration->jalur_pendaftaran ?? '') == 'afirmasi') ? 'selected' : '' }}>Afirmasi</option>
                                <option value="perpindahan" {{ (old('jalur_pendaftaran', $registration->jalur_pendaftaran ?? '') == 'perpindahan') ? 'selected' : '' }}>Perpindahan Orang Tua</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-section" data-aos="fade-up" data-aos-delay="250">
                        <h3 class="section-title">
                            <i class="section-icon fas fa-users"></i>
                            D. DATA ORANG TUA/WALI
                        </h3>
                        
                        <div class="form-row">
                            <div class="form-col">
                                <div class="form-group">
                                    <label for="nama_wali" class="required">Nama Orang Tua/Wali</label>
                                    <input type="text" id="nama_wali" name="nama_wali" 
                                           value="{{ old('nama_wali', $registration->nama_wali ?? '') }}" required>
                                </div>
                            </div>
                            <div class="form-col">
                                <div class="form-group">
                                    <label for="pekerjaan_wali" class="required">Pekerjaan</label>
                                    <input type="text" id="pekerjaan_wali" name="pekerjaan_wali" 
                                           value="{{ old('pekerjaan_wali', $registration->pekerjaan_wali ?? '') }}" required>
                                </div>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="no_hp_wali" class="required">No. HP Orang Tua/Wali</label>
                            <input type="tel" id="no_hp_wali" name="no_hp_wali" 
                                   value="{{ old('no_hp_wali', $registration->no_hp_wali ?? '') }}" required>
                        </div>
                    </div>

                    <div class="form-section" data-aos="fade-up" data-aos-delay="300">
                        <h3 class="section-title">
                            <i class="section-icon fas fa-file-upload"></i>
                            E. UPLOAD DOKUMEN (Opsional/Nanti)
                        </h3>
                         <div class="form-note">
                             <small>Fitur upload dokumen ini bersifat opsional. Jika belum siap, bisa dikosongkan.</small>
                         </div>
                        
                        <div class="file-upload-group">
                            <label class="file-upload-label" for="ijazah_file">
                                <div class="file-info">
                                    <div class="file-icon"><i class="fas fa-file-pdf"></i></div>
                                    <div class="file-details">
                                        <h5>Ijazah / SKL</h5>
                                        <p>PDF/JPG Maks 2MB</p>
                                    </div>
                                </div>
                                <div class="file-upload-btn">Pilih File</div>
                                <input type="file" id="ijazah_file" name="ijazah_file" class="file-input" accept=".pdf,.jpg,.jpeg,.png">
                            </label>
                        </div>

                         <div class="file-upload-group">
                            <label class="file-upload-label" for="foto_file">
                                <div class="file-info">
                                    <div class="file-icon"><i class="fas fa-camera"></i></div>
                                    <div class="file-details">
                                        <h5>Pas Foto 3x4</h5>
                                        <p>JPG/PNG Maks 2MB</p>
                                    </div>
                                </div>
                                <div class="file-upload-btn">Pilih File</div>
                                <input type="file" id="foto_file" name="foto_file" class="file-input" accept=".jpg,.jpeg,.png">
                            </label>
                        </div>
                    </div>

                    <div class="form-actions" data-aos="fade-up" data-aos-delay="400">
                        <a href="{{ route('registrations.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-success">
                            @if(isset($registration))
                                <i class="fas fa-sync-alt"></i> Perbarui Data
                            @else
                                <i class="fas fa-paper-plane"></i> Kirim Formulir
                            @endif
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });
        
        // Fungsi untuk toggle tema gelap/terang
        function toggleTheme() {
            const body = document.body;
            const currentTheme = body.getAttribute('data-theme');
            const newTheme = currentTheme === 'light' ? 'dark' : 'light';
            body.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            
            const icon = document.querySelector('.theme-toggle i');
            icon.className = newTheme === 'light' ? 'fas fa-moon' : 'fas fa-sun';
        }
        
        // Muat tema yang disimpan
        const savedTheme = localStorage.getItem('theme') || 'light';
        document.body.setAttribute('data-theme', savedTheme);
        const themeIcon = document.querySelector('.theme-toggle i');
        themeIcon.className = savedTheme === 'light' ? 'fas fa-moon' : 'fas fa-sun';

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
        
        // Inisialisasi jam dan update setiap detik
        document.addEventListener('DOMContentLoaded', function() {
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

        // Script untuk mengubah tampilan tombol saat file dipilih
        document.querySelectorAll('.file-input').forEach(input => {
            input.addEventListener('change', function(e) {
                const fileName = this.files[0]?.name;
                if(fileName) {
                    const label = this.closest('.file-upload-label');
                    const btn = label.querySelector('.file-upload-btn');
                    btn.textContent = 'File Terpilih';
                    btn.style.background = 'var(--success)';
                }
            });
        });
    </script>
</body>
</html>