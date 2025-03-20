<?php

namespace App\Filament\Resources\ServiceResource\Pages;

use App\Filament\Resources\ServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditService extends EditRecord
{
    protected static string $resource = ServiceResource::class;

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
            ->title('Service updated')
            ->success()
            ->send();
    }
}
