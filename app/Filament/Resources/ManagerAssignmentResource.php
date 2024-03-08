<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ManagerAssignmentResource\Pages;
use App\Filament\Resources\ManagerAssignmentResource\RelationManagers;
use App\Models\Department;
use App\Models\ManagerAssignment;
use App\Models\Professor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ManagerAssignmentResource extends Resource
{
    protected static ?string $model = ManagerAssignment::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('manager_assignment_date')
                    ->required()
                    ->label("Date"),
                Forms\Components\Select::make('person_id')
                    ->options(Professor::all()->pluck('person.person_email', 'person_id'))
                    ->label("Professor")
                    ->required(),
                Forms\Components\Select::make('department_id')
                    ->options(Department::all()->pluck('department_name', 'id'))
                    ->label("Department")
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('manager_assignment_date')
                    ->date()
                    ->label("Assignment Date")
                    ->sortable(),
                Tables\Columns\TextColumn::make('person.person_email')
                    ->label("Email")
                    ->sortable(),
                Tables\Columns\TextColumn::make('person.person_first_name')
                    ->label("First Name")
                    ->sortable(),
                Tables\Columns\TextColumn::make('person.person_last_name')
                    ->label("Last Name")
                    ->sortable(),
                Tables\Columns\TextColumn::make('department.department_name')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListManagerAssignments::route('/'),
            'create' => Pages\CreateManagerAssignment::route('/create'),
            'edit' => Pages\EditManagerAssignment::route('/{record}/edit'),
        ];
    }
}
