<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Web - Admin Panel</title>
    
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
            --shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            --hover-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            --input-bg: #ffffff;
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
            --shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            --hover-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
            --input-bg: #1e293b;
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
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
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

        /* Settings Card */
        .settings-card { 
            background: var(--card-bg); 
            border-radius: 16px; 
            padding: 30px; 
            box-shadow: var(--shadow); 
            border: 1px solid var(--border-color); 
            margin-bottom: 25px; 
            transition: all 0.3s ease; 
            position: relative;
            overflow: hidden;
        }
        
        .settings-card:hover {
            box-shadow: var(--hover-shadow);
        }
        
        .settings-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        }
        
        .settings-section-title { 
            display: flex; 
            align-items: center; 
            margin-bottom: 25px; 
        }
        
        .settings-icon { 
            width: 50px; 
            height: 50px; 
            border-radius: 12px; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            font-size: 1.5rem; 
            color: white; 
            margin-right: 15px; 
            background: linear-gradient(135deg, var(--primary), var(--primary-dark)); 
        }
        
        /* Tabs */
        .settings-tabs { 
            display: flex; 
            flex-wrap: wrap; 
            gap: 10px; 
            margin-bottom: 30px; 
            background: var(--card-bg); 
            padding: 20px; 
            border-radius: 12px; 
            box-shadow: var(--shadow); 
            border: 1px solid var(--border-color);
        }
        
        .settings-tab { 
            padding: 12px 24px; 
            background: transparent; 
            border: 2px solid var(--primary); 
            color: var(--primary); 
            border-radius: 10px; 
            font-weight: 600; 
            cursor: pointer; 
            transition: all 0.3s ease; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            gap: 8px; 
        }
        
        .settings-tab.active { 
            background: var(--primary); 
            color: white; 
            transform: translateY(-2px); 
            box-shadow: 0 5px 15px rgba(37, 99, 235, 0.2); 
        }
        
        .settings-tab:hover:not(.active) { 
            background: rgba(37, 99, 235, 0.1); 
            transform: translateY(-2px); 
        }
        
        /* Form Elements */
        .form-control, .form-select { 
            background: var(--input-bg); 
            color: var(--text-primary); 
            border: 2px solid var(--border-color); 
            border-radius: 10px; 
            padding: 12px 15px; 
            transition: all 0.3s ease; 
        }
        
        .form-control:focus, .form-select:focus { 
            border-color: var(--primary); 
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1); 
            background: var(--input-bg);
            color: var(--text-primary);
        }
        
        /* File Upload Cards */
        .file-card { 
            background: var(--card-bg); 
            border-radius: 12px; 
            padding: 25px; 
            border: 1px solid var(--border-color); 
            transition: all 0.3s ease; 
            height: 100%;
            position: relative;
            overflow: hidden;
        }
        
        .file-card:hover { 
            transform: translateY(-5px); 
            box-shadow: var(--hover-shadow); 
            border-color: var(--primary-light);
        }
        
        .file-header { 
            display: flex; 
            align-items: center; 
            margin-bottom: 20px; 
        }
        
        .file-icon-container { 
            width: 70px; 
            height: 70px; 
            border-radius: 12px; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            font-size: 1.8rem; 
            margin-right: 15px; 
            flex-shrink: 0;
        }
        
        .file-icon-primary { 
            background: linear-gradient(135deg, rgba(37, 99, 235, 0.1), rgba(37, 99, 235, 0.2)); 
            color: var(--primary); 
            border: 2px solid rgba(37, 99, 235, 0.3);
        }
        
        .file-icon-success { 
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(16, 185, 129, 0.2)); 
            color: var(--success); 
            border: 2px solid rgba(16, 185, 129, 0.3);
        }
        
        .file-icon-warning { 
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.1), rgba(245, 158, 11, 0.2)); 
            color: var(--warning); 
            border: 2px solid rgba(245, 158, 11, 0.3);
        }
        
        .file-icon-info { 
            background: linear-gradient(135deg, rgba(6, 182, 212, 0.1), rgba(6, 182, 212, 0.2)); 
            color: var(--info); 
            border: 2px solid rgba(6, 182, 212, 0.3);
        }
        
        .file-title { 
            font-weight: 700; 
            font-size: 1.1rem; 
            margin-bottom: 5px; 
            color: var(--text-primary);
        }
        
        .file-description { 
            color: var(--text-secondary); 
            font-size: 0.85rem; 
            margin-bottom: 0;
        }
        
        .file-upload-area { 
            border: 2px dashed var(--border-color); 
            border-radius: 10px; 
            padding: 15px; 
            background: var(--background); 
            text-align: center; 
            cursor: pointer; 
            transition: all 0.3s ease; 
            margin-bottom: 15px;
        }
        
        .file-upload-area:hover { 
            border-color: var(--primary); 
            background: rgba(37, 99, 235, 0.02);
        }
        
        .file-status { 
            padding: 6px 12px; 
            border-radius: 20px; 
            font-size: 0.75rem; 
            font-weight: 600; 
            display: inline-block; 
        }
        
        .status-available { 
            background: rgba(16, 185, 129, 0.15); 
            color: var(--success); 
        }
        
        .status-unavailable { 
            background: rgba(239, 68, 68, 0.15); 
            color: var(--danger); 
        }
        
        /* Upload Area */
        .upload-area { 
            border: 3px dashed var(--border-color); 
            border-radius: 15px; 
            padding: 40px 20px; 
            text-align: center; 
            background: var(--background); 
            cursor: pointer; 
            transition: all 0.3s ease; 
        }
        
        .upload-area:hover { 
            border-color: var(--primary); 
            background: rgba(37, 99, 235, 0.02); 
        }
        
        .upload-icon { 
            font-size: 3rem; 
            color: var(--secondary); 
            margin-bottom: 15px; 
        }
        
        /* Alerts */
        .alert {
            background: var(--card-bg);
            border: 1px solid transparent;
            color: var(--text-primary);
            border-radius: 12px;
            padding: 15px 20px;
        }
        
        .alert-info {
            background: rgba(6, 182, 212, 0.1);
            border-color: var(--info);
            color: var(--info);
        }
        
        .alert-warning {
            background: rgba(245, 158, 11, 0.1);
            border-color: var(--warning);
            color: var(--warning);
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
        
        /* Sticky Footer */
        .sticky-footer {
            background: var(--card-bg);
            border-top: 1px solid var(--border-color);
            margin-left: -30px;
            margin-right: -30px;
            padding: 20px 30px;
            position: sticky;
            bottom: 0;
            z-index: 99;
            box-shadow: 0 -5px 20px rgba(0,0,0,0.1);
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
            
            .sticky-footer {
                margin-left: -25px;
                margin-right: -25px;
                padding: 15px 25px;
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
            
            .file-header {
                flex-direction: column;
                text-align: center;
            }
            
            .file-icon-container {
                margin-right: 0;
                margin-bottom: 15px;
            }
            
            .settings-tabs {
                overflow-x: auto;
                flex-wrap: nowrap;
                padding-bottom: 10px;
            }
            
            .settings-tab {
                white-space: nowrap;
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
            
            .settings-card {
                padding: 20px;
            }
        }
        
        /* Gallery Styles - Kembali ke format sederhana */
        .gallery-item-card { 
            background: var(--background); 
            border: 1px solid var(--border-color); 
            border-radius: 12px; 
            padding: 20px; 
            position: relative; 
            margin-bottom: 15px; 
        }
        
        .gallery-delete-btn { 
            position: absolute; 
            top: 10px; 
            right: 10px; 
            color: var(--danger); 
            background: var(--card-bg); 
            border-radius: 50%; 
            width: 30px; 
            height: 30px; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            box-shadow: 0 2px 5px rgba(0,0,0,0.1); 
            cursor: pointer; 
            transition: 0.2s; 
            border: 1px solid var(--border-color);
        }
        
        .gallery-delete-btn:hover { 
            background: var(--danger); 
            color: white; 
        }
        
        .image-preview { 
            position: relative; 
            border-radius: 12px; 
            overflow: hidden; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.1); 
            margin-bottom: 15px; 
        }
        
        .image-preview img, .image-preview iframe { 
            width: 100%; 
            height: 200px; 
            object-fit: cover; 
        }
    </style>
</head>
<body data-theme="light">

    @php
        $photoUrl = Auth::user()->photo_url ? asset(Auth::user()->photo_url) . '?' . time() : null;
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
                    <a href="{{ route('admin.settings') }}" class="nav-link active">
                        <i class="nav-icon fas fa-cogs"></i>
                        <span>Pengaturan Web</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.profile') }}" class="nav-link">
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
                        <i class="fas fa-cogs text-primary"></i>
                        Pengaturan Website
                    </h1>
                    <p class="page-subtitle">Kelola konten dan informasi halaman depan sekolah</p>
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
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle me-2"></i>
                        <div>{{ session('success') }}</div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
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

            <!-- Tab Navigation -->
            <div class="settings-tabs">
                <button class="settings-tab active" onclick="showTab('general')">
                    <i class="fas fa-cog"></i> Umum
                </button>
                <button class="settings-tab" onclick="showTab('documents')">
                    <i class="fas fa-file-pdf"></i> Dokumen
                </button>
                <button class="settings-tab" onclick="showTab('hero')">
                    <i class="fas fa-home"></i> Hero Section
                </button>
                <button class="settings-tab" onclick="showTab('schedule')">
                    <i class="fas fa-calendar-alt"></i> Jadwal
                </button>
                <button class="settings-tab" onclick="showTab('gallery')">
                    <i class="fas fa-images"></i> Galeri
                </button>
            </div>

            <!-- Settings Form -->
            <form id="settingsForm" method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
                @csrf
                
                <!-- Tab: Pengaturan Umum -->
                <div id="generalTab" class="settings-tab-content">
                    <div class="settings-card" data-aos="fade-up">
                        <div class="settings-section-title">
                            <div class="settings-icon"><i class="fas fa-info-circle"></i></div>
                            <h4>Informasi Sekolah</h4>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Nama Sekolah</label>
                                <input type="text" class="form-control" name="school_name" value="{{ $settings['school_name'] ?? 'SMAN 1 PANGARIBUAN' }}" placeholder="Nama Sekolah">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Motto Sekolah</label>
                                <input type="text" class="form-control" name="school_motto" value="{{ $settings['school_motto'] ?? '' }}" placeholder="Motto Sekolah">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Deskripsi Sekolah</label>
                                <textarea class="form-control" name="school_description" rows="3">{{ $settings['school_description'] ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="settings-card" data-aos="fade-up">
                        <div class="settings-section-title">
                            <div class="settings-icon"><i class="fas fa-phone"></i></div>
                            <h4>Kontak & Alamat</h4>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Alamat</label>
                                <textarea class="form-control" name="contact_address" rows="2">{{ $settings['contact_address'] ?? '' }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control" name="contact_phone" value="{{ $settings['contact_phone'] ?? '' }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="contact_email" value="{{ $settings['contact_email'] ?? '' }}">
                            </div>
                        </div>
                    </div>
                    
                    <div class="settings-card" data-aos="fade-up">
                        <div class="settings-section-title">
                            <div class="settings-icon"><i class="fas fa-toggle-on"></i></div>
                            <h4>Status Pendaftaran</h4>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status PPDB</label>
                            <select class="form-select" name="ppdb_status">
                                <option value="1" {{ ($settings['ppdb_status'] ?? '0') == '1' ? 'selected' : '' }}>Dibuka</option>
                                <option value="0" {{ ($settings['ppdb_status'] ?? '0') == '0' ? 'selected' : '' }}>Ditutup</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Tab: Dokumen PDF -->
                <div id="documentsTab" class="settings-tab-content" style="display: none;">
                    <div class="settings-card" data-aos="fade-up">
                        <div class="settings-section-title">
                            <div class="settings-icon"><i class="fas fa-file-pdf"></i></div>
                            <div>
                                <h4>Dokumen Download</h4>
                                <p class="text-muted mb-0">File PDF yang akan tersedia untuk di-download oleh calon siswa</p>
                            </div>
                        </div>
                        
                        <div class="alert alert-info mb-4">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-info-circle me-3"></i>
                                <div>
                                    <strong>Informasi:</strong> Upload file dalam format PDF (maksimal 5MB). 
                                    File yang sudah ada akan diganti dengan yang baru.
                                </div>
                            </div>
                        </div>

                        <div class="row g-4">
                            <!-- FORMULIR PENDAFTARAN -->
                            <div class="col-lg-6">
                                <div class="file-card">
                                    <div class="file-header">
                                        <div class="file-icon-container file-icon-primary">
                                            <i class="fas fa-file-alt"></i>
                                        </div>
                                        <div>
                                            <h5 class="file-title">Formulir Pendaftaran</h5>
                                            <p class="file-description">Formulir pendaftaran siswa baru PPDB</p>
                                        </div>
                                    </div>
                                    
                                    <div class="file-upload-area" onclick="document.getElementById('formulirInput').click()">
                                        <i class="fas fa-cloud-upload-alt mb-2" style="font-size: 1.5rem; color: var(--primary);"></i>
                                        <p class="mb-0 small">Klik untuk upload file baru</p>
                                        <small class="text-muted">Format: PDF, Maks: 5MB</small>
                                    </div>
                                    <input type="file" id="formulirInput" name="formulir_file" class="d-none" accept=".pdf" onchange="previewFileName(this, 'formulir')">
                                    
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <span class="file-status {{ !empty($settings['formulir_file']) && file_exists(public_path($settings['formulir_file'])) ? 'status-available' : 'status-unavailable' }}">
                                            <i class="fas {{ !empty($settings['formulir_file']) && file_exists(public_path($settings['formulir_file'])) ? 'fa-check-circle' : 'fa-times-circle' }} me-1"></i>
                                            {{ !empty($settings['formulir_file']) && file_exists(public_path($settings['formulir_file'])) ? 'Tersedia' : 'Belum ada' }}
                                        </span>
                                        
                                        @if(!empty($settings['formulir_file']) && file_exists(public_path($settings['formulir_file'])))
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ asset($settings['formulir_file']) }}" target="_blank" class="btn btn-outline-primary">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ asset($settings['formulir_file']) }}" download class="btn btn-primary">
                                                    <i class="fas fa-download"></i>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <div id="formulirFileName" class="mt-2 text-primary small" style="display: none;">
                                        <i class="fas fa-file-pdf me-1"></i><span></span>
                                    </div>
                                </div>
                            </div>

                            <!-- PANDUAN PPDB -->
                            <div class="col-lg-6">
                                <div class="file-card">
                                    <div class="file-header">
                                        <div class="file-icon-container file-icon-success">
                                            <i class="fas fa-book"></i>
                                        </div>
                                        <div>
                                            <h5 class="file-title">Panduan PPDB</h5>
                                            <p class="file-description">Panduan lengkap pendaftaran PPDB</p>
                                        </div>
                                    </div>
                                    
                                    <div class="file-upload-area" onclick="document.getElementById('panduanInput').click()">
                                        <i class="fas fa-cloud-upload-alt mb-2" style="font-size: 1.5rem; color: var(--success);"></i>
                                        <p class="mb-0 small">Klik untuk upload file baru</p>
                                        <small class="text-muted">Format: PDF, Maks: 5MB</small>
                                    </div>
                                    <input type="file" id="panduanInput" name="panduan_file" class="d-none" accept=".pdf" onchange="previewFileName(this, 'panduan')">
                                    
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <span class="file-status {{ !empty($settings['panduan_file']) && file_exists(public_path($settings['panduan_file'])) ? 'status-available' : 'status-unavailable' }}">
                                            <i class="fas {{ !empty($settings['panduan_file']) && file_exists(public_path($settings['panduan_file'])) ? 'fa-check-circle' : 'fa-times-circle' }} me-1"></i>
                                            {{ !empty($settings['panduan_file']) && file_exists(public_path($settings['panduan_file'])) ? 'Tersedia' : 'Belum ada' }}
                                        </span>
                                        
                                        @if(!empty($settings['panduan_file']) && file_exists(public_path($settings['panduan_file'])))
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ asset($settings['panduan_file']) }}" target="_blank" class="btn btn-outline-success">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ asset($settings['panduan_file']) }}" download class="btn btn-success">
                                                    <i class="fas fa-download"></i>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <div id="panduanFileName" class="mt-2 text-success small" style="display: none;">
                                        <i class="fas fa-file-pdf me-1"></i><span></span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- PERSYARATAN LENGKAP -->
                            <div class="col-lg-6">
                                <div class="file-card">
                                    <div class="file-header">
                                        <div class="file-icon-container file-icon-warning">
                                            <i class="fas fa-list-check"></i>
                                        </div>
                                        <div>
                                            <h5 class="file-title">Persyaratan Lengkap</h5>
                                            <p class="file-description">Syarat dan ketentuan pendaftaran PPDB</p>
                                        </div>
                                    </div>
                                    
                                    <div class="file-upload-area" onclick="document.getElementById('syaratInput').click()">
                                        <i class="fas fa-cloud-upload-alt mb-2" style="font-size: 1.5rem; color: var(--warning);"></i>
                                        <p class="mb-0 small">Klik untuk upload file baru</p>
                                        <small class="text-muted">Format: PDF, Maks: 5MB</small>
                                    </div>
                                    <input type="file" id="syaratInput" name="syarat_file" class="d-none" accept=".pdf" onchange="previewFileName(this, 'syarat')">
                                    
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <span class="file-status {{ !empty($settings['syarat_file']) && file_exists(public_path($settings['syarat_file'])) ? 'status-available' : 'status-unavailable' }}">
                                            <i class="fas {{ !empty($settings['syarat_file']) && file_exists(public_path($settings['syarat_file'])) ? 'fa-check-circle' : 'fa-times-circle' }} me-1"></i>
                                            {{ !empty($settings['syarat_file']) && file_exists(public_path($settings['syarat_file'])) ? 'Tersedia' : 'Belum ada' }}
                                        </span>
                                        
                                        @if(!empty($settings['syarat_file']) && file_exists(public_path($settings['syarat_file'])))
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ asset($settings['syarat_file']) }}" target="_blank" class="btn btn-outline-warning">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ asset($settings['syarat_file']) }}" download class="btn btn-warning text-white">
                                                    <i class="fas fa-download"></i>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <div id="syaratFileName" class="mt-2 text-warning small" style="display: none;">
                                        <i class="fas fa-file-pdf me-1"></i><span></span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- JADWAL RESMI PPDB -->
                            <div class="col-lg-6">
                                <div class="file-card">
                                    <div class="file-header">
                                        <div class="file-icon-container file-icon-info">
                                            <i class="fas fa-calendar-alt"></i>
                                        </div>
                                        <div>
                                            <h5 class="file-title">Jadwal Resmi PPDB</h5>
                                            <p class="file-description">Jadwal lengkap kegiatan PPDB</p>
                                        </div>
                                    </div>
                                    
                                    <div class="file-upload-area" onclick="document.getElementById('jadwalInput').click()">
                                        <i class="fas fa-cloud-upload-alt mb-2" style="font-size: 1.5rem; color: var(--info);"></i>
                                        <p class="mb-0 small">Klik untuk upload file baru</p>
                                        <small class="text-muted">Format: PDF, Maks: 5MB</small>
                                    </div>
                                    <input type="file" id="jadwalInput" name="jadwal_file" class="d-none" accept=".pdf" onchange="previewFileName(this, 'jadwal')">
                                    
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <span class="file-status {{ !empty($settings['jadwal_file']) && file_exists(public_path($settings['jadwal_file'])) ? 'status-available' : 'status-unavailable' }}">
                                            <i class="fas {{ !empty($settings['jadwal_file']) && file_exists(public_path($settings['jadwal_file'])) ? 'fa-check-circle' : 'fa-times-circle' }} me-1"></i>
                                            {{ !empty($settings['jadwal_file']) && file_exists(public_path($settings['jadwal_file'])) ? 'Tersedia' : 'Belum ada' }}
                                        </span>
                                        
                                        @if(!empty($settings['jadwal_file']) && file_exists(public_path($settings['jadwal_file'])))
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ asset($settings['jadwal_file']) }}" target="_blank" class="btn btn-outline-info">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ asset($settings['jadwal_file']) }}" download class="btn btn-info text-white">
                                                    <i class="fas fa-download"></i>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <div id="jadwalFileName" class="mt-2 text-info small" style="display: none;">
                                        <i class="fas fa-file-pdf me-1"></i><span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab: Hero Section -->
                <div id="heroTab" class="settings-tab-content" style="display: none;">
                    <div class="settings-card" data-aos="fade-up">
                        <div class="settings-section-title">
                            <div class="settings-icon"><i class="fas fa-home"></i></div>
                            <h4>Hero Section</h4>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="form-label">Judul Utama</label>
                                <input type="text" class="form-control" name="hero_title" value="{{ $settings['hero_title'] ?? '' }}">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Subjudul</label>
                                <textarea class="form-control" name="hero_subtitle" rows="2">{{ $settings['hero_subtitle'] ?? '' }}</textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Gambar Hero</label>
                                <div class="upload-area" onclick="document.getElementById('heroImage').click()">
                                    <div class="upload-icon"><i class="fas fa-cloud-upload-alt"></i></div>
                                    <h6>Klik untuk upload gambar</h6>
                                    <input type="file" id="heroImage" name="hero_image" accept="image/*" class="d-none" onchange="previewImage(this, 'heroPreview')">
                                </div>
                                @if(file_exists(public_path('images/landing.jpg')))
                                    <div class="mt-3 text-center">
                                        <img src="{{ asset('images/landing.jpg') }}?{{ time() }}" id="heroPreview" style="max-width: 100%; border-radius: 10px; max-height: 300px;">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab: Jadwal PPDB -->
                <div id="scheduleTab" class="settings-tab-content" style="display: none;">
                    <div class="settings-card" data-aos="fade-up">
                        <div class="settings-section-title">
                            <div class="settings-icon"><i class="fas fa-calendar-alt"></i></div>
                            <h4>Jadwal PPDB</h4>
                        </div>
                        <div id="scheduleItems">
                            @foreach($schedules as $index => $schedule)
                                <div class="schedule-item">
                                    <div class="row g-3">
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="schedule_dates[]" value="{{ $schedule['date'] }}" placeholder="Tanggal">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="schedule_descs[]" value="{{ $schedule['desc'] }}" placeholder="Kegiatan">
                                        </div>
                                        <div class="col-md-3">
                                            <select class="form-select" name="schedule_jalurs[]">
                                                <option value="umum" {{ ($schedule['jalur'] ?? '') == 'umum' ? 'selected' : '' }}>Umum</option>
                                                <option value="zonasi" {{ ($schedule['jalur'] ?? '') == 'zonasi' ? 'selected' : '' }}>Zonasi</option>
                                                <option value="prestasi" {{ ($schedule['jalur'] ?? '') == 'prestasi' ? 'selected' : '' }}>Prestasi</option>
                                                <option value="afirmasi" {{ ($schedule['jalur'] ?? '') == 'afirmasi' ? 'selected' : '' }}>Afirmasi</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <select class="form-select" name="schedule_statuses[]">
                                                <option value="upcoming" {{ ($schedule['status'] ?? '') == 'upcoming' ? 'selected' : '' }}>Akan Datang</option>
                                                <option value="active" {{ ($schedule['status'] ?? '') == 'active' ? 'selected' : '' }}>Berlangsung</option>
                                                <option value="completed" {{ ($schedule['status'] ?? '') == 'completed' ? 'selected' : '' }}>Selesai</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="text-end mt-2">
                                        <button type="button" class="btn btn-sm btn-danger" onclick="this.closest('.schedule-item').remove()">Hapus</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" class="btn btn-primary mt-3" onclick="addSchedule()">
                            <i class="fas fa-plus me-2"></i> Tambah Jadwal
                        </button>
                    </div>
                </div>

                <!-- Tab: Galeri (KEMBALI KE FORMAT SEDERHANA) -->
                <div id="galleryTab" class="settings-tab-content" style="display: none;">
                    <div class="settings-card" data-aos="fade-up">
                        <div class="settings-section-title">
                            <div class="settings-icon"><i class="fas fa-images"></i></div>
                            <h4>Galeri Sekolah</h4>
                        </div>
                        
                        <!-- Area Tambah Galeri - SEDERHANA -->
                        <div class="row g-3 mb-4">
                             <div class="col-md-6">
                                <div class="upload-area" onclick="document.getElementById('newGalleryFiles').click()">
                                    <div class="upload-icon"><i class="fas fa-cloud-upload-alt"></i></div>
                                    <h6>Upload Foto/Video</h6>
                                    <input type="file" id="newGalleryFiles" name="new_gallery_files[]" multiple accept="image/*,video/*" class="d-none" onchange="previewGalleryFiles(this)">
                                </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="upload-area" onclick="addYoutubeVideo()">
                                     <div class="upload-icon"><i class="fab fa-youtube text-danger"></i></div>
                                     <h6>Tambah Link YouTube</h6>
                                 </div>
                             </div>
                        </div>

                        <div id="galleryContainer">
                            @foreach($gallery as $index => $item)
                                <div class="gallery-item-card">
                                    <div class="gallery-delete-btn" onclick="this.parentElement.remove()">
                                        <i class="fas fa-times"></i>
                                    </div>
                                    <input type="hidden" name="existing_gallery_url[]" value="{{ $item['url'] }}">
                                    <input type="hidden" name="existing_gallery_type[]" value="{{ $item['type'] ?? 'image' }}">
                                    
                                    <div class="row align-items-center">
                                        <div class="col-md-4">
                                            @if(($item['type'] ?? 'image') == 'video')
                                                @if(str_contains($item['url'], 'youtube') || str_contains($item['url'], 'youtu.be'))
                                                    <div class="image-preview">
                                                        <div class="ratio ratio-16x9 bg-dark d-flex align-items-center justify-content-center text-white">
                                                            <i class="fab fa-youtube fa-3x"></i>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="image-preview">
                                                        <video src="{{ asset($item['url']) }}" controls style="width:100%; height:200px; object-fit:cover; border-radius:10px;"></video>
                                                    </div>
                                                @endif
                                            @else
                                                <div class="image-preview">
                                                    <img src="{{ asset($item['url']) }}" style="width:100%; height:200px; object-fit:cover; border-radius:10px;">
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-8">
                                            <div class="mb-2">
                                                <label class="small text-muted">Keterangan/Judul</label>
                                                <input type="text" class="form-control form-control-sm" name="existing_gallery_caption[]" value="{{ $item['caption'] ?? '' }}" placeholder="Judul Foto/Video">
                                            </div>
                                            <div>
                                                <label class="small text-muted">Kategori</label>
                                                <select class="form-select form-select-sm" name="existing_gallery_category[]">
                                                    <option value="activities" {{ ($item['category'] ?? '') == 'activities' ? 'selected' : '' }}>Kegiatan</option>
                                                    <option value="facilities" {{ ($item['category'] ?? '') == 'facilities' ? 'selected' : '' }}>Fasilitas</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="sticky-footer mt-5">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted">
                                <i class="fas fa-clock me-1"></i>
                                Terakhir diperbarui: {{ now()->format('d F Y H:i') }}
                            </small>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary btn-lg px-5">
                                <i class="fas fa-save me-2"></i> Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </div>
            </form>
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

        // Tab navigation
        function showTab(tabName) {
            document.querySelectorAll('.settings-tab-content').forEach(tab => tab.style.display = 'none');
            document.querySelectorAll('.settings-tab').forEach(tab => tab.classList.remove('active'));
            document.getElementById(tabName + 'Tab').style.display = 'block';
            event.target.classList.add('active');
            
            // Scroll to top when changing tabs
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // Image preview
        function previewImage(input, previewId) {
            const file = input.files[0];
            if (file) {
                // Validasi tipe file
                if (!file.type.includes('image')) {
                    alert('Hanya file gambar yang diizinkan!');
                    input.value = '';
                    return;
                }
                
                // Validasi ukuran file (5MB max)
                const maxSize = 5 * 1024 * 1024; // 5MB
                if (file.size > maxSize) {
                    alert('File terlalu besar! Maksimal 5MB.');
                    input.value = '';
                    return;
                }
                
                const reader = new FileReader();
                reader.onload = function(e) { 
                    let preview = document.getElementById(previewId);
                    if (!preview) {
                        // Buat elemen preview jika belum ada
                        const uploadArea = input.closest('.upload-area');
                        const newPreview = document.createElement('div');
                        newPreview.className = 'mt-3 text-center';
                        newPreview.innerHTML = `<img id="${previewId}" style="max-width: 100%; border-radius: 10px; max-height: 300px;">`;
                        uploadArea.after(newPreview);
                        preview = document.getElementById(previewId);
                    }
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }

        // File name preview
        function previewFileName(input, type) {
            const fileNameDisplay = document.getElementById(type + 'FileName');
            const file = input.files[0];
            
            if (file) {
                // Validasi file type
                if (!file.type.includes('pdf')) {
                    alert('Hanya file PDF yang diizinkan!');
                    input.value = '';
                    fileNameDisplay.style.display = 'none';
                    return;
                }
                
                // Validasi file size (5MB max)
                const maxSize = 5 * 1024 * 1024; // 5MB
                if (file.size > maxSize) {
                    alert('File terlalu besar! Maksimal 5MB.');
                    input.value = '';
                    fileNameDisplay.style.display = 'none';
                    return;
                }
                
                // Tampilkan nama file
                fileNameDisplay.querySelector('span').textContent = file.name;
                fileNameDisplay.style.display = 'block';
                
                // Update status
                const statusElement = document.querySelector(`#${type}Input`).closest('.file-card').querySelector('.file-status');
                statusElement.innerHTML = '<i class="fas fa-clock me-1"></i>Menunggu upload';
                statusElement.className = 'file-status status-available';
            } else {
                fileNameDisplay.style.display = 'none';
            }
        }

        // Preview gallery files (SEDERHANA)
        function previewGalleryFiles(input) {
            const files = input.files;
            const container = document.getElementById('galleryContainer');
            
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    const newItem = document.createElement('div');
                    newItem.className = 'gallery-item-card';
                    
                    newItem.innerHTML = `
                        <div class="gallery-delete-btn" onclick="this.parentElement.remove()">
                            <i class="fas fa-times"></i>
                        </div>
                        <input type="hidden" name="new_gallery_url[]" value="gallery/${file.name}">
                        <input type="hidden" name="new_gallery_type[]" value="${file.type.includes('image') ? 'image' : 'video'}">
                        
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <div class="image-preview">
                                    ${file.type.includes('image') ? 
                                        `<img src="${e.target.result}" style="width:100%; height:200px; object-fit:cover; border-radius:10px;">` : 
                                        `<video src="${e.target.result}" controls style="width:100%; height:200px; object-fit:cover; border-radius:10px;"></video>`
                                    }
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-2">
                                    <label class="small text-muted">Keterangan/Judul</label>
                                    <input type="text" class="form-control form-control-sm" name="new_gallery_caption[]" placeholder="Judul Foto/Video" value="${file.name.split('.')[0]}">
                                </div>
                                <div>
                                    <label class="small text-muted">Kategori</label>
                                    <select class="form-select form-select-sm" name="new_gallery_category[]">
                                        <option value="activities">Kegiatan</option>
                                        <option value="facilities">Fasilitas</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    `;
                    
                    container.prepend(newItem);
                };
                
                reader.readAsDataURL(file);
            }
            
            // Reset input file
            input.value = '';
        }

        // Add schedule item
        function addSchedule() {
            const container = document.getElementById('scheduleItems');
            const newItem = document.createElement('div');
            newItem.className = 'schedule-item';
            newItem.innerHTML = `
                <div class="row g-3">
                    <div class="col-md-3"><input type="text" class="form-control" name="schedule_dates[]" placeholder="Tanggal"></div>
                    <div class="col-md-4"><input type="text" class="form-control" name="schedule_descs[]" placeholder="Kegiatan"></div>
                    <div class="col-md-3">
                        <select class="form-select" name="schedule_jalurs[]">
                            <option value="umum">Umum</option>
                            <option value="zonasi">Zonasi</option>
                            <option value="prestasi">Prestasi</option>
                            <option value="afirmasi">Afirmasi</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-select" name="schedule_statuses[]">
                            <option value="upcoming">Akan Datang</option>
                            <option value="active">Berlangsung</option>
                            <option value="completed">Selesai</option>
                        </select>
                    </div>
                </div>
                <div class="text-end mt-2"><button type="button" class="btn btn-sm btn-danger" onclick="this.closest('.schedule-item').remove()">Hapus</button></div>`;
            container.appendChild(newItem);
            
            // Tambah animasi
            newItem.style.opacity = '0';
            newItem.style.transform = 'translateY(20px)';
            setTimeout(() => {
                newItem.style.transition = 'all 0.3s ease';
                newItem.style.opacity = '1';
                newItem.style.transform = 'translateY(0)';
            }, 10);
        }

        // Add YouTube video to gallery (SEDERHANA)
        function addYoutubeVideo() {
            const url = prompt("Masukkan Link YouTube (Contoh: https://www.youtube.com/watch?v=xxxxx)");
            if (url && (url.includes('youtube.com') || url.includes('youtu.be'))) {
                const container = document.getElementById('galleryContainer');
                const newItem = document.createElement('div');
                newItem.className = 'gallery-item-card';
                
                newItem.innerHTML = `
                    <div class="gallery-delete-btn" onclick="this.parentElement.remove()">
                        <i class="fas fa-times"></i>
                    </div>
                    <input type="hidden" name="existing_gallery_url[]" value="${url}">
                    <input type="hidden" name="existing_gallery_type[]" value="video">
                    
                    <div class="row align-items-center">
                        <div class="col-md-4">
                            <div class="image-preview">
                                <div class="ratio ratio-16x9 bg-dark d-flex align-items-center justify-content-center text-white">
                                    <i class="fab fa-youtube fa-3x"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-2">
                                <label class="small text-muted">Keterangan/Judul</label>
                                <input type="text" class="form-control form-control-sm" name="existing_gallery_caption[]" placeholder="Judul Video">
                            </div>
                            <div>
                                <label class="small text-muted">Kategori</label>
                                <select class="form-select form-select-sm" name="existing_gallery_category[]">
                                    <option value="activities">Kegiatan</option>
                                    <option value="facilities">Fasilitas</option>
                                </select>
                            </div>
                            <small class="text-muted mt-1 d-block"><i class="fas fa-link me-1"></i>${url}</small>
                        </div>
                    </div>
                `;
                container.prepend(newItem);
            } else if (url) {
                alert('Link YouTube tidak valid!');
            }
        }

        // Form validation for file uploads
        document.querySelector('#settingsForm').addEventListener('submit', function(e) {
            let valid = true;
            const fileInputs = document.querySelectorAll('input[type="file"]');
            const maxSize = 5 * 1024 * 1024; // 5MB
            const maxGallerySize = 10 * 1024 * 1024; // 10MB untuk galeri
            
            fileInputs.forEach(input => {
                if (input.files.length > 0) {
                    for (let i = 0; i < input.files.length; i++) {
                        const file = input.files[i];
                        
                        // Validasi untuk dokumen PDF
                        if (input.accept === '.pdf' && !file.type.includes('pdf')) {
                            alert('Hanya file PDF yang diizinkan untuk dokumen!');
                            valid = false;
                            e.preventDefault();
                            return;
                        }
                        
                        // Validasi ukuran file berdasarkan tipe input
                        let currentMaxSize = maxSize;
                        if (input.id === 'newGalleryFiles') {
                            currentMaxSize = maxGallerySize;
                        }
                        
                        if (file.size > currentMaxSize) {
                            alert('File ' + file.name + ' terlalu besar! Maksimal ' + (currentMaxSize / (1024*1024)) + 'MB.');
                            valid = false;
                            e.preventDefault();
                            return;
                        }
                    }
                }
            });
            
            if (!valid) {
                e.preventDefault();
            }
        });

        // Auto-hide alerts after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }, 5000);
            });
        });
    </script>
</body>
</html>