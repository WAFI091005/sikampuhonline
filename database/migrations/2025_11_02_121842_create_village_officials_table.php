<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('village_officials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title'); // Contoh: Kepala Desa, Ketua BPD, dll.
            $table->string('nip_or_education')->nullable(); // NIP atau Gelar Pendidikan
            $table->string('photo_url')->nullable();
            $table->text('greeting')->nullable(); // Khusus untuk Kepala Desa
            $table->boolean('is_active')->default(true); // Status apakah sedang menjabat
            $table->integer('sort_order')->default(0); // Untuk urutan tampilan
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('village_officials');
    }
};