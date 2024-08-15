<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BabyResource\Pages;
use App\Filament\Resources\BabyResource\RelationManagers;
use App\Models\Baby;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;



class BabyResource extends Resource
{
    protected static ?string $model = Baby::class;

    protected static ?string $navigationIcon = 'heroicon-o-plus-circle';
    protected static ?string $modelLabel = 'Baby';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Card::make()->schema([
                    TextInput::make('regCode')
                        ->label('Registration Code')
                        ->required(),
                    TextInput::make('hospNo')
                        ->label('Hospital Number')
                        ->required(),
                    TextInput::make('firstname')
                        ->label('Firstname')
                        ->required(),
                    TextInput::make('middlename')
                        ->label('Middlename')
                        ->required(),
                    TextInput::make('lastname')
                        ->label('Lastname')
                        ->required(),
                    TextInput::make('suffix')
                        ->label('Suffix'),
                    // ->required(),
                    DatePicker::make('birthdate')
                        ->label('Birthday')
                        ->format('m/d/Y')
                        ->required(),
                    TextInput::make('address')
                        ->label('Address')
                        ->required(),
                    TextInput::make('claimantContactName')
                        ->label('Claimant Contact Name')
                        ->required(),
                    TextInput::make('claimantContactNo')
                        ->label('Claimant Contact No')
                        ->required(),
                    FileUpload::make('image')
                        ->image()
                        ->imageEditor()
                        ->imageEditorAspectRatios([
                            '16:9',
                            '4:3',
                            '1:1',
                        ])
                        ->downloadable()
                        ->previewable(false)
                        ->deletable(false)
                    // ->multiple()
                    // SpatieMediaLibraryFileUpload::make('image')
                ])
                    ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        $bulkActions = [];

        // Check if the user has the delete permission
        if (Auth::user()->can('delete')) {
            $bulkActions[] = Tables\Actions\DeleteBulkAction::make();
        }
        return $table
            ->columns([
                //
                TextColumn::make('regCode')
                    ->label('Registration Code')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('hospNo')
                    ->label('Hospital No.')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('firstname')
                    ->label('Firstname')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('middlename')
                    ->label('Middlename')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('lastname')
                    ->label('Lastname')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('suffix')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('birthdate')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('address')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('claimantContactName')
                    ->label('Claimant Contact Name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('claimantContactNo')
                    ->label('Claimant Contact No.')
                    ->sortable()
                    ->searchable(),
                ImageColumn::make('image')
                    ->square()
                    ->checkFileExistence(false),
                // ->disk('s3')
                // ->visibility('private'),
                // SpatieMediaLibraryImageColumn::make('image')
                TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            // ->bulkActions([
            //     Tables\Actions\BulkActionGroup::make([
            //         Tables\Actions\DeleteBulkAction::make(),
            //     ]),
            // ]);
            ->bulkActions($bulkActions);
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
            'index' => Pages\ListBabies::route('/'),
            'create' => Pages\CreateBaby::route('/create'),
            'edit' => Pages\EditBaby::route('/{record}/edit'),
        ];
    }
}
