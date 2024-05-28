<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PartnershipResource\Pages;
use App\Filament\Resources\PartnershipResource\RelationManagers;
use App\Models\Partnership;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists\Components;
use Filament\Infolists\Infolist;

class PartnershipResource extends Resource
{
    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';
    protected static ?int $navigationSort = 4;
    
    public static function getNavigationBadge(): ?string
    {
        return number_format(static::getModel()::count());
    }
    
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('ComName')
                ->label('Company Name')
                ->required()
                ->unique(ignoreRecord: true)
                ->maxLength(255),

            Forms\Components\TextInput::make('EmailAdd')
                ->label('Company Email Address')
                ->email()
                ->required()
                ->unique(ignoreRecord: true)
                ->maxLength(255),
            
            Forms\Components\Select::make('PartType')
                ->options([
                    'General Partnership' => 'General Partnership',
                    'Limited Partnership' => 'Limited Partnership',
                    'Limited Liability Partnership' => 'Limited Liability Partnership',
                ])
                ->label('Type of Partnership')
                ->required(),
            
            Forms\Components\DatePicker::make('StartDate')
                ->label('Start Date')
                ->required()
                ->unique(ignoreRecord: true),

            Forms\Components\DatePicker::make('EndDate')
                ->label('End Date')
                ->unique(ignoreRecord: true),
        ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
        ->schema([
            Components\Section::make()->schema([
                Components\TextEntry::make('ComName')
                    ->label('Company Name'),
                Components\TextEntry::make('EmailAdd')
                    ->label('Company Email Address'),
                Components\TextEntry::make('PartType')
                    ->label('Type of Partnership'),
                Components\Grid::make()->schema([
                        Components\TextEntry::make('StartDate')
                            ->label('Start Date'),
                        Components\TextEntry::make('EndDate')
                            ->label('End Date'),
                    ])->columns(2),
            ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('ComName')
                ->searchable()
                ->label('Company Name'),
                //->alignCenter(),
                //->sortable(),

            Tables\Columns\TextColumn::make('EmailAdd')
                ->searchable()
                ->label('Company Email Address'),
                //->alignCenter(),

            Tables\Columns\TextColumn::make('PartType')
                ->searchable()
                ->label('Type of Partnership'),
                //->alignCenter(),
            
            Tables\Columns\TextColumn::make('StartDate')
                ->searchable()
                ->label('Start Date'),
            
            Tables\Columns\TextColumn::make('EndDate')
                ->searchable()
                ->label('End Date')
                ->sortable(),

            // Tables\Columns\IconColumn::make('Accepted')
            //     ->boolean()
            //     ->alignCenter(),
        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\ViewAction::make(),
            Tables\Actions\Action::make('accept')
                ->label('Accept')
                ->icon('heroicon-s-check-circle')
                ->action(function ($record) {
                    $record->Accepted = true;
                    $record->save();
                })
                ->requiresConfirmation()
                ->color('success')
                ->visible(fn ($record) => !$record->Accepted),
            Tables\Actions\Action::make('unaccept')
                ->label('Unaccept')
                ->icon('heroicon-s-x-circle')
                ->action(function ($record) {
                    $record->Accepted = false;
                    $record->save();
                })
                ->requiresConfirmation()
                ->color('danger')
                ->visible(fn ($record) => $record->Accepted),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\BulkAction::make("Mark as Accepted")
                    ->label('Mark as Accepted')
                    ->action(function (): void {
                        Partnership::where('Accepted', false)->update(['Accepted' => true]);
                    })
                    ->icon('heroicon-s-check-circle') 
                    ->color('success'),
                Tables\Actions\BulkAction::make("Mark as Unaccepted")
                    ->label('Mark as Unaccepted')
                    ->action(function (): void {
                        Partnership::where('Accepted', true)->update(['Accepted' => false]);
                    })
                    ->icon('heroicon-s-x-circle') 
                    ->color('gray'),
            ]),
        ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPartnerships::route('/'),
            //'create' => Pages\CreatePartnership::route('/create'),
            //'edit' => Pages\EditPartnership::route('/{record}/edit'),
        ];
    }
}
