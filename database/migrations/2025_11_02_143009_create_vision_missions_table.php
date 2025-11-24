<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vision_missions', function (Blueprint $table) {
            $table->id();
            
            // Kolom untuk Visi (Teks panjang)
            $table->text('vision');
            
            // Kolom untuk Daftar Misi. Menggunakan JSON agar mudah disimpan sebagai array string (daftar poin)
            $table->json('mission_list');
            
            // Kolom opsional: untuk menandai versi Visi Misi mana yang aktif (jika ada sejarah perubahan)
            $table->boolean('is_active')->default(true);
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vision_missions');
    }
};