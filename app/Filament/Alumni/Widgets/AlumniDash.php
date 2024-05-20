<?php

namespace App\Filament\Alumni\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class AlumniDash extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    
    
    public function table(Table $table): Table
    {
            return $table
                ->query(\App\Models\User::query())
                
                ->columns([
                Tables\Columns\TextColumn::make('SNum')
                    ->label('Student Number')
                    ->sortable(),
    
                Tables\Columns\TextColumn::make('LName')
                    ->label('Last Name'),
                    
                Tables\Columns\TextColumn::make('name')
                    ->label('First Name')
                    ->alignCenter(),
                
                Tables\Columns\TextColumn::make('MName')
                    ->label('Middle Name')
                    ->alignCenter(),
                    
                //Tables\Columns\TextColumn::make('created_at')
                  //  ->dateTime()
                    //->sortable(),
    
                Tables\Columns\TextColumn::make('ContactNum')
                ->label('Contact Number')
                ->alignCenter(),
    
                Tables\Columns\TextColumn::make('email')
                    ->alignCenter(),
    
                Tables\Columns\TextColumn::make('Course')
                ->alignCenter(),            
            ])

            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                //Tables\Actions\DeleteAction::make(),
                
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
        }
    }
    