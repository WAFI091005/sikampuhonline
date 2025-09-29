<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->id(); // kolom id (primary key)
            $table->unsignedBigInteger('penulis'); // foreign key ke users
            $table->string('judul');
            $table->text('isi');
            $table->date('tanggal');
            $table->timestamps();

            // relasi ke tabel users
            $table->foreign('penulis')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
};
