<?php

namespace App\Filament\Resources\Penduduks\Tables;

use App\Imports\PendudukImport;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Maatwebsite\Excel\Facades\Excel;

class PenduduksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nik')->searchable()->sortable(),
                TextColumn::make('nama')->searchable()->sortable(),
                TextColumn::make('tempat_lahir')->searchable(),
                TextColumn::make('tanggal_lahir')->date()->sortable(),
                TextColumn::make('jenis_kelamin')->badge(),
                TextColumn::make('alamat')->searchable(),
                TextColumn::make('pekerjaan')->searchable(),
                TextColumn::make('status')->badge(),
                TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                // 🔽 Download Template Excel
                Action::make('download_template')
                    ->label('Download Template')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->color('info')
                    ->url(asset('storage/excel/template_penduduk.xlsx'))
                    ->openUrlInNewTab(),


                // 🔽 Import Excel
                Action::make('import')
                    ->label('Import Excel')
                    ->icon('heroicon-o-arrow-up-tray')
                    ->color('success')
                    ->button()
                    ->form([
                        FileUpload::make('file')
                            ->label('Pilih File Excel (.xlsx)')
                            ->required()
                            ->acceptedFileTypes([
                                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                            ]),
                    ])
                    ->action(function (array $data) {
                        Excel::import(new PendudukImport, $data['file']);
                    })
                    ->successNotificationTitle('Data penduduk berhasil diimport!'),

                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
