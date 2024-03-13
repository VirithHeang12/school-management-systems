<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EnrollResource\Pages;
use App\Filament\Resources\EnrollResource\RelationManagers;
use App\Models\ClassSection;
use App\Models\Department;
use App\Models\Enroll;
use App\Models\Person;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EnrollResource extends Resource
{
    protected static ?string $model = Enroll::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-check';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('class_id')
                    ->options(ClassSection::all()->pluck('id'))
                    ->label("Class")
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('student_id')
                    ->options(Person::all()->pluck('id'))
                    ->label("Student")
                    ->searchable()
                    ->required(),
                Forms\Components\DatePicker::make('enroll_date')
                    ->required(),
                Forms\Components\Select::make('enroll_grade')
                    ->options([
                        'A' => 'A',
                        'B' => 'B',
                        'C' => 'C',
                        'D' => 'D',
                        'E' => 'E',
                        'F' => 'F',
                        'Not graded' => 'Not graded'
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('class_id')
                    ->numeric()
                    ->label("Class")
                    ->sortable(),
                Tables\Columns\TextColumn::make('person.person_first_name')
                    ->label('First Name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('person.person_last_name')
                    ->label('Last Name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('enroll_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('enroll_grade')
                    ->searchable(),
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
            'index' => Pages\ListEnrolls::route('/'),
            'create' => Pages\CreateEnroll::route('/create'),
            'edit' => Pages\EditEnroll::route('/{record}/edit'),
        ];
    }
}
