<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jenis_surat', function (Blueprint $table) {
            $table->id(); // primary key
            $table->string('nama_jenis'); // nama jenis surat
            $table->text('deskripsi')->nullable(); // deskripsi jenis surat
            $table->text('template')->nullable(); // template surat (bisa HTML atau teks biasa)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jenis_surat');
    }
};
