<?php

namespace App\Filament\Alumni\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\Layout\Grid;
use Illuminate\Support\Facades\Storage;


class AlumniConnect extends BaseWidget
{
    protected int | string | array $columnSpan = '2 / 4';
    public function table(Table $table): Table
    {
        return $table
            ->query(\App\Models\User::query())
            ->columns([
                Split::make([

                    Stack::make([
                        TextColumn::make('LName')
                            ->label('Last Name')
                            ->weight(FontWeight::Bold)
                            ->searchable()
                            ->alignCenter(),
                        TextColumn::make('name')
                            ->label('First Name')
                            ->searchable()
                            ->alignCenter(),
                    ]),

                    Stack::make([
                        Tables\Columns\TextColumn::make('ContactNum')
                        ->label('Contact Number')
                        ->icon('heroicon-s-phone')
                        ->alignCenter()
                        ->copyable()
                        ->copyMessage('Contact Number Copied')
                        ->copyMessageDuration(1500)
                        ->searchable(),

                    Tables\Columns\TextColumn::make('email')
                        ->label('Email Address')
                        ->searchable()
                        ->alignCenter()
                        ->wrap()
                        ->icon('heroicon-m-envelope')
                        ->copyable()
                            ->copyMessage('Email Address Copied')
                            ->copyMessageDuration(1500),

                    // Tables\Columns\TextColumn::make('Course')
                    // ->label('Course')
                    // ->alignCenter()
                    // ->wrap(),
                    ]),
                ])
            ])

                ->contentGrid([
                    'sm' => 1,
                    'md' => 2,
                    'xl' => 2,
                ]);
    }
}
