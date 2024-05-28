<?php
namespace App\Filament\Resources;

use App\Filament\Resources\UpcomingEventsResource\Pages;
use App\Models\UpcomingEvents;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Notifications\Notification;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

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
                Components\Section::make()
                    ->label('Bookings')
                    ->schema([
                        Components\TextEntry::make('bookings')
                            ->label('List of student numbers who booked this event')
                            ->formatStateUsing(function ($record) {
                                $bookings = Booking::where('upcoming_event_id', $record->EventID)->with('user')->get();
                                return $bookings->pluck('user.student_no')->join(', ');
                            })
                            ->weight('bold')
                            ->color('indigo')
                            ->visible(fn () => auth()->user()->email === 'admin@plm.edu.ph'), 
                    ]),
            ]);
    }

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

    public static function table(Table $table): Table
    {
        return $table
            ->recordClasses(fn (UpcomingEvents $record) => match (true) {
                $record->EDate <= now() => 'opacity-60',
                $record->EDate > now() => '',
                default => null,
            })
            ->columns([
                Tables\Columns\TextColumn::make('EventName')
                    ->searchable()
                    ->wrap()
                    ->weight('bold')
                    ->label('Event Name'),
                Tables\Columns\TextColumn::make('EDate')
                    ->searchable()
                    ->sortable()
                    ->label('Event Date'),
                Tables\Columns\TextColumn::make('ELoc')
                    ->searchable()
                    ->wrap()
                    ->label('Event Location'),
                Tables\Columns\TextColumn::make('EDesc')
                    ->searchable()
                    ->label('Event Description')
                    ->wrap()
                    ->limit(100),
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
                Tables\Actions\ViewAction::make(),
                Tables\Actions\Action::make('toggleAccepted')
                    ->label(fn (UpcomingEvents $record): string => $record->Accepted ? 'Reject' : 'Accept')
                    ->color(fn (UpcomingEvents $record): string => $record->Accepted ? 'danger' : 'success')
                    ->icon(fn (UpcomingEvents $record): string => $record->Accepted ? 'heroicon-s-x-circle' : 'heroicon-s-check-circle')
                    ->requiresConfirmation()
                    ->action(function (UpcomingEvents $record) {
                        $record->Accepted = !$record->Accepted;
                        $record->save();

                        $status = $record->Accepted ? 'accepted' : 'rejected';

                        Notification::make()
                            ->title('Event Status Updated')
                            ->body("The event: {$record->EventName} has been $status.")
                            ->info()
                            ->send();
                    })
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUpcomingEvents::route('/'),
            // 'create' => Pages\CreateUpcomingEvents::route('/create'),
            // 'edit' => Pages\EditUpcomingEvents::route('/{record}/edit'),
        ];
    }
}
