<?php

namespace App\Filament\Resources\PersonResource\Pages;

use App\Filament\Resources\PersonResource;
use App\Models\Address;
use App\Models\Person;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EditPerson extends EditRecord
{
    protected static string $resource = PersonResource::class;
    protected function getRedirectUrl(): ?string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Student updated';
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $address = Address::find(['id' => $data['address_id']])[0];
        $data['city'] = $address->city;
        $data['address'] = $address->address;
        $data['district'] = $address->district;
        $data['password'] = User::find(['id' => $data['user_id']])[0]->password;

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (!Str::startsWith($data['password'], "$2y$12$")) {
            $data['password'] = Hash::make($data['password']);
        }

        $addressId = Person::where('id', $data['id'])->get()[0]->address_id;


        Address::where('id', $addressId)->update(
            [
                'city' => $data['city'],
                'address' => $data['address'],
                'district' => $data['district']
            ]
        );

        Person::where('id', $data['id'])->update(
            [
                'person_first_name' => $data['person_first_name'],
                'person_last_name' => $data['person_last_name'],
                'person_date_of_birth' => $data['person_date_of_birth'],
                'person_profile' => $data['person_profile'],
                'department_id' => $data['department_id']
            ]
        );

        User::where('email', $data['person_email'])->update([
            'password' => $data['password']
        ]);

        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
