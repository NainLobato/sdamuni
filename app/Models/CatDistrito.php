<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CatDistrito extends Model
{
    use SoftDeletes;
    protected $table = 'cat_distritos';

    protected $fillable = [
        'id', 
        'distrito',
        'created_at',
        'update_at',
        'delete_at',

    ];

    public function municipios()
    {
        return $this->hasMany('App\Models\CatMunicipio','distrito_id','id');
    }

}
