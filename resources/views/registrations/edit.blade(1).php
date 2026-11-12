@extends('layouts.app')

@section('title', 'Edit Data Pendaftaran')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-white">
                    <h4 class="mb-0">
                        <i class="fas fa-edit me-2"></i>Edit Data Pendaftaran
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('registrations.update', $registration) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row mb-4">
                            <div class="col-md-12">
                                <h5 class="border-bottom pb-2 mb-3">
                                    <i class="fas fa-user me-2"></i>Data Calon Siswa
                                </h5>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="nama_lengkap" class="form-label">
                                    Nama Lengkap <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" 
                                       id="nama_lengkap" name="nama_lengkap" 
                                       value="{{ old('nama_lengkap', $registration->nama_lengkap) }}" required>
                                @error('nama_lengkap')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label">
                                    Email <span class="text-danger">*</span>
                                </label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       id="email" name="email" 
                                       value="{{ old('email', $registration->email) }}" required>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="nisn" class="form-label">
                                    NISN <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control @error('nisn') is-invalid @enderror" 
                                       id="nisn" name="nisn" maxlength="10"
                                       value="{{ old('nisn', $registration->nisn) }}" required>
                                <small class="text-muted">10 digit Nomor Induk Siswa Nasional</small>
                                @error('nisn')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="jalur_pendaftaran" class="form-label">
                                    Jalur Pendaftaran <span class="text-danger">*</span>
                                </label>
                                <select class="form-select @error('jalur_pendaftaran') is-invalid @enderror" 
                                        id="jalur_pendaftaran" name="jalur_pendaftaran" required>
                                    <option value="">Pilih Jalur</option>
                                    <option value="zonasi" {{ old('jalur_pendaftaran', $registration->jalur_pendaftaran) == 'zonasi' ? 'selected' : '' }}>Zonasi</option>
                                    <option value="prestasi" {{ old('jalur_pendaftaran', $registration->jalur_pendaftaran) == 'prestasi' ? 'selected' : '' }}>Prestasi</option>
                                    <option value="afirmasi" {{ old('jalur_pendaftaran', $registration->jalur_pendaftaran) == 'afirmasi' ? 'selected' : '' }}>Afirmasi</option>
                                    <option value="perpindahan" {{ old('jalur_pendaftaran', $registration->jalur_pendaftaran) == 'perpindahan' ? 'selected' : '' }}>Perpindahan</option>
                                </select>
                                @error('jalur_pendaftaran')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="no_hp" class="form-label">Nomor HP</label>
                                <input type="text" class="form-control @error('no_hp') is-invalid @enderror" 
                                       id="no_hp" name="no_hp" 
                                       value="{{ old('no_hp', $registration->no_hp) }}">
                                @error('no_hp')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="asal_sekolah" class="form-label">Asal Sekolah</label>
                                <input type="text" class="form-control @error('asal_sekolah') is-invalid @enderror" 
                                       id="asal_sekolah" name="asal_sekolah" 
                                       value="{{ old('asal_sekolah', $registration->asal_sekolah) }}">
                                @error('asal_sekolah')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="alamat" class="form-label">Alamat Lengkap</label>
                                <textarea class="form-control @error('alamat') is-invalid @enderror" 
                                          id="alamat" name="alamat" rows="3">{{ old('alamat', $registration->alamat) }}</textarea>
                                @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4 mt-4">
                            <div class="col-md-12">
                                <h5 class="border-bottom pb-2 mb-3">
                                    <i class="fas fa-users me-2"></i>Data Wali
                                </h5>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="nama_wali" class="form-label">Nama Wali</label>
                                <input type="text" class="form-control @error('nama_wali') is-invalid @enderror" 
                                       id="nama_wali" name="nama_wali" 
                                       value="{{ old('nama_wali', $registration->nama_wali) }}">
                                @error('nama_wali')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="pekerjaan_wali" class="form-label">Pekerjaan Wali</label>
                                <input type="text" class="form-control @error('pekerjaan_wali') is-invalid @enderror" 
                                       id="pekerjaan_wali" name="pekerjaan_wali" 
                                       value="{{ old('pekerjaan_wali', $registration->pekerjaan_wali) }}">
                                @error('pekerjaan_wali')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('registrations.index') }}" class="btn btn-secondary">
                                        <i class="fas fa-arrow-left me-2"></i>Kembali
                                    </a>
                                    <button type="submit" class="btn btn-warning">
                                        <i class="fas fa-save me-2"></i>Update Data
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Format NISN (10 digit)
    document.getElementById('nisn').addEventListener('input', function(e) {
        this.value = this.value.replace(/\D/g, '').slice(0, 10);
    });

    // Format No HP
    document.getElementById('no_hp').addEventListener('input', function(e) {
        this.value = this.value.replace(/\D/g, '').slice(0, 15);
    });
</script>
@endsection