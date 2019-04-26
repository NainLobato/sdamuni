<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActaConsejoPlaneacion extends Model
{
    use SoftDeletes;
    protected $table = 'actas_consejo_planeacion';

    protected $fillable = [
        'id',
        'num_acta_consejo',
        'fecha_acta_levanto',
        'descripcion_acta',
        'año_acta',
        'num_forjas',
        'firmas_consejo',
        'sello_validez',
        'relacion_id',
    ];

    public function relacion()
    {
        return $this->hasOne('App\Models\Relacion', 'id', 'relacion_id');
    }
}
