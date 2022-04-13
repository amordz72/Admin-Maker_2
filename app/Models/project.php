<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',

    ];

    /**
     * Get all of the comments for the project
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tbls() 
    {
        return $this->hasMany(Tbl::class, 'project_id', 'id');
    }
}
