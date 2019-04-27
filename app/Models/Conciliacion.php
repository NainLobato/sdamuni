<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Conciliacion extends Model
{
    use SoftDeletes;

    protected $table = 'manuales_administrativos';

    protected $fillable = [
        'id', 
        'relacion_id',
        'cuenta',
        'depositos_municipio',
        'cheques_noCobrados',
        'cargos_noConsiderados',
        'depositos_banco',
        'fecha_actualizacion',
        'saldo_actualizado', 
        'created_at',
        'update_at',
        'delete_at',
    ];

    public function relacion()
    {
        return $this->belongsTo('App\Models\Relacion','relacion_id','id');
    }

    public function registros()
    {
        return $this->hasMany('App\Models\RegistroConciliacion','conciliacion_id','id');
    }
}
