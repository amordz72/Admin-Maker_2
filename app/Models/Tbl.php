<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'childs',
        'softDelete',
        'project_id',

    ];
    protected $casts = [
        'childs' => 'array',
        'softDelete' => 'boolean',
    ];

    public function project()
    {
        return $this->belongsTo(project::class, 'project_id', 'id');
    }
    public function cols()
    {
        return $this->hasMany(Col::class, 'tbl_id', 'id');
    }

}
