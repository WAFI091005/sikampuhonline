<?php

namespace App\Filament\Resources\ApbdesYears\Pages;

use App\Filament\Resources\ApbdesYears\ApbdesYearResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListApbdesYears extends ListRecords
{
    protected static string $resource = ApbdesYearResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
