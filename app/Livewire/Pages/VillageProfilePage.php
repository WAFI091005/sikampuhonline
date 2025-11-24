<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\VillageProfile; 
use Illuminate\Support\Facades\Storage; // <-- PENTING: Import Storage

class VillageProfilePage extends Component
{
    // Properti yang akan menyimpan data dari DB
    public $profile = null;
    public $demography = [];
    public $geographicInfo = '';
    public $historyTitle = "SEJARAH SIKAMPUH"; // Judul statis
    public $historyContent = '';
    public $mythTitle = "MISTIS HORROR SIKAMPUH"; // Judul statis
    public $mythContent = '';
    public $structureImage = '';
    public $map1Image = '';
    public $map2Image = '';

    public function mount()
    {
        // Ambil data profil desa (asumsi ID 1)
        $profile = VillageProfile::find(1);
        
        if ($profile) {
            $this->profile = $profile;
            
            // Mapping Data Demografi
            $this->demography = [
                ['value' => number_format($profile->population_total, 0, ',', '.'), 'label' => 'Jumlah Penduduk'],
                ['value' => number_format($profile->population_male, 0, ',', '.'), 'label' => 'Laki - Laki'],
                ['value' => number_format($profile->population_female, 0, ',', '.'), 'label' => 'Perempuan'],
                ['value' => $profile->area_size, 'label' => 'Luas Wilayah'],
            ];

            // Mapping Data Geografis, Sejarah, Mitos
            $this->geographicInfo = "Desa Sikampuh terletak di wilayah Kecamatan Kroya, Kabupaten Cilacap, Jawa Tengah dengan koordinat sekitar -7.37° LS dan 109.15° - 109.18° BT. Wilayah ini memiliki topografi dataran rendah dengan ketinggian rata-rata 5-25 mdpl karena dekat dengan pantai selatan Jawa. Kondisi topografinya relatif datar hingga sedikit bergelombang.";
            $this->historyContent = $profile->history_content;
            $this->mythContent = $profile->myth_content;
            
            // ✅ PERBAIKAN UTAMA: Konversi path relatif DB menjadi URL publik
            // Data di DB (misalnya 'village-structures/file.jpg') diubah menjadi '/storage/village-structures/file.jpg'
            $this->structureImage = $profile->structure_image_url ? Storage::url($profile->structure_image_url) : '';
            $this->map1Image = $profile->map1_image_url ? Storage::url($profile->map1_image_url) : '';
            $this->map2Image = $profile->map2_image_url ? Storage::url($profile->map2_image_url) : '';

        } else {
            // Fallback data (Opsional)
            $this->geographicInfo = "Data profil desa belum dimasukkan ke database.";
        }
    }

    public function render()
    {
        return view('livewire.pages.village-profile-page')
            ->layout('components.layouts.app', ['title' => 'Profil Desa']);
    }
}