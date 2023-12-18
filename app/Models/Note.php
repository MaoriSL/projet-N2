<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Note extends Pivot
{
    protected $table = 'notes';
    protected $fillable = ['user_id', 'scene_id','value'];

    use HasFactory;
}
