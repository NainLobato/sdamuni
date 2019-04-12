<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
    use SoftDeletes;
    protected $table = 'empleados';
    protected $fillable = [
        'id', 
        'user_id',
        'ayuntamiento_id', 
        'cargo_id',
        'sexo', 
        'fism',
        'profesion', 
        'profesion_abrev',
        'fecha_inicio_funciones',
        'telefono',
        'status',
        'created_at',
        'update_at',
    ];
}
