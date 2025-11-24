<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ApbdesProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'apbdes_year_id',
        'name',
        'location',
        'budget',
        'status',
        'image_url',
    ];
    
    protected $casts = [
        'budget' => 'integer',
        'status' => 'string', // atau bisa juga Enum
    ];

    public function apbdesYear(): BelongsTo
    {
        return $this->belongsTo(ApbdesYear::class);
    }
}