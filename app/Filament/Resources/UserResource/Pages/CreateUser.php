<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function getRedirectUrl(): string
    {
        // Redirect to the index page after creating a user
        return $this->getResource()::getUrl('index');
    }

    protected function afterCreate(): void
    {
        // Show a success notification
        Notification::make()
            ->title('User created')
            ->success()
            ->send();
    }
}
