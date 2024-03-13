<?php

namespace App\Filament\Resources\EnrollResource\Pages;

use App\Filament\Resources\EnrollResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEnroll extends CreateRecord
{
    protected static string $resource = EnrollResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Successfully enrolled!';
    }
}
