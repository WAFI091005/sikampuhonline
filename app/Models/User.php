<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Field yang dapat diisi secara massal (mass assignable).
     * Ditambahkan 'nik' dan 'penduduk_id' untuk otentikasi penduduk.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'nik',           // <-- BARU: Untuk otentikasi NIK
        'penduduk_id',   // <-- BARU: Foreign Key ke tabel 'penduduk'
    ];

    /**
     * Field yang harus disembunyikan.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    
    // ===========================================
    // LOGIKA RELASI & AUTENTIKASI PENDUDUK
    // ===========================================
    
    /**
     * Relasi One-to-One ke data kependudukan.
     */
public function penduduk()
{
    return $this->belongsTo(\App\Models\Penduduk::class);
}


    /**
     * Tentukan kolom yang digunakan sebagai field login (username).
     * Wajib untuk otentikasi NIK.
     */
    public function username(): string
    {
        return 'nik';
    }

    /**
     * Metode yang digunakan oleh Laravel/Passport untuk mencari user berdasarkan NIK.
     */
    public function findForPassport(string $username): ?self
    {
        return $this->where('nik', $username)->first();
    }
}