<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JobPOResource\Pages;
use App\Filament\Resources\JobPOResource\RelationManagers;
use App\Models\JobPO;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists\Components;
use Filament\Infolists\Infolist;

class JobPOResource extends Resource
{
    protected static ?string $model = JobPO::class;
    protected static ?string $label = 'Job Opportunities';
    protected static ?int $navigationSort = 6;
    public static function getNavigationBadge(): ?string
    {
        return number_format(static::getModel()::count());
    }

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('JTitle')
                    ->label('Job Title')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                
                Forms\Components\TextInput::make('JLocation')
                    ->label('Job Location')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                
                Forms\Components\TextInput::make('CName')
                    ->label('Company Name')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                
                Forms\Components\TextInput::make('CPerson')
                    ->label('Contact Person')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                
                Forms\Components\Select::make('EmpType')
                    ->options([
                        'Full-Time' => 'Full-Time',
                        'Part-Time' => 'Part-Time',
                        'Contract' => 'Contract',
                        'Temporary' => 'Temporary',
                        'Internship' => 'Internship',
                        'Freelance' => 'Freelance',
                    ])
                    ->label('Employment Type')
                    ->required(),
            ]);
    }
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
        ->schema([
            Components\Section::make()->schema([
                Components\TextEntry::make('JTitle')
                    ->label('Job Title'),
                Components\TextEntry::make('JLocation')
                    ->label('Job Location'),
                Components\TextEntry::make('CName')
                    ->label('Company Name'),
                Components\TextEntry::make('CPerson')
                    ->label('Contact Person'),
                Components\TextEntry::make('EmpType')
                    ->label('Employment Type'),
            ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('JTitle')
                    ->searchable()
                    ->label('Job Title'),

                Tables\Columns\TextColumn::make('JLocation')
                    ->searchable()
                    ->label('Job Location'),
                
                Tables\Columns\TextColumn::make('CName')
                    ->searchable()
                    ->label('Company Name'),
                
                Tables\Columns\TextColumn::make('CPerson')
                    ->searchable()
                    ->searchable()
                    ->label('Contact Person'),
                
                Tables\Columns\TextColumn::make('EmpType')
                    ->searchable()
                    ->label('Employment Type'),
                
                Tables\Columns\IconColumn::make('Accepted')
                    ->boolean()
                    ->alignCenter(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make("Mark as Accepted")
                        ->label('Mark as Accepted')
                        ->action(function (): void {
                        JobPO::where('Accepted', false)->update(['Accepted' => true]);
                        })
                        ->icon('heroicon-s-check-circle') 
                        ->color('success'),

                    Tables\Actions\BulkAction::make("Mark as Unaccepted")
                        ->label('Mark as Unaccepted')
                        ->action(function (): void {
                        JobPO::where('Accepted', true)->update(['Accepted' => false]);
                        })
                        ->icon('heroicon-s-x-circle') 
                        ->color('gray'),
                        ])
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
            'index' => Pages\ListJobPOS::route('/'),
            //'create' => Pages\CreateJobPO::route('/create'),
            //'edit' => Pages\EditJobPO::route('/{record}/edit'),
        ];
    }
}
