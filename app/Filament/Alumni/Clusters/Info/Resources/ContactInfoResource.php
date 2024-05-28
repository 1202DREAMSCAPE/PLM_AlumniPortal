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
                Components\TextInput::make('linkedin_account_link')
                    ->label('LinkedIn Account'),
                // Hidden field to store the authenticated user's student_no
                Forms\Components\Hidden::make('user_id')
                    ->default(fn () => Auth::user()->student_no)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('linkedin_account_link')
                    ->wrap()
                    ->color('warning')
                    ->weight('bold')
                    ->label('LinkedIn Account'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->paginated(false);
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
        return parent::getEloquentQuery()->where('user_id', Auth::user()->student_no);
    }
}
