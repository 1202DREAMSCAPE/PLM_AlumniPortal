<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MessagesResource\Pages;
use App\Filament\Resources\MessagesResource\RelationManagers;
use App\Models\Messages;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\ToggleButtons;
use Filament\Infolists\Components;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use Parallax\FilamentComments\Tables\Actions\CommentsAction;
use Parallax\FilamentComments\Infolists\Components\CommentsEntry;





class MessagesResource extends Resource
{
    protected static ?string $model = Messages::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    protected static ?int $navigationSort = 1;

    public static function getNavigationBadge(): ?string
    {
        return number_format(static::getModel()::count());
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('SNum')
                    ->label('Student Number')
                    ->required()
                    ->unique(ignoreRecord: true),
                Forms\Components\TextInput::make('name')    
                    ->label('Name')
                    ->required(),
                   // ->unique(ignoreRecord: true),
                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->required()
                    ->unique(ignoreRecord: true),
                Forms\Components\DatePicker::make('RDate')
                    ->label('Date')
                    ->required()
                    ->unique(ignoreRecord: false),
                Forms\Components\Textarea::make('Description')
                    ->label('Description')
                    ->required(),
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
                    ->label('Description'),
                   // ->wrap(),
                Components\TextEntry::make('Status')
                    ->label('Status')
                    ->badge(),                
            ])
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            
            ->recordClasses(fn (Messages $record) => match ($record->Status) {
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
                    ->label('Description')
                    ->AlignJustify()
                    ->wrap(),
                Tables\Columns\TextColumn::make('Status')
                    ->searchable()
                    ->badge()
                    ->color(fn(string $state): string => match ($state){
                        'Unread' => 'danger',
                        'Replied' => 'success',
                    }),
            ])
            ->defaultSort('Status', 'desc')

            ->filters([
                //
            ])
            ->actions([
                //Tables\Actions\EditAction::make(),
                //Tables\Actions\DeleteAction::make(),
                //Tables\Actions\ViewAction::make(),
                CommentsAction::make(),
                Tables\Actions\Action::make("Read")
                ->icon(fn(Messages $appeal): string => match ($appeal->Status){
                    'Unread' => 'heroicon-o-eye',
                    'Replied' => 'heroicon-s-eye',
                })
                    ->label(fn(Messages $appeal): string => match ($appeal->Status){
                        'Unread' => 'Mark as Replied',
                        'Replied' => 'Mark as Unread',
                    })
                    ->action(function (Messages $appeal, array $data): void{
                        if($appeal->Status == "Replied"){
                            $appeal->Status = "Unread";
                            $appeal->save();
                            return;
                        }

                        if($appeal->Status == "Unread"){
                            $appeal->Status = "Replied";
                            $appeal->save();
                            return;
                        }
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Delete Messages'),
                    Tables\Actions\BulkAction::make("Mark as Replied")
                        ->label('Mark as Replied')
                        ->action(function (): void {
                        Messages::where('Status', 'Unread')->update(['Status' => 'Replied']);
                        })
                        ->icon('heroicon-o-eye')
                        ->color('success'),

                    Tables\Actions\BulkAction::make("Mark as Unread")
                        ->label('Mark as Unread')
                        ->action(function (): void {
                        Messages::where('Status', 'Replied')->update(['Status' => 'Unread']);
                        })
                        ->icon('heroicon-s-eye')
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
            'index' => Pages\ListMessages::route('/'),
            //'create' => Pages\CreateMessages::route('/create'),
            //'edit' => Pages\EditMessages::route('/{record}/edit'),
        ];
    }
}
