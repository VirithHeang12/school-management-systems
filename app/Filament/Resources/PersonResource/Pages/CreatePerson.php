<?php

namespace App\Filament\Resources\PersonResource\Pages;

use App\Filament\Resources\PersonResource;
use App\Models\Address;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePerson extends CreateRecord
{
    protected static string $resource = PersonResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Student added!';
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        Address::create([
            'city' => $data['city'],
            'address' => $data['address'],
            'district' => $data['district']
            ]);
        $data['person_is_professor'] = 0;
        $data['address_id'] = Address::latest()->limit(1)->get()[0]->id;
        return $data;
    }
}
