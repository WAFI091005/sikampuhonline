<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('archives', function (Blueprint $table) {
            $table->id();
            
            $table->string('title'); // Judul Dokumen
            $table->text('description')->nullable(); // Deskripsi singkat
            
            // Kategori (Menggunakan ENUM untuk kategori tetap)
            $table->enum('category', ['Berita', 'Laporan', 'Pengumuman', 'Dokumen Keuangan']); 
            
            $table->year('year'); // Tahun Dokumen
            
            // File Uploads
            $table->string('file_url'); // Path/URL file (PDF, DOCX, dll.)
            $table->string('image_url')->nullable(); // Path/URL thumbnail dokumen
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archives');
    }
};