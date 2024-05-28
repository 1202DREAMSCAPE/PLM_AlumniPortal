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
            $totalMessages = Messages::where('student_no', $user->student_no)->count();
            $unreadMessages = Messages::where('student_no', $user->student_no)->where('Status', 'Unread')->count();
            $readMessages = Messages::where('student_no', $user->student_no)->where('Status', 'Replied')->count();
        }

        return [
            Stat::make('Total Messages', $totalMessages)
                ->description('The total number of messages')
                ->icon('heroicon-o-chat-bubble-left-right'),

            Stat::make('Unread Messages', $unreadMessages)
                ->description('The total number of unread messages')
                ->icon('heroicon-o-envelope'),

            Stat::make('Replied Messages', $readMessages)
                ->description('The total number of replied messages')
                ->icon('heroicon-o-envelope-open'),
        ];
    }
}