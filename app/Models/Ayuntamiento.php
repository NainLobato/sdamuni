<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ayuntamiento extends Model
{
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
