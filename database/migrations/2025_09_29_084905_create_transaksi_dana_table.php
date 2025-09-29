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
        Schema::create('transaksi_dana', function (Blueprint $table) {
            $table->id();

            // Relasi ke kategori_dana
            $table->foreignId('kategori_id')->constrained('kategori_dana')->onDelete('cascade');

            // Relasi ke sumber_dana
            $table->foreignId('sumber_id')->constrained('sumber_dana')->onDelete('cascade');

            // Relasi ke proyek
            $table->foreignId('proyek_id')->constrained('proyek')->onDelete('cascade');

            // Kolom tambahan
            $table->date('tanggal');
            $table->text('keterangan')->nullable();
            $table->decimal('jumlah', 15, 2); // format angka uang (maks 15 digit total, 2 digit desimal)

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_dana');
    }
};
