<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisionMission extends Model
{
    use HasFactory;

    protected $fillable = [
        'vision',
        'mission_list',
        'is_active',
    ];

    /**
     * Casting mission_list agar data JSON dikonversi otomatis menjadi array (daftar).
     */
    protected $casts = [
        'mission_list' => 'array',
        'is_active' => 'boolean',
    ];
    
    // Biasanya, hanya ada satu set Visi Misi yang aktif
    public static function getActive()
    {
        return static::where('is_active', true)->first();
    }
}