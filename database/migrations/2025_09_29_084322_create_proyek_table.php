<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('proyek', function (Blueprint $table) {
            $table->id();
            $table->string('nama_proyek');
            $table->string('lokasi');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai')->nullable();
            $table->enum('status', ['Perencanaan', 'Berjalan', 'Selesai', 'Dibatalkan'])->default('Perencanaan');
            $table->text('deskripsi')->nullable();

            // relasi ke kategori_dana
            $table->unsignedBigInteger('kategori_id');
            $table->foreign('kategori_id')->references('id')->on('kategori_dana')->onDelete('cascade');

            // relasi ke sumber_dana
            $table->unsignedBigInteger('sumber_id');
            $table->foreign('sumber_id')->references('id')->on('sumber_dana')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('proyek');
    }
};
