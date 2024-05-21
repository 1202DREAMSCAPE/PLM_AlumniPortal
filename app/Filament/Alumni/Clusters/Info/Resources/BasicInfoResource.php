<?php

namespace App\Filament\Alumni\Clusters\Info\Resources;

use App\Filament\Alumni\Clusters\Info;
use App\Filament\Alumni\Clusters\Info\Resources\BasicInfoResource\Pages;
use App\Filament\Alumni\Clusters\Info\Resources\BasicInfoResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BasicInfoResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-s-user';
    protected static ?string $label = 'Basic Information ';
    protected static ?int $navigationSort = 1;
    protected static ?int $sort = 1;
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
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->color('primary')
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('LName')
                    ->label(' ')
                    ->color('primary')
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('MName')
                    ->label(' ')
                    ->color('primary')
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('NameExt')
                    ->label(' ')
                    ->color('primary')
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('MaidenName')
                    ->label(' ')
                    ->color('primary')
                    ->weight('bold'),
            ]) 
            ->filters([
                //
            ])
            ->actions([
                //Tables\Actions\EditAction::make(),
            ])
            ->paginated(false);
            // ->bulkActions([
            //     Tables\Actions\BulkActionGroup::make([
            //         Tables\Actions\DeleteBulkAction::make(),
            //     ]),
            // ]);
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
            'index' => Pages\ListBasicInfos::route('/'),
            // 'create' => Pages\CreateBasicInfo::route('/create'),
            // 'edit' => Pages\EditBasicInfo::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
    return parent::getEloquentQuery()->where('id',auth()->id());
    }
}

