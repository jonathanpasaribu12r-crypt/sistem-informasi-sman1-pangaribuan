<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Panitia - SMAN 1 Pangaribuan</title>
    
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

        /* Cards */
        .contact-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 25px; margin-bottom: 40px; }
        .contact-card { background: var(--card-bg); border-radius: 16px; padding: 25px; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1); border: 1px solid rgba(255, 255, 255, 0.1); text-align: center; transition: all 0.3s ease; }
        .contact-card:hover { transform: translateY(-5px); box-shadow: 0 15px 50px rgba(0, 0, 0, 0.15); border-color: var(--primary-light); }
        
        .icon-box { width: 70px; height: 70px; border-radius: 50%; background: linear-gradient(135deg, rgba(37, 99, 235, 0.1), rgba(37, 99, 235, 0.2)); display: flex; align-items: center; justify-content: center; font-size: 1.8rem; color: var(--primary); margin: 0 auto 20px; transition: all 0.3s ease; }
        .contact-card:hover .icon-box { background: linear-gradient(135deg, var(--primary), var(--primary-dark)); color: white; transform: rotateY(180deg); }
        .contact-title { font-weight: 700; font-size: 1.1rem; margin-bottom: 10px; color: var(--text-primary); }
        .contact-text { color: var(--text-secondary); font-size: 0.95rem; margin-bottom: 5px; text-decoration: none; display: block; }
        .contact-text:hover { color: var(--primary); }

        /* Message Section */
        .message-section { background: var(--card-bg); border-radius: 16px; padding: 30px; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1); border: 1px solid rgba(255, 255, 255, 0.1); }
        .form-control, .form-select { background-color: var(--input-bg); border: 2px solid var(--input-border); color: var(--text-primary); padding: 12px 15px; border-radius: 10px; }
        .form-control:focus, .form-select:focus { background-color: var(--input-bg); color: var(--text-primary); border-color: var(--primary); box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15); }
        .btn-send { background: linear-gradient(135deg, var(--primary), var(--primary-dark)); color: white; padding: 12px 30px; border-radius: 10px; border: none; font-weight: 600; width: 100%; transition: all 0.3s ease; }
        .btn-send:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(37, 99, 235, 0.4); color: white; }
        
        .map-container { border-radius: 16px; overflow: hidden; height: 100%; min-height: 400px; border: 2px solid var(--input-border); }
        
        .accordion-item { background-color: var(--card-bg); border: 1px solid var(--input-border); }
        .accordion-button { background-color: var(--card-bg); color: var(--text-primary); font-weight: 600; }
        .accordion-button:not(.collapsed) { background-color: rgba(37, 99, 235, 0.1); color: var(--primary); }
        .accordion-body { color: var(--text-secondary); }

        /* Buttons */
        .btn { display: inline-flex; align-items: center; gap: 10px; padding: 12px 24px; border: none; border-radius: 10px; font-weight: 600; font-size: 1rem; cursor: pointer; transition: all 0.3s ease; text-decoration: none; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); justify-content: center;}
        .btn-primary { background: linear-gradient(135deg, var(--primary), var(--primary-dark)); color: white; }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(37, 99, 235, 0.3); }
        
        .theme-toggle { position: fixed; bottom: 30px; right: 30px; width: 60px; height: 60px; background: var(--card-bg); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2); cursor: pointer; z-index: 1000; transition: all 0.3s ease; border: 2px solid var(--primary); }
        .theme-toggle:hover { transform: scale(1.1) rotate(15deg); }

        /* RESPONSIVE DESIGN */
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
            
            .contact-grid { 
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
            .contact-grid {
                grid-template-columns: 1fr;
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
                <div class="nav-item">
                    <a href="{{ route('student.info') }}" class="nav-link">
                        <i class="nav-icon fas fa-info-circle"></i>
                        <span>Informasi PPDB</span>
                    </a>
                </div>
                <!-- MENU KONTAK AKTIF -->
                <div class="nav-item">
                    <a href="{{ route('student.contact') }}" class="nav-link active">
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
                <h1 class="page-title">Kontak Panitia</h1>
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

            <!-- Contact Grid -->
            <div class="contact-grid">
                <div class="contact-card" data-aos="fade-up" data-aos-delay="0">
                    <div class="icon-box">
                        <i class="fab fa-whatsapp"></i>
                    </div>
                    <h5 class="contact-title">WhatsApp Hotline</h5>
                    <a href="https://wa.me/6282210335302" target="_blank" class="contact-text">082210335302 (Jonathan Pasaribu)</a>
                    <a href="https://wa.me/6281234567891" target="_blank" class="contact-text">0812-3456-7891 (Ruth)</a>
                </div>

                <div class="contact-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon-box">
                        <i class="fas fa-envelope-open-text"></i>
                    </div>
                    <h5 class="contact-title">Email Resmi</h5>
                    <a href="mailto:jonathan.pasaribu12r@gmail.com" class="contact-text">jonathan.pasaribu12r@gmail.com</a>
                    <a href="mailto:info@sman1pangaribuan.sch.id" class="contact-text">info@sman1pangaribuan.sch.id</a>
                </div>

                <div class="contact-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon-box">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h5 class="contact-title">Jam Pelayanan</h5>
                    <span class="contact-text">Senin - Jumat: 08.00 - 15.00 WIB</span>
                    <span class="contact-text">Sabtu: 08.00 - 12.00 WIB</span>
                </div>

                <div class="contact-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="icon-box">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h5 class="contact-title">Sekretariat PPDB</h5>
                    <span class="contact-text">Jl. Sisingamangaraja No. 123</span>
                    <span class="contact-text">Kec. Pangaribuan, Kab. Tapanuli Utara</span>
                </div>
            </div>

            <!-- Message and Map Section -->
            <div class="row g-4 mb-5">
                <div class="col-lg-7" data-aos="fade-right">
                    <div class="message-section h-100">
                        <h4 class="mb-4" style="color: var(--text-primary); font-weight: 700;">
                            <i class="fas fa-paper-plane me-2 text-primary"></i> Kirim Pesan
                        </h4>
                        
                        <!-- Alert Messages -->
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        @endif
                        
                        @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                            <i class="fas fa-exclamation-triangle me-2"></i> {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        @endif
                        
                        <form method="POST" action="{{ route('student.sendContactMessage') }}" id="contactForm">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label text-muted">Nama Anda</label>
                                    <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-muted">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label" style="color: var(--text-primary);">Subjek / Perihal</label>
                                    <select class="form-select" name="subject" required>
                                        <option value="">Pilih Subjek...</option>
                                        <option value="Kendala Teknis Website">Kendala Teknis Website</option>
                                        <option value="Pertanyaan Syarat Pendaftaran">Pertanyaan Syarat Pendaftaran</option>
                                        <option value="Kesalahan Input Data">Kesalahan Input Data</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label" style="color: var(--text-primary);">Pesan Anda</label>
                                    <textarea class="form-control" name="message" rows="5" placeholder="Tuliskan kendala atau pertanyaan Anda secara detail..." required></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn-send" id="sendButton">
                                        <i class="fas fa-paper-plane me-2"></i> Kirim Pesan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-5" data-aos="fade-left">
                    <div class="map-container">
                        <iframe 
                            src="https://maps.google.com/maps?q=SMA%20Negeri%201%20Pangaribuan&t=&z=15&ie=UTF8&iwloc=&output=embed" 
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="message-section" data-aos="fade-up">
                <h4 class="mb-4" style="color: var(--text-primary); font-weight: 700;">
                    <i class="fas fa-question-circle me-2 text-primary"></i> Sering Ditanyakan
                </h4>
                <div class="accordion" id="accordionFAQ">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                Apakah dokumen fisik wajib diantar ke sekolah?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#accordionFAQ">
                            <div class="accordion-body">
                                Ya, setelah melakukan pendaftaran online, calon siswa wajib melakukan verifikasi berkas fisik di sekolah sesuai jadwal yang ditentukan.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                Bagaimana jika ada kesalahan input data NISN?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                            <div class="accordion-body">
                                Jika data belum diverifikasi final, Anda bisa mengeditnya di menu Formulir. Jika sudah dikunci, silakan hubungi panitia melalui WhatsApp atau datang langsung ke sekolah.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                Kapan pengumuman hasil seleksi keluar?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                            <div class="accordion-body">
                                Pengumuman hasil seleksi akan diinformasikan melalui menu "Hasil Seleksi" pada tanggal yang tertera di jadwal.
                            </div>
                        </div>
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
            
            // Form submission handler
            const contactForm = document.getElementById('contactForm');
            if (contactForm) {
                contactForm.addEventListener('submit', function(e) {
                    const sendButton = document.getElementById('sendButton');
                    if (sendButton) {
                        const originalText = sendButton.innerHTML;
                        
                        // Disable button and show loading
                        sendButton.disabled = true;
                        sendButton.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Mengirim...';
                        
                        // Re-enable button after 5 seconds (in case of error)
                        setTimeout(() => {
                            sendButton.disabled = false;
                            sendButton.innerHTML = originalText;
                        }, 5000);
                    }
                });
            }
        });
    </script>
</body>
</html>