<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataTypeResource\Pages;
use App\Filament\Resources\DataTypeResource\RelationManagers;
use App\Models\Data_type;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class DataTypeResource extends Resource
{
    protected static ?string $model = Data_type::class;

    protected static ?string $navigationIcon = 'heroicon-o-database';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                 Tables\Columns\TextColumn::make('name'),
            ])
            ->filters([
                //
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
            'index' => Pages\ListDataTypes::route('/'),
            'create' => Pages\CreateDataType::route('/create'),
            'edit' => Pages\EditDataType::route('/{record}/edit'),
        ];
    }
}
