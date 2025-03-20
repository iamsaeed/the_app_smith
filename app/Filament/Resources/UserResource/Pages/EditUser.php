<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        // Redirect to the index page after saving
        return $this->getResource()::getUrl('index');
    }

    protected function afterSave(): void
    {
        // Show a success notification
        Notification::make()
            ->title('User updated')
            ->success()
            ->send();
    }
}
