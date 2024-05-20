<?php

namespace App\Filament\Alumni\Clusters\Info\Resources\ContactInfoResource\Widgets;

use App\Models\ContactInfo;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class EmailAdd extends BaseWidget
{
    protected static ?string $heading = ' ';

    protected static ?int $sort = 1;
    protected int | string | array $columnSpan = 'full';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('email')
                    ->label('Email Address')
                    ->required()
                    ->email()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(ContactInfo::query()->where('user_id', Auth::id()))
            ->columns([
                Tables\Columns\TextColumn::make('email')
                    ->label('Email Address'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->paginated(false);
    }
}
