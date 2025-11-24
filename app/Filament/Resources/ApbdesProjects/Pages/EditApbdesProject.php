<?php

namespace App\Filament\Resources\ApbdesProjects\Pages;

use App\Filament\Resources\ApbdesProjects\ApbdesProjectResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditApbdesProject extends EditRecord
{
    protected static string $resource = ApbdesProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
