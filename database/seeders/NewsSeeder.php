<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use Carbon\Carbon;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama untuk memastikan data bersih
        News::truncate();

        $newsData = [
            // Berita 1 (Paling Baru - Akan Tampil di Halaman Detail Berita Index)
            [
                'title' => 'Rapat Koordinasi Pembangunan Infrastruktur Desa',
                'slug' => 'rapat-koordinasi-pembangunan',
                'main_image_url' => 'https://placehold.co/500x350/FFD700/000?text=Rapat+Desa',
                'content' => 'Telah dilaksanakan rapat penting mengenai perencanaan infrastruktur jalan desa dan saluran irigasi. Rapat dihadiri oleh Kepala Desa, BPD, dan tokoh masyarakat untuk memastikan program pembangunan berjalan sesuai dengan aspirasi warga. Prioritas tahun ini adalah perbaikan akses utama menuju lahan pertanian. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'published_at' => Carbon::now()->subDays(1),
            ],
            
            // Berita 2 - 7 (Digunakan sebagai Dokumentasi/Gambar Terbaru)
            [
                'title' => 'Sosialisasi Program Dana Bantuan Langsung Tunai (BLT)',
                'slug' => 'sosialisasi-blt',
                'main_image_url' => 'https://placehold.co/120x80/6B8E23/FFF?text=BLT+1',
                'content' => 'Sosialisasi BLT tahap ketiga berjalan lancar.',
                'published_at' => Carbon::now()->subDays(5),
            ],
            [
                'title' => 'Pelatihan Kewirausahaan untuk Ibu-ibu PKK',
                'slug' => 'pelatihan-pkk-umkm',
                'main_image_url' => 'https://placehold.co/120x80/87CEEB/000?text=PKK+2',
                'content' => 'Pelatihan UMKM fokus pada keripik singkong dan pengemasan produk lokal.',
                'published_at' => Carbon::now()->subDays(10),
            ],
            [
                'title' => 'Kegiatan Gotong Royong Pembersihan Saluran Air',
                'slug' => 'gotong-royong-saluran',
                'main_image_url' => 'https://placehold.co/120x80/8B0000/FFF?text=Gotong+3',
                'content' => 'Warga desa berpartisipasi aktif membersihkan saluran air menjelang musim hujan.',
                'published_at' => Carbon::now()->subDays(15),
            ],
            [
                'title' => 'Peresmian Balai Pertemuan Baru Desa Sikampuh',
                'slug' => 'peresmian-balai',
                'main_image_url' => 'https://placehold.co/120x80/00FFFF/000?text=Balai+4',
                'content' => 'Balai baru diharapkan dapat menjadi pusat kegiatan masyarakat.',
                'published_at' => Carbon::now()->subDays(20),
            ],
            [
                'title' => 'Turnamen Bola Voli Antar RT Meriahkan HUT RI',
                'slug' => 'turnamen-voli',
                'main_image_url' => 'https://placehold.co/120x80/FFA07A/000?text=Voli+5',
                'content' => 'Kegiatan olahraga mempererat tali silaturahmi antar warga.',
                'published_at' => Carbon::now()->subDays(25),
            ],
            [
                'title' => 'Musrenbang Desa Tahun Anggaran 2026',
                'slug' => 'musrenbang-2026',
                'main_image_url' => 'https://placehold.co/120x80/556B2F/FFF?text=Musrenbang+6',
                'content' => 'Forum diskusi rencana kerja pembangunan desa untuk tahun depan.',
                'published_at' => Carbon::now()->subDays(30),
            ],
        ];

        foreach ($newsData as $data) {
            News::create($data);
        }

        $this->command->info('Data Berita Desa berhasil diisi (7 entri)!');
    }
}