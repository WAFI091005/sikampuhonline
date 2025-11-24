<?php

namespace App\Livewire\Sections;

use Livewire\Component;
use App\Models\VillageProfile; // <-- Gunakan Model yang baru

class VillageOverview extends Component
{
    public $villageData = [];
    public $capaian = [];

    public function mount()
    {
        // === PENGAMBILAN DATA DARI DATABASE (CARI ID 1) ===
        $profile = VillageProfile::find(1);

        if ($profile) {
            $this->villageData = $profile;
            
            // Mengubah kolom Capaian DB menjadi array yang digunakan di view
            $this->capaian = [
                'Pemerintahan' => $profile->achievement_governance,
                'Pembinaan Kemasyarakatan' => $profile->achievement_community,
                'Pembangunan' => $profile->achievement_development,
                'Penanggulangan Bencana' => $profile->achievement_disaster,
            ];
        } else {
            // Jika data belum ada di DB (Kasus instalasi pertama)
            $this->villageData = (object)[
                'name' => 'Data Belum Tersedia',
                'address' => 'Silakan isi database',
                'logo_url' => 'https://placehold.co/60x60/c0c0c0/333?text=N/A',
                'description' => 'Data profil desa belum dimasukkan ke database.',
                'commitment' => 'Data komitmen belum dimasukkan ke database.',
            ];
            $this->capaian = ['Pemerintahan' => 0]; // Default
        }
    }

    public function render()
    {
        return view('livewire.sections.village-overview');
    }
}