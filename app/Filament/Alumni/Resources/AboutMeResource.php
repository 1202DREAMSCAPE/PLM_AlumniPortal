<?php

namespace App\Filament\Alumni\Resources;

use App\Filament\Alumni\Resources\AboutMeResource\Pages;
use App\Filament\Alumni\Resources\AboutMeResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Infolists\Components;
use Filament\Infolists\Infolist;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Infolists\Components\TextEntry;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Pages\Page;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Contracts\View\View;
use Filament\Infolists\Components\SpatieTagsEntry;

class AboutMeResource extends Resource
{
    
    protected static ?string $label = 'About Me ';
    protected static ?string $navigationGroup = 'About Me';


    protected static ?int $navigationSort = 0;

    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-s-user';
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
        ->schema([
            Components\Section::make()->schema([
                TextEntry::make('name')
                    ->label('First Name'),
                TextEntry::make('LName')
                    ->label('Last Name'),
                TextEntry::make('MName')
                    ->label('Middle Name'),
                TextEntry::make('NameExt')
                    ->label('Name Extension'),
                TextEntry::make('MaidenName')
                    ->label('Maiden Name'),
                TextEntry::make('ContactNum')
                    ->label('Contact Number'),
                
            ])
            ]);
    }

   
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('LName')
                    ->searchable()
                    ->label('Last Name'),
                    
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label('First Name')
                    ->alignCenter(),
                
                Tables\Columns\TextColumn::make('MName')
                    ->searchable()
                    ->label('Middle Name')
                    ->alignCenter(),
                    
                //Tables\Columns\TextColumn::make('created_at')
                  //  ->dateTime()
                    //->sortable(),

                Tables\Columns\TextColumn::make('ContactNum')
                ->label('Contact Number')
                ->alignCenter(),

                Tables\Columns\TextColumn::make('Gender')
                    ->searchable()
                    ->alignCenter(),
                
                Tables\Columns\TextColumn::make('BDay')
                    ->label('Birthday')
                    ->searchable()
                    ->alignCenter(),

                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->alignCenter(),
                
                Tables\Columns\TextColumn::make('SNum')
                    ->searchable()
                    ->label('Student Number')
                    ->sortable(),

                Tables\Columns\TextColumn::make('Course')
                    ->alignCenter(),

                Tables\Columns\TextColumn::make('Graduated')
                    ->label('Year of Graduation')
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

    // public static function getRelations(): array
    // {
    //     return [
    //         //
    //     ];
    // }

      public static function getPages(): array
    {
        return [
            'index' => Pages\ListAboutMes::route('/'),
            'create' => Pages\CreateAboutMe::route('/create'),
            'edit' => Pages\EditAboutMe::route('/{record}/edit'),
        ];
    }
}
