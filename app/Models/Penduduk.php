<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;
    
    // Memberi tahu Laravel bahwa nama tabelnya adalah 'penduduk' (singular)
    protected $table = 'penduduk'; 

    protected $fillable = [
        'nik',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'pekerjaan',
        'status_perkawinan',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date', // Penting untuk verifikasi tanggal lahir
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relasi One-to-One: Untuk mengetahui akun login mana yang terkait dengan data penduduk ini
    public function user()
    {
        // Asumsi: foreign key 'penduduk_id' ada di tabel 'users'
        return $this->hasOne(User::class, 'penduduk_id'); 
    }
}