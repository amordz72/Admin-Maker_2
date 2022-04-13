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

public function technology(): BelongsTo
{
    return $this->belongsTo(User::class, 'technology_id', 'id');
}



}
