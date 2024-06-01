<?php

namespace App\Filament\Alumni\Clusters\Info\Resources\EducationalBackgroundResource\Pages;

use App\Filament\Alumni\Clusters\Info\Resources\EducationalBackgroundResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEducationalBackgrounds extends ListRecords
{
    protected static string $resource = EducationalBackgroundResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Add Educational Background')
            ->color('warning'),
        ];
    }
}
