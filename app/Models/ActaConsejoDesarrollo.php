<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActaConsejoDesarrollo extends Model
{
    use SoftDeletes;
    protected $table = 'actas_consejo_desarrollo';

    protected $fillable = [
        'id',
        'num_acta',
        'fecha_levanto_acta',
        'asuntos_acta',
        'año_acta',
        'num_forjas',
        'firmas_consejo',
        'sellos_validez',
        'relacion_id',
    ];

    public function relacion()
    {
        return $this->hasOne('App\Models\Relacion', 'id', 'relacion_id');
    }
}
