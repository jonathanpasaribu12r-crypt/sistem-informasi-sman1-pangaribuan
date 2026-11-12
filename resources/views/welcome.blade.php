<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $settings['school_name'] ?? 'PPDB SMAN 1 Pangaribuan' }} - Portal Pendaftaran</title>
    
    <!-- CSRF Token untuk Laravel -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Lightbox untuk Galeri -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css">
    
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --primary-light: #3b82f6;
            --secondary: #64748b;
            --accent: #f59e0b;
            --success: #10b981;
            --danger: #ef4444;
            --background: #f8fafc;
            --card-bg: #ffffff;
            --text-primary: #1e293b;
            --text-secondary: #64748b;
            --jalur-zonasi: #3b82f6;
            --jalur-prestasi: #10b981;
            --jalur-afirmasi: #8b5cf6;
            --jalur-perpindahan: #f59e0b;
            --jalur-umum: #8b5cf6;
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
            --jalur-zonasi: #60a5fa;
            --jalur-prestasi: #34d399;
            --jalur-afirmasi: #a78bfa;
            --jalur-perpindahan: #fbbf24;
            --jalur-umum: #a78bfa;
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
            overflow-x: hidden;
            transition: background-color 0.3s ease;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--background);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary);
            border-radius: 10px;
        }

        /* Header Styles */
        .app-header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        [data-theme="dark"] .app-header {
            background: rgba(30, 41, 59, 0.95);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
        }

        .school-name {
            font-weight: 800;
            font-size: 1.4rem;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .school-motto {
            font-size: 0.85rem;
            color: var(--text-secondary);
            font-weight: 500;
        }

        /* Navigation */
        .nav-tabs-modern {
            border: none;
            gap: 8px;
        }

        .nav-tab {
            padding: 12px 24px;
            border: none;
            background: transparent;
            color: var(--text-secondary);
            font-weight: 600;
            border-radius: 10px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        .nav-tab::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            transition: left 0.3s ease;
            z-index: -1;
        }

        .nav-tab.active {
            color: white;
        }

        .nav-tab.active::before {
            left: 0;
        }

        .nav-tab:not(.active):hover {
            color: var(--primary);
            transform: translateY(-2px);
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 50%, var(--primary-light) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            padding-top: 80px;
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
            color: white;
        }

        .hero-badge {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            padding: 8px 20px;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 20px;
            display: inline-block;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 20px;
        }

        .hero-subtitle {
            font-size: 1.3rem;
            opacity: 0.9;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .btn-hero {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.3);
            padding: 15px 35px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }

        .btn-hero:hover {
            background: rgba(255, 255, 255, 0.3);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(255, 255, 255, 0.2);
            color: white;
        }

        .btn-primary-modern {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            border: none;
            padding: 15px 35px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.4);
            cursor: pointer;
        }

        .btn-primary-modern:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(37, 99, 235, 0.6);
            color: white;
        }

        /* Stats Section */
        .stats-section {
            padding: 80px 0;
            background: var(--background);
        }

        .stat-card {
            background: var(--card-bg);
            padding: 40px 30px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        [data-theme="dark"] .stat-card {
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
        }

        .stat-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 10px;
        }

        /* JADWAL PPDB BARU - Timeline Vertikal dengan Jalur Selang-seling */
        .schedule-section {
            padding: 100px 0;
            background: var(--background);
            position: relative;
        }

        .timeline-container {
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 0;
        }

        /* Garis Timeline Vertikal di Tengah */
        .timeline-line {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 4px;
            height: 100%;
            background: linear-gradient(to bottom, var(--primary), var(--primary-dark));
            border-radius: 10px;
            top: 0;
        }

        /* Item Timeline - SEBELAH KIRI dan KANAN bergantian */
        .timeline-item-ppdb {
            position: relative;
            width: 45%;
            margin-bottom: 60px;
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .timeline-item-ppdb.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Item di SEBELAH KIRI */
        .timeline-item-ppdb.left {
            left: 0;
            text-align: right;
            padding-right: 60px;
        }

        /* Item di SEBELAH KANAN */
        .timeline-item-ppdb.right {
            left: 55%;
            text-align: left;
            padding-left: 60px;
        }

        /* Card Jadwal */
        .schedule-card {
            background: var(--card-bg);
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.12);
            transition: all 0.4s ease;
            border-left: 4px solid;
            position: relative;
        }

        .timeline-item-ppdb.left .schedule-card {
            border-left: none;
            border-right: 4px solid;
        }

        .schedule-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.18);
        }

        /* Titik Timeline */
        .timeline-dot {
            position: absolute;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: var(--primary);
            border: 4px solid var(--background);
            top: 40px;
            z-index: 2;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.2);
            transition: all 0.3s ease;
        }

        .timeline-item-ppdb:hover .timeline-dot {
            transform: scale(1.2);
            box-shadow: 0 0 0 6px rgba(37, 99, 235, 0.3);
        }

        /* Titik di kiri */
        .timeline-item-ppdb.left .timeline-dot {
            right: -12px;
        }

        /* Titik di kanan */
        .timeline-item-ppdb.right .timeline-dot {
            left: -12px;
        }

        /* Info Jalur di atas card */
        .schedule-jalur {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .jalur-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1rem;
        }

        .jalur-icon.zonasi {
            background: linear-gradient(135deg, var(--jalur-zonasi), #1e40af);
        }

        .jalur-icon.prestasi {
            background: linear-gradient(135deg, var(--jalur-prestasi), #047857);
        }

        .jalur-icon.afirmasi {
            background: linear-gradient(135deg, var(--jalur-afirmasi), #7c3aed);
        }

        .jalur-icon.perpindahan {
            background: linear-gradient(135deg, var(--jalur-perpindahan), #d97706);
        }

        .jalur-icon.umum {
            background: linear-gradient(135deg, var(--jalur-umum), #7c3aed);
        }

        .schedule-jalur-text {
            font-weight: 700;
            font-size: 1.1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .timeline-item-ppdb.left .schedule-jalur {
            justify-content: flex-end;
        }

        /* Tanggal */
        .schedule-date {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .timeline-item-ppdb.left .schedule-date {
            justify-content: flex-end;
        }

        /* Deskripsi */
        .schedule-desc {
            font-size: 1rem;
            color: var(--text-primary);
            margin-bottom: 15px;
            line-height: 1.6;
        }

        /* Status */
        .schedule-status {
            margin-top: 15px;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 15px;
            border-radius: 20px;
        }

        .status-active {
            background: rgba(16, 185, 129, 0.15);
            color: var(--success);
            border: 2px solid var(--success);
        }

        .status-upcoming {
            background: rgba(37, 99, 235, 0.15);
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        .status-completed {
            background: rgba(239, 68, 68, 0.15);
            color: var(--danger);
            border: 2px solid var(--danger);
        }

        /* Filter Jalur */
        .jalur-filter {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 50px;
            flex-wrap: wrap;
        }

        .filter-jalur-btn {
            padding: 12px 25px;
            border: none;
            background: var(--card-bg);
            color: var(--text-secondary);
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            display: flex;
            align-items: center;
            gap: 8px;
            min-width: 120px;
            justify-content: center;
        }

        .filter-jalur-btn.active {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(37, 99, 235, 0.3);
        }

        .filter-jalur-btn:hover:not(.active) {
            background: rgba(37, 99, 235, 0.1);
            color: var(--primary);
            transform: translateY(-2px);
        }

        .filter-jalur-btn.all {
            background: linear-gradient(135deg, #64748b, #475569);
            color: white;
        }

        /* Responsive Timeline */
        @media (max-width: 992px) {
            .timeline-line {
                left: 30px;
            }
            
            .timeline-item-ppdb {
                width: 100%;
                left: 0 !important;
                padding: 0 0 0 70px !important;
                text-align: left !important;
                margin-bottom: 40px;
            }
            
            .timeline-item-ppdb .timeline-dot {
                left: 18px !important;
                right: auto !important;
            }
            
            .timeline-item-ppdb.left .schedule-card {
                border-right: none;
                border-left: 4px solid;
            }
            
            .timeline-item-ppdb.left .schedule-jalur,
            .timeline-item-ppdb.left .schedule-date {
                justify-content: flex-start !important;
            }
        }

        /* FITUR UNGGULAN PLATFORM */
        .features-section {
            padding: 100px 0;
            background: linear-gradient(135deg, var(--background) 0%, #f1f5f9 100%);
            position: relative;
            overflow: hidden;
        }

        [data-theme="dark"] .features-section {
            background: linear-gradient(135deg, var(--background) 0%, #1e293b 100%);
        }

        .feature-card {
            background: var(--card-bg);
            padding: 40px 30px;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            transition: all 0.4s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
            height: 100%;
            position: relative;
            overflow: hidden;
            text-align: center;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            transition: height 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.15);
        }

        .feature-card:hover::before {
            height: 100%;
            opacity: 0.05;
        }

        .feature-icon-wrapper {
            width: 100px;
            height: 100px;
            margin: 0 auto 30px;
            position: relative;
        }

        .feature-icon {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2.5rem;
            transition: all 0.4s ease;
            position: relative;
            z-index: 2;
            box-shadow: 0 10px 30px rgba(37, 99, 235, 0.3);
        }

        .feature-card:hover .feature-icon {
            transform: scale(1.1) rotate(5deg);
            background: linear-gradient(135deg, var(--accent), #f59e0b);
            box-shadow: 0 15px 40px rgba(245, 158, 11, 0.4);
        }

        .feature-icon-bg {
            position: absolute;
            top: 10px;
            left: 10px;
            right: 10px;
            bottom: 10px;
            background: rgba(37, 99, 235, 0.1);
            border-radius: 20px;
            transform: rotate(45deg);
            transition: all 0.4s ease;
        }

        .feature-card:hover .feature-icon-bg {
            transform: rotate(90deg);
            background: rgba(245, 158, 11, 0.1);
        }

        .feature-number {
            position: absolute;
            top: -10px;
            right: -10px;
            width: 40px;
            height: 40px;
            background: var(--accent);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.2rem;
            box-shadow: 0 5px 15px rgba(245, 158, 11, 0.3);
            z-index: 3;
        }

        .feature-card h4 {
            font-weight: 700;
            font-size: 1.4rem;
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }

        .feature-card h4::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 50%;
            transform: translateX(-50%);
            width: 40px;
            height: 3px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 2px;
            transition: width 0.3s ease;
        }

        .feature-card:hover h4::after {
            width: 80px;
            background: linear-gradient(135deg, var(--accent), #f59e0b);
        }

        .feature-card p {
            color: var(--text-secondary);
            line-height: 1.7;
            margin-bottom: 20px;
        }

        .feature-list {
            list-style: none;
            padding: 0;
            margin: 20px 0 0;
            text-align: left;
        }

        .feature-list li {
            padding: 8px 0;
            color: var(--text-secondary);
            position: relative;
            padding-left: 25px;
        }

        .feature-list li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: var(--success);
            font-weight: bold;
        }

        .feature-badge {
            display: inline-block;
            padding: 5px 15px;
            background: rgba(16, 185, 129, 0.1);
            color: var(--success);
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-top: 15px;
        }

        /* Timeline Section */
        .timeline-section {
            padding: 100px 0;
            background: var(--background);
        }

        .timeline {
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
        }

        .timeline::after {
            content: '';
            position: absolute;
            width: 6px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -3px;
            border-radius: 10px;
        }

        .timeline-item {
            padding: 10px 40px;
            position: relative;
            width: 50%;
            box-sizing: border-box;
        }

        .timeline-item:nth-child(odd) {
            left: 0;
            text-align: right;
        }

        .timeline-item:nth-child(even) {
            left: 50%;
        }

        .timeline-content {
            background: var(--card-bg);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
            position: relative;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .timeline-date {
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 10px;
            font-size: 1.1rem;
        }

        /* GALERI BARU dengan Ukuran Foto dan Video yang Diperkecil */
        .gallery-section {
            padding: 80px 0;
            background: var(--background);
        }

        .gallery-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .gallery-filter {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 8px 20px;
            border: none;
            background: var(--card-bg);
            color: var(--text-secondary);
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            font-size: 0.9rem;
        }

        .filter-btn.active {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(37, 99, 235, 0.3);
        }

        .filter-btn:hover:not(.active) {
            background: rgba(37, 99, 235, 0.1);
            color: var(--primary);
            transform: translateY(-2px);
        }

        /* Grid Galeri dengan Ukuran Lebih Kecil */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .gallery-card {
            background: var(--card-bg);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            height: 100%;
        }

        .gallery-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        /* UKURAN FOTO dan VIDEO DIPERKECIL */
        .gallery-media-container {
            position: relative;
            width: 100%;
            height: 180px; /* DIKECILKAN dari 250px */
            overflow: hidden;
        }

        .gallery-media {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .gallery-card:hover .gallery-media {
            transform: scale(1.05);
        }

        /* Video Thumbnail dengan Play Button yang Lebih Kecil */
        .video-thumbnail {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .video-thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .video-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gallery-card:hover .video-overlay {
            opacity: 1;
        }

        /* Play Button yang Lebih Kecil */
        .play-button-small {
            width: 50px; /* DIKECILKAN dari 70px */
            height: 50px; /* DIKECILKAN dari 70px */
            background: rgba(255, 255, 255, 0.95);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.3rem; /* DIKECILKAN dari 1.8rem */
            transition: all 0.3s ease;
            transform: scale(0.9);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
        }

        .gallery-card:hover .play-button-small {
            transform: scale(1);
            background: var(--primary);
            color: white;
        }

        .play-button-small i {
            margin-left: 3px;
        }

        /* Image Lightbox Effect */
        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7) 0%, transparent 50%);
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 15px;
        }

        .gallery-card:hover .image-overlay {
            opacity: 1;
        }

        .gallery-info-bottom {
            transform: translateY(15px);
            transition: transform 0.3s ease;
        }

        .gallery-card:hover .gallery-info-bottom {
            transform: translateY(0);
        }

        .gallery-info-bottom h5 {
            color: white;
            font-size: 0.95rem; /* DIKECILKAN dari 1.1rem */
            margin-bottom: 5px;
            font-weight: 600;
        }

        .gallery-info-bottom p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.8rem; /* DIKECILKAN dari 0.9rem */
            margin: 0;
        }

        /* Content Galeri yang Lebih Rapi */
        .gallery-card-content {
            padding: 15px;
        }

        .gallery-type-badge {
            display: inline-block;
            padding: 4px 10px; /* DIKECILKAN dari 5px 12px */
            border-radius: 15px;
            font-size: 0.7rem; /* DIKECILKAN dari 0.75rem */
            font-weight: 600;
            margin-bottom: 8px;
        }

        .badge-image {
            background: rgba(59, 130, 246, 0.15);
            color: var(--jalur-zonasi);
        }

        .badge-video {
            background: rgba(239, 68, 68, 0.15);
            color: var(--danger);
        }

        .gallery-description {
            font-size: 0.85rem; /* DIKECILKAN dari 0.9rem */
            color: var(--text-secondary);
            line-height: 1.4; /* DIKECILKAN dari 1.5 */
            margin-bottom: 12px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .gallery-date {
            font-size: 0.75rem; /* DIKECILKAN dari 0.8rem */
            color: var(--text-secondary);
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .gallery-category {
            font-size: 0.8rem; /* DIKECILKAN dari 0.85rem */
            color: var(--text-secondary);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .gallery-category i {
            color: var(--primary);
            font-size: 0.8rem;
        }

        .gallery-card-content h6 {
            font-size: 0.95rem; /* DIKECILKAN dari 1rem */
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--text-primary);
        }

        /* Button Expand yang Lebih Kecil */
        .expand-btn {
            padding: 5px 12px;
            font-size: 0.8rem;
            border-radius: 8px;
        }

        /* CTA Section */
        .cta-section {
            padding: 80px 0;
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="rgba(255,255,255,0.05)" points="0,0 1000,1000 0,1000"/></svg>');
        }

        /* Footer */
        .app-footer {
            background: var(--card-bg);
            color: var(--text-primary);
            padding: 50px 0 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .footer-contact {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 12px;
            color: var(--text-secondary);
            transition: color 0.3s ease;
            font-size: 0.9rem;
        }

        .footer-contact:hover {
            color: var(--primary);
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links li {
            margin-bottom: 10px;
            color: var(--text-secondary);
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .footer-links li:hover {
            color: var(--primary);
            transform: translateX(3px);
        }

        /* Theme Toggle */
        .theme-toggle {
            position: fixed;
            bottom: 25px;
            right: 25px;
            width: 50px;
            height: 50px;
            background: var(--card-bg);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
            cursor: pointer;
            z-index: 1000;
            transition: all 0.3s ease;
            border: 2px solid var(--primary);
        }

        .theme-toggle:hover {
            transform: scale(1.1) rotate(15deg);
        }

        /* Badge Countdown */
        .badge-countdown {
            background: linear-gradient(135deg, var(--danger), #ff4757);
            color: white;
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 0.7rem;
            font-weight: 600;
            margin-left: 8px;
            animation: pulse-red 2s infinite;
        }

        @keyframes pulse-red {
            0% { box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.4); }
            70% { box-shadow: 0 0 0 6px rgba(239, 68, 68, 0); }
            100% { box-shadow: 0 0 0 0 rgba(239, 68, 68, 0); }
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-up {
            animation: fadeInUp 0.8s ease-out;
        }

        /* Download Button Styles */
        .download-link {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            background: var(--card-bg);
            border: 1px solid rgba(37, 99, 235, 0.2);
            border-radius: 10px;
            margin-bottom: 8px;
            text-decoration: none;
            color: var(--text-primary);
            transition: all 0.3s ease;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .download-link:hover {
            background: rgba(37, 99, 235, 0.1);
            border-color: var(--primary);
            color: var(--primary);
            transform: translateX(3px);
            text-decoration: none;
        }

        .download-link.disabled {
            opacity: 0.5;
            cursor: not-allowed;
            background: var(--card-bg);
            border-color: rgba(100, 116, 139, 0.2);
            color: var(--text-secondary);
        }

        .download-link.disabled:hover {
            background: var(--card-bg);
            border-color: rgba(100, 116, 139, 0.2);
            color: var(--text-secondary);
            transform: none;
        }

        .download-link i {
            font-size: 1rem;
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .download-link .file-info {
            flex: 1;
        }

        .download-link .file-name {
            font-weight: 600;
            margin-bottom: 2px;
            font-size: 0.9rem;
        }

        .download-link .file-status {
            font-size: 0.7rem;
            color: var(--text-secondary);
        }

        .download-link:hover .file-status {
            color: var(--primary);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
            
            .timeline::after {
                left: 31px;
            }
            
            .timeline-item {
                width: 100%;
                padding-left: 70px;
                padding-right: 25px;
                text-align: left !important;
            }
            
            .timeline-item:nth-child(odd) {
                text-align: left !important;
            }

            .timeline-item:nth-child(even) {
                left: 0;
            }

            .feature-icon-wrapper {
                width: 80px;
                height: 80px;
            }
            
            .feature-icon {
                font-size: 2rem;
            }

            /* Galeri Responsive */
            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                gap: 15px;
            }

            .gallery-media-container {
                height: 150px; /* Lebih kecil di mobile */
            }

            .download-link {
                padding: 10px 12px;
            }

            .jalur-filter {
                gap: 8px;
                margin-bottom: 30px;
            }
            
            .filter-jalur-btn {
                padding: 10px 15px;
                min-width: 100px;
                font-size: 0.85rem;
            }

            .play-button-small {
                width: 40px;
                height: 40px;
                font-size: 1.1rem;
            }
        }

        @media (max-width: 576px) {
            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 12px;
            }
            
            .filter-btn {
                padding: 6px 12px;
                font-size: 0.8rem;
            }
            
            .gallery-media-container {
                height: 130px;
            }

            .gallery-card-content {
                padding: 10px;
            }

            .gallery-description {
                font-size: 0.8rem;
                -webkit-line-clamp: 1;
            }
        }

        @media (max-width: 400px) {
            .gallery-grid {
                grid-template-columns: 1fr;
            }
            
            .gallery-media-container {
                height: 180px;
            }
        }
    </style>
</head>
<body data-theme="light">
    @php
        // Ambil data dinamis dari AdminController
        $schedules = isset($settings['ppdb_schedule']) ? json_decode($settings['ppdb_schedule'], true) : [];
        $jalurs = collect($schedules)->pluck('jalur')->unique()->values()->all();
        
        // Jika tidak ada jalur, tambahkan default
        if(empty($jalurs)) {
            $jalurs = ['zonasi', 'prestasi', 'afirmasi', 'perpindahan', 'umum'];
        }
        
        $galleryItems = isset($settings['gallery_items']) ? json_decode($settings['gallery_items'], true) : [];
        
        // Proses data galeri untuk memastikan struktur yang benar
        $galleryItems = array_map(function($item) {
            // Default ke 'activities' jika category tidak ada
            $item['category'] = $item['category'] ?? 'activities'; 
            // Cek type (video jika ada youtube di URL atau ada di key 'type')
            if(isset($item['type'])) {
                $item['type'] = $item['type'];
            } elseif(isset($item['url']) && (str_contains($item['url'], 'youtube') || str_contains($item['url'], 'video'))) {
                $item['type'] = 'video';
            } else {
                $item['type'] = 'image';
            }
            
            // Pastikan ada title/caption
            $item['title'] = $item['title'] ?? $item['caption'] ?? 'Galeri Sekolah';
            $item['description'] = $item['description'] ?? $item['desc'] ?? 'Kegiatan sekolah';
            $item['date'] = $item['date'] ?? date('Y-m-d');
            
            // Untuk video, cek jika ada thumbnail
            if($item['type'] == 'video' && !isset($item['thumbnail'])) {
                $item['thumbnail'] = 'https://img.youtube.com/vi/' . (str_contains($item['url'], 'youtube') ? explode('v=', $item['url'])[1] : 'default') . '/hqdefault.jpg';
            }
            
            return $item;
        }, $galleryItems);

        // Data untuk fitur unggulan
        $features = [
            [
                'icon' => 'fas fa-bolt',
                'title' => 'Pendaftaran Real-time',
                'description' => 'Proses pendaftaran online yang instan dengan verifikasi real-time dan pengisian formulir yang super cepat.',
                'benefits' => ['Verifikasi langsung', 'Formulir otomatis', 'Notifikasi real-time']
            ],
            [
                'icon' => 'fas fa-shield-alt',
                'title' => 'Keamanan Data Premium',
                'description' => 'Sistem keamanan tingkat tinggi dengan enkripsi end-to-end untuk melindungi data pribadi peserta.',
                'benefits' => ['Enkripsi AES-256', 'Backup otomatis', 'Firewall terbaru']
            ],
            [
                'icon' => 'fas fa-mobile-alt',
                'title' => 'Platform Multi-device',
                'description' => 'Akses optimal dari smartphone, tablet, atau desktop dengan antarmuka yang responsif dan user-friendly.',
                'benefits' => ['Responsive design', 'Mobile-first', 'Cross-browser']
            ],
            [
                'icon' => 'fas fa-chart-line',
                'title' => 'Dashboard Interaktif',
                'description' => 'Monitoring progress pendaftaran melalui dashboard personal dengan statistik dan notifikasi.',
                'benefits' => ['Progress tracker', 'Statistik lengkap', 'Update real-time']
            ],
            [
                'icon' => 'fas fa-file-upload',
                'title' => 'Upload Dokumen Cerdas',
                'description' => 'Sistem upload dokumen dengan validasi otomatis, kompresi gambar, dan format yang didukung lengkap.',
                'benefits' => ['Auto-validation', 'Image compression', 'Multiple format']
            ],
            [
                'icon' => 'fas fa-headset',
                'title' => 'Support 24/7',
                'description' => 'Tim support siap membantu 24 jam dengan live chat, WhatsApp, dan hotline khusus untuk pertanyaan.',
                'benefits' => ['Live chat', 'WhatsApp support', 'Hotline khusus']
            ]
        ];

        // PERBAIKAN: Ambil data file download dari settings (4 file terpisah)
        $downloadFiles = [
            [
                'name' => 'formulir',
                'display_name' => 'Formulir Pendaftaran',
                'icon' => 'fas fa-file-alt',
                'file_key' => 'formulir_file',
                'color' => 'primary'
            ],
            [
                'name' => 'panduan',
                'display_name' => 'Panduan PPDB',
                'icon' => 'fas fa-book',
                'file_key' => 'panduan_file',
                'color' => 'success'
            ],
            [
                'name' => 'syarat',
                'display_name' => 'Persyaratan Lengkap',
                'icon' => 'fas fa-list-check',
                'file_key' => 'syarat_file',
                'color' => 'warning'
            ],
            [
                'name' => 'jadwal',
                'display_name' => 'Jadwal Resmi PPDB',
                'icon' => 'fas fa-calendar-days',
                'file_key' => 'jadwal_file',
                'color' => 'info'
            ]
        ];

        // Data jadwal contoh jika admin belum isi
        $defaultSchedules = [
            [
                'jalur' => 'zonasi',
                'date' => '1 Januari 2024',
                'desc' => 'Pendaftaran Jalur Zonasi Dibuka',
                'status' => 'active'
            ],
            [
                'jalur' => 'prestasi',
                'date' => '5 Januari 2024',
                'desc' => 'Pendaftaran Jalur Prestasi Dibuka',
                'status' => 'upcoming'
            ],
            [
                'jalur' => 'afirmasi',
                'date' => '10 Januari 2024',
                'desc' => 'Pendaftaran Jalur Afirmasi Dibuka',
                'status' => 'upcoming'
            ],
            [
                'jalur' => 'perpindahan',
                'date' => '15 Januari 2024',
                'desc' => 'Pendaftaran Jalur Perpindahan Dibuka',
                'status' => 'upcoming'
            ],
            [
                'jalar' => 'umum',
                'date' => '20 Januari 2024',
                'desc' => 'Pendaftaran Jalur Umum Dibuka',
                'status' => 'upcoming'
            ]
        ];

        // Gunakan data dari admin jika ada, jika tidak gunakan default
        $schedulesToDisplay = !empty($schedules) ? $schedules : $defaultSchedules;

    @endphp

    <!-- Theme Toggle -->
    <div class="theme-toggle" onclick="toggleTheme()">
        <i class="fas fa-moon"></i>
    </div>

    <!-- Header -->
    <header class="app-header">
        <div class="container">
            <div class="row align-items-center py-3">
                <div class="col-lg-4">
                    <div class="logo-container">
                        <div class="logo-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div>
                            <div class="school-name">{{ $settings['school_name'] ?? 'SMAN 1 PANGARIBUAN' }}</div>
                            <div class="school-motto">Unggul dalam Prestasi, Berkarakter Pancasila</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="nav nav-tabs nav-tabs-modern border-0 justify-content-end">
                        <button class="nav-tab active" onclick="scrollToSection('hero')">
                            <i class="fas fa-home"></i>
                            <span>Beranda</span>
                        </button>
                        <button class="nav-tab" onclick="scrollToSection('schedule')">
                            <i class="fas fa-calendar-alt"></i>
                            <span>Jadwal & Jalur</span>
                        </button>
                        <button class="nav-tab" onclick="scrollToSection('features')">
                            <i class="fas fa-star"></i>
                            <span>Fitur</span>
                        </button>
                        <button class="nav-tab" onclick="scrollToSection('timeline')">
                            <i class="fas fa-calendar"></i>
                            <span>Alur</span>
                        </button>
                        <button class="nav-tab" onclick="scrollToSection('gallery')">
                            <i class="fas fa-images"></i>
                            <span>Galeri</span>
                        </button>
                        
                        @auth
                            <!-- Jika sudah login -->
                            <div class="dropdown">
                                <button class="nav-tab dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown">
                                    <i class="fas fa-user"></i>
                                    <span>{{ Auth::user()->name }}</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="{{ route('dashboard') }}">
                                        <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                                    </a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item text-danger">
                                                <i class="fas fa-sign-out-alt me-2"></i>Logout
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <!-- Jika belum login -->
                            <button class="nav-tab" onclick="window.location.href='{{ route('register') }}'">
                                <i class="fas fa-user-plus"></i>
                                <span>Daftar</span>
                            </button>
                            <button class="nav-tab" onclick="window.location.href='{{ route('login') }}'">
                                <i class="fas fa-sign-in-alt"></i>
                                <span>Login</span>
                            </button>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="hero" class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <div class="hero-badge">
                            <i class="fas fa-rocket me-2"></i>
                            @if(($settings['ppdb_status'] ?? '0') == '1')
                                Pendaftaran Dibuka!
                            @else
                                Pendaftaran Ditutup
                            @endif
                        </div>
                        <h1 class="hero-title">
                            {{ $settings['hero_title'] ?? 'Portal Pendaftaran Digital Modern' }}
                        </h1>
                        <p class="hero-subtitle">
                            {{ $settings['hero_subtitle'] ?? 'Bergabunglah dengan SMA Negeri 1 Pangaribuan - sekolah unggulan yang mencetak generasi penerus bangsa.' }}
                        </p>
                        <div class="d-flex flex-wrap gap-3">
                            @if(($settings['ppdb_status'] ?? '0') == '1')
                                @auth
                                    <button class="btn-primary-modern" onclick="window.location.href='{{ route('registrations.create') }}'">
                                        <i class="fas fa-plus-circle"></i>
                                        Isi Formulir
                                    </button>
                                @else
                                    <button class="btn-primary-modern" onclick="window.location.href='{{ route('register') }}'">
                                        <i class="fas fa-user-plus"></i>
                                        Daftar Sekarang
                                    </button>
                                @endauth
                            @else
                                <button class="btn-primary-modern" style="background: #64748b; cursor: not-allowed;">
                                    <i class="fas fa-lock"></i>
                                    Pendaftaran Ditutup
                                </button>
                            @endif

                            <button class="btn-hero" onclick="scrollToSection('schedule')">
                                <i class="fas fa-calendar-alt"></i>
                                Lihat Jalur
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="container">
                        <div class="row">
                            <div>
                                <!-- FOTO DINAMIS DARI ADMIN (Landing.jpg) -->
                                @if(file_exists(public_path('images/landing.jpg')))
                                    <img src="{{ asset('images/landing.jpg') }}?{{ time() }}" 
                                         alt="SMAN 1 Pangaribuan" class="img-fluid rounded-4 shadow-lg" 
                                         style="height: 350px; width: 100%; object-fit: cover; border: 5px solid rgba(255, 255, 255, 0.3);">
                                @else
                                    <!-- Placeholder jika admin belum upload -->
                                    <div style="height: 350px; background: linear-gradient(135deg, var(--primary-dark), var(--primary)); border-radius: 20px; display: flex; align-items: center; justify-content: center; color: white; box-shadow: 0 20px 50px rgba(0,0,0,0.3); border: 5px solid rgba(255, 255, 255, 0.3);">
                                        <div>
                                            <i class="fas fa-school fa-3x mb-3"></i>
                                            <h4>SMAN 1 Pangaribuan</h4>
                                            <p>Foto belum diupload oleh Admin</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="0">
                    <div class="stat-card">
                        <div class="stat-number">500+</div>
                        <div class="text-muted">Siswa Berprestasi</div>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-card">
                        <div class="stat-number">98%</div>
                        <div class="text-muted">Tingkat Kelulusan</div>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="stat-card">
                        <div class="stat-number">50+</div>
                        <div class="text-muted">Guru Berpengalaman</div>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="stat-card">
                        <div class="stat-number">25</div>
                        <div class="text-muted">Prestasi Nasional</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- JADWAL PPDB BARU - Timeline Vertikal dengan Jalur di Kiri dan Kanan -->
    <section id="schedule" class="schedule-section">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="display-5 fw-bold mb-3">Jadwal Lengkap PPDB</h2>
                <p class="lead text-muted">Pilih jalur untuk melihat timeline jadwal pendaftaran</p>
            </div>
            
            <!-- Filter Jalur -->
            <div class="jalur-filter" data-aos="fade-up">
                <button class="filter-jalur-btn all active" onclick="filterTimeline('all')">
                    <i class="fas fa-th-large"></i>
                    <span>Semua Jalur</span>
                </button>
                @foreach($jalurs as $jalur)
                    @if($jalur !== 'all')
                        <button class="filter-jalur-btn" onclick="filterTimeline('{{ $jalur }}')" data-jalur="{{ $jalur }}">
                            <i class="fas fa-{{ 
                                $jalur == 'zonasi' ? 'map-marker-alt' : 
                                ($jalur == 'prestasi' ? 'trophy' : 
                                ($jalur == 'afirmasi' ? 'hands-helping' : 
                                ($jalur == 'perpindahan' ? 'exchange-alt' : 'globe')))
                            }}"></i>
                            <span>
                                @if($jalur == 'zonasi') Zonasi
                                @elseif($jalur == 'prestasi') Prestasi
                                @elseif($jalur == 'afirmasi') Afirmasi
                                @elseif($jalur == 'perpindahan') Perpindahan
                                @elseif($jalur == 'umum') Umum
                                @endif
                            </span>
                        </button>
                    @endif
                @endforeach
            </div>
            
            <!-- Timeline Container -->
            <div class="timeline-container" data-aos="fade-up">
                <!-- Garis Timeline di Tengah -->
                <div class="timeline-line"></div>
                
                <!-- Timeline Items - Bergantian Kiri dan Kanan -->
                @foreach($schedulesToDisplay as $index => $schedule)
                    @php
                        $jalur = $schedule['jalur'] ?? 'umum';
                        $position = $index % 2 == 0 ? 'left' : 'right';
                        $borderColor = $jalur == 'zonasi' ? 'var(--jalur-zonasi)' : 
                                     ($jalur == 'prestasi' ? 'var(--jalur-prestasi)' : 
                                     ($jalur == 'afirmasi' ? 'var(--jalur-afirmasi)' : 
                                     ($jalur == 'perpindahan' ? 'var(--jalur-perpindahan)' : 'var(--jalur-umum)')));
                        $jalurName = $jalur == 'zonasi' ? 'Zonasi' : 
                                   ($jalur == 'prestasi' ? 'Prestasi' : 
                                   ($jalur == 'afirmasi' ? 'Afirmasi' : 
                                   ($jalur == 'perpindahan' ? 'Perpindahan' : 'Umum')));
                        $jalurIcon = $jalur == 'zonasi' ? 'map-marker-alt' : 
                                   ($jalur == 'prestasi' ? 'trophy' : 
                                   ($jalur == 'afirmasi' ? 'hands-helping' : 
                                   ($jalur == 'perpindahan' ? 'exchange-alt' : 'globe')));
                        $statusClass = ($schedule['status'] ?? 'upcoming') == 'active' ? 'status-active' : 
                                     (($schedule['status'] ?? 'upcoming') == 'completed' ? 'status-completed' : 'status-upcoming');
                        $statusIcon = ($schedule['status'] ?? 'upcoming') == 'active' ? 'spinner fa-spin' : 
                                    (($schedule['status'] ?? 'upcoming') == 'completed' ? 'check-circle' : 'clock');
                        $statusText = ($schedule['status'] ?? 'upcoming') == 'active' ? 'Berlangsung' : 
                                    (($schedule['status'] ?? 'upcoming') == 'completed' ? 'Selesai' : 'Akan Datang');
                    @endphp
                    
                    <div class="timeline-item-ppdb {{ $position }}" data-jalur="{{ $jalur }}">
                        <!-- Titik Timeline -->
                        <div class="timeline-dot" style="background: {{ $borderColor }};"></div>
                        
                        <!-- Card Jadwal -->
                        <div class="schedule-card" style="border-color: {{ $borderColor }};">
                            <!-- Info Jalur -->
                            <div class="schedule-jalur">
                                <div class="jalur-icon {{ $jalur }}">
                                    <i class="fas fa-{{ $jalurIcon }}"></i>
                                </div>
                                <div class="schedule-jalur-text">
                                    {{ $jalurName }}
                                </div>
                            </div>
                            
                            <!-- Tanggal -->
                            <div class="schedule-date">
                                <i class="far fa-calendar-alt"></i>
                                {{ $schedule['date'] ?? 'Tanggal belum ditentukan' }}
                            </div>
                            
                            <!-- Deskripsi -->
                            <div class="schedule-desc">
                                {{ $schedule['desc'] ?? 'Kegiatan belum ditentukan' }}
                            </div>
                            
                            <!-- Status -->
                            <div class="schedule-status {{ $statusClass }}">
                                <i class="fas fa-{{ $statusIcon }}"></i>
                                {{ $statusText }}
                            </div>
                        </div>
                    </div>
                @endforeach
                
                <!-- Default jika tidak ada jadwal -->
                @if(empty($schedulesToDisplay))
                    <div class="col-12 text-center py-5">
                        <div style="background: var(--card-bg); padding: 40px 20px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                            <i class="fas fa-calendar-times fa-3x mb-4" style="color: var(--secondary);"></i>
                            <h4 class="mb-3">Jadwal PPDB Belum Tersedia</h4>
                            <p class="text-muted mb-4">Jadwal lengkap PPDB akan segera diumumkan oleh panitia.</p>
                            <button class="btn-primary-modern" onclick="window.location.href='#contact'">
                                <i class="fas fa-phone-alt me-2"></i>Hubungi Admin
                            </button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Fitur Unggulan Platform -->
    <section id="features" class="features-section">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="display-5 fw-bold mb-3">Fitur Unggulan Platform</h2>
                <p class="lead text-muted">Platform canggih untuk pengalaman pendaftaran yang mudah, aman, dan efisien</p>
            </div>
            
            <div class="row g-4">
                @foreach($features as $index => $feature)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <div class="feature-card">
                            <div class="feature-number">{{ $index + 1 }}</div>
                            <div class="feature-icon-wrapper">
                                <div class="feature-icon-bg"></div>
                                <div class="feature-icon">
                                    <i class="{{ $feature['icon'] }}"></i>
                                </div>
                            </div>
                            
                            <h4>{{ $feature['title'] }}</h4>
                            <p>{{ $feature['description'] }}</p>
                            
                            <ul class="feature-list">
                                @foreach($feature['benefits'] as $benefit)
                                    <li>{{ $benefit }}</li>
                                @endforeach
                            </ul>
                            
                            <span class="feature-badge">
                                <i class="fas fa-check-circle me-1"></i>TERSEDIA
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section id="timeline" class="timeline-section">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="display-5 fw-bold mb-3">Alur Pendaftaran</h2>
                <p class="lead text-muted">Langkah mudah mendaftar di SMAN 1 Pangaribuan</p>
            </div>
            
            <div class="timeline">
                <div class="timeline-item" data-aos="fade-right">
                    <div class="timeline-content">
                        <div class="timeline-date">Langkah 1</div>
                        <h4 class="fw-bold mb-3">Buat Akun</h4>
                        <p class="text-muted">Daftarkan diri Anda dengan email aktif untuk mendapatkan akses ke portal pendaftaran.</p>
                    </div>
                </div>
                <div class="timeline-item" data-aos="fade-left">
                    <div class="timeline-content">
                        <div class="timeline-date">Langkah 2</div>
                        <h4 class="fw-bold mb-3">Isi Formulir</h4>
                        <p class="text-muted">Lengkapi biodata diri, data orang tua, dan data sekolah asal dengan benar.</p>
                    </div>
                </div>
                <div class="timeline-item" data-aos="fade-right">
                    <div class="timeline-content">
                        <div class="timeline-date">Langkah 3</div>
                        <h4 class="fw-bold mb-3">Upload Dokumen</h4>
                        <p class="text-muted">Unggah berkas persyaratan seperti KK, Akta Lahir, dan Ijazah/SKL.</p>
                    </div>
                </div>
                <div class="timeline-item" data-aos="fade-left">
                    <div class="timeline-content">
                        <div class="timeline-date">Langkah 4</div>
                        <h4 class="fw-bold mb-3">Verifikasi & Pengumuman</h4>
                        <p class="text-muted">Tunggu proses verifikasi panitia dan cek hasil seleksi di dashboard Anda.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- GALERI dengan Ukuran Foto dan Video yang DIPERKECIL -->
    <section id="gallery" class="gallery-section">
        <div class="container gallery-container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="display-5 fw-bold mb-3">Galeri Sekolah</h2>
                <p class="lead text-muted">Kegiatan dan fasilitas {{ $settings['school_name'] ?? 'SMAN 1 Pangaribuan' }}</p>
            </div>
            
            <!-- Filter Galeri -->
            <div class="gallery-filter" data-aos="fade-up">
                <button class="filter-btn active" onclick="filterGallery('all')">
                    <i class="fas fa-th-large me-2"></i>Semua
                </button>
                <button class="filter-btn" onclick="filterGallery('image')">
                    <i class="fas fa-image me-2"></i>Foto
                </button>
                <button class="filter-btn" onclick="filterGallery('video')">
                    <i class="fas fa-video me-2"></i>Video
                </button>
                <button class="filter-btn" onclick="filterGallery('activities')">
                    <i class="fas fa-running me-2"></i>Kegiatan
                </button>
                <button class="filter-btn" onclick="filterGallery('facilities')">
                    <i class="fas fa-school me-2"></i>SISWA
                </button>
            </div>
            
            <!-- Grid Galeri -->
            <div class="gallery-grid" id="galleryGrid" data-aos="fade-up">
                @forelse($galleryItems as $index => $item)
                    <div class="gallery-card" 
                         data-type="{{ $item['type'] }}" 
                         data-category="{{ $item['category'] }}">
                        
                        <div class="gallery-media-container">
                            @if($item['type'] == 'image')
                                <!-- Image dengan Lightbox -->
                                @if(isset($item['url']) && file_exists(public_path($item['url'])))
                                    <img src="{{ asset($item['url']) }}" class="gallery-media" alt="{{ $item['title'] }}">
                                    <div class="image-overlay">
                                        <div class="gallery-info-bottom">
                                            <h5>{{ $item['title'] }}</h5>
                                            <p>{{ $item['description'] }}</p>
                                        </div>
                                    </div>
                                @elseif(isset($item['src']) && file_exists(public_path($item['src'])))
                                    <img src="{{ asset($item['src']) }}" class="gallery-media" alt="{{ $item['title'] }}">
                                    <div class="image-overlay">
                                        <div class="gallery-info-bottom">
                                            <h5>{{ $item['title'] }}</h5>
                                            <p>{{ $item['description'] }}</p>
                                        </div>
                                    </div>
                                @else
                                    <div class="gallery-media" style="background: linear-gradient(135deg, var(--primary), var(--primary-dark)); display: flex; align-items: center; justify-content: center; color: white;">
                                        <div>
                                            <i class="fas fa-image fa-3x mb-2"></i>
                                            <h6 style="font-size: 0.9rem;">{{ $item['title'] }}</h6>
                                        </div>
                                    </div>
                                @endif
                            @else
                                <!-- Video dengan Thumbnail -->
                                <div class="video-thumbnail">
                                    @if(isset($item['thumbnail']) && file_exists(public_path($item['thumbnail'])))
                                        <img src="{{ asset($item['thumbnail']) }}" class="gallery-media" alt="{{ $item['title'] }}">
                                    @elseif(isset($item['thumbnail']) && str_starts_with($item['thumbnail'], 'http'))
                                        <img src="{{ $item['thumbnail'] }}" class="gallery-media" alt="{{ $item['title'] }}">
                                    @else
                                        <div class="gallery-media" style="background: linear-gradient(135deg, var(--primary-dark), var(--primary));"></div>
                                    @endif
                                    <div class="video-overlay">
                                        <div class="play-button-small" onclick="openVideoModal('{{ $item['url'] ?? '' }}', '{{ $item['title'] }}')">
                                            <i class="fas fa-play"></i>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Info Card -->
                        <div class="gallery-card-content">
                            <div class="gallery-category">
                                <i class="fas fa-{{ $item['category'] == 'activities' ? 'running' : ($item['category'] == 'facilities' ? 'school' : 'images') }}"></i>
                                {{ ucfirst($item['category']) }}
                            </div>
                            
                            <div class="gallery-type-badge {{ $item['type'] == 'video' ? 'badge-video' : 'badge-image' }}">
                                @if($item['type'] == 'video')
                                    <i class="fas fa-video me-1"></i>Video
                                @else
                                    <i class="fas fa-image me-1"></i>Foto
                                @endif
                            </div>
                            
                            <h6 class="mb-2">{{ $item['title'] }}</h6>
                            <p class="gallery-description">{{ $item['description'] }}</p>
                            <div class="gallery-date">
                                <i class="far fa-calendar-alt"></i>
                                {{ date('d M Y', strtotime($item['date'])) }}
                            </div>
                            
                            @if($item['type'] == 'image')
                                <div class="mt-3">
                                    <a href="{{ asset($item['url'] ?? $item['src'] ?? '#') }}" 
                                       data-lightbox="gallery" 
                                       data-title="{{ $item['title'] }}"
                                       class="btn btn-sm btn-outline-primary expand-btn">
                                        <i class="fas fa-expand me-1"></i>Perbesar
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <div style="background: var(--card-bg); padding: 40px 20px; border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                            <i class="fas fa-images fa-3x mb-4" style="color: var(--primary); opacity: 0.7;"></i>
                            <h4 class="mb-3">Belum Ada Konten Galeri</h4>
                            <p class="text-muted mb-4">Admin belum mengupload foto atau video ke galeri sekolah.</p>
                            <p class="text-muted small">Konten akan ditampilkan di sini setelah admin menguploadnya.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Video Modal -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-dark">
                <div class="modal-header border-0">
                    <h5 class="modal-title text-white" id="videoModalTitle">Video</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="ratio ratio-16x9">
                        <iframe id="videoFrame" src="" title="Video" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8" data-aos="fade-up">
                    <h2 class="display-5 fw-bold mb-4">Siap Bergabung Dengan Kami?</h2>
                    <p class="lead mb-5 opacity-90">
                        Jangan lewatkan kesempatan menjadi bagian dari keluarga besar 
                        {{ $settings['school_name'] ?? 'SMAN 1 Pangaribuan' }}. Daftar sekarang dan raih masa depan gemilang!
                    </p>
                    <div class="d-flex flex-wrap gap-3 justify-content-center">
                        @if(($settings['ppdb_status'] ?? '0') == '1')
                            <button class="btn-primary-modern" onclick="window.location.href='{{ route('register') }}'">
                                <i class="fas fa-user-plus"></i> Daftar Sekarang
                            </button>
                        @endif
                        <button class="btn-hero" onclick="scrollToSection('schedule')">
                            <i class="fas fa-info-circle"></i> Lihat Jalur & Jadwal
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="app-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 mb-4">
                    <h3 class="h4 fw-bold mb-4">{{ $settings['school_name'] ?? 'SMA Negeri 1 Pangaribuan' }}</h3>
                    <p class="text-muted mb-4" style="font-size: 0.9rem;">
                        Sekolah unggalan dengan komitmen menghasilkan lulusan yang berprestasi 
                        dan berkarakter, siap menghadapi tantangan masa depan.
                    </p>
                    <div class="d-flex gap-3">
                        <a href="https://facebook.com/username" class="text-muted" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://instagram.com/username" class="text-muted" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.youtube.com/@JonathanPasaribu-i2f" class="text-muted" target="_blank">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 mb-4">
                    <h3 class="h4 fw-bold mb-4">Tautan Cepat</h3>
                    <ul class="footer-links">
                        <li onclick="scrollToSection('schedule')">Jalur & Jadwal</li>
                        <li onclick="scrollToSection('timeline')">Alur Pendaftaran</li>
                        <li onclick="scrollToSection('gallery')">Galeri Sekolah</li>
                        <li onclick="scrollToSection('features')">Fitur Platform</li>
                    </ul>
                </div>
                <div class="col-lg-3 mb-4">
                    <h3 class="h4 fw-bold mb-4">Kontak</h3>
                    <div>
                        <div class="footer-contact">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>{{ $settings['contact_address'] ?? 'Jl. sisingamangaraja No. 1, Pangaribuan' }}</span>
                        </div>
                        <div class="footer-contact">
                            <i class="fas fa-phone"></i>
                            <span>{{ $settings['contact_phone'] ?? '(0631) 123456' }}</span>
                        </div>
                        <div class="footer-contact">
                            <i class="fas fa-envelope"></i>
                            <span>{{ $settings['contact_email'] ?? 'info@sman1pangaribuan.sch.id' }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-4">
                    <h3 class="h4 fw-bold mb-4">Download</h3>
                    <div class="d-grid gap-2">
                        @foreach($downloadFiles as $file)
                            @php
                                $fileUrl = $settings[$file['file_key']] ?? null;
                                $fileExists = false;
                                
                                if ($fileUrl) {
                                    $filePath = public_path($fileUrl);
                                    $fileExists = file_exists($filePath);
                                }
                            @endphp
                            
                            @if($fileExists)
                                <a href="{{ asset($fileUrl) }}" 
                                   class="download-link" 
                                   download 
                                   target="_blank"
                                   title="Unduh {{ $file['display_name'] }}">
                                    <i class="{{ $file['icon'] }}" style="color: var(--{{ $file['color'] }});"></i>
                                    <div class="file-info">
                                        <div class="file-name">{{ $file['display_name'] }}</div>
                                        <div class="file-status">Klik untuk mengunduh</div>
                                    </div>
                                    <i class="fas fa-download ms-2 text-{{ $file['color'] }}"></i>
                                </a>
                            @else
                                <div class="download-link disabled">
                                    <i class="{{ $file['icon'] }}"></i>
                                    <div class="file-info">
                                        <div class="file-name">{{ $file['display_name'] }}</div>
                                        <div class="file-status">Segera Hadir</div>
                                    </div>
                                    <i class="fas fa-clock ms-2 text-secondary"></i>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="border-top pt-4 mt-4 text-center text-muted">
                <p style="font-size: 0.9rem;">&copy; {{ date('Y') }} {{ $settings['school_name'] ?? 'SMAN 1 Pangaribuan' }}. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
    
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });

        // Initialize Lightbox
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true,
            'albumLabel': 'Gambar %1 dari %2',
            'fadeDuration': 300
        });

        // Theme Toggle
        function toggleTheme() {
            const currentTheme = document.body.getAttribute('data-theme');
            const newTheme = currentTheme === 'light' ? 'dark' : 'light';
            document.body.setAttribute('data-theme', newTheme);
            
            const icon = document.querySelector('.theme-toggle i');
            icon.className = newTheme === 'light' ? 'fas fa-moon' : 'fas fa-sun';
            
            localStorage.setItem('theme', newTheme);
        }

        // Load saved theme
        const savedTheme = localStorage.getItem('theme') || 'light';
        document.body.setAttribute('data-theme', savedTheme);
        const icon = document.querySelector('.theme-toggle i');
        icon.className = savedTheme === 'light' ? 'fas fa-moon' : 'fas fa-sun';

        // Smooth Scroll
        function scrollToSection(sectionId) {
            const element = document.getElementById(sectionId);
            if (element) {
                element.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
                
                document.querySelectorAll('.nav-tab').forEach(tab => {
                    tab.classList.remove('active');
                });
                
                const navTabs = document.querySelectorAll('.nav-tab');
                navTabs.forEach(tab => {
                    if (tab.textContent.includes('Beranda') && sectionId === 'hero') {
                        tab.classList.add('active');
                    } else if (tab.textContent.includes('Jadwal') && sectionId === 'schedule') {
                        tab.classList.add('active');
                    } else if (tab.textContent.includes('Fitur') && sectionId === 'features') {
                        tab.classList.add('active');
                    } else if (tab.textContent.includes('Alur') && sectionId === 'timeline') {
                        tab.classList.add('active');
                    } else if (tab.textContent.includes('Galeri') && sectionId === 'gallery') {
                        tab.classList.add('active');
                    }
                });
            }
        }

        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.app-header');
            if (window.scrollY > 100) {
                header.style.background = document.body.getAttribute('data-theme') === 'dark' 
                    ? 'rgba(30, 41, 59, 0.98)' 
                    : 'rgba(255, 255, 255, 0.98)';
                header.style.boxShadow = '0 4px 30px rgba(0, 0, 0, 0.1)';
            } else {
                header.style.background = document.body.getAttribute('data-theme') === 'dark'
                    ? 'rgba(30, 41, 59, 0.95)'
                    : 'rgba(255, 255, 255, 0.95)';
                header.style.boxShadow = '0 4px 30px rgba(0, 0, 0, 0.1)';
            }
        });

        // Filter Timeline by Jalur
        function filterTimeline(jalur) {
            const timelineItems = document.querySelectorAll('.timeline-item-ppdb');
            const filterButtons = document.querySelectorAll('.filter-jalur-btn');
            
            // Update active filter button
            filterButtons.forEach(btn => {
                btn.classList.remove('active');
                if (jalur === 'all' && btn.classList.contains('all')) {
                    btn.classList.add('active');
                } else if (btn.getAttribute('data-jalur') === jalur) {
                    btn.classList.add('active');
                }
            });
            
            // Filter timeline items
            timelineItems.forEach(item => {
                if (jalur === 'all') {
                    item.classList.add('visible');
                    item.style.display = 'block';
                } else {
                    const itemJalur = item.getAttribute('data-jalur');
                    if (itemJalur === jalur) {
                        item.classList.add('visible');
                        item.style.display = 'block';
                    } else {
                        item.classList.remove('visible');
                        item.style.display = 'none';
                    }
                }
            });
            
            // Trigger AOS untuk item yang ditampilkan
            AOS.refresh();
        }

        // Gallery Filter
        function filterGallery(filter) {
            const galleryCards = document.querySelectorAll('.gallery-card');
            const filterButtons = document.querySelectorAll('.filter-btn');
            
            // Update active filter button
            filterButtons.forEach(btn => {
                btn.classList.remove('active');
                if (btn.textContent.includes(filter === 'all' ? 'Semua' : 
                    filter === 'image' ? 'Foto' : 
                    filter === 'video' ? 'Video' : 
                    filter === 'activities' ? 'Kegiatan' : 'Fasilitas')) {
                    btn.classList.add('active');
                }
            });
            
            // Filter items
            galleryCards.forEach(card => {
                const itemType = card.getAttribute('data-type');
                const itemCategory = card.getAttribute('data-category');
                
                if (filter === 'all') {
                    card.style.display = 'block';
                } else if (filter === 'image' || filter === 'video') {
                    card.style.display = itemType === filter ? 'block' : 'none';
                } else {
                    card.style.display = itemCategory === filter ? 'block' : 'none';
                }
            });
            
            AOS.refresh();
        }

        // Video Modal
        function openVideoModal(videoUrl, title) {
            let videoId = '';
            if (videoUrl.includes('youtube.com/watch?v=')) {
                videoId = videoUrl.split('v=')[1];
                const ampersandPosition = videoId.indexOf('&');
                if (ampersandPosition !== -1) {
                    videoId = videoId.substring(0, ampersandPosition);
                }
            } else if (videoUrl.includes('youtu.be/')) {
                videoId = videoUrl.split('youtu.be/')[1];
            }
            
            const iframe = document.getElementById('videoFrame');
            if (videoId) {
                iframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0`;
            } else if (videoUrl) {
                iframe.src = videoUrl;
            } else {
                iframe.src = '';
            }
            
            document.getElementById('videoModalTitle').textContent = title;
            
            const modal = new bootstrap.Modal(document.getElementById('videoModal'));
            modal.show();
        }

        // Close modal and stop video
        document.getElementById('videoModal').addEventListener('hidden.bs.modal', function () {
            const iframe = document.getElementById('videoFrame');
            iframe.src = '';
        });

        // Download Link Click Handler
        document.querySelectorAll('.download-link:not(.disabled)').forEach(link => {
            link.addEventListener('click', function(e) {
                const originalHTML = this.innerHTML;
                this.innerHTML = '<i class="fas fa-spinner fa-spin"></i><div class="file-info"><div class="file-name">Mengunduh...</div><div class="file-status">Mohon tunggu</div></div>';
                
                setTimeout(() => {
                    this.innerHTML = originalHTML;
                }, 2000);
            });
        });

        // Initialize timeline items visibility on load
        document.addEventListener('DOMContentLoaded', function() {
            // Show all timeline items by default
            const timelineItems = document.querySelectorAll('.timeline-item-ppdb');
            timelineItems.forEach((item, index) => {
                setTimeout(() => {
                    item.classList.add('visible');
                }, index * 100);
            });
            
            // Initialize gallery hover effects
            const galleryCards = document.querySelectorAll('.gallery-card');
            galleryCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        });

        // Toast Notification Function
        function showToast(type, title, message) {
            const toastId = 'toast-' + Date.now();
            const toastHtml = `
                <div id="${toastId}" class="toast align-items-center text-bg-${type} border-0" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            <strong>${title}</strong><br>${message}
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                    </div>
                </div>
            `;
            
            let toastContainer = document.getElementById('toast-container');
            if (!toastContainer) {
                toastContainer = document.createElement('div');
                toastContainer.id = 'toast-container';
                toastContainer.className = 'toast-container position-fixed bottom-0 end-0 p-3';
                toastContainer.style.zIndex = '1055';
                document.body.appendChild(toastContainer);
            }
            
            toastContainer.insertAdjacentHTML('beforeend', toastHtml);
            
            const toastElement = document.getElementById(toastId);
            const toast = new bootstrap.Toast(toastElement, {
                autohide: true,
                delay: 3000
            });
            toast.show();
            
            toastElement.addEventListener('hidden.bs.toast', function () {
                this.remove();
            });
        }
    </script>
</body>
</html>