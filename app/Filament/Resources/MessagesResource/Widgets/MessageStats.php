<?php

namespace App\Filament\Resources\MessagesResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Messages;

class MessageStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Messages', Messages::count())
                ->description('The total number of messages')
                ->icon('heroicon-o-chat-bubble-left-right'),

            Stat::make('Unread Messages', Messages::where('Status', 'Unread')->count())
                ->description('The total number of unread messages')
                ->icon('heroicon-o-envelope'),

            Stat::make('Read Messages', Messages::where('Status', 'Replied')->count())
                ->description('The total number of read messages')
                ->icon('heroicon-o-envelope-open'),
        ];
    }
}
