<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LibroActas extends Model
{
    use SoftDeletes;
    protected $table = 'libros_actas';

    protected $fillable = [
        'id',
        'clave',
        'fecha_primer_sesion',
        'fecha_ultima_sesion',
        'primer_folio',
        'ultimo_folio',
        'comentarios',
        'ubicacion',
        'relacion_id',
    ];

    public function relacion()
    {
        return $this->hasOne('App\Models\Relacion', 'id', 'relacion_id');
    }

}
