<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntidadParamunicipal extends Model
{
    use SoftDeletes;

    protected $table = 'entidades_paramunicipales';

    protected $fillable = [
        'id',
        'relacion_id',
        'empleado_titular_id',
        'entidad_paramunicipal', 
        'decreto',
        'gaceta_oficial', 
        'created_at',
        'update_at',
        'delete_at',

    ];
}
