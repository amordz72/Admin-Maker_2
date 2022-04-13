<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CodeBankResource\Pages;
use App\Filament\Resources\CodeBankResource\RelationManagers;
use App\Models\CodeBank;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Forms\Components\Select;
use Filament\Tables\Filters\SelectFilter;
use App\Models\Group;
use App\Models\Technology;


class CodeBankResource extends Resource
{
    protected static ?string $model = CodeBank::class;

    protected static ?string $navigationIcon = 'heroicon-o-code';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
              Forms\Components\TextInput::make('title')

                    ->maxLength(255),
                    Forms\Components\TextInput::make('short')

                    ->maxLength(255),
                    Select::make('group_id')
                    ->label('Group')
                    ->options(Group::all()->pluck('name','id'))
                    ->searchable() ,

                    Select::make('technology_id')
                    ->label('Technology_id')
                    ->options(Technology::all()->pluck('name','id'))
                    ->searchable()->required(),




                Forms\Components\Textarea::make('body')

                    ->maxLength(65535),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                      Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('short'),    Tables\Columns\TextColumn::make('technology.name'),
                Tables\Columns\TextColumn::make('group.name'),

                Tables\Columns\TextColumn::make('body'),
           
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
            'index' => Pages\ListCodeBanks::route('/'),
            'create' => Pages\CreateCodeBank::route('/create'),
            'edit' => Pages\EditCodeBank::route('/{record}/edit'),
        ];
    }
}
