<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClassSectionResource\Pages;
use App\Filament\Resources\ClassSectionResource\RelationManagers;
use App\Models\ClassSection;
use App\Models\Course;
use App\Models\Person;
use App\Models\Professor;
use App\Models\Room;
use App\Models\Semester;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ClassSectionResource extends Resource
{
    protected static ?string $model = ClassSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TimePicker::make('class_start_time')
                    ->label("Start From"),
                Forms\Components\TimePicker::make('class_end_time')
                    ->label("End At"),
                Forms\Components\Select::make('course_id')
                    ->options(Course::all()->pluck('course_title', 'id'))
                    ->label("Course")
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('person_id')
                    ->options(Professor::all()->pluck('person_id','person_id'))
                    ->label("Professor")
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('room_id')
                    ->options(Room::all()->pluck('id','id'))
                    ->label("Room")
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('semester_id')
                    ->options(Semester::all()->pluck('id', 'id'))
                    ->label("Semester No")
                    ->searchable()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('class_time')
                    ->label('Class Time')
                    ->searchable(),
                Tables\Columns\TextColumn::make('course.course_title')
                    ->label('Course Title')
                    ->sortable(),
                Tables\Columns\TextColumn::make('person.person_first_name')
                    ->label("Professor First Name")
                    ->sortable(),
                Tables\Columns\TextColumn::make('person.person_last_name')
                    ->label("Professor Last Name")
                    ->sortable(),
                Tables\Columns\TextColumn::make('room.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('semester.id')
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
            'index' => Pages\ListClassSections::route('/'),
            'create' => Pages\CreateClassSection::route('/create'),
            'edit' => Pages\EditClassSection::route('/{record}/edit'),
        ];
    }
}
