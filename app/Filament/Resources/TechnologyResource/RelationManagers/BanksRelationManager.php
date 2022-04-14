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
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Card;



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




                Card::make()
                ->schema([
                RichEditor::make('body')  ->maxLength(65535),

])




                //   Forms\Components\Textarea::make('body'),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
              Tables\Columns\TextColumn::make('title')  ->searchable() ,
            Tables\Columns\TextColumn::make('short')->sortable(),
            Tables\Columns\TextColumn::make('body') ->limit(50) ->searchable() ,
             Tables\Columns\TextColumn::make('technology.name')->sortable(),
            Tables\Columns\TextColumn::make('group.name'),

        ])
        ->filters([
            SelectFilter::make('technology')->relationship('technology', 'name'),
            SelectFilter::make('group')->relationship('group', 'name')
        ]);
    }
}
