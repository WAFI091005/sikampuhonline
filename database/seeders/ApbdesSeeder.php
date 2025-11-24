<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ApbdesYear;
use App\Models\ApbdesDetail;
use App\Models\ApbdesProject;

class ApbdesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data untuk Tahun 2024
        $year2024 = ApbdesYear::create([
            'year' => 2024,
            'title' => 'APBDes Tahun Anggaran 2024',
            'summary' => 'Ringkasan APBDes 2024 yang berfokus pada pembangunan infrastruktur dasar desa.',
            'total_revenue' => 1500000000,
            'total_expenditure' => 1450000000,
        ]);

        // Detail Anggaran 2024 (Penerimaan)
        $year2024->details()->createMany([
            ['type' => 'revenue', 'name' => 'Dana Desa (DD)', 'amount' => 1000000000],
            ['type' => 'revenue', 'name' => 'Alokasi Dana Desa (ADD)', 'amount' => 300000000],
            ['type' => 'revenue', 'name' => 'Hasil Usaha Desa', 'amount' => 200000000],
        ]);

        // Detail Anggaran 2024 (Belanja/Pengeluaran)
        $year2024->details()->createMany([
            ['type' => 'expenditure', 'name' => 'Belanja Pegawai', 'amount' => 300000000],
            ['type' => 'expenditure', 'name' => 'Belanja Barang dan Jasa', 'amount' => 450000000],
            ['type' => 'expenditure', 'name' => 'Belanja Modal Pembangunan', 'amount' => 700000000],
        ]);

        // Proyek 2024
        $year2024->projects()->createMany([
            ['name' => 'Pembangunan Drainase RT 01', 'location' => 'Dusun A, RT 01', 'budget' => 250000000, 'status' => 'Selesai'],
            ['name' => 'Rehabilitasi Balai Desa', 'location' => 'Pusat Desa', 'budget' => 450000000, 'status' => 'Selesai'],
        ]);
        
        // Data untuk Tahun 2025
        $year2025 = ApbdesYear::create([
            'year' => 2025,
            'title' => 'Rencana APBDes Tahun Anggaran 2025',
            'summary' => 'Rencana APBDes 2025 difokuskan untuk pemberdayaan masyarakat dan peningkatan ekonomi.',
            'total_revenue' => 1600000000,
            'total_expenditure' => 1550000000,
        ]);
        
        // Detail Anggaran 2025 (Penerimaan)
        $year2025->details()->createMany([
            ['type' => 'revenue', 'name' => 'Dana Desa (DD)', 'amount' => 1100000000],
            ['type' => 'revenue', 'name' => 'Alokasi Dana Desa (ADD)', 'amount' => 350000000],
            ['type' => 'revenue', 'name' => 'Pendapatan Lain-lain', 'amount' => 150000000],
        ]);
        
        // Detail Anggaran 2025 (Belanja/Pengeluaran)
        $year2025->details()->createMany([
            ['type' => 'expenditure', 'name' => 'Belanja Pegawai', 'amount' => 320000000],
            ['type' => 'expenditure', 'name' => 'Belanja Pemberdayaan', 'amount' => 530000000],
            ['type' => 'expenditure', 'name' => 'Belanja Modal Pembangunan', 'amount' => 700000000],
        ]);

        // Proyek 2025
        $year2025->projects()->createMany([
            ['name' => 'Pengadaan Alat Produksi UMKM', 'location' => 'Seluruh Desa', 'budget' => 500000000, 'status' => 'Perencanaan'],
            ['name' => 'Peningkatan Jalan Utama', 'location' => 'Jalan Desa Utama', 'budget' => 200000000, 'status' => 'Proses'],
        ]);
    }
}