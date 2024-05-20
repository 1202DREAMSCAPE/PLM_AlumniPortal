<?php

namespace App\Filament\Alumni\Resources\UpcomingEventsResource\Pages;

use App\Filament\Alumni\Resources\UpcomingEventsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUpcomingEvents extends EditRecord
{
    protected static string $resource = UpcomingEventsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
