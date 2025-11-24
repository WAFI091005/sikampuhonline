<?php

namespace App\Filament\Resources\Penduduks\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PendudukForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nik')
                    ->label('NIK')
                    ->required()
                    ->maxLength(255),

                TextInput::make('nama')
                    ->label('Nama Lengkap')
                    ->required(),

                TextInput::make('tempat_lahir')
                    ->label('Tempat Lahir')
                    ->required(),

                DatePicker::make('tanggal_lahir')
                    ->label('Tanggal Lahir')
                    ->required(),

                Select::make('jenis_kelamin')
                    ->label('Jenis Kelamin')
                    ->options([
                        'Laki-laki' => 'Laki-laki',
                        'Perempuan' => 'Perempuan',
                    ])
                    ->required(),

                TextInput::make('alamat')
                    ->label('Alamat')
                    ->required(),

                TextInput::make('pekerjaan')
                    ->label('Pekerjaan'),

                Select::make('status')
                    ->label('Status Perkawinan')
                    ->options([
                        'Menikah' => 'Menikah',
                        'Belum Menikah' => 'Belum Menikah',
                        'Cerai' => 'Cerai',
                    ])
                    ->default('Belum Menikah')
                    ->required(),
            ]);
    }
}
