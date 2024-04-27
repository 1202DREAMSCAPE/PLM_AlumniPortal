<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;
use App\Models\Partnership;
use App\Models\Messages;

class DashStats extends BaseWidget
{
    protected static bool $isLazy = true;
    protected function getStats(): array
    {
        return [
            //Stat::make('Total Alumni', User::where('role', 'alumni')->count()),
        Stat::make('Total Alumni', User::count())
        ->description('Total number of alumni in the system')
        ->icon('heroicon-o-users'),
        Stat::make('Messages',Messages::count())
            ->description('Total number of messages in the system')
            ->icon('heroicon-o-envelope'),
        Stat::make('Partnerships',Partnership::count())
            ->description('Total number of partnerships in the system')
            ->icon('heroicon-o-globe-alt')
            //->color('primary')
            //->chart([7, 8, 4, 5, 6, 3, 5, 3]),
        ];
    }
}
