<?php

namespace App\Filament\Alumni\Clusters\Info\Resources;

use App\Filament\Alumni\Clusters\Info;
use App\Filament\Alumni\Clusters\Info\Resources\ContactInfoResource\Pages;
use App\Filament\Alumni\Clusters\Info\Resources\ContactInfoResource\RelationManagers;
use App\Models\ContactInfo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\View;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components;
use Filament\Tables\Columns\ContactInfoColumn;

class ContactInfoResource extends Resource
{
    protected static ?string $model = ContactInfo::class;
    protected static ?int $navigationSort = 1;

    protected static ?string $label = 'Contact Information ';

    protected static ?string $navigationIcon = 'heroicon-s-phone';

    protected static ?string $cluster = Info::class;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('ContactNum')
                    ->label('Contact Number')
                    ->required(false),
                Forms\Components\TextInput::make('email')
                    ->label('Email Address')
                    ->required(false),
                Forms\Components\TextInput::make('Address')
                    ->label('Address')
                    ->required(false),
                Forms\Components\TextInput::make('City')
                    ->label('City')
                    ->required(false),
                Forms\Components\TextInput::make('Province')
                    ->label('Province')
                    ->required(false),
                Forms\Components\TextInput::make('Country')
                    ->label('Country')
                    ->required(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
               
            ->columns([
                // \App\Filament\Tables\Columns\ContactInfoColumn::make('Contact Info')::make('Contact Info')
                // ->label('Contact Information')        
                ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListContactInfos::route('/'),
            //'create' => Pages\CreateContactInfo::route('/create'),
            //'edit' => Pages\EditContactInfo::route('/{record}/edit'),
        ];
    }
}
