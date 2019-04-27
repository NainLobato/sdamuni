<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InventarioFormaValorada extends Model
{
    
    use SoftDeletes;

    protected $table = 'inventarios_formas_valoradas';

    protected $fillable = [
        'id',
        'relacion_id',
        'concepto',
        'serie',
        'folioPrimero',
        'folioFinal',
        'area',
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
