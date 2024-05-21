<?php

namespace App\Filament\Alumni\Clusters\Info\Resources\BasicInfoResource\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Gender extends BaseWidget
{
    protected static ?string $heading = ' ';

    protected static ?int $sort = 5;
    protected int | string | array $columnSpan = '1/2';

    public function table(Table $table): Table
    {
        return $table
            ->query(User::query()->where('id', Auth::id()))
            ->columns([
                TextColumn::make('Gender')
                    ->label('Gender')
                    ->alignCenter()
                    ->color('warning')
                    ->weight(FontWeight::Bold),
            ])
            ->paginated(false)
            ->actions([
                Tables\Actions\EditAction::make()
                    ->modalHeading('Edit Gender Information')
                    ->form(fn (Forms\ComponentContainer $form) => $this->form($form)), // Ensure form is included in EditAction
            ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('Gender')
                    ->label('Gender')
                    ->options([
                        'Male' => 'Male',
                        'Female' => 'Female',
                        'Other' => 'Other',
                    ])
                    ->required(),
            ]);
    }
}
