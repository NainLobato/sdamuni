<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AyuntamientoPartido extends Model
{   
     use SoftDeletes;

    protected $table = 'ayuntamiento_cat_partido';

    protected $fillable = [
        'id', 
        'partido_id',
        'ayuntamiento_id',
        'created_at',
        'update_at',
        'delete_at',

    ];
}
