<?php

namespace App\Filament\Alumni\Resources;

use App\Filament\Alumni\Resources\ContactInformationResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Alumni\Clusters\Info;
use Illuminate\Support\Facades\View;

class ContactInformationResource extends Resource
{
    protected static ?int $navigationSort = 1;

    protected static ?string $model = User::class;

    protected static ?string $label = 'Contact Information';

    protected static ?string $cluster = Info::class;

protected static ?string $navigationIcon = 'heroicon-s-phone';

public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('email')
                ->label('Email')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('telephone_number')
                ->label('Telephone Number')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('cellphone_number')
                ->label('Cellphone Number')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('home_address')
                ->label('Home Address')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('country')
                ->label('Country')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('city')
                ->label('City')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('province')
                ->label('Province')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('region')
                ->label('Region')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('postal_code')
                ->label('Postal Code')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('linkedin_account_link')
                ->label('LinkedIn Account Link')
                ->sortable()
                ->searchable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('search')
                    ->form([
                        Forms\Components\TextInput::make('search')->label('Search'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query->when($data['search'], function (Builder $query, $term) {
                            return $query->where('email', 'like', '%' . $term . '%')
                                ->orWhere('telephone_number', 'like', '%' . $term . '%')
                                ->orWhere('cellphone_number', 'like', '%' . $term . '%')
                                ->orWhere('home_address', 'like', '%' . $term . '%')
                                ->orWhere('country', 'like', '%' . $term . '%')
                                ->orWhere('city', 'like', '%' . $term . '%')
                                ->orWhere('province', 'like', '%' . $term . '%')
                                ->orWhere('region', 'like', '%' . $term . '%')
                                ->orWhere('postal_code', 'like', '%' . $term . '%')
                                ->orWhere('linkedin_account_link', 'like', '%' . $term . '%');
                        });
                    }),
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
            // Add relations here
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactInformation::route('/'),
            'create' => Pages\CreateContactInformation::route('/create'),
            'edit' => Pages\EditContactInformation::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery();
    }

    public static function getViewData(array $data): array
    {
        return array_merge($data, [
            'contactInfos' => self::getEloquentQuery()->get(),
        ]);
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return View::make('contact-information', $this->getViewData([]));
    }
}
