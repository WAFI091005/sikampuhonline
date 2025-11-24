<?php

namespace App\Filament\Resources\ApbdesYears\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ApbdesYearForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('year')
                    ->label('Tahun')
                    ->required()
                    ->numeric()
                    ->minValue(2000)
                    ->maxValue(date('Y') + 1),

                TextInput::make('title')
                    ->label('Judul')
                    ->required()
                    ->maxLength(255),

                Textarea::make('summary')
                    ->label('Ringkasan')
                    ->columnSpanFull(),

                FileUpload::make('summary_image_url')
                    ->label('Gambar Ringkasan (Thumbnail)')
                    ->disk('public') // disimpan di storage/app/public
                    ->directory('summaries') // subfolder summaries
                    ->image()
                    ->maxSize(2048) // 2MB
                    ->helperText('Gambar ringkasan APBDes yang akan tampil di halaman depan.'),

                FileUpload::make('document_file_url')
                    ->label('File Dokumen Lengkap (PDF/Image)')
                    ->disk('public') // disimpan di storage/app/public
                    ->directory('documents') // subfolder documents
                    ->acceptedFileTypes(['application/pdf', 'image/*']) // PDF atau gambar
                    ->maxSize(10240) // 10MB
                    ->helperText('File dokumen APBDes lengkap (PDF atau gambar resolusi tinggi).'),

                TextInput::make('total_revenue')
                    ->label('Total Pendapatan')
                    ->required()
                    ->numeric()
                    ->default(0),

                TextInput::make('total_expenditure')
                    ->label('Total Pengeluaran')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
