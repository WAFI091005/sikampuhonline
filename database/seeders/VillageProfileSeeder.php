<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\VillageProfile; 
use Carbon\Carbon;

class VillageProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama (opsional, jika Anda ingin memastikan hanya ada satu entri profil)
        VillageProfile::truncate();

        // Masukkan data profil desa lengkap
        VillageProfile::create([
            'name' => 'Sikampuh',
            'address' => 'Kecamatan Kroya, Kabupaten Cilacap, Jawa Tengah',
            'logo_url' => 'https://placehold.co/60x60/047857/ffffff?text=SKP',
            'description' => 'Desa Sikampuh adalah salah satu desa di Kecamatan Kroya, Kabupaten Cilacap, Jawa Tengah. Wilayahnya berupa dataran rendah dengan mayoritas lahan pertanian. Sebagian besar mata pencaharian masyarakat terletak pada sektor pertanian, perkebunan, dan peternakan.',
            'commitment' => 'Pemerintah desa Sikampuh selalu berkomitmen untuk memajukan kesejahteraan sosial, menjamin transparansi, serta mendukung kearifan lokal dalam kehidupan sosial masyarakat.',
            
            // --- DATA BARU BERDASARKAN MIGRATION DAN PREVIEW DESAIN ---
            
            // Kolom untuk Struktur Organisasi
            'structure_image_url' => 'https://placehold.co/800x400/f3f4f6/000?text=STRUKTUR+ORGANISASI+PEMERINTAH+DESA',
            
            // Kolom untuk Data Demografi
            'population_total' => 18000, 
            'population_male' => 10000, 
            'population_female' => 8000, 
            'area_size' => '20.696 km²', // Menggunakan nilai simulasi
            
            // Kolom untuk Sejarah dan Mitos
            'history_content' => 'Sejarah Desa Sikampuh mencakup berbagai babak penting mulai dari masa kolonial hingga periode modern. Penemuan artefak dan cerita rakyat diyakini berhubungan erat dengan mitos dan horror setempat, menunjukkan kekayaan budaya dan sejarah yang mendalam.',
            'myth_content' => 'MISTIS HORROR Sikampuh: Berikut adalah contoh paragraf panjang dari lorem ipsum, yang digunakan sebagai teks pengisi dalam desain dan tata letak. Teks ini merupakan terjemahan dari tulisan Latin yang diacak dan tidak memiliki arti khusus.',
            
            // Kolom untuk Peta
            // URL simulasi berdasarkan gambar peta yang diunggah
            'map1_image_url' => 'https://placehold.co/400x300/a0a0a0/333333?text=Peta+Lokasi+Historis', 
            'map2_image_url' => 'https://placehold.co/400x300/4CAF50/FFFFFF?text=Peta+Wilayah+Administrasi', 
            
            // Data Capaian Pembangunan (lama)
            'achievement_governance' => 85,
            'achievement_community' => 70,
            'achievement_development' => 92,
            'achievement_disaster' => 65,
        ]);

        $this->command->info('Data Profil Desa Sikampuh berhasil diisi dengan data lengkap!');
    }
}