<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatDistrito extends Model
{
    protected $table = 'cat_distritos';

    protected $fillable = [
        'id', 
        'distrito',
        'created_at',
        'update_at',
    ];
}
