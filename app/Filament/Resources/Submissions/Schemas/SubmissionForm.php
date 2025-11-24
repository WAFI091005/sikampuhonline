<?php

namespace App\Filament\Resources\Submissions\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SubmissionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('service_id')
                    ->required()
                    ->numeric(),
                TextInput::make('user_id')
                    ->numeric(),
                TextInput::make('nik')
                    ->required(),
                TextInput::make('applicant_name')
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('gender'),
                Textarea::make('address')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('unique_details')
                    ->required(),
                TextInput::make('submission_code')
                    ->required(),
                Select::make('status')
                    ->options([
            'Pending' => 'Pending',
            'Processing' => 'Processing',
            'Approved' => 'Approved',
            'Rejected' => 'Rejected',
        ])
                    ->default('Pending')
                    ->required(),
                Textarea::make('rejected_reason')
                    ->columnSpanFull(),
            ]);
    }
}
