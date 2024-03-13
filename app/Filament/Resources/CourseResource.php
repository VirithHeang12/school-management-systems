<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseResource\Pages;
use App\Filament\Resources\CourseResource\RelationManagers;
use App\Models\Course;
use App\Models\Department;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('course_title')
                    ->required()
                    ->label("Title")
                    ->maxLength(191),
                Forms\Components\Select::make('department_id')
                    ->options(Department::all()->pluck('department_name', 'id'))
                    ->label("Department")
                    ->required(),
                Forms\Components\TextInput::make('course_description')
                    ->maxLength(191)
                    ->label("Description")
                    ->required(),
                Forms\Components\FileUpload::make('course_image')
                    ->label("Image")
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->numeric()
                    ->label("No")
                    ->searchable(),
                Tables\Columns\TextColumn::make('course_title')
                    ->label("Title")
                    ->searchable(),
                Tables\Columns\TextColumn::make('department.department_name')
                    ->label("Department")
                    ->sortable(),
                Tables\Columns\TextColumn::make('course_description')
                    ->label("Description")
                    ->searchable(),
                Tables\Columns\ImageColumn::make('course_image')
                    ->circular(),
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
            'index' => Pages\ListCourses::route('/'),
            'create' => Pages\CreateCourse::route('/create'),
            'edit' => Pages\EditCourse::route('/{record}/edit'),
        ];
    }
}
