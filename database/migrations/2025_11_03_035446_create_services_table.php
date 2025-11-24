<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama Layanan (Contoh: Surat Keterangan Tidak Mampu (SKTM))
            $table->string('slug')->unique(); // Slug untuk referensi (Contoh: sktm)
            $table->string('blade_view'); // Nama file partial view yang akan dipanggil (Contoh: _sktm)
            $table->text('description')->nullable(); // Deskripsi layanan
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};