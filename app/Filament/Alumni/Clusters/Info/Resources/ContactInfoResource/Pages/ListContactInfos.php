<?php

namespace App\Filament\Alumni\Clusters\Info\Resources\ContactInfoResource\Pages;

use App\Filament\Alumni\Clusters\Info\Resources\ContactInfoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Alumni\Clusters\Info\Resources\ContactInfoResource\Widgets;

class ListContactInfos extends ListRecords
{
    protected static string $resource = ContactInfoResource::class;



    protected function getHeaderActions(): array
    {
        return [
           // Actions\CreateAction::make(),

        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            Widgets\EmailAdd::class,
            Widgets\TelNum::class,
            Widgets\Address::class,

        ];
    }
}
