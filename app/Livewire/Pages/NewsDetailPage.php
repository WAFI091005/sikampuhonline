<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\News;

class NewsDetailPage extends Component
{
    public $news = null;
    public $documentationImages = [];

    protected $listeners = ['navigateToNews'];

    public function mount($news = null)
    {
        if ($news instanceof News) {
            $this->news = $news;
        } elseif (!$news) {
            $this->news = News::orderBy('published_at', 'desc')->first();
        } else {
            $this->news = News::find($news);
        }

        if ($this->news) {
            $imageCollection = News::where('id', '!=', $this->news->id)
                ->whereNotNull('main_image_url')
                ->orderBy('published_at', 'desc')
                ->take(6)
                ->get(['id', 'main_image_url', 'title']);

            $this->documentationImages = $imageCollection->map(function ($item) {
                return [
                    'id' => $item->id,
                    'url' => $item->main_image_url,
                    'title' => $item->title,
                ];
            })->toArray();

            if (count($this->documentationImages) < 6) {
                $missing = 6 - count($this->documentationImages);
                for ($i = 0; $i < $missing; $i++) {
                    $this->documentationImages[] = [
                        'id' => null,
                        'url' => 'https://placehold.co/120x80/c0c0c0/333333?text=Foto+' . (count($this->documentationImages) + 1),
                        'title' => 'Placeholder',
                    ];
                }
            }
        }
    }

    public function navigateToNews($newsId)
    {
        return $this->redirectRoute('berita.detail', $newsId);
    }

    public function render()
    {
        return view('livewire.pages.news-detail-page');
    }
}
