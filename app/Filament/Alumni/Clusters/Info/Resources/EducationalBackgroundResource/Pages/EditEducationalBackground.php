<?php

namespace App\Filament\Alumni\Clusters\Info\Resources\EducationalBackgroundResource\Pages;

use App\Filament\Alumni\Clusters\Info\Resources\EducationalBackgroundResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEducationalBackground extends EditRecord
{
    protected static string $resource = EducationalBackgroundResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
