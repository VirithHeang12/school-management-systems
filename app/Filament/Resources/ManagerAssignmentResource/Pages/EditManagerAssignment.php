<?php

namespace App\Filament\Resources\ManagerAssignmentResource\Pages;

use App\Filament\Resources\ManagerAssignmentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditManagerAssignment extends EditRecord
{
    protected static string $resource = ManagerAssignmentResource::class;
    protected function getRedirectUrl(): ?string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Manager updated';
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
