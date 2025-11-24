<?php

namespace App\Filament\Resources\VillagePotencies;

use App\Filament\Resources\VillagePotencies\Pages\CreateVillagePotency;
use App\Filament\Resources\VillagePotencies\Pages\EditVillagePotency;
use App\Filament\Resources\VillagePotencies\Pages\ListVillagePotencies;
use App\Filament\Resources\VillagePotencies\Schemas\VillagePotencyForm;
use App\Filament\Resources\VillagePotencies\Tables\VillagePotenciesTable;
use App\Models\VillagePotency;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class VillagePotencyResource extends Resource
{
    protected static ?string $model = VillagePotency::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return VillagePotencyForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VillagePotenciesTable::configure($table);
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
            'index' => ListVillagePotencies::route('/'),
            'create' => CreateVillagePotency::route('/create'),
            'edit' => EditVillagePotency::route('/{record}/edit'),
        ];
    }
}
