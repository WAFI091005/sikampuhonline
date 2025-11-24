<?php

namespace App\Filament\Resources\ApbdesDetails\Pages;

use App\Filament\Resources\ApbdesDetails\ApbdesDetailResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditApbdesDetail extends EditRecord
{
    protected static string $resource = ApbdesDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
