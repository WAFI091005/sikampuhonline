<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\ApbdesYear;
use Illuminate\Support\Facades\Storage;

class APBDESPage extends Component
{
    // Properti yang dibutuhkan
    public $availableYears = [];
    public $activeYear;
    public $activeTab = 'summary'; // Default tab
    public $apbdesYearData = null; 
    public $summaryData = [];
    
    // Ikon SVG Heroicons path untuk navigasi
    public $tabNavigations = [
        ['key' => 'summary', 'title' => 'Ringkasan APBDes', 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'], 
        ['key' => 'revenue', 'title' => 'Penerimaan Dana Desa', 'icon' => 'M12 8c-1.667 0-3.333 0-5 0s-3.333 0-5 0M4 12h16m-6 4h-4'], 
        ['key' => 'expenditure', 'title' => 'Belanja & Pengeluaran', 'icon' => 'M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2V9a2 2 0 012-2h4a2 2 0 012 2v6a2 2 0 01-2 2h-4a2 2 0 01-2-2v-2'], 
        ['key' => 'projects', 'title' => 'Proyek Desa', 'icon' => 'M3 12l2-2m0 0l-2-2m2 2h4.5M21 12l-2-2m0 0l2-2m-2 2h-4.5'], 
    ];

    public function mount()
    {
        $this->availableYears = ApbdesYear::orderBy('year', 'desc')->pluck('year')->toArray();
        $this->activeYear = $this->availableYears[0] ?? now()->year;
        
        $this->loadApbdesData($this->activeYear);
    }

    public function setActiveYear($year)
    {
        $this->activeYear = $year;
        $this->loadApbdesData($year);
    }
    
    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
    }

    protected function loadApbdesData($year)
    {
        // PENTING: Memuat relasi agar data detail tersedia tanpa query tambahan di Blade
        $apbdes = ApbdesYear::where('year', $year)
            ->with(['revenues', 'expenditures', 'projects']) 
            ->first();

        $this->apbdesYearData = $apbdes;

        if ($apbdes) {
            // Mengubah path file/gambar menjadi URL yang dapat diakses publik
            $summaryImageUrl = $apbdes->summary_image_url ? Storage::url($apbdes->summary_image_url) : 'https://placehold.co/400x550/047857/ffffff?text=APBDes+'. $year;
            $documentFileUrl = $apbdes->document_file_url ? Storage::url($apbdes->document_file_url) : '#';

            // Menyusun data ringkasan
            $this->summaryData = [
                'title' => $apbdes->title,
                'date' => $apbdes->updated_at?->format('d M Y') ?? 'Data terbaru',
                'image' => $summaryImageUrl,
                'document_link' => $documentFileUrl,
                'total_revenue' => $apbdes->total_revenue,
                'total_expenditure' => $apbdes->total_expenditure,
                'project_count' => $apbdes->projects->count(),
                'revenues' => $apbdes->revenues,
                'expenditures' => $apbdes->expenditures,
                'projects' => $apbdes->projects,
                'summary_text' => $apbdes->summary,
            ];
        } else {
            // Fallback data
            $this->summaryData = [
                'title' => "Data APBDes Tahun {$year} Tidak Ditemukan",
                'date' => '-',
                'image' => 'https://placehold.co/400x550/CCCCCC/666666?text=Data+Kosong',
                'document_link' => '#',
                'total_revenue' => 0,
                'total_expenditure' => 0,
                'project_count' => 0,
                'revenues' => collect(), 
                'expenditures' => collect(),
                'projects' => collect(),
                'summary_text' => null,
            ];
        }
    }

    public function render()
    {
        return view('livewire.pages.apbdes-page')
            ->layout('components.layouts.app', ['title' => 'Publikasi Keuangan & APBDes']);
    }
}