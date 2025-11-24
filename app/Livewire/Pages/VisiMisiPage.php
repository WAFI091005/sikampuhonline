<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\VisionMission;
use App\Models\VillageProfile;

class VisiMisiPage extends Component
{
    public $villageName = 'Sikampuh';
    public $heroText = 'Ringkasan desa belum tersedia di database.';
    public $slogan = '#DesaMaju #Sejahtera #BagiKitaSemua #Mahal';
    public $visi = 'Visi belum tersedia.';
    public $misi = [];

    public function mount()
    {
        // Ambil profil desa
        $profile = VillageProfile::first();

        if ($profile) {
            $this->villageName = $profile->name ?? 'Sikampuh';
            $this->heroText = $profile->commitment ?? 'Ringkasan desa belum tersedia.';
        }

        // Ambil visi misi aktif
        $vm = VisionMission::where('is_active', true)->first();

        if ($vm) {
            $this->visi = $vm->vision;

            // Normalisasi mission_list menjadi array string
            if (is_array($vm->mission_list)) {
                $this->misi = array_map(function ($item) {
                    return is_array($item)
                        ? ($item['misi'] ?? '')
                        : $item;
                }, $vm->mission_list);
            } else {
                $this->misi = [];
            }
        }
    }

    public function render()
    {
        return view('livewire.pages.visi-misi-page')
            ->layout('components.layouts.app', [
                'title' => 'Visi Misi Desa ' . $this->villageName
            ]);
    }
}
