<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillageProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'logo_url',
        'description',
        'commitment',
        
        // --- KOLOM BARU UNTUK HALAMAN PROFIL ---
        'structure_image_url', 
        'population_total',
        'population_male',
        'population_female',
        'area_size',
        'history_content',
        'myth_content',
        'map1_image_url',
        'map2_image_url',
        
        // --- KOLOM CAPAIAN (Achievement) ---
        'achievement_governance',
        'achievement_community',
        'achievement_development',
        'achievement_disaster',
    ];

    protected $casts = [
        'achievement_governance' => 'integer',
        'achievement_community' => 'integer',
        'achievement_development' => 'integer',
        'achievement_disaster' => 'integer',
        // Tambahkan casts untuk kolom achievement lainnya
    ];
}