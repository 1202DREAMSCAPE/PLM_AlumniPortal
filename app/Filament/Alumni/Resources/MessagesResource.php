<?php

namespace App\Filament\Alumni\Resources;

use App\Filament\Alumni\Resources\MessagesResource\Pages;
use App\Filament\Alumni\Resources\MessagesResource\RelationManagers;
use App\Models\Messages;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Notification as LaravelNotification;
use Illuminate\Support\Facades\Auth; 


class MessagesResource extends Resource
{
    protected static ?string $model = Messages::class;
    protected static ?string $label = 'Messages ';
    protected static ?string $navigationIcon = 'heroicon-s-envelope';

    protected static ?int $navigationSort = 3;

    public static function getNavigationBadge(): ?string
{
    // Get the logged-in user ID
    $student_no = auth()->id();

    // Count the models associated with the logged-in user
    $count = static::getModel()::where('student_no', $student_no)->count();

    // Return the count as a formatted string
    return number_format($count);
}

    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }

    public static function form(Form $form): Form
    {
        $user = Auth::user();
        $isAdmin = $user->is_admin ?? false;

        return $form
            ->schema([
                Forms\Components\TextInput::make('student_no')
                    ->label('Student Number')
                    ->readOnly()
                     ->default(fn() => Auth::user()->student_no),
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
                    ->rows(5)
                    ->columnSpan('full'),
                Forms\Components\ToggleButtons::make('Status')
                    ->options([
                        'Unread' => 'Unread',
                        'Read' => 'Read',
                        'Replied' => 'Replied',
                    ])
                    ->icons([
                        'Unread' => 'heroicon-s-minus-circle',
                        'Read' => 'heroicon-s-check-circle',
                        'Replied' => 'heroicon-s-check-circle',
                    ])
                    ->colors([
                        'Unread' => 'warning',
                        'Read' => 'success',
                        'Replied' => 'success',
                    ])
                    ->inline()
                    ->default('Unread')
                    ->visible($isAdmin),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        $user = Auth::user();
        $isAdmin = $user->is_admin ?? false;

        return $infolist
            ->schema([
                Components\TextEntry::make('student_no')
                    ->label('Student Number')
                    ->visible($isAdmin),
                Components\TextEntry::make('name')
                    ->label('Name')
                    ->visible($isAdmin),
                Components\TextEntry::make('email')
                    ->label('Email')
                    ->visible($isAdmin),
                Components\TextEntry::make('RDate')
                    ->label('Date')
                    ->visible($isAdmin),
                 Components\Section::make()->schema([
                    Components\TextEntry::make('Description')
                        ->label('Message'),
                 ]),
            ]);
    }

    public static function table(Table $table): Table
{
    $user = Auth::user();
        $isAdmin = $user->is_admin ?? false;
    return $table
        ->recordClasses(fn(Messages $record) => match($record->Status) {
            'Unread' => 'font-bold',
            'Replied' => 'font-bold', 
            'Read' => 'opacity-60',
        })
        ->columns([
            // Tables\Columns\TextColumn::make('student_no')
            //     ->label('Student Number')
            //     ->color('secondary')
            //     ->searchable(),
            // Tables\Columns\TextColumn::make('name')
            //     ->label('Name'),
            Tables\Columns\TextColumn::make('email')
                ->label('Email'),
            Tables\Columns\TextColumn::make('RDate')
                ->label('Date'),
            Tables\Columns\TextColumn::make('Description')
                ->label('Message')
                ->wrap()
                ->searchable()
                ->limit(100),
            Tables\Columns\TextColumn::make('Status')
                ->label('Status')
                ->searchable()
                ->badge()
                ->color(fn(string $state): string => match($state) {
                    'Unread' => 'danger',
                    'Read' => 'success',
                    'Replied' => 'warning',
                }),
        ])
        ->defaultSort('RDate')
        ->filters([
            Tables\Filters\SelectFilter::make('Status')
                ->options([
                    'Unread' => 'Unread',
                    'Read' => 'Read',
                    'Replied' => 'Replied',
                ]),
        ])
        ->actions([
            Tables\Actions\ViewAction::make()
                ->action(function (Messages $record) {
                    if ($record->Status === 'Unread' && !Auth::user()->is_admin) {
                        $record->Status = 'Read';
                        $record->save();
                    }
                }),
            
                Tables\Actions\Action::make('toggleReadStatus')
                ->icon(fn(Messages $record): string => ($record->Status === 'Unread' || $record->Status === 'Replied') ? 'heroicon-o-eye' : 'heroicon-o-eye-slash')
                ->label(fn(Messages $record): string => ($record->Status === 'Unread' || $record->Status === 'Replied') ? 'Mark as Read' : 'Mark as Unread')
                ->action(function(Messages $record): void {
                    $record->Status = $record->Status === 'Unread' || $record->Status === 'Replied' ? (Auth::user()->is_admin ? 'Replied' : 'Read') : 'Unread';
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
                Tables\Actions\BulkAction::make('Mark as Read')
                    ->label('Mark as Read')
                    ->action(fn() => Messages::where('Status', 'Unread')->update(['Status' => 'Read']))
                    ->icon('heroicon-o-eye')
                    ->color('success')
                    ->visible($isAdmin),
                Tables\Actions\BulkAction::make('Mark as Unread')
                    ->label('Mark as Unread')
                    ->action(fn() => Messages::where('Status', 'Replied')->orWhere('Status', 'Read')->update(['Status' => 'Unread']))
                    ->icon('heroicon-s-eye')
                    ->color('gray')
                    ->visible($isAdmin),
            ]),
        ]);
}

    
    public static function getEloquentQuery(): Builder
{
    $user = Auth::user();
    $query = parent::getEloquentQuery();
    $query->orderByRaw("CASE WHEN Status = 'Unread' THEN 0 ELSE 1 END");

    if ($user->is_admin) {
        return $query;
    }

    return $query->where(function ($query) use ($user) {
        $query->where('student_no', $user->student_no)
              ->orWhere('email', $user->email);
    });

}
public static function getPages(): array
{
    return [
        'index' => Pages\ListMessages::route('/'),
    ];
}
}