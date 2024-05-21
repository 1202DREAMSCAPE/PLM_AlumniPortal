<?php

namespace App\Filament\Alumni\Resources;

use App\Filament\Alumni\Resources\UpcomingEventsResource\Pages;
use App\Models\UpcomingEvents;
use App\Models\Messages;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UpcomingEventsResource extends Resource
{
    protected static ?string $model = UpcomingEvents::class;

    protected static ?string $label = 'Event Directory ';
    protected static ?int $navigationSort = 4;

    protected static ?string $navigationIcon = 'heroicon-s-calendar-days';

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
                // Forms\Components\Toggle::make('Accepted')
                //     ->required()
                //     ->visible(fn () => Auth::user()->is_admin), // Visible only to admin
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('EventName')
                ->label('Event Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('EDate')
                    ->label('Event Date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ELoc')
                    ->label('Event Location')
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
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('bookEvent')
                    ->label('Book This Event')
                    ->color('warning')
                    ->action(function (UpcomingEvents $record) {
                        $user = Auth::user();

                        Messages::create([
                            'SNum' => $user->SNum,
                            'name' => $user->name,
                            'email' => "admin@plm.edu.ph",
                            'RDate' => now(),
                            'Description' => "Booked the event: {$record->EventName} on {$record->EDate} at {$record->ELoc}.",
                            'Status' => 'Unread',
                        ]);

                        Notification::make()
                            ->title('Event Booked')
                            ->body("You have successfully booked the event: {$record->EventName}")
                            ->success()
                            ->send();
                    }),
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
