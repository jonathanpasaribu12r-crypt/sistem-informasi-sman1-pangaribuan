<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('email');
            $table->string('nisn', 10)->unique();
            $table->enum('jalur_pendaftaran', ['zonasi', 'prestasi', 'afirmasi', 'perpindahan']);
            $table->text('alamat')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('asal_sekolah')->nullable();
            $table->string('nama_wali')->nullable();
            $table->string('pekerjaan_wali')->nullable();
            $table->enum('status', ['pending', 'diverifikasi', 'diterima', 'ditolak'])->default('pending');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};