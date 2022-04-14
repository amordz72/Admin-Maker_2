<?php

namespace App\Http\Livewire\Code;

use Livewire\Component;

use App\Models\CodeBank;
class Index extends Component
{
    
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
