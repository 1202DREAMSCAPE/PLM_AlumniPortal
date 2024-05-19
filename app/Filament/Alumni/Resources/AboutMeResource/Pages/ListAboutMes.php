<?php

namespace App\Filament\Alumni\Resources\AboutMeResource\Pages;

use App\Filament\Alumni\Resources\AboutMeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Filament\Pages\Concerns\ExposesTableToWidgets;


class ListAboutMes extends ListRecords
{
    use ExposesTableToWidgets;

    protected static ?string $navigationGroup = 'About Me';
    protected static string $resource = AboutMeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\CreateAction::make(),
        ];
    }

}
