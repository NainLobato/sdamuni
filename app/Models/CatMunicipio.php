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

    public function distrito()
    {
        return $this->belongsTo('App\Models\CatDistrito','distrito_id','id');
    }

    public function ayuntamientos()
    {
        return $this->hasMany('App\Models\CatMunicipio','municipio_id','id');
    }
}
