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
use Illuminate\Support\Facades\Auth;

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
                //

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
                Tables\Columns\TextColumn::make('email')
                ->searchable()
                ->AlignJustify()
                ->label('Email Address'),
                Tables\Columns\TextColumn::make('telephone_number')
                ->searchable()
                ->label('Telephone Number'),
                Tables\Columns\TextColumn::make('cellphone_number')
                ->searchable()
                ->label('Contact Number'),
                Tables\Columns\TextColumn::make('home_address')
                ->searchable()
                ->wrap()
                ->alignJustify()
                ->label('Address'),
                Tables\Columns\TextColumn::make('city')
                ->searchable()
                ->label('City'),
                Tables\Columns\TextColumn::make('province')
                ->searchable()
                ->label('Province'),
                Tables\Columns\TextColumn::make('country')
                ->searchable()
                ->label('Country'),
                Tables\Columns\TextColumn::make('region')
                ->searchable()
                ->label('Region'),
                Tables\Columns\TextColumn::make('postal_code')
                ->searchable()
                ->label('Postal Code'),
                Tables\Columns\TextColumn::make('linkedin_account_link')
                ->searchable()
                ->wrap()
                ->label('LinkedIn Account'),
    
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

        public static function getEloquentQuery(): Builder
    {
    return parent::getEloquentQuery()->where('user_id',auth()->id());
    }
}
