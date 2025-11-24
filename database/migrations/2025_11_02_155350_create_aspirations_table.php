<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('aspirations', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama
            $table->string('phone'); // No Telepon/WA
            $table->text('content'); // Isi Aspirasi & Pengaduan
            $table->string('image_url')->nullable(); // <-- DIGANTI DARI attachment_url
            $table->boolean('is_read')->default(false); // Status dibaca/belum
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aspirations');
    }
};