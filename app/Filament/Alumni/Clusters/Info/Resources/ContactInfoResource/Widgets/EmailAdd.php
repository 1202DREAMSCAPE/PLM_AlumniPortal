<?php

namespace App\Filament\Alumni\Clusters\Info\Resources\ContactInfoResource\Widgets;

use App\Models\ContactInfo;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Forms;
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

    protected function getTableQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return ContactInfo::query()->where('user_id', Auth::user()->student_no);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('email')
                ->label('Email Address')
                ->color('warning')
                ->weight('bold'),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\EditAction::make()
                ->modalHeading('Edit Contact Information')
                ->form(fn (Forms\ComponentContainer $form) => $this->getEditForm($form)),
        ];
    }

    protected function getEditForm(Forms\ComponentContainer $form): Form
    {
        return $form
            ->schema([
                TextInput::make('email')
                    ->label('Email Address')
                    ->email()
                    ->maxLength(255)
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->query($this->getTableQuery())
            ->columns($this->getTableColumns())
            ->actions($this->getTableActions())
            ->paginated(false);
    }
}
