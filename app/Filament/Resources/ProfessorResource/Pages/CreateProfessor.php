<?php

namespace App\Filament\Resources\ProfessorResource\Pages;

use App\Filament\Resources\ProfessorResource;
use App\Models\Address;
use App\Models\Person;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;

class CreateProfessor extends CreateRecord
{
    protected static string $resource = ProfessorResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Professor added!';
    }


    protected function mutateFormDataBeforeCreate(array $data): array
    {
        Address::create([
            'city' => $data['city'],
            'address' => $data['address'],
            'district' => $data['district']
        ]);
        $data['address_id'] = Address::latest()->limit(1)->get()[0]->id;

        User::create([
            'name' => $data['person_last_name'],
            'email' => $data['person_email'],
            'password' => Hash::make($data['password'])
        ]);
        $data['user_id'] = User::latest()->limit(1)->get()[0]->id;

        Person::create([
            'person_email' => $data['person_email'],
            'person_first_name' => $data['person_first_name'],
            'person_last_name' => $data['person_last_name'],
            'person_is_professor' => 1,
            'person_date_of_birth' => $data['person_date_of_birth'],
            'person_profile' => $data['person_profile'],
            'department_id' => $data['department_id'],
            'address_id' => $data['address_id'],
            'user_id' => $data['user_id']
        ]);

        $data['person_id'] = Person::latest()->limit(1)->get()[0]->id;
        return $data;
    }
}
