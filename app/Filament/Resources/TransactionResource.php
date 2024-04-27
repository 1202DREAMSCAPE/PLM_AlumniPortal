<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionResource\Pages;
use App\Filament\Resources\TransactionResource\RelationManagers;
use App\Models\Transaction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    public static function getNavigationBadge(): ?string
    {
        return number_format(static::getModel()::count());
    }

    protected static ?int $navigationSort = 9;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('name')
                    ->label('First Name'),
                TextEntry::make('LName')
                    ->label('Last Name'),
                TextEntry::make('MName')
                    ->label('Middle Name'),
                TextEntry::make('NameExt')
                    ->label('Name Extension'),
                TextEntry::make('MaidenName')
                    ->label('Maiden Name'),
                TextEntry::make('ContactNum')
                    ->label('Contact Number'),
                
            ]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListTransactions::route('/'),
            //'create' => Pages\CreateTransaction::route('/create'),
            //'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }
}
