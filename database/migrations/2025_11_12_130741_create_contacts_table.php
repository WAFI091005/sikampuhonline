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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('location_name')->default('Kantor Desa')->nullable();
            
            // Kontak Langsung
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            
            // Kolom untuk menyimpan array tautan media sosial (seperti TikTok, Facebook, dll.)
            $table->json('social_links')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};