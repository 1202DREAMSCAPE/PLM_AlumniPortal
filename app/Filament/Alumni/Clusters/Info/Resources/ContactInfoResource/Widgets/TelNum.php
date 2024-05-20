<?php

namespace App\Filament\Alumni\Clusters\Info\Resources\ContactInfoResource\Widgets;

use App\Models\ContactInfo;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Support\Facades\Auth;

class TelNum extends BaseWidget
{
    protected static ?string $heading = ' ';

    protected static?int $sort = 2;
    protected int | string | array $columnSpan = 'full';


    public function table(Table $table): Table
    {
        return $table
            ->query(ContactInfo::query()->where('user_id', Auth::id()))
            ->columns([
                Tables\Columns\TextColumn::make('telephone_number')
                    ->label('Telephone Number'),
                
                Tables\Columns\TextColumn::make('cellphone_number')
                    ->label('Cellphone Number')

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->paginated(false);
    }

}
