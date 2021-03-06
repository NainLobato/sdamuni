<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Relacion extends Model
{
    use SoftDeletes;

    protected $table = 'relaciones';

    protected $fillable = [
        'id', 
        'formato_id',
        'ayuntamiento_id',
        'empleado_integra_id',
        'empleado_entrega_id',
        'empleado_recibe_id',
        'fecha_actualizacion',
        'created_at',
        'update_at',
        'delete_at',
    ];

    public function formato()
    {
        return $this->belongsTo('App\Models\CatFormato','formato_id','id');
    }

    public function ayuntamiento()
    {
        return $this->belongsTo('App\Models\Ayuntamiento','ayuntamiento_id','id');
    }

    public function entidades()
    {
        return $this->hasMany('App\Models\EntidadParamunicipal','relacion_id','id');
    }

    public function manuales()
    {
        return $this->hasMany('App\Models\ManualAdministrativo','relacion_id','id');
    }

    public function contratosConvenios()
    {
        return $this->hasMany('App\Models\ContratoConvenio','relacion_id','id');
    }

    public function juiciosPorAyuntamiento()
    {
        return $this->hasMany('App\Models\JuicioPorAyuntamiento','relacion_id','id');
    }

    public function juiciosContraAyuntamiento()
    {
        return $this->hasMany('App\Models\JuicioContraAyuntamiento','relacion_id','id');
    }

    public function arqueoCaja()
    {
        return $this->hasMany('App\Models\ArqueoCaja','relacion_id','id');
    }

    public function concilacion()
    {
        return $this->hasMany('App\Models\Conciliacion','relacion_id','id');
    }

    public function talonarioCheque()
    {
        return $this->hasMany('App\Models\TalonarioCheque','relacion_id','id');
    }
    
    public function inventarioFormaValorada()
    {
        return $this->hasMany('App\Models\InventarioFormaValorada','relacion_id','id');
    }

    

}
