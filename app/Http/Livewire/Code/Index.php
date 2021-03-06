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
    public $me_casts = '';
    public $me_default = '';
    public $tbl_softDelete = false;

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
                $this->tbl_softDelete = $value->softDelete;

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
        $ch = '';
        $par = '';
        $head = '';
        $casts = '';
        foreach ($this->childs as $cld) {

            $ch .= "public function " . $this->names($cld) . "()
{
    return \$this->hasMany(" . ucfirst($cld) . "::class, '" . $cld . "_id', 'id');
}
";

        }
        //Loop columns array
        foreach ($this->cols as $col) {

            if ($col->hidden) {
                $h .= "'$col->name',\r";
                continue;
            }
            if ($col->casts != '') {
                $casts .= "'$col->name' => '$col->casts',\r";
                continue;
            }
            if ($col->fill) {
                $c .= "'$col->name',\r";
            }

            if ($col->type === 'unsignedBigInteger') {

                $par .= "
                public function " . $col->parent_tbl . "()
                {
                    return \$this->belongsTo(" . ucfirst($col->parent_tbl) . "::class, '" . $col->name . "', 'id');
                }\n
                ";
            }

        }

        if ($this->tbl_softDelete) {
            $head .= "\ruse Illuminate\Database\Eloquent\Model;

                        use Illuminate\Database\Eloquent\SoftDeletes;
                        class " . ucfirst($this->tbl_name) . " extends Model {
                        use SoftDeletes;
                        protected \$table = '" . $this->names($this->tbl_name) . "';
                        ";
        } else {
            $head .= "use Illuminate\Database\Eloquent\Model;
                            \rclass " . ucfirst($this->tbl_name) . " extends Model {";
        }

        $this->body = '';
        $this->body = "\r$head
                                        \rprotected   \$fillable = [\r$c\n];
                                        \rprotected   \$hidden = [ \r$h   \r];

                            \rprotected \$casts = [\n$casts\n];
                            \r$par
                            \r$ch";

    }

    public function details_model($obj)
    {
        //dd(var_dump(json_encode( $obj['casts']));
        $str = $obj['casts'];

        $this->me_casts = $str;
        $this->me_default = $obj['default'];

    }

    public function getStr()
    {
       // $this->body = str_replace("\n", "\n", $this->body);
        $this->body = str_replace("$", "\\$", $this->body);

    }
}
