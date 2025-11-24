<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service; 

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama (jika ada)
        Service::truncate();

        $services = [
            // Layanan 1: SKTM (Surat Keterangan Tidak Mampu)
            [
                'name' => 'Surat Keterangan Tidak Mampu (SKTM)',
                'slug' => 'sktm',
                'blade_view' => '_sktm', // Sesuai dengan partial view _sktm.blade.php
                'description' => 'Surat pengantar untuk pengurusan bantuan biaya pendidikan atau kesehatan.',
                'is_active' => true,
                'sort_order' => 10,
            ],
            // Layanan 2: Pengantar Nikah (N1-N4)
            [
                'name' => 'Surat Pengantar Nikah (N1-N4)',
                'slug' => 'pengantar-nikah',
                'blade_view' => '_nikah', // Sesuai dengan partial view _nikah.blade.php
                'description' => 'Surat pengantar untuk pendaftaran pernikahan ke KUA/Catatan Sipil.',
                'is_active' => true,
                'sort_order' => 20,
            ],
            // Layanan 3: SKU (Surat Keterangan Usaha)
            [
                'name' => 'Surat Keterangan Usaha (SKU)',
                'slug' => 'sku',
                'blade_view' => '_sku', // Sesuai dengan partial view _sku.blade.php
                'description' => 'Surat keterangan domisili usaha untuk legalitas atau pengajuan modal.',
                'is_active' => true,
                'sort_order' => 30,
            ],
            // Layanan 4: Keterangan Kematian
            [
                'name' => 'Surat Keterangan Kematian',
                'slug' => 'keterangan-kematian',
                'blade_view' => '_kematian', // Sesuai dengan partial view _kematian.blade.php
                'description' => 'Surat pengantar untuk mengurus akta kematian.',
                'is_active' => true,
                'sort_order' => 40,
            ],
            // Layanan 5: Duplikasi untuk mengisi daftar panjang
            [
                'name' => 'Surat Keterangan Domisili',
                'slug' => 'domisili',
                'blade_view' => '_sktm', // Menggunakan form SKTM sebagai placeholder form
                'description' => 'Surat keterangan domisili penduduk.',
                'is_active' => true,
                'sort_order' => 50,
            ],
            [
                'name' => 'Surat Pengantar Kepolisian',
                'slug' => 'pengantar-polisi',
                'blade_view' => '_sktm',
                'description' => 'Surat pengantar untuk keperluan kepolisian.',
                'is_active' => true,
                'sort_order' => 60,
            ],
            [
                'name' => 'Surat Pengantar Pindah',
                'slug' => 'pengantar-pindah',
                'blade_view' => '_sktm',
                'description' => 'Surat pengantar untuk pindah domisili.',
                'is_active' => true,
                'sort_order' => 70,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

        $this->command->info('Data Layanan Persuratan berhasil diisi!');
    }
}