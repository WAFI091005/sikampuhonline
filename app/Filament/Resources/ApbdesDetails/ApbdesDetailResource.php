<?php

namespace App\Filament\Resources\ApbdesDetails;

use App\Filament\Resources\ApbdesDetails\Pages\CreateApbdesDetail;
use App\Filament\Resources\ApbdesDetails\Pages\EditApbdesDetail;
use App\Filament\Resources\ApbdesDetails\Pages\ListApbdesDetails;
use App\Filament\Resources\ApbdesDetails\Schemas\ApbdesDetailForm;
use App\Filament\Resources\ApbdesDetails\Tables\ApbdesDetailsTable;
use App\Models\ApbdesDetail;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ApbdesDetailResource extends Resource
{
    protected static ?string $model = ApbdesDetail::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return ApbdesDetailForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ApbdesDetailsTable::configure($table);
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
            'index' => ListApbdesDetails::route('/'),
            'create' => CreateApbdesDetail::route('/create'),
            'edit' => EditApbdesDetail::route('/{record}/edit'),
        ];
    }
}
