<?php

namespace App\Filament\Resources\ApbdesProjects\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ApbdesProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('apbdes_year_id')
                    ->relationship('apbdesYear', 'title')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('location'),
                TextInput::make('budget')
                    ->required()
                    ->numeric(),
                Select::make('status')
                    ->options(['Perencanaan' => 'Perencanaan', 'Proses' => 'Proses', 'Selesai' => 'Selesai'])
                    ->default('Perencanaan')
                    ->required(),
                    FileUpload::make('image_url')
                        ->label('Foto Proyek')
                        ->image()
                        ->disk('public') // Menyimpan di storage/app/public
                        ->directory('project') // Menyimpan di subfolder 'project'
                        ->columnSpanFull()
                        ->helperText('Gambar akan tersimpan di public/storage/project/'),
            ]);
    }
}
