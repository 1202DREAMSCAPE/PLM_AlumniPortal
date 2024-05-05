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

    protected static ?int $navigationSort = 0;

    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-s-user';
    

     public function getFooter(): ?View
     {
     return view('filament.settings.custom-footer');
     }
    //Now, create a /resources/views/users/table/collapsible-row-content.blade.php

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

   
    // public static function form(Form $form): Form
    // {
    //     return $form
    //         ->schema([
    //             Forms\Components\TextInput::make('name')
    //                 ->label('First Name')
    //                 ->required()
    //                // ->unique(ignoreRecord: true)
    //                 ->maxLength(255),
                
    //             Forms\Components\TextInput::make('LName')
    //                 ->label('Last Name')
    //                 ->required()
    //                 //->unique(ignoreRecord: true)
    //                 ->maxLength(255),
                
    //             Forms\Components\TextInput::make('MName')
    //                 ->label('Middle Name')
    //                 ->required()
    //                // ->unique(ignoreRecord: true)
    //                 ->maxLength(255),
                
    //             Forms\Components\TextInput::make('NameExt') // Name Extension
    //                 ->label('Name Extension')
    //                 //->required(FALSE)
    //                // ->unique(ignoreRecord: true)
    //                 ->maxLength(255),
                
    //             Forms\Components\TextInput::make('MaidenName')
    //                 ->label('Maiden Name')
    //                 //->unique(ignoreRecord: true)
    //                 ->maxLength(255),
                
    //             Forms\Components\TextInput::make('ContactNum')
    //                 ->label('Contact Number')
    //                 ->required()
    //                 ->unique(ignoreRecord: true)
    //                 ->maxLength(255),
                
    //             Forms\Components\TextInput::make('Gender')
    //                 ->label('Gender')
    //                 ->required(),
                
    //             Forms\Components\TextInput::make('BDay')
    //                 ->label('Birthdate')
    //                 ->required()
    //                 ->date()
    //                 ->unique(ignoreRecord: true)
    //                 ->maxLength(255),

    //             Forms\Components\TextInput::make('email')
    //                 ->email()
    //                 ->required()
    //                 ->unique(ignoreRecord: true)
    //                 ->maxLength(255),
                
    //                 Forms\Components\Select::make('Course')
    //                 ->options([
    //                     'College of Engineering' => [
    //                         'Bachelor of Science in Computer Engineering' => 'Bachelor of Science in Computer Engineering',
    //                         'Bachelor of Science in Civil Engineering' => 'Bachelor of Science in Civil Engineering',
    //                         'Bachelor of Science in Electrical Engineering' => 'Bachelor of Science in Electrical Engineering',
    //                         'Bachelor of Science in Mechanical Engineering' => 'Bachelor of Science in Mechanical Engineering',
    //                     ],
    //                     'College of Science' => [
    //                         'Bachelor of Science in Biology' => 'Bachelor of Science in Biology',
    //                         'Bachelor of Science in Chemistry' => 'Bachelor of Science in Chemistry',
    //                         'Bachelor of Science in Physics' => 'Bachelor of Science in Physics',
    //                         'Bachelor of Science in Mathematics' => 'Bachelor of Science in Mathematics',
    //                     ],
    //                     'College of Arts and Letters' => [
    //                         'Bachelor of Arts in English' => 'Bachelor of Arts in English',
    //                         'Bachelor of Arts in Filipino' => 'Bachelor of Arts in Filipino',
    //                         'Bachelor of Arts in History' => 'Bachelor of Arts in History',
    //                         'Bachelor of Arts in Literature' => 'Bachelor of Arts in Literature',
    //                     ],
    //                     'College of Health Sciences' => [
    //                         'Bachelor of Science in Nursing' => 'Bachelor of Science in Nursing',
    //                         'Bachelor of Science in Pharmacy' => 'Bachelor of Science in Pharmacy',
    //                         'Bachelor of Science in Dentistry' => 'Bachelor of Science in Dentistry',
    //                         'Bachelor of Science in Optometry' => 'Bachelor of Science in Optometry',
    //                     ],
    //                     'College of Architecture and Fine Arts' => [
    //                         'Bachelor of Fine Arts in Visual Arts' => 'Bachelor of Fine Arts in Visual Arts',
    //                         'Bachelor of Fine Arts in Music' => 'Bachelor of Fine Arts in Music',
    //                         'Bachelor of Fine Arts in Theater Arts' => 'Bachelor of Fine Arts in Theater Arts',
    //                         'Bachelor of Science in Architecture' => 'Bachelor of Science in Architecture',
    //                     ],
    //                     'College of Business and Accountancy' => [
    //                         'Bachelor of Science in Business Administration' => 'Bachelor of Science in Business Administration',
    //                         'Bachelor of Science in Accountancy' => 'Bachelor of Science in Accountancy',
    //                         'Bachelor of Science in Marketing' => 'Bachelor of Science in Marketing',
    //                         'Bachelor of Science in Human Resource Management' => 'Bachelor of Science in Human Resource Management',
    //                     ],
    //                     // Add more colleges and programs as needed
    //                 ])
    //                 ->label('Course')
    //                 ->required(),
    //         ]);
    // }

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
