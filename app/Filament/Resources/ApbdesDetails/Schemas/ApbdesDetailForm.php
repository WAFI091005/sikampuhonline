<?php

namespace App\Filament\Resources\ApbdesDetails\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ApbdesDetailForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('apbdes_year_id')
                    ->relationship('apbdesYear', 'title')
                    ->required(),
                Select::make('type')
                    ->options(['revenue' => 'Revenue', 'expenditure' => 'Expenditure'])
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('amount')
                    ->required()
                    ->numeric(),
                Textarea::make('notes')
                    ->columnSpanFull(),
            ]);
    }
}
