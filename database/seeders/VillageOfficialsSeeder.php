<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VillageOfficial; 

class VillageOfficialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama untuk memastikan data bersih
        VillageOfficial::truncate();

        // Data Pejabat Desa
        $officials = [
            // --- KEPALA DESA AKTIF (Akan muncul di Sambutan dan Struktur) ---
            [
                'name' => 'Misno, S.I.Pust',
                'title' => 'Kepala Desa',
                'nip_or_education' => 'S.I.Pust',
                'photo_url' => 'https://placehold.co/192x192/06B6D4/ffffff?text=Misno',
                'greeting' => '"Assalamualaikum, salam sejahtera bagi kita semua wahai rakyatku tercintuh. Desa Sikampuh akan terus maju dan berinovasi demi kemakmuran bersama. Mari kita jadikan Sikampuh yang lebih baik."',
                'is_active' => true,
                'sort_order' => 10,
            ],
            
            // --- Jajaran Organisasi Lain ---
            [
                'name' => 'Budi Santoso',
                'title' => 'Sekretaris Desa',
                'nip_or_education' => 'S.E',
                'photo_url' => 'https://placehold.co/128x128/c0c0c0/333333?text=Budi',
                'is_active' => true,
                'sort_order' => 20,
            ],
            [
                'name' => 'Maya Sari',
                'title' => 'Kepala Urusan Keuangan',
                'nip_or_education' => 'A.Md',
                'photo_url' => 'https://placehold.co/128x128/c0c0c0/333333?text=Maya',
                'is_active' => true,
                'sort_order' => 30,
            ],
            [
                'name' => 'Fairuuzzzzz',
                'title' => 'Kepala Urusan Perencanaan',
                'nip_or_education' => 'S.Kom',
                'photo_url' => 'https://placehold.co/128x128/c0c0c0/333333?text=Fairuuzzzzz',
                'is_active' => true,
                'sort_order' => 40,
            ],
            [
                'name' => 'Ahmad Riki',
                'title' => 'Ketua BPD',
                'nip_or_education' => 'S.H',
                'photo_url' => 'https://placehold.co/128x128/c0c0c0/333333?text=Riki',
                'is_active' => true,
                'sort_order' => 50,
            ],
        ];

        foreach ($officials as $official) {
            VillageOfficial::create($official);
        }

        $this->command->info('Data Pejabat Desa berhasil diisi!');
    }
}