<?php

namespace App\Filament\Resources\ManagerAssignmentResource\Pages;

use App\Filament\Resources\ManagerAssignmentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListManagerAssignments extends ListRecords
{
    protected static string $resource = ManagerAssignmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
