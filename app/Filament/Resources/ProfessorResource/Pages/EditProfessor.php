<?php

namespace App\Filament\Resources\ProfessorResource\Pages;

use App\Filament\Resources\ProfessorResource;
use App\Models\Address;
use App\Models\Person;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EditProfessor extends EditRecord
{
    protected static string $resource = ProfessorResource::class;
    protected function getRedirectUrl(): ?string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Professor updated';
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $person = Person::find(['person_id' => $data['person_id']])[0];
        $address = Address::find(['id' => $person->id])[0];
        $data['person_id'] = $person->id;
        $data['person_first_name'] = $person->person_first_name;
        $data['person_last_name'] = $person->person_last_name;
        $data['person_email'] = $person->person_email;
        $data['department_id'] = $person->department_id;
        $data['person_profile'] = $person->person_profile;
        $data['person_date_of_birth'] = $person->person_date_of_birth;
        $data['city'] = $address->city;
        $data['address'] = $address->address;
        $data['district'] = $address->district;
        $data['password'] = User::find(['id' => $person['user_id']])[0]->password;

        return $data;
    }



    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (!Str::startsWith($data['password'], "$2y$12$")) {
            $data['password'] = Hash::make($data['password']);
        }

        $addressId = Person::where('id', $data['person_id'])->get()[0]->address_id;


        Address::where('id', $addressId)->update(
          [
              'city' => $data['city'],
              'address' => $data['address'],
              'district' => $data['district']
          ]
        );

        Person::where('id', $data['person_id'])->update(
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
