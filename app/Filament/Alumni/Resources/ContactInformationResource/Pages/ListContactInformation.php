<?php

namespace App\Filament\Alumni\Resources\ContactInformationResource\Pages;

use App\Filament\Alumni\Resources\ContactInformationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListContactInformation extends ListRecords
{
    protected static string $resource = ContactInformationResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
