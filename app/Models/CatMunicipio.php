<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CatMunicipio extends Model
{
    use SoftDeletes;
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
