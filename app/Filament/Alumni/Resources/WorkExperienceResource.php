<?php

namespace App\Filament\Alumni\Resources;

use App\Filament\Alumni\Resources\WorkExperienceResource\Pages;
use App\Filament\Alumni\Resources\WorkExperienceResource\RelationManagers;
use App\Models\WorkExperience;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Alumni\Clusters\Info;
use Filament\Infolists\Components;
use Filament\Infolists\Infolist;
use Filament\Support\Enums\FontWeight;



class WorkExperienceResource extends Resource
{
    protected static ?string $model = WorkExperience::class;
    protected static ?string $cluster = Info::class;
    protected static ?string $label = 'Work Experience ';

     protected static ?int $navigationSort = 2;
    protected static ?string $navigationIcon = 'heroicon-s-briefcase';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('EmploymentStatus')
                    ->label('Employment Status')
                    ->options([
                        'Full' => 'Full Time',
                        'Part' => 'Part Time',
                        'Intern' => 'Internship',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('JobTitle')
                    ->label('Job Title')
                    ->required(),
                Forms\Components\TextInput::make('CompanyName')
                    ->label('Company Name')
                    ->required(),
                Forms\Components\Select::make('EmploymentCountry')
                    ->label('Employment Country')
                    ->options([
                        'PH' => 'Philippines',
                        'US' => 'United States',
                        'CA' => 'Canada',
                        'AU' => 'Australia',
                        'NZ' => 'New Zealand',
                        'SG' => 'Singapore',
                        'MY' => 'Malaysia',
                        'JP' => 'Japan',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('WorkIndustry')
                    ->label('Work Industry')
                    ->required(),
                Forms\Components\TextInput::make('WorkSector')
                    ->label('Work Sector')
                    ->required(),
                Forms\Components\DatePicker::make('StartOfEmployment')
                    ->label('Start Of Employment')
                    ->required(),
                Forms\Components\DatePicker::make('EndOfEmployment')
                    ->label('End Of Employment')
                    ->required(false),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
        ->schema([
            Components\Section::make()->schema([
                Components\TextEntry::make('EmploymentStatus')
                    ->label('Employment Status'),
                Components\TextEntry::make('JobTitle')
                    ->label('Job Title'),
                Components\TextEntry::make('CompanyName')
                    ->label('Company Name'),
                Components\TextEntry::make('EmploymentCountry')
                    ->label('Employment Country'),
                Components\TextEntry::make('WorkIndustry')
                    ->label('Work Industry'),
                Components\TextEntry::make('WorkSector')
                    ->label('Work Sector'),
                Components\TextEntry::make('StartOfEmployment')
                    ->label('Start Of Employment'),
                Components\TextEntry::make('EndOfEmployment')
                    ->label('End Of Employment'),           
            ])
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('CompanyName')
                    ->label(' ')
                    ->weight(FontWeight::Bold)
                    ->searchable(false),
                
                // Tables\Columns\TextColumn::make('StartOfEmployment')
                //     ->label(' ')
                //     ->searchable(false),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                //Tables\Actions\BulkActionGroup::make([
                    //Tables\Actions\DeleteBulkAction::make(),
                // ]),
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
            'index' => Pages\ListWorkExperiences::route('/'),
           // 'create' => Pages\CreateWorkExperience::route('/create'),
           // 'edit' => Pages\EditWorkExperience::route('/{record}/edit'),
        ];
    }
}
