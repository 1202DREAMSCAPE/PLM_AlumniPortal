<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class AlumniRecord extends BaseWidget
{
    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 'full';  

    public function table(Table $table): Table
    {
        return $table
            ->query(\App\Models\User::query())
            ->columns([
                Tables\Columns\TextColumn::make('SNum')
                ->searchable()
                ->label('Student Number')
                ->sortable(),

            Tables\Columns\TextColumn::make('LName')
                ->searchable()
                ->label('Last Name'),
                
            Tables\Columns\TextColumn::make('name')
                ->searchable()
                ->label('First Name')
                ->alignCenter(),
            
            Tables\Columns\TextColumn::make('MName')
                ->searchable()
                ->label('Middle Name')
                ->alignCenter(),
                
            //Tables\Columns\TextColumn::make('created_at')
              //  ->dateTime()
                //->sortable(),

            Tables\Columns\TextColumn::make('ContactNum')
            ->label('Contact Number')
            ->alignCenter(),

            Tables\Columns\TextColumn::make('email')
                ->searchable()
                ->alignCenter(),

            Tables\Columns\TextColumn::make('Course')
            ->alignCenter(),            
        ]);
    }
}
