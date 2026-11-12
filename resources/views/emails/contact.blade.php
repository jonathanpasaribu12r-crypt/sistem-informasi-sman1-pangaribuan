<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pesan dari Calon Siswa PPDB</title>
</head>
<body>
    <h2>SMAN 1 PANGARIBUAN</h2>
    <p>Portal PPDB Digital</p>
    
    <hr>
    
    <h3>Pesan Baru dari Calon Siswa</h3>
    
    <p><strong>Nama:</strong> {{ $nama ?? "N/A" }}</p>
    <p><strong>Email:</strong> {{ $email ?? "N/A" }}</p>
    <p><strong>Subjek:</strong> {{ $subjek ?? "N/A" }}</p>
    <p><strong>Waktu:</strong> {{ $waktu ?? "N/A" }}</p>
    
    <hr>
    
    <h4>Isi Pesan:</h4>
    <div style="background: #f5f5f5; padding: 15px; border-radius: 5px;">
        {{ $isi_pesan ?? "Tidak ada pesan" }}
    </div>
    
    <hr>
    
    <p><small>Email ini dikirim otomatis dari sistem PPDB SMAN 1 Pangaribuan.</small></p>
    <p><small>Balas ke: {{ $email ?? "N/A" }}</small></p>
</body>
</html>