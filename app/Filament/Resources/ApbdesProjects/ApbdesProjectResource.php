<?php

namespace App\Filament\Resources\ApbdesProjects;

use App\Filament\Resources\ApbdesProjects\Pages\CreateApbdesProject;
use App\Filament\Resources\ApbdesProjects\Pages\EditApbdesProject;
use App\Filament\Resources\ApbdesProjects\Pages\ListApbdesProjects;
use App\Filament\Resources\ApbdesProjects\Schemas\ApbdesProjectForm;
use App\Filament\Resources\ApbdesProjects\Tables\ApbdesProjectsTable;
use App\Models\ApbdesProject;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ApbdesProjectResource extends Resource
{
    protected static ?string $model = ApbdesProject::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return ApbdesProjectForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ApbdesProjectsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListApbdesProjects::route('/'),
            'create' => CreateApbdesProject::route('/create'),
            'edit' => EditApbdesProject::route('/{record}/edit'),
        ];
    }
}
