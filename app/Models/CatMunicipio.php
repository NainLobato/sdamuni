<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatMunicipio extends Model
{
    protected $table = 'cat_municipios';

    protected $fillable = [
        'id', 
        'distrito_id',
        'municipio',
        'clave',
        'created_at',
        'update_at',
    ];
}
