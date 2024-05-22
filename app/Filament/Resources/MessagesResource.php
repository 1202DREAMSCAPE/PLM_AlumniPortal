<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MessagesResource\Pages;
use App\Models\Messages;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components;
use Filament\Notifications\Notification;

class MessagesResource extends Resource
{
    protected static ?string $model = Messages::class;

    protected static ?string $label = 'Messages';
    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    protected static ?int $navigationSort = 1;

    public static function getNavigationBadge(): ?string
    {
        return number_format(static::getModel()::count());
    }

    public static function form(Form $form): Form
    {
        $user = Auth::user();
        $isAdmin = $user->is_admin ?? false;

        return $form
            ->schema([
                Forms\Components\TextInput::make('SNum')
                    ->label('Student Number')
                    ->required()
                    ->readOnly()
                    ->default(fn() => Auth::user()->SNum),
                Forms\Components\TextInput::make('name')
                    ->label('Name')
                    ->readOnly()
                    ->default(fn() => Auth::user()->name),
                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->readOnly()
                    ->default(fn() => Auth::user()->email),
                Forms\Components\DatePicker::make('RDate')
                    ->label('Date')
                    ->readOnly()
                    ->default(fn() => now()),
                Forms\Components\Textarea::make('Description')
                    ->label('Message')
                    ->required()
                    ->rows(5),
                Forms\Components\ToggleButtons::make('Status')
                    ->options([
                        'Unread' => 'Unread',
                        'Replied' => 'Replied',
                    ])
                    ->icons([
                        'Unread' => 'heroicon-s-minus-circle',
                        'Replied' => 'heroicon-s-check-circle',
                    ])
                    ->colors([
                        'Unread' => 'warning',
                        'Replied' => 'success',
                    ])
                    ->inline()
                    ->default('Unread')
                    ->visible($isAdmin),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Components\Section::make()->schema([
                    Components\TextEntry::make('SNum')
                        ->label('Student Number'),
                    Components\TextEntry::make('name')
                        ->label('Name'),
                    Components\TextEntry::make('email')
                        ->label('Email'),
                    Components\TextEntry::make('RDate')
                        ->label('Date'),
                    Components\TextEntry::make('Description')
                        ->label('Message'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        $user = Auth::user();
        $isAdmin = $user->is_admin ?? false;

        return $table
        

        ->recordClasses(fn(Messages $record) => match($record->Status) {
            'Replied' => 'opacity-80',
            'Unread' => 'font-bold',
            default => null,
        }) 
        
            ->columns([
                Tables\Columns\TextColumn::make('SNum')
                    ->label('Student Number')
                    ->color('secondary')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Name'),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email'),
                Tables\Columns\TextColumn::make('RDate')
                    ->label('Date'),
                Tables\Columns\TextColumn::make('Description')
                    ->label('Message')
                    ->wrap(),
                Tables\Columns\TextColumn::make('Status')
                    ->label('Status')
                    ->searchable()
                    ->badge()
                    ->color(fn(string $state): string => match($state) {
                        'Unread' => 'danger',
                        'Replied' => 'success'
                        ,
                    })->visible(),
            ])
            ->defaultSort('RDate')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\Action::make('Reply')
                ->color('warning')
                ->icon('heroicon-o-chat-bubble-bottom-center-text')
                ->label('Reply')
                ->form([
                Forms\Components\TextInput::make('SNum')
                ->label('Student Number')
                ->default(fn(Messages $record) => $record->SNum)
                ->required()
                ->readOnly(),
                Forms\Components\TextInput::make('name')
                ->label('Name')
                ->default(fn(Messages $record) => $record->name)
                ->required()
                ->readOnly(),
                Forms\Components\TextInput::make('email')
                ->label('Email')
                ->default(fn(Messages $record) => $record->email)
                ->required()
                ->readOnly(),
                Forms\Components\Textarea::make('new_message')
                ->label('New Message')
                ->required(),
                ])
                ->action(function (Messages $record, array $data): void {
                $originalMessageSnippet = substr($record->Description, 0, 50);

                Messages::create([
                'SNum' => $record->SNum, // Use the SNum from the original message
                'name' => Auth::user()->name, // Admin's name
                'email' => $record->email, // Original sender's email
                'RDate' => now(),
                'Description' => 'RE: ' . $originalMessageSnippet . ' - \n\n' . $data['new_message'],
                'Status' => 'Unread',
                ]);

                // Mark the original message as replied
                $record->Status = 'Replied';
                $record->save();

                // Send notification to the admin
                Notification::make()
                ->title('Message Replied')
                ->body('Your reply has been sent successfully.')
                ->success()
                ->send();
                })
                ->visible($isAdmin),

                    
                Tables\Actions\Action::make('toggleReadStatus')
                    ->icon(fn(Messages $record): string => $record->Status === 'Unread' ? 'heroicon-o-eye' : 'heroicon-o-eye-slash')
                    ->label(fn(Messages $record): string => $record->Status === 'Unread' ? 'Read' : 'Unread')
                    ->action(function(Messages $record): void {
                        $record->Status = $record->Status === 'Unread' ? 'Replied' : 'Unread';
                        $record->save();

                        Notification::make()
                            ->title('Message Status Updated')
                            ->body('The message status has been updated.')
                            ->success()
                            ->send();
                    })
                    ->visible(), 
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Delete Messages')
                        ->visible($isAdmin),
                    Tables\Actions\BulkAction::make('Mark as Replied')
                        ->label('Mark as Replied')
                        ->action(fn() => Messages::where('Status', 'Unread')->update(['Status' => 'Replied']))
                        ->icon('heroicon-o-eye')
                        ->color('success')
                        ->visible($isAdmin),
                    Tables\Actions\BulkAction::make('Mark as Unread')
                        ->label('Mark as Unread')
                        ->action(fn() => Messages::where('Status', 'Replied')->update(['Status' => 'Unread']))
                        ->icon('heroicon-s-eye')
                        ->color('gray')
                        ->visible($isAdmin),
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
            'index' => Pages\ListMessages::route('/'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();
        $query->orderByRaw("CASE WHEN Status = 'Unread' THEN 0 ELSE 1 END");
        if (Auth::user()->is_admin) {
            return $query;
        }
        return $query->where('SNum', Auth::user()->SNum);
    }
}
