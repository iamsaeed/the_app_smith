<?php

namespace App\Filament\Resources\EnquiryResource\Pages;

use App\Filament\Resources\EnquiryResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEnquiry extends ViewRecord
{
    protected static string $resource = EnquiryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('mark_as_read')
                ->label('Mark as Read')
                ->icon('heroicon-o-check')
                ->color('success')
                ->visible(fn () => !$this->record->is_read)
                ->action(fn () => $this->record->markAsRead())
                ->after(fn () => $this->refreshRecord()),

            Actions\Action::make('mark_as_unread')
                ->label('Mark as Unread')
                ->icon('heroicon-o-x-mark')
                ->color('danger')
                ->visible(fn () => $this->record->is_read)
                ->action(fn () => $this->record->markAsUnread())
                ->after(fn () => $this->refreshRecord()),

            Actions\DeleteAction::make(),
        ];
    }

    public function mount(int | string $record): void
    {
        parent::mount($record);

        // Auto-mark as read when viewed
        if (!$this->record->is_read) {
            $this->record->markAsRead();
            $this->refreshRecord();
        }
    }
}
