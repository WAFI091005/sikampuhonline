<?php

namespace App\Filament\Resources\News\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class NewsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('main_image_url')
                    ->label('Gambar')
                    ->square()
                    ->height(70)
                    ->width(70),

                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->limit(50),

                TextColumn::make('author')
                    ->label('Penulis')
                    ->searchable()
                    ->default('Pemerintah Desa'),

                TextColumn::make('published_at')
                    ->label('Tanggal Publikasi')
                    ->date('d F Y')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('published_at', 'desc');
    }
}
