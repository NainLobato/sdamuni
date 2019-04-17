<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
    use SoftDeletes;
    const ALTA = 1;
    const BAJA = 2;
    
    protected $table = 'empleados';
    protected $fillable = [
        'id', 
        'user_id',
        'ayuntamiento_id', 
        'cargo_id',
        'cargo',
        'sexo', 
        'fism',
        'profesion', 
        'profesion_abrev',
        'fecha_inicio_funciones',
        'telefono',
        'status',
        'created_at',
        'update_at',
        'delete_at',

    ];

   
    public function ayuntamiento()
    {
        return $this->belongsTo('App\Models\Ayuntamiento','ayuntamiento_id','id');
    }

    public function cargo()
    {
        return $this->belongsTo('App\Models\CatCargo','cargo_id','id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
    
}
