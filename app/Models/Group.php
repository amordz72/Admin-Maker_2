<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',


    ];

    public function banks(): HasMany
{
    return $this->hasMany(CodeBank::class, 'group_id', 'id');
}
}
