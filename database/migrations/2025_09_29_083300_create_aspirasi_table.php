<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('aspirasi', function (Blueprint $table) {
            $table->id(); // primary key
            
            // relasi ke penduduk
            $table->unsignedBigInteger('penduduk_id');
            $table->foreign('penduduk_id')->references('id')->on('penduduk')->onDelete('cascade');
            
            // relasi ke users (penindak)
            $table->unsignedBigInteger('penindak_id')->nullable();
            $table->foreign('penindak_id')->references('id')->on('users')->onDelete('set null');

            $table->string('judul');
            $table->text('isi');
            $table->enum('status', ['Menunggu', 'Diproses', 'Selesai'])->default('Menunggu');
            $table->date('tanggal');
            $table->text('tanggapan')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aspirasi');
    }
};
