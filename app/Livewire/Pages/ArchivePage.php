<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Archive; // ✅ Import Model Archive
use Illuminate\Support\Facades\DB; // Untuk mengambil daftar unik Tahun

class ArchivePage extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';

    // Filter Properties
    public $keyword = '';
    public $category = 'Semua Dokumen'; // Default ke semua dokumen
    public $year = 'Semua Tahun'; // Default ke semua tahun

    // Daftar opsi filter yang diisi saat mount
    public $categories = [];
    public $years = [];

    public function mount()
    {
        // Ambil daftar unik kategori dan tahun dari database saat komponen dimuat
        $this->categories = array_merge(
            ['Semua Dokumen'], 
            Archive::distinct()->pluck('category')->toArray()
        );
        
        $this->years = array_merge(
            ['Semua Tahun'],
            Archive::distinct()->orderBy('year', 'desc')->pluck('year')->toArray()
        );
    }
    
    // Reset halaman saat filter berubah
    public function updated($property)
    {
        if (in_array($property, ['keyword', 'category', 'year'])) {
            $this->resetPage();
        }
    }

    public function getArchivedDataProperty()
    {
        $query = Archive::query();
        
        // 1. Filter Keyword (Judul)
        if (!empty($this->keyword)) {
            $query->where('title', 'like', '%' . $this->keyword . '%');
        }
        
        // 2. Filter Kategori
        if ($this->category != 'Semua Dokumen') {
            $query->where('category', $this->category);
        }
        
        // 3. Filter Tahun
        if ($this->year != 'Semua Tahun') {
            // Karena kolom year adalah tipe YEAR, pastikan input adalah integer/string yang benar
            $query->where('year', $this->year); 
        }

        // Ambil data dan terapkan paginasi (10 item per halaman)
        return $query->orderBy('year', 'desc')->paginate(10);
    }
    
    public function render()
    {
        return view('livewire.pages.archive-page', [
            'archivedData' => $this->archivedData,
        ])->layout('components.layouts.app', ['title' => 'Arsip Desa']);
    }
}