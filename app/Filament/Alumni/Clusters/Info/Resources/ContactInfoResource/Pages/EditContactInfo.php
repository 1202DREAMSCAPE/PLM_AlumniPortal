<?php

namespace App\Filament\Alumni\Clusters\Info\Resources\ContactInfoResource\Pages;

use App\Filament\Alumni\Clusters\Info\Resources\ContactInfoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContactInfo extends EditRecord
{
    protected static string $resource = ContactInfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
