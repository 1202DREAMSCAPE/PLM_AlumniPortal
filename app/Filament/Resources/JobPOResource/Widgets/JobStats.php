<?php

namespace App\Filament\Resources\JobPOResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\JobPO;

class JobStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Jobs', JobPO::count())
                ->description('The total number of jobs')
                ->icon('heroicon-o-briefcase'),

            Stat::make('Pending Jobs', JobPO::where('accepted', '0')->count())
                ->description('The total number of pending jobs')
                ->icon('heroicon-o-x-circle'),
            
            Stat::make('Published Jobs', JobPO::where('accepted', '1')->count())
                ->description('The total number of published jobs')
                ->icon('heroicon-o-check-circle'),
        ];
    }
}
