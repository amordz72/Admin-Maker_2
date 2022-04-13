<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',


    ];

public function banks(): HasMany
{
    return $this->hasMany(CodeBank::class, 'technology_id', 'id');
}






}