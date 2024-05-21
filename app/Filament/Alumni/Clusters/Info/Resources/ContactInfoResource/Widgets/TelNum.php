<?php

namespace App\Filament\Alumni\Clusters\Info\Resources\ContactInfoResource\Widgets;

use App\Models\ContactInfo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Support\Facades\Auth;

class TelNum extends BaseWidget
{
    protected static ?string $heading = ' ';

    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(ContactInfo::query()->where('user_id', Auth::id()))
            ->columns([
                Tables\Columns\TextColumn::make('telephone_number')
                    ->label('Telephone Number'),
                
                Tables\Columns\TextColumn::make('cellphone_number')
                    ->label('Cellphone Number')

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
                TextInput::make('telephone_number')
                    ->label('Telephone Number')
                    ->required()
                    ->maxLength(15),
                TextInput::make('cellphone_number')
                    ->label('Cellphone Number')
                    ->required()
                    ->maxLength(15),
            ]);
    }
}
