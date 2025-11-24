<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('village_potencies', function (Blueprint $table) {
            $table->id();
            
            // Tipe Potensi: 'summary', 'physical', 'non_physical'
            $table->string('type'); 
            
            $table->string('title'); // Judul (Contoh: UMKM, Pertanian, Gotong Royong)
            $table->text('content')->nullable(); // Isi deskripsi atau penjelasan panjang
            $table->string('icon_color')->nullable(); // Warna latar belakang untuk kartu/ikon (Contoh: #FFD700)
            $table->string('image_url')->nullable(); // Gambar untuk kartu fisik
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('village_potencies');
    }
};