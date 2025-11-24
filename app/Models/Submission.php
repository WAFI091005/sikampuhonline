<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder; // Import Builder untuk type hinting

class Submission extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'user_id',
        'nik',
        'applicant_name',
        'phone',
        'email',
        'gender',
        'address',
        'unique_details',
        'submission_code',
        'status',
        'rejected_reason',
    ];

    protected $casts = [
        'unique_details' => 'array',
    ];

    // Relasi
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Query Scope untuk mencari pengajuan berdasarkan NIK pemohon.
     * Metode ini dipanggil sebagai Submission::byNik($nik).
     */
public function scopeByNik(Builder $query, string $nik): Builder
{
    return $query
        ->whereRaw('TRIM(CAST(nik AS CHAR)) = ?', [trim((string)$nik)])
        ->orderBy('created_at', 'desc');
}

}