<?php

namespace App\Filament\Alumni\Resources\NewsAndUpdatesResource\Pages;

use App\Filament\Alumni\Resources\NewsAndUpdatesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNewsAndUpdates extends EditRecord
{
    protected static string $resource = NewsAndUpdatesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
