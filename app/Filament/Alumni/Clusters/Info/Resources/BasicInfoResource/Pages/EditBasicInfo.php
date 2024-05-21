<?php

namespace App\Filament\Alumni\Clusters\Info\Resources\BasicInfoResource\Pages;

use App\Filament\Alumni\Clusters\Info\Resources\BasicInfoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBasicInfo extends EditRecord
{
    protected static string $resource = BasicInfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    
}
