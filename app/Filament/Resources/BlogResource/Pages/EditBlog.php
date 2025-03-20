<?php

namespace App\Filament\Resources\BlogResource\Pages;

use App\Filament\Resources\BlogResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;

class EditBlog extends EditRecord
{
    protected static string $resource = BlogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['updated_id'] = Auth::id();

        if (!isset($data['meta_title']) || empty($data['meta_title'])) {
            $data['meta_title'] = $data['title'];
        }

        if (!isset($data['meta_description']) || empty($data['meta_description'])) {
            $data['meta_description'] = $data['excerpt'] ?? substr(strip_tags($data['content']), 0, 160);
        }

        if (!isset($data['og_title']) || empty($data['og_title'])) {
            $data['og_title'] = $data['meta_title'];
        }

        if (!isset($data['og_description']) || empty($data['og_description'])) {
            $data['og_description'] = $data['meta_description'];
        }

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
