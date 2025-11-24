<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ApbdesYear extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'title',
        'summary',
        'summary_image_url',
        'document_file_url',
        'total_revenue',
        'total_expenditure',
    ];

    protected $casts = [
        'year' => 'integer',
    ];

    // Relasi ke Detail Anggaran (Penerimaan & Pengeluaran)
    public function details(): HasMany
    {
        return $this->hasMany(ApbdesDetail::class);
    }
    
    // Relasi ke Proyek Pembangunan
    public function projects(): HasMany
    {
        return $this->hasMany(ApbdesProject::class);
    }
    
    // Scope untuk mengambil hanya data Penerimaan
    public function revenues(): HasMany
    {
        return $this->details()->where('type', 'revenue');
    }

    // Scope untuk mengambil hanya data Pengeluaran
    public function expenditures(): HasMany
    {
        return $this->details()->where('type', 'expenditure');
    }
}