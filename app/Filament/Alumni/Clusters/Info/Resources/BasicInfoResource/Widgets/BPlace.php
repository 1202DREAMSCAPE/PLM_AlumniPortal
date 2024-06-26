<?php

namespace App\Filament\Alumni\Clusters\Info\Resources\BasicInfoResource\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BPlace extends BaseWidget
{
    protected static ?string $heading = ' ';

    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = '1/2';

    public function table(Table $table): Table
    {
        return $table
        ->query(User::query()->where('student_no', Auth::user()->student_no))
        ->columns([
                TextColumn::make('City')
                    ->label('Birthplace')
                    ->alignCenter()
                    ->color('warning')
                    ->weight(FontWeight::Bold),
                // TextColumn::make('Nationality')
                //     ->label('Nationality')
                //     ->alignCenter()
                //     ->color('primary')
                //     ->weight(FontWeight::Bold),
            ])
            ->paginated(false);
    }
}
