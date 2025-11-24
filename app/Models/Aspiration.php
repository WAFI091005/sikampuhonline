<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspiration extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'content',
        'image_url', // <-- DIGANTI DARI attachment_url
        'is_read',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];
}