<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ApbdesDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'apbdes_year_id',
        'type',
        'name',
        'amount',
        'notes',
    ];

    protected $casts = [
        'amount' => 'integer',
        // ✅ BARIS INI DIHAPUS karena tidak menggunakan PHP Enum
        // 'type' => \App\Enums\ApbdesDetailType::class, 
    ];

    public function apbdesYear(): BelongsTo
    {
        return $this->belongsTo(ApbdesYear::class);
    }
}