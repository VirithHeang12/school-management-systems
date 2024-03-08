<?php

namespace App\Filament\Resources\ManagerAssignmentResource\Pages;

use App\Filament\Resources\ManagerAssignmentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateManagerAssignment extends CreateRecord
{
    protected static string $resource = ManagerAssignmentResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Manager assigned!';
    }
}
