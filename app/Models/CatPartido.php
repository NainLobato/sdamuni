<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatPartido extends Model
{
    protected $table = 'cat_partidos';

    protected $fillable = [
        'id', 
        'partido',
        'created_at',
        'update_at',
    ];
}
