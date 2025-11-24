<?php

namespace App\Filament\Resources\ApbdesYears\Pages;

use App\Filament\Resources\ApbdesYears\ApbdesYearResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditApbdesYear extends EditRecord
{
    protected static string $resource = ApbdesYearResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
