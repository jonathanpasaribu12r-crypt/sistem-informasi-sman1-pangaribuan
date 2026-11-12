<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    // DAFTARKAN SEMUA KOLOM DI SINI AGAR BISA DISIMPAN
    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'nisn',
        'tempat_lahir',     // Sebelumnya mungkin belum ada
        'tanggal_lahir',    // Sebelumnya mungkin belum ada
        'jenis_kelamin',    // Sebelumnya mungkin belum ada
        'agama',            // Sebelumnya mungkin belum ada
        'alamat',
        'no_hp',
        'email',
        'asal_sekolah',
        'alamat_sekolah',
        'tahun_lulus',
        'jalur_pendaftaran',
        'nama_wali',
        'pekerjaan_wali',
        'no_hp_wali',
        'ijazah_file',
        'foto_file',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}