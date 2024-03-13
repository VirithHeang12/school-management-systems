<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PersonResource\Pages;
use App\Filament\Resources\PersonResource\RelationManagers;
use App\Models\Department;
use App\Models\Person;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PersonResource extends Resource
{
    protected static ?string $model = Person::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $label = "Students";

    public static function getEloquentQuery(): Builder
    {
        return static::getModel()::query()->where('person_is_professor', 0);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('person_email')
                    ->email()
                    ->required()
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
                    ->label("First Name"),
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
            ->columns([
                Tables\Columns\TextColumn::make('person_email')
                    ->searchable()
                    ->label("Email"),
                Tables\Columns\TextColumn::make('person_first_name')
                    ->searchable()
                    ->label("First Name")
                    ->sortable(),
                Tables\Columns\TextColumn::make('person_last_name')
                    ->searchable()
                    ->label("Last Name")
                    ->sortable(),
                Tables\Columns\TextColumn::make('person_date_of_birth')
                    ->date()
                    ->sortable()
                    ->label("Date of Birth"),
                Tables\Columns\ImageColumn::make('person_profile')
                    ->placeholder("No Profile")
                    ->circular(),
                Tables\Columns\TextColumn::make('department.department_name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('address.city')
                    ->sortable()
                    ->label("City"),
                Tables\Columns\TextColumn::make('address.district')
                    ->sortable()
                    ->label("District"),
                Tables\Columns\TextColumn::make('address.address')
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
            'index' => Pages\ListPeople::route('/'),
            'create' => Pages\CreatePerson::route('/create'),
            'edit' => Pages\EditPerson::route('/{record}/edit'),
        ];
    }
}
