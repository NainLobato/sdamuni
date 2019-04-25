<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ManualAdministrativo extends Model
{
    use SoftDeletes;

    protected $table = 'manuales_administrativos';

    protected $fillable = [
        'id', 
        'relacion_id',
        'denominacion', 
        'fecha_autorizacion',
        'observaciones',
        'created_at',
        'update_at',
        'delete_at',
    ];

    public function relacion()
    {
        return $this->belongsTo('App\Models\Relacion','relacion_id','id');
    }
}
