<?php

namespace App\Filament\Resources\Archives\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ArchiveForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                Select::make('category')
                    ->options([
            'Berita' => 'Berita',
            'Laporan' => 'Laporan',
            'Pengumuman' => 'Pengumuman',
            'Dokumen Keuangan' => 'Dokumen keuangan',
        ])
                    ->required(),
                TextInput::make('year')
                    ->required(),
                FileUpload::make('file_url')
                    ->label('Unggah File Dokumen (.pdf, .docx, dll.)')
                    ->disk('public')
                    ->directory('archive/files') // Sesuaikan subfolde                            ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'image/*'])
                    ->maxSize(10240) // Maks 10MB
                    ->required(),
                FileUpload::make('image_url')
                    ->label('Gambar Ringkasan (Thumbnail)')
                    ->disk('public') // disimpan di storage/app/public
                    ->directory('archive/image') // subfolder summaries
                    ->image()
                    ->maxSize(2048) // 2MB
                    ->helperText('Gambar ringkasan yang akan tampil di halaman depan.'),
            ]);
    }
}
