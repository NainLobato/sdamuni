<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcuerdoPendiente extends Model
{
    use SoftDeletes;
    protected $table = 'acuerdos_pendientes';

    protected $fillable = [
        'id',
        'num_acta',
        'fecha_acta',
        'acuerdo',
        'empleado_id',
        'accion_situacion',
        'comentarios',
        'relacion_id',
    ];

    public function relacion()
    {
        return $this->hasOne('App\Models\Relacion', 'id', 'relacion_id');
    }

    public function empleado()
    {
        return $this->hasOne('App\Models\Empleado', 'id', 'empleado_id');
    }

}
