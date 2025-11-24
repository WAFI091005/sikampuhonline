<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'description',
        'category',
        'year',
        'file_url',
        'image_url',
    ];

    protected $casts = [
        'year' => 'integer',
        // Jika Anda menggunakan PHP Enum untuk kategori, Anda bisa tambahkan di sini
        // 'category' => \App\Enums\ArchiveCategory::class,
    ];
    
    // Default nilai untuk pencarian yang lebih mudah
    protected $attributes = [
        'category' => 'Laporan', 
    ];
}