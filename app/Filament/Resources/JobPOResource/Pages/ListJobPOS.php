<?php

namespace App\Filament\Resources\JobPOResource\Pages;

use App\Filament\Resources\JobPOResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\JobPOResource\Widgets;

class ListJobPOS extends ListRecords
{
    protected static string $resource = JobPOResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            Widgets\JobStats::class,
        ];
    }
}
