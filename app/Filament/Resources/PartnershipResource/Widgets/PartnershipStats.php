<?php

namespace App\Filament\Resources\PartnershipResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Partnership;

class PartnershipStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Partnerships', Partnership::count())
                ->description('The total number of partnerships')
                ->icon('heroicon-o-globe-alt'),

            Stat::make('Pending Partnerships', Partnership::where('accepted', '0')->count())
                ->description('The total number of pending partnerships')
                ->icon('heroicon-o-x-circle'),
            
            Stat::make('Accepted Partnerships', Partnership::where('accepted', '1')->count())
                ->description('The total number of accepted partnerships')
                ->icon('heroicon-o-check-circle'),
        ];
    }
}
