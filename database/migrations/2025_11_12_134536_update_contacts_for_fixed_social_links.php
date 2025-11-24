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
        Schema::table('contacts', function (Blueprint $table) {
            // Hapus kolom yang tidak diperlukan
            $table->dropColumn('location_name');
            $table->dropColumn('social_links');

            // Tambahkan 5 kolom URL tetap
            $table->string('facebook_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('tiktok_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            // Kembalikan ke struktur lama jika rollback
            $table->string('location_name')->default('Kantor Desa')->nullable();
            $table->json('social_links')->nullable();
            
            // Hapus 5 kolom URL tetap
            $table->dropColumn('facebook_url');
            $table->dropColumn('youtube_url');
            $table->dropColumn('instagram_url');
            $table->dropColumn('twitter_url');
            $table->dropColumn('tiktok_url');
        });
    }
};