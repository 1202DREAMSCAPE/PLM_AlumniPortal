<?php

namespace App\Filament\Alumni\Resources\AboutMeResource\Pages;

use App\Filament\Alumni\Resources\AboutMeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAboutMe extends EditRecord
{
    protected static string $resource = AboutMeResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
