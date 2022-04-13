<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Col extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'null',
        'fill',
        'hidden',
        'parent_tbl',
        'relation',
        'tbl_id',

    ];
    public function tbl()
    {
        return $this->belongsTo(tbl::class,'tbl_id','id');
    }






}
