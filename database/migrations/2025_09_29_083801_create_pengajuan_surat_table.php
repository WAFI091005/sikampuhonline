<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengajuan_surat', function (Blueprint $table) {
            $table->id();

            // Relasi ke penduduk
            $table->unsignedBigInteger('penduduk_id');
            $table->foreign('penduduk_id')->references('id')->on('penduduk')->onDelete('cascade');

            // Relasi ke jenis_surat
            $table->unsignedBigInteger('jenis_surat_id');
            $table->foreign('jenis_surat_id')->references('id')->on('jenis_surat')->onDelete('cascade');

            // Relasi ke users (verifikator)
            $table->unsignedBigInteger('verifikator_id')->nullable();
            $table->foreign('verifikator_id')->references('id')->on('users')->onDelete('set null');

            $table->enum('status', ['Menunggu', 'Diproses', 'Ditolak', 'Selesai'])->default('Menunggu');
            $table->text('keterangan')->nullable();
            $table->string('file_surat')->nullable(); // bisa simpan path file PDF surat
            $table->date('tanggal_pengajuan');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengajuan_surat');
    }
};
