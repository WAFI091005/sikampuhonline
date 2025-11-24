<?php

namespace App\Filament\Resources\VillagePotencies\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class VillagePotencyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('type')
                    ->label('Jenis Potensi')
                    ->required(),

                TextInput::make('title')
                    ->label('Judul')
                    ->required(),

                Textarea::make('content')
                    ->label('Deskripsi')
                    ->columnSpanFull(),

                TextInput::make('icon_color')
                    ->label('Warna Ikon (opsional)'),

                // ✅ Simpan gambar di storage/app/public/village-potencies
                FileUpload::make('image_url')
                    ->label('Gambar Potensi')
                    ->image()
                    ->disk('public') // disimpan di storage/app/public
                    ->directory('village-potencies') // folder di dalam disk 'public'
                    ->visibility('public') // bisa diakses lewat /storage/
                    ->imagePreviewHeight('200')
                    ->openable()
                    ->downloadable()
                    ->maxSize(2048),

                TextInput::make('sort_order')
                    ->label('Urutan Tampil')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
