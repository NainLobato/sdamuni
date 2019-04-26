<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ayuntamiento extends Model
{
    use SoftDeletes;

    protected $table = 'ayuntamientos';

    protected $fillable = [
        'id',
        'municipio_id',
        'escudo',
        'telefono1',
        'telefono2',
        'correo',
        'created_at',
        'update_at',
        'delete_at',

    ];

    public function municipio()
    {
        return $this->belongsTo('App\Models\CatMunicipio','municipio_id','id');
    }

    public function partidos()
    {
        return $this->belongsToMany('App\Models\CatPartido','ayuntamiento_cat_partido','ayuntamiento_id','partido_id');
    }

    public function empleados()
    {
        return $this->hasMany('App\Models\Empleado','ayuntamiento_id','id');
    }

    public function relacionesEntidades()
    {
        return $this->hasMany('App\Models\RelacionEntidades','ayuntamiento_id','id');
    }

    public function relacionesManuales()
    {
        return $this->hasMany('App\Models\RelacionManuales','ayuntamiento_id','id');
    }

}
