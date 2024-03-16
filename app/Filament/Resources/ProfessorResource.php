<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfessorResource\Pages;
use App\Filament\Resources\ProfessorResource\RelationManagers;
use App\Models\Department;
use App\Models\Professor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProfessorResource extends Resource
{
    protected static ?string $model = Professor::class;
    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('person_id')
                    ->numeric()
                    ->label("ID")
                    ->readOnly()
                    ->hiddenOn('create'),
                Forms\Components\TextInput::make('person_email')
                    ->email()
                    ->required()
                    ->readOnlyOn('edit')
                    ->maxLength(191)
                    ->label("Email"),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required()
                    ->maxLength(191)
                    ->minLength(8)
                    ->label("Password"),
                Forms\Components\TextInput::make('person_first_name')
                    ->required()
                    ->maxLength(191)
                    ->label("First name"),
                Forms\Components\TextInput::make('person_last_name')
                    ->required()
                    ->maxLength(191)
                    ->label("Last Name"),
                Forms\Components\DatePicker::make('person_date_of_birth')
                    ->label("Date of Birth")
                    ->required(),
                Forms\Components\FileUpload::make('person_profile')
                    ->label("Profile Image"),
                Forms\Components\Select::make('department_id')
                    ->options(Department::all()->pluck('department_name', 'id'))
                    ->label("Department")
                    ->required(),
                Forms\Components\TextInput::make('professor_specialty')
                    ->required()
                    ->maxLength(191)
                    ->label("Specialty"),
                Forms\Components\TextInput::make('address')
                    ->maxLength(191)
                    ->label("Address"),
                Forms\Components\TextInput::make('city')
                    ->required()
                    ->maxLength(191)
                    ->label("City"),
                Forms\Components\TextInput::make('district')
                    ->required()
                    ->maxLength(191)
                    ->label("District"),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([Tables\Columns\TextColumn::make('person.person_email')
                ->searchable()
                ->label("Email"),
                Tables\Columns\TextColumn::make('person.person_first_name')
                    ->searchable()
                    ->label("First Name")
                    ->sortable(),
                Tables\Columns\TextColumn::make('person.person_last_name')
                    ->searchable()
                    ->label("Last Name")
                    ->sortable(),
                Tables\Columns\TextColumn::make('person.person_date_of_birth')
                    ->date()
                    ->sortable()
                    ->label("Date of Birth"),
                Tables\Columns\ImageColumn::make('person.person_profile')
                    ->placeholder("No Profile")
                    ->circular()
                    ->searchable()
                    ->label("Profile"),
                Tables\Columns\TextColumn::make('person.department.department_name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('professor_specialty')
                    ->searchable(),
                Tables\Columns\TextColumn::make('person.address.city')
                    ->sortable()
                    ->label("City"),
                Tables\Columns\TextColumn::make('person.address.district')
                    ->sortable()
                    ->label("District"),
                Tables\Columns\TextColumn::make('person.address.address')
                    ->placeholder("No Address")
                    ->label("Address"),

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
            'index' => Pages\ListProfessors::route('/'),
            'create' => Pages\CreateProfessor::route('/create'),
            'edit' => Pages\EditProfessor::route('/{record}/edit'),
        ];
    }
}
