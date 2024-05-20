<?php

namespace App\Filament\Resources\MessagesResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Messages;
use Illuminate\Support\Facades\Auth;

class MessageStats extends BaseWidget
{
    protected function getStats(): array
    {
        $user = Auth::user();

        if ($user->is_admin) {
            // Admin can see all messages
            $totalMessages = Messages::count();
            $unreadMessages = Messages::where('Status', 'Unread')->count();
            $readMessages = Messages::where('Status', 'Replied')->count();
        } else {
            // Non-admin users only see their own messages
            $totalMessages = Messages::where('SNum', $user->SNum)->count();
            $unreadMessages = Messages::where('SNum', $user->SNum)->where('Status', 'Unread')->count();
            $readMessages = Messages::where('SNum', $user->SNum)->where('Status', 'Replied')->count();
        }

        return [
            Stat::make('Total Messages', $totalMessages)
                ->description('The total number of messages')
                ->icon('heroicon-o-chat-bubble-left-right'),

            Stat::make('Unread Messages', $unreadMessages)
                ->description('The total number of unread messages')
                ->icon('heroicon-o-envelope'),

            Stat::make('Read Messages', $readMessages)
                ->description('The total number of read messages')
                ->icon('heroicon-o-envelope-open'),
        ];
    }
}