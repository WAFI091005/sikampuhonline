<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('arsip', function (Blueprint $table) {
            $table->id();

            // relasi ke pengajuan_surat
            $table->unsignedBigInteger('pengajuan_id');
            $table->foreign('pengajuan_id')->references('id')->on('pengajuan_surat')->onDelete('cascade');

            // relasi ke users (uploader)
            $table->unsignedBigInteger('uploader_id');
            $table->foreign('uploader_id')->references('id')->on('users')->onDelete('cascade');

            $table->enum('kategori', ['Surat Masuk', 'Surat Keluar', 'Dokumen Lain'])->default('Surat Masuk');
            $table->string('file_path'); // lokasi file di storage/public/arsip misalnya
            $table->date('tanggal_upload');
            $table->string('nama_dokumen');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('arsip');
    }
};
