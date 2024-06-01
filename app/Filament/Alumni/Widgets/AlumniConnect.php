<?php

namespace App\Filament\Alumni\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class AlumniConnect extends BaseWidget
{
    protected static ?int $sort = 1;

    protected int | string | array $columnSpan = 'full';

    protected function getTableHeaderActions(): array
    {
        return [
            Action::make('toggleVisibility')
                ->label(fn () => Auth::user()->is_visible ? 'Make Profile Private' : 'Make Profile Public')
                ->action(function () {
                    $user = Auth::user();
                    $user->is_visible = !$user->is_visible;
                    $user->save();

                    Notification::make()
                        ->title('Visibility Toggled')
                        ->body($user->is_visible ? 'Your profile is now public.' : 'Your profile is now private.')
                        ->success()
                        ->send();
                })
                ->icon(fn () => Auth::user()->is_visible ? 'heroicon-o-eye-slash' : 'heroicon-o-eye')
        ];
    }

    public function table(Table $table): Table
    {
        return $table
            ->heading('Connect with Other Alumni')
            ->description('Get a copy of their email address or contact number to reach out.')
            ->defaultPaginationPageOption(5)
            ->query(\App\Models\User::query()
                ->where('is_visible', true)
                ->orderByRaw('student_no = ? DESC', [auth()->user()->student_no])
                )
            // ->recordClasses(
            // fn($record) => $record->student_no === auth()->user()->student_no ? 
            //    'bg-primary-400' : ''
            //         )
            ->columns([
                Split::make([
                    Stack::make([
                        // ImageColumn::make('profile_photo_path')
                    //     ->label(' ')
                    //     ->disk('public')
                    //     ->defaultImageUrl(url('/default-avatar.png'))
                    //     ->width(50)
                    //     ->height(50),
                        TextColumn::make('LName')
                            ->label('Last Name')
                            ->weight(FontWeight::Bold)
                            ->searchable()
                            ->alignCenter(),
                        TextColumn::make('name')
                            ->label('First Name')
                            ->searchable()
                            ->alignCenter(),
                    ]),
                    Stack::make([
                        TextColumn::make('ContactNum')
                            ->label('Contact Number')
                            ->icon('heroicon-s-phone')
                            ->alignCenter()
                            ->copyable()
                            ->copyMessage('Contact Number Copied')
                            ->copyMessageDuration(1500)
                            ->searchable(),
                        TextColumn::make('email')
                            ->label('Email Address')
                            ->searchable()
                            ->alignCenter()
                            ->icon('heroicon-m-envelope')
                            ->copyable()
                            ->copyMessage('Email Address Copied')
                            ->copyMessageDuration(1500),
                        // TextColumn::make('Course')
                        //     ->label('Course')
                        //     ->alignCenter()
                        //     ->wrap(),
                    ]),
                ])
            ])
            ->headerActions($this->getTableHeaderActions()) 
            ->contentGrid([
                'sm' => 1,
                'md' => 2,
                'xl' => 2,
            ]);
        }
}
