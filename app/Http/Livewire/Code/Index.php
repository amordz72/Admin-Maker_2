<?php

namespace App\Http\Livewire\Code;

use Livewire\Component;

use App\Models\CodeBank;
class Index extends Component
{
    public $name="<h1>name</h1>";
    public function render()
    {
        return view('livewire.code.index',
            [
                'codes' => CodeBank::all(),
            ]
        )
            ->extends('layouts.app')
        ;

    }






}
