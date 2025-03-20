<?php

namespace App\Filament\Resources\BlogResource\Pages;

use App\Filament\Resources\BlogResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateBlog extends CreateRecord
{
    protected static string $resource = BlogResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_id'] = Auth::id();
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
