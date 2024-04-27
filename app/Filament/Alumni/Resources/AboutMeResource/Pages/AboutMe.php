<?php

namespace App\Filament\Alumni\Resources\AboutMeResource\Pages;

use App\Filament\Alumni\Resources\AboutMeResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Contracts\Support\Htmlable;

class AboutMe extends ViewRecord
{
    protected static string $resource = AboutMeResource::class;

    protected function getActions(): array
    {
        return [];
    }
}
