<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AyuntamientoPartido extends Model
{
    protected $table = 'ayuntamiento_cat_partido';

    protected $fillable = [
        'id', 
        'partido_id',
        'ayuntamiento_id',
        'created_at',
        'update_at',
    ];
}
