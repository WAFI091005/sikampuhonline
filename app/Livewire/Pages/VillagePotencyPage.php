<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\VillagePotency;
use Illuminate\Support\Str;

class VillagePotencyPage extends Component
{
    public $physicalPotencies = [];
    public $nonPhysicalPotencies = [];
    public $topPotencies = [];
    public $potencySummary = 'Ringkasan potensi desa belum tersedia di database.';
    public $villageName = 'SIKAMPUH';
    public $aspirationLink = '#';

    public function mount()
    {
        // 1️⃣ Ringkasan potensi desa
        $summary = VillagePotency::where('type', 'summary')->first();
        if ($summary && $summary->content) {
            $this->potencySummary = $summary->content;
        }

        // 2️⃣ Potensi fisik
        $physicalData = VillagePotency::where('type', 'physical')
            ->orderBy('sort_order')
            ->get();

        $this->physicalPotencies = $physicalData->map(function ($potency) {
            $imageUrl = $potency->image_url;
            $finalImageUrl = 'https://placehold.co/100x100?text=' . urlencode(strtoupper(substr($potency->title, 0, 1)));

            if ($imageUrl) {
                if (Str::startsWith($imageUrl, ['http://', 'https://'])) {
                    $finalImageUrl = $imageUrl;
                } else {
                    $finalImageUrl = asset('storage/' . $imageUrl);
                }
            }

            return [
                'title' => $potency->title,
                'summary' => Str::limit(strip_tags($potency->content), 150),
                'image' => $finalImageUrl,
                'link' => route('village-potency.detail', ['id' => $potency->id]),
            ];
        })->toArray();

        // 3️⃣ 3 potensi unggulan untuk lingkaran atas
        $this->topPotencies = $physicalData->take(3)->map(function ($potency) {
            $color = $potency->icon_color ?? '#047857';
            $textColor = in_array(strtolower($color), ['#facc15', '#ffff00', '#f9a825', '#eab308'])
                ? 'text-black'
                : 'text-white';

            // ambil gambar seperti di physicalPotencies
            $imageUrl = $potency->image_url;
            $finalImageUrl = 'https://placehold.co/100x100?text=' . urlencode(strtoupper(substr($potency->title, 0, 1)));

            if ($imageUrl) {
                if (Str::startsWith($imageUrl, ['http://', 'https://'])) {
                    $finalImageUrl = $imageUrl;
                } else {
                    $finalImageUrl = asset('storage/' . $imageUrl);
                }
            }

            return [
                'title' => $potency->title,
                'color' => $color,
                'text_class' => $textColor,
                'image' => $finalImageUrl,
            ];
        })->toArray();

        // 4️⃣ Potensi non fisik
        $this->nonPhysicalPotencies = VillagePotency::where('type', 'non_physical')
            ->orderBy('sort_order')
            ->get();
    }

    public function render()
    {
        return view('livewire.pages.village-potency-page')
            ->layout('components.layouts.app', [
                'title' => 'Potensi Desa ' . $this->villageName
            ]);
    }
}
