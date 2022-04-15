<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TblResource\Pages;
use App\Filament\Resources\TblResource\RelationManagers;
use App\Models\Tbl;
use App\Models\project;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\Select;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Toggle;

class TblResource extends Resource
{
    protected static ?string $model = Tbl::class;

    protected static ?string $navigationIcon = 'heroicon-o-table';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Card::make()
            ->schema([
                Forms\Components\TextInput::make('name')->required(),



                MultiSelect::make('childs')
                ->label('Tables Childs :')
                ->options(Tbl::all()->pluck('name', 'name'))
               ,

                Select::make('project_id')
                ->label('Project :')
                ->options(project::all()->pluck('name', 'id'))
                ->searchable(),

                Toggle::make('softDelete')  ->onIcon('heroicon-s-lightning-bolt')
                ->offIcon('heroicon-s-trash')

            ])->columns(2)
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('childs'),
                Tables\Columns\TextColumn::make('project.name')->sortable(),

                ])
            ->filters([
                SelectFilter::make('project')->relationship('project', 'name')
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
            RelationManagers\ColsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTbls::route('/'),
            'create' => Pages\CreateTbl::route('/create'),
            'edit' => Pages\EditTbl::route('/{record}/edit'),
        ];
    }
}
