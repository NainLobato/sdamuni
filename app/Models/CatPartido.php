<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CatPartido extends Model
{
    use SoftDeletes;
    protected $table = 'cat_partidos';

    protected $fillable = [
        'id', 
        'partido',
        'created_at',
        'update_at',
    ];
}
