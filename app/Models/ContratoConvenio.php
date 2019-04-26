<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContratoConvenio extends Model
{
    use SoftDeletes;

    protected $table = 'contratos_convenios';

    protected $fillable = [
        'id',
        'relacion_id',
        'denominaciones',
        'fecha_subscripcion',
        'periodo_inicio',
        'periodo_final',
        'importe',
        'observaciones', 
        'created_at',
        'update_at',
        'delete_at',

    ];

    public function relacion()
    {
        return $this->belongsTo('App\Models\Relacion','relacion_id','id');
    }
}
