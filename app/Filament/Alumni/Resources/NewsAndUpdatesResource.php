<?php

namespace App\Filament\Alumni\Resources;

use App\Filament\Alumni\Resources\NewsAndUpdatesResource\Pages;
use App\Models\Post;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\Layout\Stack;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\ImageEntry;




class NewsAndUpdatesResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $label = 'News and Updates ';

    protected static ?string $navigationIcon = 'heroicon-s-newspaper';

    public static function getNavigationBadge(): ?string
    {
        return number_format(static::getModel()::where('is_published', true)->count());
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }
    
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Post Details')
                    ->schema([
                    
                        TextEntry::make('title')
                            ->label('Title')
                            ->weight('bold'),
    
                        TextEntry::make('content')
                            ->label('Content')
                            ->html(),
                    ]),
            ]);
    }
    

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Stack::make([
                CuratorColumn::make('image')
                    ->label('Featured Image')
                    ->circular(false)
                    ->size('auto')
                    ->extraImgAttributes(['class' => 'w-full rounded']),
                
                TextColumn::make('title')
                    ->sortable()
                    ->searchable()
                    ->AlignCenter()
                    ->weight('bold')
                    ->wrap(),

                    TextColumn::make('content')
                        ->wrap()
                        ->limit(100) 
                ]) 
                
            ])
            ->contentGrid([
                'sm' => 1, 
                'md' => 2,
                'xl' => 3,
            ])
            ->paginationPageOptions([9, 18, 27])
            ->defaultSort('id', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                //Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListNewsAndUpdates::route('/'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('is_published', true);
    }
}
