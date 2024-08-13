<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BabyResource\Pages;
use App\Filament\Resources\BabyResource\RelationManagers;
use App\Models\Baby;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class BabyResource extends Resource
{
    protected static ?string $model = Baby::class;

    protected static ?string $navigationIcon = 'heroicon-o-plus-circle';
    protected static ?string $modelLabel = 'BAMC Baby';

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
                        ->label('Suffix')
                        ->required(),
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
                    // Forms\Components\Select::make('roles')
                    //     ->multiple()
                    //     ->relationship('roles',  'name')
                    //     ->preload(),
                    // Forms\Components\Select::make('permissions')
                    //     ->multiple()
                    //     ->relationship('permissions',  'name')
                    //     ->preload(),
                ])
                    ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('regCode')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('hospNo')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('firstname')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('middlename')
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
                    ->sortable()
                    ->searchable(),
                TextColumn::make('claimantContactNo')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
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
