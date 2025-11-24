<?php

namespace App\Filament\Resources\VillageProfiles\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class VillageProfilesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Name')
                    ->searchable(),

                TextColumn::make('address')
                    ->label('Address')
                    ->searchable(),

                ImageColumn::make('logo_url')
                    ->label('Logo')
                    ->square()
                    ->height(60)
                    ->width(60),

                ImageColumn::make('structure_image_url')
                    ->label('Structure'),

                TextColumn::make('population_total')
                    ->label('Population Total')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('population_male')
                    ->label('Male')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('population_female')
                    ->label('Female')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('area_size')
                    ->label('Area Size')
                    ->searchable(),

                TextColumn::make('achievement_governance')
                    ->label('Governance')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('achievement_community')
                    ->label('Community')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('achievement_development')
                    ->label('Development')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('achievement_disaster')
                    ->label('Disaster')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                ImageColumn::make('map1_image_url')
                    ->label('Map 1'),

                ImageColumn::make('map2_image_url')
                    ->label('Map 2'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
