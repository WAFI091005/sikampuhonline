<?php

namespace App\Filament\Resources\VillagePotencies\Pages;

use App\Filament\Resources\VillagePotencies\VillagePotencyResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditVillagePotency extends EditRecord
{
    protected static string $resource = VillagePotencyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
