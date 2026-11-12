<!DOCTYPE html>
<html>
<head>
    <title>Kartu Peserta PPDB</title>
    <style>
        /* Reset & Page Setup */
        @page { 
            size: A4; 
            margin: 1cm; /* Margin diperkecil agar muat 1 halaman */
        }
        body { 
            font-family: 'Times New Roman', serif; 
            margin: 0;
            padding: 0;
        }

        /* Border Utama */
        .card-container {
            width: 100%;
            border: 3px solid #000;
            padding: 5px;
        }
        .card-inner {
            border: 1px solid #000;
            padding: 15px;
        }

        /* HEADER DENGAN TABEL (Agar Rapi) */
        .header-table {
            width: 100%;
            border-bottom: 3px double #000;
            margin-bottom: 20px;
        }
        .header-table td {
            vertical-align: middle;
            text-align: center;
            padding-bottom: 10px;
        }
        .header-logo img {
            width: 75px;
            height: auto;
        }
        .header-text h3 { margin: 0; font-size: 16px; font-weight: normal; }
        .header-text h2 { margin: 5px 0; font-size: 22px; font-weight: bold; }
        .header-text p { margin: 0; font-size: 11px; }

        /* QR Code Box */
        .qr-box {
            text-align: center;
            font-size: 9px;
            font-weight: bold;
        }
        .qr-box img {
            width: 75px;
            height: 75px;
        }

        /* Judul Kartu */
        .title-box {
            text-align: center;
            margin-bottom: 25px;
        }
        .card-title {
            background-color: #000;
            color: #fff;
            display: inline-block;
            padding: 8px 30px;
            font-weight: bold;
            font-size: 16px;
            border-radius: 4px;
            text-transform: uppercase;
        }

        /* Content Layout */
        .content-table {
            width: 100%;
            margin-bottom: 20px;
        }
        .content-table td {
            vertical-align: top;
        }

        /* Foto Profil */
        .photo-cell {
            width: 140px;
            text-align: center;
            padding-right: 20px;
        }
        .photo-frame {
            width: 3cm;
            height: 4cm;
            border: 2px solid #000;
            padding: 3px;
            margin: 0 auto;
        }
        .photo-frame img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .nisn-label {
            margin-top: 5px;
            font-size: 11px;
            font-weight: bold;
            background: #eee;
            border: 1px solid #000;
            padding: 2px;
        }

        /* Data Diri */
        .data-cell {
            padding-left: 10px;
        }
        .info-table {
            width: 100%;
            font-size: 13px;
            border-collapse: collapse;
        }
        .info-table td {
            padding: 6px 4px;
            border-bottom: 1px dashed #ccc;
        }
        .info-table tr:last-child td {
            border-bottom: none;
        }
        .label { font-weight: bold; width: 140px; }
        .sep { width: 15px; text-align: center; }

        /* Footer / TTD */
        .footer-table {
            width: 100%;
            margin-top: 40px;
            text-align: center;
        }
        .footer-table td {
            vertical-align: top;
            width: 50%;
            font-size: 12px;
        }
        .ttd-space {
            height: 70px;
        }
        .ttd-name {
            border-bottom: 1px solid #000;
            display: inline-block;
            min-width: 150px;
            font-weight: bold;
        }

        /* Notes */
        .notes {
            margin-top: 20px;
            font-size: 10px;
            font-style: italic;
            border: 1px solid #000;
            padding: 10px;
            background: #f9f9f9;
        }

        /* Watermark */
        .watermark {
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            opacity: 0.05;
            z-index: -1;
        }
    </style>
</head>
<body>

    <div class="card-container">
        <div class="card-inner">

            <!-- Watermark -->
            @if($logoPic)
                <img src="{{ $logoPic }}" class="watermark">
            @endif

            <!-- Header menggunakan Tabel 3 Kolom (Logo | Teks | QR) -->
            <table class="header-table">
                <tr>
                    <td width="15%" style="text-align: left;">
                        @if($logoPic)
                            <div class="header-logo"><img src="{{ $logoPic }}"></div>
                        @endif
                    </td>
                    <td width="70%">
                        <div class="header-text">
                            <h3>PEMERINTAH PROVINSI SUMATERA UTARA</h3>
                            <h2>SMAN 1 PANGARIBUAN</h2>
                            <p>Jl. Pendidikan No. 1, Desa Pakpahan, Kec. Pangaribuan, Kab. Tapanuli Utara</p>
                            <p>Website: www.sman1pangaribuan.sch.id | Email: info@sman1pangaribuan.sch.id</p>
                        </div>
                    </td>
                    <td width="15%" style="text-align: right;">
                        <div class="qr-box">
                            <img src="data:image/svg+xml;base64,{{ $qrCode }}">
                            <div>SCAN VALIDASI</div>
                        </div>
                    </td>
                </tr>
            </table>

            <!-- Judul -->
            <div class="title-box">
                <span class="card-title">KARTU TANDA PESERTA PPDB 2025</span>
            </div>

            <!-- Konten (Foto & Data) -->
            <table class="content-table">
                <tr>
                    <!-- Kolom Foto -->
                    <td class="photo-cell">
                        <div class="photo-frame">
                            @if($profilePic)
                                <img src="{{ $profilePic }}">
                            @else
                                <div style="display:flex; height:100%; align-items:center; justify-content:center; background:#ddd; font-size:10px;">
                                    FOTO 3x4
                                </div>
                            @endif
                        </div>
                        <div class="nisn-label">{{ $registration->nisn }}</div>
                    </td>

                    <!-- Kolom Data -->
                    <td class="data-cell">
                        <table class="info-table">
                            <tr>
                                <td class="label">No. Pendaftaran</td>
                                <td class="sep">:</td>
                                <td><strong>{{ str_pad($registration->id, 5, '0', STR_PAD_LEFT) }}/PPDB/2025</strong></td>
                            </tr>
                            <tr>
                                <td class="label">Nama Lengkap</td>
                                <td class="sep">:</td>
                                <td>{{ strtoupper($registration->nama_lengkap) }}</td>
                            </tr>
                            <tr>
                                <td class="label">Tempat, Tgl Lahir</td>
                                <td class="sep">:</td>
                                <td>{{ $registration->tempat_lahir }}, {{ \Carbon\Carbon::parse($registration->tanggal_lahir)->format('d-m-Y') }}</td>
                            </tr>
                            <tr>
                                <td class="label">Jenis Kelamin</td>
                                <td class="sep">:</td>
                                <!-- Menggunakan Null Coalescing Operator agar tidak error jika kosong -->
                                <td>{{ $registration->jenis_kelamin ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="label">Agama</td>
                                <td class="sep">:</td>
                                <td>{{ $registration->agama ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="label">Asal Sekolah</td>
                                <td class="sep">:</td>
                                <td>{{ $registration->asal_sekolah }}</td>
                            </tr>
                            <tr>
                                <td class="label">Jalur Pendaftaran</td>
                                <td class="sep">:</td>
                                <td><span style="font-weight:bold;">{{ strtoupper($registration->jalur_pendaftaran) }}</span></td>
                            </tr>
                            <tr>
                                <td class="label">Status Seleksi</td>
                                <td class="sep">:</td>
                                <td><strong>{{ strtoupper($registration->status) }}</strong></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <!-- Footer Tanda Tangan -->
            <table class="footer-table">
                <tr>
                    <td>
                        <p>Mengetahui,<br>Orang Tua/Wali</p>
                        <div class="ttd-space"></div>
                        <div class="ttd-name">( ........................................ )</div>
                    </td>
                    <td>
                        <p>Pangaribuan, {{ date('d F Y') }}<br>Panitia PPDB</p>
                        <div class="ttd-space"></div>
                        <div class="ttd-name">( Stempel & Tanda Tangan )</div>
                    </td>
                </tr>
            </table>

            <!-- Catatan -->
            <div class="notes">
                <strong>CATATAN PENTING:</strong>
                <ol style="margin: 5px 0 0 15px; padding: 0;">
                    <li>Kartu ini adalah bukti sah pendaftaran calon peserta didik baru.</li>
                    <li>Wajib dibawa saat melakukan verifikasi berkas fisik dan daftar ulang di sekolah.</li>
                    <li>Simpan kartu ini dengan baik dan jangan sampai rusak/hilang.</li>
                    <li>Jika ada data yang kosong (seperti Jenis Kelamin/Agama), mohon perbarui data di Formulir Pendaftaran dan cetak ulang.</li>
                </ol>
            </div>

        </div>
    </div>

</body>
</html>