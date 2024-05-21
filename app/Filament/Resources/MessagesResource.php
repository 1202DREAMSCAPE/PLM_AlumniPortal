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
use Parallax\FilamentComments\Tables\Actions\CommentsAction;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components;

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
                'Replied' => 'opacity-60',
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
                    ->searchable()
                    ->badge()
                    ->color(fn(string $state): string => match($state) {
                        'Unread' => 'danger',
                        'Replied' => 'success',
                    }),
            ])
            ->defaultSort('Status', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                CommentsAction::make()
                    ->label('Reply'),
                Tables\Actions\Action::make('Read')
                    ->icon(fn(Messages $appeal): string => match($appeal->Status) {
                        'Unread' => 'heroicon-o-eye',
                        'Replied' => 'heroicon-s-eye',
                    })
                    ->label(fn(Messages $appeal): string => match($appeal->Status) {
                        'Unread' => 'Mark as Replied',
                        'Replied' => 'Mark as Unread',
                    })
                    ->action(function(Messages $appeal): void {
                        $appeal->Status = $appeal->Status === 'Unread' ? 'Replied' : 'Unread';
                        $appeal->save();
                    })
                    ->visible($isAdmin),
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
        if (Auth::user()->is_admin) {
            return $query;
        }
        return $query->where('SNum', Auth::user()->SNum);
    }
}
