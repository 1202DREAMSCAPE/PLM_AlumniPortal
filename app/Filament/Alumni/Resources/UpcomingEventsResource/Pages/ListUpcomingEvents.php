<?php

namespace App\Filament\Alumni\Resources\UpcomingEventsResource\Pages;

use App\Filament\Alumni\Resources\UpcomingEventsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUpcomingEvents extends ListRecords
{
    protected static string $resource = UpcomingEventsResource::class;

    protected function getHeaderActions(): array
    {
        return [
           Actions\CreateAction::make()
           ->label('Request for an Event')
           ->color('warning'),
        ];
    }
}
