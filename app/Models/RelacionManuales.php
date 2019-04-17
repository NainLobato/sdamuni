<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RelacionManuales extends Model
{
    use SoftDeletes;

    protected $table = 'relacion_manuales';

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

    public function manuales()
    {
        return $this->hasMany('App\Models\ManualAdministrativo','relacion_id','id');
    }

    public function ayuntamiento()
    {
        return $this->belongsTo('App\Models\Ayuntamiento','ayuntamiento_id','id');
    }
}
