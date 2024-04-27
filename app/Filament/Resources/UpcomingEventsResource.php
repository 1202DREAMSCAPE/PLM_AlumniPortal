<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UpcomingEventsResource\Pages;
use App\Filament\Resources\UpcomingEventsResource\RelationManagers;
use App\Models\UpcomingEvents;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\DateTimePicker;

class UpcomingEventsResource extends Resource
{
    protected static ?string $model = UpcomingEvents::class;
    protected static ?string $label = 'Events';
    protected static ?int $navigationSort = 7;
    public static function getNavigationBadge(): ?string
    {
        return number_format(static::getModel()::count());
    }

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('EventName')
                ->label('Event Name')
                ->required()
                ->unique(ignoreRecord: true)
                ->maxLength(255),

            Forms\Components\DatePicker::make('EDate')
                ->label('Event Date')
                ->required()
                ->unique(ignoreRecord: true),
            
            Forms\Components\TextInput::make('ELoc')
                ->label('Event Location')
                ->required()
                ->unique(ignoreRecord: true)
                ->maxLength(255),
            
            Forms\Components\Textarea::make('EDesc')
                ->label('Event Description')
                ->required()
                ->unique(ignoreRecord: true)
                ->maxLength(255),
            
            Forms\Components\TimePicker::make('TimeStart')
                ->label('Start Time')
                ->required()
                ->unique(ignoreRecord: true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

            Tables\Columns\TextColumn::make('EventName')
                ->searchable()
                ->label('Event Name'),
                //->alignCenter(),
                //->sortable(),

            Tables\Columns\TextColumn::make('EDate')
                ->searchable()
                ->sortable()
                ->label('Event Date'),
            
            Tables\Columns\TextColumn::make('ELoc')
                ->searchable()
                ->label('Event Location'),
            
            Tables\Columns\TextColumn::make('TimeStart')
                ->searchable()
                ->label('Start Time'),
            ])
            ->filters([
                //
            ])
            ->actions([
                //Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListUpcomingEvents::route('/'),
            //'create' => Pages\CreateUpcomingEvents::route('/create'),
            //'edit' => Pages\EditUpcomingEvents::route('/{record}/edit'),
        ];
    }
}
