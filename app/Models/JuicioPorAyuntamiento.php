<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class JuicioPorAyuntamiento extends Model
{
    use SoftDeletes;

    protected $table = 'juicios_por_ayuntamientos';

    protected $fillable = [
        'id',
        'relacion_id',
        'tipo',
        'fecha_inicio',
        'instancia',
        'imputado', 
        'descripcion', 
        'etapa', 
        'acciones', 

    ];

    public function relacion()
    {
        return $this->belongsTo('App\Models\Relacion','relacion_id','id');
    }
        

}
