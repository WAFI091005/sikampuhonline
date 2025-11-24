<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VillagePotency; 

class VillagePotencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama
        VillagePotency::truncate();

        $potencyData = [
            // === 1. RINGKASAN/SUMMARY (type: summary) ===
            [
                'type' => 'summary',
                'title' => 'Ringkasan Potensi',
                'content' => 'Desa Sikampuh memiliki potensi yang sangat beragam, mencakup sektor ekonomi kreatif (UMKM), sumber daya alam (Pertanian dan Lahan), serta kekayaan budaya. Inilah fondasi utama untuk mencapai kemandirian desa.',
                'sort_order' => 0,
            ],

            // === 2. POTENSI FISIK UNGGULAN (type: physical) ===
            [
                'type' => 'physical',
                'title' => 'UMKM',
                'content' => 'Potensi UMKM fokus pada kerajinan tangan dan makanan olahan lokal seperti keripik singkong, yang menjadi motor penggerak ekonomi rumah tangga di desa.',
                'image_url' => 'https://placehold.co/100x100/FFD700/000?text=UMKM',
                'icon_color' => '#FFD700', // Kuning Emas
                'sort_order' => 10,
            ],
            [
                'type' => 'physical',
                'title' => 'PERTANIAN',
                'content' => 'Mayoritas wilayah desa adalah lahan sawah irigasi, dengan potensi unggulan pada komoditas padi dan palawija, didukung oleh sistem irigasi yang memadai.',
                'image_url' => 'https://placehold.co/100x100/6B8E23/FFF?text=Tani',
                'icon_color' => '#6B8E23', // Hijau Olive
                'sort_order' => 20,
            ],
            [
                'type' => 'physical',
                'title' => 'WISATA',
                'content' => 'Potensi wisata alam berupa area persawahan yang luas dan sejuk, serta rencana pengembangan wisata edukasi berbasis pertanian untuk menarik wisatawan.',
                'image_url' => 'https://placehold.co/100x100/87CEEB/000?text=Wisata',
                'icon_color' => '#87CEEB', // Biru Langit
                'sort_order' => 30,
            ],
            [
                'type' => 'physical',
                'title' => 'SENI BUDAYA',
                'content' => 'Kesenian tradisional seperti Tari Ebeg dan Karawitan masih aktif dilestarikan, menjadi aset penting dalam menjaga identitas budaya desa.',
                'image_url' => 'https://placehold.co/100x100/8B0000/FFF?text=Seni',
                'icon_color' => '#8B0000', // Merah Tua
                'sort_order' => 40,
            ],

            // === 3. POTENSI NON-FISIK (type: non_physical) ===
            [
                'type' => 'non_physical',
                'title' => 'Sikap Gotong Royong',
                'content' => 'Tradisi kerja sama ini adalah fondasi kuat dalam masyarakat desa. Gotong royong menciptakan solidaritas dan mempermudah pelaksanaan proyek pembangunan, sehingga mendorong partisipasi aktif dari seluruh anggota masyarakat.',
                'sort_order' => 50,
            ],
            [
                'type' => 'non_physical',
                'title' => 'Lembaga-Lembaga Sosial',
                'content' => 'Organisasi seperti LKD, LPMD, PKK, dan Karang Taruna memainkan peran penting dalam memberikan bimbingan, penyuluhan, dan dukungan kepada masyarakat dalam berbagai aspek kehidupan.',
                'sort_order' => 60,
            ],
            [
                'type' => 'non_physical',
                'title' => 'Kreativitas Aparatur Desa',
                'content' => 'Kemampuan dan inovasi dari perangkat desa dalam mengelola administrasi dan pemerintahan sangat berpengaruh pada pengembangan desa. Aparatur desa yang proaktif dan inovatif dapat menciptakan lingkungan yang kondusif untuk pertumbuhan ekonomi dan sosial.',
                'sort_order' => 70,
            ],
        ];

        foreach ($potencyData as $data) {
            VillagePotency::create($data);
        }

        $this->command->info('Data Potensi Desa berhasil diisi!');
    }
}