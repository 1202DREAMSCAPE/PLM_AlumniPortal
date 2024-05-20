<?php

namespace App\Filament\Alumni\Resources;

use App\Filament\Alumni\Resources\UpcomingEventsResource\Pages;
use App\Filament\Alumni\Resources\UpcomingEventsResource\RelationManagers;
use App\Models\UpcomingEvents;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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
                    ->maxLength(255),
                Forms\Components\DatePicker::make('EDate'),
                Forms\Components\TextInput::make('ELoc')
                    ->maxLength(255),
                Forms\Components\Textarea::make('EDesc')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('TimeStart'),
                Forms\Components\TextInput::make('TimeEnd'),
                Forms\Components\Toggle::make('Accepted')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('EventName')
                    ->searchable(),
                Tables\Columns\TextColumn::make('EDate')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ELoc')
                    ->searchable(),
                Tables\Columns\TextColumn::make('TimeStart'),
                Tables\Columns\TextColumn::make('TimeEnd'),
                // Tables\Columns\TextColumn::make('created_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                // Tables\Columns\TextColumn::make('updated_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\IconColumn::make('Accepted')
                    ->boolean(),
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
            'index' => Pages\ListUpcomingEvents::route('/'),
            'create' => Pages\CreateUpcomingEvents::route('/create'),
            'edit' => Pages\EditUpcomingEvents::route('/{record}/edit'),
        ];
    }
}
