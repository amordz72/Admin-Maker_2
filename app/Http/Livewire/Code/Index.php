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
    public $tbl_name = '';

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
        $this->tbl_name = "";

        foreach ($this->tbls as $key => $value) {
            if ($value->id == $this->tbl_id) {
                $this->childs = $value->childs;
                $this->tbl_name = $value->name;

            }

        }
    }
    public function clear()
    {
        $this->body = '';
    }
    public function t()
    {
        $this->body = '';
    }
    public function set()
    {

    }
    public function names($mot)
    {
        if (substr($mot, -1) == 'y') {
            $mot = rtrim($mot, 'y') . 'ies';
        } elseif ($mot == 'child') {
            $mot = 'children';
        } else {
            $mot = $mot . 's';
        }

        return $mot;
    }
    //Migration
    public function migration()
    {
        $c = '';
        $n = '';
        $u = '';

        foreach ($this->cols as $key => $col) {

            if ($col->unique) {
                $u = "->unique()";
            } else {
                $u = "";
            }

            if ($col->null) {
                $c .= " \$table->$col->type('$col->name')->nullable()$u;\n";
            } else {
                $c .= " \$table->$col->type('$col->name')$u;\n";
            }

            if ($col->type == 'unsignedBigInteger') {
                $n = $this->names($col->parent_tbl);
                $c .= "\$table->foreign('$col->name')->onDelete('cascade')->references('id')
     ->on('$n');\n";
            }
        }

        $this->body = '';
        $this->body = "

              \r\$table->increments('id');
               \r$c

                \r\$table->timestamps();

       ";

    }

    //Model
    public function get_model()
    {

        $h = '';
        $c = '';

        foreach ($this->cols as $key => $col) {

            if ($col->hidden) {
                $h .= "\t'$col->name',\n";
                continue;
            }
            if ( $col->fill) {
                $c .= " \t'$col->name',\n";
            }

        }

        $this->body = '';
        $this->body = "
              \tprotected   \$fillable = [
                $c
            ];


            protected   \$hidden = [
               $h
            ];

       ";

    }
}
