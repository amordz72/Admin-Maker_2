<?php

namespace App\Filament\Resources\TblResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\HasManyRelationManager;
use Filament\Resources\Table;
use App\Models\Tbl;
use App\Models\Data_type;
use Filament\Tables;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Forms\Components\Select;
use Filament\Tables\Filters\SelectFilter;

class ColsRelationManager extends HasManyRelationManager
{
    protected static string $relationship = 'cols';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                 Select::make('type')
                ->label('Type')
                ->options(Data_type::all()->pluck('name','name'))
                ->searchable()->required(),

                Toggle::make('null'),
                Toggle::make('fill')->default(1),
                Toggle::make('hidden'),
                Toggle::make('unique'),
                Select::make('parent_tbl')
                ->label('Parent :')
                ->options(Tbl::all()->pluck('name', 'name'))
                ->searchable(),

                Select::make('relation')
    ->options([
        'belongsTo' => 'Belongs To',

        'hasMany' => 'One To Many',
           'hasOne' => 'One To One',
        'morphToMany' => 'Many To Many',
    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('name'),

            Tables\Columns\TextColumn::make('type'),
            BooleanColumn::make('null'),
            BooleanColumn::make('fill'),
            BooleanColumn::make('hidden'),
            BooleanColumn::make('unique'),
            Tables\Columns\TextColumn::make('parent_tbl'),

            Tables\Columns\TextColumn::make('relation'),


            ])
            ->filters([
                //
            ]);
    }
}
