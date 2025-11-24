<?php

namespace App\Filament\Resources\Contacts\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ContactForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('phone')
                    ->tel(),
                TextInput::make('facebook_url')
                    ->url(),
                TextInput::make('youtube_url')
                    ->url(),
                TextInput::make('instagram_url')
                    ->url(),
                TextInput::make('twitter_url')
                    ->url(),
                TextInput::make('tiktok_url')
                    ->url(),
            ]);
    }
}
