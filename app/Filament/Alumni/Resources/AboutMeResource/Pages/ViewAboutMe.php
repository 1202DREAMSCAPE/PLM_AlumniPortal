<?php

namespace App\Filament\Alumni\Resources\AboutMeResource\Pages;

use App\Filament\Alumni\Resources\AboutMeResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Pages\Actions\Action;

class ViewAboutMe extends ViewRecord
{
    protected static string $resource = AboutMeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('close')
                ->label('')
                ->url($this->getResource()::getUrl('index'))
                ->icon('heroicon-o-x-mark')
                ->color('secondary'),
        ];
    }
}
