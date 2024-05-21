<?php

namespace App\Filament\Alumni\Clusters\Info\Resources\BasicInfoResource\Pages;

use App\Filament\Alumni\Clusters\Info\Resources\BasicInfoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Alumni\Clusters\Info\Resources\BasicInfoResource\Widgets;


class ListBasicInfos extends ListRecords
{
    protected static string $resource = BasicInfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\CreateAction::make(),
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            Widgets\SNum::class,
            Widgets\Graduate::class,
            Widgets\Program::class,
            Widgets\Gender::class,
            Widgets\Bday::class,
            Widgets\BPlace::class,
            Widgets\CivilStat::class,
        ];
    }
}
