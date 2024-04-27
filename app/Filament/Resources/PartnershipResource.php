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
                ->LABEL('Start Date')
                ->required()
                ->unique(ignoreRecord: true),

            Forms\Components\DatePicker::make('EndDate')
                ->label('End Date')
                ->unique(ignoreRecord: true),
            
            Forms\Components\Toggle::make('Accepted')
                ->label('Published')
                ->required(),

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            // Tables\Columns\TextColumn::make('PartnerID')
            //     ->searchable()
            //     ->label('Partnership ID')
            //     ->sortable(),

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

            Tables\Columns\IconColumn::make('Accepted')
                ->label('Published')
                ->boolean()
                ->sortable()
                ->alignCenter(),
            

            
        ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
