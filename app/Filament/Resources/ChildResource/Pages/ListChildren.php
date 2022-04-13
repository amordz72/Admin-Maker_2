<?php

namespace App\Filament\Resources\ChildResource\Pages;

use App\Filament\Resources\ChildResource;
use Filament\Resources\Pages\ListRecords;

class ListChildren extends ListRecords
{
    protected static string $resource = ChildResource::class;
}
