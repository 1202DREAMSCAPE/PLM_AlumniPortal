<?php

namespace App\Filament\Alumni\Widgets;

use App\Filament\Alumni\Clusters\Opportunities;
use Faker\Provider\ar_EG\Text;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\Layout\Split;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\UrlColumn;

 
class Partnership extends BaseWidget
{
    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = '1/2';

    public function table(Table $table): Table
    {
        return $table
        ->heading('Partnerships Available')
        ->description('Check out the partnerships available for you.')
        ->defaultPaginationPageOption(5)
        ->query(\App\Models\Partnership::query()->where('Accepted', true))
        ->columns([
            Split::make([
                Stack::make([
                    TextColumn::make('ComName')
                        ->label('Company Name')
                        ->weight(FontWeight::Bold)
                        ->searchable()
                        ->alignCenter(),
                    TextColumn::make('EmailAdd')
                        ->label('Company Email Address')
                        ->searchable()
                        ->alignCenter()
                        ->url(fn ($record) => 'mailto:' . $record->EmailAdd)
                        ->openUrlInNewTab(),
                ]),
                Stack::make([
                    TextColumn::make('PartType')
                        ->label('Type of Partnership')
                        ->searchable()
                        ->alignCenter(),
                    TextColumn::make('StartDate')
                        ->label('Start Date')
                        ->searchable()
                        ->alignCenter(),
                ]),
            ]),
        ])
        ->Actions([
            Tables\Actions\Action::make('openWebsite')
                ->label('Open Website')
                //->color('warning')
                ->url(fn ($record) => $record->Link) // Assuming `Link` is the column for the company's website
                ->openUrlInNewTab()
                ->icon('heroicon-o-link'),
        ]);
        // ->contentGrid([
        //     'sm' => 1,
        //     'md' => 2,
        //     'xl' => 2,
        // ]);
        
}
}