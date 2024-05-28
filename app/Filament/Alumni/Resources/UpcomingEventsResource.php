<?php

namespace App\Filament\Alumni\Resources;

use App\Filament\Alumni\Resources\UpcomingEventsResource\Pages;
use App\Models\UpcomingEvents;
use App\Models\Messages;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components;

class UpcomingEventsResource extends Resource
{
    protected static ?string $model = UpcomingEvents::class;

    protected static ?string $label = 'Event Directory ';
    protected static ?int $navigationSort = 4;

    protected static ?string $navigationIcon = 'heroicon-s-calendar-days';

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Components\TextEntry::make('TimeStart')
                            ->label('Start Time'),
                        Components\TextEntry::make('TimeEnd')
                            ->label('End Time'),
                            Components\TextEntry::make('EventName')
                            ->label('Event Name'),
                        Components\TextEntry::make('EDate')
                            ->label('Event Date'),
                Components\Section::make()
                    ->schema([   
                        Components\TextEntry::make('ELoc')
                            ->label('Event Location'),
                        Components\TextEntry::make('EDesc')
                            ->label('Event Description'),
                    ]),
                // Components\Section::make()
                //     ->label('Bookings')
                //     ->schema([
                //         Components\TextEntry::make('bookings')
                //             ->label('List of Student Numbers who booked this event')
                //             ->formatStateUsing(function ($record) {
                //                 $bookings = Booking::where('upcoming_event_id', $record->EventID)->with('user')->get();
                //                 return $bookings->pluck('user.student_no')->join(', ');
                //             })
                //             ->weight('bold')
                //             ->visible(fn () => auth()->user()->email === 'admin@plm.edu.ph'),
                //     ]),
            ]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('EventName')
                    ->label('Event Name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('EDate')
                    ->label('Event Date')
                    ->required(),
                Forms\Components\TextInput::make('ELoc')
                    ->label('Event Location')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('EDesc')
                    ->label('Event Description')
                    ->required(),
                Forms\Components\TimePicker::make('TimeStart')
                    ->label('Start Time')
                    ->required(),
                Forms\Components\TimePicker::make('TimeEnd')
                    ->label('End Time')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('EventName')
                    ->label('Event Name')
                    ->searchable()
                    ->wrap()
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('EDate')
                    ->label('Event Date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ELoc')
                    ->label('Event Location')
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('EDesc')
                    ->label('Event Description')
                    ->wrap()
                    ->limit(100),
                Tables\Columns\TextColumn::make('TimeStart')
                    ->label('Start Time'),
                Tables\Columns\TextColumn::make('TimeEnd')
                    ->label('End Time'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\Action::make('bookEvent')
                    ->label(fn (UpcomingEvents $record): string => Booking::where('user_id', Auth::user()->student_no)->where('upcoming_event_id', $record->EventID)->exists() ? 'Booked' : 'Book This Event')
                    ->color('warning')
                    ->action(function (UpcomingEvents $record) {
                        $user = Auth::user();

                        if (!Booking::where('user_id', $user->student_no)->where('upcoming_event_id', $record->EventID)->exists()) {
                            Booking::create([
                                'user_id' => $user->student_no,
                                'upcoming_event_id' => $record->EventID,
                            ]);

                            Messages::create([
                                'student_no' => $user->student_no,
                                'name' => $user->name,
                                'email' => $user->email,
                                'RDate' => now(),
                                'Description' => "You have booked the event: {$record->EventName} on {$record->EDate} at {$record->ELoc}. \n\n Event Description: {$record->EDesc} \n\nEvent Time: {$record->TimeStart} - {$record->TimeEnd}",
                                'Status' => 'Unread',
                            ]);

                            Notification::make()
                                ->title('Event Booked')
                                ->body("You have successfully booked the event: {$record->EventName}")
                                ->success()
                                ->send();
                        }
                    })
                    ->disabled(fn (UpcomingEvents $record): bool => Booking::where('user_id', Auth::user()->student_no)->where('upcoming_event_id', $record->EventID)->exists()),
            ]);
            // ->bulkActions([
            //     Tables\Actions\BulkActionGroup::make([
            //         Tables\Actions\DeleteBulkAction::make(),
            //     ]),
            //]);
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

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();
         if (!Auth::user()->is_admin) {
            return $query->where('Accepted', true)
                        ->whereDate('EDate', '>=', Carbon::today());
        }

        return $query;
    }
}
