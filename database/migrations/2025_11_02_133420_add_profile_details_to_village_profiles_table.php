<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('village_profiles', function (Blueprint $table) {
            // Kolom untuk Struktur Organisasi (URL Gambar)
            $table->string('structure_image_url')->nullable()->after('commitment'); 

            // Kolom untuk Data Demografi
            $table->unsignedBigInteger('population_total')->default(0)->after('structure_image_url');
            $table->unsignedBigInteger('population_male')->default(0)->after('population_total');
            $table->unsignedBigInteger('population_female')->default(0)->after('population_male');
            $table->string('area_size')->nullable()->default('0 km²')->after('population_female');

            // Kolom untuk Sejarah dan Mitos
            $table->text('history_content')->nullable();
            $table->text('myth_content')->nullable();
            $table->string('map1_image_url')->nullable(); // Peta Lokasi
            $table->string('map2_image_url')->nullable(); // Peta Wilayah
        });
    }

    public function down(): void
    {
        Schema::table('village_profiles', function (Blueprint $table) {
            $table->dropColumn([
                'structure_image_url',
                'population_total',
                'population_male',
                'population_female',
                'area_size',
                'history_content',
                'myth_content',
                'map1_image_url',
                'map2_image_url',
            ]);
        });
    }
};