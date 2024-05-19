<?php

namespace App\Filament\Alumni\Resources\WorkExperienceResource\Pages;

use App\Filament\Alumni\Resources\WorkExperienceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWorkExperience extends EditRecord
{
    protected static string $resource = WorkExperienceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
