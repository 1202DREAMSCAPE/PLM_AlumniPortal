<?php

namespace App\Filament\Resources\MessagesResource\Pages;

use App\Filament\Resources\MessagesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\MessagesResource\Widgets;
use Parallax\FilamentComments\Actions\CommentsAction;

class ListMessages extends ListRecords
{
    protected static string $resource = MessagesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Add Message'),
            
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            Widgets\MessageStats::make(),
        ];
    }
}
