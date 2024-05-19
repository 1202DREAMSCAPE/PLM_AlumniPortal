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
use Filament\Infolists\Components;
use Filament\Infolists\Infolist;

class UpcomingEventsResource extends Resource
{
    protected static ?string $model = UpcomingEvents::class;
    protected static ?string $label = 'Events Directory ';
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
                ->unique(ignoreRecord: false)
                ->maxLength(255),
            
            Forms\Components\Textarea::make('EDesc')
                ->label('Event Description')
                ->required()
                ->unique(ignoreRecord: false)
                ->maxLength(255),
            
            Forms\Components\TimePicker::make('TimeStart')
                ->label('Start Time')
                ->required()
                ->unique(ignoreRecord: false),
            
            Forms\Components\TimePicker::make('TimeEnd')
                ->label('End Time')
                ->required()
                ->unique(ignoreRecord: false),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
        ->schema([
            Components\Section::make()->schema([
                Components\TextEntry::make('EventName')
                    ->label('Event Name'),
                Components\TextEntry::make('EDate')
                    ->label('Event Date'),
                Components\TextEntry::make('ELoc')
                    ->label('Event Location'),
                Components\TextEntry::make('EDesc')
                    ->label('Event Description'),
            Components\Grid::make()->schema([
                Components\TextEntry::make('TimeStart')
                    ->label('Start Time'),
                Components\TextEntry::make('TimeEnd')
                    ->label('End Time'),
                    ])->columns(2),
            ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table

            ->recordClasses(fn (UpcomingEvents $record) => match (true) {
                $record->EDate <= now() => 'opacity-60', 
                $record->EDate > now() => 'bg-green-100',
                default => null, 
            })

            ->columns([
            Tables\Columns\TextColumn::make('EventName')
                ->searchable()
                ->label('Event Name'),

            Tables\Columns\TextColumn::make('EDate')
                ->searchable()
                ->sortable()
                ->label('Event Date'),
            
            Tables\Columns\TextColumn::make('ELoc')
                ->searchable()
                ->label('Event Location'),
            
            Tables\Columns\TextColumn::make('EDesc')
                ->searchable()
                ->label('Event Description')
                ->wrap(),
            
            Tables\Columns\TextColumn::make('TimeStart')
                ->searchable()
                ->label('Start Time'),
            
            Tables\Columns\TextColumn::make('TimeEnd')
                ->searchable()
                ->label('End Time'),
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
                    Tables\Actions\BulkAction::make("Mark as Accepted")
                        ->label('Mark as Accepted')
                        ->action(function (): void {
                        UpcomingEvents::where('Accepted', false)->update(['Accepted' => true]);
                        })
                        ->icon('heroicon-s-check-circle') 
                        ->color('success'),

                    Tables\Actions\BulkAction::make("Mark as Unaccepted")
                        ->label('Mark as Unaccepted')
                        ->action(function (): void {
                        UpcomingEvents::where('Accepted', true)->update(['Accepted' => false]);
                        })
                        ->icon('heroicon-s-x-circle') 
                        ->color('gray'),
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
