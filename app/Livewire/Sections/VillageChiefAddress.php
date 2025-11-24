<?php

namespace App\Livewire\Sections;

use Livewire\Component;
use App\Models\VillageOfficial; // Pastikan model diimpor

class VillageChiefAddress extends Component
{
    public $chief = null;
    
    // Properti fallback (digunakan jika data DB tidak ditemukan)
    public $chiefName = 'Kepala Desa';
    public $chiefTitle = 'Jabatan Kosong';
    public $chiefGreeting = "Sambutan Kepala Desa belum diisi. Desa Sikampuh berkomitmen untuk maju dan berinovasi demi kemakmuran bersama.";
    public $chiefImage = 'https://placehold.co/192x192/c0c0c0/333333?text=Kepala+Desa';

    public function mount()
    {
        // Cari Kepala Desa yang aktif menjabat (is_active = true)
        $this->chief = VillageOfficial::where('title', 'Kepala Desa')
                                     ->where('is_active', true)
                                     ->orderBy('created_at', 'desc')
                                     ->first();

        // Jika data Kepala Desa ditemukan, update properti publik
        if ($this->chief) {
            $this->chiefName = $this->chief->name . ', ' . $this->chief->nip_or_education;
            $this->chiefTitle = $this->chief->title;
            $this->chiefGreeting = $this->chief->greeting ?? $this->chiefGreeting; // Gunakan sambutan dari DB
            $this->chiefImage = $this->chief->photo_url ?? $this->chiefImage; // Gunakan foto dari DB
        }
    }

    public function render()
    {
        return view('livewire.sections.village-chief-address');
    }
}