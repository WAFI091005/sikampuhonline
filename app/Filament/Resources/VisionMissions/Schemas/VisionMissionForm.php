<?php

namespace App\Filament\Resources\VisionMissions\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use App\Models\VisionMission;

class VisionMissionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Textarea::make('vision')
                ->label('Visi')
                ->placeholder('Masukkan visi desa...')
                ->required()
                ->columnSpanFull(),

            Repeater::make('mission_list')
                ->label('Daftar Misi')
                ->schema([
                    TextInput::make('misi')
                        ->label('Misi')
                        ->placeholder('Masukkan salah satu misi...')
                        ->required(),
                ])
                ->collapsed()
                ->columns(1)
                ->createItemButtonLabel('Tambah Misi')
                ->required(),

            Toggle::make('is_active')
                ->label('Aktifkan Visi & Misi Ini')
                ->onIcon('heroicon-m-bolt')
                ->offIcon('heroicon-m-x-circle')
                ->helperText('Hanya satu data Visi & Misi yang dapat diaktifkan.')
                ->reactive()
                ->afterStateUpdated(function ($state, $set, $get) {
                    if ($state === true) {
                        // Set semua record lain jadi nonaktif
                        VisionMission::where('id', '!=', $get('id'))->update(['is_active' => false]);
                    }
                }),
        ]);
    }
}
