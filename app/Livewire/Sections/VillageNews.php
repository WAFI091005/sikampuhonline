<?php

namespace App\Livewire\Sections;

use Livewire\Component;
use App\Models\News;
use Carbon\Carbon;

class VillageNews extends Component
{
    // Properti untuk menampilkan konten dari berita paling baru
    public $newsTodayTitle = 'News Today';
    public $newsTodayContent = 'Konten ringkasan belum tersedia.'; 

    // Properti untuk daftar 3 berita di kolom kanan
    public $latestNews = []; 

    public function mount()
    {
        // Ambil 4 berita terbaru
        $recentNews = News::orderBy('published_at', 'desc')->take(4)->get();

        if ($recentNews->isNotEmpty()) {
            // Berita paling baru (untuk News Today)
            $featuredNews = $recentNews->first();

            // Sisa 3 berita (untuk daftar di kanan)
            $latestNewsList = $recentNews->slice(1); 

            // 1. Isi News Today dengan konten berita paling baru
            $this->newsTodayContent = $featuredNews->content;

            // 2. Isi daftar di kanan
            $this->latestNews = $latestNewsList->map(function ($news) {
                return [
                    // Ambil 400 karakter pertama sebagai summary, lalu tambahkan "..."
                    'title' => $news->title,
                    'summary' => substr(strip_tags($news->content), 0, 150) . '...',
                    'image' => $news->main_image_url ?? 'https://placehold.co/100x70/c0c0c0/333333?text=Doc',
                    'link' => route('berita.detail', $news), // Asumsi route binding
                ];
            })->toArray();
        } else {
             // Fallback jika DB kosong
             $this->newsTodayContent = 'Belum ada data berita yang tersedia saat ini.';
             $this->latestNews = [];
        }
    }

    public function render()
    {
        return view('livewire.sections.village-news');
    }
}