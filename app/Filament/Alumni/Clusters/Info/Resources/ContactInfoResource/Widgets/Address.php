<?php

namespace App\Filament\Alumni\Clusters\Info\Resources\ContactInfoResource\Widgets;

use App\Models\ContactInfo;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Support\Facades\Auth;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;

class Address extends BaseWidget
{
    protected static ?string $heading = ' ';

    protected static ?int $sort = 3;
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(ContactInfo::query()->where('user_id', Auth::id()))
            ->columns([
                Tables\Columns\TextColumn::make('home_address')
                    ->label('Home Address'),
                Tables\Columns\TextColumn::make('city')
                    ->label(' '),
                Tables\Columns\TextColumn::make('province')
                    ->label(' '),
                Tables\Columns\TextColumn::make('country')
                    ->label(' '),
                Tables\Columns\TextColumn::make('region')
                    ->label(' '),
                Tables\Columns\TextColumn::make('postal_code')
                    ->label(' '),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->modalHeading('Edit Contact Information')
                    ->form(fn (Forms\ComponentContainer $form) => $this->form($form)), // Ensure form is included in EditAction
            ])
            ->paginated(false);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('home_address')
                    ->label('Home Address')
                    ->required()
                    ->maxLength(255),
                TextInput::make('city')
                    ->label('City')
                    ->required()
                    ->maxLength(255),
                TextInput::make('province')
                    ->label('Province')
                    ->required()
                    ->maxLength(255),
                TextInput::make('country')
                    ->label('Country')
                    ->required()
                    ->maxLength(255),
                TextInput::make('region')
                    ->label('Region')
                    ->required()
                    ->maxLength(255),
                TextInput::make('postal_code')
                    ->label('Postal Code')
                    ->required()
                    ->maxLength(10),
            ]);
    }
}
