<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JuicioContraAyuntamiento extends Model
{
    use SoftDeletes;

    protected $table = 'juicios_por_ayuntamientos';

    protected $fillable = [
        'id',
        'relacion_id',
        'tipo', 
        'fecha_inicio',
        'instancia', 
        'denunciante', 
        'descripcion', 
        'etapa', 
        'monto',
        'acciones', 

    ];

    public function relacion()
    {
        return $this->belongsTo('App\Models\Relacion','relacion_id','id');
    }
}
