<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'slug', 
        'main_image_url', 
        'content', 
        'author', 
        'published_at'
    ];
    
    protected $casts = [
        'published_at' => 'date', // Memastikan kolom ini dikonversi menjadi objek Carbon/Date
    ];

        public function getMainImageUrlAttribute($value)
    {
        if (!$value) {
            return null;
        }

        // Kalau path sudah mengandung 'http' biarkan
        if (str_starts_with($value, 'http')) {
            return $value;
        }

        // Kalau path dari storage/app/public -> ubah jadi public URL
        return Storage::url($value);
    }
}