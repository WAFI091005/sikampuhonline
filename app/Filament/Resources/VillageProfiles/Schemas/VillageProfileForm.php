<?php

namespace App\Filament\Resources\VillageProfiles\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class VillageProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->default('Desa Sikampuh'),

                TextInput::make('address')
                    ->label('Address'),

                // Ubah ke FileUpload agar bisa upload logo
                FileUpload::make('logo_url')
                    ->label('Logo')
                    ->image()
                    ->directory('village-logos') // disimpan di storage/app/public/village-logos
                    ->disk('public')
                    ->visibility('public')
                    ->imagePreviewHeight('100')
                    ->openable()
                    ->downloadable()
                    ->maxSize(2048),

                Textarea::make('description')
                    ->label('Description')
                    ->columnSpanFull(),

                Textarea::make('commitment')
                    ->label('Commitment')
                    ->columnSpanFull(),

                FileUpload::make('structure_image_url')
                    ->label('Structure Image')
                    ->image()
                    ->directory('village-structures')
                    ->disk('public')
                    ->visibility('public')
                    ->imagePreviewHeight('150'),

                TextInput::make('population_total')
                    ->label('Population total')
                    ->required()
                    ->numeric()
                    ->default(0),

                TextInput::make('population_male')
                    ->label('Population male')
                    ->required()
                    ->numeric()
                    ->default(0),

                TextInput::make('population_female')
                    ->label('Population female')
                    ->required()
                    ->numeric()
                    ->default(0),

                TextInput::make('area_size')
                    ->label('Area size')
                    ->default('0 km²'),

                TextInput::make('achievement_governance')
                    ->label('Achievement (Governance)')
                    ->required()
                    ->numeric()
                    ->default(0),

                TextInput::make('achievement_community')
                    ->label('Achievement (Community)')
                    ->required()
                    ->numeric()
                    ->default(0),

                TextInput::make('achievement_development')
                    ->label('Achievement (Development)')
                    ->required()
                    ->numeric()
                    ->default(0),

                TextInput::make('achievement_disaster')
                    ->label('Achievement (Disaster)')
                    ->required()
                    ->numeric()
                    ->default(0),

                Textarea::make('history_content')
                    ->label('History Content')
                    ->columnSpanFull(),

                Textarea::make('myth_content')
                    ->label('Myth Content')
                    ->columnSpanFull(),

                FileUpload::make('map1_image_url')
                    ->label('Map Image 1')
                    ->image()
                    ->directory('village-maps')
                    ->disk('public')
                    ->visibility('public')
                    ->imagePreviewHeight('150'),

                FileUpload::make('map2_image_url')
                    ->label('Map Image 2')
                    ->image()
                    ->directory('village-maps')
                    ->disk('public')
                    ->visibility('public')
                    ->imagePreviewHeight('150'),
            ]);
    }
}
