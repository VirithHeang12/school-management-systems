<?php

namespace App\Filament\Resources\ClassSectionResource\Pages;

use App\Filament\Resources\ClassSectionResource;
use App\Models\Address;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateClassSection extends CreateRecord
{
    protected static string $resource = ClassSectionResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Class created!';
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['class_time'] = $data["class_start_time"] . " - " . $data["class_end_time"];
        return $data;
    }
}
