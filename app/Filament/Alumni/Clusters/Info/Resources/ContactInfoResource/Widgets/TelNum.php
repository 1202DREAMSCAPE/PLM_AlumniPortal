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
        ->query(ContactInfo::query()->where('user_id', Auth::user()->student_no))
        ->columns([
                Tables\Columns\TextColumn::make('TelNum')
                    ->label('Telephone Number')
                    ->color('warning')
            ->weight('bold'),
                
                Tables\Columns\TextColumn::make('ContactNum')
                    ->label('Cellphone Number')
                    ->color('warning')
            ->weight('bold'),

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
                TextInput::make('TelNum')
                    ->label('Telephone Number')
                    ->required()
                    ->maxLength(15),
                TextInput::make('ContactNum')
                    ->label('Cellphone Number')
                    ->required()
                    ->maxLength(15),
            ]);
    }
}
