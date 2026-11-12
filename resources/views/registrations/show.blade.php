@extends('layouts.app')

@section('title', 'Detail Pendaftaran')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="fas fa-id-card me-2"></i>Detail Data Pendaftaran
                    </h4>
                    <div>
                        <span class="badge bg-light text-dark">
                            ID: {{ str_pad($registration->id, 6, '0', STR_PAD_LEFT) }}
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Status Badge -->
                    <div class="row mb-4">
                        <div class="col-md-12">
                            @php
                                $statusColors = [
                                    'pending' => 'secondary',
                                    'diverifikasi' => 'info',
                                    'diterima' => 'success',
                                    'ditolak' => 'danger'
                                ];
                                $statusText = [
                                    'pending' => 'Menunggu Verifikasi',
                                    'diverifikasi' => 'Terverifikasi',
                                    'diterima' => 'Diterima',
                                    'ditolak' => 'Ditolak'
                                ];
                            @endphp
                            <div class="alert alert-{{ $statusColors[$registration->status] }} d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="alert-heading mb-0">
                                        Status Pendaftaran: {{ $statusText[$registration->status] }}
                                    </h5>
                                </div>
                                <span class="badge bg-white text-{{ $statusColors[$registration->status] }} fs-6">
                                    {{ strtoupper($registration->status) }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Left Column: Data Calon Siswa -->
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">
                                        <i class="fas fa-user-graduate me-2"></i>Data Calon Siswa
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-borderless">
                                        <tr>
                                            <th width="40%">Nama Lengkap</th>
                                            <td>{{ $registration->nama_lengkap }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{ $registration->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>NISN</th>
                                            <td>
                                                <span class="badge bg-secondary">{{ $registration->nisn }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Jalur Pendaftaran</th>
                                            <td>
                                                @php
                                                    $jalurColors = [
                                                        'zonasi' => 'primary',
                                                        'prestasi' => 'success',
                                                        'afirmasi' => 'warning',
                                                        'perpindahan' => 'info'
                                                    ];
                                                @endphp
                                                <span class="badge bg-{{ $jalurColors[$registration->jalur_pendaftaran] }}">
                                                    {{ ucfirst($registration->jalur_pendaftaran) }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Asal Sekolah</th>
                                            <td>{{ $registration->asal_sekolah ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nomor HP</th>
                                            <td>{{ $registration->no_hp ?? '-' }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column: Data Wali & Lainnya -->
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">
                                        <i class="fas fa-users me-2"></i>Data Wali
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-borderless">
                                        <tr>
                                            <th width="40%">Nama Wali</th>
                                            <td>{{ $registration->nama_wali ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Pekerjaan Wali</th>
                                            <td>{{ $registration->pekerjaan_wali ?? '-' }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">
                                        <i class="fas fa-info-circle me-2"></i>Informasi Tambahan
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-borderless">
                                        <tr>
                                            <th width="40%">Alamat Lengkap</th>
                                            <td>{{ $registration->alamat ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Daftar</th>
                                            <td>{{ $registration->created_at->format('d F Y H:i') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Terakhir Diupdate</th>
                                            <td>{{ $registration->updated_at->format('d F Y H:i') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Didaftarkan Oleh</th>
                                            <td>{{ $registration->user->name }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Alamat Full Width -->
                    @if($registration->alamat)
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">
                                        <i class="fas fa-map-marker-alt me-2"></i>Alamat Lengkap
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <p class="mb-0">{{ $registration->alamat }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Action Buttons -->
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('registrations.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar
                                </a>
                                <div class="btn-group">
                                    <a href="{{ route('registrations.edit', $registration) }}" class="btn btn-warning">
                                        <i class="fas fa-edit me-2"></i>Edit Data
                                    </a>
                                    <form action="{{ route('registrations.destroy', $registration) }}" 
                                          method="POST" class="d-inline"
                                          onsubmit="return confirm('Hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash me-2"></i>Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection