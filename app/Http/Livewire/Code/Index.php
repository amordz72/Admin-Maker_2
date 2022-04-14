<?php

namespace App\Http\Livewire\Code;

use App\Models\CodeBank;
use App\Models\Project;
use App\Models\Tbl;
use Livewire\Component;

class Index extends Component
{
    public $project_id = 0;
    public $tbl_id = 0;
    public $projects = [];
    public $tbls = [];

    public function render()
    {

        $this->projects = [];
        $this->tbls = [];

        $this->projects = (Project::all());

        if ($this->project_id != 0) {
            $this->tbls = (Tbl::where( 'project_id',$this->project_id)->get());

        } else {
            $this->tbl_id = 0;
        }

        return view('livewire.code.index',
            [
                'codes' => CodeBank::all(),
            ]
        )
            ->extends('layouts.app')
        ;

    }
    public function updated()
    {

    }

}
