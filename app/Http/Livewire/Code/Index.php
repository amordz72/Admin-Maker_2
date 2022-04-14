<?php

namespace App\Http\Livewire\Code;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.code.index')
            ->extends('layouts.app')
        ;

    }
}
