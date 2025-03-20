<?php

namespace App\Filament\Resources\ServiceResource\Pages;

use App\Filament\Resources\ServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateService extends CreateRecord
{
    protected static string $resource = ServiceResource::class;

    protected function getRedirectUrl(): string
    {
        // Redirect to the index page after creating a service
        return $this->getResource()::getUrl('index');
    }

    protected function afterCreate(): void
    {
        // Show a success notification
        Notification::make()
            ->title('Service created')
            ->success()
            ->send();
    }
}
