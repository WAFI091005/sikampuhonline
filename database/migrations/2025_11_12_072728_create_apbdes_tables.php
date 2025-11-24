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
        // 1. Tabel APBDES TAHUNAN (Header Data & Lampiran Ringkasan)
        Schema::create('apbdes_years', function (Blueprint $table) {
            $table->id();
            $table->year('year')->unique();
            $table->string('title'); // Contoh: APBDes Tahun Anggaran 2025
            $table->longText('summary')->nullable();
            
            // Lampiran Ringkasan (Gambar yang tampil di halaman utama)
            $table->string('summary_image_url')->nullable(); 
            
            // Lampiran Dokumen Lengkap (Bisa berupa PDF atau JPG Resolusi Tinggi)
            $table->string('document_file_url')->nullable(); 

            // Total anggaran yang sudah dihitung (untuk caching)
            $table->bigInteger('total_revenue')->default(0); 
            $table->bigInteger('total_expenditure')->default(0); 

            $table->timestamps();
        });

        // 2. Tabel DETAIL ANGGARAN (Penerimaan dan Pengeluaran)
        Schema::create('apbdes_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('apbdes_year_id')->constrained('apbdes_years')->onDelete('cascade');
            
            $table->enum('type', ['revenue', 'expenditure']); // Jenis: Penerimaan atau Belanja
            $table->string('name'); // Nama pos anggaran (Contoh: Dana Desa, Belanja Pegawai, Belanja Modal)
            $table->bigInteger('amount'); // Jumlah anggaran
            $table->longText('notes')->nullable();
            
            $table->timestamps();
        });

        // 3. Tabel DETAIL PROYEK (Untuk Belanja Modal/Pembangunan)
        Schema::create('apbdes_projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('apbdes_year_id')->constrained('apbdes_years')->onDelete('cascade');
            
            $table->string('name'); // Nama Proyek (Contoh: Pembangunan Jalan Lingkungan RT 05)
            $table->string('location')->nullable();
            $table->bigInteger('budget'); // Anggaran yang dialokasikan
            $table->enum('status', ['Perencanaan', 'Proses', 'Selesai'])->default('Perencanaan');
            
            // Lampiran Proyek (Gambar Hasil Pembangunan)
            $table->string('image_url')->nullable(); 
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apbdes_projects');
        Schema::dropIfExists('apbdes_details');
        Schema::dropIfExists('apbdes_years');
    }
};