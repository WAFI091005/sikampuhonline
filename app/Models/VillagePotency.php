<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillagePotency extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'title',
        'content',
        'icon_color',
        'image_url',
        'sort_order',
    ];
}