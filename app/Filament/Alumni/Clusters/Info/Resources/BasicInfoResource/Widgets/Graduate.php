<?php

namespace App\Filament\Alumni\Clusters\Info\Resources\BasicInfoResource\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Columns\TextColumn;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Filament\Support\Enums\FontWeight;

class Graduate extends BaseWidget
{
    protected static ?string $heading = ' ';

    protected static ?int $sort = 3;
    protected int | string | array $columnSpan = '1/2';

    public function table(Table $table): Table
    {
        return $table
        ->query(User::query()->where('student_no', Auth::user()->student_no))
        ->columns([
                TextColumn::make('Graduated')
                    ->label('Year of Graduation')
                    ->alignCenter()
                    ->weight(FontWeight::Bold)
                    ->color('warning')
                    ->formatStateUsing(fn ($state) => "Year of $state"),
            ])
            ->paginated(false);
    }
}
