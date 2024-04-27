<?php

namespace App\Filament\Alumni\Resources\TransactionHistoryResource\Pages;

use App\Filament\Alumni\Resources\TransactionHistoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTransactionHistories extends ListRecords
{
    protected static string $resource = TransactionHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
