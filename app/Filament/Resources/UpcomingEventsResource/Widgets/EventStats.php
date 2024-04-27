<?php

namespace App\Filament\Resources\UpcomingEventsResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\UpcomingEvents;
class EventStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Events',UpcomingEvents::count())
                ->icon('heroicon-o-calendar')
                ->description('The total number of events'),
            Stat::make('Upcoming Events',UpcomingEvents::where('EDate', '>', now())->count())
                ->icon('heroicon-o-pause-circle')
                ->description('The total number of upcoming events'),
            Stat::make('Finished Events',UpcomingEvents::where('EDate', '<', now())->count())
                ->icon('heroicon-o-check-circle')
                ->description('The total number of unpublished events'),
        ];
    }
}
