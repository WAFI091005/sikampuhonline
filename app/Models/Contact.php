<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

protected $fillable = [
        'email',
        'phone',
        'facebook_url',
        'youtube_url',
        'instagram_url',
        'twitter_url',
        'tiktok_url',
    ];

    // ✅ Casting social_links ke array/object
    // protected $casts = [
    //     'social_links' => 'array',
    // ];
}