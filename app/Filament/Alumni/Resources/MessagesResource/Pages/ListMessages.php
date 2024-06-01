<?php

namespace App\Filament\Alumni\Resources\MessagesResource\Pages;

use App\Filament\Alumni\Resources\MessagesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMessages extends ListRecords
{
    protected static string $resource = MessagesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Send a Message to OPA')
            ->color('warning'),
        ];
    }
}
