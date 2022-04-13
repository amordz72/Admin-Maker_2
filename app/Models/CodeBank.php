<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeBank extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
         'short','body',
         'technology_id','group_id',


    ];

public function technology() 
{
    return $this->belongsTo(Technology::class, 'technology_id', 'id');
}



}
