<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('main_image_url')->nullable(); // Gambar Utama/Dokumentasi
            $table->text('content');
            $table->string('author')->default('Pemerintah Desa');
            $table->date('published_at');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};