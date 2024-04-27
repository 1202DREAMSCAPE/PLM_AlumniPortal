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
                Forms\Components\DatePicker::make('Date')
                    ->label('Date')
                    ->required(),
                Forms\Components\Textarea::make('Description')
                    ->label('Description')
                    ->required(),
                Forms\Components\Select::make('Status')
                    ->label('Status')
                    ->options([
                        'Unread' => 'Unread',
                        'Read' => 'Read',
                    ])
                    ->required(),
                    
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('SNum')
                    ->label('Student Number'),
                Tables\Columns\TextColumn::make('name')
                    ->label('Name'),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email'),
                Tables\Columns\TextColumn::make('Date')
                    ->label('Date'),
                Tables\Columns\TextColumn::make('Description')
                    ->label('Description')
                    ->wrap(),
                Tables\Columns\TextColumn::make('Status')
                    ->label('Status'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListMessages::route('/'),
            //'create' => Pages\CreateMessages::route('/create'),
            //'edit' => Pages\EditMessages::route('/{record}/edit'),
        ];
    }
}
