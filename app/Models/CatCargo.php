<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatCargo extends Model
{
    protected $table = 'cat_cargos';

    protected $fillable = [
        'id', 
        'cargo',
        'created_at',
        'update_at',
    ];
}
