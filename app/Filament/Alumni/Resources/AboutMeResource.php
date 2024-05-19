<?php

namespace App\Filament\Alumni\Resources;


use App\Filament\Alumni\Resources\AboutMeResource\Pages;
use App\Filament\Alumni\Resources\AboutMeResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Pages\Page;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Contracts\View\View;
use App\Filament\Alumni\Clusters\Info;

class AboutMeResource extends Resource
{

    protected static ?int $navigationSort = 1;

    protected static ?string $model = User::class;

    protected static ?string $label = 'Basic Information ';

    protected static ?string $cluster = Info::class;

    protected static ?string $navigationIcon = 'heroicon-s-user';
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            // ->columns([
            //     Tables\Columns\TextColumn::make('LName')
            //         ->searchable()
            //         ->label('Last Name'),
                    
            //     Tables\Columns\TextColumn::make('name')
            //         ->searchable()
            //         ->label('First Name')
            //         ->alignCenter(),
                
            //     Tables\Columns\TextColumn::make('MName')
            //         ->searchable()
            //         ->label('Middle Name')
            //         ->alignCenter(),
                    
            //     //Tables\Columns\TextColumn::make('created_at')
            //       //  ->dateTime()
            //         //->sortable(),

            //     Tables\Columns\TextColumn::make('ContactNum')
            //     ->label('Contact Number')
            //     ->alignCenter(),

            //     Tables\Columns\TextColumn::make('Gender')
            //         ->searchable()
            //         ->alignCenter(),
                
            //     Tables\Columns\TextColumn::make('BDay')
            //         ->label('Birthday')
            //         ->searchable()
            //         ->alignCenter(),

            //     Tables\Columns\TextColumn::make('email')
            //         ->searchable()
            //         ->alignCenter(),
                
            //     Tables\Columns\TextColumn::make('SNum')
            //         ->searchable()
            //         ->label('Student Number')
            //         ->sortable(),

            //     Tables\Columns\TextColumn::make('Course')
            //         ->alignCenter(),

            //     Tables\Columns\TextColumn::make('Graduated')
            //         ->label('Year of Graduation')
            //         ->alignCenter(),
            //])
            ->filters([
                //
            ])
            ->actions([
               // Tables\Actions\EditAction::make(),
                //Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListAboutMes::route('/'),
            //'create' => Pages\CreateAboutMe::route('/create'),
           // 'edit' => Pages\EditAboutMe::route('/{record}/edit'),
        ];
    }
}
