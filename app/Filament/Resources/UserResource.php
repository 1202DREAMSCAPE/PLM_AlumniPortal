<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use App\Filament\Exports\UserExporter;
use Filament\Tables\Actions\ExportAction;
use Filament\Infolists\Components;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;




class UserResource extends Resource
{

    /**
     * The resource model.
     */
    protected static ?string $model = User::class;

    /**
     * The resource navigation icon.
     */
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $label = 'Alumni Record';


    /**
     * The settings navigation group.
     */
   // protected static ?string $navigationGroup = 'Collections';

    /**
     * The settings navigation sort order.
     */
    protected static ?int $navigationSort = 3;
    
    /**
     * Get the navigation badge for the resource.
     */
    public static function getNavigationBadge(): ?string
    {
        return number_format(static::getModel()::count());
    }

    /**
     * The resource form.
     */

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

                Forms\Components\TextInput::make('SNum')
                    ->label('Student Number')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                Forms\Components\TextInput::make('name')
                    ->label('First Name')
                    ->required()
                   // ->unique(ignoreRecord: true)
                    ->maxLength(255),
                
                Forms\Components\TextInput::make('LName')
                    ->label('Last Name')
                    ->required()
                    //->unique(ignoreRecord: true)
                    ->maxLength(255),

                
                Forms\Components\TextInput::make('MName')
                    ->label('Middle Name')
                    ->required()
                   // ->unique(ignoreRecord: true)
                    ->maxLength(255),
                
                Forms\Components\TextInput::make('NameExt') // Name Extension
                    ->label('Name Extension')
                    //->required(FALSE)
                   // ->unique(ignoreRecord: true)
                    ->maxLength(255),
                
                Forms\Components\TextInput::make('MaidenName')
                    ->label('Maiden Name')
                    //->unique(ignoreRecord: true)
                    ->maxLength(255),
                
                Forms\Components\TextInput::make('ContactNum')
                    ->label('Contact Number')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                
                    Forms\Components\Select::make('Course')
                    ->options([
                        'College of Engineering' => [
                            'Bachelor of Science in Computer Engineering' => 'Bachelor of Science in Computer Engineering',
                            'Bachelor of Science in Civil Engineering' => 'Bachelor of Science in Civil Engineering',
                            'Bachelor of Science in Electrical Engineering' => 'Bachelor of Science in Electrical Engineering',
                            'Bachelor of Science in Mechanical Engineering' => 'Bachelor of Science in Mechanical Engineering',
                        ],
                        'College of Science' => [
                            'Bachelor of Science in Biology' => 'Bachelor of Science in Biology',
                            'Bachelor of Science in Chemistry' => 'Bachelor of Science in Chemistry',
                            'Bachelor of Science in Physics' => 'Bachelor of Science in Physics',
                            'Bachelor of Science in Mathematics' => 'Bachelor of Science in Mathematics',
                        ],
                        'College of Arts and Letters' => [
                            'Bachelor of Arts in English' => 'Bachelor of Arts in English',
                            'Bachelor of Arts in Filipino' => 'Bachelor of Arts in Filipino',
                            'Bachelor of Arts in History' => 'Bachelor of Arts in History',
                            'Bachelor of Arts in Literature' => 'Bachelor of Arts in Literature',
                        ],
                        'College of Health Sciences' => [
                            'Bachelor of Science in Nursing' => 'Bachelor of Science in Nursing',
                            'Bachelor of Science in Pharmacy' => 'Bachelor of Science in Pharmacy',
                            'Bachelor of Science in Dentistry' => 'Bachelor of Science in Dentistry',
                            'Bachelor of Science in Optometry' => 'Bachelor of Science in Optometry',
                        ],
                        'College of Architecture and Fine Arts' => [
                            'Bachelor of Fine Arts in Visual Arts' => 'Bachelor of Fine Arts in Visual Arts',
                            'Bachelor of Fine Arts in Music' => 'Bachelor of Fine Arts in Music',
                            'Bachelor of Fine Arts in Theater Arts' => 'Bachelor of Fine Arts in Theater Arts',
                            'Bachelor of Science in Architecture' => 'Bachelor of Science in Architecture',
                        ],
                        'College of Business and Accountancy' => [
                            'Bachelor of Science in Business Administration' => 'Bachelor of Science in Business Administration',
                            'Bachelor of Science in Accountancy' => 'Bachelor of Science in Accountancy',
                            'Bachelor of Science in Marketing' => 'Bachelor of Science in Marketing',
                            'Bachelor of Science in Human Resource Management' => 'Bachelor of Science in Human Resource Management',
                        ],
                        // Add more colleges and programs as needed
                    ])
                    ->label('Course')
                    ->required(),

                Forms\Components\TextInput::make('password')
                    ->dehydrateStateUsing(fn (string $state): string => Hash::make($state))
                    ->dehydrated(fn (?string $state): bool => filled($state))
                    ->required(fn (string $operation): bool => $operation === 'create')
                    ->password()
                    ->confirmed()
                    ->maxLength(255),

                Forms\Components\TextInput::make('password_confirmation')
                    ->label('Confirm password')
                    ->password()
                    ->required(fn (string $operation): bool => $operation === 'create')
                    ->maxLength(255),

                Forms\Components\Toggle::make('is_admin')
                    ->label('Admin Access'),
            ]);
    }

    /**
     * The resource table.
     */
    public static function table(Table $table): Table
    {
        return $table
        ->headerActions([
            ExportAction::make()
                ->exporter(UserExporter::class)
        ])
            ->columns([
                ImageColumn::make('avatar_url')
                    ->label('Photo')
                    ->disk('profile-photos')
                    ->circular(),

                Tables\Columns\TextColumn::make('SNum')
                    ->searchable()
                    ->label('Student Number')
                    ->sortable(),

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

                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->alignCenter(),

                Tables\Columns\TextColumn::make('Course')
                ->alignCenter(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                //Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
                ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    /**
     * The resource relation managers.
     */
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    /**
     * The resource pages.
     */
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
        ];
    }
}
