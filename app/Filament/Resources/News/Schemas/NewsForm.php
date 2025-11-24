<?php

namespace App\Filament\Resources\News\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class NewsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('title')
                ->label('Judul Berita')
                ->required()
                ->live(onBlur: true)
                ->afterStateUpdated(function ($state, callable $set) {
                    $set('slug', Str::slug($state));
                }),

            TextInput::make('slug')
                ->label('Slug (otomatis)')
                ->required(),

            FileUpload::make('main_image_url')
                ->label('Gambar Utama')
                ->directory('news') // Disimpan di storage/app/public/news
                ->disk('public')
                ->visibility('public') // Supaya bisa diakses lewat /storage/news/
                ->image()
                ->imageEditor()
                ->imagePreviewHeight('200')
                ->maxSize(2048)
                ->openable()
                ->downloadable(),

            Textarea::make('content')
                ->label('Isi Berita')
                ->required()
                ->rows(8)
                ->columnSpanFull(),

            TextInput::make('author')
                ->label('Penulis')
                ->default('Pemerintah Desa')
                ->required(),

            DatePicker::make('published_at')
                ->label('Tanggal Publikasi')
                ->default(now())
                ->required(),
        ]);
    }
}
