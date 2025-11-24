<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillageOfficial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'nip_or_education',
        'photo_url',
        'greeting',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}