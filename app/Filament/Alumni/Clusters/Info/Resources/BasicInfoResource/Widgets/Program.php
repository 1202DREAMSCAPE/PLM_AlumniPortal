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

class Program extends BaseWidget
{
    protected static ?string $heading = ' ';

    protected static ?int $sort = 4;
    protected int | string | array $columnSpan = '1/2';

    public function table(Table $table): Table
    {
        return $table
            ->query(User::query()->where('id', Auth::id()))
            ->columns([
                // TextColumn::make('Dept')
                //     ->label('Department')
                //     ->color('primary')
                //     ->alignCenter()
                //     ->weight(FontWeight::Bold),
                TextColumn::make('Course')
                    ->label('Program')
                    ->alignCenter()
                    ->color('warning')
                    ->weight(FontWeight::Bold),
            ])
            ->paginated(false);
    }

}
