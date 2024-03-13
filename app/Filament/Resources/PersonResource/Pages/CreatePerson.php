<?php

namespace App\Filament\Resources\PersonResource\Pages;

use App\Filament\Resources\PersonResource;
use App\Models\Address;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;

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
        User::create([
            'name' => $data['person_last_name'],
            'email' => $data['person_email'],
            'password' => Hash::make($data['password'])
        ]);
        $data['person_is_professor'] = 0;
        $data['user_id'] = User::latest()->limit(1)->get()[0]->id;
        $data['address_id'] = Address::latest()->limit(1)->get()[0]->id;
        return $data;
    }
}
