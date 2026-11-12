@extends('layouts.app')

@section('title', 'Data Pendaftaran PPDB')

@section('content')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-md-8">
            <h1 class="h2 fw-bold">
                <i class="fas fa-list me-2"></i>Data Pendaftaran PPDB
            </h1>
            <p class="text-muted">Kelola data pendaftaran siswa baru SMAN 1 Pangaribuan</p>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('registrations.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle me-2"></i>Tambah Pendaftaran Baru
            </a>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('registrations.index') }}" method="GET" class="row g-3">
                <div class="col-md-10">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="text" name="search" class="form-control" 
                               placeholder="Cari berdasarkan nama, NISN, atau email..." 
                               value="{{ request('search') }}">
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-search me-2"></i>Cari
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <!-- Data Table -->
    <div class="card shadow-sm">
        <div class="card-body">
            @if($registrations->isEmpty())
            <div class="text-center py-5">
                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">Belum ada data pendaftaran</h5>
                <p class="text-muted">Mulai dengan menambahkan data pendaftaran baru</p>
                <a href="{{ route('registrations.create') }}" class="btn btn-primary mt-3">
                    <i class="fas fa-plus-circle me-2"></i>Tambah Data
                </a>
            </div>
            @else
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nama Lengkap</th>
                            <th>NISN</th>
                            <th>Email</th>
                            <th>Jalur</th>
                            <th>Status</th>
                            <th>Tanggal Daftar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($registrations as $registration)
                        <tr>
                            <td>{{ $loop->iteration + ($registrations->currentPage() - 1) * $registrations->perPage() }}</td>
                            <td>
                                <strong>{{ $registration->nama_lengkap }}</strong>
                                <br>
                                <small class="text-muted">{{ $registration->asal_sekolah ?? '-' }}</small>
                            </td>
                            <td>
                                <span class="badge bg-secondary">{{ $registration->nisn }}</span>
                            </td>
                            <td>{{ $registration->email }}</td>
                            <td>
                                @php
                                    $jalurColors = [
                                        'zonasi' => 'primary',
                                        'prestasi' => 'success',
                                        'afirmasi' => 'warning',
                                        'perpindahan' => 'info'
                                    ];
                                @endphp
                                <span class="badge bg-{{ $jalurColors[$registration->jalur_pendaftaran] ?? 'secondary' }}">
                                    {{ ucfirst($registration->jalur_pendaftaran) }}
                                </span>
                            </td>
                            <td>
                                @php
                                    $statusColors = [
                                        'pending' => 'secondary',
                                        'diverifikasi' => 'info',
                                        'diterima' => 'success',
                                        'ditolak' => 'danger'
                                    ];
                                @endphp
                                <span class="badge bg-{{ $statusColors[$registration->status] ?? 'secondary' }}">
                                    {{ ucfirst($registration->status) }}
                                </span>
                            </td>
                            <td>{{ $registration->created_at->format('d/m/Y') }}</td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('registrations.show', $registration) }}" 
                                       class="btn btn-outline-info" title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('registrations.edit', $registration) }}" 
                                       class="btn btn-outline-warning" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('registrations.destroy', $registration) }}" 
                                          method="POST" class="d-inline"
                                          onsubmit="return confirm('Hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="text-muted">
                    Menampilkan {{ $registrations->firstItem() }} - {{ $registrations->lastItem() }} 
                    dari {{ $registrations->total() }} data
                </div>
                <div>
                    {{ $registrations->links() }}
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Statistics -->
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-clock me-2"></i>Pending
                    </h5>
                    <h2 class="mb-0">{{ $registrations->where('status', 'pending')->count() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-check-circle me-2"></i>Diverifikasi
                    </h5>
                    <h2 class="mb-0">{{ $registrations->where('status', 'diverifikasi')->count() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-user-check me-2"></i>Diterima
                    </h5>
                    <h2 class="mb-0">{{ $registrations->where('status', 'diterima')->count() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-times-circle me-2"></i>Ditolak
                    </h5>
                    <h2 class="mb-0">{{ $registrations->where('status', 'ditolak')->count() }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection