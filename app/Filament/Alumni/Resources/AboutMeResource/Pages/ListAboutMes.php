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
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            null => Tab::make('About Me'),
            'Contact Information' => Tab::make()->query(fn ($query) => $query->where('name', 'admin')),
            #{
               # return view('filament.settings.custom-footer');
            #},
            'Work Experience' => Tab::make()->query(fn ($query) => $query->where('name', 'cj')),
            'Educational Background' => Tab::make()->query(fn ($query) => $query->where('name', 'cj')),
            'Other Information' => Tab::make()->query(fn ($query) => $query->where('name', 'cj')),

        ];
    }

}
