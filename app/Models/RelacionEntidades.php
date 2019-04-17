<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RelacionEntidades extends Model
{
    use SoftDeletes;

    protected $table = 'relacion_entidades_paramunicipales';

    protected $fillable = [
        'id', 
        'ayuntamiento_id',
        'empleado_integra_id',
        'empleado_entrega_id',
        'empleado_recibe_id',
        'fecha_actualizacion',
        'created_at',
        'update_at',
        'delete_at',
    ];
}
