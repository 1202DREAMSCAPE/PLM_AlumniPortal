<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Alumni\Resources\UserResource\Widgets;
use Filament\Resources\Components\Tab;
use Filament\Pages\Concerns\ExposesTableToWidgets;


class ListUsers extends ListRecords
{
    /**
     * The resource model.
     */
    protected static string $resource = UserResource::class;
    use ExposesTableToWidgets;

    /**
     * The header actions.
     */
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        
        return [
            null => Tab::make('All Alumni'),
            '2000 to 2010 Graduates' => Tab::make()->query(fn ($query) => $query->whereBetween('Graduated', [2000, 2010])),
            '2011 to 2020 Graduates' => Tab::make()->query(fn ($query) => $query->whereBetween('Graduated', [2011, 2020])),
            '2021 to 2024 Graduates' => Tab::make()->query(fn ($query) => $query->whereBetween('Graduated', [2021, 2030])),
        ];
    }
}
