<?php

namespace App\Filament\Resources\ApbdesYears;

use App\Filament\Resources\ApbdesYears\Pages\CreateApbdesYear;
use App\Filament\Resources\ApbdesYears\Pages\EditApbdesYear;
use App\Filament\Resources\ApbdesYears\Pages\ListApbdesYears;
use App\Filament\Resources\ApbdesYears\Schemas\ApbdesYearForm;
use App\Filament\Resources\ApbdesYears\Tables\ApbdesYearsTable;
use App\Models\ApbdesYear;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ApbdesYearResource extends Resource
{
    protected static ?string $model = ApbdesYear::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return ApbdesYearForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ApbdesYearsTable::configure($table);
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
            'index' => ListApbdesYears::route('/'),
            'create' => CreateApbdesYear::route('/create'),
            'edit' => EditApbdesYear::route('/{record}/edit'),
        ];
    }
}
