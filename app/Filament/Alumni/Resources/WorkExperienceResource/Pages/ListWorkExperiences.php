<?php

namespace App\Filament\Alumni\Resources\WorkExperienceResource\Pages;

use App\Filament\Alumni\Resources\WorkExperienceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWorkExperiences extends ListRecords
{
    protected static string $resource = WorkExperienceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
