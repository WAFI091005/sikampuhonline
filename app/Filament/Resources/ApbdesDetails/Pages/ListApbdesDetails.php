<?php

namespace App\Filament\Resources\ApbdesDetails\Pages;

use App\Filament\Resources\ApbdesDetails\ApbdesDetailResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListApbdesDetails extends ListRecords
{
    protected static string $resource = ApbdesDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
