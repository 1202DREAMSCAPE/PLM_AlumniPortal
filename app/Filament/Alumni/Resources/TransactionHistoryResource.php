<?php

namespace App\Filament\Alumni\Resources;

use App\Filament\Alumni\Resources\TransactionHistoryResource\Pages;
use App\Filament\Alumni\Resources\TransactionHistoryResource\RelationManagers;
use App\Models\TransactionHisto;
use App\Models\Transaction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransactionHistoryResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $label = 'Transaction History ';


    protected static ?string $navigationIcon = 'heroicon-s-folder-open';

    protected static ?int $navigationSort = 5;


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
            'index' => Pages\ListTransactionHistories::route('/'),
            'create' => Pages\CreateTransactionHistory::route('/create'),
            'edit' => Pages\EditTransactionHistory::route('/{record}/edit'),
        ];
    }
}
