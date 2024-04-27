<?php

namespace App\Filament\Resources\JobPOResource\Pages;

use App\Filament\Resources\JobPOResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJobPO extends EditRecord
{
    protected static string $resource = JobPOResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
