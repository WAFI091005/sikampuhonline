<?php

namespace App\Filament\Resources\VillageOfficials\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload; // <-- WAJIB DITAMBAHKAN
use Filament\Schemas\Schema;

class VillageOfficialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->label('Nama Pejabat'), // Tambahkan label untuk kejelasan
                TextInput::make('title')
                    ->required()
                    ->label('Jabatan'),
                TextInput::make('nip_or_education')
                    ->label('Gelar Pendidikan/NIP'),
                
                // --- PERUBAHAN FOTO_URL: DARI TEXTINPUT MENJADI FILEUPLOAD ---
                FileUpload::make('photo_url') // Menggunakan nama kolom yang sama
                    ->label('Foto Pejabat')
                    ->image() // Hanya menerima gambar
                    ->directory('officials') // Menyimpan di storage/app/public/officials
                    ->disk('public') // Menyimpan di public disk
                    ->visibility('public')
                    ->columnSpanFull(), // Agar mengambil lebar penuh di form
                // -----------------------------------------------------------

                Textarea::make('greeting')
                    ->label('Sambutan Kepala Desa')
                    ->columnSpanFull(),
                
                Toggle::make('is_active')
                    ->label('Status Aktif')
                    ->required()
                    ->default(true),

                TextInput::make('sort_order')
                    ->label('Urutan Tampil')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}