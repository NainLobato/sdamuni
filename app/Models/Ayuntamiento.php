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
        'correo'
        'created_at',
        'update_at',
    ];
}
