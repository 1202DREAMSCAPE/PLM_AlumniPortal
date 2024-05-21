<?php

namespace App\Filament\Alumni\Resources\AboutMeResource\Pages;

use App\Filament\Alumni\Resources\AboutMeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAboutMe extends CreateRecord
{
    protected static string $resource = AboutMeResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
