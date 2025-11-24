<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VisionMission; 

class VisionMissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama untuk memastikan hanya ada satu Visi Misi aktif
        VisionMission::truncate();

        // Data Visi Misi yang lengkap
        VisionMission::create([
            'vision' => 'Mewujudkan Sikampuh yang Bercahaya (Kreatif, Mantap, Sehat, Rukun)',
            
            // Daftar Misi yang disimpan sebagai Array
            'mission_list' => [
                'Terwujudnya desa yang sejahtera sehat selalu abadi salam kolaborasi.',
                'Meningkatkan kualitas sumber daya manusia melalui pendidikan dan pelatihan terpadu.',
                'Mengoptimalkan pemanfaatan potensi pertanian dan UMKM lokal secara berkelanjutan.',
                'Menciptakan tata kelola pemerintahan desa yang transparan, akuntabel, dan berbasis teknologi.',
                'Memperkuat kerukunan dan nilai-nilai kearifan lokal di tengah kemajemukan masyarakat.',
                'Menyediakan infrastruktur desa yang mendukung mobilitas dan perekonomian warga.',
            ],
            
            'is_active' => true,
        ]);

        $this->command->info('Data Visi dan Misi Desa berhasil diisi!');
    }
}