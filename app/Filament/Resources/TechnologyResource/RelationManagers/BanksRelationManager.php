<?php

namespace App\Filament\Resources\TechnologyResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\HasManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Forms\Components\Select;
use Filament\Tables\Filters\SelectFilter;
use App\Models\Group;



class BanksRelationManager extends HasManyRelationManager
{
    protected static string $relationship = 'banks';

    protected static ?string $recordTitleAttribute = 'title';

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






            Forms\Components\Textarea::make('body')

                ->maxLength(65535),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
              Tables\Columns\TextColumn::make('title'),
            Tables\Columns\TextColumn::make('short'),
            Tables\Columns\TextColumn::make('body'),
             Tables\Columns\TextColumn::make('technology.name'),
            Tables\Columns\TextColumn::make('group.name'),

            Tables\Columns\TextColumn::make('created_at')
                ->dateTime(),
            Tables\Columns\TextColumn::make('updated_at')
                ->dateTime(),
        ])
            ->filters([
                //
            ]);
    }
}
