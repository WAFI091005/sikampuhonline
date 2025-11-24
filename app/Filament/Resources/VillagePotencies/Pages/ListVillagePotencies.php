<?php

namespace App\Filament\Resources\VillagePotencies\Pages;

use App\Filament\Resources\VillagePotencies\VillagePotencyResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListVillagePotencies extends ListRecords
{
    protected static string $resource = VillagePotencyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
