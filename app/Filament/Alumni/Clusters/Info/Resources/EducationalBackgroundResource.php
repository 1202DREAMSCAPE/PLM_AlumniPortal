<?php

namespace App\Filament\Alumni\Clusters\Info\Resources;

use App\Filament\Alumni\Clusters\Info;
use App\Filament\Alumni\Clusters\Info\Resources\EducationalBackgroundResource\Pages;
use App\Filament\Alumni\Clusters\Info\Resources\EducationalBackgroundResource\RelationManagers;
use App\Models\EducationalBackground;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EducationalBackgroundResource extends Resource
{
    protected static ?string $model = EducationalBackground::class;

    protected static ?int $navigationSort = 3;

    protected static ?string $label = 'Educational Background ';

    protected static ?string $navigationIcon = 'heroicon-s-academic-cap';

    protected static ?string $cluster = Info::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('school')
                    ->label('School')
                    ->required(),
                Forms\Components\Select::make('educattain')
                    ->label('Educational Attainment')
                    ->options([
                        'Elementary' => 'Elementary',
                        'High School' => 'High School',
                        'College' => 'College',
                        'Vocational' => 'Vocational',
                        'Masteral' => 'Masteral',
                        'Doctorate' => 'Doctorate',
                    ])
                    ->searchable()
                    ->placeholder('Select Educational Attainment')
                    ->required(),
                Forms\Components\Select::make('degree')
                    ->label('Degree Obtained')
                    ->options([
                        'Bachelor of Science in Information Systems' => 'Bachelor of Science in Information Systems',
                        'Bachelor of Science in Computer Engineering' => 'Bachelor of Science in Computer Engineering',
                        'Bachelor of Science in Computer Science' => 'Bachelor of Science in Computer Science',
                        'Bachelor of Science in Accountancy' => 'Bachelor of Science in Accountancy',
                        'Bachelor of Science in Business Administration' => 'Bachelor of Science in Business Administration',
                        'Bachelor of Science in Hotel and Restaurant Management' => 'Bachelor of Science in Hotel and Restaurant Management',
                        'Bachelor of Science in Nursing' => 'Bachelor of Science in Nursing',
                        'Bachelor of Science in Medical Technology' => 'Bachelor of Science in Medical Technology',
                        'Bachelor of Science in Pharmacy' => 'Bachelor of Science in Pharmacy',
                        'Bachelor of Science in Physical Therapy' => 'Bachelor of Science in Physical Therapy',
                        'Bachelor of Science in Education' => 'Bachelor of Science in Education',
                    ])
                    ->searchable()
                    ->placeholder('Select Degree')
                    ->required(),
                Forms\Components\TextInput::make('gwa')
                    ->label('General Weighted Average')
                    ->required(),
                Forms\Components\TextInput::make('honors')
                    ->label('Honors/Achievement')
                    ->required(false),
                Forms\Components\DatePicker::make('startperiod')
                    ->label('Start Period')
                    ->required(),
                Forms\Components\DatePicker::make('endperiod')
                    ->label('End Period')
                    ->required(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('school')
                    ->label(' ')
                    ->weight('bold')
                    ->sortable(false),
                    Tables\Columns\TextColumn::make('degree')
                    ->label(' ')
                    ->sortable(false),
                Tables\Columns\TextColumn::make(' ')
                    ->label(' ')
                    ->sortable(false),
                Tables\Columns\TextColumn::make('1 ')
                    ->label(' ')
                    ->sortable(false),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                //
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
            'index' => Pages\ListEducationalBackgrounds::route('/'),
           // 'create' => Pages\CreateEducationalBackground::route('/create'),
            //'edit' => Pages\EditEducationalBackground::route('/{record}/edit'),
        ];
    }
}