<?php

namespace App\Filament\Alumni\Resources\TransactionHistoryResource\Pages;

use App\Filament\Alumni\Resources\TransactionHistoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTransactionHistory extends EditRecord
{
    protected static string $resource = TransactionHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
