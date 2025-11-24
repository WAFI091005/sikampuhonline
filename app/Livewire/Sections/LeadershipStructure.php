<?php

namespace App\Livewire\Sections;

use Livewire\Component;
use App\Models\VillageOfficial; 
use Illuminate\Support\Collection; // Pastikan ini diimport jika Anda menggunakan PHP Collection

class LeadershipStructure extends Component
{
    public $officials = [];

    public function mount()
    {
        // 1. Ambil Kepala Desa yang aktif (untuk memastikan logika Kepala Desa tetap terpisah)
        // Note: Meskipun Anda tidak menggunakan $chief di view ini, logikanya tetap dipertahankan
        //       jika Anda ingin menggunakannya di tempat lain.
        $chief = VillageOfficial::where('title', 'Kepala Desa')
                                     ->where('is_active', true) 
                                     ->orderBy('created_at', 'desc')
                                     ->first();

        // 2. Ambil Pejabat Struktur Organisasi (selain Kepala Desa)
        $this->officials = VillageOfficial::where('title', '!=', 'Kepala Desa')
                                         // Mengambil semua, termasuk yang is_active=false, karena Anda ingin mengabaikan status active
                                         ->orderBy('sort_order', 'asc') 
                                         ->take(4) // <-- Batasi menjadi hanya 4 item
                                         ->get();
        
        // 3. (OPSIONAL) Jika Anda ingin Kepala Desa yang sedang aktif dimasukkan ke daftar 4 orang tersebut:
        /*
        $this->officials = $this->officials->merge(collect([$chief]))
                                            ->filter() // Hapus null jika chief tidak ditemukan
                                            ->take(4); 
        */

        // KARENA ANDA INGIN MENGHILANGKAN KEPALA DESA SEPENUHNYA, kita tidak perlu menggabungkan $chief.
        // Cukup $this->officials = hasil query otherOfficials.
    }

    public function render()
    {
        return view('livewire.sections.leadership-structure');
    }
}