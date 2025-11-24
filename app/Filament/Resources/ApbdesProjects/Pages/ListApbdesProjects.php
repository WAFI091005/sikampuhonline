<?php

namespace App\Filament\Resources\ApbdesProjects\Pages;

use App\Filament\Resources\ApbdesProjects\ApbdesProjectResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListApbdesProjects extends ListRecords
{
    protected static string $resource = ApbdesProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
