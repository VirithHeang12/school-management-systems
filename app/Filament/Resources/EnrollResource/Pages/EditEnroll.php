<?php

namespace App\Filament\Resources\EnrollResource\Pages;

use App\Filament\Resources\EnrollResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEnroll extends EditRecord
{
    protected static string $resource = EnrollResource::class;
    protected function getRedirectUrl(): ?string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Enroll updated';
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
