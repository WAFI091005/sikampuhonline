<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('village_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('Desa Sikampuh');
            $table->string('address')->nullable();
            $table->string('logo_url')->nullable();
            $table->text('description')->nullable();
            $table->text('commitment')->nullable();
            
            // Kolom untuk Capaian Pembangunan (Contoh: JSON atau kolom terpisah)
            $table->integer('achievement_governance')->default(0);
            $table->integer('achievement_community')->default(0);
            $table->integer('achievement_development')->default(0);
            $table->integer('achievement_disaster')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('village_profiles');
    }
};