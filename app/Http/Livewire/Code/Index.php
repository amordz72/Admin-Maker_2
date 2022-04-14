<?php

namespace App\Http\Livewire\Code;

use App\Models\CodeBank;
use App\Models\Col;
use App\Models\Project;
use App\Models\Tbl;
use Livewire\Component;

class Index extends Component
{
    public $project_id = 0;
    public $tbl_id = 0;
    public $projects = [];
    public $tbls = [];
    public $childs = [];
    public $cols = [];
    public $body = '';

    public function render()
    {

        $this->projects = [];
        $this->tbls = [];
        $this->cols = [];

        $this->projects = (Project::all());

        if ($this->project_id != 0) {
            $this->tbls = (Tbl::where('project_id', $this->project_id)->get());

        } else {
            $this->tbl_id = 0;
        }
        if ($this->tbl_id != 0) {
            $this->cols = (Col::where('tbl_id', $this->tbl_id)->get());

        }

        return view('livewire.code.index',
            [
                'codes' => CodeBank::all(),
            ]
        )
            ->extends('layouts.app')
        ;

    }
    public function set_childs()
    {
        $this->childs = [];
        foreach ($this->tbls as $key => $value) {
            if ($value->id == $this->tbl_id) {
                $this->childs = $value->childs;

            }

        }
    }

}
