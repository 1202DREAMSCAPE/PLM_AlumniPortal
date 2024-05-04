<?php

namespace App\Filament\Alumni\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class AlumniConnect extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    public function table(Table $table): Table
    {
        return $table
            ->query(\App\Models\User::query())
            ->columns([

                Tables\Columns\TextColumn::make('LName')
                    ->label('Last Name'),

                Tables\Columns\TextColumn::make('name')
                    ->label('First Name')
                    ->alignCenter(),

                Tables\Columns\TextColumn::make('MName')
                    ->label('Middle Name')
                    ->alignCenter(),

                Tables\Columns\TextColumn::make('ContactNum')
                    ->label('Contact Number')
                    ->alignCenter(),

                Tables\Columns\TextColumn::make('email')
                    ->alignCenter(),

                Tables\Columns\TextColumn::make('Course')
                    ->alignCenter(),
    
            ]);
    }
}
