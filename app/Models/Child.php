<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'tbl_id',

    ];

    public function childs()
    {
        return $this->hasMany(Tbl::class, 'tbl_id', 'id');
    }
}
