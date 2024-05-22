<?php

namespace App\Filament\Alumni\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class Partnership extends BaseWidget
{
    protected static ?string $heading = 'Partnerships Available ';

    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
        ->query(\App\Models\Partnership::query()->where('Accepted', true))
            ->columns([
                Tables\Columns\TextColumn::make('ComName')
                    ->label('Company Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('EmailAdd')
                    ->label('Company Email Address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('PartType')
                    ->label('Type of Partnership')
                    ->searchable(),
                Tables\Columns\TextColumn::make('StartDate')
                    ->label('Start Date')
                    ->searchable(),
                
            ]);
    }
}
